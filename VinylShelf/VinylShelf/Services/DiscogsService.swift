import Foundation

enum DiscogsError: LocalizedError, Equatable {
    case rateLimited
    case notFound
    case network
    case decoding
    case unauthorized

    var errorDescription: String? {
        switch self {
        case .rateLimited:
            return "Discogs is receiving too many requests right now. Please try again in a minute."
        case .notFound:
            return "No matching release was found on Discogs."
        case .network:
            return "Couldn't reach Discogs. Check your connection and try again."
        case .decoding:
            return "Discogs returned an unexpected response."
        case .unauthorized:
            return "Your Discogs token was rejected. Check DiscogsConfig.swift."
        }
    }
}

/// Async Discogs API client with client-side throttling (60 req/min) and
/// exponential backoff on HTTP 429 (1s doubling to a 30s cap, 4 retries).
final class DiscogsService {
    static let shared = DiscogsService()

    private let session: URLSession
    private let token: String
    private let consumerKey: String
    private let consumerSecret: String
    private let rateLimiter: RateLimiter
    private let retryBaseDelay: TimeInterval
    private let maxRetries: Int

    private static let baseURL = URL(string: "https://api.discogs.com")!
    private static let userAgent = "VinylShelf/1.0 +https://vinylshelf.com"
    private static let maxBackoff: TimeInterval = 30

    init(
        session: URLSession = .shared,
        token: String = DiscogsConfig.apiToken,
        consumerKey: String = DiscogsConfig.consumerKey,
        consumerSecret: String = DiscogsConfig.consumerSecret,
        rateLimiter: RateLimiter = RateLimiter(maxRequests: 60, per: 60),
        retryBaseDelay: TimeInterval = 1,
        maxRetries: Int = 4
    ) {
        self.session = session
        self.token = token
        self.consumerKey = consumerKey
        self.consumerSecret = consumerSecret
        self.rateLimiter = rateLimiter
        self.retryBaseDelay = retryBaseDelay
        self.maxRetries = maxRetries
    }

    // MARK: - Endpoints

    func searchByBarcode(_ barcode: String) async throws -> [DiscogsRelease] {
        let response: DiscogsSearchResponse = try await request(
            path: "/database/search",
            queryItems: [URLQueryItem(name: "barcode", value: barcode)]
        )
        return response.results
    }

    func searchByQuery(_ query: String) async throws -> [DiscogsRelease] {
        let response: DiscogsSearchResponse = try await request(
            path: "/database/search",
            queryItems: [
                URLQueryItem(name: "q", value: query),
                URLQueryItem(name: "type", value: "release"),
            ]
        )
        return response.results
    }

    func getReleaseDetail(_ id: Int) async throws -> DiscogsRelease {
        try await request(path: "/releases/\(id)", queryItems: [])
    }

    // MARK: - Core request with throttle + backoff

    private func request<T: Decodable>(path: String, queryItems: [URLQueryItem]) async throws -> T {
        var attempt = 0
        var backoff = retryBaseDelay

        while true {
            try await rateLimiter.waitForSlot()

            let (data, response): (Data, URLResponse)
            do {
                (data, response) = try await session.data(for: makeRequest(path: path, queryItems: queryItems))
            } catch {
                throw DiscogsError.network
            }

            guard let http = response as? HTTPURLResponse else {
                throw DiscogsError.network
            }

            switch http.statusCode {
            case 200..<300:
                do {
                    return try JSONDecoder().decode(T.self, from: data)
                } catch {
                    throw DiscogsError.decoding
                }
            case 401, 403:
                throw DiscogsError.unauthorized
            case 404:
                throw DiscogsError.notFound
            case 429:
                attempt += 1
                guard attempt <= maxRetries else { throw DiscogsError.rateLimited }
                try? await Task.sleep(nanoseconds: UInt64(backoff * 1_000_000_000))
                backoff = min(backoff * 2, Self.maxBackoff)
            default:
                throw DiscogsError.network
            }
        }
    }

    private func makeRequest(path: String, queryItems: [URLQueryItem]) -> URLRequest {
        var components = URLComponents(
            url: Self.baseURL.appending(path: path),
            resolvingAgainstBaseURL: false
        )!
        // Credentials are appended here and must never be logged or printed.
        components.queryItems = queryItems + authQueryItems

        var request = URLRequest(url: components.url!)
        request.setValue(Self.userAgent, forHTTPHeaderField: "User-Agent")
        return request
    }

    /// App-level key/secret auth (production — no user Discogs account
    /// needed; Discogs throttles per device IP). Falls back to the personal
    /// access token for development when key/secret aren't configured.
    private var authQueryItems: [URLQueryItem] {
        if Self.isConfigured(consumerKey), Self.isConfigured(consumerSecret) {
            return [
                URLQueryItem(name: "key", value: consumerKey),
                URLQueryItem(name: "secret", value: consumerSecret),
            ]
        }
        return [URLQueryItem(name: "token", value: token)]
    }

    private static func isConfigured(_ value: String) -> Bool {
        !value.isEmpty && !value.hasPrefix("YOUR_")
    }
}

import XCTest
@testable import VinylShelf

final class DiscogsServiceTests: XCTestCase {

    override func tearDown() {
        MockURLProtocol.requestHandler = nil
        super.tearDown()
    }

    // MARK: - Helpers

    private func makeService() -> DiscogsService {
        let configuration = URLSessionConfiguration.ephemeral
        configuration.protocolClasses = [MockURLProtocol.self]
        return DiscogsService(
            session: URLSession(configuration: configuration),
            token: "test-token",
            rateLimiter: RateLimiter(maxRequests: 1_000, per: 60),
            retryBaseDelay: 0.01,
            maxRetries: 4
        )
    }

    private func response(status: Int, for request: URLRequest) -> HTTPURLResponse {
        HTTPURLResponse(url: request.url!, statusCode: status, httpVersion: nil, headerFields: nil)!
    }

    private let searchJSON = Data("""
    {
        "results": [
            {
                "id": 249504,
                "title": "Fleetwood Mac - Rumours",
                "year": "1977",
                "country": "US",
                "cover_image": "https://img.discogs.com/rumours.jpg",
                "thumb": "https://img.discogs.com/rumours-thumb.jpg",
                "genres": ["Rock"],
                "styles": ["Pop Rock"],
                "barcode": ["0 7599-27313-1 8"],
                "formats": [{"name": "Vinyl", "descriptions": ["LP", "Album"]}],
                "labels": [{"name": "Warner Bros. Records", "catno": "BSK 3010"}]
            }
        ]
    }
    """.utf8)

    private let detailJSON = Data("""
    {
        "id": 249504,
        "title": "Rumours",
        "artists_sort": "Fleetwood Mac",
        "artists": [{"name": "Fleetwood Mac"}],
        "year": 1977,
        "country": "US",
        "genres": ["Rock"],
        "styles": ["Pop Rock"],
        "labels": [{"name": "Warner Bros. Records", "catno": "BSK 3010"}],
        "formats": [{"name": "Vinyl", "descriptions": ["LP", "Album"]}],
        "images": [
            {"type": "primary", "uri": "https://img.discogs.com/rumours-full.jpg"},
            {"type": "secondary", "uri": "https://img.discogs.com/rumours-back.jpg"}
        ],
        "thumb": "https://img.discogs.com/rumours-thumb.jpg",
        "identifiers": [{"type": "Barcode", "value": "0 7599-27313-1 8"}],
        "tracklist": [
            {"position": "A1", "title": "Second Hand News", "duration": "2:43"},
            {"position": "A2", "title": "Dreams", "duration": "4:14"}
        ]
    }
    """.utf8)

    // MARK: - Happy paths

    func testSearchByQueryDecodesResults() async throws {
        MockURLProtocol.requestHandler = { [self] request in
            (response(status: 200, for: request), searchJSON)
        }

        let results = try await makeService().searchByQuery("rumours")

        XCTAssertEqual(results.count, 1)
        let release = try XCTUnwrap(results.first)
        XCTAssertEqual(release.id, 249504)
        XCTAssertEqual(release.year, 1977, "String year on search results should parse to Int")
        XCTAssertEqual(release.displayArtist, "Fleetwood Mac")
        XCTAssertEqual(release.displayTitle, "Rumours")
        XCTAssertEqual(release.coverImage, "https://img.discogs.com/rumours.jpg")
        XCTAssertEqual(release.barcodes, ["0 7599-27313-1 8"])
    }

    func testSearchByBarcodeBuildsCorrectRequest() async throws {
        var captured: URLRequest?
        MockURLProtocol.requestHandler = { [self] request in
            captured = request
            return (response(status: 200, for: request), searchJSON)
        }

        _ = try await makeService().searchByBarcode("075992731318")

        let request = try XCTUnwrap(captured)
        let url = try XCTUnwrap(request.url?.absoluteString)
        XCTAssertTrue(url.contains("/database/search"))
        XCTAssertTrue(url.contains("barcode=075992731318"))
        XCTAssertTrue(url.contains("token=test-token"))
        XCTAssertEqual(
            request.value(forHTTPHeaderField: "User-Agent"),
            "VinylShelf/1.0 +https://vinylshelf.com"
        )
    }

    func testGetReleaseDetailDecodesDetailShape() async throws {
        MockURLProtocol.requestHandler = { [self] request in
            (response(status: 200, for: request), detailJSON)
        }

        let release = try await makeService().getReleaseDetail(249504)

        XCTAssertEqual(release.id, 249504)
        XCTAssertEqual(release.artistsSort, "Fleetwood Mac")
        XCTAssertEqual(release.year, 1977)
        XCTAssertEqual(release.tracklist?.count, 2)
        XCTAssertEqual(release.coverImage, "https://img.discogs.com/rumours-full.jpg", "Detail cover should fall back to the primary image")
        XCTAssertEqual(release.backCoverImage, "https://img.discogs.com/rumours-back.jpg", "First secondary image should be treated as the back cover")
        XCTAssertEqual(release.barcodes, ["0 7599-27313-1 8"], "Detail barcodes should come from identifiers")
        XCTAssertEqual(release.labels?.first?.catno, "BSK 3010")
    }

    // MARK: - 429 retry behavior

    func testRateLimitedRequestRetriesThenSucceeds() async throws {
        var requestCount = 0
        MockURLProtocol.requestHandler = { [self] request in
            requestCount += 1
            if requestCount <= 2 {
                return (response(status: 429, for: request), Data())
            }
            return (response(status: 200, for: request), searchJSON)
        }

        let results = try await makeService().searchByQuery("rumours")

        XCTAssertEqual(requestCount, 3, "Two 429s should be retried before the 200")
        XCTAssertEqual(results.count, 1)
    }

    func testRateLimitedRequestExhaustsRetries() async {
        var requestCount = 0
        MockURLProtocol.requestHandler = { [self] request in
            requestCount += 1
            return (response(status: 429, for: request), Data())
        }

        do {
            _ = try await makeService().searchByQuery("rumours")
            XCTFail("Expected DiscogsError.rateLimited")
        } catch let error as DiscogsError {
            XCTAssertEqual(error, .rateLimited)
        } catch {
            XCTFail("Unexpected error: \(error)")
        }
        XCTAssertEqual(requestCount, 5, "Initial attempt + 4 retries")
    }

    // MARK: - Error mapping

    func testNotFoundMapsToNotFound() async {
        MockURLProtocol.requestHandler = { [self] request in
            (response(status: 404, for: request), Data())
        }

        do {
            _ = try await makeService().getReleaseDetail(1)
            XCTFail("Expected DiscogsError.notFound")
        } catch let error as DiscogsError {
            XCTAssertEqual(error, .notFound)
        } catch {
            XCTFail("Unexpected error: \(error)")
        }
    }

    func testUnauthorizedMapsToUnauthorized() async {
        MockURLProtocol.requestHandler = { [self] request in
            (response(status: 401, for: request), Data())
        }

        do {
            _ = try await makeService().searchByQuery("rumours")
            XCTFail("Expected DiscogsError.unauthorized")
        } catch let error as DiscogsError {
            XCTAssertEqual(error, .unauthorized)
        } catch {
            XCTFail("Unexpected error: \(error)")
        }
    }

    func testMalformedJSONMapsToDecoding() async {
        MockURLProtocol.requestHandler = { [self] request in
            (response(status: 200, for: request), Data("not json".utf8))
        }

        do {
            _ = try await makeService().searchByQuery("rumours")
            XCTFail("Expected DiscogsError.decoding")
        } catch let error as DiscogsError {
            XCTAssertEqual(error, .decoding)
        } catch {
            XCTFail("Unexpected error: \(error)")
        }
    }
}

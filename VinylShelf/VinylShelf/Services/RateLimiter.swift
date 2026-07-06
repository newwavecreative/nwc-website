import Foundation

/// Sliding-window rate limiter. Callers `await waitForSlot()` before each
/// request; the actor sleeps until a slot inside the window frees up.
/// Configured for Discogs' 60 requests/minute in `DiscogsService`.
actor RateLimiter {
    private let maxRequests: Int
    private let window: TimeInterval
    private var timestamps: [Date] = []

    init(maxRequests: Int = 60, per window: TimeInterval = 60) {
        self.maxRequests = maxRequests
        self.window = window
    }

    func waitForSlot() async throws {
        while true {
            let now = Date()
            timestamps.removeAll { now.timeIntervalSince($0) >= window }
            if timestamps.count < maxRequests {
                timestamps.append(now)
                return
            }
            let earliest = timestamps[0]
            let waitTime = max(window - now.timeIntervalSince(earliest), 0.05)
            try await Task.sleep(nanoseconds: UInt64(waitTime * 1_000_000_000))
        }
    }
}

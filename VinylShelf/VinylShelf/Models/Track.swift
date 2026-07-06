import Foundation

/// A single track on a release. Plain Codable struct — NOT a SwiftData model.
/// Persisted as encoded JSON in `VinylRecord.tracklistData`.
struct Track: Codable, Hashable, Identifiable {
    var position: String
    var title: String
    var duration: String?

    var id: String { "\(position)-\(title)" }
}

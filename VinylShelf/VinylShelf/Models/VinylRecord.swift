import Foundation
import SwiftData

/// A record in the user's collection (or wishlist, when `isInWishlist` is true).
///
/// CloudKit-compatible by construction: every stored property has a default value
/// or is optional, and there are no `@Attribute(.unique)` constraints — uniqueness
/// on `discogsID` is enforced in `RecordStore`.
@Model
final class VinylRecord {
    var id: UUID = UUID()
    var discogsID: Int = 0
    var title: String = ""
    var artist: String = ""
    var year: Int?
    var label: String?
    var catalogNumber: String?
    var genres: [String] = []
    var coverImageURL: String?
    var backCoverImageURL: String?
    var tracklistData: Data?
    var mediaCondition: String?
    var sleeveCondition: String?
    var purchasePrice: Double?
    var notes: String?
    var rating: Int?
    var dateAdded: Date = Date()
    var isInWishlist: Bool = false

    init(
        discogsID: Int = 0,
        title: String = "",
        artist: String = "",
        year: Int? = nil,
        label: String? = nil,
        catalogNumber: String? = nil,
        genres: [String] = [],
        coverImageURL: String? = nil,
        backCoverImageURL: String? = nil,
        tracklistData: Data? = nil,
        mediaCondition: String? = nil,
        sleeveCondition: String? = nil,
        purchasePrice: Double? = nil,
        notes: String? = nil,
        rating: Int? = nil,
        dateAdded: Date = Date(),
        isInWishlist: Bool = false
    ) {
        self.discogsID = discogsID
        self.title = title
        self.artist = artist
        self.year = year
        self.label = label
        self.catalogNumber = catalogNumber
        self.genres = genres
        self.coverImageURL = coverImageURL
        self.backCoverImageURL = backCoverImageURL
        self.tracklistData = tracklistData
        self.mediaCondition = mediaCondition
        self.sleeveCondition = sleeveCondition
        self.purchasePrice = purchasePrice
        self.notes = notes
        self.rating = rating
        self.dateAdded = dateAdded
        self.isInWishlist = isInWishlist
    }
}

// MARK: - Tracklist encoding

extension VinylRecord {
    /// Tracks are stored as encoded JSON because SwiftData + CloudKit cannot
    /// persist arbitrary Codable structs directly.
    var tracklist: [Track] {
        get {
            guard let data = tracklistData else { return [] }
            return (try? JSONDecoder().decode([Track].self, from: data)) ?? []
        }
        set {
            tracklistData = newValue.isEmpty ? nil : try? JSONEncoder().encode(newValue)
        }
    }
}

// MARK: - Mapping from Discogs

extension VinylRecord {
    convenience init(release: DiscogsRelease, isInWishlist: Bool = false) {
        let tracks = (release.tracklist ?? []).map {
            Track(position: $0.position ?? "", title: $0.title ?? "", duration: $0.duration)
        }
        self.init(
            discogsID: release.id,
            title: release.displayTitle,
            artist: release.displayArtist,
            year: release.year,
            label: release.labels?.first?.name,
            catalogNumber: release.labels?.first?.catno,
            genres: release.genres ?? [],
            coverImageURL: release.coverImage ?? release.thumb,
            backCoverImageURL: release.backCoverImage,
            tracklistData: tracks.isEmpty ? nil : try? JSONEncoder().encode(tracks),
            isInWishlist: isInWishlist
        )
    }
}

// MARK: - Condition grades

enum RecordCondition {
    /// Standard Goldmine grading scale.
    static let grades = ["Mint", "Near Mint", "VG+", "VG", "G+", "G", "F", "P"]
}

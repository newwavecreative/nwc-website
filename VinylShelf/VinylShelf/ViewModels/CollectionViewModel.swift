import Foundation
import Observation
import SwiftData

/// Shelf ordering options. Raw values are persisted via AppStorage.
enum ShelfSort: String, CaseIterable, Identifiable {
    case mostRecent
    case artistAZ
    case artistZA
    case titleAZ
    case titleZA

    var id: Self { self }

    var displayName: String {
        switch self {
        case .mostRecent: return "Most Recent"
        case .artistAZ: return "Artist A–Z"
        case .artistZA: return "Artist Z–A"
        case .titleAZ: return "Title A–Z"
        case .titleZA: return "Title Z–A"
        }
    }
}

@MainActor
@Observable
final class CollectionViewModel {
    enum AddRoute: Identifiable {
        case scanner
        case search

        var id: Self { self }
    }

    var isShowingAddDialog = false
    var addRoute: AddRoute?

    private let store = RecordStore()

    /// In-memory shelf filtering and ordering: genre chip + free-text search
    /// over title and artist, then the chosen sort. Fast enough for
    /// collections in the hundreds. Incoming records arrive newest-first
    /// from the @Query, so `.mostRecent` keeps that order.
    func filter(
        _ records: [VinylRecord],
        searchText: String,
        genre: String?,
        sort: ShelfSort = .mostRecent
    ) -> [VinylRecord] {
        var result = records
        if let genre {
            result = result.filter { $0.genres.contains(genre) }
        }
        let query = searchText.trimmingCharacters(in: .whitespacesAndNewlines)
        if !query.isEmpty {
            result = result.filter {
                $0.title.localizedCaseInsensitiveContains(query)
                    || $0.artist.localizedCaseInsensitiveContains(query)
            }
        }
        switch sort {
        case .mostRecent:
            return result
        case .artistAZ:
            return result.sorted { artistOrdering($0, $1) == .orderedAscending }
        case .artistZA:
            return result.sorted { artistOrdering($0, $1) == .orderedDescending }
        case .titleAZ:
            return result.sorted { $0.title.localizedCaseInsensitiveCompare($1.title) == .orderedAscending }
        case .titleZA:
            return result.sorted { $0.title.localizedCaseInsensitiveCompare($1.title) == .orderedDescending }
        }
    }

    /// Record-store filing: compare by artist ignoring a leading "The"
    /// (The Beatles under B), tie-breaking by title so an artist's albums
    /// stay alphabetized within their block.
    private func artistOrdering(_ lhs: VinylRecord, _ rhs: VinylRecord) -> ComparisonResult {
        let left = Self.filingName(lhs.artist)
        let right = Self.filingName(rhs.artist)
        let byArtist = left.localizedCaseInsensitiveCompare(right)
        guard byArtist == .orderedSame else { return byArtist }
        return lhs.title.localizedCaseInsensitiveCompare(rhs.title)
    }

    private static func filingName(_ artist: String) -> String {
        let trimmed = artist.trimmingCharacters(in: .whitespaces)
        if trimmed.lowercased().hasPrefix("the "), trimmed.count > 4 {
            return String(trimmed.dropFirst(4))
        }
        return trimmed
    }

    func delete(_ record: VinylRecord, in context: ModelContext) {
        context.delete(record)
        try? context.save()
    }

    func moveToWishlist(_ record: VinylRecord, in context: ModelContext) {
        record.isInWishlist = true
        try? context.save()
    }

    func add(
        _ release: DiscogsRelease,
        toWishlist: Bool,
        in context: ModelContext
    ) throws -> RecordStore.AddResult {
        try store.add(release, toWishlist: toWishlist, in: context)
    }
}

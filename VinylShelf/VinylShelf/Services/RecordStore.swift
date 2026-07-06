import Foundation
import SwiftData

/// Service-layer insertion with deduplication. CloudKit doesn't support
/// `@Attribute(.unique)`, so uniqueness on `discogsID` is enforced here
/// instead of in the model.
struct RecordStore {
    enum AddResult: Equatable {
        /// A new record was inserted.
        case inserted
        /// The release was already on the wishlist and has been moved to the collection.
        case movedToCollection
        /// The release is already saved; nothing was inserted.
        case alreadyExists

        var userMessage: String {
            switch self {
            case .inserted: return "Added to your shelf."
            case .movedToCollection: return "Moved from your wishlist to your collection."
            case .alreadyExists: return "Already in your collection."
            }
        }
    }

    @discardableResult
    func add(
        _ release: DiscogsRelease,
        toWishlist: Bool,
        in context: ModelContext
    ) throws -> AddResult {
        let discogsID = release.id
        var descriptor = FetchDescriptor<VinylRecord>(
            predicate: #Predicate { $0.discogsID == discogsID }
        )
        descriptor.fetchLimit = 1

        if let existing = try context.fetch(descriptor).first {
            if existing.isInWishlist && !toWishlist {
                existing.isInWishlist = false
                try context.save()
                return .movedToCollection
            }
            return .alreadyExists
        }

        let record = VinylRecord(release: release, isInWishlist: toWishlist)
        context.insert(record)
        try context.save()
        return .inserted
    }
}

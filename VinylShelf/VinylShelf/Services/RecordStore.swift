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

        /// User-facing confirmation in the brand voice.
        func userMessage(addedToWishlist: Bool) -> String {
            switch self {
            case .inserted: return addedToWishlist ? "On the hunt." : "Filed on the shelf."
            case .movedToCollection: return "Moved from your wishlist to your shelf."
            case .alreadyExists: return "Already on your shelf."
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
                Analytics.track(AnalyticsEvent.recordAdded, ["destination": "shelf", "via": "wishlistMove"])
                return .movedToCollection
            }
            return .alreadyExists
        }

        let record = VinylRecord(release: release, isInWishlist: toWishlist)
        context.insert(record)
        try context.save()
        Analytics.track(AnalyticsEvent.recordAdded, ["destination": toWishlist ? "wishlist" : "shelf"])
        return .inserted
    }
}

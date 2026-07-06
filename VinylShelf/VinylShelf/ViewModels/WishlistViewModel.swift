import Foundation
import Observation
import SwiftData

@MainActor
@Observable
final class WishlistViewModel {
    func moveToCollection(_ record: VinylRecord, in context: ModelContext) {
        record.isInWishlist = false
        try? context.save()
    }

    func delete(_ record: VinylRecord, in context: ModelContext) {
        context.delete(record)
        try? context.save()
    }
}

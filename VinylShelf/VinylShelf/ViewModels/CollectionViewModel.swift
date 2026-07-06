import Foundation
import Observation
import SwiftData

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

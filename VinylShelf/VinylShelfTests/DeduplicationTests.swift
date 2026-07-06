import SwiftData
import XCTest
@testable import VinylShelf

@MainActor
final class DeduplicationTests: XCTestCase {

    private var container: ModelContainer!
    private var context: ModelContext!
    private let store = RecordStore()

    override func setUp() async throws {
        let configuration = ModelConfiguration(isStoredInMemoryOnly: true, cloudKitDatabase: .none)
        container = try ModelContainer(for: VinylRecord.self, configurations: configuration)
        context = ModelContext(container)
    }

    override func tearDown() async throws {
        container = nil
        context = nil
    }

    private func makeRelease(id: Int = 249504) -> DiscogsRelease {
        DiscogsRelease(
            id: id,
            title: "Rumours",
            artistsSort: "Fleetwood Mac",
            year: 1977,
            labels: [DiscogsLabel(name: "Warner Bros. Records", catno: "BSK 3010")],
            genres: ["Rock"],
            coverImage: "https://img.discogs.com/rumours.jpg",
            tracklist: [DiscogsTrack(position: "A1", title: "Second Hand News", duration: "2:43")]
        )
    }

    private func fetchAll() throws -> [VinylRecord] {
        try context.fetch(FetchDescriptor<VinylRecord>())
    }

    // MARK: - Tests

    func testAddingNewReleaseInserts() throws {
        let result = try store.add(makeRelease(), toWishlist: false, in: context)

        XCTAssertEqual(result, .inserted)
        let records = try fetchAll()
        XCTAssertEqual(records.count, 1)
        let record = try XCTUnwrap(records.first)
        XCTAssertEqual(record.discogsID, 249504)
        XCTAssertEqual(record.title, "Rumours")
        XCTAssertEqual(record.artist, "Fleetwood Mac")
        XCTAssertEqual(record.label, "Warner Bros. Records")
        XCTAssertEqual(record.catalogNumber, "BSK 3010")
        XCTAssertFalse(record.isInWishlist)
        XCTAssertEqual(record.tracklist.count, 1, "Tracklist should round-trip through tracklistData")
    }

    func testAddingDuplicateToCollectionDoesNotInsert() throws {
        _ = try store.add(makeRelease(), toWishlist: false, in: context)

        let result = try store.add(makeRelease(), toWishlist: false, in: context)

        XCTAssertEqual(result, .alreadyExists)
        XCTAssertEqual(try fetchAll().count, 1)
    }

    func testAddingWishlistedReleaseToCollectionFlipsFlag() throws {
        _ = try store.add(makeRelease(), toWishlist: true, in: context)

        let result = try store.add(makeRelease(), toWishlist: false, in: context)

        XCTAssertEqual(result, .movedToCollection)
        let records = try fetchAll()
        XCTAssertEqual(records.count, 1, "Moving to collection must not create a duplicate")
        XCTAssertEqual(records.first?.isInWishlist, false)
    }

    func testAddingCollectionReleaseToWishlistIsRejected() throws {
        _ = try store.add(makeRelease(), toWishlist: false, in: context)

        let result = try store.add(makeRelease(), toWishlist: true, in: context)

        XCTAssertEqual(result, .alreadyExists)
        let records = try fetchAll()
        XCTAssertEqual(records.count, 1)
        XCTAssertEqual(records.first?.isInWishlist, false, "Owned records must not be demoted to the wishlist")
    }

    func testAddingWishlistDuplicateToWishlistIsRejected() throws {
        _ = try store.add(makeRelease(), toWishlist: true, in: context)

        let result = try store.add(makeRelease(), toWishlist: true, in: context)

        XCTAssertEqual(result, .alreadyExists)
        XCTAssertEqual(try fetchAll().count, 1)
    }

    func testDifferentReleasesBothInsert() throws {
        _ = try store.add(makeRelease(id: 1), toWishlist: false, in: context)
        let result = try store.add(makeRelease(id: 2), toWishlist: false, in: context)

        XCTAssertEqual(result, .inserted)
        XCTAssertEqual(try fetchAll().count, 2)
    }
}

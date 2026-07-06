import SwiftData
import SwiftUI

struct WishlistView: View {
    @Environment(\.modelContext) private var modelContext
    @Query(
        filter: #Predicate<VinylRecord> { $0.isInWishlist },
        sort: \VinylRecord.dateAdded,
        order: .reverse
    )
    private var records: [VinylRecord]

    @State private var viewModel = WishlistViewModel()

    private let columns = [GridItem(.adaptive(minimum: 150), spacing: 16)]

    var body: some View {
        NavigationStack {
            content
                .navigationTitle("Wishlist")
                .navigationDestination(for: VinylRecord.self) { record in
                    RecordDetailView(record: record)
                }
        }
    }

    @ViewBuilder
    private var content: some View {
        if records.isEmpty {
            EmptyStateView(
                systemImage: "heart",
                title: "Nothing on Your Wishlist",
                message: "Records you're hunting for will show up here."
            )
        } else {
            ScrollView {
                LazyVGrid(columns: columns, spacing: 20) {
                    ForEach(records) { record in
                        NavigationLink(value: record) {
                            RecordGridItemView(record: record)
                        }
                        .buttonStyle(.plain)
                        .contextMenu {
                            Button {
                                viewModel.moveToCollection(record, in: modelContext)
                            } label: {
                                Label("Move to Collection", systemImage: "square.grid.2x2")
                            }
                            Button(role: .destructive) {
                                viewModel.delete(record, in: modelContext)
                            } label: {
                                Label("Delete", systemImage: "trash")
                            }
                        }
                    }
                }
                .padding()
            }
        }
    }
}

#Preview {
    WishlistView()
        .modelContainer(for: VinylRecord.self, inMemory: true)
}

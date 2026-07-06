import SwiftData
import SwiftUI

struct CollectionView: View {
    @Environment(\.modelContext) private var modelContext
    @Query(
        filter: #Predicate<VinylRecord> { !$0.isInWishlist },
        sort: \VinylRecord.dateAdded,
        order: .reverse
    )
    private var records: [VinylRecord]

    @State private var viewModel = CollectionViewModel()

    private let columns = [GridItem(.adaptive(minimum: 150), spacing: 16)]

    var body: some View {
        NavigationStack {
            ZStack(alignment: .bottomTrailing) {
                content
                addButton
            }
            .navigationTitle("Collection")
            .navigationDestination(for: VinylRecord.self) { record in
                RecordDetailView(record: record)
            }
        }
        .confirmationDialog("Add a Record", isPresented: $viewModel.isShowingAddDialog) {
            Button("Scan Barcode") { viewModel.addRoute = .scanner }
            Button("Search Manually") { viewModel.addRoute = .search }
        }
        .fullScreenCover(item: $viewModel.addRoute) { route in
            switch route {
            case .scanner:
                ScannerFlowView()
            case .search:
                NavigationStack {
                    SearchView(isModal: true)
                }
            }
        }
    }

    @ViewBuilder
    private var content: some View {
        if records.isEmpty {
            EmptyStateView(
                systemImage: "opticaldisc",
                title: "No Records Yet",
                message: "Scan a barcode or search Discogs to start your collection."
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
                                viewModel.moveToWishlist(record, in: modelContext)
                            } label: {
                                Label("Move to Wishlist", systemImage: "heart")
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

    private var addButton: some View {
        Button {
            viewModel.isShowingAddDialog = true
        } label: {
            Image(systemName: "plus")
                .font(.title2.weight(.semibold))
                .foregroundStyle(.white)
                .frame(width: 56, height: 56)
                .background(Color.vinylAccent, in: Circle())
                .shadow(radius: 4, y: 2)
        }
        .padding(24)
        .accessibilityLabel("Add a record")
    }
}

#Preview {
    CollectionView()
        .modelContainer(for: VinylRecord.self, inMemory: true)
}

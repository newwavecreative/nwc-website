import SwiftData
import SwiftUI

/// "My Shelf" — the user's collection, searchable and filterable by genre,
/// with grid and compact list presentations.
struct CollectionView: View {
    enum ViewMode: String {
        case grid
        case list
    }

    @Environment(\.modelContext) private var modelContext
    @Query(
        filter: #Predicate<VinylRecord> { !$0.isInWishlist },
        sort: \VinylRecord.dateAdded,
        order: .reverse
    )
    private var records: [VinylRecord]

    @State private var viewModel = CollectionViewModel()
    @State private var searchText = ""
    @State private var selectedGenre: String?
    @AppStorage("shelfViewMode") private var viewMode: ViewMode = .grid

    private let columns = [GridItem(.adaptive(minimum: 150), spacing: 16)]

    private var genres: [String] {
        Array(Set(records.flatMap(\.genres))).sorted()
    }

    private var filteredRecords: [VinylRecord] {
        viewModel.filter(records, searchText: searchText, genre: selectedGenre)
    }

    var body: some View {
        NavigationStack {
            ZStack(alignment: .bottomTrailing) {
                content
                addButton
            }
            .navigationTitle("Shelf")
            .toolbar { viewModeToggle }
            .searchable(text: $searchText, prompt: "Search your shelf")
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

    // MARK: - Content

    @ViewBuilder
    private var content: some View {
        if records.isEmpty {
            EmptyStateView(
                systemImage: "opticaldisc",
                title: "Your Shelf Is Empty",
                message: "Scan a barcode or search Discogs to add your first record."
            )
        } else {
            VStack(spacing: 0) {
                if genres.count > 1 {
                    genreFilterBar
                }

                if filteredRecords.isEmpty {
                    ContentUnavailableView.search
                } else {
                    switch viewMode {
                    case .grid: recordGrid
                    case .list: recordList
                    }
                }
            }
        }
    }

    private var recordGrid: some View {
        ScrollView {
            LazyVGrid(columns: columns, spacing: 20) {
                ForEach(filteredRecords) { record in
                    NavigationLink(value: record) {
                        RecordGridItemView(record: record)
                    }
                    .buttonStyle(.plain)
                    .contextMenu { menuItems(for: record) }
                }
            }
            .padding()
        }
    }

    private var recordList: some View {
        ScrollView {
            LazyVStack(spacing: 0) {
                ForEach(filteredRecords) { record in
                    NavigationLink(value: record) {
                        ShelfListRowView(record: record)
                    }
                    .buttonStyle(.plain)
                    .contextMenu { menuItems(for: record) }

                    Divider()
                        .padding(.leading)
                }
            }
        }
    }

    @ViewBuilder
    private func menuItems(for record: VinylRecord) -> some View {
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

    // MARK: - Genre filter

    private var genreFilterBar: some View {
        ScrollView(.horizontal, showsIndicators: false) {
            HStack(spacing: 8) {
                genreChip("All", isSelected: selectedGenre == nil) {
                    selectedGenre = nil
                }
                ForEach(genres, id: \.self) { genre in
                    genreChip(genre, isSelected: selectedGenre == genre) {
                        selectedGenre = (selectedGenre == genre) ? nil : genre
                    }
                }
            }
            .padding(.horizontal)
            .padding(.vertical, 8)
        }
    }

    private func genreChip(_ title: String, isSelected: Bool, action: @escaping () -> Void) -> some View {
        Button(action: action) {
            Text(title)
                .font(.subheadline.weight(isSelected ? .semibold : .regular))
                .padding(.horizontal, 14)
                .padding(.vertical, 7)
                .background(
                    isSelected ? AnyShapeStyle(Color.vinylAccent) : AnyShapeStyle(.quaternary),
                    in: Capsule()
                )
                .foregroundStyle(isSelected ? .black : .primary)
        }
        .buttonStyle(.plain)
    }

    // MARK: - Toolbar & floating button

    private var viewModeToggle: some ToolbarContent {
        ToolbarItem(placement: .topBarTrailing) {
            Button {
                viewMode = (viewMode == .grid) ? .list : .grid
            } label: {
                Image(systemName: viewMode == .grid ? "list.bullet" : "square.grid.2x2")
            }
            .accessibilityLabel(viewMode == .grid ? "Switch to list view" : "Switch to grid view")
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

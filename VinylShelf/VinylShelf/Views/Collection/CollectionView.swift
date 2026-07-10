import SwiftData
import SwiftUI

/// "My Shelf" — the collection home per `Design/ui_kits/.../ShelfScreen.jsx`:
/// mono eyebrow + big record count, genre filter chips, record grid (or the
/// compact list for large collections). Searchable; floating yellow FAB adds.
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
    @State private var isScrolled = false
    @AppStorage("shelfViewMode") private var viewMode: ViewMode = .grid
    @AppStorage("shelfSortOrder") private var sortOrder: ShelfSort = .mostRecent

    private let columns = [GridItem(.adaptive(minimum: 150), spacing: 16)]

    private var genres: [String] {
        Array(Set(records.flatMap(\.genres))).sorted()
    }

    private var filteredRecords: [VinylRecord] {
        viewModel.filter(records, searchText: searchText, genre: selectedGenre, sort: sortOrder)
    }

    var body: some View {
        NavigationStack {
            ZStack(alignment: .bottomTrailing) {
                content
                addButton
            }
            .vsScreenBackground()
            .navigationTitle("")
            .navigationBarTitleDisplayMode(.inline)
            .toolbar { logoToolbarItem }
            .toolbar { viewModeToggle }
            .searchable(text: $searchText, prompt: "Search your shelf")
            .navigationDestination(for: VinylRecord.self) { record in
                RecordDetailView(record: record)
            }
        }
        .confirmationDialog("Add a record", isPresented: $viewModel.isShowingAddDialog) {
            Button("Scan barcode") { viewModel.addRoute = .scanner }
            Button("Search manually") { viewModel.addRoute = .search }
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
                title: "Your shelf is empty",
                message: "Let's find your first record — scan a barcode or search.",
                useBrandMark: true
            )
        } else {
            ScrollView {
                VStack(alignment: .leading, spacing: 0) {
                    header
                        .padding(.horizontal, 20)
                        .padding(.top, 4)

                    if genres.count > 1 {
                        genreFilterBar
                            .padding(.vertical, 12)
                    } else {
                        Spacer()
                            .frame(height: 16)
                    }

                    if filteredRecords.isEmpty {
                        EmptyStateView(
                            systemImage: "magnifyingglass",
                            title: "No matches",
                            message: "Nothing on your shelf matches that filter."
                        )
                        .padding(.top, 48)
                    } else {
                        switch viewMode {
                        case .grid: recordGrid
                        case .list: recordList
                        }
                    }
                }
                .padding(.bottom, 96)
                .background(
                    GeometryReader { proxy in
                        Color.clear.preference(
                            key: ShelfScrollOffsetKey.self,
                            value: proxy.frame(in: .named("shelfScroll")).minY
                        )
                    }
                )
            }
            .coordinateSpace(name: "shelfScroll")
            .onPreferenceChange(ShelfScrollOffsetKey.self) { offset in
                withAnimation(.easeOut(duration: 0.2)) {
                    isScrolled = offset < -12
                }
            }
        }
    }

    private var header: some View {
        HStack(alignment: .bottom) {
            VStack(alignment: .leading, spacing: 2) {
                VSSectionLabel(text: "Your shelf")
                Text("^[\(records.count) record](inflect: true)")
                    .font(.vsDisplay(32))
                    .kerning(-0.6)
                    .foregroundStyle(Color.vsTextPrimary)
            }

            Spacer()

            sortMenu
        }
    }

    private var sortMenu: some View {
        Menu {
            Picker("Sort by", selection: $sortOrder) {
                ForEach(ShelfSort.allCases) { sort in
                    Text(sort.displayName).tag(sort)
                }
            }
        } label: {
            Image(systemName: "arrow.up.arrow.down")
                .font(.system(size: 17, weight: .medium))
                .foregroundStyle(Color.vsTextSecondary)
                .frame(width: 44, height: 44)
                .background(Color.vsSurfaceRaised, in: Circle())
                .overlay(
                    Circle()
                        .strokeBorder(Color.vsBorderDefault, lineWidth: 1)
                )
        }
        .accessibilityLabel("Sort by: \(sortOrder.displayName)")
    }

    private var recordGrid: some View {
        LazyVGrid(columns: columns, spacing: 20) {
            ForEach(filteredRecords) { record in
                NavigationLink(value: record) {
                    RecordGridItemView(record: record)
                }
                .buttonStyle(VSPressButtonStyle())
                .contextMenu { menuItems(for: record) }
            }
        }
        .padding(.horizontal, 20)
        .padding(.top, 4)
    }

    private var recordList: some View {
        LazyVStack(spacing: 0) {
            ForEach(filteredRecords) { record in
                NavigationLink(value: record) {
                    ShelfListRowView(record: record)
                }
                .buttonStyle(.plain)
                .contextMenu { menuItems(for: record) }

                Divider()
                    .overlay(Color.vsBorderSubtle)
            }
        }
        .padding(.horizontal, 20)
    }

    @ViewBuilder
    private func menuItems(for record: VinylRecord) -> some View {
        Button {
            viewModel.moveToWishlist(record, in: modelContext)
        } label: {
            Label("Move to wishlist", systemImage: "heart")
        }
        Button(role: .destructive) {
            viewModel.delete(record, in: modelContext)
        } label: {
            Label("Delete", systemImage: "trash")
        }
    }

    // MARK: - Genre filter (Chip.jsx)

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
            .padding(.horizontal, 20)
        }
    }

    private func genreChip(_ title: String, isSelected: Bool, action: @escaping () -> Void) -> some View {
        Button(action: action) {
            Text(title)
                .font(.vsBody(13, weight: .medium))
                .foregroundStyle(isSelected ? Color.vsYellow500 : Color.vsTextSecondary)
                .padding(.horizontal, 14)
                .frame(height: 34)
                .background(isSelected ? Color.vsAccentSoft : .clear, in: Capsule())
                .overlay(
                    Capsule()
                        .strokeBorder(
                            isSelected ? Color.vsYellow600 : Color.vsBorderDefault,
                            lineWidth: 1
                        )
                )
        }
        .buttonStyle(VSPressButtonStyle())
    }

    // MARK: - Toolbar & FAB

    /// Full logo lockup pinned to the very top-left, above the search bar.
    /// Fades out once the shelf scrolls, leaving only the view toggle sticky.
    private var logoToolbarItem: some ToolbarContent {
        ToolbarItem(placement: .topBarLeading) {
            HStack(spacing: 8) {
                BrandMarkView()
                    .frame(width: 28, height: 28)

                Text("Vinyl Shelf")
                    .font(.vsDisplay(17))
                    .kerning(-0.3)
                    .foregroundStyle(Color.vsTextPrimary)
                    .lineLimit(1)
            }
            // Keep the toolbar from compressing the lockup and dropping
            // the wordmark.
            .fixedSize(horizontal: true, vertical: false)
            .opacity(isScrolled ? 0 : 1)
            .accessibilityHidden(true)
        }
    }

    private var viewModeToggle: some ToolbarContent {
        ToolbarItem(placement: .topBarTrailing) {
            Button {
                withAnimation(VSMotion.spring) {
                    viewMode = (viewMode == .grid) ? .list : .grid
                }
            } label: {
                Image(systemName: viewMode == .grid ? "list.bullet" : "square.grid.2x2")
                    .foregroundStyle(Color.vsTextSecondary)
            }
            .accessibilityLabel(viewMode == .grid ? "Switch to list view" : "Switch to grid view")
        }
    }

    private var addButton: some View {
        Button {
            viewModel.isShowingAddDialog = true
        } label: {
            Image(systemName: "plus")
                .font(.title2.weight(.bold))
                .foregroundStyle(Color.vsTextOnYellow)
                .frame(width: 56, height: 56)
                .background(LinearGradient.vsYellow, in: Circle())
                .shadow(color: Color.vsYellow500.opacity(0.35), radius: 12, y: 4)
        }
        .buttonStyle(VSPressButtonStyle())
        .padding(24)
        .accessibilityLabel("Add a record")
    }
}

private struct ShelfScrollOffsetKey: PreferenceKey {
    static var defaultValue: CGFloat = 0

    static func reduce(value: inout CGFloat, nextValue: () -> CGFloat) {
        value = nextValue()
    }
}

#Preview {
    CollectionView()
        .modelContainer(for: VinylRecord.self, inMemory: true)
        .preferredColorScheme(.dark)
}

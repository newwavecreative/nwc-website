import SwiftData
import SwiftUI

/// "My Shelf" — the collection home per `Design/ui_kits/.../ShelfScreen.jsx`.
/// Fully custom header (system nav bar hidden): logo lockup + styled search
/// field + record count + sort scroll away with the content; the grid/list
/// toggle stays pinned top-right, and the yellow FAB adds records.
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
    @AppStorage("shelfSortOrder") private var sortOrder: ShelfSort = .mostRecent
    @FocusState private var isSearchFocused: Bool

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
            .overlay(alignment: .topTrailing) {
                if !records.isEmpty {
                    viewModeButton
                        .padding(.trailing, 20)
                        .padding(.top, 8)
                }
            }
            .vsScreenBackground()
            .toolbar(.hidden, for: .navigationBar)
            .toolbar {
                ToolbarItemGroup(placement: .keyboard) {
                    Spacer()
                    Button("Done") {
                        isSearchFocused = false
                    }
                    .font(.vsBody(15, weight: .semibold))
                    .foregroundStyle(Color.vsYellow500)
                }
            }
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
            VStack(alignment: .leading, spacing: 0) {
                logoRow
                    .padding(.horizontal, 20)
                    .padding(.top, 8)

                EmptyStateView(
                    systemImage: "opticaldisc",
                    title: "Your shelf is empty",
                    message: "Let's find your first record — scan a barcode or search.",
                    useBrandMark: true
                )
            }
        } else {
            ScrollView {
                VStack(alignment: .leading, spacing: 0) {
                    logoRow
                        .padding(.horizontal, 20)
                        .padding(.top, 8)

                    searchField
                        .padding(.horizontal, 20)
                        .padding(.top, 14)

                    header
                        .padding(.horizontal, 20)
                        .padding(.top, 18)

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
            }
            .scrollDismissesKeyboard(.interactively)
        }
    }

    /// Full logo lockup — scrolls away with the content.
    private var logoRow: some View {
        HStack(spacing: 10) {
            BrandMarkView()
                .frame(width: 32, height: 32)

            Text("Vinyl Shelf")
                .font(.vsDisplay(20))
                .kerning(-0.4)
                .foregroundStyle(Color.vsTextPrimary)
        }
        .accessibilityHidden(true)
    }

    /// Design-system search field (mirrors the Search tab's input).
    private var searchField: some View {
        HStack(spacing: 10) {
            Image(systemName: "magnifyingglass")
                .foregroundStyle(Color.vsTextMuted)

            TextField(
                "",
                text: $searchText,
                prompt: Text("Search your shelf")
                    .foregroundStyle(Color.vsTextMuted)
            )
            .font(.vsBody(15))
            .foregroundStyle(Color.vsTextPrimary)
            .focused($isSearchFocused)
            .submitLabel(.done)
            .autocorrectionDisabled()

            if !searchText.isEmpty {
                Button {
                    searchText = ""
                } label: {
                    Image(systemName: "xmark.circle.fill")
                        .foregroundStyle(Color.vsTextMuted)
                }
                .accessibilityLabel("Clear search")
            }
        }
        .padding(.horizontal, 14)
        .frame(height: 48)
        .background(Color.vsSurfaceRaised, in: RoundedRectangle(cornerRadius: 14))
        .overlay(
            RoundedRectangle(cornerRadius: 14)
                .strokeBorder(
                    isSearchFocused ? Color.vsBlue400 : Color.vsBorderSubtle,
                    lineWidth: 1
                )
        )
        .animation(.easeOut(duration: 0.15), value: isSearchFocused)
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
            circleButtonLabel(systemImage: "arrow.up.arrow.down")
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

    // MARK: - Pinned controls & FAB

    /// Stays pinned top-right while the header scrolls away.
    private var viewModeButton: some View {
        Button {
            withAnimation(VSMotion.spring) {
                viewMode = (viewMode == .grid) ? .list : .grid
            }
        } label: {
            circleButtonLabel(systemImage: viewMode == .grid ? "list.bullet" : "square.grid.2x2")
        }
        .buttonStyle(VSPressButtonStyle())
        .accessibilityLabel(viewMode == .grid ? "Switch to list view" : "Switch to grid view")
    }

    private func circleButtonLabel(systemImage: String) -> some View {
        Image(systemName: systemImage)
            .font(.system(size: 17, weight: .medium))
            .foregroundStyle(Color.vsTextSecondary)
            .frame(width: 44, height: 44)
            .background(Color.vsSurfaceRaised, in: Circle())
            .overlay(
                Circle()
                    .strokeBorder(Color.vsBorderDefault, lineWidth: 1)
            )
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

#Preview {
    CollectionView()
        .modelContainer(for: VinylRecord.self, inMemory: true)
        .preferredColorScheme(.dark)
}

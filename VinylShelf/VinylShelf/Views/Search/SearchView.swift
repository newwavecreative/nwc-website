import SwiftUI

/// "Add a record" — debounced Discogs search per `SearchScreen.jsx`.
/// Lives in its own tab and is also presented modally from the shelf's "+"
/// button (`isModal` adds a Cancel affordance).
struct SearchView: View {
    var isModal = false

    @State private var viewModel = SearchViewModel()
    @State private var isShowingScanner = false
    @Environment(\.dismiss) private var dismiss
    @FocusState private var isSearchFocused: Bool
    @Namespace private var searchFieldNamespace

    /// Resting layout: field mid-screen (thumb-reachable) between the title
    /// and helper copy. Focusing the field or having an active search slides
    /// it to the top where results need it.
    private var isHero: Bool {
        guard case .idle = viewModel.state else { return false }
        return viewModel.query.isEmpty && !isSearchFocused
    }

    var body: some View {
        VStack(alignment: .leading, spacing: 0) {
            header
                .padding(.horizontal, 20)
                .padding(.top, 12)

            if isHero {
                heroSearch
            } else {
                searchField
                    .matchedGeometryEffect(id: "searchField", in: searchFieldNamespace)
                    .padding(.horizontal, 20)
                    .padding(.top, 12)

                activeContent
            }
        }
        .animation(VSMotion.spring, value: isHero)
        .vsScreenBackground()
        .toolbar(.hidden, for: .navigationBar)
        .toolbar {
            // Accessory bar above the keyboard — explicit dismiss.
            ToolbarItemGroup(placement: .keyboard) {
                Spacer()
                Button("Done") {
                    isSearchFocused = false
                }
                .font(.vsBody(15, weight: .semibold))
                .foregroundStyle(Color.vsYellow500)
            }
        }
        .navigationDestination(for: DiscogsRelease.self) { release in
            ReleasePreviewLoaderView(releaseID: release.id) {
                if isModal { dismiss() }
            }
        }
        .fullScreenCover(isPresented: $isShowingScanner) {
            ScannerFlowView()
        }
    }

    private var header: some View {
        HStack(alignment: .firstTextBaseline) {
            Text("Add a record")
                .font(.vsDisplay(28))
                .kerning(-0.55)
                .foregroundStyle(Color.vsTextPrimary)

            Spacer()

            if isModal {
                Button("Cancel") { dismiss() }
                    .font(.vsBody(15, weight: .medium))
                    .foregroundStyle(Color.vsBlue300)
            }
        }
    }

    private var searchField: some View {
        HStack(spacing: 10) {
            Image(systemName: "magnifyingglass")
                .foregroundStyle(Color.vsTextMuted)

            TextField(
                "",
                text: $viewModel.query,
                prompt: Text("Search artists, albums, catalog #…")
                    .foregroundStyle(Color.vsTextMuted)
            )
            .font(.vsBody(15))
            .foregroundStyle(Color.vsTextPrimary)
            .focused($isSearchFocused)
            .submitLabel(.search)
            .onSubmit { viewModel.retry() }
            .autocorrectionDisabled()

            if !viewModel.query.isEmpty {
                Button {
                    viewModel.query = ""
                } label: {
                    Image(systemName: "xmark.circle.fill")
                        .foregroundStyle(Color.vsTextMuted)
                }
                .accessibilityLabel("Clear search")
            }

            Button {
                isSearchFocused = false
                isShowingScanner = true
            } label: {
                Image(systemName: "barcode.viewfinder")
                    .font(.system(size: 18, weight: .medium))
                    .foregroundStyle(Color.vsYellow500)
            }
            .buttonStyle(VSPressButtonStyle())
            .accessibilityLabel("Scan a barcode")
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

    /// Resting empty state: title → search field → helper copy, centered in
    /// comfortable thumb reach.
    private var heroSearch: some View {
        VStack(spacing: 0) {
            Spacer()

            VStack(spacing: 18) {
                Image(systemName: "magnifyingglass")
                    .font(.system(size: 36))
                    .foregroundStyle(Color.vsTextMuted)

                Text("Search For Vinyl")
                    .font(.vsDisplay(20))
                    .foregroundStyle(Color.vsTextPrimary)

                searchField
                    .matchedGeometryEffect(id: "searchField", in: searchFieldNamespace)

                Text("Find releases by artist, album title, or catalog number.")
                    .font(.vsBody(15))
                    .foregroundStyle(Color.vsTextSecondary)
                    .multilineTextAlignment(.center)
                    .padding(.horizontal, 24)
            }
            .padding(.horizontal, 20)

            Spacer()

            // Required attribution per the Discogs API terms.
            Text("Data provided by Discogs")
                .font(.vsMono(11))
                .kerning(0.4)
                .foregroundStyle(Color.vsTextMuted)
                .frame(maxWidth: .infinity)
                .padding(.bottom, 20)
        }
    }

    /// Content below the top-pinned field once the search is live.
    @ViewBuilder
    private var activeContent: some View {
        switch viewModel.state {
        case .idle:
            // Field focused, nothing typed yet.
            VStack(spacing: 0) {
                Text("Find releases by artist, album title, or catalog number.")
                    .font(.vsBody(14))
                    .foregroundStyle(Color.vsTextMuted)
                    .multilineTextAlignment(.center)
                    .padding(.horizontal, 40)
                    .padding(.top, 28)

                Spacer()
            }
            .frame(maxWidth: .infinity)
            .contentShape(Rectangle())
            .onTapGesture {
                isSearchFocused = false
            }
        case .loading:
            LoadingView(message: "Digging through the crates…")
        case .loaded(let releases):
            if releases.isEmpty {
                noMatchesState
            } else {
                resultsList(releases)
            }
        case .failed(let error):
            ErrorView(error: error) {
                viewModel.retry()
            }
        }
    }

    private var noMatchesState: some View {
        EmptyStateView(
            systemImage: "questionmark.circle",
            title: "No matches",
            message: "Nothing matched \"\(viewModel.query)\". Try artist and album together."
        )
        .contentShape(Rectangle())
        .onTapGesture {
            isSearchFocused = false
        }
    }

    private func resultsList(_ releases: [DiscogsRelease]) -> some View {
        ScrollView {
            LazyVStack(spacing: 10) {
                ForEach(releases) { release in
                    NavigationLink(value: release) {
                        SearchResultRowView(release: release)
                    }
                    .buttonStyle(VSPressButtonStyle())
                    .onAppear {
                        viewModel.loadMoreIfNeeded(after: release)
                    }
                }

                if viewModel.isLoadingMore {
                    ProgressView()
                        .tint(Color.vsYellow500)
                        .frame(maxWidth: .infinity)
                        .padding(.vertical, 12)
                }
            }
            .padding(.horizontal, 20)
            .padding(.vertical, 16)
        }
        // Dragging the results pulls the keyboard down with the scroll,
        // like Messages.
        .scrollDismissesKeyboard(.interactively)
    }
}

#Preview {
    NavigationStack {
        SearchView()
    }
    .modelContainer(for: VinylRecord.self, inMemory: true)
    .preferredColorScheme(.dark)
}

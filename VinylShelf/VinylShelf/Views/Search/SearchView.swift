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

    var body: some View {
        VStack(alignment: .leading, spacing: 0) {
            header
                .padding(.horizontal, 20)
                .padding(.top, 12)

            searchField
                .padding(.horizontal, 20)
                .padding(.top, 12)

            results
        }
        .vsScreenBackground()
        .toolbar(.hidden, for: .navigationBar)
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

    @ViewBuilder
    private var results: some View {
        switch viewModel.state {
        case .idle:
            VStack(spacing: 0) {
                EmptyStateView(
                    systemImage: "magnifyingglass",
                    title: "Search For Vinyl",
                    message: "Find releases by artist, album title, or catalog number."
                )

                // Required attribution per the Discogs API terms.
                Text("Data provided by Discogs")
                    .font(.vsMono(11))
                    .kerning(0.4)
                    .foregroundStyle(Color.vsTextMuted)
                    .padding(.bottom, 20)
            }
        case .loading:
            LoadingView(message: "Digging through the crates…")
        case .loaded(let releases):
            if releases.isEmpty {
                EmptyStateView(
                    systemImage: "questionmark.circle",
                    title: "No matches",
                    message: "Nothing matched \"\(viewModel.query)\". Try artist and album together."
                )
            } else {
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
            }
        case .failed(let error):
            ErrorView(error: error) {
                viewModel.retry()
            }
        }
    }
}

#Preview {
    NavigationStack {
        SearchView()
    }
    .modelContainer(for: VinylRecord.self, inMemory: true)
    .preferredColorScheme(.dark)
}

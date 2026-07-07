import SwiftUI

/// Manual search against Discogs, debounced ~400ms. Lives in its own tab and
/// is also presented modally from the Collection's "+" button (`isModal`).
struct SearchView: View {
    /// True when presented from the Collection "+" flow, adding a Cancel button.
    var isModal = false

    @State private var viewModel = SearchViewModel()
    @Environment(\.dismiss) private var dismiss

    var body: some View {
        content
            .navigationTitle("Search")
            .searchable(text: $viewModel.query, prompt: "Artist or album")
            .navigationDestination(for: DiscogsRelease.self) { release in
                ReleasePreviewLoaderView(releaseID: release.id) {
                    if isModal { dismiss() }
                }
            }
            .toolbar {
                if isModal {
                    ToolbarItem(placement: .cancellationAction) {
                        Button("Cancel") { dismiss() }
                    }
                }
            }
    }

    @ViewBuilder
    private var content: some View {
        switch viewModel.state {
        case .idle:
            EmptyStateView(
                systemImage: "magnifyingglass",
                title: "Search For Vinyl",
                message: "Find releases by artist or album title."
            )
        case .loading:
            LoadingView(message: "Searching Discogs…")
        case .loaded(let results):
            if results.isEmpty {
                EmptyStateView(
                    systemImage: "questionmark.circle",
                    title: "No Results",
                    message: "Nothing on Discogs matched \"\(viewModel.query)\"."
                )
            } else {
                List(results) { release in
                    NavigationLink(value: release) {
                        SearchResultRowView(release: release)
                    }
                }
                .listStyle(.plain)
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
}

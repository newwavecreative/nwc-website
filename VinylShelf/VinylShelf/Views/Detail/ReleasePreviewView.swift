import SwiftData
import SwiftUI

/// Preview of a Discogs release before it's saved — shown after tapping a
/// search result or scanning a barcode, with "Add to Collection" /
/// "Add to Wishlist" actions running through the dedup check.
struct ReleasePreviewView: View {
    let release: DiscogsRelease
    /// Called after a successful add (or wishlist→collection move) so the
    /// presenting flow can dismiss itself.
    var onAdded: (() -> Void)?

    @Environment(\.modelContext) private var modelContext
    @State private var resultMessage: String?
    @State private var isShowingResult = false
    @State private var addSucceeded = false

    private let store = RecordStore()

    var body: some View {
        List {
            header
            metadataSection
            tracklistSection
        }
        .listStyle(.insetGrouped)
        .navigationTitle(release.displayTitle)
        .navigationBarTitleDisplayMode(.inline)
        .safeAreaInset(edge: .bottom) { actionBar }
        .alert(resultMessage ?? "", isPresented: $isShowingResult) {
            Button("OK") {
                if addSucceeded {
                    onAdded?()
                }
            }
        }
    }

    private var header: some View {
        Section {
            VStack(spacing: 12) {
                AsyncCoverImage(urlString: release.coverImage ?? release.thumb, cornerRadius: 12)
                    .frame(maxWidth: 280)

                VStack(spacing: 4) {
                    Text(release.displayTitle)
                        .font(.title2.bold())
                        .multilineTextAlignment(.center)

                    if !release.displayArtist.isEmpty {
                        Text(release.displayArtist)
                            .font(.headline)
                            .foregroundStyle(.secondary)
                    }
                }
            }
            .frame(maxWidth: .infinity)
            .listRowBackground(Color.clear)
        }
    }

    private var metadataSection: some View {
        Section("Release") {
            if let year = release.year {
                LabeledContent("Year", value: String(year))
            }
            if let label = release.labels?.first?.name {
                LabeledContent("Label", value: label)
            }
            if let catno = release.labels?.first?.catno {
                LabeledContent("Catalog #", value: catno)
            }
            if let format = release.formatSummary {
                LabeledContent("Format", value: format)
            }
            if let country = release.country {
                LabeledContent("Country", value: country)
            }
            if let genres = release.genres, !genres.isEmpty {
                LabeledContent("Genres", value: genres.joined(separator: ", "))
            }
            if let styles = release.styles, !styles.isEmpty {
                LabeledContent("Styles", value: styles.joined(separator: ", "))
            }
        }
    }

    @ViewBuilder
    private var tracklistSection: some View {
        let tracks = (release.tracklist ?? []).map {
            Track(position: $0.position ?? "", title: $0.title ?? "", duration: $0.duration)
        }
        TracklistView(tracks: tracks)
    }

    private var actionBar: some View {
        HStack(spacing: 12) {
            Button {
                add(toWishlist: false)
            } label: {
                Label("Add to Collection", systemImage: "plus")
                    .frame(maxWidth: .infinity)
            }
            .buttonStyle(.borderedProminent)

            Button {
                add(toWishlist: true)
            } label: {
                Label("Wishlist", systemImage: "heart")
                    .frame(maxWidth: .infinity)
            }
            .buttonStyle(.bordered)
        }
        .padding()
        .background(.bar)
    }

    private func add(toWishlist: Bool) {
        do {
            let result = try store.add(release, toWishlist: toWishlist, in: modelContext)
            addSucceeded = result != .alreadyExists
            resultMessage = result.userMessage
        } catch {
            addSucceeded = false
            resultMessage = "Couldn't save the record. Please try again."
        }
        isShowingResult = true
    }
}

/// Fetches full release detail, then shows `ReleasePreviewView`.
/// Used by both the search flow and the scanner's multi-result picker.
struct ReleasePreviewLoaderView: View {
    let releaseID: Int
    var onAdded: (() -> Void)?

    @State private var viewModel = DetailViewModel()

    var body: some View {
        Group {
            switch viewModel.state {
            case .loading:
                LoadingView(message: "Fetching release…")
            case .loaded(let release):
                ReleasePreviewView(release: release, onAdded: onAdded)
            case .failed(let error):
                ErrorView(error: error) {
                    Task { await viewModel.load(releaseID: releaseID) }
                }
            }
        }
        .task {
            await viewModel.load(releaseID: releaseID)
        }
    }
}

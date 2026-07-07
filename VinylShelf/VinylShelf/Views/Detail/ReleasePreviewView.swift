import SwiftData
import SwiftUI

/// Preview of a Discogs release before it's saved — same hero treatment as
/// the detail screen, with a frosted action bar: "Add to shelf" / wishlist.
/// Both actions run through the dedup check.
struct ReleasePreviewView: View {
    let release: DiscogsRelease
    /// Called after a successful add (or wishlist→shelf move) so the
    /// presenting flow can dismiss itself.
    var onAdded: (() -> Void)?

    @Environment(\.modelContext) private var modelContext
    @State private var resultMessage: String?
    @State private var isShowingResult = false
    @State private var addSucceeded = false

    private let store = RecordStore()

    var body: some View {
        ScrollView {
            VStack(alignment: .leading, spacing: 24) {
                DetailHeroView(
                    frontURL: release.coverImage ?? release.thumb,
                    backURL: release.backCoverImage,
                    title: release.displayTitle,
                    artist: release.displayArtist
                )
                .padding(.top, 8)

                badges

                VSMetaGrid(entries: metaEntries)

                TracklistView(tracks: previewTracks)
            }
            .padding(.horizontal, 20)
            .padding(.bottom, 24)
        }
        .vsScreenBackground()
        .navigationTitle("")
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

    // MARK: - Sections

    private var badges: some View {
        HStack(spacing: 8) {
            Spacer()
            if let format = release.formats?.first?.name {
                VSBadge(text: format, tone: .accent)
            }
            if let genre = release.genres?.first {
                VSBadge(text: genre)
            }
            if let country = release.country {
                VSBadge(text: country)
            }
            Spacer()
        }
    }

    private var metaEntries: [(label: String, value: String)] {
        var entries: [(String, String)] = []
        if let catno = release.labels?.first?.catno { entries.append(("Catalog no.", catno)) }
        if let year = release.year { entries.append(("Pressing", String(year))) }
        if let label = release.labels?.first?.name { entries.append(("Label", label)) }
        if let format = release.formatSummary { entries.append(("Format", format)) }
        return entries
    }

    private var previewTracks: [Track] {
        (release.tracklist ?? []).map {
            Track(position: $0.position ?? "", title: $0.title ?? "", duration: $0.duration)
        }
    }

    private var actionBar: some View {
        HStack(spacing: 10) {
            Button {
                add(toWishlist: false)
            } label: {
                Label("Add to shelf", systemImage: "plus")
            }
            .buttonStyle(VSPrimaryButtonStyle())

            Button {
                add(toWishlist: true)
            } label: {
                Label("Wishlist", systemImage: "heart")
            }
            .buttonStyle(VSSecondaryButtonStyle())
            .frame(maxWidth: 140)
        }
        .padding(.horizontal, 20)
        .padding(.vertical, 12)
        .background {
            // Frosted ink panel per the design system's sheet treatment.
            Rectangle()
                .fill(.ultraThinMaterial)
                .overlay(Color.vsInk800.opacity(0.6))
                .overlay(alignment: .top) {
                    Rectangle()
                        .fill(Color.vsBorderSubtle)
                        .frame(height: 1)
                }
                .ignoresSafeArea()
        }
    }

    private func add(toWishlist: Bool) {
        do {
            let result = try store.add(release, toWishlist: toWishlist, in: modelContext)
            addSucceeded = result != .alreadyExists
            resultMessage = result.userMessage(addedToWishlist: toWishlist)
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
                LoadingView(message: "Pulling the sleeve…")
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

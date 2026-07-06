import SwiftUI

/// Orchestrates the scan flow: scan → barcode lookup → one match jumps to a
/// detail preview, several show a picker, none offers manual search.
struct ScannerFlowView: View {
    @Environment(\.dismiss) private var dismiss
    @State private var viewModel = ScannerViewModel()
    @State private var isShowingManualSearch = false

    var body: some View {
        NavigationStack {
            content
                .navigationDestination(for: DiscogsRelease.self) { release in
                    ReleasePreviewLoaderView(releaseID: release.id) {
                        dismiss()
                    }
                }
        }
        .fullScreenCover(isPresented: $isShowingManualSearch) {
            NavigationStack {
                SearchView(isModal: true)
            }
        }
    }

    @ViewBuilder
    private var content: some View {
        switch viewModel.phase {
        case .scanning:
            BarcodeScannerView(
                onScan: { code in
                    Task { await viewModel.handleScanned(code) }
                },
                onCancel: { dismiss() }
            )
            .toolbar(.hidden, for: .navigationBar)

        case .searching:
            LoadingView(message: "Looking up barcode…")
                .toolbar { cancelToolbar }

        case .single(let release):
            ReleasePreviewView(release: release) {
                dismiss()
            }
            .toolbar { cancelToolbar }

        case .multiple(let releases):
            List(releases) { release in
                NavigationLink(value: release) {
                    SearchResultRowView(release: release)
                }
            }
            .listStyle(.plain)
            .navigationTitle("Pick a Release")
            .navigationBarTitleDisplayMode(.inline)
            .toolbar { cancelToolbar }

        case .noMatch(let barcode):
            VStack(spacing: 16) {
                EmptyStateView(
                    systemImage: "barcode.viewfinder",
                    title: "No Match Found",
                    message: "Discogs has no release for barcode \(barcode)."
                )
                .frame(maxHeight: 300)

                Button("Search Manually") {
                    isShowingManualSearch = true
                }
                .buttonStyle(.borderedProminent)

                Button("Scan Again") {
                    viewModel.rescan()
                }
                .buttonStyle(.bordered)
            }
            .toolbar { cancelToolbar }

        case .failed(let error):
            ErrorView(error: error) {
                Task { await viewModel.retry() }
            }
            .toolbar { cancelToolbar }
        }
    }

    @ToolbarContentBuilder
    private var cancelToolbar: some ToolbarContent {
        ToolbarItem(placement: .cancellationAction) {
            Button("Cancel") { dismiss() }
        }
    }
}

#Preview {
    ScannerFlowView()
        .modelContainer(for: VinylRecord.self, inMemory: true)
}

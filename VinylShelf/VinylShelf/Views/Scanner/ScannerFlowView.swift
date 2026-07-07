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
            LoadingView(message: "Looking up that barcode…")
                .toolbar { cancelToolbar }

        case .single(let release):
            ReleasePreviewView(release: release) {
                dismiss()
            }
            .toolbar { cancelToolbar }

        case .multiple(let releases):
            ScrollView {
                VStack(alignment: .leading, spacing: 10) {
                    VSSectionLabel(text: "We found \(releases.count) pressings")
                        .padding(.top, 8)

                    ForEach(releases) { release in
                        NavigationLink(value: release) {
                            SearchResultRowView(release: release)
                        }
                        .buttonStyle(VSPressButtonStyle())
                    }
                }
                .padding(.horizontal, 20)
                .padding(.bottom, 24)
            }
            .vsScreenBackground()
            .navigationTitle("Pick a pressing")
            .navigationBarTitleDisplayMode(.inline)
            .toolbar { cancelToolbar }

        case .noMatch(let barcode):
            VStack(spacing: 12) {
                Spacer()

                EmptyStateView(
                    systemImage: "barcode.viewfinder",
                    title: "No match found",
                    message: "Discogs has no release for barcode \(barcode)."
                )
                .frame(maxHeight: 260)

                Button("Search manually") {
                    isShowingManualSearch = true
                }
                .buttonStyle(VSPrimaryButtonStyle())
                .frame(maxWidth: 240)

                Button("Scan again") {
                    viewModel.rescan()
                }
                .buttonStyle(VSSecondaryButtonStyle())
                .frame(maxWidth: 240)

                Spacer()
            }
            .frame(maxWidth: .infinity)
            .vsScreenBackground()
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
                .font(.vsBody(15, weight: .medium))
                .foregroundStyle(Color.vsBlue300)
        }
    }
}

#Preview {
    ScannerFlowView()
        .modelContainer(for: VinylRecord.self, inMemory: true)
        .preferredColorScheme(.dark)
}

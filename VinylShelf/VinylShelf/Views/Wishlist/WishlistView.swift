import SwiftData
import SwiftUI

/// Wishlist per `Design/ui_kits/.../WishlistScreen.jsx` — "On the hunt"
/// eyebrow, card rows with small art, coral status badge, quick remove.
struct WishlistView: View {
    @Environment(\.modelContext) private var modelContext
    @Query(
        filter: #Predicate<VinylRecord> { $0.isInWishlist },
        sort: \VinylRecord.dateAdded,
        order: .reverse
    )
    private var records: [VinylRecord]

    @State private var viewModel = WishlistViewModel()
    @State private var recordPendingRemoval: VinylRecord?

    var body: some View {
        NavigationStack {
            content
                .vsScreenBackground()
                .navigationTitle("")
                .navigationBarTitleDisplayMode(.inline)
                .navigationDestination(for: VinylRecord.self) { record in
                    RecordDetailView(record: record)
                }
        }
        .confirmationDialog(
            "Remove \"\(recordPendingRemoval?.title ?? "")\" from your wishlist?",
            isPresented: Binding(
                get: { recordPendingRemoval != nil },
                set: { if !$0 { recordPendingRemoval = nil } }
            ),
            titleVisibility: .visible
        ) {
            Button("Remove", role: .destructive) {
                if let record = recordPendingRemoval {
                    viewModel.delete(record, in: modelContext)
                }
                recordPendingRemoval = nil
            }
        }
    }

    @ViewBuilder
    private var content: some View {
        if records.isEmpty {
            EmptyStateView(
                systemImage: "heart",
                title: "Nothing on the hunt yet",
                message: "Records you're hunting for will show up here."
            )
        } else {
            ScrollView {
                VStack(alignment: .leading, spacing: 0) {
                    VStack(alignment: .leading, spacing: 2) {
                        VSSectionLabel(text: "On the hunt")
                        Text("Wishlist")
                            .font(.vsDisplay(28))
                            .kerning(-0.55)
                            .foregroundStyle(Color.vsTextPrimary)
                    }
                    .padding(.bottom, 16)

                    LazyVStack(spacing: 10) {
                        ForEach(records) { record in
                            row(for: record)
                        }
                    }
                }
                .padding(.horizontal, 20)
                .padding(.top, 4)
                .padding(.bottom, 32)
            }
        }
    }

    private func row(for record: VinylRecord) -> some View {
        NavigationLink(value: record) {
            HStack(spacing: 12) {
                AsyncCoverImage(urlString: record.coverImageURL)
                    .frame(width: 52, height: 52)

                VStack(alignment: .leading, spacing: 3) {
                    Text(record.title)
                        .font(.vsDisplay(15, extraBold: false))
                        .kerning(-0.15)
                        .foregroundStyle(Color.vsTextPrimary)
                        .lineLimit(1)

                    Text(record.year.map { "\(record.artist) · \($0)" } ?? record.artist)
                        .font(.vsBody(13))
                        .foregroundStyle(Color.vsTextSecondary)
                        .lineLimit(1)

                    VSBadge(text: "On the hunt", tone: .wishlist, dot: true)
                }

                Spacer()

                Button {
                    recordPendingRemoval = record
                } label: {
                    Image(systemName: "xmark")
                        .font(.subheadline.weight(.semibold))
                        .foregroundStyle(Color.vsTextMuted)
                        .frame(width: 36, height: 36)
                        .contentShape(Rectangle())
                }
                .buttonStyle(VSPressButtonStyle())
                .accessibilityLabel("Remove from wishlist")
            }
            .padding(10)
            .background(Color.vsSurfaceCard, in: RoundedRectangle(cornerRadius: 14))
            .overlay(
                RoundedRectangle(cornerRadius: 14)
                    .strokeBorder(Color.vsBorderSubtle, lineWidth: 1)
            )
        }
        .buttonStyle(VSPressButtonStyle())
        .contextMenu {
            Button {
                viewModel.moveToCollection(record, in: modelContext)
            } label: {
                Label("Move to shelf", systemImage: "square.grid.2x2")
            }
            Button(role: .destructive) {
                recordPendingRemoval = record
            } label: {
                Label("Delete", systemImage: "trash")
            }
        }
    }
}

#Preview {
    WishlistView()
        .modelContainer(for: VinylRecord.self, inMemory: true)
        .preferredColorScheme(.dark)
}

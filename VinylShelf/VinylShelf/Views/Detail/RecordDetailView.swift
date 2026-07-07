import SwiftData
import SwiftUI

/// Detail screen for a saved record per `RecordDetail.jsx`: spinning-disc
/// hero with swipeable front/back art, status badges, tappable star rating,
/// mono meta grid, "my copy" card, tracklist, wishlist/shelf move, delete.
struct RecordDetailView: View {
    @Bindable var record: VinylRecord

    @Environment(\.modelContext) private var modelContext
    @Environment(\.dismiss) private var dismiss

    @State private var isEditing = false
    @State private var isConfirmingDelete = false

    var body: some View {
        ScrollView {
            VStack(alignment: .leading, spacing: 24) {
                DetailHeroView(
                    frontURL: record.coverImageURL,
                    backURL: record.backCoverImageURL,
                    title: record.title,
                    artist: record.artist
                )
                .padding(.top, 8)

                badges

                HStack {
                    Spacer()
                    RatingStarsView(rating: record.rating ?? 0, size: 24) { newValue in
                        record.rating = newValue
                        try? modelContext.save()
                    }
                    Spacer()
                }

                VSMetaGrid(entries: metaEntries)

                myCopyCard

                TracklistView(tracks: record.tracklist)

                moveButton
            }
            .padding(.horizontal, 20)
            .padding(.bottom, 32)
        }
        .vsScreenBackground()
        .navigationTitle("")
        .navigationBarTitleDisplayMode(.inline)
        .toolbar {
            ToolbarItem(placement: .topBarTrailing) {
                Menu {
                    Button {
                        isEditing = true
                    } label: {
                        Label("Edit details", systemImage: "pencil")
                    }

                    Button {
                        toggleWishlist()
                    } label: {
                        if record.isInWishlist {
                            Label("Move to shelf", systemImage: "square.grid.2x2")
                        } else {
                            Label("Move to wishlist", systemImage: "heart")
                        }
                    }

                    Divider()

                    Button(role: .destructive) {
                        isConfirmingDelete = true
                    } label: {
                        Label("Delete", systemImage: "trash")
                    }
                } label: {
                    Image(systemName: "ellipsis.circle")
                        .foregroundStyle(Color.vsTextSecondary)
                }
            }
        }
        .sheet(isPresented: $isEditing) {
            EditRecordView(record: record)
        }
        .confirmationDialog(
            "Delete \"\(record.title)\"?",
            isPresented: $isConfirmingDelete,
            titleVisibility: .visible
        ) {
            Button("Delete record", role: .destructive) {
                modelContext.delete(record)
                try? modelContext.save()
                dismiss()
            }
        } message: {
            Text("This removes the record from Vinyl Shelf. It can't be undone.")
        }
    }

    // MARK: - Sections

    private var badges: some View {
        HStack(spacing: 8) {
            Spacer()
            if record.isInWishlist {
                VSBadge(text: "On the hunt", tone: .wishlist, dot: true)
            } else {
                VSBadge(text: "Owned", tone: .owned, dot: true)
            }
            if let genre = record.genres.first {
                VSBadge(text: genre, tone: .accent)
            }
            if let condition = record.mediaCondition {
                VSBadge(text: condition)
            }
            Spacer()
        }
    }

    private var metaEntries: [(label: String, value: String)] {
        var entries: [(String, String)] = []
        if let catalogNumber = record.catalogNumber { entries.append(("Catalog no.", catalogNumber)) }
        if let year = record.year { entries.append(("Pressing", String(year))) }
        if let label = record.label { entries.append(("Label", label)) }
        if !record.genres.isEmpty { entries.append(("Genre", record.genres.joined(separator: ", "))) }
        return entries
    }

    @ViewBuilder
    private var myCopyCard: some View {
        VStack(alignment: .leading, spacing: 12) {
            VSSectionLabel(text: "My copy")

            if let mediaCondition = record.mediaCondition {
                copyRow("Media", mediaCondition)
            }
            if let sleeveCondition = record.sleeveCondition {
                copyRow("Sleeve", sleeveCondition)
            }
            if let purchasePrice = record.purchasePrice {
                copyRow(
                    "Paid",
                    purchasePrice.formatted(.currency(code: Locale.current.currency?.identifier ?? "USD"))
                )
            }
            if let notes = record.notes, !notes.isEmpty {
                VStack(alignment: .leading, spacing: 3) {
                    Text("Notes")
                        .font(.vsBody(13))
                        .foregroundStyle(Color.vsTextSecondary)
                    Text(notes)
                        .font(.vsBody(15))
                        .foregroundStyle(Color.vsTextPrimary)
                }
            }

            Button {
                isEditing = true
            } label: {
                Label("Edit details", systemImage: "pencil")
            }
            .buttonStyle(VSSecondaryButtonStyle())
        }
        .padding(16)
        .background(Color.vsSurfaceCard, in: RoundedRectangle(cornerRadius: 14))
        .overlay(
            RoundedRectangle(cornerRadius: 14)
                .strokeBorder(Color.vsBorderSubtle, lineWidth: 1)
        )
    }

    private func copyRow(_ label: String, _ value: String) -> some View {
        HStack {
            Text(label)
                .font(.vsBody(13))
                .foregroundStyle(Color.vsTextSecondary)
            Spacer()
            Text(value)
                .font(.vsBody(15, weight: .medium))
                .foregroundStyle(Color.vsTextPrimary)
        }
    }

    private var moveButton: some View {
        Button {
            toggleWishlist()
        } label: {
            if record.isInWishlist {
                Label("Move to shelf", systemImage: "square.grid.2x2")
            } else {
                Label("Move to wishlist", systemImage: "heart")
            }
        }
        .buttonStyle(record.isInWishlist ? AnyButtonStyle(VSPrimaryButtonStyle()) : AnyButtonStyle(VSSecondaryButtonStyle()))
    }

    private func toggleWishlist() {
        withAnimation(VSMotion.spring) {
            record.isInWishlist.toggle()
        }
        try? modelContext.save()
    }
}

/// Type-erased ButtonStyle so a button can swap styles by state.
struct AnyButtonStyle: ButtonStyle {
    private let _makeBody: (Configuration) -> AnyView

    init<S: ButtonStyle>(_ style: S) {
        _makeBody = { AnyView(style.makeBody(configuration: $0)) }
    }

    func makeBody(configuration: Configuration) -> some View {
        _makeBody(configuration)
    }
}

#Preview {
    NavigationStack {
        RecordDetailView(
            record: VinylRecord(
                discogsID: 1,
                title: "Rumours",
                artist: "Fleetwood Mac",
                year: 1977,
                label: "Warner Bros. Records",
                catalogNumber: "BSK 3010",
                genres: ["Rock"],
                rating: 5
            )
        )
    }
    .modelContainer(for: VinylRecord.self, inMemory: true)
    .preferredColorScheme(.dark)
}

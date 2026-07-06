import SwiftData
import SwiftUI

/// Detail screen for a saved record — full metadata, tracklist, editable
/// collection fields, wishlist/collection moves, and deletion.
struct RecordDetailView: View {
    @Bindable var record: VinylRecord

    @Environment(\.modelContext) private var modelContext
    @Environment(\.dismiss) private var dismiss

    @State private var isEditing = false
    @State private var isConfirmingDelete = false

    var body: some View {
        List {
            header

            metadataSection

            collectionInfoSection

            TracklistView(tracks: record.tracklist)
        }
        .listStyle(.insetGrouped)
        .navigationTitle(record.title)
        .navigationBarTitleDisplayMode(.inline)
        .toolbar {
            ToolbarItem(placement: .topBarTrailing) {
                Menu {
                    Button {
                        isEditing = true
                    } label: {
                        Label("Edit Details", systemImage: "pencil")
                    }

                    Button {
                        record.isInWishlist.toggle()
                        try? modelContext.save()
                    } label: {
                        if record.isInWishlist {
                            Label("Move to Collection", systemImage: "square.grid.2x2")
                        } else {
                            Label("Move to Wishlist", systemImage: "heart")
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
            Button("Delete Record", role: .destructive) {
                modelContext.delete(record)
                try? modelContext.save()
                dismiss()
            }
        } message: {
            Text("This removes the record from Vinyl Shelf. It can't be undone.")
        }
    }

    private var header: some View {
        Section {
            VStack(spacing: 12) {
                AsyncCoverImage(urlString: record.coverImageURL, cornerRadius: 12)
                    .frame(maxWidth: 280)

                VStack(spacing: 4) {
                    Text(record.title)
                        .font(.title2.bold())
                        .multilineTextAlignment(.center)

                    Text(record.artist)
                        .font(.headline)
                        .foregroundStyle(.secondary)

                    if record.isInWishlist {
                        Label("On Wishlist", systemImage: "heart.fill")
                            .font(.caption.weight(.semibold))
                            .foregroundStyle(Color.vinylAccent)
                    }
                }

                if let rating = record.rating {
                    RatingStarsView(rating: rating)
                }
            }
            .frame(maxWidth: .infinity)
            .listRowBackground(Color.clear)
        }
    }

    private var metadataSection: some View {
        Section("Release") {
            if let year = record.year {
                LabeledContent("Year", value: String(year))
            }
            if let label = record.label {
                LabeledContent("Label", value: label)
            }
            if let catalogNumber = record.catalogNumber {
                LabeledContent("Catalog #", value: catalogNumber)
            }
            if !record.genres.isEmpty {
                LabeledContent("Genres", value: record.genres.joined(separator: ", "))
            }
        }
    }

    @ViewBuilder
    private var collectionInfoSection: some View {
        Section("My Copy") {
            if let mediaCondition = record.mediaCondition {
                LabeledContent("Media", value: mediaCondition)
            }
            if let sleeveCondition = record.sleeveCondition {
                LabeledContent("Sleeve", value: sleeveCondition)
            }
            if let purchasePrice = record.purchasePrice {
                LabeledContent(
                    "Paid",
                    value: purchasePrice.formatted(.currency(code: Locale.current.currency?.identifier ?? "USD"))
                )
            }
            if let notes = record.notes, !notes.isEmpty {
                VStack(alignment: .leading, spacing: 4) {
                    Text("Notes")
                        .font(.caption)
                        .foregroundStyle(.secondary)
                    Text(notes)
                }
            }

            Button {
                isEditing = true
            } label: {
                Label("Edit Details", systemImage: "pencil")
            }
        }
    }
}

/// Read-only star row (1–5).
struct RatingStarsView: View {
    let rating: Int

    var body: some View {
        HStack(spacing: 2) {
            ForEach(1...5, id: \.self) { star in
                Image(systemName: star <= rating ? "star.fill" : "star")
                    .foregroundStyle(Color.vinylAccent)
                    .font(.caption)
            }
        }
        .accessibilityLabel("\(rating) out of 5 stars")
    }
}

#Preview {
    NavigationStack {
        RecordDetailView(
            record: VinylRecord(discogsID: 1, title: "Rumours", artist: "Fleetwood Mac", year: 1977, rating: 5)
        )
    }
    .modelContainer(for: VinylRecord.self, inMemory: true)
}

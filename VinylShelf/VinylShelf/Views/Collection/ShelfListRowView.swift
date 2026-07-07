import SwiftUI

/// Compact, artwork-free row for the shelf's list view — built for scanning
/// through hundreds of records quickly.
struct ShelfListRowView: View {
    let record: VinylRecord

    var body: some View {
        HStack(alignment: .firstTextBaseline) {
            VStack(alignment: .leading, spacing: 2) {
                Text(record.title)
                    .font(.body.weight(.medium))
                    .lineLimit(1)

                HStack(spacing: 6) {
                    Text(record.artist)
                        .lineLimit(1)
                    if let genre = record.genres.first {
                        Text("·")
                        Text(genre)
                    }
                }
                .font(.subheadline)
                .foregroundStyle(.secondary)
            }

            Spacer()

            if let year = record.year {
                Text(String(year))
                    .font(.caption.monospacedDigit())
                    .foregroundStyle(.tertiary)
            }

            Image(systemName: "chevron.right")
                .font(.caption.weight(.semibold))
                .foregroundStyle(.tertiary)
        }
        .padding(.vertical, 10)
        .padding(.horizontal)
        .contentShape(Rectangle())
    }
}

#Preview {
    ShelfListRowView(
        record: VinylRecord(discogsID: 1, title: "Rumours", artist: "Fleetwood Mac", year: 1977, genres: ["Rock"])
    )
}

import SwiftUI

/// Compact, artwork-free row for the shelf's list view — built for scanning
/// through hundreds of records quickly.
struct ShelfListRowView: View {
    let record: VinylRecord

    var body: some View {
        HStack(alignment: .firstTextBaseline) {
            VStack(alignment: .leading, spacing: 2) {
                Text(record.title)
                    .font(.vsDisplay(15, extraBold: false))
                    .kerning(-0.15)
                    .foregroundStyle(Color.vsTextPrimary)
                    .lineLimit(1)

                HStack(spacing: 6) {
                    Text(record.artist)
                        .lineLimit(1)
                    if let genre = record.genres.first {
                        Text("·")
                        Text(genre)
                    }
                }
                .font(.vsBody(13))
                .foregroundStyle(Color.vsTextSecondary)
            }

            Spacer()

            if let year = record.year {
                Text(String(year))
                    .font(.vsMono(12))
                    .foregroundStyle(Color.vsTextMuted)
            }

            Image(systemName: "chevron.right")
                .font(.caption.weight(.semibold))
                .foregroundStyle(Color.vsTextMuted)
        }
        .padding(.vertical, 12)
        .contentShape(Rectangle())
    }
}

#Preview {
    ShelfListRowView(
        record: VinylRecord(discogsID: 1, title: "Rumours", artist: "Fleetwood Mac", year: 1977, genres: ["Rock"])
    )
    .padding()
    .vsScreenBackground()
}

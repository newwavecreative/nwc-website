import SwiftUI

struct RecordRowView: View {
    let record: VinylRecord

    var body: some View {
        HStack(spacing: 12) {
            AsyncCoverImage(urlString: record.coverImageURL, cornerRadius: 6)
                .frame(width: 56, height: 56)

            VStack(alignment: .leading, spacing: 2) {
                Text(record.title)
                    .font(.body.weight(.medium))
                    .lineLimit(1)

                Text(record.artist)
                    .font(.subheadline)
                    .foregroundStyle(.secondary)
                    .lineLimit(1)

                if let year = record.year {
                    Text(String(year))
                        .font(.caption)
                        .foregroundStyle(.tertiary)
                }
            }
        }
    }
}

#Preview {
    List {
        RecordRowView(
            record: VinylRecord(discogsID: 1, title: "Rumours", artist: "Fleetwood Mac", year: 1977)
        )
    }
}

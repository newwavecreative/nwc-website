import SwiftUI

struct RecordGridItemView: View {
    let record: VinylRecord

    var body: some View {
        VStack(alignment: .leading, spacing: 6) {
            AsyncCoverImage(urlString: record.coverImageURL)

            Text(record.title)
                .font(.subheadline.weight(.semibold))
                .lineLimit(1)

            Text(record.artist)
                .font(.caption)
                .foregroundStyle(.secondary)
                .lineLimit(1)
        }
    }
}

#Preview {
    RecordGridItemView(
        record: VinylRecord(discogsID: 1, title: "Rumours", artist: "Fleetwood Mac", year: 1977)
    )
    .frame(width: 160)
    .padding()
}

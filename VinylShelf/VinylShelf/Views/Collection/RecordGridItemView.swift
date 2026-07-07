import SwiftUI

/// RecordCard (grid): square art, display-face title, artist, mono meta.
struct RecordGridItemView: View {
    let record: VinylRecord

    var body: some View {
        VStack(alignment: .leading, spacing: 10) {
            AsyncCoverImage(urlString: record.coverImageURL)
                .shadow(color: .black.opacity(0.45), radius: 9, y: 3)

            VStack(alignment: .leading, spacing: 2) {
                Text(record.title)
                    .font(.vsDisplay(15, extraBold: false))
                    .kerning(-0.15)
                    .foregroundStyle(Color.vsTextPrimary)
                    .lineLimit(1)

                Text(record.artist)
                    .font(.vsBody(13))
                    .foregroundStyle(Color.vsTextSecondary)
                    .lineLimit(1)

                if let year = record.year {
                    Text(String(year))
                        .font(.vsMono(11))
                        .kerning(0.2)
                        .foregroundStyle(Color.vsTextMuted)
                        .padding(.top, 1)
                }
            }
        }
    }
}

#Preview {
    RecordGridItemView(
        record: VinylRecord(discogsID: 1, title: "Rumours", artist: "Fleetwood Mac", year: 1977)
    )
    .frame(width: 160)
    .padding()
    .vsScreenBackground()
}

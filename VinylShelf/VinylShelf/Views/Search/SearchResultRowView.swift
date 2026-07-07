import SwiftUI

/// Search result card row per `SearchScreen.jsx`: small art, display-face
/// title, artist, mono badges for year and format.
struct SearchResultRowView: View {
    let release: DiscogsRelease

    var body: some View {
        HStack(spacing: 12) {
            AsyncCoverImage(urlString: release.thumb ?? release.coverImage)
                .frame(width: 52, height: 52)

            VStack(alignment: .leading, spacing: 3) {
                Text(release.displayTitle)
                    .font(.vsDisplay(15, extraBold: false))
                    .kerning(-0.15)
                    .foregroundStyle(Color.vsTextPrimary)
                    .lineLimit(1)

                if !release.displayArtist.isEmpty {
                    Text(release.displayArtist)
                        .font(.vsBody(13))
                        .foregroundStyle(Color.vsTextSecondary)
                        .lineLimit(1)
                }

                HStack(spacing: 6) {
                    if let year = release.year {
                        VSBadge(text: String(year))
                    }
                    if let format = release.formats?.first?.name {
                        VSBadge(text: format, tone: .accent)
                    }
                }
            }

            Spacer()

            Image(systemName: "chevron.right")
                .font(.caption.weight(.semibold))
                .foregroundStyle(Color.vsTextMuted)
        }
        .padding(10)
        .background(Color.vsSurfaceCard, in: RoundedRectangle(cornerRadius: 14))
        .overlay(
            RoundedRectangle(cornerRadius: 14)
                .strokeBorder(Color.vsBorderSubtle, lineWidth: 1)
        )
    }
}

#Preview {
    SearchResultRowView(
        release: DiscogsRelease(
            id: 1,
            title: "Fleetwood Mac - Rumours",
            year: 1977,
            formats: [DiscogsFormat(name: "Vinyl", descriptions: ["LP"])],
            country: "US"
        )
    )
    .padding()
    .vsScreenBackground()
}

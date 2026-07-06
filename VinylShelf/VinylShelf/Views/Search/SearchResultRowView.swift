import SwiftUI

struct SearchResultRowView: View {
    let release: DiscogsRelease

    var body: some View {
        HStack(spacing: 12) {
            AsyncCoverImage(urlString: release.thumb ?? release.coverImage, cornerRadius: 6)
                .frame(width: 56, height: 56)

            VStack(alignment: .leading, spacing: 2) {
                Text(release.displayTitle)
                    .font(.body.weight(.medium))
                    .lineLimit(1)

                if !release.displayArtist.isEmpty {
                    Text(release.displayArtist)
                        .font(.subheadline)
                        .foregroundStyle(.secondary)
                        .lineLimit(1)
                }

                HStack(spacing: 6) {
                    if let year = release.year {
                        Text(String(year))
                    }
                    if let country = release.country {
                        Text(country)
                    }
                }
                .font(.caption)
                .foregroundStyle(.tertiary)
            }
        }
    }
}

#Preview {
    List {
        SearchResultRowView(
            release: DiscogsRelease(id: 1, title: "Fleetwood Mac - Rumours", year: 1977, country: "US")
        )
    }
}

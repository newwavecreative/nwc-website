import SwiftUI

/// Detail hero per `RecordDetail.jsx`: the groove-textured record spinning
/// out from behind the cover art (the brand's signature moment), with the
/// swipeable front/back pager on top, then title and artist.
struct DetailHeroView: View {
    let frontURL: String?
    let backURL: String?
    let title: String
    let artist: String

    var body: some View {
        VStack(spacing: 20) {
            ZStack {
                VinylDiscView(spinning: true)
                    .frame(width: 190, height: 190)
                    .offset(x: 42)

                CoverArtPager(frontURL: frontURL, backURL: backURL, cornerRadius: 14)
                    .frame(width: 200)
                    .shadow(color: .black.opacity(0.55), radius: 20, y: 8)
                    .offset(x: -20)
            }
            .frame(height: 210)

            VStack(spacing: 3) {
                Text(title)
                    .font(.vsDisplay(26))
                    .kerning(-0.5)
                    .foregroundStyle(Color.vsTextPrimary)
                    .multilineTextAlignment(.center)

                if !artist.isEmpty {
                    Text(artist)
                        .font(.vsBody(16))
                        .foregroundStyle(Color.vsTextSecondary)
                }
            }
        }
        .frame(maxWidth: .infinity)
    }
}

/// Two-column mono metadata card — the "record sleeve small print."
struct VSMetaGrid: View {
    let entries: [(label: String, value: String)]

    private let columns = [
        GridItem(.flexible(), alignment: .topLeading),
        GridItem(.flexible(), alignment: .topLeading),
    ]

    var body: some View {
        if !entries.isEmpty {
            LazyVGrid(columns: columns, alignment: .leading, spacing: 14) {
                ForEach(entries, id: \.label) { entry in
                    VStack(alignment: .leading, spacing: 3) {
                        Text(entry.label.uppercased())
                            .font(.vsMono(10))
                            .kerning(1.0)
                            .foregroundStyle(Color.vsTextMuted)
                        Text(entry.value)
                            .font(.vsMono(14))
                            .foregroundStyle(Color.vsYellow500)
                    }
                }
            }
            .padding(16)
            .background(Color.vsSurfaceCard, in: RoundedRectangle(cornerRadius: 14))
            .overlay(
                RoundedRectangle(cornerRadius: 14)
                    .strokeBorder(Color.vsBorderSubtle, lineWidth: 1)
            )
        }
    }
}

/// 1–5 stars, yellow-filled; tappable when `onChange` is set. Tapping the
/// current value clears the rating.
struct RatingStarsView: View {
    let rating: Int
    var size: CGFloat = 16
    var onChange: ((Int?) -> Void)?

    var body: some View {
        HStack(spacing: 4) {
            ForEach(1...5, id: \.self) { star in
                let filled = star <= rating
                Group {
                    if let onChange {
                        Button {
                            onChange(rating == star ? nil : star)
                        } label: {
                            starImage(filled: filled)
                        }
                        .buttonStyle(VSPressButtonStyle())
                    } else {
                        starImage(filled: filled)
                    }
                }
            }
        }
        .accessibilityLabel("\(rating) out of 5 stars")
    }

    private func starImage(filled: Bool) -> some View {
        Image(systemName: filled ? "star.fill" : "star")
            .font(.system(size: size))
            .foregroundStyle(filled ? Color.vsYellow500 : Color.vsInk400)
    }
}

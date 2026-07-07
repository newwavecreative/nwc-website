import SwiftUI

/// Square cover-art display that becomes a swipeable front/back pager when a
/// back cover is available (pulled from the Discogs detail `images` array).
struct CoverArtPager: View {
    let frontURL: String?
    let backURL: String?
    var cornerRadius: CGFloat = 12

    var body: some View {
        if let backURL {
            TabView {
                AsyncCoverImage(urlString: frontURL, cornerRadius: cornerRadius)
                    .accessibilityLabel("Front cover")
                AsyncCoverImage(urlString: backURL, cornerRadius: cornerRadius)
                    .accessibilityLabel("Back cover")
            }
            .tabViewStyle(.page(indexDisplayMode: .always))
            .indexViewStyle(.page(backgroundDisplayMode: .interactive))
            .aspectRatio(1, contentMode: .fit)
        } else {
            AsyncCoverImage(urlString: frontURL, cornerRadius: cornerRadius)
        }
    }
}

#Preview {
    CoverArtPager(frontURL: nil, backURL: nil)
        .frame(width: 280)
}

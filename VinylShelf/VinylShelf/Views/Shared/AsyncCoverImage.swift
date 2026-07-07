import Kingfisher
import SwiftUI

/// Square (1:1) album cover loaded from the Discogs CDN via Kingfisher, with
/// a hairline border per the design system. Missing art falls back to the
/// groove texture with the yellow label — the RecordCard placeholder.
struct AsyncCoverImage: View {
    let urlString: String?
    var cornerRadius: CGFloat = 10

    var body: some View {
        Color.clear
            .aspectRatio(1, contentMode: .fit)
            .overlay {
                if let urlString, let url = URL(string: urlString) {
                    KFImage(url)
                        .placeholder { placeholder }
                        .fade(duration: 0.2)
                        .resizable()
                        .aspectRatio(contentMode: .fill)
                } else {
                    placeholder
                }
            }
            .clipShape(RoundedRectangle(cornerRadius: cornerRadius))
            .overlay(
                RoundedRectangle(cornerRadius: cornerRadius)
                    .strokeBorder(Color.vsBorderSubtle, lineWidth: 1)
            )
    }

    private var placeholder: some View {
        GeometryReader { proxy in
            let size = min(proxy.size.width, proxy.size.height)
            ZStack {
                GrooveTexture()
                ZStack {
                    Circle()
                        .fill(LinearGradient.vsYellow)
                    Circle()
                        .strokeBorder(Color.vsYellow600, lineWidth: 2)
                }
                .frame(width: size * 0.38, height: size * 0.38)
            }
            .frame(width: proxy.size.width, height: proxy.size.height)
        }
    }
}

#Preview {
    AsyncCoverImage(urlString: nil)
        .frame(width: 160)
        .padding()
        .vsScreenBackground()
}

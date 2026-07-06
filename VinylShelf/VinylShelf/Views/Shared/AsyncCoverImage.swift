import Kingfisher
import SwiftUI

/// Square (1:1) album cover loaded from the Discogs CDN via Kingfisher.
/// Images are never stored locally beyond Kingfisher's cache.
struct AsyncCoverImage: View {
    let urlString: String?
    var cornerRadius: CGFloat = 8

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
    }

    private var placeholder: some View {
        ZStack {
            Rectangle()
                .fill(.quaternary)
            Image(systemName: "opticaldisc")
                .font(.largeTitle)
                .foregroundStyle(.secondary)
        }
    }
}

#Preview {
    AsyncCoverImage(urlString: nil)
        .frame(width: 160)
}

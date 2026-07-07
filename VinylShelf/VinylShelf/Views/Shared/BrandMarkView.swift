import SwiftUI

/// Vinyl Shelf brand mark: a stylized record with an amber center label.
///
/// PLACEHOLDER — drawn in code until the design system's brand mark asset is
/// imported; swap the body for the real mark, keeping the view name so the
/// splash animation keeps working.
struct BrandMarkView: View {
    var body: some View {
        GeometryReader { proxy in
            let size = min(proxy.size.width, proxy.size.height)

            ZStack {
                // Disc
                Circle()
                    .fill(Color(white: 0.10))

                // Grooves
                ForEach(0..<4, id: \.self) { ring in
                    Circle()
                        .strokeBorder(.white.opacity(0.09), lineWidth: size * 0.008)
                        .padding(size * (0.08 + 0.07 * CGFloat(ring)))
                }

                // Center label
                Circle()
                    .fill(Color.vinylAccent)
                    .padding(size * 0.34)

                Text("VS")
                    .font(.system(size: size * 0.13, weight: .heavy, design: .rounded))
                    .foregroundStyle(.black.opacity(0.75))

                // Spindle hole
                Circle()
                    .fill(.black)
                    .frame(width: size * 0.045, height: size * 0.045)
            }
            .frame(width: size, height: size)
            .position(x: proxy.size.width / 2, y: proxy.size.height / 2)
        }
    }
}

#Preview {
    BrandMarkView()
        .frame(width: 160, height: 160)
        .padding()
        .background(.black)
}

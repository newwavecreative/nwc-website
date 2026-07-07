import SwiftUI

/// --grad-vinyl: the fine concentric groove texture used behind hero panels
/// and as the cover-art placeholder.
struct GrooveTexture: View {
    var body: some View {
        GeometryReader { proxy in
            let side = max(proxy.size.width, proxy.size.height)
            let ringCount = Int(side / 4) + 1

            ZStack {
                Color(hex: 0x0A0E1C)
                ForEach(0..<ringCount, id: \.self) { ring in
                    Circle()
                        .strokeBorder(Color(hex: 0x10152A), lineWidth: 2)
                        .frame(width: CGFloat(ring) * 8, height: CGFloat(ring) * 8)
                }
            }
            .frame(width: proxy.size.width, height: proxy.size.height)
        }
        .clipped()
    }
}

/// A groove-textured record with the yellow label — the disc that peeks out
/// from behind cover art on the detail screen. Spins continuously at the
/// signature ~1.6s/turn when `spinning` (frozen under Reduce Motion).
struct VinylDiscView: View {
    var spinning = false

    @Environment(\.accessibilityReduceMotion) private var reduceMotion
    @State private var angle: Double = 0

    var body: some View {
        ZStack {
            GrooveTexture()
                .clipShape(Circle())

            Circle()
                .strokeBorder(Color.vsBorderDefault, lineWidth: 1)

            GeometryReader { proxy in
                let size = min(proxy.size.width, proxy.size.height)
                ZStack {
                    Circle()
                        .fill(LinearGradient.vsYellow)
                    Circle()
                        .strokeBorder(Color.vsYellow600, lineWidth: 2)
                }
                .frame(width: size * 0.24, height: size * 0.24)
                .position(x: proxy.size.width / 2, y: proxy.size.height / 2)
            }
        }
        .rotationEffect(.degrees(angle))
        .onAppear {
            guard spinning, !reduceMotion else { return }
            withAnimation(.linear(duration: VSMotion.spinDuration).repeatForever(autoreverses: false)) {
                angle = 360
            }
        }
    }
}

#Preview {
    VinylDiscView(spinning: true)
        .frame(width: 200, height: 200)
        .padding(40)
        .vsScreenBackground()
}

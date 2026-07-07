import SwiftUI

/// The Vinyl Shelf record mark — SwiftUI recreation of
/// `Design/assets/logo-mark.svg`: ink disc with groove rings, an electric
/// blue light-catch arc, and the signature yellow center label.
struct BrandMarkView: View {
    var body: some View {
        GeometryReader { proxy in
            let size = min(proxy.size.width, proxy.size.height)
            // SVG is authored on a 120pt canvas; scale everything from it.
            let unit = size / 120

            ZStack {
                // Disc + outer rim
                Circle()
                    .fill(Color.vsInk900)
                Circle()
                    .strokeBorder(Color.vsInk600, lineWidth: 2 * unit)

                // Groove rings (r 50 / 44 / 38 / 32)
                groove(radius: 50, color: .vsInk700, unit: unit)
                groove(radius: 44, color: .vsInk600, unit: unit)
                groove(radius: 38, color: .vsInk700, unit: unit)
                groove(radius: 32, color: .vsInk600, unit: unit)

                // Blue light-catch arc: top → right quarter
                Circle()
                    .trim(from: 0, to: 0.25)
                    .stroke(
                        Color.vsBlue500.opacity(0.7),
                        style: StrokeStyle(lineWidth: 2.5 * unit, lineCap: .round)
                    )
                    .rotationEffect(.degrees(-90))
                    .padding(4 * unit)

                // Yellow center label
                Circle()
                    .fill(Color.vsYellow500)
                    .frame(width: 44 * unit, height: 44 * unit)
                Circle()
                    .strokeBorder(Color.vsYellow600, lineWidth: 1.5 * unit)
                    .frame(width: 44 * unit, height: 44 * unit)

                // Spindle hole
                Circle()
                    .fill(Color.vsInk900)
                    .frame(width: 8 * unit, height: 8 * unit)
            }
            .frame(width: size, height: size)
            .position(x: proxy.size.width / 2, y: proxy.size.height / 2)
        }
    }

    private func groove(radius: CGFloat, color: Color, unit: CGFloat) -> some View {
        Circle()
            .strokeBorder(color, lineWidth: 1.5 * unit)
            .frame(width: radius * 2 * unit, height: radius * 2 * unit)
    }
}

/// The signature brand animation: the mark rotating continuously at
/// ~1.6s/turn (linear — per the motion guidelines, the only linear motion in
/// the app). Frozen under Reduce Motion.
struct SpinningBrandMark: View {
    var isSpinning = true

    @Environment(\.accessibilityReduceMotion) private var reduceMotion
    @State private var angle: Double = 0

    var body: some View {
        BrandMarkView()
            .rotationEffect(.degrees(angle))
            .onAppear {
                guard isSpinning, !reduceMotion else { return }
                withAnimation(.linear(duration: VSMotion.spinDuration).repeatForever(autoreverses: false)) {
                    angle = 360
                }
            }
    }
}

#Preview {
    VStack(spacing: 32) {
        BrandMarkView()
            .frame(width: 120, height: 120)
        SpinningBrandMark()
            .frame(width: 72, height: 72)
    }
    .padding(40)
    .vsScreenBackground()
}

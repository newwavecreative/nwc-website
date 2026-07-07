import SwiftUI

/// Launch overlay: the record mark drops in with the springy overshoot ease,
/// spins at the signature ~1.6s/turn, then the screen fades out via
/// `onFinished`. Per `Design/guidelines/brand-motion.html`.
struct WelcomeSplashView: View {
    var onFinished: () -> Void

    @Environment(\.accessibilityReduceMotion) private var reduceMotion
    @State private var hasEntered = false

    var body: some View {
        ZStack {
            VSBackground()

            VStack(spacing: 24) {
                SpinningBrandMark()
                    .frame(width: 150, height: 150)
                    .scaleEffect(hasEntered ? 1 : 0.55)
                    .opacity(hasEntered ? 1 : 0)

                Text("Vinyl Shelf")
                    .font(.vsDisplay(30))
                    .kerning(-0.6)
                    .foregroundStyle(Color.vsTextPrimary)
                    .opacity(hasEntered ? 1 : 0)
            }
        }
        .task {
            if reduceMotion {
                hasEntered = true
                try? await Task.sleep(for: .seconds(0.9))
            } else {
                withAnimation(VSMotion.spring) {
                    hasEntered = true
                }
                try? await Task.sleep(for: .seconds(1.8))
            }
            onFinished()
        }
    }
}

#Preview {
    WelcomeSplashView(onFinished: {})
}

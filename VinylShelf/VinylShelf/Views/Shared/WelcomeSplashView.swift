import SwiftUI

/// Dark launch overlay that flashes the brand mark with a spin-in, then
/// fades out via `onFinished`.
///
/// The rotation/scale values below are a stand-in for the design system's
/// "Signature spin & motion" spec — tune duration, curve, and degrees there
/// once the design project is imported.
struct WelcomeSplashView: View {
    var onFinished: () -> Void

    @Environment(\.accessibilityReduceMotion) private var reduceMotion
    @State private var isVisible = false
    @State private var isSpinning = false

    var body: some View {
        ZStack {
            Color.black.ignoresSafeArea()

            VStack(spacing: 24) {
                BrandMarkView()
                    .frame(width: 150, height: 150)
                    .rotationEffect(.degrees(isSpinning ? 720 : 0))
                    .scaleEffect(isVisible ? 1 : 0.55)
                    .opacity(isVisible ? 1 : 0)

                Text("Vinyl Shelf")
                    .font(.title.bold())
                    .foregroundStyle(.white)
                    .opacity(isVisible ? 1 : 0)
            }
        }
        .task {
            if reduceMotion {
                isVisible = true
                isSpinning = true
                try? await Task.sleep(for: .seconds(0.9))
            } else {
                withAnimation(.spring(duration: 0.5, bounce: 0.25)) {
                    isVisible = true
                }
                withAnimation(.easeOut(duration: 1.3)) {
                    isSpinning = true
                }
                try? await Task.sleep(for: .seconds(1.7))
            }
            onFinished()
        }
    }
}

#Preview {
    WelcomeSplashView(onFinished: {})
}

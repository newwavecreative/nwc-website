import SwiftUI

/// Brand loading state — the record mark spinning at the signature rate.
struct LoadingView: View {
    var message: String = "Loading…"

    var body: some View {
        VStack(spacing: 20) {
            SpinningBrandMark()
                .frame(width: 72, height: 72)

            Text(message)
                .font(.vsBody(15))
                .foregroundStyle(Color.vsTextSecondary)
        }
        .frame(maxWidth: .infinity, maxHeight: .infinity)
        .vsScreenBackground()
    }
}

#Preview {
    LoadingView(message: "Digging through the crates…")
}

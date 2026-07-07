import SwiftUI

struct EmptyStateView: View {
    let systemImage: String
    let title: String
    let message: String
    /// Show the record mark instead of an SF Symbol — used for the empty
    /// shelf, per the brand guidelines (the mark doubles as empty-state art).
    var useBrandMark = false

    var body: some View {
        VStack(spacing: 16) {
            if useBrandMark {
                BrandMarkView()
                    .frame(width: 96, height: 96)
                    .padding(.bottom, 4)
            } else {
                Image(systemName: systemImage)
                    .font(.system(size: 38))
                    .foregroundStyle(Color.vsTextMuted)
            }

            Text(title)
                .font(.vsDisplay(20))
                .foregroundStyle(Color.vsTextPrimary)

            Text(message)
                .font(.vsBody(15))
                .foregroundStyle(Color.vsTextSecondary)
                .multilineTextAlignment(.center)
                .padding(.horizontal, 36)
        }
        .frame(maxWidth: .infinity, maxHeight: .infinity)
    }
}

#Preview {
    EmptyStateView(
        systemImage: "opticaldisc",
        title: "Your shelf is empty",
        message: "Let's find your first record.",
        useBrandMark: true
    )
    .vsScreenBackground()
}

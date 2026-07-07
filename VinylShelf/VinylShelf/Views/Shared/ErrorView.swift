import SwiftUI

struct ErrorView: View {
    let error: Error
    var retry: (() -> Void)?

    var body: some View {
        VStack(spacing: 20) {
            Image(systemName: "exclamationmark.triangle")
                .font(.system(size: 40))
                .foregroundStyle(Color.vsStatusWishlist)

            Text("Needle skipped")
                .font(.vsDisplay(20))
                .foregroundStyle(Color.vsTextPrimary)

            Text(error.localizedDescription)
                .font(.vsBody(15))
                .foregroundStyle(Color.vsTextSecondary)
                .multilineTextAlignment(.center)
                .padding(.horizontal, 36)

            if let retry {
                Button("Try again", action: retry)
                    .buttonStyle(VSPrimaryButtonStyle())
                    .frame(maxWidth: 220)
            }
        }
        .frame(maxWidth: .infinity, maxHeight: .infinity)
        .vsScreenBackground()
    }
}

#Preview {
    ErrorView(error: DiscogsError.network, retry: {})
}

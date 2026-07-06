import SwiftUI

struct EmptyStateView: View {
    let systemImage: String
    let title: String
    let message: String

    var body: some View {
        ContentUnavailableView {
            Label(title, systemImage: systemImage)
        } description: {
            Text(message)
        }
    }
}

#Preview {
    EmptyStateView(
        systemImage: "opticaldisc",
        title: "No Records Yet",
        message: "Scan a barcode or search to start your collection."
    )
}

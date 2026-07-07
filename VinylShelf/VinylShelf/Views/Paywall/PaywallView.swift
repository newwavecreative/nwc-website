import StoreKit
import SwiftUI

/// Vinyl Shelf Pro paywall. Shown as a hard gate when
/// `AppServicesConfig.enforcePaywall` is on and no subscription is active;
/// dismisses itself automatically once an entitlement appears.
struct PaywallView: View {
    @State private var subscriptions = SubscriptionService.shared
    @State private var purchaseInFlight = false
    @State private var errorMessage: String?

    var body: some View {
        ZStack {
            VSBackground()

            ScrollView {
                VStack(spacing: 24) {
                    SpinningBrandMark()
                        .frame(width: 96, height: 96)
                        .padding(.top, 40)

                    VStack(spacing: 6) {
                        VSSectionLabel(text: "Vinyl Shelf Pro")
                        Text("Your whole collection,\non every shelf")
                            .font(.vsDisplay(28))
                            .kerning(-0.55)
                            .foregroundStyle(Color.vsTextPrimary)
                            .multilineTextAlignment(.center)
                    }

                    features

                    productButtons

                    if let trial = trialLine {
                        Text(trial)
                            .font(.vsBody(13, weight: .medium))
                            .foregroundStyle(Color.vsYellow500)
                    }

                    Button("Restore purchases") {
                        Task { await subscriptions.restorePurchases() }
                    }
                    .font(.vsBody(14, weight: .medium))
                    .foregroundStyle(Color.vsBlue300)

                    footnote
                }
                .padding(.horizontal, 24)
                .padding(.bottom, 32)
            }
        }
        .alert(errorMessage ?? "", isPresented: Binding(
            get: { errorMessage != nil },
            set: { if !$0 { errorMessage = nil } }
        )) {
            Button("OK") { errorMessage = nil }
        }
        .task {
            subscriptions.start()
        }
    }

    private var features: some View {
        VStack(alignment: .leading, spacing: 12) {
            featureRow("barcode.viewfinder", "Catalog by barcode scan")
            featureRow("magnifyingglass", "Search the Discogs database")
            featureRow("icloud", "Synced across your devices")
            featureRow("heart", "Wishlist for the hunt")
            featureRow("star", "Conditions, ratings & notes")
        }
        .padding(18)
        .frame(maxWidth: .infinity, alignment: .leading)
        .background(Color.vsSurfaceCard, in: RoundedRectangle(cornerRadius: 14))
        .overlay(
            RoundedRectangle(cornerRadius: 14)
                .strokeBorder(Color.vsBorderSubtle, lineWidth: 1)
        )
    }

    private func featureRow(_ icon: String, _ text: String) -> some View {
        HStack(spacing: 12) {
            Image(systemName: icon)
                .font(.system(size: 17))
                .foregroundStyle(Color.vsYellow500)
                .frame(width: 24)
            Text(text)
                .font(.vsBody(15))
                .foregroundStyle(Color.vsTextPrimary)
        }
    }

    @ViewBuilder
    private var productButtons: some View {
        if subscriptions.isLoading {
            ProgressView()
                .tint(Color.vsYellow500)
                .padding(.vertical, 12)
        } else if subscriptions.products.isEmpty {
            Text("Subscriptions aren't available right now. Please try again later.")
                .font(.vsBody(14))
                .foregroundStyle(Color.vsTextSecondary)
                .multilineTextAlignment(.center)
        } else {
            VStack(spacing: 10) {
                // Highest price last after the sort — annual gets the
                // primary treatment.
                ForEach(Array(subscriptions.products.enumerated()), id: \.element.id) { index, product in
                    let isPrimary = index == subscriptions.products.count - 1
                    Button {
                        buy(product)
                    } label: {
                        Text("\(product.displayName) — \(product.displayPrice)\(periodSuffix(product))")
                    }
                    .buttonStyle(
                        isPrimary
                            ? AnyButtonStyle(VSPrimaryButtonStyle())
                            : AnyButtonStyle(VSSecondaryButtonStyle())
                    )
                    .disabled(purchaseInFlight)
                }
            }
        }
    }

    private func periodSuffix(_ product: Product) -> String {
        switch product.subscription?.subscriptionPeriod.unit {
        case .month: return "/month"
        case .year: return "/year"
        case .week: return "/week"
        case .day: return "/day"
        default: return ""
        }
    }

    private var trialLine: String? {
        subscriptions.products
            .compactMap { subscriptions.trialDescription(for: $0) }
            .first
            .map { "Starts with a \($0) — cancel anytime." }
    }

    private var footnote: some View {
        VStack(spacing: 4) {
            Text("Payment is charged to your Apple ID after the free trial. Subscriptions renew automatically until cancelled in Settings.")
            HStack(spacing: 12) {
                Link("Terms of Use", destination: URL(string: "https://www.apple.com/legal/internet-services/itunes/dev/stdeula/")!)
                Link("Privacy Policy", destination: URL(string: "https://vinylshelf.com/privacy")!)
            }
            .foregroundStyle(Color.vsBlue300)
        }
        .font(.vsBody(11))
        .foregroundStyle(Color.vsTextMuted)
        .multilineTextAlignment(.center)
    }

    private func buy(_ product: Product) {
        purchaseInFlight = true
        Task {
            defer { purchaseInFlight = false }
            do {
                try await subscriptions.purchase(product)
            } catch {
                errorMessage = "The purchase couldn't be completed. You haven't been charged — please try again."
            }
        }
    }
}

#Preview {
    PaywallView()
        .preferredColorScheme(.dark)
}

import Foundation
import Observation
import StoreKit

/// StoreKit 2 subscription manager for Vinyl Shelf Pro.
///
/// The 30-day free trial is NOT code — it's an introductory offer configured
/// on the products in App Store Connect (and mirrored in `Products.storekit`
/// for local testing). StoreKit applies it automatically on first purchase;
/// this class just surfaces it for display.
///
/// Fail-open by design: if products can't load (App Store Connect not set up
/// yet, store outage), `requiresPaywall` stays false so users are never
/// locked out by infrastructure problems.
@MainActor
@Observable
final class SubscriptionService {
    static let shared = SubscriptionService()

    private(set) var products: [Product] = []
    private(set) var isSubscribed = false
    private(set) var isStoreConfigured = false
    private(set) var isLoading = false

    private var updatesTask: Task<Void, Never>?
    private var hasStarted = false

    /// Hard gate for the app: only when the paywall switch is on, the store
    /// is actually reachable, and there's no active entitlement.
    var requiresPaywall: Bool {
        AppServicesConfig.enforcePaywall && isStoreConfigured && !isSubscribed
    }

    func start() {
        guard !hasStarted else { return }
        hasStarted = true

        // Finish transactions that arrive outside a purchase flow
        // (renewals, purchases on another device, App Store refunds).
        updatesTask = Task { [weak self] in
            for await update in Transaction.updates {
                if case .verified(let transaction) = update {
                    await transaction.finish()
                }
                await self?.refreshEntitlements()
            }
        }

        Task {
            await loadProducts()
            await refreshEntitlements()
        }
    }

    func loadProducts() async {
        isLoading = true
        defer { isLoading = false }
        do {
            products = try await Product.products(for: AppServicesConfig.subscriptionProductIDs)
                .sorted { $0.price < $1.price }
            isStoreConfigured = !products.isEmpty
        } catch {
            isStoreConfigured = false
        }
    }

    func refreshEntitlements() async {
        var active = false
        for await entitlement in Transaction.currentEntitlements {
            if case .verified(let transaction) = entitlement,
               AppServicesConfig.subscriptionProductIDs.contains(transaction.productID),
               transaction.revocationDate == nil {
                active = true
            }
        }
        isSubscribed = active
    }

    /// Returns true when the purchase completed (including a trial start).
    @discardableResult
    func purchase(_ product: Product) async throws -> Bool {
        let result = try await product.purchase()
        switch result {
        case .success(let verification):
            guard case .verified(let transaction) = verification else { return false }
            await transaction.finish()
            await refreshEntitlements()
            Analytics.track(AnalyticsEvent.subscriptionPurchased, ["product": product.id])
            return true
        case .userCancelled, .pending:
            return false
        @unknown default:
            return false
        }
    }

    func restorePurchases() async {
        try? await AppStore.sync()
        await refreshEntitlements()
        if isSubscribed {
            Analytics.track(AnalyticsEvent.subscriptionRestored)
        }
    }

    /// Display string for a product's intro offer, e.g. "30-day free trial".
    func trialDescription(for product: Product) -> String? {
        guard let offer = product.subscription?.introductoryOffer,
              offer.paymentMode == .freeTrial else { return nil }
        let period = offer.period
        switch period.unit {
        case .day: return "\(period.value)-day free trial"
        case .week: return "\(period.value * 7)-day free trial"
        case .month: return period.value == 1 ? "30-day free trial" : "\(period.value)-month free trial"
        case .year: return "\(period.value)-year free trial"
        @unknown default: return "Free trial included"
        }
    }
}

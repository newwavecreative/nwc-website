import Foundation

/// Non-secret service configuration — safe to commit. (Secrets live in the
/// gitignored `DiscogsConfig.swift`.)
enum AppServicesConfig {
    // MARK: - Analytics (TelemetryDeck)

    /// App ID from https://dashboard.telemetrydeck.com — a write-only
    /// identifier, not a secret. Analytics are disabled while this is a
    /// placeholder.
    static let telemetryAppID = "YOUR_TELEMETRYDECK_APP_ID"

    static var isTelemetryConfigured: Bool {
        !telemetryAppID.isEmpty && !telemetryAppID.hasPrefix("YOUR_")
    }

    // MARK: - Subscriptions (StoreKit 2)

    /// Auto-renewable subscription product IDs. Must match App Store Connect
    /// and `Products.storekit` exactly.
    static let monthlyProductID = "com.newwavecreative.vinylshelf.pro.monthly"
    static let annualProductID = "com.newwavecreative.vinylshelf.pro.annual"

    static var subscriptionProductIDs: Set<String> {
        [monthlyProductID, annualProductID]
    }

    /// Master switch for the hard paywall. Ship OFF until the App Store
    /// Connect products (with their 30-day introductory free trial) are live;
    /// the gate also fails open if products can't be loaded, so an App Store
    /// outage never locks paying users out.
    static let enforcePaywall = false
}

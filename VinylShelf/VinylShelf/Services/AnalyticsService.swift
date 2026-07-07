import Foundation
import TelemetryDeck

/// Thin wrapper over TelemetryDeck. Signals are anonymous (no PII, no device
/// fingerprinting) and every call no-ops until `AppServicesConfig.telemetryAppID`
/// is set, so development and tests never emit.
///
/// Live dashboard (users, active users, sessions, and the custom signals
/// below): https://dashboard.telemetrydeck.com
enum Analytics {
    static func start() {
        guard AppServicesConfig.isTelemetryConfigured else { return }
        TelemetryDeck.initialize(config: .init(appID: AppServicesConfig.telemetryAppID))
    }

    static func track(_ signal: String, _ parameters: [String: String] = [:]) {
        guard AppServicesConfig.isTelemetryConfigured else { return }
        TelemetryDeck.signal(signal, parameters: parameters)
    }
}

/// Signal names, centralized so the dashboard vocabulary stays consistent.
enum AnalyticsEvent {
    static let appLaunched = "app.launched"
    static let recordAdded = "record.added"
    static let scanCompleted = "scan.completed"
    static let searchPerformed = "search.performed"
    static let subscriptionPurchased = "subscription.purchased"
    static let subscriptionRestored = "subscription.restored"
}

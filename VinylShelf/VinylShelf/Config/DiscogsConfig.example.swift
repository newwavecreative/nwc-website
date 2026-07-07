import Foundation

/// TEMPLATE — copy this file to `DiscogsConfig.swift` (same folder) and fill
/// in your credentials. `DiscogsConfig.swift` is gitignored so secrets never
/// land in version control. Never log or print any of these values.
///
/// Two auth modes (the app prefers key/secret when both are set):
///
/// 1. PRODUCTION — app-level Consumer Key + Secret from your Discogs
///    application (https://www.discogs.com/settings/developers). Users don't
///    need Discogs accounts; rate limiting is per device IP.
/// 2. DEVELOPMENT — a personal access token from the same page. Fine while
///    it's just you; leave key/secret as placeholders to use this.
enum DiscogsConfig {
    // Production: Discogs application credentials
    static let consumerKey = "YOUR_DISCOGS_CONSUMER_KEY"
    static let consumerSecret = "YOUR_DISCOGS_CONSUMER_SECRET"

    // Development: personal access token (used only when key/secret are unset)
    static let apiToken = "YOUR_DISCOGS_TOKEN_HERE"
}

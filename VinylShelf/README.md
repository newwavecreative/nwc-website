# Vinyl Shelf

A vinyl record collection manager for iOS. Catalog your records by scanning
barcodes or searching Discogs, keep a wishlist, and sync everything across
devices via iCloud.

- **Swift + SwiftUI**, iOS 17+, Xcode 16+
- **SwiftData** persistence with **CloudKit** sync
- **AVFoundation** barcode scanning (EAN-13 / UPC-A)
- **Kingfisher** for cover art (loaded from the Discogs CDN — never stored)
- **MVVM**, async/await throughout

## Setup

### 1. Add your Discogs credentials

```bash
cd VinylShelf/VinylShelf/Config
cp DiscogsConfig.example.swift DiscogsConfig.swift
```

Then fill in `DiscogsConfig.swift` (gitignored — never commit or log these).
Two modes, both from https://www.discogs.com/settings/developers:

- **Development:** paste a personal access token into `apiToken` and leave
  the key/secret placeholders alone.
- **Production:** paste your Discogs application's **Consumer Key + Secret**
  into `consumerKey`/`consumerSecret`. The app then authenticates at the app
  level — users don't need Discogs accounts, and Discogs' 60 req/min limit
  applies per device IP, so every user gets their own budget. Key/secret
  take precedence over the token when both are set.

The project won't compile until this file exists.

### 2. Enable CloudKit

CloudKit sync needs a signing team and an iCloud container:

1. Open `VinylShelf.xcodeproj`, select the **VinylShelf** target →
   *Signing & Capabilities*.
2. Pick your development team. The project expects the bundle ID
   `com.newwavecreative.vinylshelf` and the container
   `iCloud.com.newwavecreative.vinylshelf` (see `VinylShelf.entitlements`) —
   change both to match your team if needed.
3. Xcode provisions the container automatically with the iCloud capability.

No CloudKit account? The app still runs: `VinylShelfApp` falls back to a
local-only SwiftData store when the CloudKit configuration can't be created.

### 3. Build & run

Open `VinylShelf.xcodeproj`, let SPM resolve Kingfisher, and run on an
iOS 17+ device (barcode scanning needs a real camera; the simulator shows the
permission/denied handling instead).

## Tests

Run with **⌘U** or:

```bash
xcodebuild test -project VinylShelf.xcodeproj -scheme VinylShelf \
  -destination 'platform=iOS Simulator,name=iPhone 16'
```

- `DiscogsServiceTests` — URLProtocol-mocked API client tests: happy paths,
  429 retry/backoff, 404/401 mapping, malformed JSON.
- `DeduplicationTests` — in-memory SwiftData store: duplicate `discogsID`s are
  rejected, wishlist→collection moves flip the flag instead of inserting.

## Monetization & analytics setup

### Subscriptions (StoreKit 2)

`SubscriptionService` + `PaywallView` implement Vinyl Shelf Pro as
auto-renewable subscriptions. The **30-day free trial is configured in App
Store Connect**, not code (an introductory offer on each product); StoreKit
applies it automatically and the paywall displays it.

One-time App Store Connect setup:

1. Create a subscription group "Vinyl Shelf Pro" with two products matching
   `AppServicesConfig`: `…pro.monthly` and `…pro.annual`. Set prices.
2. On each product, add an **Introductory Offer → Free → 1 month** (App
   Store's 30-day trial).
3. Submit App Review screenshot info, add the Terms of Use (EULA) and
   privacy policy links to the App Store description (links are already in
   the paywall footer).
4. Flip `AppServicesConfig.enforcePaywall` to `true` and ship.

The gate **fails open**: if products can't load, nobody is locked out.
Local testing without App Store Connect: the shared scheme references
`Products.storekit` (mirror of the real products, incl. trials) — purchases
in the simulator run against this local store. If Xcode doesn't pick it up,
select it manually under Scheme → Run → Options → StoreKit Configuration.

### Usage dashboard (TelemetryDeck)

Anonymous, privacy-first analytics with a near-real-time dashboard (users,
active users, sessions, plus custom signals: records added, scans, searches,
purchases). Setup: create a free app at https://dashboard.telemetrydeck.com,
paste its App ID into `AppServicesConfig.telemetryAppID`. Analytics are
fully disabled while the placeholder is in place, collect no PII (declared
in `PrivacyInfo.xcprivacy`, no tracking → no ATT consent prompt needed),
and the free tier comfortably covers ~1,000 users.

### Launch checklist (scaling to ~1,000 users)

- [ ] Discogs Consumer Key/Secret in `DiscogsConfig.swift` (per-user rate
      limits, no user Discogs accounts needed)
- [ ] "Data provided by Discogs" attribution ships on the Search screen —
      keep it; it's required by the Discogs API terms (worth a read before
      charging money: https://www.discogs.com/developers)
- [ ] App Store Connect subscription products + 30-day intro offers created
- [ ] `enforcePaywall` flipped to `true`
- [ ] TelemetryDeck App ID configured
- [ ] Real privacy policy URL (paywall footer + App Store listing)
- [ ] App Store privacy labels: "Product Interaction — Analytics, not linked
      to identity" (matches `PrivacyInfo.xcprivacy`)
- [ ] Paid Apple Developer account with CloudKit container provisioned

## Architecture notes

- **CloudKit constraints**: every `@Model` property has a default or is
  optional, there are no `@Attribute(.unique)` constraints, and tracklists are
  stored as encoded JSON `Data` (`VinylRecord.tracklistData`) with a computed
  `tracklist: [Track]` accessor. Uniqueness on `discogsID` is enforced in
  `RecordStore`.
- **Rate limiting**: `RateLimiter` (sliding-window actor) throttles to
  Discogs' 60 requests/minute client-side; `DiscogsService` additionally
  retries HTTP 429 with exponential backoff (1s → 30s cap, 4 retries) before
  surfacing `DiscogsError.rateLimited`.
- **Scanning**: `BarcodeService` owns the `AVCaptureSession`; UPC-A codes
  arrive as EAN-13 with a leading zero, which Discogs matches fine.

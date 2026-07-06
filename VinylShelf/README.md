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

### 1. Add your Discogs token

The Discogs API requires a personal access token
([generate one here](https://www.discogs.com/settings/developers)).

```bash
cd VinylShelf/VinylShelf/Config
cp DiscogsConfig.example.swift DiscogsConfig.swift
```

Then open `DiscogsConfig.swift` and paste in your token. The file is
**gitignored** so the token never lands in version control — never commit or
log it. The project won't compile until this file exists.

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

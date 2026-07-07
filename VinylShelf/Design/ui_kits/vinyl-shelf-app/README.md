# Vinyl Shelf — App UI Kit

Interactive, high-fidelity recreation of the Vinyl Shelf mobile app. Composes the design-system components (Button, IconButton, Input, Switch, RecordCard, Chip, Badge, StarRating, Toast, Dialog, TabBar).

## Run
Open `index.html`. It loads `../../styles.css`, the compiled `../../_ds_bundle.js`, React/Babel, Lucide (CDN icons), and each screen file.

## Screens
- **ShelfScreen** — collection home: record count, genre filter chips, 2-col grid of `RecordCard`s (first one spins).
- **SearchScreen** — add records: search field + result rows with add-to-shelf.
- **WishlistScreen** — "on the hunt" list with remove.
- **ProfileScreen** — avatar, stats, share CTA, settings switches.
- **RecordDetail** — full-screen sheet: spinning disc behind the sleeve, mono meta grid, star rating, tracklist, wishlist toggle.

## Interactions
Tab nav (bottom `TabBar`), open a record → detail sheet, add from search → toast + appears on shelf, toggle wishlist, share → toast.

## Notes
- Covers are **generated on-brand gradient sleeves** (`data.js`) — no real/copyrighted album art.
- Icons are **Lucide** (CDN) — a substitution flagged in the root readme.
- Fonts are Google Fonts substitutions (see root readme CAVEATS).

# Vinyl Shelf — Design System

**Vinyl Shelf** is a mobile app for record collectors. Users catalog the vinyl they own, build wishlists of records they're hunting for, and share their shelves with friends. The brand voice is warm, a little playful, and obsessive in the best way — made for people who love the physical object, the crackle, and the ritual of dropping the needle.

The visual identity leans into the record itself: deep blue-black like a pressed LP, a warm signature **yellow** for the label at the center of every disc, and an **electric blue** accent for the light catching the grooves. Motion is springy and tactile — things spin, bounce, and settle like a record dropping onto a platter.

> **This is a from-scratch brand.** No codebase, Figma, or brand assets were provided. Colors, type, logo, and components were all authored here from the brief: *"a somewhat playful, animated feel using dark blues, black, and yellow."* See CAVEATS at the bottom.

## Sources
None provided. Built entirely from the written brief. There is no external repo, Figma file, or existing product to reference.

---

## CONTENT FUNDAMENTALS
How Vinyl Shelf writes.

- **Voice:** A knowledgeable friend at the record store — enthusiastic, never snobby. Playful but not goofy.
- **Person:** Address the user as **you**; the app refers to itself in the first person sparingly ("We found 3 pressings"). Possessive framing is central — **"your shelf," "your wishlist," "your collection."**
- **Casing:** Sentence case for everything — buttons, titles, labels. Reserve ALL-CAPS (with wide letter-spacing) for tiny meta labels only: `CATALOG NO.`, `PRESSING`, `2xLP`.
- **Tone examples:**
  - Empty shelf: *"Your shelf is empty. Let's find your first record."*
  - Added to collection: *"Filed on the shelf."*
  - Added to wishlist: *"On the hunt."*
  - Search placeholder: *"Search artists, albums, catalog #…"*
  - Share: *"Send your shelf to a friend."*
- **Numbers & metadata** are first-class citizens and set in **mono** — catalog numbers, pressing years, track times, BPM, record counts. Treat them like the small print on a record sleeve.
- **Emoji:** Not used in product UI. The needle/record motif carries personality instead. (A single ✦ or ● as a decorative glyph is acceptable in marketing, never in app chrome.)
- **Length:** Terse. Labels are 1–3 words. Encouragements are one short sentence. Never a paragraph where a phrase will do.

---

## VISUAL FOUNDATIONS

### Color
- **Foundation is dark.** The app sits on `--bg-app` (`#070A16`), a near-black blue like vinyl. A subtle radial gradient (`--grad-app`) lifts the top-left corner toward navy so screens never feel flat.
- **Surfaces** step up the ink ramp: `--surface-card` (#141C36) for cards, `--surface-raised` (#1C2748) for inputs/raised elements, `--surface-hover` for hover.
- **Yellow is the signature.** `--yellow-500` (#FFC93C) is the label color — used for the primary CTA, the "now spinning" / active state, and small joyful accents. It is high-energy; use it as a **spark, not a wash**. Text on yellow is always ink (`--text-on-yellow`).
- **Blue is the interactive accent** — links, focus rings, secondary actions, the highlight sweep on the record mark.
- **Cream** (`--cream-100`) is the primary text color on dark; never pure white.
- **Status:** green = owned/in collection, coral = wishlist, red = destructive.

### Type
- **Display — Bricolage Grotesque** (400–800). Playful, slightly quirky grotesque for screen titles, big numerals, and hero moments. Set tight (`--ls-tight`, `--lh-tight`) at large sizes.
- **Body — DM Sans.** Clean and warm for all UI and reading text.
- **Mono — Space Mono** for catalog numbers, years, track times, counts — the "record sleeve small print." Often uppercase with `--ls-caps` for labels.
- Minimum UI text 13px; captions 11px reserved for mono meta labels.

### Spacing & layout
- 4px base grid; `--gutter` (20px) is the standard mobile screen padding.
- Bottom tab bar (`--bottom-nav-h` 64px) is the primary nav. Hit targets ≥ 44px.
- Content caps at `--content-max` (480px) so it reads well on tablets too.

### Backgrounds & texture
- No photography as chrome. The **record groove texture** (`--grad-vinyl`, a fine repeating-radial ring pattern) can back hero panels and record thumbnails.
- Album art (user-supplied) is the main imagery; it always sits in a **square with `--radius-sm`** rounding and a subtle inner border.

### Corners, borders, shadows
- **Rounded and friendly.** Cards/buttons use `--radius-md` (14px); sheets and large cards `--radius-lg` (20px); chips/avatars/FAB are pills.
- Borders on dark are **light hairlines** — `--border-subtle` (white @ 7%) to `--border-default` (white @ 12%). Avoid heavy strokes.
- Elevation reads through a **lighter surface + soft ambient shadow** (`--shadow-md/lg`), not a hard black drop. Signature **glows** (`--glow-yellow`, `--glow-blue`) mark the active/"spinning" element only — used sparingly.

### Motion (playful & springy)
- **Springy easing** (`--ease-spring`, a slight overshoot) for element enters and press-releases — things settle with a little bounce.
- **`--ease-out`** for opacity/position; **linear** only for the continuous record spin.
- **The spin:** the active record rotates continuously (`--dur-spin`, ~1.6s/turn). This is the brand's signature animation.
- **Press state:** elements scale down to ~0.96 and darken slightly, then spring back.
- **Hover** (pointer devices): surface lightens one ink step; yellow/blue elements brighten one ramp step. Never just an opacity dip.
- Respect `prefers-reduced-motion`: freeze spins, keep fades.

### Transparency & blur
- Sheets and the bottom nav use a **frosted panel** — `--surface-card` at ~85% with `backdrop-filter: blur(18px)` — so album art scrolls faintly beneath.
- Protection: over album art, use a bottom-up ink gradient scrim rather than a solid bar so titles stay legible.

---

## ICONOGRAPHY
- **System:** [Lucide](https://lucide.dev) via CDN — a clean, rounded, **2px stroke** open-source set that matches the friendly geometry. This is a **substitution** (no brand icon set was provided) and is flagged for the user.
  - Load: `<script src="https://unpkg.com/lucide@latest"></script>` then `lucide.createIcons()`, or use inline `<i data-lucide="disc-3"></i>`.
  - Keep stroke at 2px, corners rounded, size 20–24px in UI, 28px in the tab bar.
- **Signature glyphs:** `disc-3` / `disc-album` (records), `heart` (wishlist), `library` / `layout-grid` (shelf), `search`, `share-2`, `list-music`, `plus`.
- **The record mark** (`assets/logo-mark.svg`) is an original SVG, not from an icon set — used as app icon, splash, and empty-state art.
- **Emoji / unicode:** not used as icons in product UI. A filled circle `●` may stand in for the spindle/now-playing dot decoratively.
- No custom hand-drawn SVG icons beyond the logo — use Lucide for everything else so weight stays consistent.

---

## Index / Manifest
Root files:
- `styles.css` — entry point; `@import`s all tokens. **Consumers link this.**
- `tokens/` — `fonts.css`, `colors.css`, `typography.css`, `spacing.css`, `effects.css`.
- `assets/` — `logo-mark.svg`, `logo-wordmark.svg`.
- `readme.md` — this file.
- `SKILL.md` — Agent-Skill wrapper.

Foundation cards (Design System tab): under `guidelines/` — Colors, Type, Spacing, Brand groups.

Components (`components/<group>/`):
- **forms/** — Button, IconButton, Input, Switch
- **data-display/** — RecordCard, Chip, Badge, StarRating
- **feedback/** — Toast, Dialog
- **navigation/** — TabBar

UI kit (`ui_kits/vinyl-shelf-app/`): interactive mobile recreation — Shelf, Record detail, Search/Add, Wishlist, Profile/Share.

---

## CAVEATS
- **Fonts are Google Fonts substitutions** (Bricolage Grotesque / DM Sans / Space Mono), loaded via CDN `@import`. No licensed brand fonts were provided. If you have brand fonts, replace `tokens/fonts.css` and the families in `tokens/typography.css`.
- **Icons are Lucide (CDN)** — a substitution, not a provided set.
- **The logo is an original mark** created for this brief (a stylized record). It's a starting point — happy to iterate on the disc/wordmark.

---
name: vinyl-shelf-design
description: Use this skill to generate well-branded interfaces and assets for Vinyl Shelf, either for production or throwaway prototypes/mocks/etc. Contains essential design guidelines, colors, type, fonts, assets, and UI kit components for prototyping.
user-invocable: true
---

Read the README.md file within this skill, and explore the other available files.
If creating visual artifacts (slides, mocks, throwaway prototypes, etc), copy assets out and create static HTML files for the user to view. If working on production code, you can copy assets and read the rules here to become an expert in designing with this brand.
If the user invokes this skill without any other guidance, ask them what they want to build or design, ask some questions, and act as an expert designer who outputs HTML artifacts _or_ production code, depending on the need.

## Quick map
- `readme.md` — the full design guide: content fundamentals, visual foundations, iconography, manifest.
- `styles.css` — link this one file to get all tokens + fonts. `@import`s everything in `tokens/`.
- `tokens/` — `colors.css`, `typography.css`, `spacing.css`, `effects.css`, `fonts.css`.
- `assets/` — `logo-mark.svg`, `logo-wordmark.svg`.
- `components/` — React primitives: forms/, data-display/, feedback/, navigation/. Each has `.jsx` + `.d.ts` + `.prompt.md`.
- `ui_kits/vinyl-shelf-app/` — interactive mobile app recreation.
- `guidelines/` — foundation specimen cards (Colors, Type, Spacing, Brand).

## The brand in one breath
Vinyl record catalog app. Dark blue-black like a pressed LP, signature warm **yellow** label, **electric blue** accent, cream text. Playful, springy motion — the active record **spins**. Mono type for catalog numbers / years / track times.

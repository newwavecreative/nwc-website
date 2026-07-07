**IconButton** — round icon-only control for toolbars, cards, and headers. Pass a Lucide glyph as children; always give a `label`.

```jsx
<IconButton label="Share" variant="soft"><i data-lucide="share-2" /></IconButton>
<IconButton label="Wishlist" active><i data-lucide="heart" /></IconButton>
```

Variants: `solid` (yellow), `soft` (blue tint), `ghost` (bare). `active` tints yellow. Presses scale to 0.9 with a spring. Sizes `sm 34 | md 44 | lg 52`.

**Button** — the primary tactile action; yellow primary CTA, springy press feedback. Use for any commit action ("Add to shelf", "Save", "Share").

```jsx
<Button variant="primary" size="lg" fullWidth onClick={add}>Add to shelf</Button>
<Button variant="secondary" iconLeft={<i data-lucide="heart" />}>Wishlist</Button>
<Button variant="ghost">Cancel</Button>
```

Variants: `primary` (yellow gradient, ink text — one per view), `secondary` (raised surface), `ghost` (blue text, chrome-free), `danger` (coral outline). Sizes `sm | md | lg`. Presses scale to 0.96 with a spring.

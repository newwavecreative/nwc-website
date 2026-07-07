**Input** — text field on dark surface; focus lifts the border to blue with a ring. Use `mono` for catalog numbers / years.

```jsx
<Input label="Catalog no." placeholder="BLP 1577" mono />
<Input placeholder="Search artists, albums…" iconLeft={<i data-lucide="search" />} />
```

48px tall, `--radius-md`. Pair a leading Lucide icon for search fields.

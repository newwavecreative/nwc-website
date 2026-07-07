**RecordCard** — the core object of Vinyl Shelf: a record in a grid or shelf. Square art, display title, artist, mono meta.

```jsx
<RecordCard
  title="Kind of Blue" artist="Miles Davis"
  cover={coverUrl} year="1959" format="LP"
  status="owned" onClick={openDetail}
/>
```

Without `cover`, shows a spinning groove placeholder. `status` adds a colored dot (green owned / coral wishlist). Use in a 2–3 col grid for the shelf.

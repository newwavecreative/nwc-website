**StarRating** — rate a record 1–5. Read-only by default; pass `onChange` to let the user set it (stars pop on hover).

```jsx
<StarRating value={4} />
<StarRating value={rating} onChange={setRating} size={28} />
```

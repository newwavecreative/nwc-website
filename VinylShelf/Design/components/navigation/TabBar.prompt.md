**TabBar** — the app's primary bottom navigation (frosted). Active tab springs up to yellow. Requires Lucide loaded (`lucide.createIcons()` after render).

```jsx
<TabBar
  active={tab} onChange={setTab}
  items={[
    { id:'shelf',   label:'Shelf',   icon:'library' },
    { id:'search',  label:'Add',     icon:'search' },
    { id:'wishlist',label:'Wishlist',icon:'heart' },
    { id:'profile', label:'You',     icon:'user' },
  ]}
/>
```

**Dialog** — confirmation / small form modal ("Remove from shelf?"). Frosted scrim, springs in. Pass `actions` for the footer buttons.

```jsx
<Dialog open={open} title="Remove from shelf?" onClose={close}
  actions={<>
    <Button variant="ghost" onClick={close}>Keep</Button>
    <Button variant="danger" onClick={remove}>Remove</Button>
  </>}>
  This record will leave your collection. You can always add it back.
</Dialog>
```

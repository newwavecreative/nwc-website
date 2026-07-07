/* WishlistScreen — records on the hunt. List rows with condition target + remove. */
function WishlistScreen({ records, onRemove }) {
  const { Badge, IconButton } = window.VinylShelfDesignSystem_aa4cb5;
  return (
    <div style={{ padding: '10px 20px 12px' }}>
      <div style={{ fontFamily: 'var(--font-mono)', fontSize: 11, letterSpacing: '0.12em', textTransform: 'uppercase', color: 'var(--text-muted)' }}>On the hunt</div>
      <h1 style={{ margin: '2px 0 16px', fontFamily: 'var(--font-display)', fontSize: 28, fontWeight: 800, letterSpacing: '-0.02em', color: 'var(--text-primary)' }}>
        Wishlist
      </h1>

      {records.length === 0 ? (
        <div style={{ textAlign: 'center', padding: '48px 20px', color: 'var(--text-muted)' }}>
          <i data-lucide="heart" style={{ width: 40, height: 40 }}></i>
          <p style={{ marginTop: 12 }}>Nothing on the hunt yet.</p>
        </div>
      ) : (
        <div style={{ display: 'flex', flexDirection: 'column', gap: 10 }}>
          {records.map(r => (
            <div key={r.id} style={{ display: 'flex', alignItems: 'center', gap: 12, padding: 10, background: 'var(--surface-card)', border: '1px solid var(--border-subtle)', borderRadius: 'var(--radius-md)' }}>
              <img src={r.cover} alt="" style={{ width: 52, height: 52, borderRadius: 'var(--radius-sm)', objectFit: 'cover' }} />
              <div style={{ flex: 1, minWidth: 0 }}>
                <div style={{ fontFamily: 'var(--font-display)', fontSize: 15, fontWeight: 700, color: 'var(--text-primary)', whiteSpace: 'nowrap', overflow: 'hidden', textOverflow: 'ellipsis' }}>{r.title}</div>
                <div style={{ fontSize: 13, color: 'var(--text-secondary)' }}>{r.artist} · {r.year}</div>
                <div style={{ marginTop: 4 }}>
                  <Badge tone="wishlist" dot>Seeking {r.format}</Badge>
                </div>
              </div>
              <IconButton label="Remove" variant="ghost" onClick={() => onRemove(r)}>
                <i data-lucide="x" style={{ width: 20, height: 20 }}></i>
              </IconButton>
            </div>
          ))}
        </div>
      )}
    </div>
  );
}
window.WishlistScreen = WishlistScreen;

/* SearchScreen — add records. Search field + genre suggestions + results list with add button. */
function SearchScreen({ results, onAdd, addedIds }) {
  const { Input, Badge, IconButton } = window.VinylShelfDesignSystem_aa4cb5;
  const [q, setQ] = React.useState('');

  return (
    <div style={{ padding: '10px 20px 12px' }}>
      <h1 style={{ margin: '0 0 12px', fontFamily: 'var(--font-display)', fontSize: 28, fontWeight: 800, letterSpacing: '-0.02em', color: 'var(--text-primary)' }}>
        Add a record
      </h1>
      <Input
        value={q}
        onChange={e => setQ(e.target.value)}
        placeholder="Search artists, albums, catalog #…"
        iconLeft={<i data-lucide="search" style={{ width: 18, height: 18 }}></i>}
      />

      <div style={{ fontFamily: 'var(--font-mono)', fontSize: 11, letterSpacing: '0.12em', textTransform: 'uppercase', color: 'var(--text-muted)', margin: '20px 0 10px' }}>
        Popular near you
      </div>

      <div style={{ display: 'flex', flexDirection: 'column', gap: 10 }}>
        {results.map(r => {
          const added = addedIds.includes(r.id);
          return (
            <div key={r.id} style={{ display: 'flex', alignItems: 'center', gap: 12, padding: 10, background: 'var(--surface-card)', border: '1px solid var(--border-subtle)', borderRadius: 'var(--radius-md)' }}>
              <img src={r.cover} alt="" style={{ width: 52, height: 52, borderRadius: 'var(--radius-sm)', objectFit: 'cover' }} />
              <div style={{ flex: 1, minWidth: 0 }}>
                <div style={{ fontFamily: 'var(--font-display)', fontSize: 15, fontWeight: 700, color: 'var(--text-primary)', whiteSpace: 'nowrap', overflow: 'hidden', textOverflow: 'ellipsis' }}>{r.title}</div>
                <div style={{ fontSize: 13, color: 'var(--text-secondary)' }}>{r.artist}</div>
                <div style={{ marginTop: 4, display: 'flex', gap: 6 }}>
                  <Badge tone="neutral">{r.year}</Badge>
                  <Badge tone="accent">{r.format}</Badge>
                </div>
              </div>
              <IconButton label={added ? 'Added' : 'Add to shelf'} variant={added ? 'soft' : 'solid'} onClick={() => onAdd(r)}>
                <i data-lucide={added ? 'check' : 'plus'} style={{ width: 20, height: 20 }}></i>
              </IconButton>
            </div>
          );
        })}
      </div>
    </div>
  );
}
window.SearchScreen = SearchScreen;

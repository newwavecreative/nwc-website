/* ShelfScreen — the collection home. Header + stats + filter chips + record grid. */
function ShelfScreen({ records, filter, setFilter, onOpen }) {
  const { RecordCard, Chip } = window.VinylShelfDesignSystem_aa4cb5;
  const genres = ['All', 'Jazz', 'Rock', 'Soul', 'Electronic', 'Hip-Hop'];
  const shown = filter === 'All' ? records : records.filter(r => r.genre === filter);

  return (
    <div style={{ paddingBottom: 12 }}>
      <div style={{ padding: '10px 20px 4px', display: 'flex', alignItems: 'flex-end', justifyContent: 'space-between' }}>
        <div>
          <div style={{ fontFamily: 'var(--font-mono)', fontSize: 11, letterSpacing: '0.12em', textTransform: 'uppercase', color: 'var(--text-muted)' }}>Your shelf</div>
          <h1 style={{ margin: '2px 0 0', fontFamily: 'var(--font-display)', fontSize: 32, fontWeight: 800, letterSpacing: '-0.02em', color: 'var(--text-primary)' }}>
            {records.length} records
          </h1>
        </div>
        <button aria-label="Sort" style={{ width: 44, height: 44, borderRadius: 'var(--radius-pill)', border: '1px solid var(--border-default)', background: 'var(--surface-raised)', color: 'var(--text-secondary)', display: 'flex', alignItems: 'center', justifyContent: 'center', cursor: 'pointer' }}>
          <i data-lucide="arrow-up-down" style={{ width: 20, height: 20 }}></i>
        </button>
      </div>

      <div style={{ display: 'flex', gap: 8, padding: '12px 20px', overflowX: 'auto' }}>
        {genres.map(g => (
          <div key={g} style={{ flex: '0 0 auto' }}>
            <Chip selected={filter === g} onClick={() => setFilter(g)}>{g}</Chip>
          </div>
        ))}
      </div>

      <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 16, padding: '4px 20px' }}>
        {shown.map((r, i) => (
          <RecordCard key={r.id} {...r} spinning={i === 0} onClick={() => onOpen(r)} />
        ))}
      </div>
    </div>
  );
}
window.ShelfScreen = ShelfScreen;

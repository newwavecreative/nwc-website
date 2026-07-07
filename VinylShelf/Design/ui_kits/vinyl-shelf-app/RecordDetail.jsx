/* RecordDetail — full-screen sheet for one record. Big spinning art, meta, rating, actions. */
function RecordDetail({ record, onClose, onToggleWish, wished }) {
  const { Button, Badge, StarRating, IconButton } = window.VinylShelfDesignSystem_aa4cb5;
  if (!record) return null;
  const [rating, setRating] = React.useState(record.rating || 0);

  const tracks = ['So What', 'Freddie Freeloader', 'Blue in Green', 'All Blues', 'Flamenco Sketches'];
  const times = ['9:22', '9:46', '5:37', '11:33', '9:26'];

  return (
    <div style={{ position: 'absolute', inset: 0, zIndex: 60, background: 'var(--bg-app)', animation: 'vs-sheet-in var(--dur-slow) var(--ease-out)', display: 'flex', flexDirection: 'column' }}>
      <style>{`@keyframes vs-sheet-in { from { opacity:0; transform: translateY(24px); } to { opacity:1; transform:none; } } @keyframes vs-detail-spin { to { transform: rotate(360deg); } }`}</style>

      {/* header */}
      <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', padding: '12px 16px' }}>
        <IconButton label="Back" variant="ghost" onClick={onClose}>
          <i data-lucide="chevron-left" style={{ width: 24, height: 24 }}></i>
        </IconButton>
        <IconButton label="Share" variant="ghost">
          <i data-lucide="share-2" style={{ width: 22, height: 22 }}></i>
        </IconButton>
      </div>

      <div style={{ flex: 1, overflowY: 'auto', padding: '0 20px 24px' }}>
        {/* art + spinning disc behind */}
        <div style={{ position: 'relative', width: 220, height: 220, margin: '8px auto 20px' }}>
          <div style={{ position: 'absolute', top: 0, right: -40, width: 200, height: 200, borderRadius: '50%', background: 'var(--grad-vinyl)', border: '1px solid var(--border-default)', animation: 'vs-detail-spin var(--dur-spin) linear infinite' }}>
            <div style={{ position: 'absolute', inset: '38%', borderRadius: '50%', background: 'var(--grad-yellow)', border: '2px solid var(--yellow-600)' }}></div>
          </div>
          <img src={record.cover} alt={record.title} style={{ position: 'relative', width: 200, height: 200, borderRadius: 'var(--radius-md)', objectFit: 'cover', boxShadow: 'var(--shadow-lg)', border: '1px solid var(--border-subtle)' }} />
        </div>

        <h1 style={{ margin: 0, textAlign: 'center', fontFamily: 'var(--font-display)', fontSize: 26, fontWeight: 800, letterSpacing: '-0.02em', color: 'var(--text-primary)' }}>{record.title}</h1>
        <div style={{ textAlign: 'center', fontSize: 16, color: 'var(--text-secondary)', marginTop: 2 }}>{record.artist}</div>

        <div style={{ display: 'flex', justifyContent: 'center', gap: 8, marginTop: 12, flexWrap: 'wrap' }}>
          {record.status === 'owned' ? <Badge tone="owned" dot>Owned</Badge> : <Badge tone="wishlist" dot>On the hunt</Badge>}
          <Badge tone="accent">{record.format}</Badge>
          {record.cond && <Badge tone="neutral">{record.cond}</Badge>}
        </div>

        <div style={{ display: 'flex', justifyContent: 'center', marginTop: 14 }}>
          <StarRating value={rating} onChange={setRating} size={28} />
        </div>

        {/* meta grid */}
        <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 12, marginTop: 22, padding: 16, background: 'var(--surface-card)', border: '1px solid var(--border-subtle)', borderRadius: 'var(--radius-md)' }}>
          {[['Catalog no.', record.cat], ['Pressing', record.year], ['Format', record.format], ['Genre', record.genre]].map(([k, v]) => (
            <div key={k}>
              <div style={{ fontFamily: 'var(--font-mono)', fontSize: 10, letterSpacing: '0.1em', textTransform: 'uppercase', color: 'var(--text-muted)' }}>{k}</div>
              <div style={{ fontFamily: 'var(--font-mono)', fontSize: 15, color: 'var(--yellow-500)', marginTop: 2 }}>{v}</div>
            </div>
          ))}
        </div>

        {/* tracklist */}
        <div style={{ fontFamily: 'var(--font-mono)', fontSize: 11, letterSpacing: '0.12em', textTransform: 'uppercase', color: 'var(--text-muted)', margin: '22px 0 8px' }}>Side A</div>
        {tracks.map((t, i) => (
          <div key={t} style={{ display: 'flex', alignItems: 'center', gap: 12, padding: '10px 4px', borderBottom: '1px solid var(--border-subtle)' }}>
            <span style={{ fontFamily: 'var(--font-mono)', fontSize: 12, color: 'var(--text-muted)', width: 18 }}>{i + 1}</span>
            <span style={{ flex: 1, fontSize: 15, color: 'var(--text-primary)' }}>{t}</span>
            <span style={{ fontFamily: 'var(--font-mono)', fontSize: 12, color: 'var(--text-muted)' }}>{times[i]}</span>
          </div>
        ))}

        <div style={{ display: 'flex', gap: 10, marginTop: 22 }}>
          <Button variant={wished ? 'secondary' : 'primary'} size="lg" fullWidth iconLeft={<i data-lucide="heart" style={{ width: 20, height: 20 }}></i>} onClick={onToggleWish}>
            {wished ? 'On your wishlist' : 'Add to wishlist'}
          </Button>
        </div>
      </div>
    </div>
  );
}
window.RecordDetail = RecordDetail;

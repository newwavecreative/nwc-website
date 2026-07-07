/* ProfileScreen — the user & sharing. Avatar, stats, share row, settings switches. */
function ProfileScreen({ ownedCount, wishCount, onShare, isPublic, setPublic }) {
  const { Button, Switch, Badge } = window.VinylShelfDesignSystem_aa4cb5;
  const Stat = ({ n, label }) => (
    <div style={{ flex: 1, textAlign: 'center' }}>
      <div style={{ fontFamily: 'var(--font-display)', fontSize: 26, fontWeight: 800, color: 'var(--yellow-500)' }}>{n}</div>
      <div style={{ fontFamily: 'var(--font-mono)', fontSize: 10, letterSpacing: '0.1em', textTransform: 'uppercase', color: 'var(--text-muted)', marginTop: 2 }}>{label}</div>
    </div>
  );

  return (
    <div style={{ padding: '18px 20px 12px' }}>
      <div style={{ display: 'flex', alignItems: 'center', gap: 14 }}>
        <div style={{ width: 64, height: 64, borderRadius: 'var(--radius-pill)', background: 'var(--grad-blue)', display: 'flex', alignItems: 'center', justifyContent: 'center', fontFamily: 'var(--font-display)', fontSize: 26, fontWeight: 800, color: 'var(--cream-50)', border: '2px solid var(--border-default)' }}>A</div>
        <div>
          <div style={{ fontFamily: 'var(--font-display)', fontSize: 22, fontWeight: 800, color: 'var(--text-primary)' }}>Alex Rivera</div>
          <div style={{ fontSize: 13, color: 'var(--text-secondary)' }}>@alexspins · Portland, OR</div>
        </div>
      </div>

      <div style={{ display: 'flex', gap: 8, marginTop: 18, padding: '16px 8px', background: 'var(--surface-card)', border: '1px solid var(--border-subtle)', borderRadius: 'var(--radius-lg)' }}>
        <Stat n={ownedCount} label="Owned" />
        <div style={{ width: 1, background: 'var(--border-default)' }}></div>
        <Stat n={wishCount} label="Wishlist" />
        <div style={{ width: 1, background: 'var(--border-default)' }}></div>
        <Stat n="12" label="Friends" />
      </div>

      <div style={{ marginTop: 18 }}>
        <Button variant="primary" size="lg" fullWidth iconLeft={<i data-lucide="share-2" style={{ width: 20, height: 20 }}></i>} onClick={onShare}>
          Share your shelf
        </Button>
      </div>

      <div style={{ marginTop: 22, fontFamily: 'var(--font-mono)', fontSize: 11, letterSpacing: '0.12em', textTransform: 'uppercase', color: 'var(--text-muted)' }}>Settings</div>
      <div style={{ marginTop: 10, display: 'flex', flexDirection: 'column', gap: 2, background: 'var(--surface-card)', border: '1px solid var(--border-subtle)', borderRadius: 'var(--radius-md)', overflow: 'hidden' }}>
        <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', padding: '14px 16px' }}>
          <div>
            <div style={{ fontSize: 15, color: 'var(--text-primary)' }}>Public shelf</div>
            <div style={{ fontSize: 12, color: 'var(--text-muted)' }}>Anyone with the link can view</div>
          </div>
          <Switch checked={isPublic} onChange={setPublic} />
        </div>
        <div style={{ height: 1, background: 'var(--border-subtle)' }}></div>
        <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', padding: '14px 16px' }}>
          <div>
            <div style={{ fontSize: 15, color: 'var(--text-primary)' }}>Wishlist alerts</div>
            <div style={{ fontSize: 12, color: 'var(--text-muted)' }}>Notify me on a match</div>
          </div>
          <Switch checked={true} onChange={() => {}} />
        </div>
      </div>
    </div>
  );
}
window.ProfileScreen = ProfileScreen;

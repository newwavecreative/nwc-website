import React from 'react';

/**
 * RecordCard — the core object of Vinyl Shelf. Square album art, title,
 * artist, and mono meta (year / catalog / format). Optional status dot.
 * The art spins when `spinning`. Press springs down.
 */
export function RecordCard({
  title,
  artist,
  cover,          // image url; if absent, groove texture placeholder
  year,
  format,
  status,         // 'owned' | 'wishlist' | undefined
  spinning = false,
  onClick,
  style = {},
}) {
  const [pressed, setPressed] = React.useState(false);
  const statusColor = status === 'owned' ? 'var(--status-owned)'
    : status === 'wishlist' ? 'var(--status-wishlist)' : null;

  return (
    <div
      onClick={onClick}
      onPointerDown={() => setPressed(true)}
      onPointerUp={() => setPressed(false)}
      onPointerLeave={() => setPressed(false)}
      style={{
        display: 'flex',
        flexDirection: 'column',
        gap: 10,
        cursor: onClick ? 'pointer' : 'default',
        transform: pressed ? 'scale(0.97)' : 'scale(1)',
        transition: 'transform var(--dur-fast) var(--ease-spring)',
        ...style,
      }}
    >
      <div style={{
        position: 'relative',
        aspectRatio: '1 / 1',
        borderRadius: 'var(--radius-sm)',
        overflow: 'hidden',
        background: cover ? `center/cover no-repeat url(${cover})` : 'var(--grad-vinyl)',
        border: '1px solid var(--border-subtle)',
        boxShadow: 'var(--shadow-md)',
      }}>
        {!cover && (
          <div style={{
            position: 'absolute', inset: 0, display: 'flex', alignItems: 'center', justifyContent: 'center',
          }}>
            <div style={{
              width: '38%', height: '38%', borderRadius: '50%',
              background: 'var(--grad-yellow)', border: '2px solid var(--yellow-600)',
              animation: spinning ? 'vs-spin var(--dur-spin) linear infinite' : 'none',
            }} />
          </div>
        )}
        {statusColor && (
          <span style={{
            position: 'absolute', top: 8, right: 8,
            width: 10, height: 10, borderRadius: '50%',
            background: statusColor, boxShadow: '0 0 0 3px rgba(7,10,22,0.6)',
          }} />
        )}
        <style>{`@keyframes vs-spin { to { transform: rotate(360deg); } }`}</style>
      </div>
      <div>
        <div style={{
          fontFamily: 'var(--font-display)', fontSize: 15, fontWeight: 'var(--fw-bold)',
          color: 'var(--text-primary)', letterSpacing: '-0.01em',
          whiteSpace: 'nowrap', overflow: 'hidden', textOverflow: 'ellipsis',
        }}>{title}</div>
        <div style={{
          fontSize: 13, color: 'var(--text-secondary)',
          whiteSpace: 'nowrap', overflow: 'hidden', textOverflow: 'ellipsis',
        }}>{artist}</div>
        {(year || format) && (
          <div style={{
            fontFamily: 'var(--font-mono)', fontSize: 11, color: 'var(--text-muted)',
            marginTop: 3, letterSpacing: '0.02em',
          }}>{[year, format].filter(Boolean).join(' · ')}</div>
        )}
      </div>
    </div>
  );
}

import React from 'react';

/**
 * Badge — small status label. Tones: owned, wishlist, neutral, accent.
 */
export function Badge({ children, tone = 'neutral', dot = false, style = {}, ...rest }) {
  const tones = {
    owned:    { bg: 'rgba(55,201,138,0.16)', fg: 'var(--status-owned)' },
    wishlist: { bg: 'rgba(255,107,94,0.16)', fg: 'var(--status-wishlist)' },
    accent:   { bg: 'var(--accent-soft)', fg: 'var(--yellow-500)' },
    blue:     { bg: 'var(--accent-blue-soft)', fg: 'var(--blue-300)' },
    neutral:  { bg: 'var(--surface-raised)', fg: 'var(--text-secondary)' },
  };
  const t = tones[tone] || tones.neutral;
  return (
    <span
      style={{
        display: 'inline-flex',
        alignItems: 'center',
        gap: 5,
        height: 22,
        padding: '0 9px',
        borderRadius: 'var(--radius-pill)',
        fontFamily: 'var(--font-mono)',
        fontSize: 11,
        letterSpacing: '0.03em',
        textTransform: 'uppercase',
        background: t.bg,
        color: t.fg,
        ...style,
      }}
      {...rest}
    >
      {dot && <span style={{ width: 6, height: 6, borderRadius: '50%', background: t.fg }} />}
      {children}
    </span>
  );
}

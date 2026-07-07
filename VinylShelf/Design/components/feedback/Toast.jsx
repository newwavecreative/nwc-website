import React from 'react';

/**
 * Toast — brief confirmation that slides up with a spring.
 * Tones map to an accent bar + optional Lucide icon (passed as children of `icon`).
 */
export function Toast({ message, tone = 'default', icon = null, visible = true, style = {} }) {
  const tones = {
    default:  'var(--yellow-500)',
    owned:    'var(--status-owned)',
    wishlist: 'var(--status-wishlist)',
    blue:     'var(--blue-400)',
  };
  const accent = tones[tone] || tones.default;

  return (
    <div
      role="status"
      style={{
        display: 'inline-flex',
        alignItems: 'center',
        gap: 12,
        padding: '12px 16px 12px 14px',
        background: 'rgba(20,28,54,0.92)',
        backdropFilter: 'blur(18px)',
        WebkitBackdropFilter: 'blur(18px)',
        borderRadius: 'var(--radius-md)',
        border: '1px solid var(--border-default)',
        boxShadow: 'var(--shadow-lg)',
        color: 'var(--text-primary)',
        fontFamily: 'var(--font-body)',
        fontSize: 14,
        minWidth: 220,
        opacity: visible ? 1 : 0,
        transform: visible ? 'translateY(0) scale(1)' : 'translateY(16px) scale(0.96)',
        transition: 'opacity var(--dur-base) var(--ease-out), transform var(--dur-base) var(--ease-spring)',
        ...style,
      }}
    >
      <span style={{
        width: 4, alignSelf: 'stretch', borderRadius: 'var(--radius-pill)', background: accent,
      }} />
      {icon && <span style={{ color: accent, display: 'inline-flex' }}>{icon}</span>}
      <span style={{ fontWeight: 'var(--fw-medium)' }}>{message}</span>
    </div>
  );
}

import React from 'react';

/**
 * TabBar — bottom navigation for the app. Frosted panel.
 * items: [{ id, label, icon }] where icon is a Lucide name string.
 * Active tab lifts to yellow. The center action can be emphasized (fab).
 */
export function TabBar({ items = [], active, onChange, style = {} }) {
  return (
    <nav
      style={{
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'space-around',
        height: 'var(--bottom-nav-h)',
        padding: '0 8px',
        background: 'rgba(14,20,40,0.86)',
        backdropFilter: 'blur(18px)',
        WebkitBackdropFilter: 'blur(18px)',
        borderTop: '1px solid var(--border-subtle)',
        ...style,
      }}
    >
      {items.map((it) => {
        const on = it.id === active;
        return (
          <button
            key={it.id}
            type="button"
            aria-label={it.label}
            aria-current={on ? 'page' : undefined}
            onClick={() => onChange && onChange(it.id)}
            style={{
              display: 'flex',
              flexDirection: 'column',
              alignItems: 'center',
              justifyContent: 'center',
              gap: 3,
              flex: 1,
              height: '100%',
              minWidth: 'var(--tap-min)',
              border: 'none',
              background: 'transparent',
              cursor: 'pointer',
              color: on ? 'var(--yellow-500)' : 'var(--text-muted)',
              transition: 'color var(--dur-base) var(--ease-out)',
              WebkitTapHighlightColor: 'transparent',
            }}
          >
            <span style={{
              display: 'inline-flex',
              transform: on ? 'translateY(-1px) scale(1.06)' : 'none',
              transition: 'transform var(--dur-base) var(--ease-spring)',
            }}>
              <i data-lucide={it.icon} style={{ width: 24, height: 24 }} />
            </span>
            <span style={{
              fontFamily: 'var(--font-body)',
              fontSize: 10,
              fontWeight: on ? 'var(--fw-semibold)' : 'var(--fw-medium)',
              letterSpacing: '0.01em',
            }}>{it.label}</span>
          </button>
        );
      })}
    </nav>
  );
}

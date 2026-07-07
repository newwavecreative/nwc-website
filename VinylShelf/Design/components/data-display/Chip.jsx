import React from 'react';

/**
 * Chip — pill for genres, filters, formats. Selectable.
 */
export function Chip({ children, selected = false, onClick, iconLeft = null, style = {}, ...rest }) {
  const interactive = !!onClick;
  return (
    <button
      type="button"
      onClick={onClick}
      style={{
        display: 'inline-flex',
        alignItems: 'center',
        gap: 6,
        height: 34,
        padding: '0 14px',
        borderRadius: 'var(--radius-pill)',
        fontFamily: 'var(--font-body)',
        fontSize: 13,
        fontWeight: 'var(--fw-medium)',
        cursor: interactive ? 'pointer' : 'default',
        border: `1px solid ${selected ? 'transparent' : 'var(--border-default)'}`,
        background: selected ? 'var(--accent-soft)' : 'transparent',
        color: selected ? 'var(--yellow-500)' : 'var(--text-secondary)',
        boxShadow: selected ? 'inset 0 0 0 1px var(--yellow-600)' : 'none',
        transition: 'all var(--dur-base) var(--ease-out)',
        WebkitTapHighlightColor: 'transparent',
        ...style,
      }}
      {...rest}
    >
      {iconLeft}
      {children}
    </button>
  );
}

import React from 'react';

/**
 * Dialog — centered modal sheet with a frosted scrim. Springs in.
 * Provide title, body (children) and action buttons.
 */
export function Dialog({ open = true, title, children, actions = null, onClose, style = {} }) {
  if (!open) return null;
  return (
    <div
      onClick={onClose}
      style={{
        position: 'fixed', inset: 0, zIndex: 100,
        display: 'flex', alignItems: 'center', justifyContent: 'center',
        padding: 24,
        background: 'rgba(7,10,22,0.62)',
        backdropFilter: 'blur(6px)',
        WebkitBackdropFilter: 'blur(6px)',
      }}
    >
      <div
        onClick={(e) => e.stopPropagation()}
        role="dialog"
        aria-modal="true"
        style={{
          width: '100%',
          maxWidth: 360,
          background: 'var(--surface-card)',
          border: '1px solid var(--border-default)',
          borderRadius: 'var(--radius-lg)',
          boxShadow: 'var(--shadow-lg)',
          padding: 22,
          animation: 'vs-dialog-in var(--dur-slow) var(--ease-spring)',
          ...style,
        }}
      >
        {title && (
          <h3 style={{
            margin: '0 0 8px',
            fontFamily: 'var(--font-display)',
            fontSize: 20, fontWeight: 'var(--fw-bold)',
            letterSpacing: '-0.01em', color: 'var(--text-primary)',
          }}>{title}</h3>
        )}
        <div style={{ fontFamily: 'var(--font-body)', fontSize: 15, color: 'var(--text-secondary)', lineHeight: 1.5 }}>
          {children}
        </div>
        {actions && (
          <div style={{ display: 'flex', gap: 10, justifyContent: 'flex-end', marginTop: 20 }}>
            {actions}
          </div>
        )}
        <style>{`@keyframes vs-dialog-in { from { opacity: 0; transform: translateY(12px) scale(0.94); } to { opacity: 1; transform: none; } }`}</style>
      </div>
    </div>
  );
}

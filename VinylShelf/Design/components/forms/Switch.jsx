import React from 'react';

/**
 * Toggle switch. Yellow when on, springy knob.
 */
export function Switch({ checked = false, onChange, disabled = false, label, style = {}, ...rest }) {
  const toggle = () => { if (!disabled && onChange) onChange(!checked); };
  return (
    <label style={{ display: 'inline-flex', alignItems: 'center', gap: 10, cursor: disabled ? 'not-allowed' : 'pointer', opacity: disabled ? 0.5 : 1, ...style }}>
      <button
        type="button"
        role="switch"
        aria-checked={checked}
        onClick={toggle}
        disabled={disabled}
        style={{
          width: 46,
          height: 28,
          borderRadius: 'var(--radius-pill)',
          border: 'none',
          padding: 3,
          background: checked ? 'var(--grad-yellow)' : 'var(--surface-raised)',
          boxShadow: checked ? 'var(--glow-yellow)' : 'inset 0 0 0 1px var(--border-default)',
          cursor: disabled ? 'not-allowed' : 'pointer',
          transition: 'background var(--dur-base) var(--ease-out), box-shadow var(--dur-base) var(--ease-out)',
          display: 'flex',
          justifyContent: checked ? 'flex-end' : 'flex-start',
          alignItems: 'center',
        }}
        {...rest}
      >
        <span style={{
          width: 22,
          height: 22,
          borderRadius: '50%',
          background: checked ? 'var(--ink-900)' : 'var(--cream-100)',
          transition: 'all var(--dur-base) var(--ease-spring)',
          boxShadow: 'var(--shadow-sm)',
        }} />
      </button>
      {label && <span style={{ fontFamily: 'var(--font-body)', fontSize: 15, color: 'var(--text-primary)' }}>{label}</span>}
    </label>
  );
}

import React from 'react';

/**
 * Text input on dark surface. Optional leading icon and label.
 * Focus lifts the surface and shows a blue ring.
 */
export function Input({
  value,
  onChange,
  placeholder,
  label,
  iconLeft = null,
  type = 'text',
  disabled = false,
  mono = false,
  style = {},
  ...rest
}) {
  const [focused, setFocused] = React.useState(false);

  return (
    <label style={{ display: 'block', ...style }}>
      {label && (
        <span style={{
          display: 'block',
          marginBottom: 6,
          fontFamily: 'var(--font-mono)',
          fontSize: 11,
          letterSpacing: 'var(--ls-caps)',
          textTransform: 'uppercase',
          color: 'var(--text-muted)',
        }}>{label}</span>
      )}
      <div style={{
        display: 'flex',
        alignItems: 'center',
        gap: 10,
        height: 'var(--field-h)',
        padding: '0 14px',
        background: 'var(--surface-input)',
        border: `1px solid ${focused ? 'var(--border-focus)' : 'var(--border-default)'}`,
        borderRadius: 'var(--radius-md)',
        boxShadow: focused ? 'var(--ring)' : 'none',
        transition: 'box-shadow var(--dur-base) var(--ease-out), border-color var(--dur-base) var(--ease-out)',
        opacity: disabled ? 0.5 : 1,
      }}>
        {iconLeft && <span style={{ color: 'var(--text-muted)', display: 'inline-flex' }}>{iconLeft}</span>}
        <input
          type={type}
          value={value}
          onChange={onChange}
          placeholder={placeholder}
          disabled={disabled}
          onFocus={() => setFocused(true)}
          onBlur={() => setFocused(false)}
          style={{
            flex: 1,
            minWidth: 0,
            background: 'transparent',
            border: 'none',
            outline: 'none',
            color: 'var(--text-primary)',
            fontFamily: mono ? 'var(--font-mono)' : 'var(--font-body)',
            fontSize: 15,
          }}
          {...rest}
        />
      </div>
    </label>
  );
}

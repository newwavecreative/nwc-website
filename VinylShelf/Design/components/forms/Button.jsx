import React from 'react';

/**
 * Vinyl Shelf Button — the primary tactile action.
 * Variants: primary (yellow), secondary (blue), ghost, danger.
 * Springy press feedback baked in.
 */
export function Button({
  children,
  variant = 'primary',
  size = 'md',
  fullWidth = false,
  disabled = false,
  iconLeft = null,
  iconRight = null,
  onClick,
  type = 'button',
  style = {},
  ...rest
}) {
  const sizes = {
    sm: { height: 38, padding: '0 14px', fontSize: 13, radius: 'var(--radius-sm)', gap: 6 },
    md: { height: 48, padding: '0 20px', fontSize: 15, radius: 'var(--radius-md)', gap: 8 },
    lg: { height: 56, padding: '0 26px', fontSize: 17, radius: 'var(--radius-md)', gap: 10 },
  };
  const s = sizes[size] || sizes.md;

  const variants = {
    primary: {
      background: 'var(--grad-yellow)',
      color: 'var(--text-on-yellow)',
      border: '1px solid transparent',
      boxShadow: 'var(--shadow-sm)',
    },
    secondary: {
      background: 'var(--surface-raised)',
      color: 'var(--text-primary)',
      border: '1px solid var(--border-default)',
    },
    ghost: {
      background: 'transparent',
      color: 'var(--text-link)',
      border: '1px solid transparent',
    },
    danger: {
      background: 'transparent',
      color: 'var(--status-danger)',
      border: '1px solid rgba(240,82,75,0.4)',
    },
  };
  const v = variants[variant] || variants.primary;

  const [pressed, setPressed] = React.useState(false);

  return (
    <button
      type={type}
      disabled={disabled}
      onClick={onClick}
      onPointerDown={() => setPressed(true)}
      onPointerUp={() => setPressed(false)}
      onPointerLeave={() => setPressed(false)}
      style={{
        display: 'inline-flex',
        alignItems: 'center',
        justifyContent: 'center',
        gap: s.gap,
        width: fullWidth ? '100%' : 'auto',
        height: s.height,
        padding: s.padding,
        fontFamily: 'var(--font-body)',
        fontSize: s.fontSize,
        fontWeight: 'var(--fw-semibold)',
        letterSpacing: '-0.005em',
        borderRadius: s.radius,
        cursor: disabled ? 'not-allowed' : 'pointer',
        opacity: disabled ? 0.45 : 1,
        transform: pressed && !disabled ? 'scale(0.96)' : 'scale(1)',
        transition: 'transform var(--dur-fast) var(--ease-spring), filter var(--dur-base) var(--ease-out)',
        filter: pressed ? 'brightness(0.94)' : 'none',
        WebkitTapHighlightColor: 'transparent',
        ...v,
        ...style,
      }}
      {...rest}
    >
      {iconLeft}
      {children}
      {iconRight}
    </button>
  );
}

import React from 'react';

/**
 * Icon-only round button. Lucide glyph passed as children (an <i data-lucide>) or SVG.
 * Variants: solid (yellow), soft (tinted), ghost.
 */
export function IconButton({
  children,
  label,
  variant = 'ghost',
  size = 'md',
  active = false,
  disabled = false,
  onClick,
  style = {},
  ...rest
}) {
  const sizes = { sm: 34, md: 44, lg: 52 };
  const dim = sizes[size] || sizes.md;

  const variants = {
    solid: { background: 'var(--grad-yellow)', color: 'var(--text-on-yellow)' },
    soft: { background: 'var(--accent-blue-soft)', color: 'var(--blue-300)' },
    ghost: { background: 'transparent', color: 'var(--text-secondary)' },
  };
  const v = active
    ? { background: 'var(--accent-soft)', color: 'var(--yellow-500)' }
    : (variants[variant] || variants.ghost);

  const [pressed, setPressed] = React.useState(false);

  return (
    <button
      type="button"
      aria-label={label}
      disabled={disabled}
      onClick={onClick}
      onPointerDown={() => setPressed(true)}
      onPointerUp={() => setPressed(false)}
      onPointerLeave={() => setPressed(false)}
      style={{
        display: 'inline-flex',
        alignItems: 'center',
        justifyContent: 'center',
        width: dim,
        height: dim,
        borderRadius: 'var(--radius-pill)',
        border: 'none',
        cursor: disabled ? 'not-allowed' : 'pointer',
        opacity: disabled ? 0.45 : 1,
        transform: pressed && !disabled ? 'scale(0.9)' : 'scale(1)',
        transition: 'transform var(--dur-fast) var(--ease-spring), background var(--dur-base) var(--ease-out)',
        WebkitTapHighlightColor: 'transparent',
        ...v,
        ...style,
      }}
      {...rest}
    >
      {children}
    </button>
  );
}

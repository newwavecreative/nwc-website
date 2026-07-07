import React from 'react';

/**
 * StarRating — 1–5 record rating. Interactive when onChange provided.
 * Yellow filled stars.
 */
export function StarRating({ value = 0, max = 5, size = 20, onChange, style = {}, ...rest }) {
  const interactive = !!onChange;
  const [hover, setHover] = React.useState(0);
  const shown = hover || value;

  return (
    <div style={{ display: 'inline-flex', gap: 3, ...style }} {...rest}>
      {Array.from({ length: max }, (_, i) => {
        const n = i + 1;
        const filled = n <= shown;
        return (
          <span
            key={n}
            onClick={interactive ? () => onChange(n) : undefined}
            onMouseEnter={interactive ? () => setHover(n) : undefined}
            onMouseLeave={interactive ? () => setHover(0) : undefined}
            style={{
              cursor: interactive ? 'pointer' : 'default',
              color: filled ? 'var(--yellow-500)' : 'var(--ink-400)',
              transition: 'color var(--dur-fast) var(--ease-out), transform var(--dur-fast) var(--ease-spring)',
              transform: interactive && hover === n ? 'scale(1.2)' : 'scale(1)',
              lineHeight: 1,
              fontSize: size,
            }}
          >
            <svg width={size} height={size} viewBox="0 0 24 24" fill={filled ? 'currentColor' : 'none'} stroke="currentColor" strokeWidth="2" strokeLinejoin="round">
              <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
            </svg>
          </span>
        );
      })}
    </div>
  );
}

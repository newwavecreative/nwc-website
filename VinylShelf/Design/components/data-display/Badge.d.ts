import * as React from 'react';

/** Small mono status label. */
export interface BadgeProps {
  children: React.ReactNode;
  /** @default "neutral" */
  tone?: 'owned' | 'wishlist' | 'accent' | 'blue' | 'neutral';
  /** Show a leading status dot. */
  dot?: boolean;
  style?: React.CSSProperties;
}

export function Badge(props: BadgeProps): JSX.Element;

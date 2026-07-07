import * as React from 'react';

/**
 * Primary tactile action button for Vinyl Shelf.
 *
 * @startingPoint section="Forms" subtitle="Primary / secondary / ghost / danger button" viewport="700x120"
 */
export interface ButtonProps {
  children: React.ReactNode;
  /** Visual style. @default "primary" */
  variant?: 'primary' | 'secondary' | 'ghost' | 'danger';
  /** @default "md" */
  size?: 'sm' | 'md' | 'lg';
  fullWidth?: boolean;
  disabled?: boolean;
  iconLeft?: React.ReactNode;
  iconRight?: React.ReactNode;
  onClick?: (e: React.MouseEvent<HTMLButtonElement>) => void;
  type?: 'button' | 'submit' | 'reset';
  style?: React.CSSProperties;
}

export function Button(props: ButtonProps): JSX.Element;

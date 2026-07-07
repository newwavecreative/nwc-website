import * as React from 'react';

/** Icon-only round button (Lucide glyph or SVG as children). */
export interface IconButtonProps {
  children: React.ReactNode;
  /** Accessible label — required for icon-only controls. */
  label: string;
  /** @default "ghost" */
  variant?: 'solid' | 'soft' | 'ghost';
  /** @default "md" */
  size?: 'sm' | 'md' | 'lg';
  /** Active/selected state — tints yellow. */
  active?: boolean;
  disabled?: boolean;
  onClick?: (e: React.MouseEvent<HTMLButtonElement>) => void;
  style?: React.CSSProperties;
}

export function IconButton(props: IconButtonProps): JSX.Element;

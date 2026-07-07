import * as React from 'react';

/** Brief confirmation toast that springs up from the bottom. */
export interface ToastProps {
  message: string;
  /** Accent tone. @default "default" */
  tone?: 'default' | 'owned' | 'wishlist' | 'blue';
  /** Optional leading icon (Lucide/SVG). */
  icon?: React.ReactNode;
  /** Controls enter/exit animation. @default true */
  visible?: boolean;
  style?: React.CSSProperties;
}

export function Toast(props: ToastProps): JSX.Element;

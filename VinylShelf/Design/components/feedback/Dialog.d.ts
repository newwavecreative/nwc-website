import * as React from 'react';

/** Centered modal dialog with frosted scrim; springs in. */
export interface DialogProps {
  /** @default true */
  open?: boolean;
  title?: string;
  children?: React.ReactNode;
  /** Footer action buttons (usually <Button/>s). */
  actions?: React.ReactNode;
  /** Called on scrim click. */
  onClose?: () => void;
  style?: React.CSSProperties;
}

export function Dialog(props: DialogProps): JSX.Element | null;

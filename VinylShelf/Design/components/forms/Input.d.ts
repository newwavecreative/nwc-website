import * as React from 'react';

/** Text input on dark surface with optional label and leading icon. */
export interface InputProps {
  value?: string;
  onChange?: (e: React.ChangeEvent<HTMLInputElement>) => void;
  placeholder?: string;
  /** Uppercase mono label shown above the field. */
  label?: string;
  iconLeft?: React.ReactNode;
  type?: string;
  disabled?: boolean;
  /** Render the input text in the mono family (for catalog #, years). */
  mono?: boolean;
  style?: React.CSSProperties;
}

export function Input(props: InputProps): JSX.Element;

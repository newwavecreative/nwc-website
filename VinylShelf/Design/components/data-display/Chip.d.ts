import * as React from 'react';

/** Pill for genres, filters, formats. Selectable (yellow when selected). */
export interface ChipProps {
  children: React.ReactNode;
  selected?: boolean;
  onClick?: () => void;
  iconLeft?: React.ReactNode;
  style?: React.CSSProperties;
}

export function Chip(props: ChipProps): JSX.Element;

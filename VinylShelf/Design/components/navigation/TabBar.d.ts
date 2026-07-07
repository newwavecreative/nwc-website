import * as React from 'react';

export interface TabItem {
  id: string;
  label: string;
  /** Lucide icon name, e.g. "library". */
  icon: string;
}

/** Bottom navigation bar (frosted). Active tab lifts to yellow. */
export interface TabBarProps {
  items: TabItem[];
  active: string;
  onChange?: (id: string) => void;
  style?: React.CSSProperties;
}

export function TabBar(props: TabBarProps): JSX.Element;

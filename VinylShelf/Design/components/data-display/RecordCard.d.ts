import * as React from 'react';

/**
 * The core catalog object — album art + title/artist + mono meta.
 *
 * @startingPoint section="Data display" subtitle="Album card with cover, meta, status" viewport="700x320"
 */
export interface RecordCardProps {
  title: string;
  artist: string;
  /** Cover image URL. Falls back to a spinning groove placeholder. */
  cover?: string;
  year?: string | number;
  format?: string;
  /** Collection status — colored dot on the art. */
  status?: 'owned' | 'wishlist';
  /** Spin the placeholder label continuously. */
  spinning?: boolean;
  onClick?: () => void;
  style?: React.CSSProperties;
}

export function RecordCard(props: RecordCardProps): JSX.Element;

import * as React from 'react';

/** 1–5 star record rating. Interactive when onChange is passed. */
export interface StarRatingProps {
  value?: number;
  /** @default 5 */
  max?: number;
  /** Star pixel size. @default 20 */
  size?: number;
  /** Provide to make it interactive. */
  onChange?: (next: number) => void;
  style?: React.CSSProperties;
}

export function StarRating(props: StarRatingProps): JSX.Element;

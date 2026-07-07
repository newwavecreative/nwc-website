/* @ds-bundle: {"format":4,"namespace":"VinylShelfDesignSystem_aa4cb5","components":[{"name":"Badge","sourcePath":"components/data-display/Badge.jsx"},{"name":"Chip","sourcePath":"components/data-display/Chip.jsx"},{"name":"RecordCard","sourcePath":"components/data-display/RecordCard.jsx"},{"name":"StarRating","sourcePath":"components/data-display/StarRating.jsx"},{"name":"Dialog","sourcePath":"components/feedback/Dialog.jsx"},{"name":"Toast","sourcePath":"components/feedback/Toast.jsx"},{"name":"Button","sourcePath":"components/forms/Button.jsx"},{"name":"IconButton","sourcePath":"components/forms/IconButton.jsx"},{"name":"Input","sourcePath":"components/forms/Input.jsx"},{"name":"Switch","sourcePath":"components/forms/Switch.jsx"},{"name":"TabBar","sourcePath":"components/navigation/TabBar.jsx"}],"sourceHashes":{"components/data-display/Badge.jsx":"c8013d9e5ac1","components/data-display/Chip.jsx":"28c7a0bca824","components/data-display/RecordCard.jsx":"737e7f16943e","components/data-display/StarRating.jsx":"9e2092d499fd","components/feedback/Dialog.jsx":"32969a19fe9d","components/feedback/Toast.jsx":"f376111dce14","components/forms/Button.jsx":"adbcb0529479","components/forms/IconButton.jsx":"8a74d6a6da22","components/forms/Input.jsx":"b50ce783b6dd","components/forms/Switch.jsx":"1e889af6384e","components/navigation/TabBar.jsx":"5584167eec71","ui_kits/vinyl-shelf-app/ProfileScreen.jsx":"2e4f3ec021bd","ui_kits/vinyl-shelf-app/RecordDetail.jsx":"74280017003d","ui_kits/vinyl-shelf-app/SearchScreen.jsx":"597b2ad7c41f","ui_kits/vinyl-shelf-app/ShelfScreen.jsx":"66c17f7dc579","ui_kits/vinyl-shelf-app/WishlistScreen.jsx":"a8163f3551a7","ui_kits/vinyl-shelf-app/data.js":"051328c2c749"},"inlinedExternals":[],"unexposedExports":[]} */

(() => {

const __ds_ns = (window.VinylShelfDesignSystem_aa4cb5 = window.VinylShelfDesignSystem_aa4cb5 || {});

const __ds_scope = {};

(__ds_ns.__errors = __ds_ns.__errors || []);

// components/data-display/Badge.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Badge — small status label. Tones: owned, wishlist, neutral, accent.
 */
function Badge({
  children,
  tone = 'neutral',
  dot = false,
  style = {},
  ...rest
}) {
  const tones = {
    owned: {
      bg: 'rgba(55,201,138,0.16)',
      fg: 'var(--status-owned)'
    },
    wishlist: {
      bg: 'rgba(255,107,94,0.16)',
      fg: 'var(--status-wishlist)'
    },
    accent: {
      bg: 'var(--accent-soft)',
      fg: 'var(--yellow-500)'
    },
    blue: {
      bg: 'var(--accent-blue-soft)',
      fg: 'var(--blue-300)'
    },
    neutral: {
      bg: 'var(--surface-raised)',
      fg: 'var(--text-secondary)'
    }
  };
  const t = tones[tone] || tones.neutral;
  return /*#__PURE__*/React.createElement("span", _extends({
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 5,
      height: 22,
      padding: '0 9px',
      borderRadius: 'var(--radius-pill)',
      fontFamily: 'var(--font-mono)',
      fontSize: 11,
      letterSpacing: '0.03em',
      textTransform: 'uppercase',
      background: t.bg,
      color: t.fg,
      ...style
    }
  }, rest), dot && /*#__PURE__*/React.createElement("span", {
    style: {
      width: 6,
      height: 6,
      borderRadius: '50%',
      background: t.fg
    }
  }), children);
}
Object.assign(__ds_scope, { Badge });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/data-display/Badge.jsx", error: String((e && e.message) || e) }); }

// components/data-display/Chip.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Chip — pill for genres, filters, formats. Selectable.
 */
function Chip({
  children,
  selected = false,
  onClick,
  iconLeft = null,
  style = {},
  ...rest
}) {
  const interactive = !!onClick;
  return /*#__PURE__*/React.createElement("button", _extends({
    type: "button",
    onClick: onClick,
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 6,
      height: 34,
      padding: '0 14px',
      borderRadius: 'var(--radius-pill)',
      fontFamily: 'var(--font-body)',
      fontSize: 13,
      fontWeight: 'var(--fw-medium)',
      cursor: interactive ? 'pointer' : 'default',
      border: `1px solid ${selected ? 'transparent' : 'var(--border-default)'}`,
      background: selected ? 'var(--accent-soft)' : 'transparent',
      color: selected ? 'var(--yellow-500)' : 'var(--text-secondary)',
      boxShadow: selected ? 'inset 0 0 0 1px var(--yellow-600)' : 'none',
      transition: 'all var(--dur-base) var(--ease-out)',
      WebkitTapHighlightColor: 'transparent',
      ...style
    }
  }, rest), iconLeft, children);
}
Object.assign(__ds_scope, { Chip });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/data-display/Chip.jsx", error: String((e && e.message) || e) }); }

// components/data-display/RecordCard.jsx
try { (() => {
/**
 * RecordCard — the core object of Vinyl Shelf. Square album art, title,
 * artist, and mono meta (year / catalog / format). Optional status dot.
 * The art spins when `spinning`. Press springs down.
 */
function RecordCard({
  title,
  artist,
  cover,
  // image url; if absent, groove texture placeholder
  year,
  format,
  status,
  // 'owned' | 'wishlist' | undefined
  spinning = false,
  onClick,
  style = {}
}) {
  const [pressed, setPressed] = React.useState(false);
  const statusColor = status === 'owned' ? 'var(--status-owned)' : status === 'wishlist' ? 'var(--status-wishlist)' : null;
  return /*#__PURE__*/React.createElement("div", {
    onClick: onClick,
    onPointerDown: () => setPressed(true),
    onPointerUp: () => setPressed(false),
    onPointerLeave: () => setPressed(false),
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 10,
      cursor: onClick ? 'pointer' : 'default',
      transform: pressed ? 'scale(0.97)' : 'scale(1)',
      transition: 'transform var(--dur-fast) var(--ease-spring)',
      ...style
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      aspectRatio: '1 / 1',
      borderRadius: 'var(--radius-sm)',
      overflow: 'hidden',
      background: cover ? `center/cover no-repeat url(${cover})` : 'var(--grad-vinyl)',
      border: '1px solid var(--border-subtle)',
      boxShadow: 'var(--shadow-md)'
    }
  }, !cover && /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: 0,
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      width: '38%',
      height: '38%',
      borderRadius: '50%',
      background: 'var(--grad-yellow)',
      border: '2px solid var(--yellow-600)',
      animation: spinning ? 'vs-spin var(--dur-spin) linear infinite' : 'none'
    }
  })), statusColor && /*#__PURE__*/React.createElement("span", {
    style: {
      position: 'absolute',
      top: 8,
      right: 8,
      width: 10,
      height: 10,
      borderRadius: '50%',
      background: statusColor,
      boxShadow: '0 0 0 3px rgba(7,10,22,0.6)'
    }
  }), /*#__PURE__*/React.createElement("style", null, `@keyframes vs-spin { to { transform: rotate(360deg); } }`)), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-display)',
      fontSize: 15,
      fontWeight: 'var(--fw-bold)',
      color: 'var(--text-primary)',
      letterSpacing: '-0.01em',
      whiteSpace: 'nowrap',
      overflow: 'hidden',
      textOverflow: 'ellipsis'
    }
  }, title), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 13,
      color: 'var(--text-secondary)',
      whiteSpace: 'nowrap',
      overflow: 'hidden',
      textOverflow: 'ellipsis'
    }
  }, artist), (year || format) && /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 11,
      color: 'var(--text-muted)',
      marginTop: 3,
      letterSpacing: '0.02em'
    }
  }, [year, format].filter(Boolean).join(' · '))));
}
Object.assign(__ds_scope, { RecordCard });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/data-display/RecordCard.jsx", error: String((e && e.message) || e) }); }

// components/data-display/StarRating.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * StarRating — 1–5 record rating. Interactive when onChange provided.
 * Yellow filled stars.
 */
function StarRating({
  value = 0,
  max = 5,
  size = 20,
  onChange,
  style = {},
  ...rest
}) {
  const interactive = !!onChange;
  const [hover, setHover] = React.useState(0);
  const shown = hover || value;
  return /*#__PURE__*/React.createElement("div", _extends({
    style: {
      display: 'inline-flex',
      gap: 3,
      ...style
    }
  }, rest), Array.from({
    length: max
  }, (_, i) => {
    const n = i + 1;
    const filled = n <= shown;
    return /*#__PURE__*/React.createElement("span", {
      key: n,
      onClick: interactive ? () => onChange(n) : undefined,
      onMouseEnter: interactive ? () => setHover(n) : undefined,
      onMouseLeave: interactive ? () => setHover(0) : undefined,
      style: {
        cursor: interactive ? 'pointer' : 'default',
        color: filled ? 'var(--yellow-500)' : 'var(--ink-400)',
        transition: 'color var(--dur-fast) var(--ease-out), transform var(--dur-fast) var(--ease-spring)',
        transform: interactive && hover === n ? 'scale(1.2)' : 'scale(1)',
        lineHeight: 1,
        fontSize: size
      }
    }, /*#__PURE__*/React.createElement("svg", {
      width: size,
      height: size,
      viewBox: "0 0 24 24",
      fill: filled ? 'currentColor' : 'none',
      stroke: "currentColor",
      strokeWidth: "2",
      strokeLinejoin: "round"
    }, /*#__PURE__*/React.createElement("polygon", {
      points: "12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
    })));
  }));
}
Object.assign(__ds_scope, { StarRating });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/data-display/StarRating.jsx", error: String((e && e.message) || e) }); }

// components/feedback/Dialog.jsx
try { (() => {
/**
 * Dialog — centered modal sheet with a frosted scrim. Springs in.
 * Provide title, body (children) and action buttons.
 */
function Dialog({
  open = true,
  title,
  children,
  actions = null,
  onClose,
  style = {}
}) {
  if (!open) return null;
  return /*#__PURE__*/React.createElement("div", {
    onClick: onClose,
    style: {
      position: 'fixed',
      inset: 0,
      zIndex: 100,
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      padding: 24,
      background: 'rgba(7,10,22,0.62)',
      backdropFilter: 'blur(6px)',
      WebkitBackdropFilter: 'blur(6px)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    onClick: e => e.stopPropagation(),
    role: "dialog",
    "aria-modal": "true",
    style: {
      width: '100%',
      maxWidth: 360,
      background: 'var(--surface-card)',
      border: '1px solid var(--border-default)',
      borderRadius: 'var(--radius-lg)',
      boxShadow: 'var(--shadow-lg)',
      padding: 22,
      animation: 'vs-dialog-in var(--dur-slow) var(--ease-spring)',
      ...style
    }
  }, title && /*#__PURE__*/React.createElement("h3", {
    style: {
      margin: '0 0 8px',
      fontFamily: 'var(--font-display)',
      fontSize: 20,
      fontWeight: 'var(--fw-bold)',
      letterSpacing: '-0.01em',
      color: 'var(--text-primary)'
    }
  }, title), /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 15,
      color: 'var(--text-secondary)',
      lineHeight: 1.5
    }
  }, children), actions && /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 10,
      justifyContent: 'flex-end',
      marginTop: 20
    }
  }, actions), /*#__PURE__*/React.createElement("style", null, `@keyframes vs-dialog-in { from { opacity: 0; transform: translateY(12px) scale(0.94); } to { opacity: 1; transform: none; } }`)));
}
Object.assign(__ds_scope, { Dialog });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/feedback/Dialog.jsx", error: String((e && e.message) || e) }); }

// components/feedback/Toast.jsx
try { (() => {
/**
 * Toast — brief confirmation that slides up with a spring.
 * Tones map to an accent bar + optional Lucide icon (passed as children of `icon`).
 */
function Toast({
  message,
  tone = 'default',
  icon = null,
  visible = true,
  style = {}
}) {
  const tones = {
    default: 'var(--yellow-500)',
    owned: 'var(--status-owned)',
    wishlist: 'var(--status-wishlist)',
    blue: 'var(--blue-400)'
  };
  const accent = tones[tone] || tones.default;
  return /*#__PURE__*/React.createElement("div", {
    role: "status",
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 12,
      padding: '12px 16px 12px 14px',
      background: 'rgba(20,28,54,0.92)',
      backdropFilter: 'blur(18px)',
      WebkitBackdropFilter: 'blur(18px)',
      borderRadius: 'var(--radius-md)',
      border: '1px solid var(--border-default)',
      boxShadow: 'var(--shadow-lg)',
      color: 'var(--text-primary)',
      fontFamily: 'var(--font-body)',
      fontSize: 14,
      minWidth: 220,
      opacity: visible ? 1 : 0,
      transform: visible ? 'translateY(0) scale(1)' : 'translateY(16px) scale(0.96)',
      transition: 'opacity var(--dur-base) var(--ease-out), transform var(--dur-base) var(--ease-spring)',
      ...style
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      width: 4,
      alignSelf: 'stretch',
      borderRadius: 'var(--radius-pill)',
      background: accent
    }
  }), icon && /*#__PURE__*/React.createElement("span", {
    style: {
      color: accent,
      display: 'inline-flex'
    }
  }, icon), /*#__PURE__*/React.createElement("span", {
    style: {
      fontWeight: 'var(--fw-medium)'
    }
  }, message));
}
Object.assign(__ds_scope, { Toast });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/feedback/Toast.jsx", error: String((e && e.message) || e) }); }

// components/forms/Button.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Vinyl Shelf Button — the primary tactile action.
 * Variants: primary (yellow), secondary (blue), ghost, danger.
 * Springy press feedback baked in.
 */
function Button({
  children,
  variant = 'primary',
  size = 'md',
  fullWidth = false,
  disabled = false,
  iconLeft = null,
  iconRight = null,
  onClick,
  type = 'button',
  style = {},
  ...rest
}) {
  const sizes = {
    sm: {
      height: 38,
      padding: '0 14px',
      fontSize: 13,
      radius: 'var(--radius-sm)',
      gap: 6
    },
    md: {
      height: 48,
      padding: '0 20px',
      fontSize: 15,
      radius: 'var(--radius-md)',
      gap: 8
    },
    lg: {
      height: 56,
      padding: '0 26px',
      fontSize: 17,
      radius: 'var(--radius-md)',
      gap: 10
    }
  };
  const s = sizes[size] || sizes.md;
  const variants = {
    primary: {
      background: 'var(--grad-yellow)',
      color: 'var(--text-on-yellow)',
      border: '1px solid transparent',
      boxShadow: 'var(--shadow-sm)'
    },
    secondary: {
      background: 'var(--surface-raised)',
      color: 'var(--text-primary)',
      border: '1px solid var(--border-default)'
    },
    ghost: {
      background: 'transparent',
      color: 'var(--text-link)',
      border: '1px solid transparent'
    },
    danger: {
      background: 'transparent',
      color: 'var(--status-danger)',
      border: '1px solid rgba(240,82,75,0.4)'
    }
  };
  const v = variants[variant] || variants.primary;
  const [pressed, setPressed] = React.useState(false);
  return /*#__PURE__*/React.createElement("button", _extends({
    type: type,
    disabled: disabled,
    onClick: onClick,
    onPointerDown: () => setPressed(true),
    onPointerUp: () => setPressed(false),
    onPointerLeave: () => setPressed(false),
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      justifyContent: 'center',
      gap: s.gap,
      width: fullWidth ? '100%' : 'auto',
      height: s.height,
      padding: s.padding,
      fontFamily: 'var(--font-body)',
      fontSize: s.fontSize,
      fontWeight: 'var(--fw-semibold)',
      letterSpacing: '-0.005em',
      borderRadius: s.radius,
      cursor: disabled ? 'not-allowed' : 'pointer',
      opacity: disabled ? 0.45 : 1,
      transform: pressed && !disabled ? 'scale(0.96)' : 'scale(1)',
      transition: 'transform var(--dur-fast) var(--ease-spring), filter var(--dur-base) var(--ease-out)',
      filter: pressed ? 'brightness(0.94)' : 'none',
      WebkitTapHighlightColor: 'transparent',
      ...v,
      ...style
    }
  }, rest), iconLeft, children, iconRight);
}
Object.assign(__ds_scope, { Button });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Button.jsx", error: String((e && e.message) || e) }); }

// components/forms/IconButton.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Icon-only round button. Lucide glyph passed as children (an <i data-lucide>) or SVG.
 * Variants: solid (yellow), soft (tinted), ghost.
 */
function IconButton({
  children,
  label,
  variant = 'ghost',
  size = 'md',
  active = false,
  disabled = false,
  onClick,
  style = {},
  ...rest
}) {
  const sizes = {
    sm: 34,
    md: 44,
    lg: 52
  };
  const dim = sizes[size] || sizes.md;
  const variants = {
    solid: {
      background: 'var(--grad-yellow)',
      color: 'var(--text-on-yellow)'
    },
    soft: {
      background: 'var(--accent-blue-soft)',
      color: 'var(--blue-300)'
    },
    ghost: {
      background: 'transparent',
      color: 'var(--text-secondary)'
    }
  };
  const v = active ? {
    background: 'var(--accent-soft)',
    color: 'var(--yellow-500)'
  } : variants[variant] || variants.ghost;
  const [pressed, setPressed] = React.useState(false);
  return /*#__PURE__*/React.createElement("button", _extends({
    type: "button",
    "aria-label": label,
    disabled: disabled,
    onClick: onClick,
    onPointerDown: () => setPressed(true),
    onPointerUp: () => setPressed(false),
    onPointerLeave: () => setPressed(false),
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      justifyContent: 'center',
      width: dim,
      height: dim,
      borderRadius: 'var(--radius-pill)',
      border: 'none',
      cursor: disabled ? 'not-allowed' : 'pointer',
      opacity: disabled ? 0.45 : 1,
      transform: pressed && !disabled ? 'scale(0.9)' : 'scale(1)',
      transition: 'transform var(--dur-fast) var(--ease-spring), background var(--dur-base) var(--ease-out)',
      WebkitTapHighlightColor: 'transparent',
      ...v,
      ...style
    }
  }, rest), children);
}
Object.assign(__ds_scope, { IconButton });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/IconButton.jsx", error: String((e && e.message) || e) }); }

// components/forms/Input.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Text input on dark surface. Optional leading icon and label.
 * Focus lifts the surface and shows a blue ring.
 */
function Input({
  value,
  onChange,
  placeholder,
  label,
  iconLeft = null,
  type = 'text',
  disabled = false,
  mono = false,
  style = {},
  ...rest
}) {
  const [focused, setFocused] = React.useState(false);
  return /*#__PURE__*/React.createElement("label", {
    style: {
      display: 'block',
      ...style
    }
  }, label && /*#__PURE__*/React.createElement("span", {
    style: {
      display: 'block',
      marginBottom: 6,
      fontFamily: 'var(--font-mono)',
      fontSize: 11,
      letterSpacing: 'var(--ls-caps)',
      textTransform: 'uppercase',
      color: 'var(--text-muted)'
    }
  }, label), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      gap: 10,
      height: 'var(--field-h)',
      padding: '0 14px',
      background: 'var(--surface-input)',
      border: `1px solid ${focused ? 'var(--border-focus)' : 'var(--border-default)'}`,
      borderRadius: 'var(--radius-md)',
      boxShadow: focused ? 'var(--ring)' : 'none',
      transition: 'box-shadow var(--dur-base) var(--ease-out), border-color var(--dur-base) var(--ease-out)',
      opacity: disabled ? 0.5 : 1
    }
  }, iconLeft && /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--text-muted)',
      display: 'inline-flex'
    }
  }, iconLeft), /*#__PURE__*/React.createElement("input", _extends({
    type: type,
    value: value,
    onChange: onChange,
    placeholder: placeholder,
    disabled: disabled,
    onFocus: () => setFocused(true),
    onBlur: () => setFocused(false),
    style: {
      flex: 1,
      minWidth: 0,
      background: 'transparent',
      border: 'none',
      outline: 'none',
      color: 'var(--text-primary)',
      fontFamily: mono ? 'var(--font-mono)' : 'var(--font-body)',
      fontSize: 15
    }
  }, rest))));
}
Object.assign(__ds_scope, { Input });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Input.jsx", error: String((e && e.message) || e) }); }

// components/forms/Switch.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Toggle switch. Yellow when on, springy knob.
 */
function Switch({
  checked = false,
  onChange,
  disabled = false,
  label,
  style = {},
  ...rest
}) {
  const toggle = () => {
    if (!disabled && onChange) onChange(!checked);
  };
  return /*#__PURE__*/React.createElement("label", {
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 10,
      cursor: disabled ? 'not-allowed' : 'pointer',
      opacity: disabled ? 0.5 : 1,
      ...style
    }
  }, /*#__PURE__*/React.createElement("button", _extends({
    type: "button",
    role: "switch",
    "aria-checked": checked,
    onClick: toggle,
    disabled: disabled,
    style: {
      width: 46,
      height: 28,
      borderRadius: 'var(--radius-pill)',
      border: 'none',
      padding: 3,
      background: checked ? 'var(--grad-yellow)' : 'var(--surface-raised)',
      boxShadow: checked ? 'var(--glow-yellow)' : 'inset 0 0 0 1px var(--border-default)',
      cursor: disabled ? 'not-allowed' : 'pointer',
      transition: 'background var(--dur-base) var(--ease-out), box-shadow var(--dur-base) var(--ease-out)',
      display: 'flex',
      justifyContent: checked ? 'flex-end' : 'flex-start',
      alignItems: 'center'
    }
  }, rest), /*#__PURE__*/React.createElement("span", {
    style: {
      width: 22,
      height: 22,
      borderRadius: '50%',
      background: checked ? 'var(--ink-900)' : 'var(--cream-100)',
      transition: 'all var(--dur-base) var(--ease-spring)',
      boxShadow: 'var(--shadow-sm)'
    }
  })), label && /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-body)',
      fontSize: 15,
      color: 'var(--text-primary)'
    }
  }, label));
}
Object.assign(__ds_scope, { Switch });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/Switch.jsx", error: String((e && e.message) || e) }); }

// components/navigation/TabBar.jsx
try { (() => {
/**
 * TabBar — bottom navigation for the app. Frosted panel.
 * items: [{ id, label, icon }] where icon is a Lucide name string.
 * Active tab lifts to yellow. The center action can be emphasized (fab).
 */
function TabBar({
  items = [],
  active,
  onChange,
  style = {}
}) {
  return /*#__PURE__*/React.createElement("nav", {
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-around',
      height: 'var(--bottom-nav-h)',
      padding: '0 8px',
      background: 'rgba(14,20,40,0.86)',
      backdropFilter: 'blur(18px)',
      WebkitBackdropFilter: 'blur(18px)',
      borderTop: '1px solid var(--border-subtle)',
      ...style
    }
  }, items.map(it => {
    const on = it.id === active;
    return /*#__PURE__*/React.createElement("button", {
      key: it.id,
      type: "button",
      "aria-label": it.label,
      "aria-current": on ? 'page' : undefined,
      onClick: () => onChange && onChange(it.id),
      style: {
        display: 'flex',
        flexDirection: 'column',
        alignItems: 'center',
        justifyContent: 'center',
        gap: 3,
        flex: 1,
        height: '100%',
        minWidth: 'var(--tap-min)',
        border: 'none',
        background: 'transparent',
        cursor: 'pointer',
        color: on ? 'var(--yellow-500)' : 'var(--text-muted)',
        transition: 'color var(--dur-base) var(--ease-out)',
        WebkitTapHighlightColor: 'transparent'
      }
    }, /*#__PURE__*/React.createElement("span", {
      style: {
        display: 'inline-flex',
        transform: on ? 'translateY(-1px) scale(1.06)' : 'none',
        transition: 'transform var(--dur-base) var(--ease-spring)'
      }
    }, /*#__PURE__*/React.createElement("i", {
      "data-lucide": it.icon,
      style: {
        width: 24,
        height: 24
      }
    })), /*#__PURE__*/React.createElement("span", {
      style: {
        fontFamily: 'var(--font-body)',
        fontSize: 10,
        fontWeight: on ? 'var(--fw-semibold)' : 'var(--fw-medium)',
        letterSpacing: '0.01em'
      }
    }, it.label));
  }));
}
Object.assign(__ds_scope, { TabBar });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/navigation/TabBar.jsx", error: String((e && e.message) || e) }); }

// ui_kits/vinyl-shelf-app/ProfileScreen.jsx
try { (() => {
/* ProfileScreen — the user & sharing. Avatar, stats, share row, settings switches. */
function ProfileScreen({
  ownedCount,
  wishCount,
  onShare,
  isPublic,
  setPublic
}) {
  const {
    Button,
    Switch,
    Badge
  } = window.VinylShelfDesignSystem_aa4cb5;
  const Stat = ({
    n,
    label
  }) => /*#__PURE__*/React.createElement("div", {
    style: {
      flex: 1,
      textAlign: 'center'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-display)',
      fontSize: 26,
      fontWeight: 800,
      color: 'var(--yellow-500)'
    }
  }, n), /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 10,
      letterSpacing: '0.1em',
      textTransform: 'uppercase',
      color: 'var(--text-muted)',
      marginTop: 2
    }
  }, label));
  return /*#__PURE__*/React.createElement("div", {
    style: {
      padding: '18px 20px 12px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      gap: 14
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      width: 64,
      height: 64,
      borderRadius: 'var(--radius-pill)',
      background: 'var(--grad-blue)',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      fontFamily: 'var(--font-display)',
      fontSize: 26,
      fontWeight: 800,
      color: 'var(--cream-50)',
      border: '2px solid var(--border-default)'
    }
  }, "A"), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-display)',
      fontSize: 22,
      fontWeight: 800,
      color: 'var(--text-primary)'
    }
  }, "Alex Rivera"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 13,
      color: 'var(--text-secondary)'
    }
  }, "@alexspins \xB7 Portland, OR"))), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 8,
      marginTop: 18,
      padding: '16px 8px',
      background: 'var(--surface-card)',
      border: '1px solid var(--border-subtle)',
      borderRadius: 'var(--radius-lg)'
    }
  }, /*#__PURE__*/React.createElement(Stat, {
    n: ownedCount,
    label: "Owned"
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      width: 1,
      background: 'var(--border-default)'
    }
  }), /*#__PURE__*/React.createElement(Stat, {
    n: wishCount,
    label: "Wishlist"
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      width: 1,
      background: 'var(--border-default)'
    }
  }), /*#__PURE__*/React.createElement(Stat, {
    n: "12",
    label: "Friends"
  })), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 18
    }
  }, /*#__PURE__*/React.createElement(Button, {
    variant: "primary",
    size: "lg",
    fullWidth: true,
    iconLeft: /*#__PURE__*/React.createElement("i", {
      "data-lucide": "share-2",
      style: {
        width: 20,
        height: 20
      }
    }),
    onClick: onShare
  }, "Share your shelf")), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 22,
      fontFamily: 'var(--font-mono)',
      fontSize: 11,
      letterSpacing: '0.12em',
      textTransform: 'uppercase',
      color: 'var(--text-muted)'
    }
  }, "Settings"), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 10,
      display: 'flex',
      flexDirection: 'column',
      gap: 2,
      background: 'var(--surface-card)',
      border: '1px solid var(--border-subtle)',
      borderRadius: 'var(--radius-md)',
      overflow: 'hidden'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      padding: '14px 16px'
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 15,
      color: 'var(--text-primary)'
    }
  }, "Public shelf"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 12,
      color: 'var(--text-muted)'
    }
  }, "Anyone with the link can view")), /*#__PURE__*/React.createElement(Switch, {
    checked: isPublic,
    onChange: setPublic
  })), /*#__PURE__*/React.createElement("div", {
    style: {
      height: 1,
      background: 'var(--border-subtle)'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      padding: '14px 16px'
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 15,
      color: 'var(--text-primary)'
    }
  }, "Wishlist alerts"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 12,
      color: 'var(--text-muted)'
    }
  }, "Notify me on a match")), /*#__PURE__*/React.createElement(Switch, {
    checked: true,
    onChange: () => {}
  }))));
}
window.ProfileScreen = ProfileScreen;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/vinyl-shelf-app/ProfileScreen.jsx", error: String((e && e.message) || e) }); }

// ui_kits/vinyl-shelf-app/RecordDetail.jsx
try { (() => {
/* RecordDetail — full-screen sheet for one record. Big spinning art, meta, rating, actions. */
function RecordDetail({
  record,
  onClose,
  onToggleWish,
  wished
}) {
  const {
    Button,
    Badge,
    StarRating,
    IconButton
  } = window.VinylShelfDesignSystem_aa4cb5;
  if (!record) return null;
  const [rating, setRating] = React.useState(record.rating || 0);
  const tracks = ['So What', 'Freddie Freeloader', 'Blue in Green', 'All Blues', 'Flamenco Sketches'];
  const times = ['9:22', '9:46', '5:37', '11:33', '9:26'];
  return /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: 0,
      zIndex: 60,
      background: 'var(--bg-app)',
      animation: 'vs-sheet-in var(--dur-slow) var(--ease-out)',
      display: 'flex',
      flexDirection: 'column'
    }
  }, /*#__PURE__*/React.createElement("style", null, `@keyframes vs-sheet-in { from { opacity:0; transform: translateY(24px); } to { opacity:1; transform:none; } } @keyframes vs-detail-spin { to { transform: rotate(360deg); } }`), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      padding: '12px 16px'
    }
  }, /*#__PURE__*/React.createElement(IconButton, {
    label: "Back",
    variant: "ghost",
    onClick: onClose
  }, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "chevron-left",
    style: {
      width: 24,
      height: 24
    }
  })), /*#__PURE__*/React.createElement(IconButton, {
    label: "Share",
    variant: "ghost"
  }, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "share-2",
    style: {
      width: 22,
      height: 22
    }
  }))), /*#__PURE__*/React.createElement("div", {
    style: {
      flex: 1,
      overflowY: 'auto',
      padding: '0 20px 24px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      width: 220,
      height: 220,
      margin: '8px auto 20px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      top: 0,
      right: -40,
      width: 200,
      height: 200,
      borderRadius: '50%',
      background: 'var(--grad-vinyl)',
      border: '1px solid var(--border-default)',
      animation: 'vs-detail-spin var(--dur-spin) linear infinite'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: '38%',
      borderRadius: '50%',
      background: 'var(--grad-yellow)',
      border: '2px solid var(--yellow-600)'
    }
  })), /*#__PURE__*/React.createElement("img", {
    src: record.cover,
    alt: record.title,
    style: {
      position: 'relative',
      width: 200,
      height: 200,
      borderRadius: 'var(--radius-md)',
      objectFit: 'cover',
      boxShadow: 'var(--shadow-lg)',
      border: '1px solid var(--border-subtle)'
    }
  })), /*#__PURE__*/React.createElement("h1", {
    style: {
      margin: 0,
      textAlign: 'center',
      fontFamily: 'var(--font-display)',
      fontSize: 26,
      fontWeight: 800,
      letterSpacing: '-0.02em',
      color: 'var(--text-primary)'
    }
  }, record.title), /*#__PURE__*/React.createElement("div", {
    style: {
      textAlign: 'center',
      fontSize: 16,
      color: 'var(--text-secondary)',
      marginTop: 2
    }
  }, record.artist), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      justifyContent: 'center',
      gap: 8,
      marginTop: 12,
      flexWrap: 'wrap'
    }
  }, record.status === 'owned' ? /*#__PURE__*/React.createElement(Badge, {
    tone: "owned",
    dot: true
  }, "Owned") : /*#__PURE__*/React.createElement(Badge, {
    tone: "wishlist",
    dot: true
  }, "On the hunt"), /*#__PURE__*/React.createElement(Badge, {
    tone: "accent"
  }, record.format), record.cond && /*#__PURE__*/React.createElement(Badge, {
    tone: "neutral"
  }, record.cond)), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      justifyContent: 'center',
      marginTop: 14
    }
  }, /*#__PURE__*/React.createElement(StarRating, {
    value: rating,
    onChange: setRating,
    size: 28
  })), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: '1fr 1fr',
      gap: 12,
      marginTop: 22,
      padding: 16,
      background: 'var(--surface-card)',
      border: '1px solid var(--border-subtle)',
      borderRadius: 'var(--radius-md)'
    }
  }, [['Catalog no.', record.cat], ['Pressing', record.year], ['Format', record.format], ['Genre', record.genre]].map(([k, v]) => /*#__PURE__*/React.createElement("div", {
    key: k
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 10,
      letterSpacing: '0.1em',
      textTransform: 'uppercase',
      color: 'var(--text-muted)'
    }
  }, k), /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 15,
      color: 'var(--yellow-500)',
      marginTop: 2
    }
  }, v)))), /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 11,
      letterSpacing: '0.12em',
      textTransform: 'uppercase',
      color: 'var(--text-muted)',
      margin: '22px 0 8px'
    }
  }, "Side A"), tracks.map((t, i) => /*#__PURE__*/React.createElement("div", {
    key: t,
    style: {
      display: 'flex',
      alignItems: 'center',
      gap: 12,
      padding: '10px 4px',
      borderBottom: '1px solid var(--border-subtle)'
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 12,
      color: 'var(--text-muted)',
      width: 18
    }
  }, i + 1), /*#__PURE__*/React.createElement("span", {
    style: {
      flex: 1,
      fontSize: 15,
      color: 'var(--text-primary)'
    }
  }, t), /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 12,
      color: 'var(--text-muted)'
    }
  }, times[i]))), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 10,
      marginTop: 22
    }
  }, /*#__PURE__*/React.createElement(Button, {
    variant: wished ? 'secondary' : 'primary',
    size: "lg",
    fullWidth: true,
    iconLeft: /*#__PURE__*/React.createElement("i", {
      "data-lucide": "heart",
      style: {
        width: 20,
        height: 20
      }
    }),
    onClick: onToggleWish
  }, wished ? 'On your wishlist' : 'Add to wishlist'))));
}
window.RecordDetail = RecordDetail;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/vinyl-shelf-app/RecordDetail.jsx", error: String((e && e.message) || e) }); }

// ui_kits/vinyl-shelf-app/SearchScreen.jsx
try { (() => {
/* SearchScreen — add records. Search field + genre suggestions + results list with add button. */
function SearchScreen({
  results,
  onAdd,
  addedIds
}) {
  const {
    Input,
    Badge,
    IconButton
  } = window.VinylShelfDesignSystem_aa4cb5;
  const [q, setQ] = React.useState('');
  return /*#__PURE__*/React.createElement("div", {
    style: {
      padding: '10px 20px 12px'
    }
  }, /*#__PURE__*/React.createElement("h1", {
    style: {
      margin: '0 0 12px',
      fontFamily: 'var(--font-display)',
      fontSize: 28,
      fontWeight: 800,
      letterSpacing: '-0.02em',
      color: 'var(--text-primary)'
    }
  }, "Add a record"), /*#__PURE__*/React.createElement(Input, {
    value: q,
    onChange: e => setQ(e.target.value),
    placeholder: "Search artists, albums, catalog #\u2026",
    iconLeft: /*#__PURE__*/React.createElement("i", {
      "data-lucide": "search",
      style: {
        width: 18,
        height: 18
      }
    })
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 11,
      letterSpacing: '0.12em',
      textTransform: 'uppercase',
      color: 'var(--text-muted)',
      margin: '20px 0 10px'
    }
  }, "Popular near you"), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 10
    }
  }, results.map(r => {
    const added = addedIds.includes(r.id);
    return /*#__PURE__*/React.createElement("div", {
      key: r.id,
      style: {
        display: 'flex',
        alignItems: 'center',
        gap: 12,
        padding: 10,
        background: 'var(--surface-card)',
        border: '1px solid var(--border-subtle)',
        borderRadius: 'var(--radius-md)'
      }
    }, /*#__PURE__*/React.createElement("img", {
      src: r.cover,
      alt: "",
      style: {
        width: 52,
        height: 52,
        borderRadius: 'var(--radius-sm)',
        objectFit: 'cover'
      }
    }), /*#__PURE__*/React.createElement("div", {
      style: {
        flex: 1,
        minWidth: 0
      }
    }, /*#__PURE__*/React.createElement("div", {
      style: {
        fontFamily: 'var(--font-display)',
        fontSize: 15,
        fontWeight: 700,
        color: 'var(--text-primary)',
        whiteSpace: 'nowrap',
        overflow: 'hidden',
        textOverflow: 'ellipsis'
      }
    }, r.title), /*#__PURE__*/React.createElement("div", {
      style: {
        fontSize: 13,
        color: 'var(--text-secondary)'
      }
    }, r.artist), /*#__PURE__*/React.createElement("div", {
      style: {
        marginTop: 4,
        display: 'flex',
        gap: 6
      }
    }, /*#__PURE__*/React.createElement(Badge, {
      tone: "neutral"
    }, r.year), /*#__PURE__*/React.createElement(Badge, {
      tone: "accent"
    }, r.format))), /*#__PURE__*/React.createElement(IconButton, {
      label: added ? 'Added' : 'Add to shelf',
      variant: added ? 'soft' : 'solid',
      onClick: () => onAdd(r)
    }, /*#__PURE__*/React.createElement("i", {
      "data-lucide": added ? 'check' : 'plus',
      style: {
        width: 20,
        height: 20
      }
    })));
  })));
}
window.SearchScreen = SearchScreen;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/vinyl-shelf-app/SearchScreen.jsx", error: String((e && e.message) || e) }); }

// ui_kits/vinyl-shelf-app/ShelfScreen.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/* ShelfScreen — the collection home. Header + stats + filter chips + record grid. */
function ShelfScreen({
  records,
  filter,
  setFilter,
  onOpen
}) {
  const {
    RecordCard,
    Chip
  } = window.VinylShelfDesignSystem_aa4cb5;
  const genres = ['All', 'Jazz', 'Rock', 'Soul', 'Electronic', 'Hip-Hop'];
  const shown = filter === 'All' ? records : records.filter(r => r.genre === filter);
  return /*#__PURE__*/React.createElement("div", {
    style: {
      paddingBottom: 12
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      padding: '10px 20px 4px',
      display: 'flex',
      alignItems: 'flex-end',
      justifyContent: 'space-between'
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 11,
      letterSpacing: '0.12em',
      textTransform: 'uppercase',
      color: 'var(--text-muted)'
    }
  }, "Your shelf"), /*#__PURE__*/React.createElement("h1", {
    style: {
      margin: '2px 0 0',
      fontFamily: 'var(--font-display)',
      fontSize: 32,
      fontWeight: 800,
      letterSpacing: '-0.02em',
      color: 'var(--text-primary)'
    }
  }, records.length, " records")), /*#__PURE__*/React.createElement("button", {
    "aria-label": "Sort",
    style: {
      width: 44,
      height: 44,
      borderRadius: 'var(--radius-pill)',
      border: '1px solid var(--border-default)',
      background: 'var(--surface-raised)',
      color: 'var(--text-secondary)',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      cursor: 'pointer'
    }
  }, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "arrow-up-down",
    style: {
      width: 20,
      height: 20
    }
  }))), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 8,
      padding: '12px 20px',
      overflowX: 'auto'
    }
  }, genres.map(g => /*#__PURE__*/React.createElement("div", {
    key: g,
    style: {
      flex: '0 0 auto'
    }
  }, /*#__PURE__*/React.createElement(Chip, {
    selected: filter === g,
    onClick: () => setFilter(g)
  }, g)))), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: '1fr 1fr',
      gap: 16,
      padding: '4px 20px'
    }
  }, shown.map((r, i) => /*#__PURE__*/React.createElement(RecordCard, _extends({
    key: r.id
  }, r, {
    spinning: i === 0,
    onClick: () => onOpen(r)
  })))));
}
window.ShelfScreen = ShelfScreen;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/vinyl-shelf-app/ShelfScreen.jsx", error: String((e && e.message) || e) }); }

// ui_kits/vinyl-shelf-app/WishlistScreen.jsx
try { (() => {
/* WishlistScreen — records on the hunt. List rows with condition target + remove. */
function WishlistScreen({
  records,
  onRemove
}) {
  const {
    Badge,
    IconButton
  } = window.VinylShelfDesignSystem_aa4cb5;
  return /*#__PURE__*/React.createElement("div", {
    style: {
      padding: '10px 20px 12px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-mono)',
      fontSize: 11,
      letterSpacing: '0.12em',
      textTransform: 'uppercase',
      color: 'var(--text-muted)'
    }
  }, "On the hunt"), /*#__PURE__*/React.createElement("h1", {
    style: {
      margin: '2px 0 16px',
      fontFamily: 'var(--font-display)',
      fontSize: 28,
      fontWeight: 800,
      letterSpacing: '-0.02em',
      color: 'var(--text-primary)'
    }
  }, "Wishlist"), records.length === 0 ? /*#__PURE__*/React.createElement("div", {
    style: {
      textAlign: 'center',
      padding: '48px 20px',
      color: 'var(--text-muted)'
    }
  }, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "heart",
    style: {
      width: 40,
      height: 40
    }
  }), /*#__PURE__*/React.createElement("p", {
    style: {
      marginTop: 12
    }
  }, "Nothing on the hunt yet.")) : /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 10
    }
  }, records.map(r => /*#__PURE__*/React.createElement("div", {
    key: r.id,
    style: {
      display: 'flex',
      alignItems: 'center',
      gap: 12,
      padding: 10,
      background: 'var(--surface-card)',
      border: '1px solid var(--border-subtle)',
      borderRadius: 'var(--radius-md)'
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: r.cover,
    alt: "",
    style: {
      width: 52,
      height: 52,
      borderRadius: 'var(--radius-sm)',
      objectFit: 'cover'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      flex: 1,
      minWidth: 0
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-display)',
      fontSize: 15,
      fontWeight: 700,
      color: 'var(--text-primary)',
      whiteSpace: 'nowrap',
      overflow: 'hidden',
      textOverflow: 'ellipsis'
    }
  }, r.title), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 13,
      color: 'var(--text-secondary)'
    }
  }, r.artist, " \xB7 ", r.year), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 4
    }
  }, /*#__PURE__*/React.createElement(Badge, {
    tone: "wishlist",
    dot: true
  }, "Seeking ", r.format))), /*#__PURE__*/React.createElement(IconButton, {
    label: "Remove",
    variant: "ghost",
    onClick: () => onRemove(r)
  }, /*#__PURE__*/React.createElement("i", {
    "data-lucide": "x",
    style: {
      width: 20,
      height: 20
    }
  }))))));
}
window.WishlistScreen = WishlistScreen;
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/vinyl-shelf-app/WishlistScreen.jsx", error: String((e && e.message) || e) }); }

// ui_kits/vinyl-shelf-app/data.js
try { (() => {
/* Vinyl Shelf — sample catalog data + brand-safe cover generator.
   No real album art is used; covers are generated as on-brand gradient
   "sleeves" (SVG data URIs) so the kit reads as a real collection
   without shipping copyrighted imagery. */
(function () {
  const palettes = [['#3B6FE5', '#0E1428'], ['#FFC93C', '#141C36'], ['#37C98A', '#0A0F1F'], ['#FF6B5E', '#141C36'], ['#5E8CFF', '#070A16'], ['#E9A712', '#0E1428'], ['#90B2FF', '#141C36'], ['#26345E', '#FFC93C']];
  function cover(seed, initial) {
    const p = palettes[seed % palettes.length];
    const svg = `<svg xmlns='http://www.w3.org/2000/svg' width='300' height='300'>
        <defs>
          <linearGradient id='g' x1='0' y1='0' x2='1' y2='1'>
            <stop offset='0' stop-color='${p[0]}'/>
            <stop offset='1' stop-color='${p[1]}'/>
          </linearGradient>
        </defs>
        <rect width='300' height='300' fill='${p[1]}'/>
        <circle cx='218' cy='84' r='128' fill='url(#g)' opacity='0.85'/>
        <circle cx='218' cy='84' r='128' fill='none' stroke='rgba(255,255,255,0.12)'/>
        <circle cx='60' cy='250' r='70' fill='none' stroke='${p[0]}' stroke-width='1.5' opacity='0.5'/>
        <text x='26' y='268' font-family='Bricolage Grotesque, sans-serif' font-size='120' font-weight='800' fill='rgba(255,255,255,0.9)'>${initial}</text>
      </svg>`;
    return 'data:image/svg+xml;utf8,' + encodeURIComponent(svg);
  }
  const raw = [{
    title: 'Kind of Blue',
    artist: 'Miles Davis',
    year: '1959',
    format: 'LP',
    genre: 'Jazz',
    cat: 'CL 1355',
    cond: 'Near Mint',
    rating: 5,
    status: 'owned'
  }, {
    title: 'In Rainbows',
    artist: 'Radiohead',
    year: '2007',
    format: 'LP',
    genre: 'Rock',
    cat: 'XLLP 324',
    cond: 'Mint',
    rating: 5,
    status: 'owned'
  }, {
    title: 'Voodoo',
    artist: "D'Angelo",
    year: '2000',
    format: '2×LP',
    genre: 'Soul',
    cat: 'V 2894',
    cond: 'VG+',
    rating: 4,
    status: 'owned'
  }, {
    title: 'Discovery',
    artist: 'Daft Punk',
    year: '2001',
    format: '2×LP',
    genre: 'Electronic',
    cat: '724384960',
    cond: 'Near Mint',
    rating: 5,
    status: 'owned'
  }, {
    title: 'Aja',
    artist: 'Steely Dan',
    year: '1977',
    format: 'LP',
    genre: 'Rock',
    cat: 'AB 1006',
    cond: 'VG+',
    rating: 4,
    status: 'owned'
  }, {
    title: 'Blue Train',
    artist: 'John Coltrane',
    year: '1957',
    format: 'LP',
    genre: 'Jazz',
    cat: 'BLP 1577',
    cond: 'VG',
    rating: 5,
    status: 'owned'
  }, {
    title: 'Random Access Memories',
    artist: 'Daft Punk',
    year: '2013',
    format: '2×LP',
    genre: 'Electronic',
    cat: '88883716',
    cond: 'Mint',
    rating: 4,
    status: 'owned'
  }, {
    title: 'The Low End Theory',
    artist: 'A Tribe Called Quest',
    year: '1991',
    format: 'LP',
    genre: 'Hip-Hop',
    cat: 'JIVE 1418',
    cond: 'VG+',
    rating: 5,
    status: 'owned'
  }, {
    title: 'Rumours',
    artist: 'Fleetwood Mac',
    year: '1977',
    format: 'LP',
    genre: 'Rock',
    cat: 'BSK 3010',
    cond: 'VG',
    rating: 4,
    status: 'owned'
  }];
  const wish = [{
    title: 'Mingus Ah Um',
    artist: 'Charles Mingus',
    year: '1959',
    format: 'LP',
    genre: 'Jazz',
    cat: 'CS 8171',
    status: 'wishlist'
  }, {
    title: 'Songs in the Key of Life',
    artist: 'Stevie Wonder',
    year: '1976',
    format: '2×LP',
    genre: 'Soul',
    cat: 'T13-340',
    status: 'wishlist'
  }, {
    title: 'Homework',
    artist: 'Daft Punk',
    year: '1997',
    format: '2×LP',
    genre: 'Electronic',
    cat: 'V 2821',
    status: 'wishlist'
  }, {
    title: 'Moanin\u2019',
    artist: 'Art Blakey',
    year: '1959',
    format: 'LP',
    genre: 'Jazz',
    cat: 'BLP 4003',
    status: 'wishlist'
  }];
  const search = [{
    title: 'Bitches Brew',
    artist: 'Miles Davis',
    year: '1970',
    format: '2×LP',
    genre: 'Jazz',
    cat: 'GP 26'
  }, {
    title: 'A Love Supreme',
    artist: 'John Coltrane',
    year: '1965',
    format: 'LP',
    genre: 'Jazz',
    cat: 'A-77'
  }, {
    title: 'Maggot Brain',
    artist: 'Funkadelic',
    year: '1971',
    format: 'LP',
    genre: 'Funk',
    cat: 'WS 2007'
  }];
  const withCover = arr => arr.map((r, i) => ({
    ...r,
    id: r.title + i,
    cover: cover(i + r.title.length, r.title[0])
  }));
  window.VS_DATA = {
    owned: withCover(raw),
    wishlist: withCover(wish),
    search: withCover(search),
    cover
  };
})();
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/vinyl-shelf-app/data.js", error: String((e && e.message) || e) }); }

__ds_ns.Badge = __ds_scope.Badge;

__ds_ns.Chip = __ds_scope.Chip;

__ds_ns.RecordCard = __ds_scope.RecordCard;

__ds_ns.StarRating = __ds_scope.StarRating;

__ds_ns.Dialog = __ds_scope.Dialog;

__ds_ns.Toast = __ds_scope.Toast;

__ds_ns.Button = __ds_scope.Button;

__ds_ns.IconButton = __ds_scope.IconButton;

__ds_ns.Input = __ds_scope.Input;

__ds_ns.Switch = __ds_scope.Switch;

__ds_ns.TabBar = __ds_scope.TabBar;

})();

<?php
/**
 * Full-page landing template. Loaded by the plugin (template_include) when a
 * page selects the "RYM Authority Hub" template. Standalone document — the
 * template ships its own header/footer, so it deliberately does NOT call the
 * theme header/footer. wp_head()/wp_footer() remain so enqueued assets +
 * plugins load.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Base URL for this plugin's assets, used by the markup partial below.
$A = esc_url( RYM_HUB_URL . 'assets/' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Designed light-only; keep dark-mode tools from force-inverting it. -->
	<meta name="color-scheme" content="light">
	<meta name="darkreader-lock">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'rym-hub-page' ); ?>>
<?php include RYM_HUB_DIR . 'template-parts/page.php'; ?>
<?php wp_footer(); ?>
</body>
</html>

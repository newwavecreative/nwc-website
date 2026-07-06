<?php
/**
 * Full-page landing template. Loaded by the plugin (template_include) when a
 * page selects the "NWC Landing" template. Standalone document — the template
 * ships its own navbar/footer, so it deliberately does NOT call the theme
 * header/footer. wp_head()/wp_footer() remain so enqueued assets + plugins load.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Base URL for this plugin's assets, used by the markup partial below.
$A = esc_url( NWC_LANDING_URL . 'assets/' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'nwc-landing-page' ); ?>>
<?php include NWC_LANDING_DIR . 'template-parts/landing.php'; ?>
<?php wp_footer(); ?>
</body>
</html>

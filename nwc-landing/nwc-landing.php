<?php
/**
 * Plugin Name:       New Wave Creative — Landing
 * Description:        Registers the "NWC Landing" page template (custom-coded landing page). Loads its own CSS/JS only on pages using that template, so the rest of the site is untouched.
 * Version:           1.0.0
 * Author:            New Wave Creative
 * License:           GPL-2.0-or-later
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'NWC_LANDING_DIR', plugin_dir_path( __FILE__ ) );
define( 'NWC_LANDING_URL', plugin_dir_url( __FILE__ ) );

/** Template identifier stored as the page's _wp_page_template meta. */
const NWC_LANDING_SLUG = 'nwc-landing';

/**
 * 1. Add "NWC Landing" to the Page Attributes → Template dropdown.
 *    Works regardless of the active theme (theme_page_templates fires for any theme).
 */
add_filter( 'theme_page_templates', function ( $templates ) {
	$templates[ NWC_LANDING_SLUG ] = 'NWC Landing';
	return $templates;
} );

/**
 * 2. When a page uses our template, render our file instead of the theme's.
 */
add_filter( 'template_include', function ( $template ) {
	if ( is_page() ) {
		$slug = get_page_template_slug( get_queried_object_id() );
		if ( NWC_LANDING_SLUG === $slug ) {
			$custom = NWC_LANDING_DIR . 'templates/landing-template.php';
			if ( file_exists( $custom ) ) {
				return $custom;
			}
		}
	}
	return $template;
} );

/**
 * 3. Enqueue CSS/JS + fonts ONLY on pages using our template.
 *    filemtime() versioning busts the cache automatically on every deploy.
 */
add_action( 'wp_enqueue_scripts', function () {
	if ( ! is_page() ) { return; }
	if ( NWC_LANDING_SLUG !== get_page_template_slug( get_queried_object_id() ) ) { return; }

	$css = NWC_LANDING_DIR . 'assets/css/styles.css';
	$js  = NWC_LANDING_DIR . 'assets/js/main.js';

	wp_enqueue_style(
		'nwc-landing-fonts',
		'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Onest:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'nwc-landing',
		NWC_LANDING_URL . 'assets/css/styles.css',
		array(),
		file_exists( $css ) ? filemtime( $css ) : '1.0.0'
	);
	wp_enqueue_script(
		'nwc-landing',
		NWC_LANDING_URL . 'assets/js/main.js',
		array(),
		file_exists( $js ) ? filemtime( $js ) : '1.0.0',
		true // in footer, after DOM
	);
} );

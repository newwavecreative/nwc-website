<?php
/**
 * Plugin Name:       RYM Authority Hub — Landing
 * Description:       Registers the "RYM Authority Hub" page template (Replace Your Mortgage authority-hub landing page, converted from the Lovable prototype). Loads its own CSS/JS only on pages using that template, so the rest of the site is untouched.
 * Version:           1.0.0
 * Author:            New Wave Creative
 * License:           GPL-2.0-or-later
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'RYM_HUB_DIR', plugin_dir_path( __FILE__ ) );
define( 'RYM_HUB_URL', plugin_dir_url( __FILE__ ) );

/** Template identifier stored as the page's _wp_page_template meta. */
const RYM_HUB_SLUG = 'rym-authority-hub';

/**
 * Versioned asset URL (adds ?v=<filemtime>) so browsers/CDNs always fetch the
 * current file — otherwise <img> tags cache indefinitely across deploys.
 *
 * @param string $rel path relative to the plugin's assets/ dir, e.g. "img/ryu-logo-full.png".
 */
function rym_hub_asset( $rel ) {
	$path = RYM_HUB_DIR . 'assets/' . ltrim( $rel, '/' );
	$ver  = file_exists( $path ) ? filemtime( $path ) : '1';
	return esc_url( RYM_HUB_URL . 'assets/' . ltrim( $rel, '/' ) . '?v=' . $ver );
}

/**
 * 1. Add "RYM Authority Hub" to the Page Attributes → Template dropdown.
 *    Works regardless of the active theme (theme_page_templates fires for any theme).
 */
add_filter( 'theme_page_templates', function ( $templates ) {
	$templates[ RYM_HUB_SLUG ] = 'RYM Authority Hub';
	return $templates;
} );

/**
 * 2. When a page uses our template, render our file instead of the theme's.
 */
add_filter( 'template_include', function ( $template ) {
	if ( is_page() ) {
		$slug = get_page_template_slug( get_queried_object_id() );
		if ( RYM_HUB_SLUG === $slug ) {
			$custom = RYM_HUB_DIR . 'templates/page-template.php';
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
	if ( RYM_HUB_SLUG !== get_page_template_slug( get_queried_object_id() ) ) { return; }

	$css = RYM_HUB_DIR . 'assets/css/styles.css';
	$js  = RYM_HUB_DIR . 'assets/js/main.js';

	// Same font stack the Lovable page loads: Archivo (display), DM Sans (sans), Source Serif 4 (serif italic).
	wp_enqueue_style(
		'rym-hub-fonts',
		'https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800&family=DM+Sans:wght@400;500;600;700&family=Source+Serif+4:ital,opsz,wght@1,8..60,400;1,8..60,500;1,8..60,600&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'rym-hub',
		RYM_HUB_URL . 'assets/css/styles.css',
		array(),
		file_exists( $css ) ? filemtime( $css ) : '1.0.0'
	);
	wp_enqueue_script(
		'rym-hub',
		RYM_HUB_URL . 'assets/js/main.js',
		array(),
		file_exists( $js ) ? filemtime( $js ) : '1.0.0',
		true // in footer, after DOM
	);
} );

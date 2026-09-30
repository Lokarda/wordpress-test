<?php
/**
 * Plugin Name: Moj Prvi Plugin
 * Description: Dodaje shortcode [pozdrav] koji prikazuje pozdravnu poruku.
 * Version: 1.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * License: GPL-2.0-or-later
 * Text Domain: moj-prvi-plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the greeting displayed by the [pozdrav] shortcode.
 *
 * @return string
 */
function moj_prvi_plugin_pozdrav_shortcode() {
	return esc_html__( 'Pozdrav iz mog prvog WordPress plugina!', 'moj-prvi-plugin' );
}

add_shortcode( 'pozdrav', 'moj_prvi_plugin_pozdrav_shortcode' );

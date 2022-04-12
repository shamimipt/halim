<?php
/**
 * Plugin Name: Elementor Addon For Halim Theme
 * Description: Custom Elementor addon for halim.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon-halim
 * 
 * Elementor tested up to: 3.6.0
 * Elementor Pro tested up to: 3.6.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function elementor_addon_halim() {

	// Load plugin file
	require_once( __DIR__ . '/inc/plugin.php' );

	// Run the plugin
	\Elementor_Addon_Halim\Plugin::instance();

}
add_action( 'plugins_loaded', 'elementor_addon_halim' );
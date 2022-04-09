<?php
/**
 * Halim functions and definitions
 *
 * @package Halim
 * @since Halim 1.0
 */

if( ! defined( 'THEME_VERSION' ) ){
	//Replace the version number of the theme on each update.
	define( 'THEME_VERSION', '1.0' );
}

/**
	* Sets up theme defaults and registers support for various Wordpress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */

function halim_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Halim, use a find and replace
	 * to change 'halim' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'halim', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 *By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 *provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on Posts and Pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'halim' ),
	) );

}
add_action( 'after_setup_theme', 'halim_setup' );
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

/**
 * Load halim Style and javascript
 */
function halim_scripts() {
	//Load css
	wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', array(), THEME_VERSION, 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), THEME_VERSION, 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), THEME_VERSION, 'all' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), THEME_VERSION, 'all' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), THEME_VERSION, 'all' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/style.css', array(), THEME_VERSION, 'all' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), THEME_VERSION, 'all' );

	//Load js
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), THEME_VERSION, 'true' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), THEME_VERSION, 'true' );
	wp_enqueue_script( 'one-page-nav', get_template_directory_uri() . '/assets/js/one-page-nav.js', array('jquery'), THEME_VERSION, 'true' );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), THEME_VERSION, 'true' );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), THEME_VERSION, 'true' );
	wp_enqueue_script( 'isotop', get_template_directory_uri() . '/assets/js/isotope.min.js', array('jquery'), THEME_VERSION, 'true' );
	wp_enqueue_script( 'imageloaded', get_template_directory_uri() . '/assets/js/imageloaded.min.js', array('jquery'), THEME_VERSION, 'true' );
	wp_enqueue_script( 'jquery-counter', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), THEME_VERSION, 'true' );
	wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/assets/js/waypoint.min.js', array('jquery'), THEME_VERSION, 'true' );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), THEME_VERSION, 'true' );
}
add_action( 'wp_enqueue_scripts', 'halim_scripts' );
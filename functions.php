<?php
/**
 * Theme setup
 */
if ( ! function_exists( 'theme_setup' ) ) {
	function theme_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
	}
}
add_action( 'after_setup_theme', 'theme_setup' );


/**
 * TGM
 */
require_once get_template_directory() . '/tgmpa/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/tgmpa/tgm-plugins.php';


/**
 * Enqueue assets
 */
add_action( 'wp_enqueue_scripts', 'load_assets' );
function load_assets() {
	// scripts
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/assets/vendor/jquery/jquery.min.js' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'imask',
		get_template_directory_uri() . '/assets/vendor/imask/imask.min.js',
		array(),
		'',
		'in_footer'
	);

	wp_enqueue_script( 'main-js',
		get_template_directory_uri() . '/assets/js/main.min.js',
		array( 'jquery' ),
		filemtime( get_theme_file_path( 'assets/js/main.min.js' ) ),
		'in_footer'
	);

	// styles
	wp_enqueue_style( 'vendor-styles', get_template_directory_uri() . '/assets/css/vendor.min.css', '', '1.0.0' );
	wp_enqueue_style( 'main-styles',
		get_template_directory_uri() . '/assets/css/style.min.css', '',
		filemtime( get_theme_file_path( 'assets/css/style.min.css' ) )
	);
}
// customizer
function add_customizer_styles() {
	wp_enqueue_style( 'customizer-css', get_template_directory_uri() . '/assets/css/customizer.css', null );
}
add_action( 'admin_enqueue_scripts', 'add_customizer_styles', 99 );


/**
 * Кастомные посты
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Kirki
 */
require get_template_directory() . '/inc/kirki-config.php';

/**
 * Хуки и прочее
 */
require get_template_directory() . '/inc/template-functions.php';

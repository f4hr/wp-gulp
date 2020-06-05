<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Удалить версию WordPress
 */
add_filter( 'style_loader_src', 'rem_wp_ver_css_js' );
add_filter( 'script_loader_src', 'rem_wp_ver_css_js' );
function rem_wp_ver_css_js( $src ) {
	global $wp_version;
	parse_str( parse_url( $src, PHP_URL_QUERY ), $query );
	if ( ! empty( $query['ver']) && $query['ver'] === $wp_version ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'the_generator', '__return_empty_string' );


/**
 * Удалить ненужный CSS
 */
function dequeue_styles() {
	if ( current_user_can( 'update_core' ) ) {
		return;
	}
	wp_deregister_style( 'dashicons' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_styles' );

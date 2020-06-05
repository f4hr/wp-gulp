<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'tgmpa_register', 'tgm_register_required_plugins' );

function tgm_register_required_plugins() {

	$plugins = array(

		/**
		 * Required plugins
		 */
		array(
			'name'     => 'Advanced Custom Fields',
			'slug'     => 'advanced-custom-fields',
			'version'  => '5.8.11',
			'required' => true,
		),

		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'version'  => '5.1.9',
			'required' => true,
		),

		array(
			'name'     => 'Cyr-To-Lat',
			'slug'     => 'cyr2lat',
			'version'  => '4.5.0',
			'required' => true,
		),

		array(
			'name'     => 'Filenames to latin',
			'slug'     => 'filenames-to-latin',
			'version'  => '2.7',
			'required' => true,
		),

		array(
			'name'     => 'Safe SVG',
			'slug'     => 'safe-svg',
			'version'  => '1.9.8',
			'required' => true,
		),

		array(
			'name'     => 'WP Migrate DB',
			'slug'     => 'wp-migrate-db',
			'version'  => '1.0.13',
			'required' => true,
		),

		array(
			'name'     => 'EWWW Image Optimizer',
			'slug'     => 'ewww-image-optimizer',
			'version'  => '5.3.2',
			'required' => true,
		),

		array(
			'name'     => 'Yoast SEO',
			'slug'     => 'wordpress-seo',
			'version'  => '14.2',
			'required' => true,
		),


		/**
		 * Optional plugins
		 */
		array(
			'name'     => 'Classic Editor',
			'slug'     => 'classic-editor',
			'version'  => '1.5',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'wp',
		'default_path' => get_template_directory() . '/lib/plugins/',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'plugins.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',

	);

	tgmpa( $plugins, $config );
}

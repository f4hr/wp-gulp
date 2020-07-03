<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

define('KIRKI_CONFIG_ID', 'main_config');

Kirki::add_config( KIRKI_CONFIG_ID, array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

/**
 * Contacts
 */
require_once get_template_directory() . '/inc/kirki/kirki-contacts.php';

/**
 * Widgets
 */
require_once get_template_directory() . '/inc/kirki/kirki-widgets.php';

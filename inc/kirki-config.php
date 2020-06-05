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
// theme colors
define('THEME_COLOR_ACCENT', '');
define('THEME_BACKGROUND_COLOR_MAIN', '');
define('THEME_COLOR_TRANSPARENT', 'rgba(255,255,255,0)');
// typography
define('THEME_FONT_FAMILY', 'Arial, sans-serif'); // 'Arial, sans-serif'
define('THEME_FONT_SIZE', '16px'); // 16px
define('THEME_FONT_COLOR_MAIN', '');

Kirki::add_config( KIRKI_CONFIG_ID, array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

/**
 * Colors
 */
require_once get_template_directory() . '/inc/kirki/kirki-colors.php';

/**
 * Typography
 */
require_once get_template_directory() . '/inc/kirki/kirki-typography.php';

/**
 * Contacts
 */
require_once get_template_directory() . '/inc/kirki/kirki-contacts.php';

/**
 * Widgets
 */
require_once get_template_directory() . '/inc/kirki/kirki-widgets.php';

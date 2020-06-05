<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Цвета
 */
Kirki::add_panel( 'colors_panel', array(
	'priority'    => 10,
	'title'       => esc_html__( 'Цвета', 'kirki' ),
	'description' => esc_html__( 'Настройки цвета', 'kirki' ),
) );

/**
 * Цвета
 */
Kirki::add_section( 'colors', array(
	'title' => esc_html__( 'Цвета', 'kirki' ),
	'panel' => 'colors_panel',
) );

Kirki::add_field( KIRKI_CONFIG_ID, [
	'type'     => 'color',
	'settings' => 'c_accent',
	'label'    => esc_html__( 'Акцентный цвет', 'kirki' ),
	'section'  => 'colors',
	'default'  => THEME_COLOR_ACCENT,
	'choices'  => [
		'alpha' => true,
	],
	'transport' => 'auto',
] );

Kirki::add_field( KIRKI_CONFIG_ID, [
	'type'      => 'color',
	'settings'  => 'bgc_main',
	'label'     => esc_html__( 'Основной цвет фона', 'kirki' ),
	'section'   => 'colors',
	'default'   => THEME_BACKGROUND_COLOR_MAIN,
	'choices'   => [
		'alpha' => true,
	],
	'transport' => 'auto',
] );

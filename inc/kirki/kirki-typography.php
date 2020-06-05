<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Типографика
 */
Kirki::add_panel( 'typography_panel', array(
	'priority'    => 11,
	'title'       => esc_html__( 'Типографика', 'kirki' ),
	'description' => esc_html__( 'Настройки типографики', 'kirki' ),
) );

Kirki::add_section( 'typography', array(
	'title' => esc_html__( 'Текст', 'kirki' ),
	'panel' => 'typography_panel',
) );

Kirki::add_field( KIRKI_CONFIG_ID, [
	'type'        => 'typography',
	'settings'    => 'typography_setting',
	'label'       => esc_html__( 'Шрифт', 'kirki' ),
	'section'     => 'typography',
	'default'     => [
		'font-family' => THEME_FONT_FAMILY,
		'variant'     => 'regular',
		'font-size'   => THEME_FONT_SIZE,
		'line-height' => '1.2',
		'color'       => THEME_FONT_COLOR_MAIN,
	],
	'choices'     => [
		'fonts' => [
			'standard' => [
				THEME_FONT_FAMILY
			],
		],
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body',
		],
	],
] );

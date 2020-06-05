<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Виджеты и метрики
 */
Kirki::add_panel( 'widgets_panel', array(
	'priority' => 13,
	'title'    => esc_html__( 'Виджеты и метрики', 'kirki' ),
) );

/**
 * Метрики
 */
Kirki::add_section( 'metrics', array(
	'title' => esc_html__( 'Метрики', 'kirki' ),
	'panel' => 'widgets_panel',
) );

Kirki::add_field( KIRKI_CONFIG_ID, [
	'type'        => 'code',
	'settings'    => 'metrics_header',
	'label'       => esc_html__( 'Код метрики (header)', 'kirki' ),
	'description' => esc_html__( 'Место для кода метрики, например Яндекс.Метрика (выводится в header)', 'kirki' ),
	'section'     => 'metrics',
	'default'     => '',
	'choices'     => [
		'language' => 'html',
	],
] );

Kirki::add_field( KIRKI_CONFIG_ID, [
	'type'        => 'code',
	'settings'    => 'metrics_footer',
	'label'       => esc_html__( 'Код метрики (footer)', 'kirki' ),
	'description' => esc_html__( 'Место для кода метрики, например Яндекс.Метрика (выводится в footer)', 'kirki' ),
	'section'     => 'metrics',
	'default'     => '',
	'choices'     => [
		'language' => 'html',
	],
] );

/**
 * Виджеты
 */
Kirki::add_section( 'widgets', array(
	'title' => esc_html__( 'Виджеты', 'kirki' ),
	'panel' => 'widgets_panel',
) );

Kirki::add_field( KIRKI_CONFIG_ID, [
	'type'        => 'code',
	'settings'    => 'widgets_header',
	'label'       => esc_html__( 'Виджеты', 'kirki' ),
	'description' => esc_html__( 'Место для кода виджетов (выводится в header)', 'kirki' ),
	'section'     => 'widgets',
	'default'     => '',
	'choices'     => [
		'language' => 'html',
	],
] );

Kirki::add_field( KIRKI_CONFIG_ID, [
	'type'        => 'code',
	'settings'    => 'widgets_footer',
	'label'       => esc_html__( 'Виджеты', 'kirki' ),
	'description' => esc_html__( 'Место для кода виджетов (выводится в footer)', 'kirki' ),
	'section'     => 'widgets',
	'default'     => '',
	'choices'     => [
		'language' => 'html',
	],
] );

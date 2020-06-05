<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Контакты
 */
Kirki::add_panel( 'contacts_panel', array(
	'priority' => 12,
	'title'    => esc_html__( 'Контактная информация', 'kirki' ),
) );

/**
 * Телефон
 */
Kirki::add_section( 'section_contacts_phone', array(
	'title' => esc_html__( 'Телефон', 'kirki' ),
	'panel' => 'contacts_panel',
) );

Kirki::add_field( KIRKI_CONFIG_ID, [
	'type'     => 'text',
	'settings' => 'contacts_phone',
	'label'    => esc_html__( 'Номер телефона', 'kirki' ),
	'section'  => 'section_contacts_phone',
	'default'  => '',
] );

/**
 * Адрес
 */
Kirki::add_section( 'section_contacts_address', array(
	'title' => esc_html__( 'Адрес', 'kirki' ),
	'panel' => 'contacts_panel',
) );

Kirki::add_field( KIRKI_CONFIG_ID, [
	'type'     => 'text',
	'settings' => 'contacts_address',
	'label'    => esc_html__( 'Адрес', 'kirki' ),
	'section'  => 'section_contacts_address',
	'default'  => '',
] );

/**
 * Соц сети
 */
Kirki::add_section( 'section_contacts_socials', array(
	'title' => esc_html__( 'Соц сети и мессенджеры', 'kirki' ),
	'panel' => 'contacts_panel',
) );

Kirki::add_field( KIRKI_CONFIG_ID, [
	'type'        => 'repeater',
	'settings'    => 'socials',
	'label'       => esc_html__( 'Соц. сети', 'kirki' ),
	'section'     => 'section_contacts_socials',
	'row_label'   => [
		'type'  => 'field',
		'value' => esc_html__( 'Соц. сеть', 'kirki' ),
		'field' => 'socials_title',
	],
	'transport'   => 'auto',
	'default'     => [
		[
			'socials_title' => esc_html__( 'Instagram', 'kirki' ),
			'socials_url'   => '',
			'socials_icon'  => '',
		],
		[
			'socials_title' => esc_html__( 'Facebook', 'kirki' ),
			'socials_url'   => '',
			'socials_icon'  => '',
		],
		[
			'socials_title' => esc_html__( 'Вконтакте', 'kirki' ),
			'socials_url'   => '',
			'socials_icon'  => '',
		],
	],
	'fields'      => [
		'socials_title' => [
			'type'    => 'text',
			'label'   => esc_html__( 'Название соц. сети', 'kirki' ),
			'default' => '',
		],
		'socials_url'   => [
			'type'    => 'link',
			'label'   => esc_html__( 'Ссылка', 'kirki' ),
			'default' => '',
		],
		'socials_icon'  => [
			'type'    => 'image',
			'label'   => esc_html__( 'Иконка', 'kirki' ),
			'default' => '',
			'choices' => [
				'save_as' => 'id',
			],
		],
	],
] );

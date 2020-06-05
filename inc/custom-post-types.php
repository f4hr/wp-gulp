<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Произвольный тип записи
 */
// if ( ! function_exists( 'pt_custom' ) ) {
// 	function pt_custom() {
// 		$labels = array(
// 			'name'               => 'Произвольный тип записи',
// 			'singular_name'      => 'Произвольный тип записи',
// 			'menu_name'          => 'Произвольный тип записи',
// 			'parent_item_colon'  => 'Родительский:',
// 			'all_items'          => 'Произвольный тип записи',
// 			'view_item'          => 'Просмотреть Произвольный тип записи',
// 			'add_new_item'       => 'Добавить новую Произвольный тип записи',
// 			'add_new'            => 'Добавить Произвольный тип записи',
// 			'edit_item'          => 'Редактировать Произвольный тип записи',
// 			'update_item'        => 'Обновить Произвольный тип записи',
// 			'search_items'       => 'Найти Произвольный тип записи',
// 			'not_found'          => 'Не найдено',
// 			'not_found_in_trash' => 'Не найдено в корзине'
// 		);
// 		$args = array(
// 			'labels'             => $labels,
// 			'supports'           => array( 'title', 'editor' ),
// 			'public'             => true,
// 			'show_in_rest'       => true,
// 			'menu_position'      => 7,
// 			'menu_icon'          => 'dashicons-portfolio'
// 		);
// 		register_post_type( 'custom', $args );
// 	}
// 	add_action( 'init', 'pt_custom', 0 );
// }

// register_rest_field( 'custom', 'meta', array(
// 	'get_callback' => function ( $data ) {
// 		return get_post_meta( $data['id'], '', '' );
// 	},)
// );

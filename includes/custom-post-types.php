<?php

// Remove default post type
add_action('admin_menu','remove_default_post_type');

function remove_default_post_type() {
	remove_menu_page('edit.php');
}
add_action( 'init', 'register_post_types' );

function register_post_types() {
	add_theme_support('post-thumbnails');
	register_post_type( 'news',
		array(
			'labels'      => array(
				'name'          => _x( 'News', 'Label plural', LANG ),
				'singular_name' => _x( 'News', 'Label singular', LANG ),
			),
			'public'      => true,
			'rewrite'     => array('slug' => _x('nyheter', 'Slug', LANG)),
			'menu_icon'   => 'dashicons-megaphone',
			'has_archive' => true,
			'taxonomies'  => array( 'category' ),
			'supports'    => array(
				'title',
				'editor',
				'thumbnail',
				// 'category'
			)
		)
	);
}

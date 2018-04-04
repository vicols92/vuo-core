<?php

require_once 'includes/timber.php';

define('WP_CACHE', true);

function vuocore_script_enqueue() {
  wp_enqueue_script( 'my-great-script', get_template_directory_uri() . '/public/bundled.js', array( 'jquery' ), '3.1.1', true );
	wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/public/styles.css', array(), '1.0.0', 'all' );
  wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Roboto:400,500,700', false );
}
add_action( 'wp_enqueue_scripts', 'vuocore_script_enqueue' );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

require_once 'includes/acf-options.php';
require_once 'includes/custom-post-types.php';
require_once 'includes/menus.php';

function add_image_sizes() {
	add_image_size( 'post-size', null, 500, false );
	add_image_size( 'preview', null, 200, false );
}
add_action( 'after_setup_theme', 'add_image_sizes' );

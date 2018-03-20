<?php
define('WP_CACHE', true);

function vuocore_script_enqueue() {
  wp_enqueue_script( 'my-great-script', get_template_directory_uri() . '/public/bundled.js', array( 'jquery' ), '3.1.1', true );
  wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
  wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,500,700,900', false );
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

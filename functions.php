<?php
function besttheme_script_enqueue() {
  wp_enqueue_script( 'my-great-script', get_template_directory_uri() . '/public/bundled.js', array( 'jquery' ), '3.1.1', true );
  wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
  wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,500,700,900', false );
}
add_action( 'wp_enqueue_scripts', 'besttheme_script_enqueue' );


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Site header',
		'menu_slug' 	=> 'theme-header-settings',
		'redirect'		=> false
	));
    acf_add_options_page(array(
		'page_title' 	=> 'Theme footer Settings',
		'menu_title'	=> 'Site footer',
		'menu_slug' 	=> 'theme-footer-settings',
		'redirect'		=> false
	));
}
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

define('WP_CACHE', true);

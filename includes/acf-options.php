<?php

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Globala inställningar',
		'menu_title'	=> 'Globala inställningar',
		'menu_slug' 	=> 'global',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

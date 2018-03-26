<?php
/**
 * Custom Context
 *
 * Context data for Timber::get_context() function.
 *
 * @since 1.0.0
 */
function add_to_context( $context ) {
  $context['main_menu']      = new TimberMenu('main_menu');
  $context['options']        = get_fields('options');

  return $context;
}

add_filter( 'timber_context', 'add_to_context' );

<?php

get_header();

$context = Timber::get_context();
$context['page'] = new TimberPost();
$context['sections'] = get_field('sections');

Timber::render( 'page.twig', $context );
get_footer();

?>

<?php
/**
 * Template Name: Homepage Template
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['top_blocks'] = get_field('top_blocks');
$context['bottom_blocks'] = get_field('bottom_blocks');
Timber::render( array( 'content/homepage.twig'), $context );
?>


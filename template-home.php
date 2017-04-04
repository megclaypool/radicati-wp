<?php
/**
 * Template Name: Homepage Template
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['title'] = $post->get_title();

$slider_json = file_get_contents(get_template_directory() . "/test_content/slider.json");
$context['slider'] = json_decode($slider_json);


//$context['top_blocks'] = get_field('top_blocks');
//$context['bottom_blocks'] = get_field('bottom_blocks');
Timber::render( array( 'content/homepage.twig'), $context );
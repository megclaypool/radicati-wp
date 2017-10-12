<?php
/**
 * Template Name: Homepage Template
 */

$context = Timber::get_context();
$post = new RadicatiPost();
$context['post'] = $post;
$context['title'] = $post->get_title();

//$slider_json = file_get_contents(get_template_directory() . "/test_content/slider.json");
//$context['slider'] = json_decode($slider_json);

//@TODO Add commented sample code for loading from ACF field!

$highlights = file_get_contents(get_template_directory() . "/test_content/highlights.json");
$context['highlights'] = json_decode($highlights);

Timber::render( array( 'page/homepage.twig'), $context );
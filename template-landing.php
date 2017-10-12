<?php
/**
 * Template Name: Landing Page
 */
$context = Timber::get_context();
$post = new RadicatiPost();
$context['post'] = $post;
$context['title'] = $post->get_title();

if(get_field('use_pager')) {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
} else {
    $paged = false;
}

$context['read_more_text'] = '<span class="sr-only">' . __('Read More') . '</span><i class="fa fa-arrow-right"></i>';

Timber::render( array( 'page/page-landing.twig'), $context );
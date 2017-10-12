<?php
/**
 * Template Name: Listing Page
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

$args = array(
    'posts_per_page' => get_field('posts_per_page'),
    'post_type' => get_field('post_type'),
    'paged' => $paged,
    'orderby' => get_field('orderby'),
    'order' => get_field('sort'),
);

if(get_field('taxonomy')) {
    $args['cat'] = get_field('taxonomy');
}

// Don't use this, Timber replaces it with its own version.
// $context['posts'] = new WP_Query($args);

$context['posts'] = Timber::get_posts($args);

// Not a fan of this, but the Timber docs at: https://github.com/timber/timber/wiki/Pagination
// Say to reset the page query to use pagination. I'm aware that there are other ways of getting pagination working but
// I'm willing to sacrifice database efficiency on listing pages to increase code consistency and readability.
query_posts($args);
$context['pagination'] = Timber::get_pagination();

$context['read_more_text'] = '<span class="sr-only">' . __('Read More') . '</span><i class="fa fa-arrow-right"></i>';

Timber::render( array( 'page/page-listing.twig'), $context );
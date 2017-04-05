<?php

function radicati_assets() {
    $static_base = get_stylesheet_directory_uri() . "/static";

    /*
     * Since most sites don't use native comments, leave this commented out unless needed.
     */
    //if (is_single() && comments_open() && get_option('thread_comments')) {
    //    wp_enqueue_script('comment-reply');
    //}

    /*
     * Sliders
     * Example templates for every slider should be under templates/widgets/sliders and named with {slider-name}.twig
     */
    wp_enqueue_script('owl', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.js', array('jquery'), null, false);


    /*
     * Lightboxes
     * Example templates for every lightbox should be under templates/widgets/lightboxes and named with {lightbox-name}.twig
     */
    wp_enqueue_script('colorbox', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js', array('jquery'), null, false);

    /*
     * Needed for basic functionality
     * Boostrap css is included in site css when compiling the sass
     */
    wp_enqueue_script('modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), null, true);
    wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array("jquery"), null, true);

    /*
     * Jansy Bootstrap
     * Adds things like off-canvas support for mobile menue
     */
    if(!is_admin()) {
        //add non-admin specific styles here
        wp_enqueue_script("jansy-js", "//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js", array("jquery", "bootstrap"), "3.1.3", true);
        wp_enqueue_style("jansy-css", "//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" );
    }

    // Site javascript - depends on jquery
    wp_enqueue_script('site', $static_base . '/js/site.min.js', array('jquery'), null, true);


    // Site CSS
    wp_enqueue_style("site", $static_base . '/css/hip-styles.css', 1.0);

}
add_action('wp_enqueue_scripts',  'radicati_assets', 100);
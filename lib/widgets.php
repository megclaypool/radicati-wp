<?php

/**
 * Register sidebars
 */
function widgets_init() {
    register_sidebar( array (
        'name'          => 'Primary',
        'id'            => 'sidebar-primary',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));

    register_sidebar(array(
        'name'          => 'Footer',
        'id'            => 'sidebar-footer',
        'before_widget' => '<div class="widget %1$s %2$s col-xs-12 col-md-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));

    register_sidebar( array(
        'name'          => 'Copyright',
        'id'            => 'sidebar-copyright',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ) );

    register_sidebar( array(
        'name'          => __('Social Links', 'radicati'),
        'id'            => 'social-links',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
    ));
}
add_action('widgets_init', 'widgets_init');
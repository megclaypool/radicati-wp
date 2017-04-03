<?php

/**
 * Register sidebars
 */
function widgets_init() {
    register_sidebar( array (
        'name'          => __('Far Left'),
        'id'            => 'sidebar-far-left',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));

    register_sidebar( array (
        'name'          => __('Left'),
        'id'            => 'sidebar-left',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));

    register_sidebar( array (
        'name'          => __('Right'),
        'id'            => 'sidebar-right',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));

    register_sidebar( array (
        'name'          => __('Far Right'),
        'id'            => 'sidebar-far-right',
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
}
add_action('widgets_init', 'widgets_init');
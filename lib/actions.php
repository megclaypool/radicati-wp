<?php

function radicati_after_setup_theme() {

    register_nav_menus( array(
        'footer' => __('Footer Menu', 'radicati'),
        'primary' => __('Primary Navigation', 'radicati'),
        'mobile' => __('Mobile Navigation', 'radicati'),
        'social' => __('Social Links', 'radicati'),
        'header' => __('Header Menu', 'radicati'),
    ) );

    add_theme_support('starter-content', array(
        'posts' => array(
            'home' => array(
                'template' => 'template-home.php',
                'post_type' => 'page',
            ),
            'about',
            'contact',
        ),
        'options' => array(
            'show_on_front' => 'page',
            'page_on_front' => '{{home}}',
            'page_for_posts' => '{{blog}}',
        ),

        'nav_menus' => array(
            'primary' => array(
                'name' => __( 'Primary Navigation Menu', 'radicati' ),
                'items' => array(
                    'page_home',
                    'page_about',
                    'page_contact',
                ),
            ),
            /*
             * The header menu is for a handful of quick links that appear above the primary navigation.
             */
            'header' => array(
                'name' => __( 'Header Menu', 'radicati' ),
                'items' => array(
                    'page_home',
                    'page_contact',
                ),
            ),
            'social' => array(
                'name' => __( 'Social Links Menu', 'radicati' ),
                'items' => array(
                    'link_facebook',
                    'link_twitter',
                    'link_instagram',
                    'link_email',
                    'link_sharethis', //@TODO Need to add a share this link
                ),
            ),
            'mobile' => array(
                'name' => __('Mobile Off-Canvas Menu', 'radicati'),
                'items' => array(
                    'page_home',
                    'page_about',
                    'page_contact',
                ),
            ),
            //@TODO Add nested menu items
            'footer' => array(
                'name' => __('Footer Menu', 'radicati'),
                'items' => array(
                    'page_home',
                    'page_about',
                    'page_contact',
                ),
            ),
        ),
    ));
}
add_action('after_setup_theme', 'radicati_after_setup_theme');
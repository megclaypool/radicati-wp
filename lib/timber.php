<?php

if ( ! class_exists( 'Timber' ) ) {
    add_action( 'admin_notices', function() {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
    });

    add_filter('template_include', function($template) {
        return get_stylesheet_directory() . '/static/no-timber.html';
    });

    return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

    function __construct() {
        add_theme_support( 'post-formats' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'menus' );
        add_theme_support( 'custom-logo', array(
            'width'       => 800,
            'height'      => 600,
            'flex-width'  => false,
        ) );

        if( function_exists('acf_add_options_page') ) {
            acf_add_options_page();
        }

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
                'top' => array(
                    'name' => __( 'Top Menu', 'radicati' ),
                    'items' => array(
                        'page_home',
                        'page_about',
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
                        'link_sharethis',
                    ),
                ),
            ),
        ));

        add_filter( 'timber_context', array( $this, 'add_to_context' ) );
        add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
        add_action( 'init', array( $this, 'register_post_types' ) );
        add_action( 'init', array( $this, 'register_taxonomies' ) );
        parent::__construct();
    }

    function register_post_types() {
        //this is where you can register custom post types
    }

    function register_taxonomies() {
        //this is where you can register custom taxonomies
    }

    function add_to_context( $context ) {
        //Add the site logo to the context
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $context['site_logo'] = $custom_logo_id;

        //Add header images - if defined
        $context['options'] = get_fields('option');

        $context['footer_menu'] = new TimberMenu("footer_menu");
        $context['primary_menu'] = new TimberMenu("primary_navigation");
        $context['mobile_menu'] = new TimberMenu("mobile_menu");
        $context['header_menu'] = new TimberMenu('header_menu');
        $context['social_menu'] = new TimberMenu('social_links');
        $context['site'] = $this;


        //Add the sidebars to the context - dynamic sidebars are also called widgets
        //$context['social_links'] = Timber::get_widgets('social_links');
        $context['copyright'] = Timber::get_widgets('copyright');
        $context['footer'] = Timber::get_widgets('footer');

        $context['sidebar_far_left'] = Timber::get_widgets('sidebar-far-left');
        $context['sidebar_left'] = Timber::get_widgets('sidebar-left');
        $context['sidebar_right'] = Timber::get_widgets('sidebar-right');
        $context['sidebar_far_right'] = Timber::get_widgets('sidebar-far-right');

        $outside_bars = 0;
        if($context['sidebar_far_left'])
            $outside_bars++;
        if($context['sidebar_far_right'])
            $outside_bars++;

        switch($outside_bars) {
            case 0:
                $context['content_center_classes'] = "col-xs-12";
                break;
            case 1:
                $context['content_center_classes'] = "col-lg-9 col-md-9 col-sm-12";
                break;
            case 2:
                $context['content_center_classes'] = "col-lg-6 col-md-6 col-sm-12";
                break;
        }

        $inside_bars = 0;
        if($context['sidebar_left'])
            $inside_bars++;
        if($context['sidebar_right'])
            $inside_bars++;

        switch($outside_bars) {
            case 0:
                $context['content_classes'] = "col-xs-12";
                break;
            case 1:
                $context['content_classes'] = "col-lg-9 col-md-9 col-sm-12";
                break;
            case 2:
                $context['content_classes'] = "col-lg-6 col-md-6 col-sm-12";
                break;
        }

      return $context;
    }

//    function myfoo( $text ) {
//        $text .= ' bar!';
//        return $text;
//    }
//

    function responsive_img($image, $image_size, $alt = "") {
        // Use sprintf to fill in values, easier to read than assembling
        // tag spread throughout code.
        $template = '<img src="%s" srcset="%s, %s x2" alt="%s" />';

        // If an image id is specified, use wp_get_attachment_image_src
        if(is_int($image)) {
            $normal = wp_get_attachment_image_src($image, $image_size)[0];
            $high_res = wp_get_attachment_image_src($image, $image_size . "x2")[0];
        }

        return sprintf($template, $normal, $normal, $high_res, $alt);
    }

    function add_to_twig( $twig ) {
        /* this is where you can add your own functions to twig */
        //$twig->addExtension( new Twig_Extension_StringLoader() );
        $twig->addFilter('responseive_img', new Twig_SimpleFilter('responsive_img', array($this, 'responsive_img')));
        return $twig;
    }
}

new StarterSite();
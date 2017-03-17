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
		$context['footer_menu'] = new TimberMenu("footer_menu");
		$context['primary_menu'] = new TimberMenu("primary_menu");
		$context['mobile_menu'] = new TimberMenu("mobile_menu");
		$context['site'] = $this;
		return $context;
	}

	function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}
}

new StarterSite();

function rootid_enqueue_scripts() {
	if(!is_admin()) {
		//add non-admin specific styles here
		wp_enqueue_script("jansy-js", "//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js", array("jquery"), "3.1.3", true);
		wp_enqueue_style("jansy-css", "//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" );
	}

	wp_enqueue_style("site-css", get_stylesheet_directory_uri() . "/static/css/hip-styles.css", 1.0);
}
add_action( 'wp_enqueue_scripts', 'rootid_enqueue_scripts' );

//=================This might be better off someplace else?
/**
 * Tell WordPress to use searchform.php from the templates/ directory
 */
//function get_search_form() {
//	$form = '';
//	locate_template('/templates/searchform.php', true, false);
//	return $form;
//}
//add_filter('get_search_form', __NAMESPACE__ . '\\get_search_form');

/**
 * Registers Nav Menus
 */
register_nav_menus( array(
	'footer_menu' => 'Footer Menu',
	'primary_navigation' => 'Primary Navigation',
	'mobile_navigation' => 'Mobile Navigation',
) );


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

}
add_action('widgets_init', 'widgets_init');





/**
 * Add image sizes
 * Images should take the name of the dimensions.
 * For instance, images that are cropped to 400px by 400px should be named 400x400
 * add_image_size( '400x400', 400, 480, true );
 */

add_image_size( '700x660', 700, 660, true );

add_image_size('hero', 1441*1.5, 771*1.5, true);
add_image_size('block_1', 475*1.5, 449*1.5, true);
add_image_size('block_2', 958*1.5, 449*1.5, true);
add_image_size('block_3', 1441*1.5, 449*1.5, true);
add_image_size('listing-page', 265*1.5, 265*1.5, true);
<?php
/**
 * laread WP Theme
 *
 * @package laread
 * @author Evmet
 *
 * COPYRIGHT (c) 2016 Evmet. All rights reserved.
 * This  is  commercial  software,  only  users  who have purchased a valid
 * license  and  accept  to the terms of the  License Agreement can install
 * and use this program.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wpdb;

// Define Constants
define( 'laread_VERSION', '1.0' );
define( 'laread_PATH', untrailingslashit( get_template_directory() ) );
define( 'laread_HOME', esc_url( home_url( '/' ) ) );
define( 'laread_URL', get_template_directory_uri() );
define( 'laread_SLUG', 'laread' );


// Manage all AJAX requrest
add_action( 'wp_ajax_nopriv_laread_ajax_callback', 'laread_ajax_callback' );
add_action( 'wp_ajax_laread_ajax_callback', 'laread_ajax_callback' );


if ( !class_exists( 'laread' ) ) {

class laread {

	/**
	 * @var Object
	 */
	var $opts;

	/**
	 * @var string
	 */
	var $min_jquery = '2.1.1';


	/**
	 * Constructor
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		// Content width based on the theme's design and stylesheet
		if ( ! isset( $content_width ) )
			$content_width = 767; // px

		// Actions
		add_action( 'init', array( &$this, 'init' ), 0 );
		add_action( 'after_setup_theme', array( &$this, 'setup' ) );
		add_action( 'widgets_init', array( &$this, 'widgets' ) );

		if ( ! is_admin() || defined( 'DOING_AJAX' ) ) {
			add_action( 'wp_enqueue_scripts', array(&$this, 'frontend_scripts') );
		}


		// Include required files
		$this->includes();

		// Loaded action
		do_action( 'laread_loaded' );

	}

	/**
	 * Init the theme when WordPress initialises
	 *
	 * @access public
	 * @return void
	 */
	function init() {

		// Before init action
		do_action( 'before_laread_init' );
		
		// Initialization action
		do_action( 'laread_init' );

		add_filter('deprecated_constructor_trigger_error', '__return_false');
		
		// Fixed Admin Bar
		$current_user = wp_get_current_user();
		if (user_can( $current_user, 'administrator' )) {
			add_action('get_header', 'laread_fixed_admin_bar');
		}

	}


	/**
	 * Sets up theme defaults and registers support for various WordPress features
	 *
	 * @access public
	 * @return void
	 */
	function setup() {

		global $wp_customize;


		// Make theme available for translations
		load_theme_textdomain( 'laread', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'laread' ),
		) );

		// Switch default core markup for search form, comment form, and comments
	 	// to output valid HTML5
	 	add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		// Post formats
		add_theme_support( 'post-formats', array(
			'aside', 'link', 'status', 'image', 'gallery', 'audio', 'video', 'quote', 'chat'
		) );

		// Add title tag support
		add_theme_support( 'title-tag' );


	}

	/**
	 * Include required core files
	 *
	 * @access public
	 * @return void
	 */
	function includes() {

		// Admin includes
		if(  is_admin() ) $this->admin_includes();

		require laread_PATH . '/core/template-tags.php'; // Custom template tags for this theme
		require laread_PATH . '/core/extras.php'; // Custom functions that act independently of the theme templates
		require laread_PATH . '/core/jetpack.php'; // Load Jetpack compatibility file
		require laread_PATH . '/core/fn.options.php';

		// Theme Widgets
		require_once(laread_PATH . '/core/widgets/widget-search.php');
		require_once(laread_PATH . '/core/widgets/widget-categories.php');
		require_once(laread_PATH . '/core/widgets/widget-top-posts.php');
		require_once(laread_PATH . '/core/widgets/widget-tags.php');
		require_once(laread_PATH . '/core/widgets/widget-quote.php');
		require_once(laread_PATH . '/core/widgets/widget-social.php');
		require_once(laread_PATH . '/core/widgets/widget-text.php');
		require_once(laread_PATH . '/core/widgets/widget-archive.php');
		require_once(laread_PATH . '/core/widgets/widget-flickr.php');
		require_once(laread_PATH . '/core/widgets/widget-instagram.php');
		
		// AJAX includes
		if ( defined( 'DOING_AJAX' ) ) $this->ajax_includes();

	}

	/**
	 * Include required admin files
	 *
	 * @access public
	 * @return void
	 */
	function admin_includes() {
		
		// Load backend scripts and styles
		add_action( 'admin_print_scripts', array(&$this, 'backend_scripts') );

		require_once laread_PATH . '/core/lib/tgm-plugin/fn_tgm_init.php';
		// include post mete fields for gallery
		require laread_PATH . '/core/post-meta/post-meta-fields.php';

	}

	/**
	 * Include AJAX files
	 *
	 * @access public
	 * @return void
	 */
	function ajax_includes() {}

	/**
	 * Register widget area
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
	 * @access public
	 * @return void
	 */
	function widgets() {

		register_sidebar( array(
			'name'			=> esc_html__( 'Sidebar', 'laread' ),
			'id'			=> 'sidebar-1',
			'description'	=> esc_html__( 'Sidebar Medium With Sidebar', 'laread' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h1 class="widget-title">',
			'after_title'	=> '</h1>'
		) );


	}
	
	/**
	 * 
	 * Back-end styles and scripts
	 *
	 * @access public
	 * @return void
	 */
	function backend_scripts() {

		// Load admin stylesheet
		wp_register_style( 
			'laread-admin', 
			laread_URL . '/assets/css/laread-admin.css'
		);
		wp_enqueue_style( 'laread-admin' );

	}


	/**
	 * Front-end styles and scripts
	 *
	 * @access public
	 * @return void
	 */
	function frontend_scripts() {

		
		wp_enqueue_script(
			'bootstrap-min',
			laread_URL . '/assets/js/bootstrap.min.js',
			array('jquery'),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'jasny-bootstrap.min',
			laread_URL . '/assets/js/jasny-bootstrap.min.js',
			array('bootstrap','jquery'),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'prettify',
			laread_URL . '/assets/js/prettify.js',
			array(),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'lang-css',
			laread_URL . '/assets/js/lang-css.js',
			array(),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'jquery.blueimp-gallery',
			laread_URL . '/assets/js/jquery.blueimp-gallery.min.js',
			array('jquery'),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'imagesloaded',
			laread_URL . '/assets/js/imagesloaded.js',
			array(),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'masonry-laread',
			laread_URL . '/assets/js/masonry.js',
			array('jquery'),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'viewportchecker',
			laread_URL . '/assets/js/viewportchecker.js',
			array('jquery'),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'isotope.pkgd',
			laread_URL . '/assets/js/isotope.pkgd.min.js',
			array('jquery'),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'jquery.ellipsis.min.js',
			laread_URL . '/assets/js/jquery.ellipsis.min.js',
			array('jquery'),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'classie.js',
			laread_URL . '/assets/js/classie.js',
			array(),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'modernizr.custom.js',
			laread_URL . '/assets/js/modernizr.custom.js',
			array(),
			laread_VERSION,
			true
		);



		wp_enqueue_script(
			'uiProgressButton.js',
			laread_URL . '/assets/js/uiProgressButton.js',
			array(),
			laread_VERSION,
			true
		);

		

		wp_enqueue_script(
			'jquery.dotdotdot',
			laread_URL . '/assets/js/jquery.dotdotdot.min.js',
			array('jquery'),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'colorbox-min',
			laread_URL . '/assets/js/jquery.colorbox-min.js',
			array('jquery'),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'nicescroll.min',
			laread_URL . '/assets/js/jquery.nicescroll.min.js',
			array('jquery'),
			laread_VERSION,
			true
		);

		
		wp_enqueue_script(
			'screenfull',
			laread_URL . '/assets/js/screenfull.js',
			array(),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'jquery.touchSwipe.min',
			laread_URL . '/assets/js/jquery.touchSwipe.min.js',
			array('jquery'),
			laread_VERSION,
			true
		);

	

		// Skip link focus fix
		wp_enqueue_script(
			'laread-skip-link-focus-fix',
			laread_URL . '/assets/js/skip-link-focus-fix.js',
			array(),
			laread_VERSION,
			true
		);

		wp_enqueue_script(
			'laread-jflickrfeed',
			laread_URL . '/assets/js/jflickrfeed.js',
			array('jquery'),
			laread_VERSION,
			true
		);
		
		
		wp_enqueue_script(
			'laread-script',
			laread_URL . '/assets/js/laread-script.js',
			array('jquery'),
			laread_VERSION,
			true
		);

		// For Page Banner Template
		if ( get_page_template_slug() == 'page-banner1.php'  or get_page_template_slug() == 'page-banner2.php')
		{
			wp_enqueue_script(
				'laread-page-banner',
				laread_URL . '/assets/js/page-banner.js',
				array('jquery'),
				laread_VERSION,
				true
			);
		}

		// For Contact Page Template
		if ( get_page_template_slug() == 'page-contact.php'  or get_page_template_slug() == 'page-contact2.php')
		{
			wp_enqueue_script(
				'google-maps',
				'http://maps.google.com/maps/api/js?sensor=true',
				array(),
				'',
				true
			);

			wp_enqueue_script(
				'gmaps.js',
				laread_URL . '/assets/js/gmaps.js',
				array('jquery'),
				laread_VERSION,
				true
			);
		}

		// Comments JS
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );


		// Bootstrap stylesheet
		wp_register_style(
			'bootstrap-min',
			laread_URL . '/assets/css/bootstrap.min.css'
		);
		wp_enqueue_style( 'bootstrap-min' );

		// Font-awesome stylesheet
		wp_register_style(
			'font-awesome-min',
			laread_URL . '/assets/css/font-awesome.min.css'
		);
		wp_enqueue_style( 'font-awesome-min' );

		// Animate stylesheet
		wp_register_style(
			'jasny-bootstrap-min',
			laread_URL . '/assets/css/jasny-bootstrap.min.css'
		);
		wp_enqueue_style( 'jasny-bootstrap-min' );

		// Animate stylesheet
		wp_register_style(
			'animate',
			laread_URL . '/assets/css/animate.css'
		);
		wp_enqueue_style( 'animate' );

		wp_register_style(
			'tomorrow-night',
			laread_URL . '/assets/css/tomorrow-night.css'
		);
		wp_enqueue_style( 'tomorrow-night' );

		wp_register_style(
			'bootstrap-gallery',
			laread_URL . '/assets/css/bootstrap-gallery.css'
		);
		wp_enqueue_style( 'bootstrap-gallery' );

		wp_register_style(
			'colorbox-css',
			laread_URL . '/assets/css/colorbox.css'
		);
		wp_enqueue_style( 'colorbox-css' );


		// Current theme skin
		wp_register_style(
			'laread-style',
			laread_URL . '/assets/css/laread-style.css'
		);
		wp_enqueue_style( 'laread-style' );



		// Custom Data
		$ajax_vars = array(
			'ajax_url'   	=> $this->ajax_url()
		);

		wp_localize_script( 'laread-script', 'laread', apply_filters( 'laread_params', $ajax_vars ) );

	}


	/**
	 * Get Ajax URL
	 *
	 * @access public
	 * @return string
	 */
	function ajax_url() {
	
		return str_replace( array('https:', 'http:'), '', admin_url( 'admin-ajax.php' ) );

	}


}

// Init the plugin class
$GLOBALS['laread'] = new laread();

} // class_exists
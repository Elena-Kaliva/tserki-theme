<?php

/**
 * zaza functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zaza
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.2');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zaza_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on zaza, use a find and replace
		* to change 'zaza' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('zaza', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'zaza'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'zaza_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'zaza_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zaza_content_width()
{
	$GLOBALS['content_width'] = apply_filters('zaza_content_width', 640);
}
add_action('after_setup_theme', 'zaza_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zaza_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'zaza'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'zaza'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'zaza_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function zaza_scripts()
{
	$cache_bust = date('U');

	$front_page_version = filemtime(get_template_directory() . '/js/front-page.js');


	wp_enqueue_style('zaza-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('zaza-style', 'rtl', 'replace');


	wp_enqueue_script('zaza-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	wp_register_script('custom-animations', get_stylesheet_directory_uri() . '/js/animations.js', array(),  $cache_bust, true);
	wp_enqueue_script('custom-animations');
	if (is_front_page()) {
		wp_enqueue_script('front-page', get_template_directory_uri() . '/js/front-page.js', array(), $front_page_version, true);
	}
}
add_action('wp_enqueue_scripts', 'zaza_scripts', 99);

function theme_enqueue_bootstrap()
{

	$cache_bust = date('U');
	wp_enqueue_script('gsap-js', get_stylesheet_directory_uri() . '/js/gsap.min.js', array(), $cache_bust, false);
	// Enqueue Bootstrap CSS
	wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css', array(), '5.3.0-alpha1');
	// Enqueue Bootstrap JS
	wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0-alpha1', true);
	wp_enqueue_style('swiper-style', get_template_directory_uri() . '/css/swiper-bundle.min.css', array());
	wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/js/fancybox.umd.js', array(),  _S_VERSION, false);
	wp_enqueue_style('fancybox-css', get_template_directory_uri() . '/css/fancybox.css', array(),  _S_VERSION, false);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_bootstrap', 98);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

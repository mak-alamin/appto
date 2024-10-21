<?php

/**
 * AppTo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AppTo
 */

// add_action('init', function () {
// 	$ele_kit_id = get_option( 'elementor_active_kit' );
// 	$ele_settings = get_post_meta( $ele_kit_id, '_elementor_page_settings', true );

// 	// shiny_log($ele_settings, 'ele_settings');
// });

//Define Necessary Constants
if (!defined('APPTO_VERSION')) {
	define('APPTO_VERSION', '1.0.0');
}

define('APPTO_TEXT_DOMAIN', 'appto');
define('APPTO_ASSETS', get_template_directory_uri() . '/assets');

if (!function_exists('appto_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function appto_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AppTo, use a find and replace
		 * to change 'appto' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('appto', get_template_directory() . '/languages');

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


		/**
		 * Require WP Bootstrap Nav Walker Class
		 */
		if (!file_exists(get_template_directory() . '/libs/bootstrap-navwalker.php')) {
			return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class "wp-bootstrap-navwalker" file may be missing.', 'appto'));
		} else {
			require_once get_template_directory() . '/libs/bootstrap-navwalker.php';
		}

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header-menu' => esc_html__('Primary', 'appto'),
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

		add_theme_support( "custom-background" );
		add_theme_support( "wp-block-styles" );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
	}
endif;
add_action('after_setup_theme', 'appto_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function appto_content_width()
{
	$GLOBALS['content_width'] = apply_filters('appto_content_width', 640);
}
add_action('after_setup_theme', 'appto_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function appto_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'appto'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'appto'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'appto_widgets_init');

/**
 * Enqueue scripts and styles.
 */
require_once get_template_directory() . '/inc/enqueue-scripts.php';

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Require necessary plugins activation with tgm.
 */
require get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/tgmpa/register-tgmpa.php';

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

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Demo Data Import
 */
require_once get_template_directory() . '/inc/demo-import.php';

/**
 * Require Custom Comment
 */
require_once get_template_directory() . '/inc/custom-comment.php';

/**
 * Redux Options
 */
function appto_get_redux_option($key, $default = '')
{
	if (class_exists('Redux')) {
		return Redux::get_option('appto_redux', $key, $default);
	} else {
		return $default;
	}
}
function appto_get_redux_meta($key, $default = '')
{
	if (class_exists('Redux')) {
		return redux_post_meta("appto_redux", get_the_ID(), $key);
	} else {
		return $default;
	}
}
require_once get_template_directory() . '/inc/redux/options.php';
require_once get_template_directory() . '/inc/redux/metabox.php';

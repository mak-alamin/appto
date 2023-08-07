<?php

function appto_load_scripts()
{
	wp_enqueue_style('vendor-bundle', APPTO_ASSETS . '/css/vendor.bundle.css', array(), APPTO_VERSION, 'all');

	wp_enqueue_style('template-style', APPTO_ASSETS . '/css/style.css', array('vendor-bundle'), APPTO_VERSION, 'all');

	wp_enqueue_style('appto-style', get_stylesheet_uri(), array(), APPTO_VERSION);

	wp_style_add_data('appto-style', 'rtl', 'replace');

	wp_register_script('appto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), APPTO_VERSION, true);

	wp_enqueue_script('appto-navigation');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_register_script('owl-carousel-js', APPTO_ASSETS . '/js/owl-carousel.min.js', array('jquery'), APPTO_VERSION, true);

	wp_register_script('bundle-js', APPTO_ASSETS . '/js/vendor.bundle.js', array('jquery'), APPTO_VERSION, true);

	wp_register_script('twinlight-js', APPTO_ASSETS . '/js/wavify/twinlight.js', array('jquery'), APPTO_VERSION, true);

	wp_register_script('wavify-jquery', APPTO_ASSETS . '/js/wavify/jquery.wavify.js', array('jquery'), APPTO_VERSION, true);

	wp_register_script('main-js', APPTO_ASSETS . '/js/script.js', array('jquery', 'owl-carousel-js'), APPTO_VERSION, true);

	// wp_enqueue_script('bundle-js');
	// wp_enqueue_script('twinlight-js');
	// wp_enqueue_script('wavify-jquery');
	// wp_enqueue_script('main-js');
}
add_action('wp_enqueue_scripts', 'appto_load_scripts');


/**
 * Enqueue Admin scripts and styles.
 */
function appto_load_admin_scripts()
{
	wp_enqueue_style('appto-admin-style', APPTO_ASSETS . '/css/admin-main.css', array(), APPTO_VERSION, 'all');

	wp_enqueue_script('jquery');

	wp_register_script('bundle-js', APPTO_ASSETS . '/js/vendor.bundle.js', array('jquery'), APPTO_VERSION, true);

	wp_register_script('twinlight-js', APPTO_ASSETS . '/js/wavify/twinlight.js', array('jquery'), APPTO_VERSION, true);

	wp_register_script('wavify-jquery', APPTO_ASSETS . '/js/wavify/jquery.wavify.js', array('jquery'), APPTO_VERSION, true);

	wp_register_script('main-js', APPTO_ASSETS . '/js/script.js', array('jquery'), APPTO_VERSION, true);

	// wp_enqueue_script('bundle-js');

	// wp_enqueue_script('twinlight-js');
	// wp_enqueue_script('wavify-jquery');
	// wp_enqueue_script('main-js');
}
add_action('admin_enqueue_scripts', 'appto_load_admin_scripts');

function appto_load_footer_scripts()
{
}
add_action('wp_footer', 'appto_load_footer_scripts');

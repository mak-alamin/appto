<?php
/**
 * AppTo Theme Customizer
 *
 * @package AppTo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function appto_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'appto_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'appto_customize_partial_blogdescription',
			)
		);
	}


	/*
	 *------------------------------------------------------
	 * Header Panel
	 * -----------------------------------------------------
	 */
	$wp_customize->add_panel('header_id', array(
		'title' => __('Header', 'appto'),
		'priority' => 50,
		'capability' => 'edit_theme_options',
	));

	//App Download Button Section
	$wp_customize->add_section('app_button', array(
		'title'	=> __('App Download Button'),
		'panel'	=>	'header_id'
	));

	// Enable/Disable Button
	$wp_customize->add_setting( 'enable_app_dl_btn', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => true,
		'transport' => 'refresh',
	) );

	$wp_customize->add_control('enable_app_dl_btn', array(
		'type'	=>	'checkbox',
		'label'	=>	__('Enable Button', 'appto'),
		'section'	=>	'app_button'
	));

	// Button Text
	$wp_customize->add_setting( 'app_dl_btn_text', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'default' => 'Get App Now',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control('app_dl_btn_text', array(
		'type'	=>	'text',
		'label'	=>	__('Button Text', 'appto'),
		'section'	=>	'app_button'
	));
}
add_action( 'customize_register', 'appto_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function appto_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function appto_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function appto_customize_preview_js() {
	wp_enqueue_script( 'appto-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), APPTO_VERSION, true );
}
add_action( 'customize_preview_init', 'appto_customize_preview_js' );

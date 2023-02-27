<?php
if (!class_exists('Redux')) {
    return;
}

Redux::disable_demo();

$opt_name = 'appto_redux';

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    'display_name'         => $theme->get('Name'),
    'display_version'      => $theme->get('Version'),
    'menu_title'           => esc_html__('AppTo Options', 'appto'),
    'customizer'           => true,
    'dev_mode'             => false
);

Redux::set_args($opt_name, $args);

// Blog Options
if (file_exists(__DIR__ . '/options/blog_options.php')) {
    require_once __DIR__ . '/options/blog_options.php';
}

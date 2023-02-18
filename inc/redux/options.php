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

Redux::set_section($opt_name, array(
    'title'  => esc_html__('Blog', 'appto'),
    'id'     => 'appto_blog',
    'desc'   => esc_html__('Change your Blog options here.', 'appto'),
    'icon'   => 'el el-home',
    'fields' => array(
        array(
            'id'       => 'opt-text',
            'type'     => 'text',
            'title'    => esc_html__('Example Text', 'appto'),
            'desc'     => esc_html__('Example description.', 'appto'),
            'subtitle' => esc_html__('Example subtitle.', 'appto'),
            'hint'     => array(
                'content' => 'This is a <b>hint</b> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.',
            )
        )
    )
));

Redux::set_field($opt_name, 'appto_blog', array(
    'id' => 'blog_get_started_divider',
    'type' => 'divide'
));

Redux::set_field($opt_name, 'appto_blog', array(
    'id' => 'blog_get_started_divider_2',
    'type' => 'divide'
));

Redux::set_field($opt_name, 'appto_blog', array(
    'id' => 'blog_get_started_title',
    'type' => 'text',
    'title' => __('Get Started Title', 'appto'),
    'default' => __('Get Started Now!', 'appto')
));

Redux::set_field($opt_name, 'appto_blog', array(
    'id' => 'blog_get_started_bg',
    'type' => 'background',
    'title' => __('Get Started Background', 'appto'),
    'desc'     => esc_html__('This is the description field, again good for additional info.', 'appto'),
    'default'  => array(
        'background-color' => '#1e73be',
    )
));

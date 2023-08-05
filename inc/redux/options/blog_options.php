<?php

Redux::set_section($opt_name, array(
    'title'  => esc_html__('Blog', 'appto'),
    'id'     => 'appto_blog',
    'desc'   => esc_html__('Change your Blog options here.', 'appto'),
    'icon'   => 'el el-website',
));

Redux::set_field($opt_name, 'appto_blog', array(
    'id'       => 'blog_sidebar_position',
    'type'     => 'button_set',
    'title'    => esc_html__('Sidebar Position', 'appto'),
    'subtitle' => esc_html__('Choose Blog Sidebar position', 'appto'),
    'desc'     => esc_html__('Choose Blog Sidebar position for blog pages', 'appto'),
    //Must provide key => value pairs for options
    'options' => array(
        'left' => 'Sidebar Left',
        'right' => 'Sidebar Right',
    ),
    'default' => 'right'
));

Redux::set_field($opt_name, 'appto_blog', array(
    'id'       => 'appto_allow_comments',
    'type'     => 'switch',
    'title'    => esc_html__('Allow Comments', 'appto'),
    'subtitle' => esc_html__('Allow Commenting on your blog posts', 'appto'),
    'default'  => true,
));


// Blog Header
Redux::set_section($opt_name, array(
    'title'  => esc_html__('Blog Header', 'appto'),
    'id'     => 'appto_blog_header',
    'desc'   => esc_html__('Change Blog Header options here.', 'appto'),
    'icon'   => 'el el-website',
    'subsection' => true,
));
Redux::set_field($opt_name, 'appto_blog_header', array(
    'id'       => 'blog_header_bg',
    'type'     => 'select',
    'title'    => esc_html__('Header Background', 'appto'),
    'subtitle' => esc_html__('Choose Header Background', 'appto'),
    'desc'     => esc_html__('Choose Header Background for blog', 'appto'),
    //Must provide key => value pairs for options
    'options' => array(
        'cyan' => 'Gradient Cyan',
        'blue' => 'Gradient Blue',
        'green' => 'Gradient Green',
        'purple' => 'Gradient Purple',
        'orange' => 'Gradient Orange',
    ),
    'default' => 'cyan'
));

// Blog Download Section
Redux::set_section($opt_name, array(
    'title'  => esc_html__('Download Section', 'appto'),
    'id'     => 'appto_blog_download',
    'desc'   => esc_html__('Change Download Section options here.', 'appto'),
    'icon'   => 'el el-download',
    'subsection' => true,
));

Redux::set_field($opt_name, 'appto_blog_download', array(
    'id' => 'blog_download_title',
    'type' => 'text',
    'title' => __('Title', 'appto'),
    'default' => __('Get Started Now!', 'appto')
));

Redux::set_field($opt_name, 'appto_blog_download', array(
    'id' => 'blog_download_desc',
    'type' => 'textarea',
    'title' => __('Description', 'appto'),
    'default' => __('Lorem ipsum dolor sit amet menandri lobortis laboramus nec ex, ullum regione instructior duo ei.', 'appto')
));

Redux::set_field($opt_name, 'appto_blog_download', array(
    'id' => 'blog_download_appstore',
    'type' => 'text',
    'title' => __('Apple App Store Link', 'appto'),
    'default' => '#'
));

Redux::set_field($opt_name, 'appto_blog_download', array(
    'id' => 'blog_download_playstore',
    'type' => 'text',
    'title' => __('Google Play Store Link', 'appto'),
    'default' => '#'
));

// Redux::set_field($opt_name, 'appto_blog_download', array(
//     'id' => 'blog_download_bg',
//     'type' => 'background',
//     'title' => __('Section Background', 'appto'),
//     'desc'     => esc_html__('This is the description field, again good for additional info.', 'appto'),
//     'default'  => array(
//         'background-color' => 'transparent',
//     )
// ));

Redux::set_field(
    $opt_name,
    'appto_blog_download',
    array(
        'id'       => 'blog_download_bg_img',
        'type'     => 'media',
        'url'      => true,
        'title' => __('Section Background', 'appto'),
        'desc'     => esc_html__('Upload Download Section Background Image.', 'appto'),
        'default'  => array(
            'url' => APPTO_ASSETS . '/image/bg-parallax-c.png'
        ),
    )
);


// Blog Footer Section
Redux::set_section($opt_name, array(
    'title'  => esc_html__('Blog Footer', 'appto'),
    'id'     => 'appto_blog_footer',
    'desc'   => esc_html__('Change your Blog Footer options here.', 'appto'),
    'icon'   => 'el el-website',
    'subsection' => true,
));

Redux::set_field($opt_name, 'appto_blog_footer', array(
    'id' => 'blog_footer_facebook',
    'type' => 'text',
    'title' => __('Facebook Link', 'appto'),
    'default' => '#'
));

Redux::set_field($opt_name, 'appto_blog_footer', array(
    'id' => 'blog_footer_twitter',
    'type' => 'text',
    'title' => __('Twitter Link', 'appto'),
    'default' => '#'
));

Redux::set_field($opt_name, 'appto_blog_footer', array(
    'id' => 'blog_footer_linkedin',
    'type' => 'text',
    'title' => __('Linkedin Link', 'appto'),
    'default' => '#'
));

Redux::set_field($opt_name, 'appto_blog_footer', array(
    'id' => 'blog_footer_google_plus',
    'type' => 'text',
    'title' => __('Google Plus Link', 'appto'),
    'default' => '#'
));

Redux::set_field($opt_name, 'appto_blog_footer', array(
    'id' => 'blog_footer_copy_text',
    'type' => 'editor',
    'title' => __('Copyright Text', 'appto'),
    'default' => __('2023 Copyright <b>CoderCafeThemes</b>. All right reserved.', 'appto')
));

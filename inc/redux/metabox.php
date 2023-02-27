<?php
if (!class_exists('Redux')) {
    return;
}

if (!function_exists("appto_redux_add_metaboxes")) :
    function appto_redux_add_metaboxes($metaboxes)
    {
        // Declare your sections
        $boxSections = array();

        $boxSections[] = array(
            // 'title'         => __('AppTo Settings', 'redux-framework-demo'),
            // 'icon'          => 'el-icon-home', // Only used with metabox position normal or advanced
            'fields'        => array(
                array(
                    'id' => 'single_sidebar_pos',
                    'title' => __('Sidebar Position', 'redux-framework-demo'),
                    'desc' => 'Select the sidebar position',
                    'type' => 'select',
                    'options' => array(
                        'global' => 'Global',
                        'left' => 'Sidebar Left',
                        'right' => 'Sidebar Right',
                    ),
                    'default' => 'global'
                ),
            ),
        );

        // Declare your metaboxes
        $metaboxes = array();
        $metaboxes[] = array(
            'id'            => 'single_post_metaboxes',
            'title'         => __('AppTo Options', 'appto'),
            'post_types'    => array('post'),
            //'page_template' => array('page-test.php'), // Visibility of box based on page template selector
            //'post_format' => array('image'), // Visibility of box based on post format
            'position'      => 'side', // normal, advanced, side
            'priority'      => 'high', // high, core, default, low - Priorities of placement
            'sections'      => $boxSections,
        );

        return $metaboxes;
    }

    // Change {$redux_opt_name} to your opt_name
    add_action("redux/metaboxes/appto_redux/boxes", "appto_redux_add_metaboxes");
endif;

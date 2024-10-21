<?php

/**
 * Required and Recommended Plugins
 */
function appto_register_plugins($plugins)
{
  $theme_plugins = [
    [
      'name'     => 'Elementor',
      'slug'     => 'elementor',
      'required' => true,
      'preselected' => true,
    ],
    [
      'name'     => 'AppTo Elementor Extension',
      'slug'     => 'appto-elementor-extension',
      'source'   => 'https://github.com/mak-alamin/appto-elementor-extension/archive/refs/heads/main.zip',
      'required' => true,
      'preselected' => true,
    ],
  ];

  return $theme_plugins;
}

add_filter('ocdi/register_plugins', 'appto_register_plugins');


/**
 * Modify plugin page attributes
 */
function appto_plugin_page_setup($default_settings)
{
  $default_settings['parent_slug'] = 'themes.php';

  $default_settings['page_title']  = esc_html__('APPTO Demo Import', 'appto');

  $default_settings['menu_title']  = esc_html__('APPTO Demo', 'appto');

  $default_settings['capability']  = 'import';

  $default_settings['menu_slug']   = 'appto-demo-import';

  return $default_settings;
}
add_filter('ocdi/plugin_page_setup', 'appto_plugin_page_setup');


//Change OCDI plugin page intro text
function appto_plugin_intro_text($default_text)
{
  $default_text .= '<div class="ocdi__intro-text"><p>This is APP TO Demo Importer intro text.</p></div>';

  return $default_text;
}
add_filter('ocdi/plugin_intro_text', 'appto_plugin_intro_text');


//Before Demo Import
function appto_before_content_import($selected_import)
{
  $oldPosts = get_posts();

  foreach ($oldPosts as $post) {
    wp_delete_post($post->ID, false);
  }

  update_option('sidebars_widgets', array());

  update_option('elementor_load_fa4_shim', 'yes');

  if ('App To' === $selected_import['import_file_name']) {
    echo "Before APP TO Demo Import Text...";
  } else {
    // Here you can do stuff for all other imports before the content import starts.
    echo "before import 2";
  }
}
add_action('ocdi/before_content_import', 'appto_before_content_import');


/**
 * ------------------------------------
 * Demo Import
 * ------------------------------------
 */
function appto_import_demo_data()
{
  return [
    [
      'import_file_name'           => 'App To',
      'categories'                 => ['Landing Page'],
      'import_file_url'            => 'https://codercafe24.com/demo/wp/appto/demo-data/content.xml',
      'import_widget_file_url'     => 'https://codercafe24.com/demo/wp/appto/demo-data/widgets.wie',
      'import_customizer_file_url' => 'https://codercafe24.com/demo/wp/appto/demo-data/customizer.dat',
      'import_redux'               => [
        [
          'file_url'    => 'https://codercafe24.com/demo/wp/appto/demo-data/redux.json',
          'option_name' => 'appto_redux',
        ],
      ],
      'import_preview_image_url'   => APPTO_ASSETS . '/image/appto_demo_preview.png',
      'preview_url'                => 'https://codercafe24.com/demo/wp/appto',
    ],
    [
      'import_file_name'           => 'Comming Soon',
      'categories'                 => ['Landing Page', 'E-Commerce', 'Blog'],
      'import_preview_image_url'   => APPTO_ASSETS . '/image/comming_soon.png',
    ]
  ];
}
add_filter('ocdi/import_files', 'appto_import_demo_data');

/**
 * After Demo Import
 */
function appto_ocdi_after_import_setup()
{
  // Set Elementor Settings
  $ele_settings = [
    'system_colors' => [
      [
        '_id' => 'primary',
        'title' => 'Primary',
        'color' => '#6EC1E4'
      ],
      [
        '_id' => 'secondary',
        'title' => 'Secondary',
        'color' => '#54595F'
      ],
      [
        '_id' => 'text',
        'title' => 'Text',
        'color' => '#7A7A7A'
      ],
      [
        '_id' => 'accent',
        'title' => 'Accent',
        'color' => '#61CE70'
      ]
    ],

    'custom_colors' => [],

    'system_typography' => [
      [
        '_id' => 'primary',
        'title' => 'Primary',
        'typography_typography' => 'custom',
        'typography_font_family' => 'Roboto',
        'typography_font_weight' => 600
      ],
      [
        '_id' => 'secondary',
        'title' => 'Secondary',
        'typography_typography' => 'custom',
        'typography_font_family' => 'Roboto Slab',
        'typography_font_weight' => 400
      ],
      [
        '_id' => 'text',
        'title' => 'Text',
        'typography_typography' => 'custom',
        'typography_font_family' => 'Roboto',
        'typography_font_weight' => 400
      ],
      [
        '_id' => 'accent',
        'title' => 'Accent',
        'typography_typography' => 'custom',
        'typography_font_family' => 'Roboto',
        'typography_font_weight' => 500
      ]
    ],

    'custom_typography' => [],

    'default_generic_fonts' => 'Sans-serif',
    'h5_typography_typography' => 'custom',
    'page_title_selector' => 'h1.entry-title',

    'h5_typography_font_size_mobile' => [
      'unit' => 'em',
      'size' => 1.5,
      'sizes' => []
    ],

    'viewport_md' => 768,
    'viewport_lg' => 1025,

    'h5_typography_font_size' => [
      'unit' => 'px',
      'size' => 20,
      'sizes' => []
    ],

    'activeItemIndex' => 1,
    'h2_typography_typography' => 'custom',

    'h2_typography_font_size_mobile' => [
      'unit' => 'em',
      'size' => 2.25,
      'sizes' => []
    ],

    'h2_typography_font_size' => [
      'unit' => 'px',
      'size' => 38,
      'sizes' => []
    ],

    'h3_typography_typography' => 'custom',

    'h2_typography_font_size_tablet' => [
      'unit' => 'em',
      'size' => 2.25,
      'sizes' => []
    ],

    'h3_typography_font_size_tablet' => [
      'unit' => 'em',
      'size' => 2.25,
      'sizes' => []
    ],

    'body_typography_typography' => 'custom',

    'body_typography_font_size' => [
      'unit' => 'em',
      'size' => '',
      'sizes' => []
    ],

    'body_typography_font_weight' => 400,

    'body_typography_line_height' => [
      'unit' => 'em',
      'size' => 1.8,
      'sizes' => []
    ],

    'active_breakpoints' => [
      'viewport_mobile',
      'viewport_mobile_extra',
      'viewport_tablet'
    ],

    'viewport_mobile_extra' => 768
  ];

  $default_kit_id = get_option('elementor_active_kit');
  update_post_meta($default_kit_id, '_elementor_page_settings', $ele_settings);


  // Assign menus to their locations.
  $main_menu = get_term_by('name', 'Main Manu', 'nav_menu');

  set_theme_mod(
    'nav_menu_locations',
    [
      'header-menu' => $main_menu->term_id,
    ]
  );

  // Assign front page and posts page (blog page).
  $front_page = get_page_by_path('layout-1');
  $blog_page  = get_page_by_path('blog');

  update_option('show_on_front', 'page');
  update_option('page_on_front', $front_page->ID);
  update_option('page_for_posts', $blog_page->ID);
}
add_action('ocdi/after_import', 'appto_ocdi_after_import_setup');

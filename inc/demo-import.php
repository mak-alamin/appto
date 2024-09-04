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

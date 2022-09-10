<?php

//Required and Recommended Plugins
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
      'source'   => get_template_directory_uri() . '/bundled-plugins/appto-elementor-extension.zip',
      'required' => true,
    ],
  ];

  return $theme_plugins;
}
add_filter('ocdi/register_plugins', 'appto_register_plugins');


//Modify plugin page attributes
function appto_plugin_page_setup($default_settings)
{
  $default_settings['parent_slug'] = 'themes.php';

  $default_settings['page_title']  = esc_html__('APPTO Demo Import', APPTO_TEXT_DOMAIN);

  $default_settings['menu_title']  = esc_html__('APPTO Templates', APPTO_TEXT_DOMAIN);

  $default_settings['capability']  = 'import';

  $default_settings['menu_slug']   = 'appto-templates';

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
  if ('App To' === $selected_import['import_file_name']) {
    echo "Before APP TO Demo Import Text...";
  } else {
    // Here you can do stuff for all other imports before the content import starts.
    echo "before import 2";
  }
}
add_action('ocdi/before_content_import', 'appto_before_content_import');


//Demo Import
function appto_import_files()
{
  return [
    [
      'import_file_name'           => 'App To',
      'categories'                 => ['Landing Page'],
      'import_file_url'            => get_template_directory_uri() . '/demo-data/appto_demo_data.xml',
      'import_preview_image_url'   => APPTO_ASSETS . '/image/appto_demo_preview.png',
      'preview_url'                => 'http://www.your_domain.com/my-demo-1',
    ],

    [
      'import_file_name'           => 'Comming Soon',
      'categories'                 => ['Landing Page', 'E-Commerce', 'Blog'],
      'import_preview_image_url'   => APPTO_ASSETS . '/image/comming_soon.png',
    ],

  ];
}
add_filter('ocdi/import_files', 'appto_import_files');


function appto_ocdi_after_import_setup()
{
  // Assign menus to their locations.
  $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

  set_theme_mod(
    'nav_menu_locations',
    [
      'main-menu' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function in your theme.
    ]
  );

  // Assign front page and posts page (blog page).
  $front_page_id = get_page_by_title('Layout 1');
  $blog_page_id  = get_page_by_title('Blog');

  update_option('show_on_front', 'page');
  update_option('page_on_front', $front_page_id->ID);
  update_option('page_for_posts', $blog_page_id->ID);
}
add_action('ocdi/after_import', 'appto_ocdi_after_import_setup');

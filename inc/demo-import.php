<?php

//Required and Recommended Plugins
function appto_register_plugins( $plugins ) {
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
 
  return array_merge( $plugins, $theme_plugins );
}
add_filter( 'ocdi/register_plugins', 'appto_register_plugins' );


//Demo Import
function appto_import_files() {
    return [
      [
        'import_file_name'           => 'App To',
        'categories'                 => [ 'Landing Page' ],
        'import_file_url'            => get_template_directory_uri() . '/demo-data/app_to.xml',
        'import_preview_image_url'   => APPTO_ASSETS . '/image/appto_demo_preview.png',
        'preview_url'                => 'http://www.your_domain.com/my-demo-1',
      ],

      [
        'import_file_name'           => 'Comming Soon',
        'categories'                 => [ 'Landing Page', 'E-Commerce', 'Blog' ],
        'import_preview_image_url'   => APPTO_ASSETS . '/image/comming_soon.png',
      ],

    ];
  }
  add_filter( 'ocdi/import_files', 'appto_import_files' );
<?php
/************************************************************************************************
 *************************************** OCDI demo import ***************************************
 ************************************************************************************************/


function ocdi_register_plugins($plugins)
{
	$theme_plugins = [
		[
			'name'     => 'Elementor',
			'slug'     => 'elementor',
			'required' => true,
		],
		[
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => true,
		]

	];

	return array_merge($plugins, $theme_plugins);
}
add_filter('ocdi/register_plugins', 'ocdi_register_plugins');



function ocdi_import_files() {
	return [
		[
			'import_file_name'           => 'Elementor Kit',
			// 'import_file_url'            => trailingslashit(get_stylesheet_directory_uri()) . 'demo-import/demo-content.xml',
			'import_file_url'            => 	get_stylesheet_directory_uri() . '/demo-import/elementor-kit.zip',
			// 'import_file_widgets_url'    => trailingslashit(get_stylesheet_directory_uri()) . 'demo-import/customizer.dat',
			// 'local_import_widget_file'   => trailingslashit(get_stylesheet_directory_uri()) . 'demo-import/widgets.wie',
			'import_preview_image_url'   => 'http://www.your_domain.com/ocdi/preview_import_image2.jpg',
			'preview_url'                => 'http://www.your_domain.com/my-demo-2',
		],
	];
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );

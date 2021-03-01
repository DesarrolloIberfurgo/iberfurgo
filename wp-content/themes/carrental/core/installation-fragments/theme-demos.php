<?php

function carrental_import_files() {
	$demo_content_installer	 = CARRENTAL_REMOTE_CONTENT;
	return array(
	  array(
		'import_file_name'           => 'Default',
		'categories'                 => array( 'Multipage' ),
		'import_file_url'            => $demo_content_installer . '/default/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/default/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/default/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/default/screenshot.png',
		'preview_url'                => CARRENTAL_LIVE_URL,
	  ),
	  array(
		'import_file_name'           => 'Home Dark',
		'categories'                 => array( 'Multipage' ),
		'import_file_url'            => $demo_content_installer . '/home-v2/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/home-v2/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/home-v2/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/home-v2/screenshot.png',
		'preview_url'                => CARRENTAL_LIVE_URL . '/home-v2/',
	  ),
	  array(
		'import_file_name'           => 'Home Greeen',
		'categories'                 => array( 'Multipage' ),
		'import_file_url'            => $demo_content_installer . '/home-v3/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/home-v3/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/home-v3/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/home-v3/screenshot.png',
		'preview_url'                => CARRENTAL_LIVE_URL . '/home-v3/',
	  ),
	  array(
		'import_file_name'           => 'Home Gradient',
		'categories'                 => array( 'Multipage' ),
		'import_file_url'            => $demo_content_installer . '/home-v4/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/home-v4/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/home-v4/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/home-v4/screenshot.png',
		'preview_url'                => CARRENTAL_LIVE_URL . '/home-v4/',
	  ),
	  array(
		'import_file_name'           => 'Landing Default',
		'categories'                 => array( 'Landing' ),
		'import_file_url'            => $demo_content_installer . '/onepage/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/onepage/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/onepage/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/onepage/screenshot.png',
		'preview_url'                => CARRENTAL_LIVE_URL . '/onepage/',
	  ),
	  array(
		'import_file_name'           => 'Landing Dark',
		'categories'                 => array( 'Landing' ),
		'import_file_url'            => $demo_content_installer . '/onepage-v2/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/onepage-v2/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/onepage-v2/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/onepage-v2/screenshot.png',
		'preview_url'                => CARRENTAL_LIVE_URL . '/onepage-v2/',
	  ),
	  array(
		'import_file_name'           => 'Landing Green',
		'categories'                 => array( 'Landing' ),
		'import_file_url'            => $demo_content_installer . '/onepage-v3/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/onepage-v3/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/onepage-v3/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/onepage-v3/screenshot.png',
		'preview_url'                => CARRENTAL_LIVE_URL . '/onepage-v3/',
	  ),
	  array(
		'import_file_name'           => 'Landing Gradient',
		'categories'                 => array( 'Landing' ),
		'import_file_url'            => $demo_content_installer . '/onepage-v4/f.xml',
		'import_widget_file_url'     => $demo_content_installer . '/onepage-v4/f.wie',
		'import_customizer_file_url' => $demo_content_installer . '/onepage-v4/f.dat',
		'import_preview_image_url'   => $demo_content_installer . '/onepage-v4/screenshot.png',
		'preview_url'                => CARRENTAL_LIVE_URL . '/onepage-v4/',
	  ),
	);
}
add_filter( 'pt-ocdi/import_files', 'carrental_import_files' );

function carrental_after_import( $selected_import ) {
	//Set Menu
	$primary_menu = get_term_by('name', 'Primary Menu', 'primary');
	set_theme_mod( 'nav_menu_locations' , array(
			'primary' => $primary_menu->term_id,
		)
	);

	$demo_array = array(
		"Default" => [
			"slug" => "home 01",
		],
		"Home Dark" => [
			"slug" => "home 02",
		],
		"Home Greeen" => [
			"slug" => "home 03",
		],
		"Home Gradient" => [
			"slug" => "home 04",
		],
		"Landing Default" => [
			"slug" => "home 01",
		],
		"Landing Dark" => [
			"slug" => "home 02",
		],
		"Landing Green" => [
			"slug" => "home 03",
		],
		"Landing Gradient" => [
			"slug" => "home 04",
		],
	);
	if( is_array( $demo_array ) ){
		foreach ($demo_array as $i => $values) {
			if ( $i === $selected_import['import_file_name'] ) {
				foreach ($values as $key => $value) {
					//Set Front page
					$page = get_page_by_title( $values['slug'] );
					if ( isset( $page->ID ) ) {
						update_option( 'page_on_front', $page->ID );
						update_option( 'show_on_front', 'page' );
					}
				}
			}
		}
	}
}
add_action( 'pt-ocdi/after_import', 'carrental_after_import' );
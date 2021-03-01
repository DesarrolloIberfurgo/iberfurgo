<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register required plugins
 */

function carrental_register_required_plugins() {
	$plugins	 = array(
		array(
			'name'		 => esc_html__( 'Devmonsta', 'wellnesscenter' ),
			'slug'		 => 'devmonsta',
			'required'	 => true,
			'source'	 =>  esc_url(CARRENTAL_REMOTE_CONTENT . '/plugins/devmonsta.zip')
		),
		array(
			'name'		 => esc_html__( 'One Click Demo Import', 'wellnesscenter' ),
			'slug'		 => 'one-click-demo-import',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Elementor', 'carrental' ),
			'slug'		 => 'elementor',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Advanced Custom Fields Pro', 'carrental' ),
			'slug'		 => 'advanced-custom-fields-pro',
			'required'	 => true,
			'version'	 => '5.9.0',
            'source'	 =>  esc_url(CARRENTAL_REMOTE_CONTENT . '/plugins/advanced-custom-fields-pro.zip')
		),
        array(
            'name'		 => esc_html__( 'Elementskit Lite', 'carrental' ),
            'slug'		 => 'elementskit-lite',
            'required'	 => true,
        ),
		array(
			'name'		 => esc_html__( 'Metform', 'carrental' ),
			'slug'		 => 'metform',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Advanced Custom Fields', 'carrental' ),
			'slug'		 => 'advanced-custom-fields',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'CarRental Essentials', 'carrental' ),
			'slug'		 => 'carrental-essential',
			'required'	 => true,
			'version'	 => '3.0',
            'source'	 =>  esc_url(CARRENTAL_REMOTE_CONTENT . '/plugins/carrental-essential.zip')
		),
	);


	$config = array(
		'id'			 => 'carrental', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '', // Default absolute path to bundled plugins.
		'menu'			 => 'carrental-install-plugins', // Menu slug.
		'parent_slug'	 => 'themes.php', // Parent menu slug.
		'capability'	 => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	 => true, // Show admin notices or not.
		'dismissable'	 => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	 => false, // Automatically activate plugins after installation or not.
		'message'		 => '', // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'carrental_register_required_plugins' );
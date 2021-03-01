<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * metabox options for pages
 */

$options = array(
	'settings-page' => array(
		'title'		 => esc_html__( 'Page settings', 'carrental' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			'header_title'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Banner title', 'carrental' ),
				'desc'	 => esc_html__( 'Add your Page hero title', 'carrental' ),
			),
			'header_image'	 => array(
				'label'	 => esc_html__( 'Banner image', 'carrental' ),
				'desc'	 => esc_html__( 'Upload a page header image', 'carrental' ),
				'help'	 => esc_html__( "This default header image will be used for all your service.", 'carrental' ),
				'type'	 => 'upload'
           ),
        ),
	),
);

<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * options for wp customizer
 * section name format: carrental_section_{section name}
 */
$options = [
	'carrental_section_theme_settings' => [
		'title'				 => esc_html__( 'Theme settings', 'carrental' ),
		'options'			 => CarRental_Theme_Includes::_customizer_options(),
		'wp-customizer-args' => [
			'priority' => 1,
		],
	],
];

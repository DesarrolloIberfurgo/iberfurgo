<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: Header
 */

$header_settings = carrental_option('theme_header_default_settings');
$header_id = '';
$header_builder_enable = carrental_option('header_builder_enable');
if($header_builder_enable=='yes'){
    $header_id =   $header_settings['yes']['carrental_header_builder_select'];
}

$options =[
    'header_settings' => [
        'title'		 => esc_html__( 'Header settings', 'carrental' ),

        'options'	 => [
            'header_builder_enable' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Header builder Enable', 'carrental' ),
                'desc'			   => '' ,
                'value'           => 'no',
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__('Yes', 'carrental'),
                ],
                'right-choice'	 => [
                    'value'	 => 'no',
                    'label'	 => esc_html__('No', 'carrental'),
                ],
            ],

            'theme_header_default_settings' => array(
                'type' => 'multi-picker',
                'picker' => 'header_builder_enable',

                'choices' => array(
                    'yes' => array(
                        'carrental_header_builder_select' =>array(
                            'type'  => 'select',

                            'attr'  => array( 'class' => 'xs_header_builder_select', 'data-foo' => 'carrental_header_builder_select' ),
                            'label' => __('Header style', 'carrental'),

                            'choices' => carrental_ekit_headers(),

                            'no-validate' => false,
                        ),
                        'edit_header' => array(
                            'type'  => 'html',
                            'value' => '',

                            'label' => __('edit', 'carrental'),
                            'html'  => '<h2 class="header_builder_edit"><a class="xs_builder_edit_link" style="text-transform: uppercase; color:green" target="_blank" href='. admin_url( 'post.php?action=elementor&post='.$header_id ). '>'. esc_html('Edit content here.'). '</a><h2>' ,
                        ),
                    ),
                    'no' => array(

                    )
                )
            ),

            'header_nav_sticky' => [
               'type'			   => 'switch',
               'label'			   => esc_html__( 'Sticky header', 'carrental' ),
               'desc'			   => esc_html__('Do you want to enable sticky nav?', 'carrental' ),
               'value'           => 'no',
               'left-choice'	 => [
                   'value'	 => 'yes',
                   'label'	 => esc_html__('Yes', 'carrental'),
               ],
               'right-choice'	 => [
                  'value'	 => 'no',
                  'label'	 => esc_html__('No', 'carrental'),
                 ],
            ],

            'header_transparent_enable' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Header transparent Enable', 'carrental' ),
                'desc'			   => '' ,
                'value'           => 'yes',
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__('Yes', 'carrental'),
                ],
                'right-choice'	 => [
                    'value'	 => 'no',
                    'label'	 => esc_html__('No', 'carrental'),
                ],
            ],

            'header_nav_search_section' => [
                'type'			 => 'switch',
                'label'		    => esc_html__( 'Search button show', 'carrental' ),
                'desc'			 => esc_html__( 'Do you want to show search button in header ?', 'carrental' ),
                'value'         => 'no',
                'left-choice'	 => [
                    'value'     => 'yes',
                    'label'	   => esc_html__( 'Yes', 'carrental' ),
                ],
                'right-choice'	 => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'carrental' ),
                ],
            ],

            'header_quota_button' => array(
                'type'         => 'multi-picker',
                'label'        => false,
                'desc'         => false,
                'picker'       => array(
                    'style' => array(
                        'type'			 => 'switch',
                        'label'		 => esc_html__( 'Show CTA button ', 'carrental' ),
                        'value'       => 'no',
                        'left-choice'	 => [
                            'value'   	     => 'yes',
                            'label'	        => esc_html__( 'Yes', 'carrental' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'carrental' ),
                        ],

                    )
                ),
                'choices'      => array(
                    'yes' => array(
                    'header_quota_text' => [
                        'type'			    => 'text',
                        'label'			    => esc_html__( 'Quote text', 'carrental' ),
                        'desc'			    => esc_html__( 'Navigation quote text.', 'carrental' ),
                        'value'            => esc_html__('Get a quote','carrental'),
                    ],
                    'header_quota_url' => [
                        'type'			    => 'text',
                        'label'			    => esc_html__( 'Quote link', 'carrental' ),
                        'desc'			    => esc_html__( 'Navigation quote link.', 'carrental' ),
                        'value'            => esc_html__('#','carrental'),
                    ],
                    ),
                ),
                  'show_borders' => false,
            ),
        ], //Options end
    ]
];
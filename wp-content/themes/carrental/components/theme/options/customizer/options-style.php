<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */
$options =[
    'style_settings' => [
            'title'		 => esc_html__( 'Style settings', 'carrental' ),
            'options'	 => [
                'style_body_bg' => [
                    'label'	        => esc_html__( 'Body background', 'carrental' ),
                    'desc'	           => esc_html__( 'Site\'s main background color.', 'carrental' ),
                    'type'	           => 'color-picker',
                    'value' => '#FFFFFF',
                 ],

                'style_primary' => [
                    'label'	        => esc_html__( 'Primary color', 'carrental' ),
                    'desc'	           => esc_html__( 'Site\'s main color.', 'carrental' ),
                    'type'	           => 'color-picker',
                    'value' => '#ffbf00',
                ],

                'secondary_color' => [
                    'label'	        => esc_html__( 'Secondary color', 'carrental' ),
                    'desc'	           => esc_html__( 'Secondary color.', 'carrental' ),
                    'type'	           => 'color-picker',
                    'value' => '#FF4C30',
                ],

                'title_color' => [
                    'label'	        => esc_html__( 'Title color', 'carrental' ),
                    'desc'	        => esc_html__( 'Blog title color.', 'carrental' ),
                    'type'	        => 'color-picker',
                    'value' => '#1a1a1a'
                ],

                'body_font'    => array(
                    'type' => 'typography-v2',
                    'label' => esc_html__('Body Font', 'carrental'),
                    'desc'  => esc_html__('Choose the typography for the title', 'carrental'),
                    'value' => array(
                        'family' => 'Lato',
                        'size'  => '16',
                        'font-weight' => '400'
                    ),
                    'components' => array(
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ),
                ),

                'heading_font_one'	 => [
                    'type'		 => 'typography-v2',
                    'value'		 => [
                        'family'		 => 'Lato',
                        'size'  => '36',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H1', 'carrental' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'carrental' ),
                ],

                'heading_font_two'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Lato',
                        'size'        => '30',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H2 Fonts', 'carrental' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'carrental' ),
                ],

                'heading_font_three'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Lato',
                        'size'        => '24',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H3 Fonts', 'carrental' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'carrental' ),
                ],
                'heading_font_four'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Lato',
                        'size'        => '18',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H4 Fonts', 'carrental' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'carrental' ),
                ],
                'heading_font_five'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Lato',
                        'size'        => '16',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H5 Fonts', 'carrental' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'carrental' ),
                ],
                'heading_font_six'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'		  => 'Lato',
                        'size'        => '14',
                        'font-weight' => '700',
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H6 Fonts', 'carrental' ),
                    'desc'		    => esc_html__( 'This is for heading google fonts', 'carrental' ),
                ],
            ],
        ],
    ];
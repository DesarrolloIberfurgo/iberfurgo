<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: banner
 */
if(!class_exists( 'WooCommerce' )) return;

$options = [
	'xs_woocommerce_setting' => [
		'title' => esc_html__('WooCommerce', 'carrental'),

		'options' => [
			'xs_shop_banner_setting' => [
				'type'        => 'popup',
				'label'       => esc_html__('Shop banner settings', 'carrental'),
				'popup-title' => esc_html__('Shop banner settings', 'carrental'),
				'button'      => esc_html__('Edit Shop Banner', 'carrental'),
				'size'        => 'medium', // small, medium, large
				'popup-options' => [
					'xs_shop_page_show_banner' => [
						'type'			 => 'switch',
						'label'			 => esc_html__( 'Show banner?', 'carrental' ),
						'desc'          => esc_html__('Show or hide the banner', 'carrental'),
						'value'         => 'yes',
						'left-choice'	 => [
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'carrental' ),
						],
						'right-choice'	 => [
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'carrental' ),
						],
					],

					'xs_shop_banner_image'	 =>array(
						'label'			 => esc_html__( 'Banner image', 'carrental' ),
						'type'			 => 'upload',
						'images_only'	 => true,
						'files_ext'		 => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),

					),
					'shop_show_background_overlay_switch' => [
                        'type'			   => 'switch',
                        'label'			   => esc_html__( 'Show background overlay', 'carrental' ),
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
                    'shop_show_background_overlay' => array(
                        'type' => 'multi-picker',
                        'picker' => 'shop_show_background_overlay_switch',
                        'choices' => array(
                            'yes' => array(
                                'shop_banner_overlay_style' => [
                                    'type'  => 'rgba-color-picker',
                                    'value' => 'rgba(0, 0, 0, 0.4)',
                                    'label' => __('Banner Overlay Color', 'carrental'),
                                ],
                            ),
                            'no' => array(

                            )
                        )
                    ),
				],
			],

			'xs_single_product_blog_banner_setting' => [
				'type'         => 'popup',
				'label'        => esc_html__('Single Product banner settings', 'carrental'),
				'popup-title'  => esc_html__('Single Product banner settings', 'carrental'),
				'button'       => esc_html__('Edit Single Product Banner', 'carrental'),
				'size'         => 'medium', // small, medium, large
				'popup-options' => [
					'xs_single_product_show_banner' => [
						'type'			 => 'switch',
						'label'			 => esc_html__( 'Show banner?', 'carrental' ),
						'desc'          => esc_html__('Show or hide the banner', 'carrental'),
						'value'         => 'yes',
						'left-choice'	 => [
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'carrental' ),
						],
						'right-choice'	 => [
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'carrental' ),
						],
					],
					'xs_single_product_banner_blog_image'	 =>[
						'type'  => 'upload',
						'label' => esc_html__('Image', 'carrental'),
						'desc'  => esc_html__('Banner blog image', 'carrental'),
						'images_only' => true,
						'files_ext' => array( 'PNG', 'JPEG', 'JPG','GIF'),
					],
					'shop_single_show_background_overlay_switch' => [
                        'type'			   => 'switch',
                        'label'			   => esc_html__( 'Show background overlay', 'carrental' ),
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
                    'shop_single_show_background_overlay' => array(
                        'type' => 'multi-picker',
                        'picker' => 'shop_single_show_background_overlay_switch',
                        'choices' => array(
                            'yes' => array(
                                'shop_single_banner_overlay_style' => [
                                    'type'  => 'rgba-color-picker',
                                    'value' => 'rgba(0, 0, 0, 0.4)',
                                    'label' => __('Banner Overlay Color', 'carrental'),
                                ],
                            ),
                            'no' => array(

                            )
                        )
                    ),
				],
			],

			'xs_woo_shop_page_setting' => [
				'type'         => 'radio',
				'value' => 'fluid',
				'label' => __('Shop Page Layout', 'carrental'),
				'desc'  => __('Select shop page layout style', 'carrental'),
				'choices' => [ // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
					'fluid' => __('Fluid', '{domain}'),
					'lidebar' => __('Left Sidebar', 'carrental'),
					'rsidbar' => __('Right Sidebar', 'carrental'),
				],
				// Display choices inline instead of list
				'inline' => true,
			],
		],
	],
];
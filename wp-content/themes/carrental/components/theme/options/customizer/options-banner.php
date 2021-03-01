<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: banner
 */


$options = [
    'banner_setting' => [
        'title' => esc_html__('Banner settings', 'carrental'),

        'options' => [
            'page_banner_setting' => [
                'type'        => 'popup',
                'label'       => esc_html__('Page banner settings', 'carrental'),
                'popup-title' => esc_html__('Page banner settings', 'carrental'),
                'button'      => esc_html__('Edit page Banner', 'carrental'),
                'size'        => 'medium', // small, medium, large
                'popup-options' => [
                    'page_show_banner' => [
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
                    'page_show_breadcrumb' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show Breadcrumb?', 'carrental' ),
                        'desc'          => esc_html__('Show or hide the Breadcrumb', 'carrental'),
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
                    'banner_page_title'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Banner title', 'carrental' ),
                        'value'  => '',
                    ],
                    'banner_page_image'	 =>array(
                        'label'			 => esc_html__( 'Banner image', 'carrental' ),
                        'type'			 => 'upload',
                        'images_only'	 => true,
                        'files_ext'		 => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),
                    ),
                    'page_show_background_overlay_switch' => [
                        'type'			   => 'switch',
                        'label'			   => esc_html__( 'Show background overlay', 'carrental' ),
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
                    'page_show_background_overlay' => array(
                        'type' => 'multi-picker',
                        'picker' => 'page_show_background_overlay_switch',
                        'choices' => array(
                            'yes' => array(
                                'page_banner_overlay_style' => [
                                    'type'  => 'rgba-color-picker',
                                    'value' => 'rgba(255, 255, 255, 0.95)',
                                    'label' => __('Banner Overlay Color', 'carrental'),
                                ],
                            ),
                            'no' => array(

                            )
                        )
                    ),
                ],
            ],

            'blog_banner_setting' => [
                'type'         => 'popup',
                'label'        => esc_html__('Blog banner settings', 'carrental'),
                'popup-title'  => esc_html__('Blog banner settings', 'carrental'),
                'button'       => esc_html__('Edit Blog Banner', 'carrental'),
                'size'         => 'medium', // small, medium, large
                'popup-options' => [
                    'blog_show_banner' => [
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
                    'blog_show_breadcrumb' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show Breadcrumb?', 'carrental' ),
                        'desc'          => esc_html__('Show or hide the Breadcrumb', 'carrental'),
                        'value'         => 'no',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'carrental' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'carrental' ),
                        ],
                    ],
                    'banner_blog_title'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Banner title', 'carrental' ),
                    ],

                    'banner_blog_image'	 =>array(
                        'type'  => 'upload',
                        'label' => esc_html__('Image', 'carrental'),
                        'desc'  => esc_html__('Banner blog image', 'carrental'),
                        'images_only' => true,
                        'files_ext' => array( 'PNG', 'JPEG', 'JPG','GIF'),
                    ),
                    'blog_show_background_overlay_switch' => [
                        'type'			   => 'switch',
                        'label'			   => esc_html__( 'Show background overlay', 'carrental' ),
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
                    'blog_show_background_overlay' => array(
                        'type' => 'multi-picker',
                        'picker' => 'blog_show_background_overlay_switch',
                        'choices' => array(
                            'yes' => array(
                                'blog_banner_overlay_style' => [
                                    'type'  => 'rgba-color-picker',
                                    'value' => 'rgba(255, 255, 255, 0.95)',
                                    'label' => __('Banner Overlay Color', 'carrental'),
                                ],
                            ),
                            'no' => array(

                            )
                        )
                    ),
                ],
            ],

        ],
    ],
];
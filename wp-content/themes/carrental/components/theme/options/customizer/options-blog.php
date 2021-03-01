<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: blog
 */

$options =[
    'blog_settings' => [
        'title'		 => esc_html__( 'Blog settings', 'carrental' ),

        'options'	 => [
            'blog_sidebar' =>[
                'type'  => 'select',

                'label' => esc_html__('Sidebar', 'carrental'),
                'desc'  => esc_html__('Description', 'carrental'),
                'help'  => esc_html__('Help tip', 'carrental'),
                'choices' => array(
                    '1' => esc_html__('No sidebar','carrental'),
                    '2' => esc_html__('Left Sidebar', 'carrental'),
                    '3' => esc_html__('Right Sidebar', 'carrental'),

                 ),

                'no-validate' => false,
            ],

            'blog_author' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Blog author', 'carrental' ),
                'desc'			 => esc_html__( 'Do you want to show blog author?', 'carrental' ),
                'value'          => 'no',
                'left-choice' => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'carrental' ),
                ],
                'right-choice' => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'carrental' ),
                ],
           ],
            'blog_related_post' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Blog related post', 'carrental' ),
                'desc'			 => esc_html__( 'Do you want to show single blog related post?', 'carrental' ),
                'value'          => 'no',
                'left-choice' => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'carrental' ),
                ],
                'right-choice' => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'carrental' ),
                ],
           ],

           'blog_related_post_number' => [
            'label'	 => esc_html__( 'Related post count', 'carrental' ),
            'type'	 => 'text',
            'value'	 => 3,
           ],
        ],

        ]
    ];
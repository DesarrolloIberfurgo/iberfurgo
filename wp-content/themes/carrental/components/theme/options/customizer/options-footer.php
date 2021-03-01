<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */
$footer_settings = carrental_option('theme_header_default_settings');
$footer_id = '';
$footer_builder_enable = carrental_option('header_builder_enable');
if($footer_builder_enable=='yes'){
    $footer_id =   $footer_settings['yes']['carrental_header_builder_select'];
}

$options =[
    'footer_settings' => [
        'title'		 => esc_html__( 'Footer settings', 'carrental' ),

        'options'	 => [
            'footer_builder_enable' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Footer builder Enable', 'carrental' ),
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

            'theme_footer_default_settings' => array(
                'type' => 'multi-picker',
                'picker' => 'footer_builder_enable',

                'choices' => array(
                    'yes' => array(
                        'carrental_footer_builder_select' =>array(
                            'type'  => 'select',

                            'attr'  => array( 'class' => 'xs_header_builder_select', 'data-foo' => 'carrental_header_builder_select' ),
                            'label' => __('Footer style', 'carrental'),

                            'choices' => carrental_ekit_footers(),

                            'no-validate' => false,
                        ),
                        'edit_footer' => array(
                            'type'  => 'html',
                            'value' => '',

                            'label' => __('edit', 'carrental'),
                            'html'  => '<h2 class="header_builder_edit"><a class="xs_builder_edit_link" style="text-transform: uppercase; color:green" target="_blank" href='. admin_url( 'post.php?action=elementor&post='.$footer_id ). '>'. esc_html('Edit content here.'). '</a><h2>' ,
                        ),
                    ),



                    'no' => array(

                    )
                )
            ),
            'xs_footer_bg_color' => [
                'label'	 => esc_html__( 'Background color', 'carrental'),
                'type'	 => 'color-picker',
                'value'  => '#f2f2f2',
                'desc'	 => esc_html__( 'You can change the  background color with rgba color or solid color', 'carrental'),
            ],
            'xs_footer_text_color' => [
                'label'	 => esc_html__( 'Text color', 'carrental'),
                'type'	 => 'color-picker',
                'value'  => '#666666',
                'desc'	 => esc_html__( 'You can change the text color with rgba color or solid color', 'carrental'),
            ],
            'xs_footer_link_color' => [
                'label'	 => esc_html__( 'Link color', 'carrental'),
                'type'	 => 'color-picker',
                'value'  => '#666666',
                'desc'	 => esc_html__( 'You can change the text color with rgba color or solid color', 'carrental'),
            ],
            'xs_footer_widget_title_color' => [
                'label'	 => esc_html__( 'Widget Title color', 'carrental'),
                'type'	 => 'color-picker',
                'value'  => '#142355',
                'desc'	 => esc_html__( 'You can change the text color with rgba color or solid color', 'carrental'),
            ],
            'footer_bg_color' => [
                'label'	 => esc_html__( 'Copyright Background color', 'carrental'),
                'type'	 => 'color-picker',
                'value'  => '#eff1f4',
                'desc'	 => esc_html__( 'You can change the copyright background color with rgba color or solid color', 'carrental'),
            ],
            'footer_copyright_color' => [
                'label'	 => esc_html__( 'Footer Copyright color', 'carrental'),
                'type'	 => 'color-picker',
                'value'  => '#4A4A4A',
                'desc'	 => esc_html__( 'You can change the footer\'s background color with rgba color or solid color', 'carrental'),
            ],
            'footer_social_links' => [
                'type'  => 'addable-popup',
                'template' => '{{- title }}',
                'popup-title' => null,
                'label' => esc_html__( 'Social links', 'carrental' ),
                'desc'  => esc_html__( 'Add social links and it\'s icon class bellow. These are all fontaweseome-4.7 icons.', 'carrental' ),
                'add-button-text' => esc_html__( 'Add new', 'carrental' ),
                'popup-options' => [
                    'title' => [
                        'type' => 'text',
                        'label'=> esc_html__( 'Title', 'carrental' ),
                    ],
                    'icon_class' => [
                        'type' => 'new-icon',
                        'label'=> esc_html__( 'Social icon', 'carrental' ),
                    ],
                    'url' => [
                        'type' => 'text',
                        'label'=> esc_html__( 'Social link', 'carrental' ),
                    ],
                ],
                'value' => [

                ],
            ],
            'footer_copyright'	 => [
                'type'	 => 'textarea',
                'value'  =>  esc_html__('&copy; '.date('Y').', carrental. All rights reserved','carrental'),
                'label'	 => esc_html__( 'Copyright text', 'carrental' ),
                'desc'	 => esc_html__( 'This text will be shown at the footer of all pages.', 'carrental' ),
            ],

            'footer_padding_top' => [
                'label'	        => esc_html__( 'Footer Padding Top', 'carrental' ),
                'desc'	        => esc_html__( 'Use Footer Padding Top', 'carrental' ),
                'type'	        => 'text',
                'value'         => '100px',
             ],
            'footer_padding_bottom' => [
                'label'	        => esc_html__( 'Footer Padding Bottom', 'carrental' ),
                'desc'	        => esc_html__( 'Use Footer Padding Bottom', 'carrental' ),
                'type'	        => 'text',
                'value'         => '100px',
             ],
             'back_to_top'				 => [
                'type'			 => 'switch',
                'value'			 => 'hello',
                'label'			 => esc_html__( 'Back to top', 'carrental'),
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'carrental'),
                ],
                'right-choice'	 => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'carrental'),
                ],
            ],

        ],

        ]
    ];
<?php

class Customizer extends \Devmonsta\Libs\Customizer
{

    public function register_controls()
    {

        /**
         * Add parent panels
         */

        include_once(get_template_directory(  ) . '/core/helpers/functions/global.php');

        $this->add_panel([
            'id'             => 'xs_theme_option_panel',
            'priority'       => 0,
            'theme_supports' => '',
            'title'          => __('Theme settings', 'carrental'),
            'description'    => __('Theme options panel', 'carrental'),
        ]);


        /**
         * General settings here
         */
        $this->add_section([
            'id'       => 'general_settings_section',
            'title'    => __('Optional Settings', 'carrental'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 20,
        ]);

        $this->add_control([
            'id'          => 'general_main_logo',
            'type'        => 'media',
            'section'     => 'general_settings_section',
            'label'       => esc_html__('Main Logo', 'carrental'),
            'description' => esc_html__( 'This is default logo. Our most of the menu built with elemnetsKit header builder. Go to header settings->Header builder enable->  and click "edit header content" to change the logo', 'carrental' ),
        ]);

        /**
         * Header settings here
         */
        $this->add_section([
            'id'       => 'xs_header_settings_section',
            'title'    => __('Header Settings', 'carrental'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 10,
        ]);

        /**
         * Header builder switch here
         */
        $this->add_control([
            'id'      => 'header_builder_enable',
            'type'    => 'switcher',
            'default' => 'no',
            'label'   => esc_html__('Header builder Enable ?', 'carrental'),
            'desc'    => esc_html__('Do you want to enable n in header ?', 'carrental'),
            'section' => 'xs_header_settings_section',
            'attr'    => ['class' => 'xs_header_builder_switch'],
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'      => 'header_builder_select',
            'type'    => 'select',
            // 'value'   => '1',
            'label'   => esc_html__('Header', 'carrental'),
            'section' => 'xs_header_settings_section',
            'choices' => carrental_ekit_headers(),
            'attr'    => ['class' => 'xs_header_builder_select'],
            'conditions' => [
                [
                    'control_name'  => 'header_builder_enable',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        $this->add_control([
            'id'      => 'header_builder_select_html',
            'section' => 'xs_header_settings_section',
            // 'label'   => __('Html Input', 'carrental'),
            // 'desc'    => __('html description goes here', 'carrental'),
            'type'    => 'html',
            'value'   => '<h2 class="header_builder_edit"><a class="xs_builder_edit_link" style="text-transform: uppercase; color:green" target="_blank" href="#">'. esc_html('Edit content here.'). '</a><h2><h3><a style="text-transform: uppercase; color:#17a2b8" target="_blank" href="https://support.xpeedstudio.com/knowledgebase/customize-carrental-header-and-footer-builder/">'. esc_html('How to edit header'). '</a><h3>',
            'attr'    => ['class' => 'xs_header_builder_html'],
            'conditions' => [
                [
                    'control_name'  => 'header_builder_enable',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        $this->add_control([
            'id'      => 'header_nav_sticky',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Sticky header', 'carrental'),
            'desc'    => esc_html__('Do you want to enable sticky nav?', 'carrental'),
            'section' => 'xs_header_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'      => 'header_transparent_enable',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Header transparent Enable', 'carrental'),
            'desc'    => esc_html__('Do you want to enable transparent nav?', 'carrental'),
            'section' => 'xs_header_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'      => 'header_nav_search_section',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Search button show', 'carrental'),
            'desc'    => esc_html__('Do you want to show search button in header?', 'carrental'),
            'section' => 'xs_header_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'      => 'header_quota_button',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Show Quote button', 'carrental'),
            'section' => 'xs_header_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'          => 'header_quota_text',
            'type'        => 'text',
            'label'       => esc_html__('Quote text', 'carrental'),
            'description' => esc_html__('Navigation quote text.', 'carrental'),
            'default'     => esc_html__('Get a quote', 'carrental'),
            'section'     => 'xs_header_settings_section',
            'conditions' => [
                [
                    'control_name'  => 'header_quota_button',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        $this->add_control([
            'id'          => 'header_quota_url',
            'type'        => 'url',
            'label'       => esc_html__('Quote link', 'carrental'),
            'description' => esc_html__('Navigation quote link.', 'carrental'),
            'default'     => esc_url('#'),
            'section'     => 'xs_header_settings_section',
            'conditions' => [
                [
                    'control_name'  => 'header_quota_button',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);


        /**
         * Banner settings here
         */

        $this->add_panel([
            'id'             => 'banner_settings_section',
            'title'          => esc_html__( 'Banner settings', "carrental" ),
            'panel'          => 'xs_theme_option_panel',
        ]);

        /**
         * page banner panel
         */

        $this->add_section([
            'id'       => 'banner_page_settings',
            'title'    => esc_html__( 'Page banner', "carrental" ),
            'panel'    => 'banner_settings_section',
        ]);


        /**
         * page banner control start here
         */

        $this->add_control([
            'id'      => 'page_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'carrental'),
            'desc'    => esc_html__('Show or hide the banner', 'carrental'),
            'section' => 'banner_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'      => 'page_show_breadcrumb',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Show Breadcrumb?', 'carrental'),
            'desc'    => esc_html__('Show or hide the Breadcrumb', 'carrental'),
            'section' => 'banner_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'    => 'page_banner_title',
            'type'  => 'text',
            'label' => esc_html__('Banner Title', 'carrental'),
            'section' => 'banner_page_settings',
        ]);

        $this->add_control([
            'id'       => 'page_banner_title_color',
            'section'  => 'banner_page_settings',
            'type'     => 'rgba-color-picker',
            'label'    => esc_html__('Title Color', 'carrental'),
        ]);

        $this->add_control([
            'id'      => 'banner_page_image',
            'type'    => 'media',
            'section' => 'banner_page_settings',
            'label'   => esc_html__('Banner Background', 'carrental'),
        ]);

        $this->add_control([
            'id'      => 'show_page_banner_overlay',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show background overlay', 'carrental'),
            'section' => 'banner_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);


        $this->add_control([
            'id'       => 'page_banner_overlay_color',
            'section'  => 'banner_page_settings',
            'type'     => 'rgba-color-picker',
            'label'    => esc_html__('Banner Overlay Color', 'carrental'),
            'conditions' => [
                [
                    'control_name'  => 'show_page_banner_overlay',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        /**
         * blog banner panel
         */

        $this->add_section([
            'id'       => 'banner_blog_settings',
            'title'    => esc_html__( 'Blog banner', "carrental" ),
            'panel'    => 'banner_settings_section',
        ]);

        /**
         * blog banner control start here
         */

        $this->add_control([
            'id'      => 'blog_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'carrental'),
            'desc'    => esc_html__('Show or hide the banner', 'carrental'),
            'section' => 'banner_blog_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_show_breadcrumb',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Show Breadcrumb?', 'carrental'),
            'desc'    => esc_html__('Show or hide the Breadcrumb', 'carrental'),
            'section' => 'banner_blog_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'    => 'blog_banner_title',
            'type'  => 'text',
            'label' => esc_html__('Banner Title', 'carrental'),
            'section' => 'banner_blog_settings',
        ]);

        $this->add_control([
            'id'       => 'blog_banner_title_color',
            'section'  => 'banner_blog_settings',
            'type'     => 'rgba-color-picker',
            'label'    => esc_html__('Title Color', 'carrental'),
        ]);

        $this->add_control([
            'id'      => 'banner_blog_image',
            'type'    => 'media',
            'section' => 'banner_blog_settings',
            'label'   => esc_html__('Banner Background', 'carrental'),
        ]);

        $this->add_control([
            'id'      => 'show_blog_banner_overlay',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show background overlay', 'carrental'),
            'section' => 'banner_blog_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'       => 'blog_banner_overlay_color',
            'section'  => 'banner_blog_settings',
            'type'     => 'rgba-color-picker',
            'label'    => esc_html__('Banner Overlay Color', 'carrental'),
            'conditions' => [
                [
                    'control_name'  => 'show_blog_banner_overlay',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        /**
         * Woocommerce settings here
         */

        /*============= Woo Panel ===================*/
        $this->add_panel([
            'id'             => 'woo_settings_section',
            'title'          => esc_html__( 'WooCommerce', "carrental" ),
            'panel'          => 'xs_theme_option_panel',
        ]);

        /*======================= woocommerce section ====================*/
        /*
            Shop page banner
        */
        $this->add_section([
            'id'       => 'woo_page_settings',
            'title'    => esc_html__( 'Shop page banner', "carrental" ),
            'panel'    => 'woo_settings_section',
        ]);

        $this->add_control([
            'id'      => 'woo_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'carrental'),
            'desc'    => esc_html__('Show or hide the banner', 'carrental'),
            'section' => 'woo_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'       => 'woo_banner_title_color',
            'section'  => 'woo_page_settings',
            'type'     => 'rgba-color-picker',
            'label'    => esc_html__('Title Color', 'carrental'),
        ]);

        $this->add_control([
            'id'      => 'banner_woo_image',
            'type'    => 'media',
            'section' => 'woo_page_settings',
            'label'   => esc_html__('Banner Background', 'carrental'),
        ]);

        $this->add_control([
            'id'      => 'show_woo_banner_overlay',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show background overlay', 'carrental'),
            'section' => 'woo_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'       => 'woo_banner_overlay_color',
            'section'  => 'woo_page_settings',
            'type'     => 'rgba-color-picker',
            'label'    => esc_html__('Banner Overlay Color', 'carrental'),
            'conditions' => [
                [
                    'control_name'  => 'show_woo_banner_overlay',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        /*
            Shop single page banner
        */
        $this->add_section([
            'id'       => 'woo_sigle_page_settings',
            'title'    => esc_html__( 'Shop single page banner', "carrental" ),
            'panel'    => 'woo_settings_section',
        ]);

        $this->add_control([
            'id'      => 'woo_single_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'carrental'),
            'desc'    => esc_html__('Show or hide the banner', 'carrental'),
            'section' => 'woo_sigle_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'       => 'woo_single_banner_title_color',
            'section'  => 'woo_sigle_page_settings',
            'type'     => 'rgba-color-picker',
            'label'    => esc_html__('Title Color', 'carrental'),
        ]);

        $this->add_control([
            'id'      => 'banner_woo_single_image',
            'type'    => 'media',
            'section' => 'woo_sigle_page_settings',
            'label'   => esc_html__('Banner Background', 'carrental'),
        ]);

        $this->add_control([
            'id'      => 'show_woo_single_banner_overlay',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show background overlay', 'carrental'),
            'section' => 'woo_sigle_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'       => 'woo_single_banner_overlay_color',
            'section'  => 'woo_sigle_page_settings',
            'type'     => 'rgba-color-picker',
            'label'    => esc_html__('Banner Overlay Color', 'carrental'),
            'conditions' => [
                [
                    'control_name'  => 'show_woo_banner_overlay',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        /*
            Woo custom control
        */
        $this->add_section([
            'id'       => 'woo_custom_settings',
            'title'    => esc_html__( 'WooCommerce Settings', "carrental" ),
            'panel'    => 'woo_settings_section',
        ]);

        $this->add_control([
            'id'      => 'woo_shop_page_setting',
            'type'    => 'select',
            'value'   => 'fluid',
            'label' => esc_html__('Sidebar', 'carrental'),
            'section' => 'woo_custom_settings',
            'choices' => [
                'fluid'   => esc_html__('No sidebar', 'carrental'),
                'lidebar' => esc_html__('Left Sidebar', 'carrental'),
                'rsidbar' => esc_html__('Right Sidebar', 'carrental'),
            ],
        ]);

        /**
         * Typography settings here
         */
        $this->add_section([
            'id'       => 'typography_settings_section',
            'title'    => esc_html__('Style settings', 'carrental'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 10,
        ]);

        /**
         * body background control
         */
        $this->add_control([
            'id'      => 'style_body_bg',
            'label'   => esc_html__('Body background', 'carrental'),
            'type'    => 'color-picker',
            'section' => 'typography_settings_section',
            'default' => '#FFFFFF',
        ]);

        /**
         * primary color control
         */
        $this->add_control([
            'id'      => 'style_primary',
            'label'      => esc_html__('Primary color', 'carrental'),
            'type'    => 'color-picker',
            'section' => 'typography_settings_section',
            'default' => '#ffbf00',
        ]);

        /**
         * secondary color control
         */
        $this->add_control([
            'id'      => 'secondary_color',
            'label'      => esc_html__('Secondary color', 'carrental'),
            'type'    => 'color-picker',
            'section' => 'typography_settings_section',
            'default' => '#FF4C30',
        ]);

        /**
         * Control for body Typography Input
         */
        $this->add_control([
            'id'         => 'body_font',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Roboto',
                'weight'         => 400,
                'size'           => 16,
                'line_height'    => 26,
                'color'          => '#777777',
                'letter_spacing' => 0
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => __('Body Typhography', 'carrental'),
        ]);

        /**
         * Control for H1 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_one',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 36,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => __('Heading H1 Typhography', 'carrental'),
        ]);

        /**
         * Control for H2 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_two',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 30,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => __('Heading H2 Typhography', 'carrental'),
        ]);

        /**
         * Control for H3 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_three',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 24,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => __('Heading H3 Typhography', 'carrental'),
        ]);

        /**
         * Control for H4 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_four',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 18,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => __('Heading H4 Typhography', 'carrental'),
        ]);

        /**
         * Control for H5 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_five',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 16,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => __('Heading H5 Typhography', 'carrental'),
        ]);

        /**
         * Control for H6 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_six',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 14,
                'color'          => '#1a1a1a',
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => __('Heading H6 Typhography', 'carrental'),
        ]);

        $this->add_control([
            'id'      => 'dm_toggle',
            'label'   => __('Toggle', 'carrental'),
            'section' => 'typography_settings_section',
            'type'    => 'toggle',
        ]);


        /**
         * Blog settings here
         */
        $this->add_section([
            'id'       => 'blog_settings_section',
            'title'    => esc_html__('Blog settings', 'carrental'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 10,
        ]);

        /**
         * Blog settings body controls here
         */
        $this->add_control([
            'id'      => 'blog_sidebar',
            'type'    => 'select',
            'value'   => '1',
            'label' => esc_html__('Sidebar', 'carrental'),
            'section' => 'blog_settings_section',
            'choices' => [
                '1' => esc_html__('No sidebar', 'carrental'),
                '2' => esc_html__('Left Sidebar', 'carrental'),
                '3' => esc_html__('Right Sidebar', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_author',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Blog author', 'carrental'),
            'desc'    => esc_html__('Do you want to show blog author?', 'carrental'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_related_post',
            'type'    => 'switcher',
            'default' => 'no',
            'label'      => esc_html__('Blog related post', 'carrental'),
            'desc'      => esc_html__('Do you want to show single blog related post?', 'carrental'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_related_post_number',
            'type'    => 'text',
            'label'   => esc_html__('Related post count', 'carrental'),
            'default' => '3',
            'section' => 'blog_settings_section',
        ]);


        /**
         * Footer Settings here
         */
        $this->add_section([
            'id'       => 'footer_settings_section',
            'title'    => esc_html__('Footer settings', 'carrental'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 10,
        ]);

        /**
         * Header builder switch here
         */
        $this->add_control([
            'id'      => 'footer_builder_control_enable',
            'type'    => 'switcher',
            'default' => 'no',
            'label'   => esc_html__('Footer builder Enable ?', 'carrental'),
            'desc'    => esc_html__('Do you want to enable footer builder ?', 'carrental'),
            'section' => 'footer_settings_section',
            'attr'    => ['class' => 'xs_footer_builder_switch'],
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);

        $this->add_control([
            'id'      => 'footer_builder_select',
            'type'    => 'select',
            'value'   => '1',
            'label' => esc_html__('Footer', 'carrental'),
            'section' => 'footer_settings_section',
            'choices' => carrental_ekit_footers(),
            'conditions' => [
                [
                    'control_name'  => 'footer_builder_control_enable',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        $this->add_control([
            'id'      => 'footer_builder_select_html',
            'section' => 'footer_settings_section',
            // 'label'   => __('Html Input', 'carrental'),
            // 'desc'    => __('html description goes here', 'carrental'),
            'type'    => 'html',
            'value'   => '<h2 class="header_builder_edit"><a class="xs_builder_edit_link" style="text-transform: uppercase; color:green" target="_blank" href="#">'. esc_html('Edit content here.'). '</a><h2><h3><a style="text-transform: uppercase; color:#17a2b8" target="_blank" href="https://support.xpeedstudio.com/knowledgebase/customize-carrental-header-and-footer-builder/">'. esc_html('How to edit header'). '</a><h3>',
            'attr'    => ['class' => 'xs_footer_builder_html'],
            'conditions' => [
                [
                    'control_name'  => 'footer_builder_control_enable',
                    'operator' => '==',
                    'value'    => "yes",
                ]
            ],
        ]);

        /**
         * Footer bg control
         * */
        $this->add_control([
            'id'       => 'xs_footer_bg_color',
            'label'    => esc_html__('Background color', 'carrental'),
            'type'     => 'color-picker',
            'section'  => 'footer_settings_section',
            'default'  => '#042ff8',
            'desc'     => esc_html__('Footer background color of rgba-color-picker goes here', 'carrental'),
        ]);

        /**
         * Footer text control
         * */
        $this->add_control([
            'id'      => 'xs_footer_text_color',
            'label'   => esc_html__('Text color', 'carrental'),
            'type'    => 'color-picker',
            'section' => 'footer_settings_section',
            'default' => '#666',
            'desc'    => esc_html__('You can change the text color with rgba color or solid color', 'carrental'),
        ]);

        /**
         * Footer link control
         * */
        $this->add_control([
            'id'         => 'xs_footer_link_color',
            'label'      => esc_html__('Link Color', 'carrental'),
            'type'       => 'color-picker',
            'section'    => 'footer_settings_section',
            'default'    => '#666',
            'desc'       => esc_html__('You can change the link color with rgba color or solid color', 'carrental'),
        ]);

        /**
         * Footer widget title control
         * */
        $this->add_control([
            'id'        => 'xs_footer_widget_title_color',
            'label'     => esc_html__('Widget Title Color', 'carrental'),
            'type'      => 'color-picker',
            'section'   => 'footer_settings_section',
            'default'   => '#142355',
            'desc'      => esc_html__('You can change the widget title color with rgba color or solid color', 'carrental'),
        ]);

        /**
         * Footer copyright bg control
         * */
        $this->add_control([
            'id'        => 'copyright_bg_color',
            'label'     => esc_html__('Copyright Background Color', 'carrental'),
            'type'      => 'color-picker',
            'section'   => 'footer_settings_section',
            'default'   => '#eff1f4',
            'desc'      => esc_html__('You can change the copyright background color with rgba color or solid color', 'carrental'),

        ]);

        /**
         * Footer copyright color control
         * */
        $this->add_control([
            'id'        => 'footer_copyright_color',
            'label'     => esc_html__('Copyright Text Color', 'carrental'),
            'type'      => 'color-picker',
            'default'   => '#FFFFFF',
            'section'   => 'footer_settings_section',
            'desc'      => esc_html__('You can change the copyright tet color with rgba color or solid color', 'carrental'),
        ]);

        /**
         * Footer copyright text control
         * */
        $this->add_control([
            'id'          => 'footer_copyright',
            'type'        => 'textarea',
            'section'     => 'footer_settings_section',
            'value'       => esc_html__('&copy; '.date('Y').', carrental. All rights reserved', 'carrental'),
            'label'       => esc_html__('Copyright text', 'carrental'),
            'description' => esc_html__('This text will be shown at the footer of all pages.', 'carrental'),
        ]);

        /**
         * Footer spacing top control
         * */
        $this->add_control([
            'id'          => 'footer_padding_top',
            'label'       => esc_html__('Footer Padding Top', 'carrental'),
            'description' => esc_html__('Use Footer Padding Top', 'carrental'),
            'type'        => 'text',
            'section'     => 'footer_settings_section',
            'default'     => '100px',
        ]);

        /**
         * Footer spaceing bottom control
         * */
        $this->add_control([
            'id'          => 'footer_padding_bottom',
            'label'	      => esc_html__( 'Footer Padding Bottom', 'carrental' ),
            'description' => esc_html__( 'Use Footer Padding Bottom', 'carrental' ),
            'type'        => 'text',
            'section'     => 'footer_settings_section',
            'default'     => '100px',
        ]);

        /**
         * Footer back to top control
         * */
        $this->add_control([
            'id'      => 'back_to_top',
            'type'    => 'switcher',
            'default' => 'no',
            'label'   => esc_html__('Back to top', 'carrental'),
            'section' => 'footer_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'carrental'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'carrental'),
            ],
        ]);
    }
}

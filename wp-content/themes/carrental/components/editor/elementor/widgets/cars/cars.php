<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class CarRental_Cars_Widget extends Widget_Base {

    public function get_name() {
        return 'carrental-cars';
    }

    public function get_title() {
        return esc_html__( 'CarRental Cars', 'carrental' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return [ 'carrental-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
			'cars_content_section',
			[
				'label' => __( 'Content', 'carrental' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'cars_tab_styles',
			[
				'label'   => __( 'Border Style', 'carrental' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'vertical_tab_style',
				'options' => [
					'vertical_tab_style'   => __( 'Vertical tab style', 'carrental' ),
					'horizontal_tab_style' => __( 'Horizontal tab style', 'carrental' ),
                ],
                "label_block" => true
			]
		);

        $this->add_control(
			'reserve_button_icon',
			[
				'label'       => __( 'Button Icon', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-calendar',
                "label_block" => true
			]
		);

        $this->add_control(
			'phone_button_icon',
			[
				'label'       => __( 'Phone Button Icon', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-phone',
                "label_block" => true,
                "condition"   => [
                    "cars_tab_styles" => "horizontal_tab_style"
                ]
			]
        );

        // ---- Slider icon
        $this->start_controls_tabs(
            'car_slider_left_and_right_icon_tabs'
        );

        // --- Left
        $this->start_controls_tab(
            'car_slider_icon_left_tab',
            [
                'label' => esc_html__( 'Icon One', 'carrental' ),
            ]
        );

        $this->add_control(
			'car_slider_left_icon',
			[
				// 'label'       => __( 'Icon', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-chevron-down',
                "label_block" => true
			]
		);

        $this->end_controls_tab();

        // --- Right
        $this->start_controls_tab(
            'car_slider_right_icon_tab',
            [
                'label' => esc_html__( 'Icon Two', 'carrental' ),
            ]
        );

        $this->add_control(
			'car_slider_right_icon',
			[
				// 'label'       => __( 'Icon', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-chevron-up',
                "label_block" => true
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
			'show_car_details_icon',
			[
				'label' => __( 'Show Icon', 'carrental' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
			]
		);

		$this->add_control('cars__cat',
            [
                'label'     => esc_html__( 'Category', 'carrental' ),
                'type'      => Controls_Manager::SELECT2,
				'multiple'  => true,
				'label_block' => true,
                'options'   => $this->getCategories(),
            ]
        );

        $this->add_control(
            'car__posts_num',
            [
                'label'     => esc_html__( 'Posts Count', 'carrental' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 100,
                'default'   => 4,
            ]
        );

        $this->add_control(
            'car__offset',
            [
                'label'     => esc_html__( 'Offset', 'carrental' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 0,
                'max'       => 20,
                'default'   => 0,
            ]
        );

        $this->add_control(
            'car__posts_order_by',
            [
                'label'   => esc_html__( 'Order by', 'carrental' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'date'          => esc_html__( 'Date', 'carrental' ),
                    'title'         => esc_html__( 'Title', 'carrental' ),
                ],
                'default' => 'date',
            ]
        );

        $this->add_control(
            'car__posts_sort',
            [
                'label'   => esc_html__( 'Order', 'carrental' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'carrental' ),
                    'DESC' => esc_html__( 'DESC', 'carrental' ),
                ],
                'default' => 'DESC',
            ]
        );

        $this->end_controls_section();

        //----- Tab item
        $this->start_controls_section(
			'cars_tab_content_style_section',
			[
				'label' => __( 'Tab Item', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->start_controls_tabs(
            'car_tab_item_normal_and_active_style_tabs'
        );

        // default style
        $this->start_controls_tab(
            'car_tab_item_normal_style_tab',
            [
                'label' => esc_html__( 'Normal', 'carrental' ),
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'car_tab_content_typography',
				'label' => __( 'Typography', 'carrental' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .xs-car-vehicles .vehicle-tab-nav > li > a,{{WRAPPER}}  .horizontal_car_tab_gallery-title',
			]
        );

        $this->add_responsive_control(
			'car_tab_item_title_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .vehicle-tab-nav > li > a, {{WRAPPER}}  .horizontal_car_tab_gallery-title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_responsive_control(
			'car_tab_item_title__background',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .vehicle-tab-nav > li' => 'background-color: {{VALUE}}',
                ],
                "condition" => [
                    "cars_tab_styles" => "vertical_tab_style"
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'car_tab_horizontal_item_title_normal_background',
				'label' => __( 'Background', 'carrental' ),
				'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .horizontal_car_tab_gallery-title',
                "condition" => [
                    "cars_tab_styles!" => "vertical_tab_style"
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'car_tab_horizontal_item_title_normal_box_shadow',
				'label' => __( 'Box Shadow', 'carrental' ),
                'selector' => '{{WRAPPER}} .horizontal_car_tab_gallery-title',
                "condition" => [
                    "cars_tab_styles!" => "vertical_tab_style"
                ]
			]
		);

        $this->end_controls_tab();

        // active
        $this->start_controls_tab(
            'car_tab_item_active_style_tab',
            [
                'label' => esc_html__( 'Active', 'carrental' ),
            ]
        );

        $this->add_responsive_control(
			'car_tab_item_title_active_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .vehicle-tab-nav > li.active > a, {{WRAPPER}} .swiper-slide-thumb-active .horizontal_car_tab_gallery-title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_responsive_control(
			'car_tab_item_title_active_background',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .vehicle-tab-nav > li.active, {{WRAPPER}} .xs-car-vehicles .vehicle-tab-nav > li > span' => 'background-color: {{VALUE}}',
                ],
                "condition" => [
                    "cars_tab_styles" => "vertical_tab_style"
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'car_tab_item_title_active_text_shadow',
				'label' => __( 'Text Shadow', 'carrental' ),
                'selector' => '{{WRAPPER}} .xs-car-vehicles .vehicle-tab-nav > li.active > a',
                "condition" => [
                    "cars_tab_styles" => "vertical_tab_style"
                ]
			]
		);

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'car_tab_horizontal_item_title_active_background',
				'label' => __( 'Background', 'carrental' ),
				'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .swiper-slide-thumb-active .horizontal_car_tab_gallery-title',
                "condition" => [
                    "cars_tab_styles!" => "vertical_tab_style"
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'car_tab_horizontal_item_title_active_box_shadow',
				'label' => __( 'Box Shadow', 'carrental' ),
                'selector' => '{{WRAPPER}} .swiper-slide-thumb-active .horizontal_car_tab_gallery-title',
                "condition" => [
                    "cars_tab_styles!" => "vertical_tab_style"
                ]
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();


        // ---- Slider navigation
        $this->add_control(
			'car_tab_item_header_one',
			[
				'label' => __( 'Slider Navigation', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->start_controls_tabs(
            'car_tab_slider_nav_normal_and_active_style_tabs'
        );

        // default style
        $this->start_controls_tab(
            'car_tab_slider_nav_normal_style_tab',
            [
                'label' => esc_html__( 'Normal', 'carrental' ),
            ]
        );

        $this->add_responsive_control(
			'car_tab_slider_nav__color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .vehicle-nav-control > a,{{WRAPPER}}  .horizontal_car_tab_button' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_responsive_control(
			'car_tab_slider_nav__background',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .vehicle-nav-control > a, {{WRAPPER}}  .horizontal_car_tab_button' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_tab();

        // active
        $this->start_controls_tab(
            'car_tab_slider_nav_active_style_tab',
            [
                'label' => esc_html__( 'Hover', 'carrental' ),
            ]
        );

        $this->add_responsive_control(
			'car_tab_slider_nav__active_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .vehicle-nav-control > a:hover,{{WRAPPER}}  .horizontal_car_tab_button:not(.swiper-button-disabled):hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_responsive_control(
			'car_tab_slider_nav__active_background',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .vehicle-nav-control > a:hover,{{WRAPPER}}  .horizontal_car_tab_button:not(.swiper-button-disabled):hover' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // --- SLider content
        $this->start_controls_section(
			'car_slider_content',
			[
				'label' => __( 'Slider Content', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'car_slider_content_header_one',
			[
				'label' => __( 'Price', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'car_slider_content_pricing_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .vehicle-price,{{WRAPPER}} .vehicle-prices' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'car_slider_content_pricing_divider_color',
			[
				'label' => __( 'Divider Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vehicle-prices' => 'border-bottom-color: {{VALUE}}',
                ],
                "condition" => [
                    "cars_tab_styles!" => "vertical_tab_style"
                ]
			]
		);

		$this->add_responsive_control(
			'car_slider_content_pricing_background_color',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .vehicle-price' => 'background-color: {{VALUE}}',
                ],
                "condition" => [
                    "cars_tab_styles" => "vertical_tab_style"
                ]
			]
        );

        $this->add_control(
			'car_slider_content_header_two',
			[
				'label' => __( 'Details', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_responsive_control(
			'car_slider_content_details_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vehicle-features > tbody > tr > td,{{WRAPPER}} .car-details > li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'car_slider_content_pricing_border_color',
			[
				'label' => __( 'Border Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vehicle-features > tbody > tr > td' => 'border-color: {{VALUE}}',
                ],
                "condition" => [
                    "cars_tab_styles" => "vertical_tab_style"
                ]
			]
        );

        $this->end_controls_section();

        // ---- Button
        $this->start_controls_section(
			'car_content_button_style_tab',
			[
				'label' => __( 'Button', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        // ---- Button hover and normal
        $this->start_controls_tabs(
            'car_button_normal_and_hover_tabs'
        );

        // --- Normal
        $this->start_controls_tab(
            'car_button_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'carrental' ),
            ]
        );

        $this->add_responsive_control(
			'car_button_normal_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .reserve-button,{{WRAPPER}} .gradient-button' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'car_button_normal_bg_color',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .reserve-button' => 'background-color: {{VALUE}}',
                ],
                "condition" => [
                    "cars_tab_styles" => "vertical_tab_style"
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'car_button_horizontal_normal_background',
				'label' => __( 'Background', 'carrental' ),
				'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .gradient-button',
                "condition" => [
                    "cars_tab_styles!" => "vertical_tab_style"
                ]
			]
		);

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'car_button_normal_box_shadow',
				'label' => __( 'Box Shadow', 'carrental' ),
				'selector' => '{{WRAPPER}} .xs-car-vehicles .reserve-button, {{WRAPPER}} .gradient-button',
			]
        );

        $this->end_controls_tab();

        // --- Hover
        $this->start_controls_tab(
            'car_button_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'carrental' ),
            ]
        );

        $this->add_responsive_control(
			'car_button_hover_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .reserve-button,{{WRAPPER}} .gradient-button:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'car_button_horizontal_active_background',
				'label' => __( 'Background', 'carrental' ),
				'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .gradient-button::before',
                "condition" => [
                    "cars_tab_styles!" => "vertical_tab_style"
                ]
			]
		);

        $this->add_responsive_control(
			'car_button_hover_bg_color',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-car-vehicles .reserve-button:hover' => 'background-color: {{VALUE}}',
                ],
                "condition" => [
                    "cars_tab_styles" => "vertical_tab_style"
                ]
			]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        // ---- Button link hover and normal
        $this->start_controls_tabs(
            'car_button_link_normal_and_hover_tabs',
            [
                "separator" => "before",
                "condition" => [
                    "cars_tab_styles!" => "vertical_tab_style"
                ]
            ]
        );

        // --- Normal
        $this->start_controls_tab(
            'car_button_link_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'carrental' ),
            ]
        );

        $this->add_responsive_control(
			'car_button_link_normal_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-link' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_tab();

        // --- Hover
        $this->start_controls_tab(
            'car_button_link_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'carrental' ),
            ]
        );

        $this->add_responsive_control(
			'car_button_link_hover_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-link:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

		$this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();

        extract($settings);

        $query = array(
            'post_type'      => 'xs-cars',
            'post_status'    => 'publish',
            'posts_per_page' => $car__posts_num,
            'offset'         => $car__offset,
            'orderby'        => $car__posts_order_by,
            'order'          => $car__posts_sort,
        );

        if(!empty($cars__cat)){
            $query['tax_query'] = array(
                array(
                    'taxonomy' => 'xs-cars-category',
                    'terms' => $cars__cat,
                    'field' => 'id',
                )
            );
		}

        $cars = new \WP_Query($query);
        if ($cars->have_posts()) {
            include CARRENTAL_SHORTCODE_DIR_WIDGETS.'/cars/style/'.$cars_tab_styles.'.php';
        }
        wp_reset_postdata();
    }

    protected function _content_template() { }

    public function getCategories(){
        $terms = get_terms( array(
            'taxonomy'    => 'xs-cars-category',
            'hide_empty'  => false,
            'posts_per_page' => -1,
        ));


        $cat_list = [];
        if(is_array($terms) && '' != $terms) {
            foreach($terms as $post) {
                $cat_list[$post->term_id]  = [$post->name];
            }
        };
        return $cat_list;
    }
}
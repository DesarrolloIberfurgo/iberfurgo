<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class CarRental_Banner_Widget extends Widget_Base {

    public function get_name() {
        return 'carrental-banner';
    }

    public function get_title() {
        return esc_html__( 'CarRental Banner', 'carrental' );
    }

    public function get_icon() {
        return 'eicon-slides';
    }

    public function get_categories() {
        return [ 'carrental-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
			'cars_banner_content_section',
			[
				'label' => __( 'Content', 'carrental' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        // ---- Slider icon
        $this->start_controls_tabs(
            'car_banner_slider_left_and_right_icon_tabs'
        );

        // --- Left
        $this->start_controls_tab(
            'car_banner_slider_icon_left_tab',
            [
                'label' => esc_html__( 'Icon Left', 'carrental' ),
            ]
        );

        $this->add_control(
			'car_banner_slider_left_icon',
			[
				// 'label'       => __( 'Icon', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-chevron-left',
                "label_block" => true
			]
		);

        $this->end_controls_tab();

        // --- Right
        $this->start_controls_tab(
            'car_banner_slider_right_icon_tab',
            [
                'label' => esc_html__( 'Icon Right', 'carrental' ),
            ]
        );

        $this->add_control(
			'car_banner_slider_right_icon',
			[
				// 'label'       => __( 'Icon', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-chevron-right',
                "label_block" => true
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $repeater = new Repeater();

		$repeater->add_control(
			'car_banner_title', [
				'label' => __( 'Title', 'carrental' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Luxury car from from $28 day' , 'carrental' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'car_banner_subtitle', [
				'label' => __( 'Sub Title', 'carrental' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Treat yourself in USA' , 'carrental' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'car_banner_image',
			[
				'label' => __( 'Choose Image', 'carrental' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'car_banner_content_lists',
			[
				'label' => __( 'Repeater List', 'carrental' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'car_banner_title' => __( 'Luxury car from from $28 day', 'carrental' ),
						'car_banner_subtitle' => __( 'Treat yourself in USA', 'carrental' ),
					],
					[
						'car_banner_title' => __( 'GET 15% OFF YOUR RENTAL', 'carrental' ),
						'car_banner_subtitle' => __( 'Plan your trip now', 'carrental' ),
					],
				],
				'title_field' => '{{{ car_banner_title }}}',
			]
		);

        $this->end_controls_section();

        // --- Slider content
        $this->start_controls_section(
			'car_banner_content_section_style_tab',
			[
				'label' => __( 'Content', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        // --- Title
        $this->add_control(
			'car_banner_content_heading_one',
			[
				'label' => __( 'Title', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'car_banner_title_content_typography',
				'label' => __( 'Typography', 'carrental' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .banner-slider-content .slider-title',
			]
        );

        $this->add_responsive_control(
			'car_banner_title_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-slider-content .slider-title' => 'color: {{VALUE}}',
				],
			]
		);

        // --- Sub Title
        $this->add_control(
			'car_banner_content_heading_two',
			[
				'label' => __( 'Subtitle', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'car_banner_subtitle_content_typography',
				'label' => __( 'Typography', 'carrental' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .banner-slider-content .slider-subtitle',
			]
        );

        $this->add_responsive_control(
			'car_banner_subtitle_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-slider-content .slider-subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'car_banner_subtitle_margin',
			[
				'label' => __( 'Margin', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .banner-slider-content .slider-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// --- Car image
        $this->add_control(
			'car_banner_content_heading_three',
			[
				'label' => __( 'Image', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'car_banner_car_image_margin',
			[
				'label' => __( 'Margin', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .banner-slider-content .car-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        // --- Navigation
        $this->start_controls_section(
			'car_banner_navigation_style_tab',
			[
				'label' => __( 'Navigation', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'car_banner_navigation__font_size',
			[
				'label' => __( 'Font Size', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .banner-slider-navigation' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'car_banner_navigation__color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-slider-navigation' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'label' => __( 'Text Shadow', 'carrental' ),
				'selector' => '{{WRAPPER}} .banner-slider-navigation',
			]
		);

		$this->add_responsive_control(
			'car_banner_navigation_stroke_color',
			[
				'label' => __( 'Stroke Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
			]
        );

        // --- Hover
        $this->add_control(
			'car_banner_nav_heading_one',
			[
				'label' => __( 'Hover', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_responsive_control(
			'car_banner_navigation__color_hover',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-slider-navigation:hover' => 'color: {{VALUE}}',
				],
			]
        );

		$this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();

        extract($settings);
        ?>
        <div class="swiper-container car-banner-slider-wraper">
            <div class="swiper-wrapper">
                <?php foreach ($car_banner_content_lists as $key => $value) { ?>
                <div class="swiper-slide">
                    <div class="banner-slider-content">
                        <h2 class="slider-title"><?php echo esc_html( $value['car_banner_title'] ); ?></h2>
                        <h3 class="slider-subtitle"><?php echo esc_html( $value['car_banner_subtitle'] ); ?> </h3>
                        <div class="car-img">
                            <img src="<?php echo esc_attr( $value['car_banner_image']['url'] ); ?>" alt="<?php echo esc_attr( $value['car_banner_title'] ); ?>">
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- Add Arrows -->
            <div class="banner-navigation-wraper">
				<div class="banner-button-prev banner-slider-navigation" style="--stroke_color: <?php echo esc_attr( $car_banner_navigation_stroke_color ); ?>">
                    <i class="<?php echo esc_attr( $car_banner_slider_left_icon ); ?>"></i>
                </div>
                <div class="banner-button-next banner-slider-navigation" style="--stroke_color: <?php echo esc_attr( $car_banner_navigation_stroke_color ); ?>">
                    <i class="<?php echo esc_attr( $car_banner_slider_right_icon ); ?>"></i>
                </div>
            </div>
        </div>
        <?php
    }

    protected function _content_template() { }
}
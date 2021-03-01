<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class CarRental_Maps_Widget extends Widget_Base {

    public function get_name() {
        return 'carrental-maps';
    }

    public function get_title() {
        return esc_html__( 'CarRental Maps', 'carrental' );
    }

    public function get_icon() {
        return 'eicon-google-maps';
    }

    public function get_categories() {
        return [ 'carrental-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
			'section_map',
			[
				'label' => __( 'Map', 'carrental' ),
			]
		);

		$this->add_control(
			'maps__title',
			[
				'label'       => __( 'Title', 'carrental' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Car Rental Locations', 'carrental' ),
				'placeholder' => __( 'Type your title here', 'carrental' ),
				"label_block" => true
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'address_list_title', [
				'label' => __( 'Title', 'carrental' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'carrental' ),
				'label_block' => true,
			]
        );

        $default_address = __( 'London Eye, London, United Kingdom', 'carrental' );
		$repeater->add_control(
			'map_address',
			[
				'label' => __( 'Location', 'carrental' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => $default_address,
				'label_block' => true,
			]
		);

		$this->add_control(
			'address_lists',
			[
				'label' => __( 'Address Lists', 'carrental' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'address_list_title' => __( 'London', 'carrental' ),
						'map_address'        => __( $default_address, 'carrental' ),
					],
					[
                        'address_list_title' => __( 'New York', 'carrental' ),
                        'map_address'        => __( "New York", 'carrental' ),
					],
				],
				'title_field' => '{{{ address_list_title }}}',
			]
		);

		$this->add_control(
			'zoom',
			[
				'label' => __( 'Zoom', 'carrental' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'label' => __( 'Height', 'carrental' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 40,
						'max' => 1440,
					],
				],
				'selectors' => [
					'{{WRAPPER}} iframe' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'carrental' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		// --- Container
		$this->start_controls_section(
			'car_map_content_container',
			[
				'label' => __( 'Container', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'car_map_content_container_background',
				'label' => __( 'Background', 'carrental' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .location-map-container',
			]
		);

		$this->add_responsive_control(
			'car_map_content_container_padding',
			[
				'label' => __( 'Padding', 'carrental' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', ],
				'selectors' => [
					'{{WRAPPER}} .location-map-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ---- Title
		$this->start_controls_section(
			'car_map_title_style_tab',
			[
				'label' => __( 'Title', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'car_map_title_content_typography',
				'label' => __( 'Typography', 'carrental' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .location-title',
			]
		);

		$this->add_responsive_control(
			'car_map_title_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .location-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();


		// ---- Dropdown list
		$this->start_controls_section(
			'car_map_dropdown_list_style_tab',
			[
				'label' => __( 'Dropdown List', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'car_map_dropdown_lsit_content_typography',
				'label' => __( 'Typography', 'carrental' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .xs--select',
			]
		);

		$this->add_responsive_control(
			'car_map_dropdown_list_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs--select' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		// --- Map
		$this->start_controls_section(
			'section_map_style',
			[
				'label' => __( 'Map', 'carrental' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'map_filter' );

		$this->start_controls_tab( 'normal',
			[
				'label' => __( 'Normal', 'carrental' ),
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} iframe',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => __( 'Hover', 'carrental' ),
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters_hover',
				'selector' => '{{WRAPPER}}:hover iframe',
			]
		);

		$this->add_control(
			'hover_transition',
			[
				'label' => __( 'Transition Duration', 'carrental' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} iframe' => 'transition-duration: {{SIZE}}s',
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

		if ( 0 === absint( $settings['zoom']['size'] ) ) {
			$settings['zoom']['size'] = 10;
		}

        ?>
        <div class="car-rental-maps">
			<div class="location-map-container">
				<div class="row align-items-center">
					<?php if ("" != $maps__title) { ?>
					<div class="col-lg-6">
						<h2 class="location-title"><?php echo esc_html( $maps__title ); ?></h2>
					</div>
					<!-- /col-lg-6 -->
					<?php }?>
					<div class="col-lg-<?php echo esc_attr( "" == $maps__title ? "12" : "6"); ?>">
						<select class="xs--select xs-map-select">
							<?php
								foreach ($address_lists as $key => $value) {
									?>
									<option value="<?php echo esc_attr( $value['map_address'] ); ?>">
										<?php
											if ("" != $value['address_list_title']) {
												echo esc_html( $value["address_list_title"] );
											} else {
												echo esc_html($value['map_address']);
											}
										?>
									</option>
								<?php }
							?>
						</select>
					</div>
					<!-- /col-lg-<?php echo esc_attr( "" == $maps__title ? "12" : "6"); ?> -->
				</div><!-- /row -->
			</div><!-- /location-map-container -->
			<div class="map-container">
				<iframe data-zoom="<?php echo esc_attr( $settings['zoom']['size'] )?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
			</div><!-- /map-container -->
		</div><!-- /car-rental-maps -->
        <?php
    }

    protected function _content_template() { }
}
<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class CarRental_Back_To_Top_Widget extends Widget_Base {

    public function get_name() {
        return 'carrental-back-to-top';
    }

    public function get_title() {
        return esc_html__( 'CarRental Back To Top', 'carrental' );
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return [ 'carrental-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
			'back_to_top_content_section',
			[
				'label' => __( 'Back to top', 'carrental' ),
			]
        );

        $this->add_control(
			'car_back_to_top_icon',
			[
				'label'       => __( 'Social Icons', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-chevron-up',
                "label_block" => true
			]
		);

        $this->end_controls_section();

        // --- Back top top container
        $this->start_controls_section(
			'car_back_to_top_container_style_tab',
			[
				'label' => __( 'Content', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'car_back_to_top_content_heading_one',
			[
				'label' => __( 'Normal', 'carrental' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'car_back_to_top_container_background',
				'label' => __( 'Background', 'carrental' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .scrollup',
			]
        );

        $this->add_responsive_control(
			'car_back_to_top_container_icon_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .scrollup' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'car_back_to_top_container_border_color',
			[
				'label' => __( 'Border Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .scrollup' => 'border-color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'car_back_to_top_content_heading_two',
			[
				'label' => __( 'Hover', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'car_back_to_top_container_background_hover',
				'label' => __( 'Background', 'carrental' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .scrollup:hover',
			]
        );

        $this->add_responsive_control(
			'car_back_to_top_container_icon_color_hover',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .scrollup:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'car_back_to_top_container_border_color_hover',
			[
				'label' => __( 'Border Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .scrollup:hover' => 'border-color: {{VALUE}}',
				],
			]
        );

		$this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings_for_display();

        extract($settings);
        ?>
        <div class="car_back_to_top">
            <a href="#" class="scrollup">
                <i class="<?php echo esc_attr( $car_back_to_top_icon ); ?>"></i>
            </a>
        </div>
        <?php
    }

    protected function _content_template() { }
}
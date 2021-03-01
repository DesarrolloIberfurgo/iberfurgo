<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class CarRental_Reservation_Widget extends Widget_Base {

    public function get_name() {
        return 'carrental-reservation';
    }

    public function get_title() {
        return esc_html__( 'CarRental Reservation', 'carrental' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'carrental-elements' ];
    }

    function xs_metform_forms_options() {
		$query = [
			'post_type'      => 'metform-form',
            'post_status'    => 'publish',
		];


		$met_form = new \WP_Query($query);
		$form_options = [];

		if ($met_form->have_posts()) {
			$form_options  = ['0' => esc_html__( 'Select Form', 'carrental' )];
			while($met_form->have_posts()) {
				$met_form->the_post();
				$form_options[get_the_ID()] = get_the_title();
			}
		} else {
			$form_options = ['0' => esc_html__( 'Form Not Found!', 'carrental' ) ];
		}

		return $form_options;
	}

    protected function _register_controls() {
        $this->start_controls_section(
			'section_reservation',
			[
				'label' => __( 'Reservation', 'carrental' ),
			]
        );

        $this->add_control(
			'reservation_form_style',
			[
				'label' => __( 'Style', 'carrental' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'stack_style',
				'options' => [
					'stack_style'  => __( 'Stack Style', 'carrental' ),
					'inline_form_style' => __( 'Inline Style', 'carrental' ),
				],
			]
		);

        $this->add_control(
			'car_reservation_modal_form_list',
			[
				'label'   => esc_html__( 'Select Modal Form', 'carrental' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '0',
				'label_block' => true,
				'options' => $this->xs_metform_forms_options(),
			]
		);

		$this->add_control(
			'reservation_form_car_type_title',
			[
				'label'       => __( 'Car Title', 'carrental' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Select Your Car Type', 'carrental' ),
                'placeholder' => __( 'Type your title here', 'carrental' ),
                'label_block' => true,
			]
		);

		$this->add_control(
			'reservation_form_car_icon',
			[
				'label'       => __( 'Car Icon', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-car',
                "label_block" => true
			]
        );


		$this->add_control(
			'reservation_form_button_title',
			[
				'label'       => __( 'Button Title', 'carrental' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'CONTINUE CAR RESERVATION', 'carrental' ),
                'placeholder' => __( 'Type your title here', 'carrental' ),
                'label_block' => true,
			]
		);

        // ---- Drop of and pickup
        $this->start_controls_tabs(
            'car_dropof_and_pickup_content_tabs'
        );

        // --- Pickup
        $this->start_controls_tab(
            'car_pickup_content_tab',
            [
                'label' => esc_html__( 'Pick-up', 'carrental' ),
            ]
        );

        $this->add_control(
			'car_pickup_title', [
				'label' => __( 'Title', 'carrental' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Pick-up' , 'carrental' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'car_pickup_icon',
			[
				'label'       => __( 'Location Icon', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-map-marker',
                "label_block" => true
			]
        );

        $this->add_control(
			'car_pickup_date_icon',
			[
				'label'       => __( 'Date Icon', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-calendar',
                "label_block" => true
			]
        );

        $pickup = new Repeater();

		$pickup->add_control(
			'pickup_point', [
				'label' => __( 'Title', 'carrental' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Santa Monica - 2102 Lincoln Blvd' , 'carrental' ),
				'label_block' => true,
			]
        );

		$this->add_control(
			'pickup_points',
			[
				'label' => __( 'Pick-up List', 'carrental' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $pickup->get_controls(),
				'default' => [
					[
						'pickup_point' => __( 'Santa Monica - 2102 Lincoln Blvd', 'carrental' ),
					],
					[
						'pickup_point' => __( 'Los Angeles - 5711 W Century Blvd', 'carrental' ),
					],
					[
						'pickup_point' => __( 'Las Vegas - 6401 Centennial Center Blvd', 'carrental' ),
					],
				],
				'title_field' => '{{{ pickup_point }}}',
			]
		);

        $this->end_controls_tab();

        // --- Drop-off
        $this->start_controls_tab(
            'car_dropof_content_tab',
            [
                'label' => esc_html__( 'Drop-off', 'carrental' ),
            ]
        );

        $this->add_control(
			'car_dropof_title', [
				'label' => __( 'Title', 'carrental' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Drop-off' , 'carrental' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'car_dropof_icon',
			[
				'label'       => __( 'Location Icon', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-map-marker',
                "label_block" => true
			]
        );

        $this->add_control(
			'car_dropof_date_icon',
			[
				'label'       => __( 'Date Icon', 'carrental' ),
				'type'        => Controls_Manager::ICON,
                'default'     => 'fa fa-calendar',
                "label_block" => true
			]
        );

        $dropof = new Repeater();

		$dropof->add_control(
			'dropof_point', [
				'label' => __( 'Title', 'carrental' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '3669  Oliver Street Wedgwood Texas' , 'carrental' ),
				'label_block' => true,
			]
        );

		$this->add_control(
			'dropof_points',
			[
				'label' => __( 'Drop-off List', 'carrental' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $dropof->get_controls(),
				'default' => [
					[
						'dropof_point' => __( '3669  Oliver Street Wedgwood Texas', 'carrental' ),
					],
					[
						'dropof_point' => __( '330  Hornor Avenue Kiefer Oklahoma', 'carrental' ),
					],
					[
						'dropof_point' => __( '3240  Timbercrest Road SAN PEDRO California', 'carrental' ),
					],
				],
				'title_field' => '{{{ dropof_point }}}',
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        // ---- Modal Settings
        $this->start_controls_section(
			'car_reservation_modal_content',
			[
				'label' => __( 'Modal', 'carrental' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'modal_heading_title',
			[
				'label' => __( 'Header Title', 'carrental' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Complete reservation', 'carrental' ),
                'placeholder' => __( 'Type your title here', 'carrental' ),
                'label_block' => true
			]
		);

		$this->add_control(
			'modal_checkout_info_title',
			[
				'label' => __( 'Checkout info', 'carrental' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Upon completing this reservation enquiry, you will receive:::', 'carrental' ),
                'placeholder' => __( 'Type your title here', 'carrental' ),
                'label_block' => true
			]
		);

        $this->add_control(
			'modal_checkout_info_item_description',
			[
				'label' => __( 'Description', 'carrental' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'Your rental voucher to produce on arrival at the rental desk and a toll-free customer support number.', 'carrental' ),
				'placeholder' => __( 'Type your description here', 'carrental' ),
			]
		);

        $this->end_controls_section();

        // --- Input
        $this->start_controls_section(
			'car_reservation_input_control',
			[
				'label' => __( 'Input', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'car_reservation_input_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .car-select,{{WRAPPER}} .location .xs--select,{{WRAPPER}} .reservation-inline-style .reservation-input-group' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'car_reservation_input_bg',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs--select,{{WRAPPER}} .rental-datetime .datepicker,{{WRAPPER}} .reservation-inline-style .reservation-input-group' => 'background-color: {{VALUE}}',
				],
			]
        );

		$this->add_responsive_control(
			'car_reservation_input_border_color',
			[
				'label' => __( 'Border Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs--select,{{WRAPPER}} .rental-datetime .datepicker' => 'border-color: {{VALUE}}',
				],
			]
        );

        // --- Group addon
        $this->add_control(
			'car_reservation_input_heading_one',
			[
				'label' => __( 'Group Addon', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'reservation_form_style' => 'stack_style'
				]
			]
		);

		$this->add_responsive_control(
			'car_reservation_input_group_addon_bg',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .car-select-form .input-group-addon' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'reservation_form_style' => 'stack_style'
				]
			]
		);

		$this->add_responsive_control(
			'car_reservation_input_group_addon_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .car-select-form .input-group-addon' => 'color: {{VALUE}}',
				],
				'condition' => [
					'reservation_form_style' => 'stack_style'
				]
			]
        );

        //--- Date and time
        $this->add_control(
			'car_reservation_input_heading_two',
			[
				'label' => __( 'Date and time', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_responsive_control(
			'car_reservation_input_location_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rental-datetime .datepicker,{{WRAPPER}} .rental-datetime .xs--select' => 'color: {{VALUE}}',
				],
			]
        );

        //--- Location
        $this->add_control(
			'car_reservation_input_heading_three',
			[
				'label' => __( 'Location', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_responsive_control(
			'car_reservation_input_location_color_2',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .location .xs--select, {{WRAPPER}} .pickup-and-dropoff-wraper .xs--select' => 'color: {{VALUE}}',
				],
			]
        );

		$this->end_controls_section();

		//-------------- Content
        $this->start_controls_section(
			'car_reservation_form_title_style_tab',
			[
				'label' => __( 'Title', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'reservation_form_style' => 'inline_form_style'
				]
			]
        );

		$this->add_responsive_control(
			'car_reservation_form_title__color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation-inline-style .input-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'car_reservation_form_title_typography',
				'label' => __( 'Typography', 'carrental' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .reservation-inline-style .input-label',
			]
		);

		$this->add_responsive_control(
			'car_reservation_form_title_icon_color',
			[
				'label' => __( 'Icon Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation-inline-style .input-label>i' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

        //-------------- Button
        $this->start_controls_section(
			'car_reservation_form_button_style_tab',
			[
				'label' => __( 'Button', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        // ---- Button normal and hover
        $this->start_controls_tabs(
            'car_reservation_form_button_normal_and_hover_style_tabs'
        );

        // --- Normal
        $this->start_controls_tab(
            'car_reservation_form_button_normal_style_tab',
            [
                'label' => esc_html__( 'Normal', 'carrental' ),
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'car_reservation_form_button_typography',
				'label' => __( 'Typography', 'carrental' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .car-select-form .btn',
			]
		);

		$this->add_responsive_control(
			'car_reservation_form_button_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .car-select-form .btn' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'car_reservation_form_button_background',
				'label' => __( 'Background', 'carrental' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .car-select-form .btn',
			]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'car_reservation_form_button_box_shadow',
				'label' => __( 'Box Shadow', 'carrental' ),
				'selector' => '{{WRAPPER}} .car-select-form .btn',
			]
        );

        $this->end_controls_tab();

        // --- Hover
        $this->start_controls_tab(
            'car_reservation_form_button_hover_style_tab',
            [
                'label' => esc_html__( 'Hover', 'carrental' ),
            ]
        );

		$this->add_responsive_control(
			'car_reservation_form_button_color_hover',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .car-select-form .btn:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'car_reservation_form_button_background_hover',
				'label' => __( 'Background', 'carrental' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .car-select-form .btn:hover',
			]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // --- Modal
        $this->start_controls_section(
			'car_reservation_modal_style_tab',
			[
				'label' => __( 'Modal', 'carrental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        // --- Header
        $this->add_control(
			'car_reservation_modal_heading_one',
			[
				'label' => __( 'Header', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'car_reservation_modal_header_background',
				'label' => __( 'Background', 'carrental' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .modal-header',
			]
        );

        $this->add_control(
			'car_reservation_modal_header__color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .modal-header' => 'color: {{VALUE}}',
				],
			]
        );

        //--- Header info box
        $this->add_control(
			'car_reservation_modal_heading_two',
			[
				'label' => __( 'Header Info', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_control(
			'car_reservation_modal_header_info_color',
			[
				'label' => __( 'Title Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation_modal .checkout-info-title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'car_reservation_modal_header_info_desc_color',
			[
				'label' => __( 'Description Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation_modal .checkout-info-desc' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'car_reservation_modal_header_info_background',
				'label' => __( 'Background', 'carrental' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .reservation_modal .checkout-info-box',
			]
        );

        // --- Modal title
        $this->add_control(
			'car_reservation_modal_heading_three',
			[
				'label' => __( 'Modal Title', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_control(
			'car_reservation_modal_header_title_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation_modal .reservation-infobox-heading' => 'color: {{VALUE}}',
				],
			]
        );


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'car_reservation_modal_header_title_typography',
				'label' => __( 'Typography', 'carrental' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .reservation_modal .reservation-infobox-heading',
			]
        );

        // --- BUtton
        $this->add_control(
			'car_reservation_modal_heading_four',
			[
				'label' => __( 'Button', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'car_reservation_modal_cancel_and_reserve_typography',
				'label' => __( 'Typography', 'carrental' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .reservation_modal .caldera-grid .btn',
			]
		);

        // ---- Cancel and reserve button
        $this->start_controls_tabs(
            'car_reservation_modal_cancel_and_reserve_button_style_tabs'
        );

        // --- Cancel
        $this->start_controls_tab(
            'car_reservation_modal_cancel_button_style_tab',
            [
                'label' => esc_html__( 'Button One', 'carrental' ),
            ]
        );

        $this->add_control(
			'car_reservation_modal_cancel_button_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn.btn-gray' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'car_reservation_modal_cancel_button_bg_color',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn.btn-gray' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn-gray' => 'border-color: {{VALUE}}',
				],
			]
        );

        // --- Hover
        $this->add_control(
			'car_reservation_modal_heading_five',
			[
				'label' => __( 'Hover', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_control(
			'car_reservation_modal_cancel_button_color_hover',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn.btn-gray:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'car_reservation_modal_cancel_button_bg_color_hover',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn.btn-gray:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn-gray:hover' => 'border-color: {{VALUE}}',
				],
			]
        );

        $this->end_controls_tab();

        // --- Reserve
        $this->start_controls_tab(
            'car_reservation_modal_reserve_button_style_tab',
            [
                'label' => esc_html__( 'Button Two', 'carrental' ),
            ]
        );

        $this->add_control(
			'car_reservation_modal_reserve_button_color',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn.btn-yellow' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'car_reservation_modal_reserve_button_bg_color',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn.btn-yellow' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn-yellow' => 'border-color: {{VALUE}}',
				],
			]
        );

        // --- Hover
        $this->add_control(
			'car_reservation_modal_heading_six',
			[
				'label' => __( 'Hover', 'carrental' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_control(
			'car_reservation_modal_reserve_button_color_hover',
			[
				'label' => __( 'Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn.btn-yellow:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'car_reservation_modal_reserve_button_bg_color_hover',
			[
				'label' => __( 'Background Color', 'carrental' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn.btn-yellow:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .reservation_modal .caldera-grid .btn-yellow:hover' => 'border-color: {{VALUE}}',
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
        );

        $reservation_modal_form = [
            'form_id' => $settings['car_reservation_modal_form_list'],
		];
        $this->add_render_attribute( 'modalForm', $reservation_modal_form );

        $cars = new \WP_Query($query);
        if ($cars->have_posts()) {
            include CARRENTAL_SHORTCODE_DIR_WIDGETS.'/reservation/style/'.$reservation_form_style.'.php';
        ?>
            <div class="modal reservation_modal fade" id="reservation_modal-<?php echo esc_attr($this->get_id()); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo esc_html( $modal_heading_title ); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="checkout-info-box">
                                <h3 class="checkout-info-title"><i class="fa fa-info-circle"></i> <?php echo esc_html( $modal_checkout_info_title ); ?></h3>
                                <p class="checkout-info-desc"><?php echo esc_html( $modal_checkout_info_item_description ); ?></p>
                            </div>
                            <!-- checkout-info-box -->
                            <div class="modal-body-inner">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="location-date-info">
                                            <h3 class="reservation-infobox-heading"><?php _e( 'Location & Date', 'carrental' ) ?></h3>
                                            <div class="info-box media">
                                                <span class="<?php echo esc_attr( $car_pickup_icon ); ?>"></span>
                                                <div class="media-body">
                                                    <h4 class="info-box-title"><?php _e( 'Pick-Up Time', 'carrental' ) ?></h4>
                                                    <p class="info-box-description"><span data-name="pick-up-date"></span> <span class="time-prefix"><?php _e( 'at', 'carrental') ?></span> <span data-name="pick-up-time"></span></p>
                                                </div>
                                            </div>
                                            <div class="info-box media">
                                                <span class="<?php echo esc_attr( $car_dropof_icon ); ?>"></span>
                                                <div class="media-body">
                                                    <h4 class="info-box-title"><?php _e( 'Drop-Off Time', 'carrental' ) ?></h4>
                                                    <p class="info-box-description"><span data-name="drop-off-date"></span> <span class="time-prefix"><?php _e( 'at', 'carrental') ?></span>  <span data-name="drop-off-time"></span></p>
                                                </div>
                                            </div>
                                            <div class="info-box media">
                                                <span class="<?php echo esc_attr( $car_pickup_date_icon ); ?>"></span>
                                                <div class="media-body">
                                                    <h4 class="info-box-title"><?php _e( 'Pick-Up Location', 'carrental' ) ?></h4>
                                                    <p class="info-box-description" data-name="pick-up-location"></p>
                                                </div>
                                            </div>
                                            <div class="info-box media">
                                                <span class="<?php echo esc_attr( $car_dropof_date_icon ); ?>"></span>
                                                <div class="media-body">
                                                    <h4 class="info-box-title"><?php _e( 'Drop-Off Location', 'carrental' ) ?></h4>
                                                    <p class="info-box-description" data-name="drop-off-location"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="vehicle-info">
                                            <h3 class="reservation-infobox-heading"><?php _e( 'CAR', 'carrental' ) ?>: <span class="selected-car-name"></span></h3>
                                            <input type="hidden" name="selected-car" value="">
                                            <div class="vehicle-image">
                                                <img class="img-responsive" data-name="car-select" src="" alt="Vehicle">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!--Checkout Rental Info end -->
                            </div>
                            <!-- modal-body-inner end -->
                            <!--Checkout Personal Info start -->
                            <div class="checkout-personal-info">
								<?php if(\Elementor\Plugin::$instance->editor->is_edit_mode() == true) { ?>
									<div class="alert alert-info" role="alert">
										<strong><?php echo esc_html__( '*** The form will show only in preview mode.', 'carrental' ) ?></strong>
									</div>
								<?php } else {
									if ( !$settings['car_reservation_modal_form_list'] ) { ?>
										<div class="alert alert-info">
											<strong><?php echo esc_html__( 'Please Select A From Setting!', 'carrental' ) ?></strong>
										</div>
									<?php
									} else {
										echo do_shortcode( sprintf( '[metform %s]', $this->get_render_attribute_string( 'modalForm' ) ) );
									}
								} ?>
                            </div>
                            <!--Checkout Personal Info end -->
                        </div>
                        <!-- modal-body -->
                    </div>
                </div>
            </div>
        <?php
        } else {
            ?>
            <div class="alert alert-danger">
                <strong><?php _e( 'Please Create Car First', 'carrental' ) ?></strong>
            </div>
            <?php
        }
        wp_reset_postdata();
    }

    protected function _content_template() { }
}
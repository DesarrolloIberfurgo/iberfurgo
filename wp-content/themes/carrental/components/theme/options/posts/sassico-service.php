<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * metabox options for pages
 */

$options = array(
    'settings_sassico_service_banner' => array(
        'title'		 => esc_html__( 'Service banner settings', 'sassico' ),
        'type'		 => 'box',
        'priority'	 => 'high',
        'options'	 => array(
            'header_title'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Banner title', 'sassico' ),
				'desc'	 => esc_html__( 'Add your Page hero title', 'sassico' ),
			),
			'header_image'	 => array(
				'label'	 => esc_html__( 'Banner image', 'sassico' ),
				'desc'	 => esc_html__( 'Upload a page header image', 'sassico' ),
				'help'	 => esc_html__( "This default header image will be used for all your service.", 'sassico' ),
				'type'	 => 'upload'
           ),
            'sub_header_menu'	 => array(
                'type'  => 'switch',
                'value' => 'no',
                'label' => esc_html__('Display sub header menu?', 'sassico'),
                'desc'  => esc_html__('Display sub menu', 'sassico'),
                'help'  => esc_html__('A menu will be displayed under Banner', 'sassico'),
                'left-choice' => array(
                    'value' => 'yes',
                    'label' => esc_html__('Yes', 'sassico'),
                ),
                'right-choice' => array(
                    'value' => 'no',
                    'label' => esc_html__('No', 'sassico'),
                ),
            ),
        ),
    ),
    'settings_sassico_service_one' => array(
        'title'		 => esc_html__( 'Service icon/image settings', 'sassico' ),
        'type'		 => 'box',
        'priority'	 => 'high',
        'options'	 => array(
            'sassico_service_icon_pickers'	 => array(
                'type'  => 'icon-v2',
                'preview_size' => 'medium',
                'modal_size' => 'medium',
                'label' => __('Image/Icon', 'sassico'),
                'desc'  => __('Add image/icon on service box', 'sassico'),
            ),
            'sassico_service_hover_image_picker'	 => array(
                'type'  => 'upload',
                'label' => __('Hover Background Image/Icon', 'sassico'),
                'desc'  => __('Add hover background image on service box', 'sassico'),
                'images_only' => true,
            ),
        ),
    ),
    'settings_sassico_service_style_two' => array(
        'title'		 => esc_html__( 'Service style two settings', 'sassico' ),
        'type'		 => 'box',
        'priority'	 => 'high',
        'options'	 => array(
            'sassico_service_box_highlight'	 => array(
                'type'  => 'switch',
                'value' => 'no',
                'label' => __('Featured', 'sassico'),
                'desc'  => __('This style only for shadow icon box and bubble service box', 'sassico'),
                'left-choice' => array(
                    'value' => 'no',
                    'label' => __('No', 'sassico'),
                ),
                'right-choice' => array(
                    'value' => 'yes',
                    'label' => __('Yes', 'sassico'),
                ),
            ),
            'sassico_icon_box_style_color' => array(
                'type'  => 'color-picker',
                'value' => '',
                'palettes' => array( '#ff518b', '#3bbeff', '#c656ff', '#ffa03a', '#15de9b', '#76a3ff' ),
                'label' => __('Color', 'sassico'),
                'desc'  => __('This style only for shadow icon box', 'sassico'),
            )
        ),
    ),

    'settings_sassico_service_style_three' => array(
        'title'		 => esc_html__( 'Service fat shadow style settings', 'sassico' ),
        'type'		 => 'box',
        'priority'	 => 'high',
        'options'	 => array(
            'sassico_service_details__footer_button_title'	=> array(
                'type'	 => 'text',
                'label'	 => esc_html__( 'Button title', 'sassico' ),
                'value' => 'KNOW MORE',
            ),
        ),
    ),

    'settings_sassico_service_single' => array(
        'title'		 => esc_html__( 'Service single settings', 'sassico' ),
        'type'		 => 'box',
        'priority'	 => 'high',
        'options'	 => array(
            'sassico_service_details__sub_title'	 => array(
                'type'	 => 'text',
                'label'	 => esc_html__( 'Project Sub Title', 'sassico' ),
                'value' => 'Overview',
            ),
            'sassico_service_details__title'	 => array(
                'type'	 => 'text',
                'label'	 => esc_html__( 'Project Title', 'sassico' ),
                'value' => 'About the Client',
            ),
            'sassico_service_details__exerpt'	 => array(
                'type'  => 'textarea',
                'value' => 'Convert your emails into tickets and keep them all organized in one place. Never leave customers\' questions unanswered.',
                'label' => __('Exerpt', 'sassico'),
            ),
            'sassico_service_details_client_site_text'	 => array(
                'type'	 => 'text',
                'label'	 => esc_html__( 'Site Text', 'sassico' ),
                'value'	 => esc_html__( 'View site', 'sassico' ),
            ),
            'sassico_service_details_client_site_uri'	 => array(
                'type'	 => 'text',
                'label'	 => esc_html__( 'Site URI', 'sassico' ),
                'value'	 => esc_html__( 'https://www.google.com/', 'sassico' ),
            ),
            'sassico_service_details_category'	 => array(
                'type'	 => 'text',
                'label'	 => esc_html__( 'Categories', 'sassico' ),
                'value' => 'Marketing Plan',
            ),
            'sassico_service_details_date'	 => array(
                'type'  => 'date-picker',
                'label' => __('Date', 'sassico'),
                'monday-first' => true, // The week will begin with Monday; for Sunday, set to false
            ),
            'sassico_service_details_client'	 => array(
                'type'	 => 'text',
                'label'	 => esc_html__( 'Client', 'sassico' ),
                'value' => 'Linglee',
            ),
            'sassico_service_details_client_social'	 => array(
                'type'  => 'switch',
                'value' => 'yes',
                'label' => __('Show Social', 'sassico'),
                'left-choice' => array(
                    'value' => 'no',
                    'label' => __('No', 'sassico'),
                ),
                'right-choice' => array(
                    'value' => 'yes',
                    'label' => __('Yes', 'sassico'),
                ),
            ),
        ),
    ),
);

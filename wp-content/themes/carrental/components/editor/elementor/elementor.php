<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class CarRental_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
    public static $_instance;


    /**
     * Localize data array
     *
     * @var array
     */
    public $localize_data = array();

	/**
     * Load Construct
     *
     * @since 1.0
     */

	public function __construct(){
        add_action('elementskit/loaded', [$this, 'init']);
    }


	public function init(){

        add_action('elementor/init', array($this, 'carrental_elementor_init'));
        add_action('elementor/controls/controls_registered', array( $this, 'carrental_elementor_init' ), 11 );
        add_action('elementor/widgets/widgets_registered', array($this, 'carrental_shortcode_elements'));
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_enqueue_scripts' ) );
	}


    /**
     * Enqueue Scripts
     *
     * @return void
     */

     public function enqueue_scripts() {
       wp_enqueue_script( 'carrental-main-elementor', CARRENTAL_JS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), CARRENTAL_VERSION, true );
    }

    /**
     * Enqueue editor styles
     *
     * @return void
     */


    /**
     * Preview Enqueue Scripts
     *
     * @return void
     */

    public function preview_enqueue_scripts() {}
	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function carrental_elementor_init(){
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'carrental-elements',
            [
                'title' =>esc_html__( 'Carrental', 'carrental' ),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }
    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void
     */

    public function carrental_icon_pack( $controls_manager ) {

        require_once CARRENTAL_EDITOR_ELEMENTOR. '/controls/icon.php';

        $controls = array(
            $controls_manager::ICON => 'CarRental_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }

    }

    public function carrental_shortcode_elements($widgets_manager){
        require_once CARRENTAL_EDITOR_ELEMENTOR.'/widgets/cars/cars.php';
        $widgets_manager->register_widget_type(new Elementor\CarRental_Cars_Widget());

        require_once CARRENTAL_EDITOR_ELEMENTOR.'/widgets/map/map.php';
        $widgets_manager->register_widget_type(new Elementor\CarRental_Maps_Widget());

        require_once CARRENTAL_EDITOR_ELEMENTOR.'/widgets/banner/banner.php';
        $widgets_manager->register_widget_type(new Elementor\CarRental_Banner_Widget());

        require_once CARRENTAL_EDITOR_ELEMENTOR.'/widgets/back-to-top/back-to-top.php';
        $widgets_manager->register_widget_type(new Elementor\CarRental_Back_To_Top_Widget());

        require_once CARRENTAL_EDITOR_ELEMENTOR.'/widgets/reservation/reservation.php';
        $widgets_manager->register_widget_type(new Elementor\CarRental_Reservation_Widget());
    }

	public static function carrental_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new CarRental_Shortcode();
        }
        return self::$_instance;
    }

}
CarRental_Shortcode::carrental_get_instance();

if(!defined('ELEMENTOR_PRO_VERSION')){
    add_action( 'elementor/editor/after_enqueue_styles', function() {
        wp_enqueue_style( 'xs-elementor-editor-panel',  CARRENTAL_CSS . '/elementor-editor-panel.css', null,  CARRENTAL_VERSION );
    });
}
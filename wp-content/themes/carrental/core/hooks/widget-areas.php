<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register widget area
 */

function carrental_widget_init()
{
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name' => esc_html__('Blog widget area', 'carrental'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Appears on posts.', 'carrental'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title">',
                'after_title' => '</h5>',
            )
        );
    }
}

add_action('widgets_init', 'carrental_widget_init');

if(defined('DEVM')) {


function footer_right_widgets_init(){
   if ( function_exists('register_sidebar') ){
   	//  Left sidebar
	   register_sidebar(array(
			   'name' => 'Footer Left',
			   'id' => 'footer-left',
			   'before_widget' => '<div class="footer-left-widget">',
			   'after_widget' => '</div>',
			   'before_title' => '<h5 class="widget-title">',
			   'after_title' => '</h5>',
		   )
	   );
	 // center sidebar
	register_sidebar(array(
		'name' => 'Footer Center',
		'id' => 'footer-center',
		'before_widget' => '<div class="footer-widget footer-center-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	));
    //  Footer right
	register_sidebar(array(
			'name' => 'Footer right',
			'id' => 'footer-right',
			'before_widget' => '<div class="footer-widget footer-right-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		)
	);
}}
add_action( 'widgets_init', 'footer_right_widgets_init' );

}

function woo_widgets(){
	if ( function_exists('register_sidebar') )
		register_sidebar(
			array(
				'name'			 => esc_html__( 'Woocommerce sidebar Area', 'carrental' ),
				'id'			 => 'sidebar-woo',
				'description'	 => esc_html__( 'Appears on posts and pages.', 'carrental' ),
				'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
				'after_widget'	 => '</div> <!-- end widget -->',
				'before_title'	 => '<h3 class="widget-title">',
				'after_title'	 => '</h3><span class="animate-border border-offwhite tw-mt-20"></span>',
			)
		);
}
if (  class_exists( 'WooCommerce', false ) ) {
	add_action( 'widgets_init', 'woo_widgets' );
}

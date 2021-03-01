<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue all theme scripts and styles
 */


// stylesheets
// ----------------------------------------------------------------------------------------

// Poppins:wght@600;700&family=Rubik:wght@400;500;700&display=swap
if ( !is_admin() ) {
	// 3rd party css
	wp_enqueue_style( 'fonts', carrental_google_fonts_url(['Lato:400,700,900,400italic,700italic,900italic&display=swap', 'Poppins:600,700', 'Rubik:400,500,700']), null,  CARRENTAL_VERSION );
	wp_enqueue_style( 'bootstrap',  CARRENTAL_CSS . '/bootstrap.min.css', null,  CARRENTAL_VERSION );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'font-awesome',  CARRENTAL_CSS . '/font-awesome.css', null,  CARRENTAL_VERSION );
	wp_enqueue_style( 'carrental-iconfont',  CARRENTAL_CSS . '/icon-font.css', null,  CARRENTAL_VERSION );

	// theme css
	wp_enqueue_style( 'carrental-blog',  CARRENTAL_CSS . '/blog.css', null,  CARRENTAL_VERSION );
	wp_enqueue_style( 'carrental-gutenberg-custom',  CARRENTAL_CSS . '/gutenberg-custom.css', null,  CARRENTAL_VERSION );
	wp_enqueue_style( 'datepicker',  CARRENTAL_CSS . '/datepicker.css', null,  CARRENTAL_VERSION );
	wp_enqueue_style( 'carrental-woo',  CARRENTAL_CSS . '/xs-woocommerce.css', null,  CARRENTAL_VERSION );
	wp_enqueue_style( 'carrental-master',  CARRENTAL_CSS . '/master.css', null,  CARRENTAL_VERSION );
}

// javascripts
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {

	// 3rd party scripts
	wp_enqueue_script( 'bootstrap',  CARRENTAL_JS . '/bootstrap.min.js', array( 'jquery' ),  CARRENTAL_VERSION, true );
	wp_enqueue_script( 'bootstrap-datepicker',  CARRENTAL_JS . '/bootstrap-datepicker.js', array( 'jquery' ),  CARRENTAL_VERSION, true );
	wp_enqueue_script( 'Popper',  CARRENTAL_JS . '/Popper.js', array( 'jquery' ),  CARRENTAL_VERSION, true );

	// theme scripts
	wp_enqueue_script( 'carrental-script',  CARRENTAL_JS . '/script.js', array( 'jquery' ),  CARRENTAL_VERSION, true );

	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
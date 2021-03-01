<?php

/**
 * theme's main functions and globally usable variables, contants etc
 * added: v1.0
 * textdomain: carrental, class: CARRENTAL, var: $carrental_, constants: CARRENTAL_, function: carrental_
 */

// shorthand contants
// ------------------------------------------------------------------------
define('CARRENTAL_THEME', 'CarRental WordPress Theme');
define('CARRENTAL_VERSION', time());
define('CARRENTAL_MINWP_VERSION', '4.3');


// shorthand contants for theme assets url
// ------------------------------------------------------------------------
define('CARRENTAL_THEME_URI', get_template_directory_uri());
define('CARRENTAL_IMG', CARRENTAL_THEME_URI . '/assets/images');
define('CARRENTAL_CSS', CARRENTAL_THEME_URI . '/assets/css');
define('CARRENTAL_JS', CARRENTAL_THEME_URI . '/assets/js');



// shorthand contants for theme assets directory path
// ----------------------------------------------------------------------------------------
define('CARRENTAL_THEME_DIR', get_template_directory());
define('CARRENTAL_IMG_DIR', CARRENTAL_THEME_DIR . '/assets/images');
define('CARRENTAL_CSS_DIR', CARRENTAL_THEME_DIR . '/assets/css');
define('CARRENTAL_JS_DIR', CARRENTAL_THEME_DIR . '/assets/js');

define('CARRENTAL_CORE', CARRENTAL_THEME_DIR . '/core');
define('CARRENTAL_COMPONENTS', CARRENTAL_THEME_DIR . '/components');
define('CARRENTAL_EDITOR', CARRENTAL_COMPONENTS . '/editor');
define('CARRENTAL_EDITOR_ELEMENTOR', CARRENTAL_EDITOR . '/elementor');
define('CARRENTAL_EDITOR_GUTENBERG', CARRENTAL_EDITOR . '/gutenberg');
define('CARRENTAL_SHORTCODE_DIR_STYLE', CARRENTAL_EDITOR_ELEMENTOR . '/widgets/style');
define('CARRENTAL_SHORTCODE_DIR_WIDGETS', CARRENTAL_EDITOR_ELEMENTOR . '/widgets');
define('CARRENTAL_INSTALLATION', CARRENTAL_CORE . '/installation-fragments');
define('CARRENTAL_REMOTE_CONTENT', esc_url('http://content.xpeedstudio.com/demo-content/carrental'));
define('CARRENTAL_LIVE_URL', esc_url('https://demo.xpeedstudio.com/carrental'));


// set up the content width value based on the theme's design
// ----------------------------------------------------------------------------------------
if (!isset($content_width)) {
    $content_width = 800;
}

// set up theme default and register various supported features.
// ----------------------------------------------------------------------------------------

function carrental_setup() {

    // make the theme available for translation
    $lang_dir = CARRENTAL_THEME_DIR . '/languages';
    load_theme_textdomain('carrental', $lang_dir);

    // add support for post formats
    add_theme_support('post-formats', [
        'standard', 'image', 'video', 'audio','gallery'
    ]);

    // add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // let WordPress manage the document title
    add_theme_support('title-tag');

    // add support for post thumbnails
    add_theme_support('post-thumbnails');

    // hard crop center center
    set_post_thumbnail_size(750, 465, ['center', 'center']);
    add_image_size( 'carrental-small', 350, 250, ['center', 'center'] );
    add_image_size( 'carrental-large', 1110, 740, ['center', 'center'] );
    add_image_size( 'carrental-case-study-box', 320, 200, ['center', 'center'] );



    // register navigation menus
    register_nav_menus(
        [
            'primary' => esc_html__('Primary Menu', 'carrental'),
            'footermenu' => esc_html__('Footer Menu', 'carrental'),
        ]
    );
    //  woocomemrce support

	if (  class_exists( 'WooCommerce', false ) ) {
        add_theme_support('woocommerce');
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
	}
    // HTML5 markup support for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
    /*
     * Enable support for wide alignment class for Gutenberg blocks.
     */
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
}
add_action('after_setup_theme', 'carrental_setup');


add_action('enqueue_block_editor_assets', 'carrental_action_enqueue_block_editor_assets' );
function carrental_action_enqueue_block_editor_assets() {
    wp_enqueue_style( 'carrental-fonts', carrental_google_fonts_url(['Poppins:300,400,500,600,700&display=swap', 'Roboto:300,400,500,700']), null, CARRENTAL_VERSION );
    wp_enqueue_style( 'carrental-gutenberg-editor-font-awesome-styles', CARRENTAL_CSS . '/font-awesome.css', null, CARRENTAL_VERSION );
    wp_enqueue_style( 'carrental-gutenberg-editor-customizer-styles', CARRENTAL_CSS . '/gutenberg-editor-custom.css', null, CARRENTAL_VERSION );
    wp_enqueue_style( 'carrental-gutenberg-editor-styles', CARRENTAL_CSS . '/gutenberg-custom.css', null, CARRENTAL_VERSION );
    wp_enqueue_style( 'carrental-gutenberg-blog-styles', CARRENTAL_CSS . '/blog.css', null, CARRENTAL_VERSION );
}

// hooks for unyson framework
// ----------------------------------------------------------------------------------------
function carrental_framework_customizations_path($rel_path) {
    return '/components';
}
add_filter('fw_framework_customizations_dir_rel_path', 'carrental_framework_customizations_path');

function carrental_remove_fw_settings() {
    remove_submenu_page( 'themes.php', 'fw-settings' );
}
add_action( 'admin_menu', 'carrental_remove_fw_settings', 999 );


// include the init.php
// ----------------------------------------------------------------------------------------
require_once( CARRENTAL_CORE . '/init.php');
require_once( CARRENTAL_COMPONENTS . '/editor/elementor/elementor.php');

// Solution find here https://github.com/CalderaWP/Caldera-Forms/issues/3042
// ----- JS error: a(…).baldrick is not a function
add_filter( 'caldera_forms_render_assets_minify', '__return_false' );

add_filter('elementskit/license/hide_banner', function(){
    return true;
});
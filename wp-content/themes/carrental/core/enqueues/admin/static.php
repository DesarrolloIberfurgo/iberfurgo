<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue static files: javascript and css for backend
 */




wp_enqueue_style( 'carrental-admin',  CARRENTAL_CSS . '/xs-admin.css', null,  CARRENTAL_VERSION );
if ( defined( 'DEVM' ) ) {
    wp_enqueue_script('xs-customize', CARRENTAL_JS . '/xs-customize.js', array('jquery'), CARRENTAL_VERSION, true);
}

wp_localize_script( 'xs-customize', 'admin_url_object',array( 'admin_url' => admin_url( 'post.php?action=elementor&post=' ) ) );

<?php
/*
Theme Name: Grand Car Rental Theme Child
Theme URI: http://themes.themegoods.com/grandcarrental
Author: ThemeGoods
Author URI: http://themeforest.net/user/ThemeGoods
License: GPLv2
*/


// function add_state_var($vars){
  
//     $vars[] = 'state';
//     return $vars;
// }
// add_filter('query_vars', 'add_state_var', 0, 1);

function custom_rewrite_rule() {
  add_rewrite_rule('^delegaciones\/(.+)/?','index.php?pagename=delegaciones&category_name=$matches[1]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);


// function custom_rewrite_tag() {
//   add_rewrite_tag('%category_name%', '([^&]+)');
//   // add_rewrite_tag('%variety%', '([^&]+)');
// }
// add_action('init', 'custom_rewrite_tag', 10, 0);

// function custom_rewrite_rule() {
//   // add_rewrite_rule('^delegaciones\/(.+)/?','index.php?pagename=delegaciones&category_name=$matches[1]','top');
//   add_rewrite_rule('^delegaciones/([^/]*)/?','index.php?page_id=4024&category_name=$matches[1]','top');
// }
// add_action('init', 'custom_rewrite_rule', 10, 0);

//http://localhost/iberfurgo-wp/index.php?page_id=4024&category_name=1


require_once('shortcodes/shortcodes.php');
require_once('functions-api/apiCalls.php');
require_once('functions-api/connection.php');


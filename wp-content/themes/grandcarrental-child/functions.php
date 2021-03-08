<?php
/*
Theme Name: Grand Car Rental Theme Child
Theme URI: http://themes.themegoods.com/grandcarrental
Author: ThemeGoods
Author URI: http://themeforest.net/user/ThemeGoods
License: GPLv2
*/

function custom_rewrite_tag() {
  add_rewrite_tag('%id%', '([^&]+)');
  // add_rewrite_tag('%variety%', '([^&]+)');
}
add_action('init', 'custom_rewrite_tag', 10, 0);

function custom_rewrite_rule() {
  add_rewrite_rule('^delegaciones/([^/]*)/([^/]*)/?','index.php?page_id=4024&id=$matches[1]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);

//http://localhost/iberfurgo-wp/index.php?page_id=4024&food=1&variety=2


require_once('shortcodes/shortcodes.php');
require_once('functions-api/apiCalls.php');
require_once('functions-api/connection.php');


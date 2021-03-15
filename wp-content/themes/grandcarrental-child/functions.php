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
  add_rewrite_rule('^delegaciones\/(.+)/?','index.php?page_id=4062&category_name=$matches[1]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);

function add_rules() {
    add_rewrite_rule('^oficinas/([^/]*)/?','index.php?pagename=oficina&category_name=$matches[1]','top');
}
add_action( 'init', 'add_rules', 10, 0);


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

function get_times() {

  $start = "00:00"; 
  $end = "23:30";
  global $showing;
    $tStart = strtotime($start);
    $tEnd = strtotime($end);
    $tNow = $tStart;
    
  while($tNow <= $tEnd){
    // if(date("H:i",$tNow)=='10:00'){
    //     $showing  .= '<option value="'.date("H:i",$tNow).'" selected>'.date("H:i",$tNow).'</option>';
    // }else{
        $showing  .= '<option value="'.date("H:i",$tNow).'">'.date("H:i",$tNow).'</option>';
    // }
      $tNow = strtotime('+30 minutes',$tNow);
  }
  return $showing;
}
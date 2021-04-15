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

// function custom_rewrite_rule() {
//   add_rewrite_rule('^delegaciones\/(.+)/?','index.php?page_id=4062&category_name=$matches[1]','top');
// }
// add_action('init', 'custom_rewrite_rule', 10, 0);

function add_rules() {
    add_rewrite_rule('^oficinas/([^/]*)/?','index.php?pagename=oficina&category_name=$matches[1]','top');
}
add_action( 'init', 'add_rules', 10, 0);

function add_rules_flota() {
  add_rewrite_rule('^flota/([^/]*)/?','index.php?pagename=vehiculo&category_name=$matches[1]','top');
}
add_action( 'init', 'add_rules_flota', 10, 0);

// function add_rules_paso_final() {
//   add_rewrite_rule('^flota/([^/]*)/?','index.php?pagename=vehiculo&category_name=$matches[1]','top');
// }
// add_action( 'init', 'add_rules_paso_final', 10, 0);



add_action( 'wp_enqueue_scripts', 'custom_enqueue_styles');

function custom_enqueue_styles() 
{
	wp_enqueue_style( 'custom-style', 
	                  get_stylesheet_directory_uri() . '/css/iberfurgo.css', 
                    array(), 
                    wp_get_theme()->get('Version')
                  );
}


//funcion para enviar email mediante SMTP
add_action('phpmailer_init','send_smtp_email');
function send_smtp_email( $phpmailer )
{
    // Define que estamos enviando por SMTP
    $phpmailer->isSMTP();
 
    // La dirección del HOST del servidor de correo SMTP p.e. smtp.midominio.com
    $phpmailer->Host = "smtp.iberfurgo.com";
 
    // Uso autenticación por SMTP (true|false)
    $phpmailer->SMTPAuth = true;
 
    // Puerto SMTP - Suele ser el 25, 465 o 587
    $phpmailer->Port = "587";
 
    // Usuario de la cuenta de correo
    $phpmailer->Username = "reservas@iberfurgo.com";
 
    // Contraseña para la autenticación SMTP
    $phpmailer->Password = "R3s3rv1s#4rd9@";
 
    // El tipo de encriptación que usamos al conectar - ssl (deprecated) o tls
    $phpmailer->SMTPSecure = "tls";
 
    $phpmailer->From = "reservas@ibergurgo.com";
    $phpmailer->FromName = "Iberfurgo::Reservas";
}

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
require_once('includes/formulario-contacto.php');

function get_times($time) {

  $start = "00:00"; 
  $end = "23:30";
  global $showing;
    $tStart = strtotime($start);
    $tEnd = strtotime($end);
    $tNow = $tStart;
    
  while($tNow <= $tEnd){
    if(date("H:i",$tNow)==$time){
        $showing  .= '<option value="'.date("H:i",$tNow).'" selected>'.date("H:i",$tNow).'</option>';
    }else{
        $showing  .= '<option value="'.date("H:i",$tNow).'">'.date("H:i",$tNow).'</option>';
    }
      $tNow = strtotime('+30 minutes',$tNow);
  }
  return $showing;
}

add_action('wp_enqueue_scripts', 'reserva_enqueue_custom_js');
function reserva_enqueue_custom_js() {
    wp_enqueue_script('busqueda', get_stylesheet_directory_uri().'/js/reserva.js');
}

add_action('wp_enqueue_scripts', 'busqueda_enqueue_custom_js');
function busqueda_enqueue_custom_js() {
    wp_enqueue_script('reserva', get_stylesheet_directory_uri().'/js/busqueda.js');
}
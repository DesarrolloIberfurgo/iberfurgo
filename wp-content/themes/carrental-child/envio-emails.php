<?php
/**
 * Template Name: envioEmails
 * The main template file for display car page.
 *
 * @package WordPress
*/

$headers = array('Content-Type: text/html; charset=UTF-8');
$headers[] .= 'From: Iberfurgo::Reservas <reservas@iberfurgo.com>';
$headers[] .= 'Bcc: sergio.abril@iberfurgo.com';
$headers[] .= 'Bcc: rbaldayo@gmail.com';

wp_mail( 'sabrilgarcia@gmail.com' , 'Prueba de correo', 'Prueba de correo desde real', $headers );
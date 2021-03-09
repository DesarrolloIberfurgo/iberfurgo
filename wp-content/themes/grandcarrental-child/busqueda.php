<?php
/**
 * Template Name: Busqueda
 * The main template file for display busqueda page.
 *
 * @package WordPress
*/

get_header(); 

global $wp_query;
echo 'Delegacion:'. $wp_query->query_vars['delegacion_id'];
echo 'Fecha Inicio:'. $wp_query->query_vars['fecha_inicio'];
echo 'Fecha Fin:'. $wp_query->query_vars['fecha_fin'];
?>
busqueda
<?php get_footer(); ?>
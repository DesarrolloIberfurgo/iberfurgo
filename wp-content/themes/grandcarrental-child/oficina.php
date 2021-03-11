<?php
/**
 * Template Name: Oficina
 * The main template file for display oficina page.
 *
 * @package WordPress
*/

get_header(); 

global $wp_query;
echo 'category:'. $wp_query->query_vars['category_name'];
?>
oficina
<?php get_footer(); ?>
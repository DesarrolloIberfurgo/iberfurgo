<?php
/**
 * Template Name: Oficina
 * The main template file for display oficina page.
 *
 * @package WordPress
*/

get_header(); 

global $wp_query;
$url_oficina = $wp_query->query_vars['category_name'];
list($httpCode, $response) = getDataApi(URL_API . 'maestro-delegacion-datos-web', '{"url_oficina":'.$url_oficina.'}');
if ($httpCode != 200) {
	return 'ha petado';
}

echo $response->data[0]->direccion;

?>

<?php get_footer(); ?>
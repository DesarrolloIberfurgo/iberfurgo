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



?>

<div class="inner">
    <div class="inner_wrapper nopadding">
        <?php
            if(!empty($response->data))
            {
                $value = $response->data[0];
        ?>
                <div class="standard_wrapper"></div><br class="clear"/><br/>
        <?php
            }
        ?>
                <div id="page_main_content" class="sidebar_content full_width fixed_column">

                    <div class="standard_wrapper">
                        <div class="one">
                            <div class="one_third">
                            <?php 
                                echo $value->direccion;
                            ?>
                            </div>
                            <div class="one_third">
                            <h3>Horario</h3>
                            pepe
                            </div>
                            <div class="one_third last">
                            <?php 
                                echo $value->direccion;
                            ?>
                            </div>
                        </div>
                    </div> <!-- standard_wrapper -->
                </div>
    </div> <!-- inner_wrapper -->
</div> <!-- inner -->
<?php get_footer(); ?>
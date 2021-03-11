<?php
/**
 * Template Name: Delegaciones
 * The main template file for display delegaciones page.
 *
 * @package WordPress
*/

/**
*	Get current page id
**/
get_header(); 

global $wp_query;
echo 'category:'. $wp_query->query_vars['category_name'];

list($httpCode, $response) = getDataApi(URL_API . 'maestro-delegacion', '{"order":["nombre asc"]}');
if ($httpCode != 200) {
	return 'ha petado';
}
?>

<div class="inner">
    <div class="inner_wrapper nopadding">
        <?php
            if(!empty($response->data))
            {
        ?>
                <div class="standard_wrapper"></div><br class="clear"/><br/>
        <?php
            }
        ?>
        <div id="page_main_content" class="sidebar_content full_width fixed_column">

            <div class="standard_wrapper">  

                <div id="portfolio_filter_wrapper" class="gallery classic three_cols portfolio-content section content clearfix" data-columns="3">
                <?php foreach($response->data as $key => $value)	
                {
                    ?>
                    <div class="element grid classic3_cols animated<?php echo esc_attr($key+1); ?>">
                        <?php echo do_shortcode('[tg_accordion_oficinas 
                        direccion="'.esc_attr($value->delegacion_datos_web->direccion).'" 
                        whatsapp="'.esc_attr($value->delegacion_datos_web->whatsapp).'" 
                        telefono="'.esc_attr($value->delegacion_datos_web->telefono).'" 
                        email="'.esc_attr($value->delegacion_datos_web->email).'"
                        hlvm="'.esc_attr($value->delegacion_datos_web->horarios_lunes_viernes_manana).'"
                        hlvt="'.esc_attr($value->delegacion_datos_web->horarios_lunes_viernes_tarde).'"
                        hs="'.esc_attr($value->delegacion_datos_web->horarios_sabado).'"
                        url="'.esc_attr($value->delegacion_datos_web->url_oficina).'"   
                        title="'.esc_attr($value->nombre).'" 
                        icon="" close="1"][/tg_accordion_oficinas]'); ?>
                    </div>
                    <?php
                }
                ?>
                </div>
            
            </div> <!-- standard_wrapper -->
        
        </div> <!-- page_main_content -->
    </div>
</div> <!-- inner -->
<?php echo do_shortcode('[tg_social_icons style="dark" size="small"]<i class="fa fa-facebook"></i>[/tg_social_icons]'); ?>
<br class="clear"/>
<?php get_footer(); ?>
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
                                <h5 class="ibf_background_gray ibf_pt_5 ibf_pb_5 ibf_mb_15"><Contacto class="ibf_ml_15">Dirección</span></h5>
                                <?php 
                                    echo $value->direccion;
                                ?>
                            </div>

                            <div class="one_third">
                                <h5 class="ibf_background_gray ibf_pt_5 ibf_pb_5 ibf_mb_15"><Contacto class="ibf_ml_15">Horario</span></h5>
                                <p class="ibf_font_16 ibf_color_orange ibf_pl_15 ibf_font_bold ibf_pb_2">Lunes - Viernes</p>
                                <p class="ibf_pl_15 ibf_pb_2 ibf_pt_2">
                                <?php 
                                    echo $value->horarios_lunes_viernes_manana;
                                ?>   
                                </p>
                                <p class="ibf_pl_15 ibf_pb_2 ibf_pt_2">
                                <?php 
                                    echo $value->horarios_lunes_viernes_tarde;
                                ?>
                                </p>
                                <p class="ibf_font_16 ibf_color_orange ibf_pl_15 ibf_font_bold ibf_pb_2 ibf_pt_2">Sábado:<span class="ifb_color_black ibf_font_normal">
                                <?php
                                    echo $value->horarios_sabado;
                                ?>
                                </span>
                                </p>
                            </div>

                            <div class="one_third last">
                                <h5 class="ibf_background_gray ibf_pt_5 ibf_pb_5"><Contacto class="ibf_ml_15">Contacto</span></h5>
                                <div class="ppb_header_content ibf_pl_15 ibf_pt_20">
                            <p><i class="fas fa-phone-alt ibf_font_20 ibf_color_orange ibf_pr_10"></i><a class="ibf_font_18 ibf_font_bold" href="tel:0034'.$telefono.'">'.$telefono.'</a></p>
                            <p><i class="fab fa-whatsapp  ibf_font_24 ibf_color_orange ibf_pr_10"></i><a class="ibf_font_16" href="'.$whatsapp.'">'.substr($whatsapp,-9).'</a></p>
                            <p><i class="fas fa-at ibf_font_20 ibf_color_orange ibf_pr_10"></i><a class="ibf_font_16" href="tel:0034'.$email.'">'.$email.'</a></p>
                            <p><i class="fas fa-map-marker-alt  ibf_font_20 ibf_color_orange ibf_pr_15"></i><span class="ibf_font_16">'.html_entity_decode($direccion).'</span></p>
                            <p class="ibf_pl-15 ibf_font_bold"><a class="ibf_font_16 ibf_color_orange" target="_blank" href="'.$como_llegar.'">Como llegar</a></p>
                                </div>;
                            </div>
                        </div>
                    </div> <!-- standard_wrapper -->
                </div>
    </div> <!-- inner_wrapper -->
</div> <!-- inner -->
<?php get_footer(); ?>
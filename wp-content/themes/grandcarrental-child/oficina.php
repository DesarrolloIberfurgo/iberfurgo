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
$dataApi['url_oficina'] = $url_oficina;
list($httpCode, $response) = getDataApi(URL_API . 'maestro-delegacion-datos-web', json_encode($dataApi));

if ($httpCode != 200) {
	return 'ha petado';
}
if(!empty($response->data))
{
    $dataApi = [];
    $dataApi['tipo_tarifa'] = 'DAY';
    $dataApi['desde'] = 22;
    $dataApi['fecha_inicio'] = "<=" . date('Y-m-d');
    $dataApi['fecha_fin'] = ">=" . date('Y-m-d');
    $dataApi['delegacion_id'] = $response->data[0]->delegacion_id;
    list($httpCode, $preciosFlota) = getDataApi(URL_API. 'maestro-tarifa', json_encode($dataApi));
}
 
// var_dump($response->data);
?>

<div id="page_caption" class="hasbg  withtopbar ibf_mb_0 ibf_slider ibf_head_oficina_<?php echo substr($response->data[0]->url_oficina,20);?>" ></div>
<?php //echo do_shortcode('[rev_slider alias="slider-'.substr($response->data[0]->url_oficina,20).'"][/rev_slider]'); ?>
<div class="inner">
    <div class="inner_wrapper nopadding">
        <?php
            if(!empty($response->data))
            {
                $value = $response->data[0];
                // foreach ($response->data as $value){ 
        ?>
                <div class="standard_wrapper"></div><br class="clear"/><br/>
        <?php
            }
        ?>
                <div id="page_main_content" class="sidebar_content full_width fixed_column">
                    <div class="one">
                        <?php 
                        echo do_shortcode('[ppb_car_search 
                            delegacionId="'.esc_attr($dataApi['delegacion_id']).'"
                            fechaInicio=""
                            fechaFin=""
                            horaInicio=""
                            horaFin=""
                            ][/ppb_car_search]') 
                        ?>
                    </div>
                    <div class="standard_wrapper">                    
                    
                    <div class="one ibf_font_16">
                        <h1 class="ibf_color_orange ibf_mb_20">Alquiler de furgonetas en <?php echo $value->oficinaNombre; ?></h1> 
                        <?php echo $value->texto_landing; ?>
                    </div>
                        <div class="one">
                            <div class="one_third">
                                <h5 class="ibf_border_bottom ibf_pt_5 ibf_pb_5">
                                    <Contacto class="ibf_ml_15">Dirección</span>
                                </h5>
                                <div class=" ibf_pl_15">
                                    <p>
                                        <?php 
                                            echo $value->direccion;
                                        ?>
                                    </p>
                                </div>
                                <a class="button small left ibf_button_50" href="<?php echo $value->mapa_oficina; ?>">Como llegar <i class="fas fa-chevron-right"></i></a>
                            </div>
                                

                            <div class="one_third">
                                <h5 class="ibf_border_bottom ibf_pt_5 ibf_pb_5">
                                    <span class="ibf_ml_15">Horario</span>
                                </h5>
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
                                <p class="ibf_font_16 ibf_color_orange ibf_pl_15 ibf_font_bold ibf_pb_2 ibf_pt_2">Sábado:
                                    <span class="ifb_color_black ibf_font_normal">
                                        <?php
                                            echo $value->horarios_sabado;
                                        ?>
                                    </span>
                                </p>
                            </div>

                            <div class="one_third last">
                                <h5 class="ibf_border_bottom ibf_pt_5 ibf_pb_5">
                                    <span class="ibf_ml_15">Contacto</span>
                                </h5>
                                <div class=" ibf_pl_15">
                                    <p>
                                        <i class="fas fa-phone-alt ibf_font_20 ibf_color_orange ibf_pr_10"></i>
                                        <a class="ibf_font_18 ibf_font_bold" href="tel:0034'<?php echo $value->telefono ?>'">
                                            <?php
                                                echo $value->telefono;
                                            ?>
                                        </a>
                                    </p>
                                    <p>
                                        <i class="fab fa-whatsapp  ibf_font_24 ibf_color_orange ibf_pr_10"></i>
                                        <a class="ibf_font_16" href="'<?php echo $value->whatsapp ?>'">
                                            <?php
                                                echo substr($value->whatsapp, -9);
                                            ?>
                                        </a>
                                    </p>
                                        
                                    <p>
                                        <i class="fas fa-at ibf_font_20 ibf_color_orange ibf_pr_10"></i>
                                        <a class="ibf_font_16" href="tel:0034'<?php echo $value->email ?>'">
                                            <?php
                                                echo $value->email;
                                            ?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php $arrayGrupos = ['A','B','C','D','E','F']; ?>
                        <div class="one">
                            <h2 class="ibf_pt_25 ibf_pb_20">Precio de alquiler de vehículos en <?php echo $value->oficinaNombre; ?></h2>
                        <?php foreach ($preciosFlota as $precio) {  ?>
                        
                            <table class="table one">
                                <thead class="ibf_background_gray ibf_font_18">
                                    <tr>
                                        <th scope="col">Tipo de vehículo</th>
                                        <th scope="col">Tamaño</th>
                                        <th scope="col">m<sup>3</sup></th>
                                        <th scope="col">Carga util</th>
                                        <th scope="col">Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php for ($i=0; $i < count($precio); $i++) { ?>
                                    <tr class="ibf_font_16">
                                        <td><?php echo $precio[$i]->tipoFlota->nombre; ?></td>
                                        <td><?php echo $precio[$i]->tipoFlota->tamano; ?></td>
                                        <td><?php echo $precio[$i]->tipoFlota->m3; ?></td>
                                        <td><?php echo $precio[$i]->tipoFlota->carga_util; ?></td>
                                        <td class="ibf_font_24 ibf_font_bold"><span class="ibf_font_12 ibf_font_normal">desde </span><?php echo $precio[$i]->tipoFlota->precioDesde; ?><span class="ibf_font_16 ibf_font_bold">€</span></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        <?php }  ?>
                        </div>
                    </div> <!-- standard_wrapper -->
                </div>

                <!-- <?php //} //end foreach princpal ?> -->
    </div> <!-- inner_wrapper -->
</div> <!-- inner -->
<?php get_footer(); ?>
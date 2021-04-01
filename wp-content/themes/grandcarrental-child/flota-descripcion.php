<?php
/**
 * Template Name: vehiculo
 * The main template file for display oficina page.
 *
 * @package WordPress
*/

    get_header(); 
    
    global $wp_query;

    $url_vehiculo = $wp_query->query_vars['category_name'];
    $dataApi['url'] = $url_vehiculo;

    list($httpCode, $response) = getDataApi(URL_API . 'flota-tipo', json_encode($dataApi));
?>

<div class="inner">
	<div class="inner_wrapper nopadding">
        
            <?php
                if(!empty($response->data))
                {
                    $value = $response->data[0];
            ?>
            <div class="standard_wrapper"></div>
            <br class="clear"/>
            <?php
                }
            ?>
            <div id="page_main_content" class="sidebar_content fixed_column">
                <div class="standard_wrapper">   
                    <h1 class="ibf_color_orange ibf_mb_20 ibf_text_center">Alquiler de <?php echo $value->nombre; ?></h1> 
                    <div class="one_half ibf_mrp_2">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/flota/<?php echo $value->tipoId; ?>/34.jpg">
                    </div>

                    <div class="one_half ibf_mt_30 ibf_mrp_2">
                        <h2 class="ibf_color_black">Características</h2>
                        <p class="ibf_font_18"><?php echo $value->descripcion; ?></p>
                    </div>
                </div>

                <div class="one" style="background-color: #fcf0e8;">
                    <div class="standard_wrapper">
                        <div class="page_content_wrapper">
                            <div class="one_half ibf_mt_30 ibf_mrp_2">
                                <div class="car_attribute_wrapper ibf_width_100">
                                    <h3 class="ibf_color_black ibf_pb_15">Datos de interés</h3>
                                        <?php
                                        //Display car attributes
                                        $car_passengers = $value->plazas;
                                        $car_luggages = $value->carga_util;
                                        $car_doors = $value->puertas;
                                        $car_vol = $value->m3;
                                        $car_fianza = $value->fianza;
                                        $car_franquicia = $value->franquicia;

                                        // if (!empty($car_passengers) or !empty($car_luggages) or !empty($car_doors)) {
                                        ?>
                                            <div class="car_attribute_wrapper ibf_width_50">
                                                <?php
                                                if (!empty($car_passengers)) 
                                                {
                                                ?>
                                                    <div class="one_half ibf_width_100 ibf_font_16">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_passengers_30_black.png"> 
                                                        <span class="ibf_va_tb"><strong>Plazas: </strong><?php echo intval($car_passengers);?> </span>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (!empty($car_luggages)) 
                                                {
                                                ?>
                                                    <div class="one_half ibf_width_100 ibf_font_16">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_charge_30_black.png"> 
                                                        <span class="ibf_va_tb"><strong>Carga útil: </strong><?php echo $car_luggages; ?> </span>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (!empty($car_fianza)) 
                                                {
                                                ?>
                                                    <div class="one_half ibf_width_100 ibf_font_16">
                                                        <i class="fas fa-euro-sign ibf_pl_5" style="font-size: 30px;;"></i>
                                                        <span class="ibf_va_tb  ibf_ml_8"><strong>Fianza: </strong><?php echo $car_fianza; ?> €</span>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>

                                            <div class="car_attribute_wrapper ibf_width_50">
                                            <?php
                                                if (!empty($car_doors)) 
                                                {
                                                ?>
                                                    <div class="one_half ibf_width_100 ibf_font_16">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_door_30_black.png"> 
                                                        <span class="ibf_va_tb"><strong>Puertas: </strong><?php echo ucfirst($car_doors); ?></span>            
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (!empty($car_vol)) 
                                                {
                                                ?>
                                                    <div class="one_half ibf_width_100 ibf_font_16">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_vol_30_black.png"> 
                                                        <span class="ibf_va_tb"><strong>Volumen de carga: </strong><?php echo $car_vol; ?> </span>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (!empty($car_franquicia)) 
                                                {
                                                ?>
                                                    <div class="one_half ibf_width_100 ibf_font_16">
                                                        <i class="fas fa-euro-sign ibf_pl_5" style="font-size: 30px;"></i>
                                                        <span class="ibf_va_tb ibf_ml_8"><strong>Franquicia: </strong><?php echo $car_franquicia; ?> €</span>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <br class="clear" />
                                        <?php
                                        // } //car attributes
                                        ?>
                                </div>

                                <div class="car_attribute_wrapper ibf_width_100 ibf_pt_10">
                                    <h3 class="ibf_color_black ibf_pb_10 ibf_pt_15">Medidas del vehículo</h3>
                                        
                                            <div class="car_attribute_wrapper ibf_width_100">
                                                <?php 
                                                $car_width = $value->ancho_vehiculo;
                                                $car_height = $value->alto_vehiculo;
                                                $car_large = $value->largo_vehiculo;
                                               ?>
                                                <p class="ibf_font_16 ibf_pt_0"><strong>Medidas: </strong> <?php echo $car_height; ?> x <?php echo $car_width; ?> x <?php echo $car_large; ?> (alto x ancho x largo) </p> 
                                            </div>
                                            <br class="clear" />
                                </div>
                            </div>

                            <div class="one_half ibf_mt_30 ibf_mrp_2">
                                <h3 class="ibf_color_black ibf_mb_15">Medidas de carga</h3>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/flota/<?php echo $value->tipoId; ?>/medidas-carga.png">
                            </div>
                        </div>   
                    </div>
                </div>

                <div class="one">
                    <div class="standard_wrapper">
                        <h2 class="ibf_color_orange ibf_pt_20 ibf_text_center">Reserva tu <?php echo $value->nombre; ?> en Iberfurgo</h2>
                    </div>
                    <?php echo do_shortcode('[ppb_car_search][/ppb_car_search]') ?>
                </div>
                
            </div>

            
                
            
    </div>
</div>
<?php get_footer(); ?>
<?php

/**
 * Template Name: Pasofinal
 * The main template file for display paso final page.
 *
 * @package WordPress
 */

//Add data for recently view cars
grandcarrental_set_recently_view_cars();

get_header();
// global $wp_query;
$delegacionId = $_GET['delegacionId'];
$nombreDelegacion = $_GET['nombreDelegacion'];
$fechaInicio = $_GET['fechaInicio'];
$fechaFin = $_GET['fechaFin'];
$horaInicio = $_GET['horaInicio'];
$horaFin = $_GET['horaFin'];
$tipoId = $_GET['tipoId'];
$importeVehiculo = $_GET['importe_vehiculo'];
$importeVehiculoIva = $_GET['importe_vehiculo_iva'];
$dias = $_GET['dias'];
$euros_dia = $_GET['euros_dia'];
$tramoId = $_GET['tramo_id'];
$data['tipo_id'] = $tipoId;
list($httpCode, $response) = getApi(URL_API . 'flota-tipo/' . $tipoId);

//incluye 100 y 600 de bbdd
//23 2 y 300 de bbdd


//Include custom header feature
get_template_part("/templates/template-car-header");
?>
<div class="inner">

    <!-- Begin main content -->
    <div class="inner_wrapper">

        <div class="sidebar_content">

            <h1 class="ibf_color_orange ibf_mt_30"><?php echo $response->nombre ?></h1>
            <?php
            $overall_rating_arr = grandcarrental_get_review($post->ID, 'overall_rating');
            $overall_rating = intval($overall_rating_arr['average']);
            $overall_rating_count = intval($overall_rating_arr['count']);
            //Display car attributes
            $car_passengers = $response->plazas;
            $car_luggages = $response->carga_util;
            $car_transmission = $response->puertas;
            $car_m3 = $response->m3;
            // $car_doors = get_post_meta($post->ID, 'car_doors', true);

            if (!empty($car_passengers) or !empty($car_luggages) or !empty($car_transmission) or !empty($car_m3)) {
            ?>
                <div class="single_car_attribute_wrapper themeborder">
                    <?php
                    if (!empty($car_passengers)) {
                    ?>
                        <div class="one_fourth ibf_font_16">
                            <div class="car_attribute_content">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_passengers_30_black.png">
                                <span class="ibf_va_tb"><?php echo intval($car_passengers) . ' Plazas'; ?></span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (!empty($car_luggages)) {
                    ?>
                        <div class="one_fourth">
                            <div class="car_attribute_content">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_charge_30_black.png">
                                <span><?php echo intval($car_luggages) . ' Kg.'; ?></span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (!empty($car_m3)) {
                    ?>
                        <div class="one_fourth">
                            <div class="car_attribute_content">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_vol_30_black.png">
                                <span><?php echo intval($car_m3) . ' m<sup>3</sup>'; ?></span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (!empty($car_transmission)) {
                        if (function_exists('grandcarrental_get_transmission_translation')) {
                            $car_transmission = grandcarrental_get_transmission_translation($car_transmission);
                        } else {
                            $car_transmission = ucfirst($car_transmission);
                        }
                    ?>
                        <div class="one_fourth">
                            <div class="car_attribute_content">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_door_30_black.png">
                                <?php echo esc_html($car_transmission) . ' Puertas'; ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div><br class="clear" />
            <?php
            }
            $car_included = get_post_meta($post->ID, 'car_included', true);
            $car_not_included = get_post_meta($post->ID, 'car_not_included', true);
            ?>
            <div class="single_car_departure_wrapper themeborder">
                <ul class="single_car_departure_wrapper themeborder">
                    <li>
                        <div class="single_car_departure_title ibf_widthm_100">TU RESERVA INCLUYE</div>
                        <div class="single_car_departure_content ibf_font_16 ibf_widthm_100">
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Modificación y cancelación de reserva: Gratuita.
                            </div>
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span><?php echo $response->km_diarios ?> Km. diarios incluidos.
                            </div>
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Asistencia en carretera 24 horas.
                            </div>
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Cobertura contra daños y robos.
                            </div>
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Seguro con franquicia de <?php echo $response->franquicia ?> €.
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="single_car_departure_title ibf_widthm_100">CONDICIONES DE TU RESERVA</div>
                        <div class="single_car_departure_content ibf_font_16 ibf_widthm_100">
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Edad mínima del conductor <?php echo $response->edad_minima ?> años.
                            </div>
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Antigüedad del carnet de conducir: <?php echo $response->antigüedad_carnet ?> años.
                            </div>
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Importe Km. extras: <?php echo $response->km_extras ?> €.
                            </div>
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Fianza <?php echo $response->fianza ?> €.
                            </div>    
                        </div>
                    </li>

                    <li>
                        <div class="single_car_departure_title ibf_widthm_100">COMO REALIZAR TU RESERVA</div>
                        <div class="single_car_departure_content ibf_font_16 ibf_widthm_100">
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Envíanos tus datos de contacto (empresa o particular) usando el formulario anexo.
                            </div>
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Recibirás una llamada de la oficina seleccionada.
                            </div>
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Consúltanos las dudas que tengas.
                            </div>   
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>Si existe disponibilidad, podrás confirmar la reserva.
                            </div>  
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span>En caso de no haber disponibilidad, te ofreceremos una solución alternativa.
                            </div>  
                            <div class="one">
                                <span class="ti-check ibf_color_orange"></span><strong>NO TIENES QUE PAGAR NADA A TRAVÉS DE LA WEB.</strong>
                            </div>   
                        </div>
                    </li>

                    <li>
                        <div class="single_car_departure_title ibf_widthm_100">AÑADIR EXTRAS</div>
                        <div class="single_car_departure_content ibf_font_16 ibf_widthm_100">
                            <div class="one">
                                <input type="hidden" id="eur_dia" value="<?php echo $response->km_extras ?>">
                                <input type="hidden" id="euros_dia" value="<?php echo $euros_dia ?>">
                                <p>Tu reserva incluye <?php echo $dias * 300; ?> Km. Puedes añadir más Km. extras si lo deseas.</p>
                                <select class="form-select ibf_mb_15" id="kilometraje" name="kilometraje" onchange="addExtras()">
                                    <option value="">Añade Km. extras</option>
                                    <option value="100">100 Km.</option>
                                    <option value="200">200 Km.</option>
                                    <option value="300">300 Km.</option>
                                </select>
                            </div>
                            <div class="one ibf_mb_15">
                                <input class="ibf_mr_10 ibf_font_21" id="conductor_adicional" name="conductor_adicional" type="checkbox" value=1 onclick="addExtras()"> Conductor adicional <span class="ibf_color_orange">5 €/día + iva </span>
                            </div>
                            <div class="one ibf_mb_15">
                                <input class="ibf_mr_10 ibf_font_21" id="conductor_menor" name="conductor_menor" type="checkbox" value=1 onclick="addExtras()"> Conductor menor 23 años <span class="ibf_color_orange">7 €/día + iva </span>
                            </div>
                            <div class="one ibf_mb_15">
                                <input class="ibf_mr_10 ibf_font_21"  id="reduccion_franquicia" name="reduccion_franquicia" type="checkbox" value=1 onclick="addExtras()"> 
                                <?php 
                                    $arrayReduccionFranquicia = ['F', 'G'];
                                    if(in_array($tipoId, $arrayReduccionFranquicia)) { 
                                ?>
                                Reducción franquicia <span class="ibf_color_orange">15 €/día + iva </span>
                                <?php } else { ?>
                                Reducción franquicia <span class="ibf_color_orange">10 €/día + iva </span>
                                <?php  } ?>
                                
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            
            
        </div>

        <div class="sidebar_wrapper">

            <div class="sidebar_top"></div>

            <div class="sidebar">

                <div class="content">

                    <?php
                    //Get car price
                    $car_price_day = $importeVehiculo; //get_post_meta($post->ID, 'car_price_day', true);
                    $car_price_hour = $importeVehiculo; //get_post_meta($post->ID, 'car_price_hour', true);
                    $car_price_airport = $importeVehiculo; //get_post_meta($post->ID, 'car_price_airport', true);

                    if (!empty($car_price_day) or !empty($car_price_hour) or !empty($car_price_airport)) {
                    ?>
                        <div class="single_car_header_price">
                            <span id="single_car_price_scroll"><?php echo grandcarrental_format_car_price($car_price_day); ?></span>
                            <span id="single_car_price_per_unit_change_scroll" class="single_car_price_per_unit">
                                <span id="single_car_unit_scroll"><?php esc_html_e('+ IVA', 'grandcarrental'); ?></span>
                            </span>
                            <hr />
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    //Get car booking form
                    // $car_booking_contactform7 = get_post_meta($post->ID, 'car_booking_contactform7', true);
                    $car_booking_product = get_post_meta($post->ID, 'car_booking_product', true);
                    ?>
                    <div class="single_car_booking_wrapper themeborder <?php if (!empty($car_booking_product) && intval($car_booking_product) > 0) { ?>book_instantly<?php } ?>">
                   
                        <!-- <form class="car_search_form" method="post" action="../aviso-reserva"> -->
                        <form method="post" action="../aviso-reserva">
                            <label for="delegacion_id_res" class="ibf_font_18">Oficina</label>
                            <input  class="ibf_font_16" id="delegacion_id_res" value="<?php echo $nombreDelegacion ?>" disabled>
                            <input hidden name="delegacion_id_res" value="<?php echo $nombreDelegacion ?>">

                            <label for="fecha_inicio_res" class="ibf_font_18 ibf_mt_10">Fecha recogida</label>
                            <!-- <input  class="ibf_font_16 ibf_width_100" id="fecha_inicio_res" value="<?php  //echo  '<span>Fecha:</span> '. $fechaInicio . ' Hora:' . $horaInicio ?>" disabled> -->
                            <div  class="ibf_font_16 ibf_width_100" id="fecha_inicio_res"> 
                                <?php  echo  $fechaInicio . '<span class="ibf_color_orange ibf_pl_20">Hora: </span>' . $horaInicio ?>
                            </div>
                            <input hidden name="fecha_inicio_res" value="<?php echo $fechaInicio ?>">
                            <input hidden name="hora_inicio_res" value="<?php echo $horaInicio ?>">

                            <label for="fecha_fin_res" class="ibf_font_18 ibf_mt_10">Fecha devolución</label>
                            <!-- <input  class="ibf_font_16" id="fecha_fin_res" value="<?php //echo $fechaFin . ':' . $horaFin ?>" disabled> -->
                            <div  class="ibf_font_16 ibf_width_100" id="fecha_inicio_res"> 
                                <?php  echo $fechaFin . '<span class="ibf_color_orange ibf_pl_20">Hora: </span>' . $horaFin ?>
                            </div>
                            <input hidden name="fecha_fin_res" value="<?php echo $fechaFin ?>">
                            <input hidden name="hora_fin_res" value="<?php echo $horaFin ?>">

                            <div class="one ibf_mt_15 ibf_mb_10">
                                <span id="mostrar_titulo_extras"></span>
                                <span id="mostrar_texto_extras"></span>
                            </div>

                            <label for="nombre_res" class="ibf_font_18 ibf_mt_10">Nombre/Empresa</label>
                            <input class="ibf_input_form" id="nombre_res" name="nombre_res" placeholder="Nombre o empresa" required>

                            <label for="dni_res" class="ibf_font_18 ibf_mt_10">DNI/NIE</label>
                            <input class="ibf_input_form" id="dni_res" name="dni_res" placeholder="DNI o NIE" required>

                            <label for="direccion_res"  class="ibf_font_18 ibf_mt_10">Dirección</label>
                            <input class="ibf_input_form" id="direccion_res" name="direccion_res" placeholder="Dirección" required>

                            <label for="forma_pago_res"  class="ibf_font_18 ibf_mt_10">Forma de pago</label>
                            <select class="ibf_select_form" id="forma_pago_res" name="forma_pago_res" placeholder="Forma de pago">
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta">Tarjeta</option>
                                <option value="Transferencia">Transferencia</option>
                            </select>

                            <label for="telefono_res"  class="ibf_font_18 ibf_mt_10">Teléfono</label>
                            <input class="ibf_input_form" id="telefono_res" name="telefono_res" placeholder="Teléfono" required>

                            <label for="email_res"  class="ibf_font_18 ibf_mt_10">Email</label>
                            <input type="email" class="ibf_input_form" id="email_res" name="email_res" placeholder="Email" required>

                            <textarea class="ibf_mt_15 ibf_select_form" cols="27" rows="5" id="comentarios_res" name="comentarios_res" placeholder="Comentarios"></textarea>

                            
                            <input class="ibf_mr_10 ibf_font_16" id="condiciones_generales" name="condiciones_generales" type="checkbox" value=1> 
                                He leído y acepto la <a href="<?php echo site_url(); ?>/politica-de-privacidad">política de privacidad</a> y <a href="<?php echo site_url(); ?>/condiciones-generales">condiciones generales</a> de contratación.
                            <br>
                            <input class="ibf_mr_10 ibf_font_16" id="comunicaciones_comerciales" name="comunicaciones_comerciales" type="checkbox" value=1> 
                                <span>Autorizo la cesión de mis datos para comunicaciones comerciales, promociones especiales y cupones descuento.</span>
                            
                            <input hidden name="tipo_id_res" value="<?php echo $tipoId ?>">
                            <input hidden id="dias_res" name="dias_res" value="<?php echo $dias ?>">
                            <input hidden id="precio_res" name="precio_res" value="<?php echo $importeVehiculo ?>">
                            <input hidden id="precio_extra_res" name="precio_extra_res" value="0">
                            <input hidden id="precio_final_con_extras_res" name="precio_final_con_extras_res" value="<?php echo $importeVehiculo ?>">
                            <input hidden id="texto_extras_res" name="texto_extras_res" value="">
                            <input id="reservar_res" type="submit" class="button ibf_button_book ibf_font_20" value="Solicitar Reserva"> 
                        </form>

                        <?php
                        // echo do_shortcode('[tg_formulario_detalle
                        //     fecha_inicio="'.esc_attr($fechaInicio).'"
                        //     hora_inicio="'.esc_attr($horaInicio).'"
                        //     fecha_fin="'.esc_attr($fechaFin).'"
                        //     hora_fin="'.esc_attr($horaFin).'"
                        //     nombre_delegacion="'.esc_attr($nombreDelegacion).'"
                        //     tipo_id="'.esc_attr($tipoId).'"
                        //     car_price="'.esc_attr($importeVehiculo).'"
                        //     dias="'.esc_attr($dias).'"
                        //     extras="100"
                        // ][/tg_formulario_detalle]');
                        // if(!empty($car_booking_contactform7) && intval($car_booking_contactform7) > 0)
                        // {
                        //     echo do_shortcode('[contact-form-7 id="'.esc_attr($car_booking_contactform7).'"]');
                        // }

                        if (class_exists('Woocommerce') && !empty($car_booking_product) && intval($car_booking_product) > 0) {
                        ?>
                            <div class="single_car_booking_divider">
                                <span class="single_car_booking_divider_content"><?php esc_html_e("or", 'grandcarrental'); ?></span>
                            </div>
                            <div class="single_car_booking_woocommerce_wrapper">
                                <button data-product="<?php echo esc_attr($car_booking_product); ?>" data-processing="<?php esc_html_e("Please wait...", 'grandcarrental'); ?>" data-url="<?php echo admin_url('admin-ajax.php') . esc_attr("?action=grandcarrental_add_to_cart&product_id=" . $car_booking_product); ?>" class="single_car_add_to_cart button"><?php esc_html_e("Book Instantly", 'grandcarrental'); ?></button>
                            </div>
                        <?php
                        }

                        $car_view_count = grandcarrental_get_post_view($post->ID, true);
                        if ($car_view_count > 10) {
                        ?>
                            <div class="single_car_view_wrapper themeborder">
                                <div class="single_car_view_desc">
                                    <?php esc_html_e("This car's been viewed", 'grandcarrental'); ?>&nbsp;<?php echo number_format($car_view_count); ?>&nbsp;<?php esc_html_e("times in the past week", 'grandcarrental'); ?>
                                </div>

                                <div class="single_car_view_icon ti-alarm-clock"></div>
                            </div>
                            <br class="clear" />
                        <?php
                        }
                        ?>
                    </div>

                    <?php
                    if (is_active_sidebar('single-car-sidebar')) { ?>
                        <ul class="sidebar_widget">
                            <?php dynamic_sidebar('single-car-sidebar'); ?>
                        </ul>
                    <?php } ?>

                    <?php
                    if (function_exists('users_online') && !isset($_COOKIE['grandcarrental_users_online'])) : ?>
                        <div class="single_car_users_online_wrapper themeborder">
                            <div class="single_car_users_online_icon">
                                <span class="ti-info-alt"></span>
                            </div>
                            <div class="single_car_users_online_content">
                                <?php users_online(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
            <br class="clear" />

            <div class="sidebar_bottom"></div>
        </div>

    </div>
    <!-- End main content -->

    <?php
    $tg_car_display_related = kirki_get_option('tg_car_display_related');

    if (!empty($tg_car_display_related)) {

        $tags = wp_get_object_terms($post->ID, 'cartag');

        if ($tags) {

            $tag_in = array();

            //Get all tags
            foreach ($tags as $tags) {
                $tag_in[] = $tags->term_id;
            }

            $args = array(
                'tax_query' => array(
                    array(
                        'taxonomy' => 'cartag',
                        'field' => 'id',
                        'terms' => $tag_in
                    )
                ),
                'post_type' => 'car',
                'post__not_in' => array($post->ID),
                'showposts' => 3,
                'ignore_sticky_posts' => 1,
                'orderby' => 'rand'
            );
            $my_query = new WP_Query($args);
            $i_post = 1;

            if ($my_query->have_posts()) {
    ?>
                <br class="clear" />
                <div class="car_related">
                    <h3 class="sub_title"><?php echo esc_html_e('Similar cars', 'grandcarrental'); ?></h3>
                    <?php
                    if (have_posts()) {
                    ?>
                        <div id="portfolio_filter_wrapper" class="gallery classic three_cols portfolio-content section content clearfix" data-columns="3">
                            <?php
                            while ($my_query->have_posts()) : $my_query->the_post();

                                $image_url = '';
                                $car_ID = get_the_ID();

                                if (has_post_thumbnail($car_ID, 'grandcarrental-gallery-grid')) {
                                    $image_id = get_post_thumbnail_id($car_ID);
                                    $small_image_url = wp_get_attachment_image_src($image_id, 'grandcarrental-gallery-grid', true);
                                }

                                $permalink_url = get_permalink($car_ID);
                            ?>
                                <div class="element grid classic3_cols">
                                    <div class="one_third gallery3 classic static filterable portfolio_type themeborder" data-id="post-<?php echo esc_attr($car_ID); ?>">
                                        <?php
                                        if (!empty($small_image_url[0])) {
                                        ?>
                                            <a class="car_image" href="<?php echo esc_url($permalink_url); ?>">
                                                <img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                                <?php
                                                //Get car price
                                                $car_price = get_post_meta($post->ID, 'car_price', true);

                                                if (!empty($car_price)) {

                                                ?>
                                                    <div class="car_price">
                                                        <?php echo esc_html(grandcarrental_format_car_price($car_price)); ?>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </a>

                                            <div class="portfolio_info_wrapper">
                                                <div class="car_attribute_wrapper">
                                                    <a class="car_link" href="<?php echo esc_url($permalink_url); ?>">
                                                        <h4><?php the_title(); ?></h4>
                                                    </a>
                                                    <?php
                                                    $overall_rating_arr = grandcarrental_get_review($car_ID, 'overall_rating');
                                                    $overall_rating = intval($overall_rating_arr['average']);
                                                    $overall_rating_count = intval($overall_rating_arr['count']);

                                                    if (!empty($overall_rating)) {
                                                    ?>
                                                        <div class="car_attribute_rating">
                                                            <?php
                                                            if ($overall_rating > 0) {
                                                            ?>
                                                                <div class="br-theme-fontawesome-stars-o">
                                                                    <div class="br-widget">
                                                                        <?php
                                                                        for ($i = 1; $i <= $overall_rating; $i++) {
                                                                            echo '<a href="javascript:;" class="br-selected"></a>';
                                                                        }

                                                                        $empty_star = 5 - $overall_rating;

                                                                        if (!empty($empty_star)) {
                                                                            for ($i = 1; $i <= $empty_star; $i++) {
                                                                                echo '<a href="javascript:;"></a>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }

                                                            if ($overall_rating_count > 0) {
                                                            ?>
                                                                <div class="car_attribute_rating_count">
                                                                    <?php echo intval($overall_rating_count); ?>&nbsp;
                                                                    <?php
                                                                    if ($overall_rating_count > 1) {
                                                                        echo esc_html__('reviews', 'grandcarrental');
                                                                    } else {
                                                                        echo esc_html__('review', 'grandcarrental');
                                                                    }
                                                                    ?>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    //Display car attributes
                                                    $car_passengers = get_post_meta($post->ID, 'car_passengers', true);
                                                    $car_luggages = get_post_meta($post->ID, 'car_luggages', true);
                                                    $car_transmission = get_post_meta($post->ID, 'car_transmission', true);

                                                    if (!empty($car_passengers) or !empty($car_luggages) or !empty($car_transmission)) {
                                                    ?>
                                                        <div class="car_attribute_wrapper_icon">
                                                            <?php
                                                            if (!empty($car_passengers)) {
                                                            ?>
                                                                <div class="one_fourth">
                                                                    <div class="car_attribute_icon ti-user"></div>
                                                                    <div class="car_attribute_content">
                                                                        <?php
                                                                        echo intval($car_passengers);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if (!empty($car_luggages)) {
                                                            ?>
                                                                <div class="one_fourth">
                                                                    <div class="car_attribute_icon ti-briefcase"></div>
                                                                    <div class="car_attribute_content">
                                                                        <?php
                                                                        echo intval($car_luggages);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if (!empty($car_transmission)) {
                                                            ?>
                                                                <div class="one_fourth">
                                                                    <div class="car_attribute_icon ti-panel"></div>
                                                                    <div class="car_attribute_content">
                                                                        <?php
                                                                        echo ucfirst($car_transmission);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>

                                                        </div><br class="clear" />
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="car_attribute_price">
                                                    <?php
                                                    //Get car price
                                                    $car_price_day = get_post_meta($post->ID, 'car_price_day', true);

                                                    if (!empty($car_price_day)) {
                                                    ?>
                                                        <div class="car_attribute_price_day three_cols">
                                                            <?php echo grandcarrental_format_car_price($car_price_day); ?>
                                                            <span class="car_unit_day"><?php esc_html_e('+ IVA', 'grandcarrental'); ?></span>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <br class="clear" />
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                        <?php
                                $i_post++;
                            endwhile;
                        }

                        wp_reset_postdata();
                        ?>
                        </div>
                </div>
    <?php
            }
        }
    } //end if show related
    ?>

</div>
</div>
<?php

get_footer();

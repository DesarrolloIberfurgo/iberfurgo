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
$tramoId = $_GET['tramo_id'];
$data['tipo_id'] = $tipoId;
list($httpCode, $response) = getApi(URL_API . 'flota-tipo/'.$tipoId);

//incluye 100 y 600 de bbdd
//23 2 y 300 de bbdd


//Include custom header feature
get_template_part("/templates/template-car-header");
?>
<div class="inner">

<!-- Begin main content -->
<div class="inner_wrapper">

    <div class="sidebar_content">
            
        <h1><?php echo $response->nombre ?></h1>
        <?php
            $overall_rating_arr = grandcarrental_get_review($post->ID, 'overall_rating');
            $overall_rating = intval($overall_rating_arr['average']);
            $overall_rating_count = intval($overall_rating_arr['count']);

            //Display car attributes
            $car_passengers = $response->plazas;
            $car_luggages = $response->carga_util;
            $car_transmission = $response->puertas;
            // $car_doors = get_post_meta($post->ID, 'car_doors', true);
            
            if(!empty($car_passengers) OR !empty($car_luggages) OR !empty($car_transmission))
            {
        ?>
            <div class="single_car_attribute_wrapper themeborder">
                <?php
                    if(!empty($car_passengers))
                    {
                ?>
                    <div class="one_fourth">
                        <div class="car_attribute_icon ti-user"></div>
                        <div class="car_attribute_content">
                        <?php
                            echo intval($car_passengers).'&nbsp;';
                            
                            if($car_passengers > 1)
                            {
                                echo esc_html__("Plazas", 'grandcarrental');
                            }
                            else
                            {
                                echo esc_html__("Plaza", 'grandcarrental');
                            }
                        ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
                
                <?php
                    if(!empty($car_luggages))
                    {
                ?>
                    <div class="one_fourth">
                        <div class="car_attribute_icon ti-briefcase"></div>
                        <div class="car_attribute_content">
                            <?php
                                echo intval($car_luggages).'&nbsp;';
                                
                                if($car_luggages > 1)
                                {
                                    echo esc_html__("Kg", 'grandcarrental');
                                }
                                else
                                {
                                    echo esc_html__("Kg", 'grandcarrental');
                                }
                            ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
                
                <?php
                    if(!empty($car_transmission))
                    {
                        if(function_exists('grandcarrental_get_transmission_translation'))
                        {
                            $car_transmission = grandcarrental_get_transmission_translation($car_transmission);
                        }
                        else
                        {
                            $car_transmission = ucfirst($car_transmission);
                        }
                ?>
                    <div class="one_fourth">
                        <div class="car_attribute_icon ti-panel"></div>
                        <div class="car_attribute_content">
                            <?php 
                                echo esc_html($car_transmission).' Puertas';
                            ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div><br class="clear"/>
        <?php
            }
            $car_included = get_post_meta($post->ID, 'car_included', true);
            $car_not_included = get_post_meta($post->ID, 'car_not_included', true);
        ?>
        <div class="single_car_departure_wrapper themeborder">
        
                <div class="single_car_departure_title">INCLUYE</div>
                    
                <div class="one">
                    <span class="ti-check"></span>Modificación y cancelación de reserva: Gratuita.
                </div>
                <div class="one">
                    <span class="ti-check"></span><?php echo $response->km_diarios?>km diarios incluidos.
                </div>
                <div class="one">
                    <span class="ti-check"></span>Asistencia en carretera 24 horas.
                </div>
                <div class="one">
                    <span class="ti-check"></span>Cobertura contra daños y robos.
                </div>
                <div class="one">
                    <span class="ti-check"></span>Seguro con franquicia de <?php echo $response->franquicia?> €.
                </div>

                <div class="single_car_departure_title">CONDICIONES</div>

                <div class="one">
                    <span class="ti-check"></span>Edad mínima del conductor <?php echo $response->edad_minima?> años.
                </div>
                <div class="one">
                    <span class="ti-check"></span>Antigüedad del carnet de conducir: <?php echo $response->antigüedad_carnet?> años.
                </div>
                <div class="one">
                    <span class="ti-check"></span>Fianza <?php echo $response->fianza?> €.
                </div>

                <div class="single_car_departure_title">COMO RESERVAR</div>

                <div class="one">
                    <span class="ti-check"></span>Envíanos tus datos de contacto (empresa o particular) usando el formulario anexo.
                </div>
                <div class="one">
                    <span class="ti-check"></span>Recibirás una llamada de la oficina seleccionada.
                </div>
                <div class="one">
                    <span class="ti-check"></span>Consúltanos las dudas que tengas.
                </div>
                <div class="one">
                    <span class="ti-check"></span>Si existe disponibilidad, podrás confirmar la reserva.
                </div>
                <div class="one">
                    <span class="ti-check"></span>En caso de no haber disponibilidad, te ofreceremos una solución alternativa.
                </div>
                <div class="one">
                    <span class="ti-check"></span>NO TIENES QUE PAGAR NADA A TRAVÉS DE LA WEB.
                </div>  
        </div>
        <div class="one">
            <select id="kilometraje" name="kilometraje">
                <option value="">Selecciona</option>
                <option value="100">100km extra</option>
                <option value="200">200km extra</option>
                <option value="300">300km extra</option>
            </select>
        </div>
        <div class="one">
            <input id="conductor_adicional" name="conductor_adicional" type="checkbox" value=1>
            <label for="conductor_adicional">Conductor adicional.</label>
        </div>
        <div class="one">
            <input id="conductor_menor" name="conductor_menor" type="checkbox" value=1>
            <label for="conductor_menor">Conductor menor.</label>
        </div>
        <div class="one">
            <input id="reduccion_franquicia" name="reduccion_franquicia" type="checkbox" value=1>
            <label for="reduccion_franquicia">Reducción franquicia.</label>
        </div>                
</div>

<div class="sidebar_wrapper">

    <div class="sidebar_top"></div>

    <div class="sidebar">
    
        <div class="content">
            
            <?php
                //Get car price
                $car_price_day = $importeVehiculo;//get_post_meta($post->ID, 'car_price_day', true);
                $car_price_hour = $importeVehiculo;//get_post_meta($post->ID, 'car_price_hour', true);
                $car_price_airport = $importeVehiculo;//get_post_meta($post->ID, 'car_price_airport', true);
                
                if(!empty($car_price_day) OR !empty($car_price_hour) OR !empty($car_price_airport))
                {
            ?>
            <div class="single_car_header_price">
                <span id="single_car_price_scroll"><?php echo grandcarrental_format_car_price($car_price_day); ?></span>
                <span id="single_car_price_per_unit_change_scroll" class="single_car_price_per_unit">
                    <span id="single_car_unit_scroll"><?php esc_html_e('Per Day', 'grandcarrental' ); ?></span>
                    <span class="ti-angle-down"></span>
                    
                    <ul id="price_per_unit_select_scroll">
                        <li class="icon arrow"></li>
                        <?php
                            if(!empty($car_price_day))
                            {
                        ?>
                        <li class="active">
                            <a class="active" href="javascript:;" data-filter="car_price_day" data-price="<?php echo esc_attr(($car_price_day)); ?>"><?php esc_html_e('Per Day', 'grandcarrental' ); ?></a>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
                            if(!empty($car_price_hour))
                            {
                        ?>
                        <li>
                            <a class="active" href="javascript:;" data-filter="car_price_hour" data-price="<?php echo esc_attr(($car_price_hour)); ?>"><?php esc_html_e('Per Hour', 'grandcarrental' ); ?></a>
                        </li>
                        <?php
                            }
                        ?>
                        <?php
                            if(!empty($car_price_airport))
                            {
                        ?>
                        <li>
                            <a class="active" href="javascript:;" data-filter="car_price_airport" data-price="<?php echo esc_attr(($car_price_airport)); ?>"><?php esc_html_e('Airport Transfer', 'grandcarrental' ); ?></a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </span>
                <hr/>
            </div>
            <?php
                }
            ?>

            <?php
                //Get car booking form
                $car_booking_contactform7 = get_post_meta($post->ID, 'car_booking_contactform7', true);
                $car_booking_product = get_post_meta($post->ID, 'car_booking_product', true);
            ?>
            <div class="single_car_booking_wrapper themeborder <?php if(!empty($car_booking_product) && intval($car_booking_product) > 0) { ?>book_instantly<?php } ?>">
                <?php
                    echo do_shortcode('[tg_formulario_detalle
                        fecha_inicio="'.esc_attr($fechaInicio).'"
                        hora_inicio="'.esc_attr($horaInicio).'"
                        fecha_fin="'.esc_attr($fechaFin).'"
                        hora_fin="'.esc_attr($horaFin).'"
                        nombre_delegacion="'.esc_attr($nombreDelegacion).'"
                    ][/tg_formulario_detalle]');
                    // if(!empty($car_booking_contactform7) && intval($car_booking_contactform7) > 0)
                    // {
                    //     echo do_shortcode('[contact-form-7 id="'.esc_attr($car_booking_contactform7).'"]');
                    // }

                    if(class_exists('Woocommerce') && !empty($car_booking_product) && intval($car_booking_product) > 0)
                    {
                ?>
                    <div class="single_car_booking_divider">
                        <span class="single_car_booking_divider_content"><?php esc_html_e("or", 'grandcarrental'); ?></span>
                    </div>
                    <div class="single_car_booking_woocommerce_wrapper">
                        <button data-product="<?php echo esc_attr($car_booking_product); ?>" data-processing="<?php esc_html_e("Please wait...", 'grandcarrental'); ?>" data-url="<?php echo admin_url('admin-ajax.php').esc_attr("?action=grandcarrental_add_to_cart&product_id=".$car_booking_product); ?>" class="single_car_add_to_cart button"><?php esc_html_e("Book Instantly", 'grandcarrental'); ?></button>
                    </div>
                <?php
                    }

                    $car_view_count = grandcarrental_get_post_view($post->ID, true);
                    if($car_view_count > 10)
                    {
                ?>
                <div class="single_car_view_wrapper themeborder">
                    <div class="single_car_view_desc">
                        <?php esc_html_e("This car's been viewed", 'grandcarrental'); ?>&nbsp;<?php echo number_format($car_view_count); ?>&nbsp;<?php esc_html_e("times in the past week", 'grandcarrental'); ?>
                    </div>
                    
                    <div class="single_car_view_icon ti-alarm-clock"></div>
                </div>
                <br class="clear"/>
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
                if (function_exists('users_online') && !isset($_COOKIE['grandcarrental_users_online'])): ?>
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
    <br class="clear"/>

    <div class="sidebar_bottom"></div>
</div>

</div>
<!-- End main content -->

<?php
$tg_car_display_related = kirki_get_option('tg_car_display_related');

if(!empty($tg_car_display_related))
{
    
$tags = wp_get_object_terms($post->ID, 'cartag');

if($tags) {

    $tag_in = array();
    
      //Get all tags
      foreach($tags as $tags)
      {
          $tag_in[] = $tags->term_id;
      }

      $args=array(
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
      
      if( $my_query->have_posts() ) {
?>
 <br class="clear"/>
  <div class="car_related">
<h3 class="sub_title"><?php echo esc_html_e('Similar cars', 'grandcarrental' ); ?></h3>
<?php
if (have_posts())
{	
?>
<div id="portfolio_filter_wrapper" class="gallery classic three_cols portfolio-content section content clearfix" data-columns="3">
<?php
       while ($my_query->have_posts()) : $my_query->the_post();
   
       $image_url = '';
    $car_ID = get_the_ID();
            
    if(has_post_thumbnail($car_ID, 'grandcarrental-gallery-grid'))
    {
        $image_id = get_post_thumbnail_id($car_ID);
        $small_image_url = wp_get_attachment_image_src($image_id, 'grandcarrental-gallery-grid', true);
    }
    
    $permalink_url = get_permalink($car_ID);
?>
<div class="element grid classic3_cols">
    <div class="one_third gallery3 classic static filterable portfolio_type themeborder" data-id="post-<?php echo esc_attr($car_ID); ?>">
        <?php 
            if(!empty($small_image_url[0]))
            {
        ?>		
                <a class="car_image" href="<?php echo esc_url($permalink_url); ?>">
                    <img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                    <?php
                        //Get car price
                        $car_price = get_post_meta($post->ID, 'car_price', true);
                        
                        if(!empty($car_price))
                        {
                            
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
                        <a class="car_link" href="<?php echo esc_url($permalink_url); ?>"><h4><?php the_title(); ?></h4></a>
                        <?php
                            $overall_rating_arr = grandcarrental_get_review($car_ID, 'overall_rating');
                            $overall_rating = intval($overall_rating_arr['average']);
                            $overall_rating_count = intval($overall_rating_arr['count']);
                            
                            if(!empty($overall_rating))
                            {
                        ?>
                            <div class="car_attribute_rating">
                            <?php
                                if($overall_rating > 0)
                                {
                        ?>
                                <div class="br-theme-fontawesome-stars-o">
                                    <div class="br-widget">
                        <?php
                                    for( $i=1; $i <= $overall_rating; $i++ ) {
                                        echo '<a href="javascript:;" class="br-selected"></a>';
                                    }
                                    
                                    $empty_star = 5 - $overall_rating;
                                    
                                    if(!empty($empty_star))
                                    {
                                        for( $i=1; $i <= $empty_star; $i++ ) {
                                            echo '<a href="javascript:;"></a>';
                                        }
                                    }
                        ?>
                                    </div>
                                </div>
                        <?php
                                }
                                
                                if($overall_rating_count > 0)
                                {
                        ?>
                                <div class="car_attribute_rating_count">
                                    <?php echo intval($overall_rating_count); ?>&nbsp;
                                    <?php
                                        if($overall_rating_count > 1)
                                        {
                                            echo esc_html__('reviews', 'grandcarrental' );
                                        }
                                        else
                                        {
                                            echo esc_html__('review', 'grandcarrental' );
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
                            
                            if(!empty($car_passengers) OR !empty($car_luggages) OR !empty($car_transmission))
                            {
                        ?>
                            <div class="car_attribute_wrapper_icon">
                                <?php
                                    if(!empty($car_passengers))
                                    {
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
                                    if(!empty($car_luggages))
                                    {
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
                                    if(!empty($car_transmission))
                                    {
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
                                
                            </div><br class="clear"/>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="car_attribute_price">
                        <?php
                            //Get car price
                            $car_price_day = get_post_meta($post->ID, 'car_price_day', true); 
                            
                            if(!empty($car_price_day))
                            {   
                        ?>
                        <div class="car_attribute_price_day three_cols">
                            <?php echo grandcarrental_format_car_price($car_price_day); ?>
                            <span class="car_unit_day"><?php esc_html_e('Per Day', 'grandcarrental' ); ?></span>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <br class="clear"/>
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
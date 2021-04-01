<?php

/**
 * Template Name: Flota
 * The main template file for display flota page.
 *
 * @package WordPress
 */
get_header();

list($httpCode, $response) = getApi(URL_API . 'flota-tipo');
// var_dump($response->data);
if ($httpCode != 200) {
    return 'ha petado';
}

$data = $response->data;


?>
<div class="inner">
    <div class="inner_wrapper">
        <?php
        if (!empty($data)) {
        ?>
            <div class="standard_wrapper"></div><br class="clear" /><br />
        <?php
        }
        ?>
        <div id="page_main_content" class="sidebar_content full_width fixed_column">

            <div class="standard_wrapper">

                <div id="portfolio_filter_wrapper" class="gallery classic three_cols portfolio-content section content clearfix" data-columns="3">

                    <?php
                    foreach ($data as $key => $value) {
                        $key++;
                        $image_url = '';
                        $car_ID = get_the_ID();
                        $url = URL_WEB.'/flota/'.$value->url;

                        // if(has_post_thumbnail($car_ID, 'grandcarrental-gallery-grid'))
                        // {
                        //     $image_id = get_post_thumbnail_id($car_ID);
                        //     $small_image_url = wp_get_attachment_image_src($image_id, 'grandcarrental-gallery-grid', true);
                        // }

                        $permalink_url = get_permalink($car_ID);
                    ?>
                        <div class="element grid classic3_cols animated<?php echo esc_attr($key + 1); ?>">

                            <div class="one_third gallery3 classic static filterable portfolio_type themeborder" data-id="post-<?php echo esc_attr($key + 1); ?>">

                                <a class="car_image" href="<?php echo esc_url($permalink_url); ?>">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/flota/<?php echo $value->tipoId; ?>/34.jpg" alt="Iberfurgo - <?php echo $value->nombre; ?>" height="262" title="Iberfurgo - <?php echo $value->nombre; ?>" />
                                    <?php
                                    //Get car price
                                    $car_price = ''; //$value->fianza;

                                    if (!empty($car_price)) {
                                    ?>
                                        <div class="car_price">
                                            <?php echo esc_html($car_price); ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <a class="car_link" href="<?php echo esc_url($permalink_url); ?>">
                                        <h4 class="ibf_title_car"><?php echo $value->nombre; ?></h4>
                                    </a>
                                    <div class="car_attribute_wrapper">
                                        <?php
                                        //Display car attributes
                                        $car_passengers = $value->plazas;
                                        $car_luggages = $value->carga_util;
                                        $car_transmission = $value->puertas;

                                        if (!empty($car_passengers) or !empty($car_luggages) or !empty($car_transmission)) {
                                        ?>
                                            <div class="car_attribute_wrapper_icon">
                                                <?php
                                                if (!empty($car_passengers)) {
                                                ?>
                                                    <div class="one_fourth">
                                                    <div class="ibf_icon_people" title="Pasajeros"></div>
                                                        <div class="car_attribute_content ibf_ml_6">
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
                                                    <div class="ibf_icon_charge" title="Carga"></div>
                                                        <div class="car_attribute_content ibf_mln_6">
                                                            <?php
                                                            echo $car_luggages;
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
                                                        <div class="ibf_icon_door" title="Puertas"></div>
                                                        <div class="car_attribute_content ibf_ml_7">
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
                                        } //car attributes
                                        ?>

                                    </div> <!-- car_attribute_wrapper -->


                                    <div class="car_attribute_price">
                                        <?php
                                            //Get car price
                                            $car_price_day = $value->precioDesde; 
                                            
                                            if(!empty($car_price_day))
                                            {   
                                        ?>
                                                <div class="car_attribute_price_day three_cols">
                                                    <div class="ibf_mr_10"><span><?php esc_html_e('Desde', 'grandcarrental' ); ?></span></div>
                                                    <div class="ibf_mtn_10 ibf_color_orange"><?php echo grandcarrental_format_car_price($car_price_day); ?></div>
                                                    
                                                </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <br class="clear"/>
                                    <a class="button small left ibf_button_flota" href="<?php echo esc_url($url); ?>">Comprobar disponibilidad</a>
                                </div>
                                
                            </div>

                        </div>
                    <?php
                    } //foreach 
                    ?>
                </div>
                <?php
                if (empty($data)) {
                ?>
                    <div class="car_search_noresult"><span class="ti-info-alt"></span><?php esc_html_e("We haven't found any car that matches you're criteria", 'grandcarrental'); ?></div>
                <?php
                }
                ?>
            </div>

        </div>

    </div>

</div> <!-- inner -->
<?php get_footer(); ?>
<?php
/**
 * Template Name: Busqueda
 * The main template file for display busqueda page.
 *
 * @package WordPress
*/

get_header(); 

// global $wp_query;
$delegacionId = $_GET['delegacion_id'];
$fechaInicio = $_GET['fecha_inicio'];
$fechaFin = $_GET['fecha_fin'];
$horaInicio = $_GET['hora_inicio'];
$horaFin = $_GET['hora_fin'];


$dataApi['tipo_tarifa'] = "DAY";
$dataApi['delegacion_id'] = $delegacionId;
$dataApi['fecha_inicio'] = $fechaInicio.' '.$horaInicio;
$dataApi['fecha_fin'] = $fechaFin.' '.$horaFin;

list($httpCode, $response) = getDataApi(URL_API . 'get-tarifa', json_encode($dataApi));
if ($httpCode != 200) {
	return 'ha petado';
}

$data = $response->data;

?>
<div class="inner">
    <div class="inner_wrapper nopadding">
        <?php
            if(!empty($data))
            {
        ?>
                <div class="standard_wrapper"></div><br class="clear"/><br/>
        <?php
            }
        ?>

        <div id="page_main_content" class="sidebar_content fixed_column">
            
            <div class="standard_wrapper">

                <div id="portfolio_filter_wrapper" class="gallery classic two_cols portfolio-content section content clearfix" data-columns="3">    

                <?php 
                    foreach ($data as $key => $value) {
                ?>
                    <div class="car_list_wrapper floatleft noborder">
				        <div class="one">
                            <a class="car_image" href="">
                                <img src="" alt="<?php echo esc_attr($value->tipo->nombre); ?>" />
                            </a>
				        </div>
                        <div class="one">
						    <div class="car_attribute_wrapper car_list">
                                <a class="car_link" href=""><h3><?php echo esc_attr($value->tipo->nombre); ?></h3></a>
                            </div>
                        
                            <br class="clear"/>
                            <?php
                                //Display car attributes
                                $car_passengers = $value->tipo->plazas;
                                $car_luggages = $value->tipo->puertas;
                                $car_transmission = $value->tipo->carga_util;
                        
                                if(!empty($car_passengers) OR !empty($car_luggages) OR !empty($car_transmission))
                                {
                            ?>
                            <div class="one_third">
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
                                    
                                </div>
                                <br class="clear"/>
                            <?php
                                }
                            ?>
                            </div> <!-- one_third -->

                            <div class="two_third last">
                                <?php
                                        $car_included = [];
                                        
                                        if(!empty($car_included))
                                        {
                                    ?>
                                    <ul class="single_car_departure_wrapper themeborder">
                                        <li>
                                            <div class="single_car_departure_content full_width">
                                                <?php
                                                    if(!empty($car_included) && is_array($car_included))
                                                    {
                                                        foreach($car_included as $key => $car_included_item)
                                                        {
                                                            $last_class = '';
                                                            if(($key+1)%2 == 0)	
                                                            {
                                                                $last_class = 'last';
                                                            }
                                                ?>
                                                <div class="one_half <?php echo esc_attr($last_class); ?>">
                                                    <span class="ti-check"></span><?php echo esc_html($car_included_item); ?>
                                                </div>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </li>
                                    </ul>
                                    <?php
                                        }
                                    ?>
                            </div> <!-- two_third -->
                        </div> <!-- one -->
                        <div class="car_attribute_price car_list">
			        	<?php
				         	//Get car price
						 	$car_price_day = $value->importe_vehiculo; 
						 	
						 	if(!empty($car_price_day))
						 	{   
				         ?>
                            <div class="car_attribute_price_day two_cols">
                                <?php echo grandcarrental_format_car_price($car_price_day); ?>
                                <span class="car_unit_day"><?php esc_html_e('Per Day', 'grandcarrental' ); ?></span>
                            </div>
				         <?php
					     	}
					     ?>
                        </div>
		        	</div> <!-- car_list_wrapper -->
                <?php } ?>
                </div> <!-- portfolio -->

            </div> <!-- standard_wrapper -->
        </div> <!-- page main -->
                
                    
                    
    </div> <!-- inner_wrapper -->
</div> <!-- inner -->
<?php get_footer(); ?>
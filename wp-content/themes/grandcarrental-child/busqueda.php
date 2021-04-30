<?php
/**
 * Template Name: Busqueda
 * The main template file for display car page.
 *
 * @package WordPress
*/

/**
*	Get Current page object
**/
if(!is_null($post))
{
	$page_obj = get_page($post->ID);
}

$current_page_id = '';

/**
*	Get current page id
**/

if(!is_null($post) && isset($page_obj->ID))
{
    $current_page_id = $page_obj->ID;
}

$grandcarrental_homepage_style = grandcarrental_get_homepage_style();

//Get page sidebar
$page_sidebar = get_post_meta($current_page_id, 'page_sidebar', true);

if(empty($page_sidebar))
{
	$page_sidebar = 'Page Sidebar';
}

get_header();

$grandcarrental_page_content_class = grandcarrental_get_page_content_class();

//Include custom header feature
get_template_part("/templates/template-header");

//Include custom car search feature
// get_template_part("/templates/template-car-search");


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

<!-- Begin content -->
    
<div class="inner">

	<div class="inner_wrapper nopadding">
	
	<div id="page_main_content" class="sidebar_content full_width">
	
	<div class="standard_wrapper">
		<?php 
		echo do_shortcode('[ppb_car_search 
			delegacionId="'.esc_attr($delegacionId).'"
			fechaInicio="'.esc_attr($fechaInicio).'"
			fechaFin="'.esc_attr($fechaFin).'"
			horaInicio="'.esc_attr($horaInicio).'"
			horaFin="'.esc_attr($horaFin).'"
			][/ppb_car_search]') 
		?>

		<div id="portfolio_filter_wrapper" class="gallery classic two_cols portfolio-content section content clearfix" data-columns="3">
	
	<?php
		$key = 0;
		foreach ($data as $key => $value) {
			$key++;
			$image_url = '';
			$car_ID = get_the_ID();
			$parametros = "tipoId=".$value->tipo_id."&delegacionId=".$delegacionId."&nombreDelegacion=".$value->nombreDelegacion."&fechaInicio=".$fechaInicio."&fechaFin=".$fechaFin."&horaInicio=".$horaInicio."&horaFin=".$horaFin."&tipoId=".$value->tipo_id."&importe_vehiculo=".$value->importe_vehiculo."&importe_vehiculo_iva=".$value->importe_vehiculo_iva."&tramo_id=".$value->id."&dias=".$value->dias."&euros_dia=".$value->eur_dia;
	?>
				<?php 
					if(true) //!empty($small_image_url[0])
					{
				?>
					<div class="car_list_wrapper floatleft themeborder">
						<div class="one_third">
 							<a class="car_image" href="<?php echo site_url()?>/paso-final?<?php echo $parametros?>">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/flota/<?php echo $value->tipo->tipoId; ?>/34.jpg" alt="<?php echo esc_attr(get_the_title()); ?>" />
							</a>
						</div>
				
						<div class="two_third last">
							<div class="car_attribute_wrapper">
								<a class="car_link" href="<?php echo site_url()?>/paso-final?<?php echo $parametros?>">
									<h3 class="ibf_color_orange"><?php echo esc_attr($value->tipo->nombre); ?></h3>
								</a>
							
								<?php
									//Display car attributes
									$car_passengers = $value->tipo->plazas;
									$car_m3 = $value->tipo->m3;
									$car_carga_util = $value->tipo->carga_util;
									$car_doors = $value->tipo->puertas;
							
									if(!empty($car_passengers) OR !empty($car_m3) OR !empty($car_carga_util) OR !empty($car_doors))
									{
								?>
								<div class="car_attribute_wrapper_icon">
									<?php
										if(!empty($car_passengers))
										{
									?>
										<div class="one_sixth ibf_width_19">
											<div class="ibf_float_left ibf_mr_15" title="Pasajeros"></div>
											<div class="car_attribute_content ibf_mt_0 ibf_font_16">
												<img class="ibf_float_left ibf_mr_15" src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_passengers_30_black.png" title="Plazas">
												<p class="ibf_float_left ibf_mtn_10"><?php echo intval($car_passengers);?></p>
											</div>
										</div>
									<?php
										}
									?>
									
									<?php
										if(!empty($car_m3))
										{
									?>
										<div class="one_sixth ibf_width_19">
											<div class="ibf_float_left ibf_mr_15" title="Carga"></div>
											<div class="car_attribute_content ibf_mt_0 ibf_font_16">
												<img class="ibf_float_left ibf_mr_15"  src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_vol_30_black.png" title="Capacidad">
												<p class="ibf_float_left ibf_mtn_10"><?php echo intval($car_m3); ?> m<sup>3</sup></p>
											</div>
										</div>
									<?php
										}
									?>
									
									<?php
										if(!empty($car_carga_util))
										{
									?>
										<div class="one_sixth ibf_width_19">
											<div class="ibf_float_left ibf_mr_15" title="Puertas"></div>
											<div class="car_attribute_content ibf_mt_0 ibf_font_16">
												<img class="ibf_float_left ibf_mr_15"  src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_charge_30_black.png" title="Carga"> 
												<p class="ibf_float_left ibf_mtn_10"><?php echo ucfirst($car_carga_util); ?></p>
											</div>
										</div>
									<?php
										}
									?>
									
									<?php
										if(!empty($car_doors))
										{
									?>
										<div class="one_sixth last ibf_width_19">
											<div class="ibf_float_left ibf_mr_15" title="Puertas"></div>
											<div class="car_attribute_content ibf_mt_0 ibf_font_16">
											<img class="ibf_float_left ibf_mr_15"  src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/iconos/ibf_icon_door_30_black.png" title="Puertas">
											<p class="ibf_float_left ibf_mtn_10"><?php echo intval($car_doors); ?></p>
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
							</div>
							<div class="car_attribute_price">
								<?php
									//Get car price
									$car_price_day = $value->importe_vehiculo; 
									
									if(!empty($car_price_day))
									{   
								?>
								<div class="car_attribute_price_day two_cols ibf_color_orange">
									<?php echo grandcarrental_format_car_price($car_price_day); ?>
									<span class="car_unit_day"><?php esc_html_e('+ IVA', 'grandcarrental' ); ?></span>
								</div>
								<?php
									}
								?>
							</div>
							<?php
								$car_included = [];
								$car_included[] = "Fianza: ".$value->tipo->fianza."€";
								$car_included[] = "Franquicia: ".$value->tipo->completa."€";
								$car_included[] = "Km diarios: ".$value->tipo->km_diarios;
								$car_included[] = "Importe km extra: ".$value->tipo->km_extras."€";
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
										<div class="one_half <?php echo esc_attr($last_class); ?> ibf_font_16">
											<span class="ti-check ibf_color_orange"></span><?php echo esc_html($car_included_item); ?>
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
							<a class="button left small ibf_button_result ibf_font_16" href="<?php echo site_url()?>/paso-final?<?php echo $parametros?>">Ver condiciones <i class="fas fa-angle-right"></i></a>
						</div>
						
						
					</div>
			<?php
				} //if(!empty($small_image_url[0]))
			?>
	<?php
        }
        if (empty($data)) {
	?>
			<!-- <div class="car_search_noresult"><span class="ti-info-alt"></span><?php esc_html_e("We haven't found any car that matches you're criteria", 'grandcarrental'); ?></div> -->
	<?php
        }
	?>
		
	</div>
	<br class="clear"/>
	
	
	</div>
	</div>

	

</div>
</div>
</div>
<?php get_footer(); ?>
<!-- End content -->
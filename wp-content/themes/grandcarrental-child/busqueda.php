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
get_template_part("/templates/template-car-search");


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
<?php
	//Get all portfolio items for paging
	$wp_query = grandcarrental_get_wp_query();
	$current_photo_count = $wp_query->post_count;
	$all_photo_count = $wp_query->found_posts;
?>
    
<div class="inner">

	<div class="inner_wrapper nopadding">
	
	<?php
	    if(!empty($post->post_content) && empty($term))
	    {
	?>
	    <div class="standard_wrapper"><?php echo grandcarrental_apply_content($post->post_content); ?></div><br class="clear"/><br/>
	<?php
	    }
	?>
	
	<div id="page_main_content" class="sidebar_content full_width">
	
	<div class="standard_wrapper">
	
	<div id="portfolio_filter_wrapper" class="gallery classic two_cols portfolio-content section content clearfix" data-columns="3">
	
	<?php
		$key = 0;
		foreach ($data as $key => $value) {
			$key++;
			$image_url = '';
			$car_ID = get_the_ID();
			$parametros = "tipoId=".$value->tipo_id."&delegacionId=".$delegacionId."&nombreDelegacion=".$value->nombreDelegacion."&fechaInicio=".$fechaInicio."&fechaFin=".$fechaFin."&horaInicio=".$horaInicio."&horaFin=".$horaFin."&tipoId=".$value->tipo_id."&importe_vehiculo=".$value->importe_vehiculo."&importe_vehiculo_iva=".$value->importe_vehiculo_iva."&tramo_id=".$value->id."&dias=".$value->dias."&euros_dia=".$value->eur_dia;
					
			if(has_post_thumbnail($car_ID, 'grandcarrental-gallery-list'))
			{
			    $image_id = get_post_thumbnail_id($car_ID);
			    $small_image_url = wp_get_attachment_image_src($image_id, 'grandcarrental-gallery-list', true);
			}
			
			$permalink_url = get_permalink($car_ID);
	?>
			<?php 
				if(true) //!empty($small_image_url[0])
				{
			?>
			<div class="car_list_wrapper floatleft themeborder">
				<div class="one_third">
					<a class="car_image" href="<?php echo esc_url($permalink_url); ?>">
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
					</a>
				</div>
				
				<div class="two_third last">
						<div class="car_attribute_wrapper">
							<a class="car_link" href="paso-final?<?php echo $parametros?>"><h3><?php echo esc_attr($value->tipo->nombre); ?></h3></a>
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
							$car_passengers = $value->tipo->plazas;
							$car_luggages = $value->tipo->puertas;
							$car_transmission = $value->tipo->carga_util;
							$car_doors = $value->tipo->carga_util;
			    	
							if(!empty($car_passengers) OR !empty($car_luggages) OR !empty($car_transmission) OR !empty($car_doors))
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
								
								<?php
									if(!empty($car_doors))
									{
								?>
									<div class="one_fourth last">
										<div class="car_attribute_icon ti-car"></div>
										<div class="car_attribute_content">
											<?php echo intval($car_doors); ?>&nbsp;
											<?php esc_html_e("Doors", 'grandcarrental'); ?>
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
		        		<?php
						    $car_included = [];//get_post_meta($post->ID, 'car_included', true);
							$car_included[] = "Fianza: ".$value->tipo->fianza."€";
							$car_included[] = "Franquicia: ".$value->tipo->franquicia."€";
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
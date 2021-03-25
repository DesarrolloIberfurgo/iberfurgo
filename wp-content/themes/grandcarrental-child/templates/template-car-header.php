<?php
/**
*	Get Current page object
**/
$page = get_page($post->ID);

/**
*	Get current page id
**/

if(!isset($current_page_id) && isset($page->ID))
{
    $current_page_id = $page->ID;
}

//Get page header display setting
$page_title = get_the_title();
$page_menu_transparent = 0;

$tg_car_single_header = kirki_get_option('tg_car_single_header');

// if(has_post_thumbnail($current_page_id, 'original') && !empty($tg_car_single_header))
// {
	$pp_page_bg = '';
	
	//Get page featured image
	$image_id = get_post_thumbnail_id($current_page_id); 
    $image_thumb = wp_get_attachment_image_src($image_id, 'original', true);
    
    if(isset($image_thumb[0]) && !empty($image_thumb[0]))
    {
    	$pp_page_bg = $image_thumb[0];
    	$page_menu_transparent = 1;
    }
    
    $grandcarrental_topbar = grandcarrental_get_topbar();
	$grandcarrental_screen_class = grandcarrental_get_screen_class();

	$tipoId = $_GET['tipoId'];
	$pp_page_bg = get_stylesheet_directory_uri()."/imagenes_iberfurgo/flota/".$tipoId."/34.jpg";
	
?>
<div id="page_caption" class="<?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($grandcarrental_topbar)) { ?>withtopbar<?php } ?> <?php if(!empty($grandcarrental_screen_class)) { ?>split<?php } ?>" <?php if(!empty($pp_page_bg)) { ?>style="background-image:url(<?php echo $pp_page_bg; ?>);"<?php } ?>>
	
	<div class="single_car_header_content">
		<div class="standard_wrapper">
			<?php
				//Get car price
				$importeVehiculo = $_GET['importe_vehiculo'];
				$car_price_day = $importeVehiculo;
				$car_price_hour = $importeVehiculo;
				$car_price_airport = $importeVehiculo;
				
				if(!empty($car_price_day) OR !empty($car_price_hour) OR !empty($car_price_airport))
				{
			?>
			<div class="single_car_header_price">
				<?php
					if(empty($car_price_day))
					{
						$car_price_day = $car_price_hour;
						$default_price_unit = esc_html__('Per Hour', 'grandcarrental' );
					}
					else
					{
						$default_price_unit = esc_html__('Per Day', 'grandcarrental' );
					}
				?>
				<span id="single_car_price"><?php echo grandcarrental_format_car_price($car_price_day); ?></span>
				<span id="single_car_price_per_unit_change" class="single_car_price_per_unit">
					<span id="single_car_unit"><?php echo esc_attr($default_price_unit); ?></span>
					<span class="ti-angle-down"></span>
					
					<ul id="price_per_unit_select">
						<li class="icon arrow"></li>
						<?php
							if(!empty($car_price_day))
							{
						?>
						<li class="active">
							<a class="active" href="javascript:;" data-filter="car_price_day" data-price="<?php echo esc_attr(grandcarrental_format_car_price($car_price_day)); ?>"><?php esc_html_e('Per Day', 'grandcarrental' ); ?></a>
						</li>
						<?php
							}
						?>
						<?php
							if(!empty($car_price_hour))
							{
						?>
						<li>
							<a class="active" href="javascript:;" data-filter="car_price_hour" data-price="<?php echo esc_attr(grandcarrental_format_car_price($car_price_hour)); ?>"><?php esc_html_e('Per Hour', 'grandcarrental' ); ?></a>
						</li>
						<?php
							}
						?>
						<?php
							if(!empty($car_price_airport))
							{
						?>
						<li>
							<a class="active" href="javascript:;" data-filter="car_price_airport" data-price="<?php echo esc_attr(grandcarrental_format_car_price($car_price_airport)); ?>"><?php esc_html_e('Airport Transfer', 'grandcarrental' ); ?></a>
						</li>
						<?php
							}
						?>
					</ul>
				</span>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</div>
<?php
// }
?>

<!-- Begin content -->
<?php
	$grandcarrental_page_content_class = grandcarrental_get_page_content_class();
?>
<div id="page_content_wrapper" class="<?php if(!empty($pp_page_bg)) { ?>hasbg <?php } ?><?php if(!empty($pp_page_bg) && !empty($grandcarrental_topbar)) { ?>withtopbar <?php } ?><?php if(!empty($grandcarrental_page_content_class)) { echo esc_attr($grandcarrental_page_content_class); } ?>">
<?php
$banner_image    = '';
$banner_title    = '';
$woo_show_banner = "";
$banner_overlay = "";
if ( defined( 'DEVM' ) ) {

	$woo_show_banner          = carrental_option('woo_show_banner');

	if ("yes" !== $woo_show_banner) {
		return;
	}

	$banner_settings        = carrental_option('carrental_shop_banner_setting');
	$banner_woo_image       = carrental_option('banner_woo_image');
	$banner_overlay         = carrental_option('show_woo_banner_overlay');
	$woo_banner_title_color = carrental_option('woo_banner_title_color');
	$banner_image           = CARRENTAL_IMG.'/banner/bredcumbs-1.png';

	//image
	if( $banner_woo_image != '' ){
		$banner_image = wp_get_attachment_image_url($banner_woo_image, "full");
	}
}else{
	//default
	$banner_title    = get_the_title();
	$banner_image    = CARRENTAL_IMG.'/banner/bredcumbs-1.png';
	$banner_overlay  = "yes";
	$woo_banner_title_color = "#010103";
}
if( $banner_image != ''){
	$banner_image = 'style="background-image:url('.esc_url( $banner_image ).');"';
}

?>

<section class="xs-jumbotron d-flex align-items-center  xs_single_blog_banner  banner-bg" <?php echo wp_kses_post( $banner_image ); ?>>
	<?php if ($banner_overlay === 'yes') {
		$banner_overlay_color = "";
		if ( defined( 'DEVM' ) ) {
			$banner_overlay_color = carrental_option("woo_banner_overlay_color");
		}
		?>
	<div class="xs-solid-overlay" style="background-color: <?php echo esc_attr($banner_overlay_color === '' ? 'rgba(255,255,255,.95)' : $banner_overlay_color); ?>"></div>
	<?php }; ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="xs-jumbotron-content-wraper">
					<h1 class="xs-jumbotron-title" style="color: <?php echo esc_attr($woo_banner_title_color === '' ? '#010103' : $woo_banner_title_color); ?>">
						<?php
						if(is_archive()){
							the_archive_title();
						}elseif(is_single()){
							the_title();
						}else{
							wp_title();
						}
						?>
					</h1>

				</div>
			</div>
		</div>
	</div>
</section>
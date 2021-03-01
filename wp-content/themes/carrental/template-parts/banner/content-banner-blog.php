<?php
   $banner_image    =  '';
   $banner_title    = '';

if ( defined( 'DEVM' ) ) {
    $blog_show_banner          = carrental_option('blog_show_banner');
    if ( $blog_show_banner !== 'yes' ) {
        return;
    }

   $banner_settings         = carrental_option('blog_banner_setting');
   $blog_show_breadcrumb    = carrental_option('blog_show_breadcrumb');
   $blog_banner_title       = carrental_option('blog_banner_title');
   $banner_blog_image       = carrental_option('banner_blog_image');
   $banner_overlay          = carrental_option('show_blog_banner_overlay');
   $blog_banner_title_color = carrental_option('blog_banner_title_color');

   //image
   $banner_image = ($banner_blog_image != '') ? wp_get_attachment_image_url($banner_blog_image, "full") : CARRENTAL_IMG.'/banner/bredcumbs-1.png';

   //title
   $banner_title = ($blog_banner_title != '') ? $blog_banner_title : get_bloginfo( 'name' );

   //breadcumb
   $show_breadcrumb =  (isset($blog_show_breadcrumb)) ? $blog_show_breadcrumb : 'yes';

 }else{
     //default
   $banner_image    = CARRENTAL_IMG.'/banner/bredcumbs-1.png';
   $banner_title    = get_bloginfo( 'name' );
   $show_breadcrumb = 'yes';
   $banner_overlay  = 'yes';
   $blog_banner_title_color = "#010103";
 }
if( isset($banner_image) && $banner_image != ''){
    $banner_image = 'style="background-image:url('.esc_url( $banner_image ).');"';
}

$wraper_class = 'xs-jumbotron d-flex align-items-center ';
if (is_single() || is_search() || is_home()) {
    $wraper_class .= ' xs_single_blog_banner ';
}
?>


<section class="<?php echo esc_attr($wraper_class); echo esc_attr($banner_image == '' ?' banner-solid':' banner-bg'); ?>" <?php echo wp_kses_post( $banner_image ); ?>>
    <?php if ($banner_overlay === 'yes') {
        $banner_overlay_color = "";
		if ( defined( 'DEVM' ) ) {
			$banner_overlay_color = carrental_option("blog_banner_overlay_color");
		}
        ?>
    <div class="xs-solid-overlay" style="background-color: <?php echo esc_attr($banner_overlay_color === '' ? 'rgba(255,255,255,.95)' : $banner_overlay_color); ?>"></div>
    <?php }; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="xs-jumbotron-content-wraper">
                    <h1 class="xs-jumbotron-title" style="color: <?php echo esc_attr($blog_banner_title_color === '' ? '#010103' : $blog_banner_title_color); ?>">
                        <?php
                        if(is_archive()){
                            the_archive_title();
                        }elseif(is_single()){
                            the_title();
                        }else {
                            echo esc_html($banner_title);
                        }
                        ?>
                    </h1>

                    <?php if(isset($show_breadcrumb) && $show_breadcrumb == 'yes'): ?>
                        <?php carrental_get_breadcrumbs(" > "); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

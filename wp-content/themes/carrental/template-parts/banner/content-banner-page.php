<?php
$banner_image = '';
$banner_title = '';

if ( defined( 'DEVM' ) ) {
    $page_show_banner      = carrental_option('page_show_banner');
    $page_meta_show_banner = carrental_meta_option( get_the_ID(), 'page_meta_show_banner' );

    if( $page_meta_show_banner != 'yes' ){
        return;
    } elseif ( $page_show_banner != 'yes' ){
        return;
    }

    $page_banner_title        = carrental_option('page_banner_title');
    $banner_page_image        = carrental_option('banner_page_image');
    $page_show_breadcrumb     = carrental_option('page_show_breadcrumb');
    $banner_overlay           = carrental_option('show_page_banner_overlay');
    $page_banner_title_color  = carrental_option('page_banner_title_color');

    $banner_image             = carrental_meta_option( get_the_ID(), 'header_image' );
    $page_meta_show_breadcumb = carrental_meta_option( get_the_ID(), 'page_meta_show_breadcumb' );

    //title
    if( carrental_meta_option( get_the_ID(), 'header_title' ) !== '' ){
        $banner_title = carrental_meta_option( get_the_ID(), 'header_title' );
    } elseif ( $page_banner_title !== '' ){
        $banner_title = $page_banner_title;
    } else {
        $banner_title   = get_the_title();
    }

    //image
    if( $banner_image != '' ){
        $banner_image = wp_get_attachment_image_url($banner_image, "full");
    } elseif ( $banner_page_image != '' ){
        $banner_image = wp_get_attachment_image_url($banner_page_image, "full");
    } else {
        $banner_image = CARRENTAL_IMG.'/banner/bredcumbs-1.png';
    }

} else {
     //default
     $banner_image = CARRENTAL_IMG.'/banner/bredcumbs-1.png';
     $banner_title = get_the_title();
     $page_banner_title_color = "#010103";
 }

 if( $banner_image != '' ){
    $banner_image = 'style="background-image:url('.esc_url( $banner_image ).');"';
 }

?>

<section class="xs-jumbotron xs-innner-page-banner d-flex align-items-center <?php echo esc_attr($banner_image == ''?'banner-solid':'banner-bg'); ?>" <?php echo wp_kses_post( $banner_image ); ?>>
    <?php if ($banner_overlay === 'yes') {
        $banner_overlay_color = "";
		if ( defined( 'DEVM' ) ) {
			$banner_overlay_color = carrental_option("page_banner_overlay_color");
		}
        ?>
    <div class="xs-solid-overlay" style="background-color: <?php echo esc_attr($banner_overlay_color === '' ? 'rgba(255,255,255,.95)' : $banner_overlay_color); ?>"></div>
    <?php }; ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="xs-jumbotron-content-wraper">
                    <h1 class="xs-jumbotron-title" style="color: <?php echo esc_attr($page_banner_title_color === '' ? '#010103' : $page_banner_title_color); ?>">
                        <?php
                        if(is_archive()){
                            the_archive_title();
                        }elseif(is_single()){
                            the_title();
                        }
                        else{
                            echo wp_kses_post( $banner_title);
                        }
                        ?>
                    </h1>
                    <?php
                    if( $page_show_breadcrumb === 'yes' ){
                        carrental_get_breadcrumbs(" / ");
                    } elseif ( $page_meta_show_breadcumb === 'yes' ){
                        carrental_get_breadcrumbs(" / ");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
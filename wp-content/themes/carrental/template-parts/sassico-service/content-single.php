<?php

$client = '';
$service_sub_title = '';
$service_title = '';
$service_exerpt = '';
$client_uri = '';
$client_site_text = '';
$service_category = '';
$service_publish_date = '';
$show_social = '';

if(defined('FW')){
    $client =   fw_get_db_post_option(get_the_ID(), 'sassico_service_details_client', '');
    $service_sub_title =   fw_get_db_post_option(get_the_ID(), 'sassico_service_details__sub_title', '');
    $service_title =   fw_get_db_post_option(get_the_ID(), 'sassico_service_details__title', '');
    $service_exerpt =   fw_get_db_post_option(get_the_ID(), 'sassico_service_details__exerpt', '');
    $client_uri =   fw_get_db_post_option(get_the_ID(), 'sassico_service_details_client_site_uri', '');
    $client_site_text =   fw_get_db_post_option(get_the_ID(), 'sassico_service_details_client_site_text', '');
    $service_category =   fw_get_db_post_option(get_the_ID(), 'sassico_service_details_category', '');
    $service_publish_date =   fw_get_db_post_option(get_the_ID(), 'sassico_service_details_date', '');
    $show_social =   fw_get_db_post_option(get_the_ID(), 'sassico_service_details_client_social', '');
}


?>
<div class="container">
    <div class="row sassico-service-info-wraper">
        <div class="col-lg-6 align-self-center">
            <div class="saasico-service-info">
                <?php if ($service_sub_title != '') { ?>
                <h2 class="sassico-service-info-subtitle"><?php echo esc_html($service_sub_title); ?></h2>
                <?php }; ?>
                <?php if ($service_title != '') { ?>
                <h3 class="sassico-service-info-title"><?php echo esc_html($service_title); ?></h3>
                <?php }; ?>
                <?php if ($service_exerpt != '') { ?>
                <p class="sassico-service-info-exerpt"><?php echo esc_html($service_exerpt); ?></p>
                <?php }; ?>
                <?php if ($client_uri != '' && $client_site_text != '') { ?>
                <a class="btn btn-outline-primary" rel="nofollow" href="<?php echo esc_url($client_uri); ?>"><?php echo esc_html($client_site_text); ?><i class="fa fa-angle-right"></i></a>
                <?php }; ?>
                <hr>
                <?php if ($service_category != '' || $service_publish_date != '' || $client != '' || $show_social != 'no') { ?>
                <div class="sassico-service-infos">
                    <?php if ($service_category != '') { ?>
                    <div class="sassico-service-info">
                        <span><?php echo esc_html__('Categories : ', 'sassico'); ?></span><?php echo esc_html($service_category); ?>
                    </div>
                    <?php }; ?>
                    <?php if ($service_publish_date != '') { ?>
                    <div class="sassico-service-info">
                        <span><?php echo esc_html__('Date : ', 'sassico'); ?></span><?php echo esc_html($service_publish_date); ?>
                    </div>
                    <?php }; ?>
                    <?php if ($client != '') { ?>
                    <div class="sassico-service-info">
                        <span><?php echo esc_html__('Client : ', 'sassico'); ?></span><?php echo esc_html($client); ?>
                    </div>
                    <?php }; ?>
                    <?php if ($show_social != 'no') { ?>
                    <div class="sassico-service-info">
                        <span><?php echo esc_html__('Share : ', 'sassico'); ?></span>
                        <ul class="sassico_social_share">
                            <li><a href="#" data-social="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" data-social="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" data-social="pinterest"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" data-social="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <?php }; ?>
                </div>
                <?php }; ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="sassico-service-single-image">
                <?php 
                    echo the_post_thumbnail('full');
                ?>
            </div>
        </div>
    </div>
</div>
<?php
the_content();
?>
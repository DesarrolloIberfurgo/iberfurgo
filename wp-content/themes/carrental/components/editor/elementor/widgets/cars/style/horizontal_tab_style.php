<div class="horizontal_car_tab_style">
    <div class="horizontal_car_tab_gallery-thumbs--container">
        <div class="horizontal_car_tab_gallery-thumbs--wraper">
            <div class="swiper-container horizontal_car_tab_gallery-thumbs">
                <div class="swiper-wrapper">
                <?php
                    $counter = 1;
                    while($cars->have_posts()){
                        $cars->the_post();
                        ?>
                        <div class="swiper-slide" role="presentation">
                            <span class="horizontal_car_tab_gallery-title"><?php echo esc_html(get_the_title()); ?></span>
                        </div>
                        <?php
                        $counter++;
                    };
                ?>
                </div>
            </div>
        </div>
        <div class="car-button-next horizontal_car_tab_button"><i class="<?php echo esc_attr( $car_slider_right_icon )?>"></i></div>
        <div class="car-button-prev horizontal_car_tab_button"><i class="<?php echo esc_attr( $car_slider_left_icon)?>"></i></div>
    </div>
    <div class="swiper-container horizontal_car_tab_gallery-top">
        <div class="swiper-wrapper">
            <?php
            $cnt = 1;
            while($cars->have_posts()){
                $cars->the_post();
                ?>
                <!-- Vehicle 1 data start -->
                <div class="swiper-slide">
                    <div class="row">
                        <?php $image = get_field('car_image');
                        if( !empty( $image ) ) { ?>
                        <div class="col-md-8 align-self-center">
                            <div class="vehicle-img">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-4">
                            <div class="car-details-container">
                                <?php if ("" != get_field('car_price')) { ?>
                                    <div class="vehicle-prices">
                                        <span class="vehicle-price-rate"><?php the_field('car_price'); ?></span>
                                        <span class="info"><?php the_field('car_price_title'); ?></span>
                                    </div>
                                <?php } ?>
                                <!-- Car details -->
                                <?php if( have_rows('car_details') ) { ?>
                                <ul class="car-details list-unstyled">
                                <?php while( have_rows('car_details') ) { the_row();
                                    ?>
                                    <li>
                                        <?php if (get_sub_field('item_icon')  && "yes" == $show_car_details_icon) { ?>
                                        <span class="car-details-icon"><img src="<?php echo get_sub_field('item_icon'); ?>" alt="<?php echo get_sub_field('item_title'); ?>"></span>
                                        <?php } ?>
                                        <span class="car-details-title"><?php echo get_sub_field('item_title'); ?>:</span>
                                        <span class="car-details-content"><?php echo get_sub_field('item_details'); ?></span>
                                    </li>
                                <?php }; ?>
                                </ul>
                                <!-- car details end -->
                                <?php }; ?>
                                <?php if ("" != get_field('button_title') || "" != get_field('phone_number')) { ?>
                                <div class="cars-button-holder">
                                    <?php if ("" != get_field('button_title')) { ?>
                                        <a href="<?php the_field('button_link'); ?>" class="gradient-button">
                                            <span class="button-text"><?php the_field('button_title'); ?></span>
                                            <?php if ("" != $reserve_button_icon) { ?>
                                            <span class="<?php echo esc_attr( $reserve_button_icon ); ?> button-icon"></span>
                                            <?php }?>
                                        </a>
                                    <?php } ?>
                                    <?php if ("" != get_field('phone_number')) { ?>
                                        <a href="tel:<?php the_field('phone_number'); ?>" class="btn-link car-btn-link">
                                            <?php if ("" != $phone_button_icon) { ?>
                                            <span class="<?php echo esc_attr( $phone_button_icon ); ?> button-icon"></span>
                                            <?php }?>
                                            <span class="button-text"><?php the_field('phone_number'); ?></span>
                                        </a>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Vehicle 1 data end -->
                <?php
                $cnt++;
            };
            ?>
        </div>
    </div>
</div>
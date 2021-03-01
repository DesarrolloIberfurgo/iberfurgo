<div class="row xs-car-vehicles">
    <div class="col-md-3">
        <div class="wow fadeInUp"  data-wow-offset="100">
            <div class="vehicle-nav-container">
                <ul class="vehicle-tab-nav">
                    <?php
                    $counter = 1;
                    while($cars->have_posts()){
                        $cars->the_post();
                        ?>
                        <li <?php echo ($counter == 1) ? 'class="active"' : ''; ?>>
                            <a href="#tab-cont-<?php echo $this->get_id() ."-". $counter; ?>"><?php echo esc_html(get_the_title()); ?></a><span class="active">&nbsp;</span>
                        </li>
                        <?php
                        $counter++;
                    };
                    ?>
                </ul>
            </div>
            <select class="select-vehicle-data">
            <?php
                $counter = 1;
                while($cars->have_posts()){
                    $cars->the_post();
                    ?>
                    <option value="#tab-cont-<?php echo $this->get_id() ."-". $counter; ?>"><?php echo esc_html(get_the_title()); ?></option>
                    <?php
                    $counter++;
                };
                ?>
            </select>
            <div class="vehicle-nav-control">
                <a class="vehicle-nav-scroll" data-direction="up" href="#"><i class="<?php echo esc_attr( $car_slider_left_icon )?>"></i></a>
                <a class="vehicle-nav-scroll" data-direction="down" href="#"><i class="<?php echo esc_attr( $car_slider_right_icon )?>"></i></a>
            </div>
        </div>
    </div>
    <!-- Vehicle nav end -->
    <div class="col-lg-9">
        <?php
        $cnt = 1;
        while($cars->have_posts()){
            $cars->the_post();
            ?>
            <!-- Vehicle 1 data start -->
            <div class="vehicle-data" id="tab-cont-<?php echo $this->get_id() . '-' . $cnt; ?>">
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
                        <?php if ("" != get_field('car_price')) { ?>
                            <div class="vehicle-price">
                                <?php the_field('car_price'); ?>
                                <span class="info"><?php the_field('car_price_title'); ?></span>
                            </div>
                        <?php } ?>
                        <?php if( have_rows('car_details') ) { ?>
                        <!-- Car details -->
                        <table class="table vehicle-features">
                            <tbody>
                            <?php while( have_rows('car_details') ) { the_row(); ?>
                                <tr>
                                    <td>
                                        <?php if (get_sub_field('item_icon') && "yes" == $show_car_details_icon) { ?>
                                        <img class="vehicle-features-icon" src="<?php echo get_sub_field('item_icon'); ?>" alt="<?php echo get_sub_field('item_title'); ?>">
                                        <?php } ?>
                                        <?php echo get_sub_field('item_title'); ?>
                                    </td>
                                    <td><?php echo get_sub_field('item_details'); ?></td>
                                </tr>
                            <?php }; ?>
                            </tbody>
                        </table>
                        <!-- car details end -->
                        <?php }; ?>

                        <?php if ("" != get_field('button_title') || "" != get_field('phone_number')) { ?>
                        <div class="cars-button-holder">
                            <?php if ("" != get_field('button_title')) { ?>
                                <a href="<?php the_field('button_link'); ?>" class="btn btn-primary reserve-button scroll-to">
                                    <?php if ("" != $reserve_button_icon) { ?>
                                    <span class="<?php echo esc_attr( $reserve_button_icon ); ?>"></span>
                                    <?php }?>
                                    <?php the_field('button_title'); ?>
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
            <!-- Vehicle 1 data end -->
            <?php
            $cnt++;
        };
        ?>
    </div>
</div>
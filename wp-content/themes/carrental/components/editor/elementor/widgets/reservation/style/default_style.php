<div class="reservation-form-shadow">
    <form action="#" method="post" name="car-select-form" class="car-select-form" autocomplete="off">
        <div class="alert alert-danger hidden">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong><?php _e( 'All fields required!', 'carrental' ) ?></strong>
        </div>
        <!-- Car select start -->
        <select name="car-select" class="xs--select car-select">
            <option><?php _e( 'Select your car type', 'carrental' ) ?></option>
            <?php
            while($cars->have_posts()){
                $cars->the_post(); ?>
                <option value="<?php echo htmlspecialchars(json_encode(
                    [
                        "src" => esc_attr(has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID()) : ""),
                        "val" => esc_attr(get_the_title()),
                    ]
                    ), ENT_QUOTES, 'UTF-8')
                ?>"><?php echo esc_html(get_the_title()) ?></option>
            <?php }
            ?>
        </select>
        <!-- Car select end -->
        <!-- Pick-up location start -->
        <div class="location">
            <div class="input-group">
                <span class="input-group-addon"><span class="<?php echo esc_attr( $car_pickup_icon ); ?>"></span><?php echo esc_html( $car_pickup_title ); ?></span>
                <select name="pick-up-location" class="xs--select">
                    <?php foreach ($pickup_points as $key => $value) { ?>
                        <option value="<?php echo esc_attr($value['pickup_point']); ?>"><?php echo esc_html($value['pickup_point']); ?></option>
                    <?php }?>
                </select>
            </div>
            <!-- Pick-up location end -->
            <!-- Drop-off location start -->
            <div class="input-group">
                <span class="input-group-addon"><span class="<?php echo esc_attr( $car_dropof_icon ); ?>"></span><?php echo esc_html( $car_dropof_title ); ?></span>
                <select name="drop-off-location" class="xs--select">
                    <?php foreach ($dropof_points as $key => $value) { ?>
                        <option value="<?php echo esc_attr($value['dropof_point']); ?>"><?php echo esc_html($value['dropof_point']); ?></option>
                    <?php }?>
                </select>
            </div>
            <!-- Drop-off location end -->
        </div>
        <!-- Location end -->

        <div class="rental-datetime">
            <!-- Pick-up date/time start -->
            <div class="input-group">
                <div class="date">
                    <div class="input-group">
                        <span class="input-group-addon pixelfix"><span class="<?php echo esc_attr( $car_pickup_date_icon ); ?>"></span><?php echo esc_html( $car_pickup_title ); ?></span>
                        <input type="text" name="pick-up-date" class="form-control datepicker pick-up-date" placeholder="<?php echo esc_attr( "dd/mm/yyyy" ); ?>">
                    </div>
                </div>
                <div class="time">
                    <div class="styled-select-time">
                        <select name="pick-up-time" class="xs--select">
                            <option value="12:00 AM">12:00 AM</option>
                            <option value="12:30 AM">12:30 AM</option>
                            <option value="01:00 AM">01:00 AM</option>
                            <option value="01:30 AM">01:30 AM</option>
                            <option value="02:00 AM">02:00 AM</option>
                            <option value="02:30 AM">02:30 AM</option>
                            <option value="03:00 AM">03:00 AM</option>
                            <option value="03:30 AM">03:30 AM</option>
                            <option value="04:00 AM">04:00 AM</option>
                            <option value="04:30 AM">04:30 AM</option>
                            <option value="05:00 AM">05:00 AM</option>
                            <option value="05:30 AM">05:30 AM</option>
                            <option value="06:00 AM">06:00 AM</option>
                            <option value="06:30 AM">06:30 AM</option>
                            <option value="07:00 AM">07:00 AM</option>
                            <option value="07:30 AM">07:30 AM</option>
                            <option value="08:00 AM">08:00 AM</option>
                            <option value="08:30 AM">08:30 AM</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="09:30 AM">09:30 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="10:30 AM">10:30 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="11:30 AM">11:30 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="12:30 PM">12:30 PM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="01:30 PM">01:30 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="02:30 PM">02:30 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="03:30 PM">03:30 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                            <option value="04:30 PM">04:30 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                            <option value="05:30 PM">05:30 PM</option>
                            <option value="06:00 PM">06:00 PM</option>
                            <option value="06:30 PM">06:30 PM</option>
                            <option value="07:00 PM">07:00 PM</option>
                            <option value="07:30 PM">07:30 PM</option>
                            <option value="08:00 PM">08:00 PM</option>
                            <option value="08:30 PM">08:30 PM</option>
                            <option value="09:00 PM">09:00 PM</option>
                            <option value="09:30 PM">09:30 PM</option>
                            <option value="10:00 PM">10:00 PM</option>
                            <option value="10:30 PM">10:30 PM</option>
                            <option value="11:00 PM">11:00 PM</option>
                            <option value="11:30 PM">11:30 PM</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Pick-up date/time end -->

            <!-- Drop-off date/time start -->
            <div class="input-group">
                <div class="date">
                    <div class="input-group">
                        <span class="input-group-addon pixelfix"><span class="<?php echo esc_attr( $car_dropof_date_icon ); ?>"></span><?php echo esc_html( $car_dropof_title ); ?></span>
                        <input type="text" name="drop-off-date" class="form-control datepicker drop-off-date" placeholder="<?php echo esc_attr( "dd/mm/yyyy" ); ?>">
                    </div>
                </div>
                <div class="time">
                    <div class="styled-select-time">
                        <select name="drop-off-time" class="xs--select">
                            <option value="12:00 AM">12:00 AM</option>
                            <option value="12:30 AM">12:30 AM</option>
                            <option value="01:00 AM">01:00 AM</option>
                            <option value="01:30 AM">01:30 AM</option>
                            <option value="02:00 AM">02:00 AM</option>
                            <option value="02:30 AM">02:30 AM</option>
                            <option value="03:00 AM">03:00 AM</option>
                            <option value="03:30 AM">03:30 AM</option>
                            <option value="04:00 AM">04:00 AM</option>
                            <option value="04:30 AM">04:30 AM</option>
                            <option value="05:00 AM">05:00 AM</option>
                            <option value="05:30 AM">05:30 AM</option>
                            <option value="06:00 AM">06:00 AM</option>
                            <option value="06:30 AM">06:30 AM</option>
                            <option value="07:00 AM">07:00 AM</option>
                            <option value="07:30 AM">07:30 AM</option>
                            <option value="08:00 AM">08:00 AM</option>
                            <option value="08:30 AM">08:30 AM</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="09:30 AM">09:30 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="10:30 AM">10:30 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="11:30 AM">11:30 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="12:30 PM">12:30 PM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="01:30 PM">01:30 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="02:30 PM">02:30 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="03:30 PM">03:30 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                            <option value="04:30 PM">04:30 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                            <option value="05:30 PM">05:30 PM</option>
                            <option value="06:00 PM">06:00 PM</option>
                            <option value="06:30 PM">06:30 PM</option>
                            <option value="07:00 PM">07:00 PM</option>
                            <option value="07:30 PM">07:30 PM</option>
                            <option value="08:00 PM">08:00 PM</option>
                            <option value="08:30 PM">08:30 PM</option>
                            <option value="09:00 PM">09:00 PM</option>
                            <option value="09:30 PM">09:30 PM</option>
                            <option value="10:00 PM">10:00 PM</option>
                            <option value="10:30 PM">10:30 PM</option>
                            <option value="11:00 PM">11:00 PM</option>
                            <option value="11:30 PM">11:30 PM</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- Drop-off date/time end -->
        </div>

        <!-- Button trigger modal -->
        <input type="submit" class="btn btn-primary d-block" data-target="#reservation_modal-<?php echo esc_attr($this->get_id()); ?>" value="<?php _e( 'continue car reservation', 'carrental' ) ?>">
    </form>
</div>
<!-- default_style end -->
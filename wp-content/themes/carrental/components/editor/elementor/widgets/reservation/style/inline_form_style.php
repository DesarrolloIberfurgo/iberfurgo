<div class="reservation-form-shadow reservation-inline-style">
    <form action="#" method="post" name="car-select-form" class="car-select-form" autocomplete="off">
        <div class="alert alert-danger hidden">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong><?php _e( 'All fields required!', 'carrental' ) ?></strong>
        </div>

        <div class="car-reservation-top-panel media">
            <!-- Car select start -->
            <div class="car-select-wraper">
                <p class="input-label"><i class="<?php echo esc_attr( $reservation_form_car_icon ); ?>"></i><?php echo esc_html( $reservation_form_car_type_title ); ?></p>
                <div class="reservation-input-group">
                    <select name="car-select" class="xs--select car-select">
                        <option><?php _e( 'Select your car type', 'carrental' ) ?></option>
                        <?php
                        while($cars->have_posts()){
                            $cars->the_post();
                            $image = get_field('car_image');
                            ?>
                            <option value="<?php echo htmlspecialchars(json_encode(
                                [
                                    "src" => !empty( $image ) ? esc_url($image['url']) : "",
                                    "val" => esc_attr(get_the_title()),
                                ]
                                ), ENT_QUOTES, 'UTF-8')
                            ?>"><?php echo esc_html(get_the_title()) ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <!-- Car select end -->

            <!-- Pick-up and dropoff start -->
            <div class="pickup-and-dropoff-wraper media">
                <!-- Reservation pickup start -->
                <div class="reservation-date-and-time">
                    <span class="input-label"><i class="<?php echo esc_attr( $car_pickup_icon ); ?>"></i><?php echo esc_html( $car_pickup_title ); ?></span>
                    <select name="pick-up-location" class="xs--select">
                        <?php foreach ($pickup_points as $key => $value) { ?>
                            <option value="<?php echo esc_attr($value['pickup_point']); ?>"><?php echo esc_html($value['pickup_point']); ?></option>
                        <?php }?>
                    </select>
                </div>
                <!-- Reservation pickup end -->

                <!-- reservation dropoff start -->
                <div class="reservation-date-and-time">
                    <span class="input-label"><i class="<?php echo esc_attr( $car_dropof_icon ); ?>"></i><?php echo esc_html( $car_dropof_title ); ?></span>
                    <select name="drop-off-location" class="xs--select">
                        <?php foreach ($dropof_points as $key => $value) { ?>
                            <option value="<?php echo esc_attr($value['dropof_point']); ?>"><?php echo esc_html($value['dropof_point']); ?></option>
                        <?php }?>
                    </select>
                </div>
                <!-- reservation dropoff end -->
            </div>
            <!-- pickup and dropoff wraper end -->
        </div>
        <!-- /car-reservation-top-panel -->

        <div class="reservation-form-content">
            <div class="rental-datetime-wraper">
                <!-- Pick-up date/time start -->
                <div class="rental-datetime">
                    <p class="input-label"><i class="<?php echo esc_attr( $car_pickup_date_icon ); ?>"></i><?php echo esc_html( $car_pickup_title ); ?></p>
                    <div class="media">
                        <input type="text" style="--placeholder-color: <?php echo esc_attr( $car_reservation_input_location_color !== "" ? $car_reservation_input_location_color : "#ABABAB" )?>" name="pick-up-date" class="form-control datepicker pick-up-date" placeholder="<?php echo esc_attr( "dd/mm/yyyy" ); ?>">
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
                <!-- Pick-up date/time end -->
                <!-- Drop-off date/time start -->
                <div class="rental-datetime">
                    <p class="input-label"><i class="<?php echo esc_attr( $car_dropof_date_icon ); ?>"></i><?php echo esc_html( $car_dropof_title ); ?></p>
                    <div class="media">
                        <input type="text" style="--placeholder-color: <?php echo esc_attr( $car_reservation_input_location_color !== "" ? $car_reservation_input_location_color : "#ABABAB" )?>" name="drop-off-date" class="form-control datepicker drop-off-date" placeholder="<?php echo esc_attr( "dd/mm/yyyy" ); ?>">
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
                <!-- Drop-off date/time end -->
            </div>

            <!-- Button trigger modal -->
            <input type="submit" class="btn btn-primary d-block" data-target="#reservation_modal-<?php echo esc_attr($this->get_id()); ?>" value="<?php echo esc_html( $reservation_form_button_title ); ?>">
        </div>
        <!-- reservation-form-content end -->
    </form>
</div>
<!-- default_style end -->
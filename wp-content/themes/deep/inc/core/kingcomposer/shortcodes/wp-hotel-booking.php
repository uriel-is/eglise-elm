<?php
if ( ! is_plugin_active( 'wp-hotel-booking/wp-hotel-booking.php' ) ) {
	return;
}
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'hotel_booking_form' => array(
                'name'          => esc_html__( 'Hotel Booking Form', 'deep' ),
                'description'   => esc_html__( 'Booking form for wp hotel booking', 'deep' ),
                'icon'          => 'webnus-reservation',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'vertical'   => __( 'Vertical', 'deep' ),
                                'horizontal' => __( 'Horizontal', 'deep' ),
                            ),
                        ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
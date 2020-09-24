<?php
if ( ! is_plugin_active( 'wp-hotel-booking/wp-hotel-booking.php' ) ) {
	return;
}
vc_map( array(
	'name'			=> __( 'Hotel Booking Form', 'deep' ),
	'base'			=> 'hotel_booking_form',
	'description'	=> 'Booking form for wp hotel booking',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'icon'			=> 'webnus-reservation',
	'params'		=> array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Type', 'deep' ),
			'param_name'	=> 'type',
			'value' 		=> array(
				__( 'Vertical', 'deep' )   => 'vertical',
				__( 'Horizontal', 'deep' ) => 'horizontal',
			),
			'admin_label'	=> true,
			'std'			=> 'vertical',
		),
	)
    
) );
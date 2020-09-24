<?php
if ( ! is_plugin_active( 'wp-hotel-booking/wp-hotel-booking.php' ) ) {
	return;
}
vc_map( array(
	'name'			=> esc_html__( 'Rooms', 'deep' ),
	'base'			=> 'rooms',
	'description'	=> esc_html__( 'Hotel Room', 'deep' ),
	'icon'			=> 'webnus-rooms',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(

		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Select Type', 'deep' ),
			'param_name'	=> 'type',
			'value'			=> array(
				'Grid'					=> 'grid',
				'List'					=> 'list',				
			),
			'std'				=> 'grid',			
		),
		array(
            'type'          => 'textfield',
            'heading'       => __( 'Count of Rooms', 'deep' ),
            'param_name'    => 'room_count',			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Number to show items', 'deep' ),
			'param_name'	=> 'number_row',
			'value'			=> array(
				'Two'			=> 'two',
				'Three'			=> 'three',				
				'For'			=> 'for',				
				'Six'			=> 'six',				
			),
			'std'			=> 'three',	
			'dependency' 	=> array(
				'element'   => 'type',
				'value' 	=> 'grid',
			),
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Enable Pagination', 'deep' ),
            'param_name'    => 'pagination',			
		),		
				
	)
) );
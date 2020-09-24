<?php 
vc_map(array(
	'name'		  => esc_html__( 'Reservation', 'deep' ),
	'base'		  => 'reservation',
	'description' => esc_html__( 'Book a Table', 'deep' ),
	'icon'		  => 'webnus-reservation',
	'category'	  => esc_html__( 'Webnus Shortcodes', 'deep' ),       
	'params'	  => array(
		array(
			'heading'	  => esc_html__( 'Type', 'deep' ),
			'description' => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
			'type'		  => 'dropdown',
			'param_name'  => 'type',
			'value'		  => array(
				esc_html__( 'Type 1', 'deep' ) => '1',
				esc_html__( 'Type 2', 'deep' ) => '2',
				esc_html__( 'Type 3', 'deep' ) => '3',
			),
		),
		array(
			'heading'		=> esc_html__( 'Open Table Restaurant ID', 'deep' ),
			'type'			=> 'textfield',
			'param_name'	=> 'restaurant_id',
			'value'			=> '53425',
			'std'			=> '53425',
			'description'	=> esc_html__( 'Sign up here to get ID: https://www.opentable.com/start/home', 'deep' ),
		),
		array(
			'heading'		=> esc_html__( 'Description', 'deep' ),
			'type'			=> 'textarea',
			'param_name'	=> 'description',
			'value'			=> esc_html__( 'Openning hour is 7:00 am - 11:00 pm every day on week', 'deep' ),
		),
		array(
			'group'			=> 'Class & ID',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Extra Class', 'deep' ),
			'param_name'	=> 'shortcodeclass',
			'value'			=> '',
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop',
		),
		array(
			'group'			=> 'Class & ID',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'ID', 'deep' ),
			'param_name'	=> 'shortcodeid',
			'value'			=> '',
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop',
		),
	)
));
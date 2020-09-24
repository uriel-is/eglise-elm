<?php
vc_map( array(
	'name'			=> esc_html__( 'Widget About', 'deep' ),
	'base'			=> 'widget-about',
	'category'		=> esc_html__( 'Webnus widgets', 'deep' ),
	'icon'			=> 'webnus-about',
	'params'		=> array(

		array(
			'type'			=> 'textfield',
			'heading'		=> __( 'Name', 'deep' ),
			'param_name'	=> 'name',
			'value'			=> '',
			'description'	=> __( 'Please enter your name', 'deep'),
		),

		array(
			'type'			=> 'attach_image',
			'heading'		=> __( 'Image', 'deep' ),
			'param_name'	=> 'image',
			'value'			=> '',
			'description'	=> __( 'Please attach your image', 'deep'),
		),

		array(
			'type'			=> 'textarea',
			'heading'		=> __( 'Description', 'deep' ),
			'param_name'	=> 'description',
			'value'			=> '',
			'description'	=> __( 'Please enter your description', 'deep'),
		),

	),
) );

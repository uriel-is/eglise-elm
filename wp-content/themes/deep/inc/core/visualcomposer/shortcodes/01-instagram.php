<?php
vc_map( array(
	'name'			=> esc_html__( 'Instagram', 'deep' ),
	'base'			=> 'deep-instagram',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'icon'			=> 'webnus-instagram',
	'description'	=> esc_html__( 'Deep Instagram', 'deep' ),
	'params'		=> array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Type', 'deep' ),
			'param_name'	=> 'type',
			'value'			=> array(
				'Default'	=> 'default',
				'Carousel'	=> 'carousel',
				'Grid'		=> 'grid',
			),
			'description'	=> esc_html__( 'Select shortcode type', 'deep'),
			'std'			=> 'default',
		),	
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__( 'TOKEN', 'deep' ),
			'param_name'	=> 'token',
			'value'			=> '',			
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Number of post', 'deep' ),
			'param_name'	=> 'insta_post_number',
			'value'			=> '',			
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
	),
) );
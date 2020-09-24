<?php
vc_map( array(
	'name'			=> esc_html__( 'Socials ', 'deep' ),
	'base'			=> 'webnus-socials',
	'description'	=> esc_html__( 'Webnus socials', 'deep' ),
	'icon'			=> 'webnus-socials',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Type', 'deep' ),
			'param_name'	=> 'type',
			'value'			=> array(
				'Type 1' =>'1',
				'Type 2' =>'2',
				'Type 3' =>'3',
				'Type 4' =>'4',
			),
			'description'	=> esc_html__( 'Please set your socials from theme options > social networks.', 'deep')
		),
		// Class & ID 
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
		
	) )
);
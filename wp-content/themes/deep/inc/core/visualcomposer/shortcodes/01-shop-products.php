<?php
vc_map( array(
	'name'			=> esc_html__( 'Shop Products', 'deep' ),
	'base'			=> 'shop_products',
	'description'	=> esc_html__( 'Shop Products', 'deep' ),
	'icon'			=> 'webnus-shop-products',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(
		array(
			'type'			=> 'text',
			'heading'		=> esc_html__( 'Shop Product Setting', 'deep' ),
			'param_name'	=> 'number_of_columns',
			'value'			=> esc_html__( 'This shortcode uses Theme Options inside settings. Please go to this direction: Theme Options > Shop', 'deep' ),
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
		
	)
) );
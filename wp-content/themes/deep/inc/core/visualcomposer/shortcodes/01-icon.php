<?php
vc_map( array(
    'name'			=> 'Icon',
    'base'			=> 'icon',
	'description'	=> 'Vector font icon',
	'icon'			=> 'webnus-icon',
    'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
    'params'		=> array(
       
        array(
			'type'				=> 'textfield',
			'heading'			=> esc_html__('Icon Size', 'deep'),
			'param_name'		=>  'size',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-12 wn-px',
		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_html__('Icon color', 'deep'),
			'param_name'	=>  'color',
			'value'			=> '',
			'description'	=>  esc_html__( 'Select icon color', 'deep')
			
		),
		 array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Icon Link URL', 'deep'),
			'param_name'	=>  'link',
			'value'			=> '',
			'description'	=>  esc_html__( 'Icon link URL http:// ', 'deep')
			
		),
		array(
            'type'          =>  'checkbox',
            'heading'       =>  esc_html__( 'Open link in a new tab? ', 'deep' ),
            'description'   =>  esc_html__( 'Add Target = _blank', 'deep'),
            'param_name'    =>  'link_target',
            'std'           =>  'false',
        ),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Icon Link Class', 'deep'),
			'param_name'	=>  'link_class',
			'value'			=> '',
			'description'	=>  esc_html__( 'Icon link Class ', 'deep')
			
		),
		array(
			'type'			=>  'colorpicker',
			'heading'		=>  esc_html__( 'Custom background color', 'deep' ),
			'param_name'	=>  'bg_color',
			'value'			=> '',
			'description'	=>  esc_html__( 'Select background color', 'deep')
		),
		array(
			'type'				=> 'textfield',
			'heading'			=> esc_html__('Padding', 'deep'),
			'param_name'		=>  'padding',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-12 wn-px',
		),
		array(
			'type'				=> 'textfield',
			'heading'			=> esc_html__('Border Radius', 'deep'),
			'param_name'		=>  'border_radius',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-12 wn-px',
		),
		array(
			'type'			=>  'textfield',
			'heading'		=>  esc_html__( 'Extra class', 'deep' ),
			'param_name'	=>  'el_class',
			'description'	=>  esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'deep' ),
		),
       array(
            'type'			=>  'iconfonts',
            'heading'		=>  esc_html__( 'Icon', 'deep' ),
            'param_name'	=>  'name',
            'value'			=> '',
            'description'	=>  esc_html__( 'Select Icon', 'deep')
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
		
    ),
) );
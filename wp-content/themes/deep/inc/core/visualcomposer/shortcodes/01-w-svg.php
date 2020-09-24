<?php
vc_map( array(
	'name'			=> esc_html__( 'SVG live icon', 'deep' ),
	'base'			=> 'icon_svg',
	'description'	=> esc_html__( 'SVG live icon', 'deep' ),
	'icon'			=> 'webnus-svg',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Type', 'deep' ),
			'param_name'	=> 'type',
			'value'			=> array(
				esc_html__( 'Live Icon', 'deep' )	=> 'live',
				esc_html__( 'Image Tag', 'deep' )	=> 'img',
			),
			'std'			=> 'live',
			'description'	=> esc_html__( 'Render img tag', 'deep'),
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> esc_html__( 'Upload SVG', 'deep' ),
			'param_name'	=> 'svg_img',
			'value'			=>'',
			'description'	=> esc_html__( 'Shortcode image', 'deep'),
		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_html__('SVG color', 'deep'),
			'param_name'	=> 'svg_color',
			'value'			=> '',
			'description'	=> esc_html__( 'Select icon color (leave blank for default color)', 'deep'),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'live',
			),
		),	
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('SVG Size', 'deep'),
			'param_name'	=> 'svg_size',
			'value'			=> '',
			'description' => esc_html__( 'Enter SVG size (Example: 200px. Leave blank for default size).', 'deep'),
		),
		array(
			'group'			=> esc_html__( 'Link', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Link URL', 'deep'),
			'param_name'	=> 'svg_link_url',
			'value'			=> '',
			'description'	=> esc_html__( 'SVG Link URL (http://example.com)', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-12',
		),
		array(
			'group'			=> esc_html__( 'Link', 'deep' ),
			'type'			=> 'checkbox',
			'heading'		=> __( 'Open link in a new tab? ', 'deep' ),
			'description'	=> __( 'Add Target = _blank', 'deep'),
			'param_name'	=> 'link_target',
			'edit_field_class'	=> 'vc_col-sm-6',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Alignment', 'deep' ),
			'param_name'	=> 'svg_align',
			'value'			=> array(
				'Left'		=> 'left',		
				'Center'	=> 'center',		
				'Right'		=> 'right',		
			),
			'description'	=> esc_html__( 'Select desired alignment', 'deep'),
			'std'			=> 'left'
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
) );
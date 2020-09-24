<?php
vc_map( array(
	'name' 			=> 'Video Teaser',
	'base' 			=> 'video-background',
	'description'	=> 'Video Background Box',
	'icon'			=> 'webnus-videoteaser',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Background Video Type', 'deep' ),
			'param_name'	=> 'video_type',
			'value'			=> array(
				'Youtube'	=> 'youtube',		
				'Internal'	=> 'internal',		
			),
			'std'			=> 'youtube',
			'description'	=> esc_html__( 'Please select video type', 'deep'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Video URL', 'deep' ),
			'param_name'	=> 'video_url',
			'value'			=> '',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Action on click', 'deep' ),
			'param_name'	=> 'action_type',
			'value'			=> array(
				'Light box video'	=> 'Popup',		
				'Page URL'			=> 'page_url',		
			),
			'description'	=> esc_html__( 'Select shortcode type', 'deep'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Target URL', 'deep' ),
			'param_name'	=> 'target_url',
			'value'			=> '',
			'description'	=> esc_html__( 'Please enter target URL(Popup)', 'deep'),
			'dependency'	=> array( 'element' => 'action_type', 'value' => 'page_url' ),
		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_html__('Overlay color', 'deep'),
			'param_name'	=> 'overlay_color',
			'value'			=> '',
			'description'	=> esc_html__( 'Select overlay color (leave blank for default color)', 'deep'),
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> esc_html__( 'Background Image for Mobile.', 'deep' ),
			'param_name'	=> 'thumbnail',
			'value'			=> '',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Image Size', 'deep' ),
			'param_name'	=> 'thumbnail_size',
			'value'			=>'',
			'description'	=> esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'deep'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Video Height' , 'deep'),
			'param_name'	=> 'height',
			'value'			=> '500px',
			'description'	=> esc_html__( 'Please enter height value with px, Example : 100px' , 'deep'),
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


?>
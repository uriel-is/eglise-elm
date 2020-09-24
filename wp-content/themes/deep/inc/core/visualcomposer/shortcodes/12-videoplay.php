<?php

vc_map( array(
        'name' 			=> 'Video Play Button',
        'base' 			=> 'videoplay',
		'description'	=> 'Video Play Button',
		'icon'			=> 'webnus-videoplay',
        'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
        'params'		=> array(
        	array(
        		'type'			=> 'attach_image',
				'heading'		=> esc_html__( 'Background Image', 'deep' ),
				'param_name'	=> 'img',
				'value'			=> '',
			),
        	array(
        		'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Image alt', 'deep' ),
				'param_name'	=> 'img_alt',
				'value'			=> '',
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> esc_html__( 'Show Alt Tag Under Video Button', 'deep' ),
				'param_name'	=> 'bottom_text',
				'value'			=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Image Width' , 'deep'),
				'param_name'	=> 'img_width',
				'value'			=> '',
				'description'	=> esc_html__('Image Width without px/% format, Example : 100' , 'deep'),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Image Height' , 'deep'),
				'param_name'	=> 'img_height',
				'value'			=> '',
				'description'	=> esc_html__( 'Image Height without px/% format, Example : 100' , 'deep'),
			),
  			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Video URL', 'deep' ),
				'param_name'	=> 'link',
				'value'			=> '#',
				'description'	=> esc_html__( 'YouTube/Vimeo URL', 'deep'),
			),	
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__( 'Image Alignment' , 'deep'),
				'param_name'	=> 'img_align',
				'value'			=> array(
					'Center'	=> 'center',
					'Right'		=> 'right',
					'Left'		=> 'left',
				),
			),
            array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Icon Size', 'deep'),
				'param_name'	=> 'size',
				'value'			=> '',
				'description'	=> esc_html__( 'Icon size in px format, Example: 80px', 'deep'),
				
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Icon color', 'deep'),
				'param_name'	=> 'color',
				'value'			=> '',
				'description'	=> esc_html__( 'Select icon color', 'deep'),
				
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Extra Class', 'deep'),
				'param_name'	=> 'link_class',
				'value'			=> '',
				'description'	=> esc_html__( 'Extra Class ', 'deep'),
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
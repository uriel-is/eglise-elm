<?php

vc_map( array(
	'name'			=> 'Deep Gallery',
	'base'			=> 'deep_gallery',	
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'icon'			=> 'webnus-gallery',
	'params'		=> array(
		array(
			'type'         => 'attach_images',
			'heading'      => esc_html__( 'Choose Images', 'deep' ),
			'param_name'   => 'images',			
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'items in row', 'deep' ),
			'param_name' => 'img_in_row',
			'value' => array(
				'One' =>	'one',				
				'Two' =>	'two',		
				'Three' =>	'three',
				'For' =>	'for',
				'Five' =>	'five',
				'Six' =>	'six',
				'Seven' =>	'seven',
				'Eight' =>	'eight',
				'Nine' =>	'nine',
				'Ten' =>	'ten',
			),
			'admin_label' => true,			
		),
		array(
			'type'         => 'textfield',
			'heading'      => esc_html__( 'Image Width', 'deep' ),
			'param_name'   => 'imgw',
			'value'        => '300',			
		),		
		array(
			'type'         => 'textfield',
			'heading'      => esc_html__( 'Image Height', 'deep' ),
			'param_name'   => 'imgh',
			'value'        => '300',			
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
)); ?>
<?php

vc_map( array(
		'name'			=>'List',
		'base'			=> 'ul',
		'description'	=> 'List + custom style',
		'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'icon'			=> 'webnus-list',
		'params'		=> array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__( 'List Type', 'deep' ),
				'param_name'	=> 'type',
				'value'			=> array(
					'Plus'		=>'plus',
					'Minus'		=>'minus',
					'Star'		=>'star',
					'Arrow'		=>'arrow',
					'Arrow 2'	=>'arrow2',
					'Square'	=>'square',
					'Circle'	=>'circle',
					'Cross'		=>'cross',
					'Check'		=>'check',
					'Number'	=>'number'						
				),
				'description'	=> esc_html__( 'Select the List Items type', 'deep')
			),		
			array(
				'heading' => esc_html__( 'Items', 'deep' ),
				'type' => 'param_group',
				'param_name' => 'list_content',				
				'params' => array(
					array(
						'heading' => esc_html__( 'Item content', 'deep' ),
						'type' => 'textfield',
						'param_name' => 'text',
						'admin_label' => true,
					),					
				),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Icon color', 'deep'),
				'param_name'	=> 'icon_color',
				'value'			=> '',
				'description'	=> esc_html__( 'Select icon color (leave blank for default color)', 'deep'),
				'dependency'	=> array(
					'element'	=> 'type',
					'value'		=> array(
						'plus',
						'minus',
						'star',
						'arrow',
						'arrow2',
						'square',
						'circle',
						'cross',
						'check',
					) 
				),
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
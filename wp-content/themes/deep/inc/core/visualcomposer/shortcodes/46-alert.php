<?php
vc_map( array(
	'name'			=>'Alert',
	'base'			=> 'alert',
	'description'	=> 'Alert box',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'icon'			=> 'webnus-alert',
	'params'		=> array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Type', 'deep' ),
			'param_name'	=> 'type',
			'value'			=> array(
				'Info'		=>'info',
				'Success'	=>'success',
				'Warning'	=>'warning',
				'Danger'	=>'danger',
			),
			'description'	=> esc_html__( 'Alert Type', 'deep')
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Show Close Icon', 'deep' ),
			'param_name'	=> 'close',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__( 'Alert Content', 'deep' ),
			'param_name'	=> 'aler_content',
			'value'			=> esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, odio?', 'deep' ),
			'description'	=> esc_html__( 'Contet Goes Here', 'deep')
		),
		// Styling
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'text',
		// 	'heading'			=> esc_html__( 'Typography', 'deep' ),
		// 	'param_name'		=> 'content_typography',
		// 	'edit_field_class'	=> 'vc_col-md-12 wn-text-wrap',
		// ),
		// // color
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'colorpicker',
		// 	'heading'			=> esc_html__( 'Color', 'deep'),
		// 	'param_name'		=> 'content_color',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-md-12 paddingbottom paddingtop',
		// ),
		// // font size
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'textfield',
		// 	'heading'			=> esc_html__( 'Font size', 'deep' ),
		// 	'param_name'		=> 'content_font_size',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-md-3 wn-px paddingbottom paddingtop',
		// ),
		// // line height
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'textfield',
		// 	'heading'			=> esc_html__( 'Line height', 'deep' ),
		// 	'param_name'		=> 'content_line_height',
		// 	'value'				=> '',
		// 	'description'		=> esc_html__( 'Example: 16px', 'deep'),
		// 	'edit_field_class'	=> 'vc_col-md-3 paddingtop paddingbottom',
		// ),
		// // Letter spacing
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'textfield',
		// 	'heading'			=> esc_html__( 'Letter spacing', 'deep' ),
		// 	'param_name'		=> 'content_letter_spacing',
		// 	'value'				=> '',
		// 	'description'		=> esc_html__( 'Example: 16px', 'deep'),
		// 	'edit_field_class'	=> 'vc_col-md-3 paddingtop paddingbottom',
		// ),
		// // font weight
		// array(
		// 	'group'			=> esc_html__( 'Style', 'deep' ),
		// 	'type'			=> 'dropdown',
		// 	'heading'		=> esc_html__( 'Font weight', 'deep' ),
		// 	'param_name'	=> 'content_font_weight',
		// 	'value'      	=> array(
		// 		'100'  	=> '100',    
		// 		'200'  	=> '200',    
		// 		'300'  	=> '300',    
		// 		'400'	=> '400',    
		// 		'500' 	=> '500',        
		// 		'600' 	=> '600',        
		// 		'700' 	=> '700',        
		// 		'800' 	=> '800',        
		// 	),
		// 	'std'  => '400',      
		// 	'edit_field_class'  => 'vc_col-md-3 paddingtop paddingbottom',
		// ),
		// // Text Transform
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'radio',
		// 	'heading' 			=> esc_html__( 'Text Transform', 'deep' ),
		// 	'param_name'		=> 'content_text_transform',
		// 	'value'				=> '',
		// 	'options'			=> array(
		// 		esc_html__( 'uppercase', 'deep' )	=> 'uppercase',
		// 		esc_html__( 'lowercase', 'deep' )	=> 'lowercase',				
		// 		esc_html__( 'capitalize', 'deep' )	=> 'capitalize',				
		// 	),
		// 	'edit_field_class'	=> 'vc_col-md-6 paddingbottom',
		// ),
		// // Text Decoration
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'radio',
		// 	'heading' 			=> esc_html__( 'Text Decoration', 'deep' ),
		// 	'param_name'		=> 'content_text_decoration',
		// 	'value'				=> '',
		// 	'options'			=> array(
		// 		esc_html__( 'overline', 'deep' )	  => 'overline',
		// 		esc_html__( 'line-through', 'deep' )  => 'line-through',				
		// 		esc_html__( 'underline', 'deep' )	  => 'underline',				
		// 	),
		// 	'edit_field_class'	=> 'vc_col-md-6 paddingbottom',
		// ),
		// // Font Style
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'radio',
		// 	'heading' 			=> esc_html__( 'Font Style', 'deep' ),
		// 	'param_name'		=> 'content_font_style',
		// 	'value'				=> '',
		// 	'options'			=> array(
		// 		esc_html__( 'normal', 'deep' )	=> 'normal',
		// 		esc_html__( 'italic', 'deep' )	=> 'italic',				
		// 	),
		// 	'std'				=> 'normal',
		// 	'edit_field_class'	=> 'vc_col-md-6 paddingtop paddingbottom',
		// ),
		// // Text Align
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'radio',
		// 	'heading' 			=> esc_html__( 'Text Align', 'deep' ),
		// 	'param_name'		=> 'content_text_align',
		// 	'value'				=> '',
		// 	'options'			=> array(
		// 		esc_html__( 'left', 'deep' )	=> 'left',
		// 		esc_html__( 'center', 'deep' )	=> 'center',				
		// 		esc_html__( 'right', 'deep' )	=> 'right',				
		// 	),
		// 	'std'				=> 'left',
		// 	'edit_field_class'	=> 'vc_col-md-4 paddingbottom',
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'text',
		// 	'heading'			=> esc_html__( 'Border', 'deep' ),
		// 	'param_name'		=> 'content_border',
		// 	'edit_field_class'	=> 'vc_col-md-12 wn-text-wrap',
		// ),
		// // Border
		// array(
		// 	'group'			=> esc_html__( 'Style', 'deep' ),
		// 	'type'			=> 'dropdown',
		// 	'heading'		=> esc_html__( 'Style', 'deep' ),
		// 	'param_name'	=> 'content_border_style',
		// 	'value'			=> array(
		// 		'none'		=> 'none',		
		// 		'dotted'	=> 'dotted',		
		// 		'dashed'	=> 'dashed',		
		// 		'solid'		=> 'solid',		
		// 		'double'	=> 'double',		
		// 		'groove'	=> 'groove',		
		// 		'ridge'		=> 'ridge',		
		// 		'inset'		=> 'inset',		
		// 		'outset'	=> 'outset',		
		// 	),
		// 	'edit_field_class'	=> 'vc_col-sm-12 paddingbottom',
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'textfield',
		// 	'heading'			=> esc_html__( 'Top', 'deep' ),
		// 	'param_name'		=> 'content_border_width_top',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 wn-px paddingbottom paddingtop',
		// 	'dependency'	=> array(
		// 		'element'	=> 'content_border_style',
		// 		'value'		=> array( 'dotted', 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset' ),
		// 	),
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'textfield',
		// 	'heading'			=> esc_html__('Right', 'deep'),
		// 	'param_name'		=> 'content_border_width_right',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 wn-px paddingbottom paddingtop',
		// 	'dependency'	=> array(
		// 		'element'	=> 'content_border_style',
		// 		'value'		=> array( 'dotted', 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset' ),
		// 	),
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'textfield',
		// 	'heading'			=> esc_html__('Bottom', 'deep'),
		// 	'param_name'		=> 'content_border_width_bottom',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 wn-px paddingbottom paddingtop',
		// 	'dependency'	=> array(
		// 		'element'	=> 'content_border_style',
		// 		'value'		=> array( 'dotted', 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset', ),
		// 	),
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'textfield',
		// 	'heading'			=> esc_html__('Left', 'deep'),
		// 	'param_name'		=> 'content_border_width_left',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 wn-px paddingbottom paddingtop',
		// 	'dependency'	=> array(
		// 		'element'	=> 'content_border_style',
		// 		'value'		=> array( 'dotted', 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset', ),
		// 	),
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'text',
		// 	'heading'			=> esc_html__( 'Border Radius', 'deep' ),
		// 	'param_name'		=> 'content_border_radius',
		// 	'edit_field_class'	=> 'vc_col-md-12 wn-text-wrap',
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'textfield',
		// 	'heading'			=> esc_html__('Top left', 'deep'),
		// 	'param_name'		=> 'title_bord_top_left_radius',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 wn-px paddingbottom paddingtop',
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'textfield',
		// 	'heading'			=> esc_html__('Top right', 'deep'),
		// 	'param_name'		=> 'title_bord_top_right_radius',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 wn-px paddingbottom paddingtop',
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'textfield',
		// 	'heading'			=> esc_html__('Bottom left', 'deep'),
		// 	'param_name'		=> 'title_bord_bottom_left_radius',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 wn-px paddingbottom paddingtop',
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'textfield',
		// 	'heading'			=> esc_html__('Bottom right', 'deep'),
		// 	'param_name'		=> 'title_bord_bottom_right_radius',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 wn-px paddingbottom paddingtop',
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'text',
		// 	'heading'			=> esc_html__( 'Background', 'deep' ),
		// 	'param_name'		=> 'content_background',
		// 	'edit_field_class'	=> 'vc_col-md-12 wn-text-wrap',
		// ),
		// // background
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'dropdown',
		// 	'heading'			=> esc_html__( 'Background Color type', 'deep' ),
		// 	'param_name'		=> 'content_background_type',
		// 	'value'				=> array(
		// 		'Solid color'	=> 'content_background_solid_color',
		// 		'Gradient'		=> 'content_background_gradient_color',
		// 	),
		// 	'std'				=> 'content_background_solid_color'
		// ),
		// array(
		// 	'group'			=> esc_html__( 'Style', 'deep' ),
		// 	'type'			=> 'colorpicker',
		// 	'heading'		=> esc_html__( 'Background Color', 'deep' ),
		// 	'param_name'	=> 'content_background_color',
		// 	'value'			=> '',
		// 	'description'	=> esc_html__( 'Select Icon box Background Color', 'deep'),
		// 	'dependency'	=> array(
		// 		'element'	=> 'content_background_type',
		// 		'value'		=> 'content_background_solid_color',
		// 	),
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'colorpicker',
		// 	'heading'			=> esc_html__('color 1', 'deep'),
		// 	'param_name'		=> 'content_background_color_grad_1',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		// 	'dependency'		=> array(
		// 		'element'	=> 'content_background_type',
		// 		'value'		=> 'content_background_gradient_color',
		// 	),
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'colorpicker',
		// 	'heading'			=> esc_html__('color 2', 'deep'),
		// 	'param_name'		=> 'content_background_color_grad_2',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		// 	'dependency'		=> array(
		// 		'element'	=> 'content_background_type',
		// 		'value'		=> 'content_background_gradient_color',
		// 	),
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'colorpicker',
		// 	'heading'			=> esc_html__('color 3', 'deep'),
		// 	'param_name'		=> 'content_background_color_grad_3',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		// 	'dependency'		=> array(
		// 		'element'	=> 'content_background_type',
		// 		'value'		=> 'content_background_gradient_color',
		// 	),
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'colorpicker',
		// 	'heading'			=> esc_html__('color 4', 'deep'),
		// 	'param_name'		=> 'content_background_color_grad_4',
		// 	'value'				=> '',
		// 	'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		// 	'dependency'		=> array(
		// 		'element'	=> 'content_background_type',
		// 		'value'		=> 'content_background_gradient_color',
		// 	),
		// ),
		// array(
		// 	'group'			=> esc_html__( 'Style', 'deep' ),
		// 	'type'			=> 'textfield',
		// 	'heading'		=> esc_html__( 'Direction', 'deep' ),
		// 	'param_name'	=> 'content_grad_direction',
		// 	'value'			=> '',
		// 	'description'	=> esc_html__( 'Gradient direction example: 70', 'deep'),
		// 	'dependency'		=> array(
		// 		'element'	=> 'content_background_type',
		// 		'value'		=> 'content_background_gradient_color',
		// 	),
		// ),
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'text',
		// 	'heading'			=> esc_html__( 'Display', 'deep' ),
		// 	'param_name'		=> 'content_display',
		// 	'edit_field_class'	=> 'vc_col-md-12 wn-text-wrap',
		// ),
		// // opacity
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'dropdown',
		// 	'heading'			=> esc_html__( 'Opacity', 'deep' ),
		// 	'param_name'		=> 'opacity',
		// 	'value'      		=> array(
		// 		''    => '',
		// 		'0'   => '0',
		// 		'0.1' => '0.1',
		// 		'0.2' => '0.2',
		// 		'0.3' => '0.3',
		// 		'0.4' => '0.4',
		// 		'0.5' => '0.5',
		// 		'0.6' => '0.6',
		// 		'0.7' => '0.7',
		// 		'0.8' => '0.8',
		// 		'0.9' => '0.9',
		// 		'1'   => '1',
		// 	),
		// 	'edit_field_class'	=> 'vc_col-md-6 paddingbottom',
		// ),
		// // display
		// array(
		// 	'group'				=> esc_html__( 'Style', 'deep' ),
		// 	'type'				=> 'dropdown',
		// 	'heading'			=> esc_html__( 'Display', 'deep' ),
		// 	'param_name'		=> 'display',
		// 	'value'				=> array(
		// 		esc_html__( 'inherit', 'deep' )			=> 'inherit',
		// 		esc_html__( 'inline', 'deep' )			=> 'inline',
		// 		esc_html__( 'inline block', 'deep' )	=> 'inline-block',
		// 		esc_html__( 'block', 'deep' )			=> 'block',
		// 	),
		// 	'std'				=> 'inherit',
		// 	'edit_field_class'	=> 'vc_col-md-6 paddingbottom',
		// ),
		// // Class & ID 
		// array(
		// 	'group'			=> 'Class & ID',
		// 	'type'			=> 'textfield',
		// 	'heading'		=> esc_html__( 'Extra Class', 'deep' ),
		// 	'param_name'	=> 'shortcodeclass',
		// 	'value'			=> '',
		// 	'edit_field_class'	=> 'vc_col-md-6 paddingtop',
		// ),
		// array(
		// 	'group'			=> 'Class & ID',
		// 	'type'			=> 'textfield',
		// 	'heading'		=> esc_html__( 'ID', 'deep' ),
		// 	'param_name'	=> 'shortcodeid',
		// 	'value'			=> '',
		// 	'edit_field_class'	=> 'vc_col-md-6 paddingtop',
		// ),
	),
) );
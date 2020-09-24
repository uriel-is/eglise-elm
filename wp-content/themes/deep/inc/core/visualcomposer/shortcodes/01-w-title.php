<?php
vc_map( array(
	'name'			=> esc_html__( 'Title builder', 'deep' ),
	'base'			=> 'deep-title',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'icon'			=> 'webnus-title',
	'description'	=> esc_html__( 'Deep title builder', 'deep' ),
	'params' => array(

		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__( 'Title', 'deep' ),
			'param_name'	=> 'title',
			'value'			=> '',
			'description'	=> esc_html__( 'Enter main title', 'deep'),
			'admin_label' 	=> true,
			'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__( 'Subtitle', 'deep' ),
			'param_name'	=> 'subtitle',
			'value'			=> '',
			'description'	=> esc_html__( 'Enter subtitle', 'deep'),
			'admin_label' 	=> true,
			'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Alignment', 'deep' ),
			'param_name'	=> 'text_align',
			'value'			=> array(
				'Left'		=> 'left',		
				'Center'	=> 'center',		
				'Right'		=> 'right',		
			),
			'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
			'std'			=> 'left'
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Rotate', 'deep' ),
			'param_name'	=> 'rotate',
			'value'			=> array(
				'none'		=> 'none',		
				'45deg'		=> '45deg',		
				'90deg'		=> '90deg',		
				'180deg'	=> '180deg',		
				'Custom'	=> 'custom',		
			),
			'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
			'std'			=> 'none'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Custom rotate', 'deep' ),
			'param_name'	=> 'custom_rotate',
			'value'			=> '',
			'description'	=> esc_html__( 'You should enter your desired value with deg, For example 60deg', 'deep'),
			'dependency'	=> array( 'element' => 'rotate', 'value' => 'custom' ),
		),
		array(
			'type'			=> 'radio',
			'heading'		=> esc_html__( 'Display', 'deep' ),
			'param_name'	=> 'display',
			'value'			=> '',
			'options'		=> array(
				esc_html__( 'inherit', 'deep' )			=> 'inherit',
				esc_html__( 'inline', 'deep' )			=> 'inline',
				esc_html__( 'inline block', 'deep' )	=> 'inline-block',
				esc_html__( 'block', 'deep' )			=> 'block',
			),
			'std'			=> 'inherit',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Layer Animation', 'deep' ),
			'param_name'	=> 'layer_animation',
			'value'			=> array(
				'None'			=> 'none',	
				'Bottom to Top'	=> 'wn-layer-anim-bottom',	
				'Top to Bottom'	=> 'wn-layer-anim-top',	
				'Left to Right'	=> 'wn-layer-anim-right',	
				'Right to Left'	=> 'wn-layer-anim-left',
				'Zoom in'		=> 'wn-layer-anim-zoom-in',
				'Zoom out'		=> 'wn-layer-anim-zoom-out',
				'Fade'			=> 'wn-layer-anim-fade',
				'Flip'			=> 'wn-layer-anim-flip',
			),
			'std'				=> 'none',
		),
		// Title Options
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Heading', 'deep' ),
			'param_name'	=> 'title_heading',
			'value'			=> array(
				'h1'	=> 'h1',		
				'h2'	=> 'h2',		
				'h3'	=> 'h3',		
				'h4'	=> 'h4',		
				'h5'	=> 'h5',		
				'h6'	=> 'h6',
				'div'   => 'div',		
				'p'     => 'p',
                'span'  => 'span',
			),
			'std'			=> '1',
			'description'	=> esc_html__( 'Select heading', 'deep'),
		),
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Custom class', 'deep' ),
			'param_name'	=> 'title_custom_class',
			'value'			=> '',
		),
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Use theme default font family?', 'deep' ),
			'param_name'	=> 'title_theme_fonts',
			'value'			=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
			'description'	=> esc_html__( 'Use font family from the theme.', 'deep' ),
			'std'			=> 'yes',
		),
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'google_fonts',
			'param_name'	=> 'title_text_font',
			'value'			=> '',
			'settings'		=> array(
				'fields'	=> array(
					'font_family_description' => esc_html__( 'Select font family.', 'deep' ),
					'font_style_description'  => esc_html__( 'Select font styling.', 'deep' ),
				),
			),
			'dependency'	=> array(
				'element'				=> 'title_theme_fonts',
				'value_not_equal_to'	=> 'yes',
			),
		),
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Color type', 'deep' ),
			'param_name'	=> 'title_color_type',
			'value'			=> array(
				'Solid color'	=> 'title-solid-color',
				'Gradient'		=> 'gradient',
			),
			'std'			=> 'title-solid-color'
		),
		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'colorpicker',
			'heading'			=> esc_html__('Title color', 'deep'),
			'param_name'		=> 'title_color',
			'value'				=> '',
			'description'		=> esc_html__( 'Select title color (leave blank for default color)', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
			'dependency'		=> array(
				'element'	=> 'title_color_type',
				'value'		=> 'title-solid-color',
			),
		),

		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'colorpicker',
			'heading'			=> esc_html__('color 1', 'deep'),
			'param_name'		=> 'title_grad_color_1',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
			'dependency'		=> array(
				'element'	=> 'title_color_type',
				'value'		=> 'gradient',
			),
		),
		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'colorpicker',
			'heading'			=> esc_html__('color 2', 'deep'),
			'param_name'		=> 'title_grad_color_2',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
			'dependency'		=> array(
				'element'	=> 'title_color_type',
				'value'		=> 'gradient',
			),
		),
		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'colorpicker',
			'heading'			=> esc_html__('color 3', 'deep'),
			'param_name'		=> 'title_grad_color_3',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
			'dependency'		=> array(
				'element'	=> 'title_color_type',
				'value'		=> 'gradient',
			),
		),
		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'colorpicker',
			'heading'			=> esc_html__('color 4', 'deep'),
			'param_name'		=> 'title_grad_color_4',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
			'dependency'		=> array(
				'element'	=> 'title_color_type',
				'value'		=> 'gradient',
			),
		),
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Direction', 'deep' ),
			'param_name'	=> 'title_grad_direction',
			'value'			=> '',
			'description'	=> esc_html__( 'Gradient direction example: 70deg', 'deep'),
			'dependency'	=> array(
				'element'	=> 'title_color_type',
				'value'		=> 'gradient',
			),
		),
		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Font size', 'deep' ),
			'param_name'		=> 'title_font_size',
			'value'				=> '',
			'description'		=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Line height', 'deep' ),
			'param_name'		=> 'title_line_height',
			'value'				=> '',
			'description'		=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Letter spacing', 'deep' ),
			'param_name'		=> 'title_letter_spacing',
			'value'				=> '',
			'description'		=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Font Weight', 'deep' ),
			'param_name'		=> 'title_font_weight',
			'value'				=> '',
			'description'		=> esc_html__( 'Enter desired value like 100/200/300 without px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),

		// Padding
		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Padding top', 'deep' ),
			'param_name'		=> 'title_padding_top',
			'value'				=> '',
			'description'		=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Padding right', 'deep' ),
			'param_name'		=> 'title_padding_right',
			'value'				=> '',
			'description'		=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'				=> esc_html__( 'Title Styling', 'deep' ),
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Padding bottom', 'deep' ),
			'param_name'		=> 'title_padding_bottom',
			'value'				=> '',
			'description'		=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Padding left', 'deep' ),
			'param_name'	=> 'title_padding_left',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),

		// Margin
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Margin top', 'deep' ),
			'param_name'	=> 'title_margin_top',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Margin right', 'deep' ),
			'param_name'	=> 'title_margin_right',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Margin bottom', 'deep' ),
			'param_name'	=> 'title_margin_bottom',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Margin left', 'deep' ),
			'param_name'	=> 'title_margin_left',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Title Styling', 'deep' ),
			'type'			=> 'radio',
			'param_name'	=> 'display_title',
			'value'			=> '',
			'options'		=> array(
				esc_html__( 'inherit', 'deep' )			=> 'inherit',
				esc_html__( 'inline', 'deep' )			=> 'inline',
				esc_html__( 'inline block', 'deep' )	=> 'inline-block',
				esc_html__( 'block', 'deep' )			=> 'block',
			),
			'std'			=> 'inherit',
		),

		// Subtitle Styling
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Heading', 'deep' ),
			'param_name'	=> 'subtitle_heading',
			'value'			=> array(
				'h1'	=> 'h1',		
				'h2'	=> 'h2',		
				'h3'	=> 'h3',		
				'h4'	=> 'h4',		
				'h5'	=> 'h5',		
				'h6'	=> 'h6',	
				'div'   => 'div',	
				'p'     => 'p',
                'span'  => 'span',
			),
			'std'	=> '1',
			'description'	=> esc_html__( 'Select heading', 'deep'),
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Custom class', 'deep' ),
			'param_name'	=> 'subtitle_custom_class',
			'value'			=> '',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Use theme default font family?', 'deep' ),
			'param_name'	=> 'subtitle_theme_fonts',
			'value'			=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
			'description'	=> esc_html__( 'Use font family from the theme.', 'deep' ),
			'std'			=> 'yes',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'google_fonts',
			'param_name'	=> 'subtitle_text_font',
			'value'			=> '',
			'settings'		=> array(
				'fields'	=> array(
					'font_family_description' => esc_html__( 'Select font family.', 'deep' ),
					'font_style_description'  => esc_html__( 'Select font styling.', 'deep' ),
				),
			),
			'dependency'	=> array(
				'element'				=> 'subtitle_theme_fonts',
				'value_not_equal_to'	=> 'yes',
			),
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Color type', 'deep' ),
			'param_name'	=> 'sub_title_color_type',
			'value'			=> array(
				'Solid color'	=> 'subtitle-solid-color',
				'Gradient'		=> 'gradient',
			),
			'description'	=> esc_html__( 'If you select 2 colors gradient will be divided into 2, if you select 3 colors it will be divided to 3 and if you select 4 colors then it’ll be divided to 4. As a result, if you need 2 colors then you can select 2 colors.', 'deep'),
			'std'			=> 'subtitle-solid-color'
		),
		array(
			'group'				=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'				=> 'colorpicker',
			'heading'			=> esc_html__('Subtitle color', 'deep'),
			'param_name'		=> 'subtitle_color',
			'value'				=> '',
			'description'		=> esc_html__( 'Select title color (leave blank for default color)', 'deep'),
			'edit_field_class' 	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
			'dependency'		=> array(
				'element'	=> 'sub_title_color_type',
				'value'		=> 'subtitle-solid-color',
			),
		),
		array(
			'group'				=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'				=> 'colorpicker',
			'heading'			=> esc_html__('color 1', 'deep'),
			'param_name'		=> 'sub_title_grad_color_1',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
			'dependency'		=> array(
				'element'	=> 'sub_title_color_type',
				'value'		=> 'gradient',
			),
		),
		array(
			'group'				=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'				=> 'colorpicker',
			'heading'			=> esc_html__('color 2', 'deep'),
			'param_name'		=> 'sub_title_grad_color_2',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
			'dependency'		=> array(
				'element'	=> 'sub_title_color_type',
				'value'		=> 'gradient',
			),
		),
		array(
			'group'				=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'				=> 'colorpicker',
			'heading'			=> esc_html__('color 3', 'deep'),
			'param_name'		=> 'sub_title_grad_color_3',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
			'dependency'		=> array(
				'element'	=> 'sub_title_color_type',
				'value'		=> 'gradient',
			),
		),
		array(
			'group'				=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'				=> 'colorpicker',
			'heading'			=> esc_html__('color 4', 'deep'),
			'param_name'		=> 'sub_title_grad_color_4',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
			'dependency'		=> array(
				'element'	=> 'sub_title_color_type',
				'value'		=> 'gradient',
			),
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Direction', 'deep' ),
			'param_name'	=> 'sub_title_grad_direction',
			'value'			=> '',
			'description'	=> esc_html__( 'Gradient direction example: 70deg', 'deep'),
			'dependency'	=> array(
				'element'	=> 'sub_title_color_type',
				'value'		=> 'gradient',
			),
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Font size', 'deep' ),
			'param_name'	=> 'subtitle_font_size',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Line height', 'deep' ),
			'param_name'	=> 'subtitle_line_height',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Letter spacing', 'deep' ),
			'param_name'	=> 'subtitle_letter_spacing',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Font Weight', 'deep' ),
			'param_name'	=> 'subtitle_font_weight',
			'value'			=> '',
			'description'	=> esc_html__( 'Enter desired value like 100/200/300 without px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),

		// Padding
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Padding top', 'deep' ),
			'param_name'	=> 'subtitle_padding_top',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Padding right', 'deep' ),
			'param_name'	=> 'subtitle_padding_right',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Padding bottom', 'deep' ),
			'param_name'	=> 'subtitle_padding_bottom',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Padding left', 'deep' ),
			'param_name'	=> 'subtitle_padding_left',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),

		// Margin
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Margin top', 'deep' ),
			'param_name'	=> 'subtitle_margin_top',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Margin right', 'deep' ),
			'param_name'	=> 'subtitle_margin_right',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Margin bottom', 'deep' ),
			'param_name'	=> 'subtitle_margin_bottom',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Margin left', 'deep' ),
			'param_name'	=> 'subtitle_margin_left',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
		),
		array(
			'group'			=> esc_html__( 'Subtitle Styling', 'deep' ),
			'type'			=> 'radio',
			'param_name'	=> 'display_sub_title',
			'value'			=> '',
			'options'		=> array(
				esc_html__( 'inherit', 'deep' )			=> 'inherit',
				esc_html__( 'inline', 'deep' )			=> 'inline',
				esc_html__( 'inline block', 'deep' )	=> 'inline-block',
				esc_html__( 'block', 'deep' )			=> 'block',
			),
			'std'			=> 'inherit',
		),

		// Shape
		array(
			'group'			=> esc_html__( 'Shape', 'deep' ),
			'heading'		=> esc_html__( 'Add Shape', 'deep' ),
			'type'			=> 'param_group',
			'param_name'	=> 'shape',
			'params' => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Width', 'deep' ),
					'param_name'	=> 'shape_width',
					'value'			=> '',
					'description'	=> esc_html__( 'Example: 16px or %', 'deep'),
					'edit_field_class' => 'vc_col-sm-12 vc_column paddingtop paddingbottom',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Height', 'deep' ),
					'param_name'	=> 'shape_height',
					'value'			=> '',
					'description'	=> esc_html__( 'Example: 16px or %', 'deep'),
					'edit_field_class' => 'vc_col-sm-12 vc_column paddingtop paddingbottom',
				),	
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Shape Radius', 'deep' ),
					'param_name'	=> 'shape_radius',
					'value'			=> '',
					'description'	=> esc_html__( 'Example: 16px or %', 'deep'),
					'edit_field_class' => 'vc_col-sm-12 vc_column paddingtop paddingbottom',
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> esc_html__('Background Color 1', 'deep'),
					'param_name'	=> 'shape_background_color',
					'value'			=> '',
					'description'	=> esc_html__( 'Shape Gradient Background Color 1', 'deep'),
					'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
				),
				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Background Color 2', 'deep'),
					'param_name'		=> 'shape_background_color_2',
					'value'				=> '',
					'description'		=> esc_html__( 'Shape Gradient Background Color 2', 'deep'),
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
				),
				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Background Color 3', 'deep'),
					'param_name'		=> 'shape_background_color_3',
					'value'				=> '',
					'description'		=> esc_html__( 'Shape Gradient Background Color 3', 'deep'),
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> esc_html__('Background Color 4', 'deep'),
					'param_name'	=> 'shape_background_color_4',
					'value'			=> '',
					'description'	=> esc_html__( 'Shape Gradient Background Color 4', 'deep'),
					'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> '',
					'param_name'	=> 'shape_gradient_direction',
					'value'			=> '',
					'description'	=> esc_html__( 'Gradient direction example: 70deg', 'deep'),
				),
				array(
					'type'			=> 'attach_image',
					'heading'		=> esc_html__( 'Shape background image', 'deep' ),
					'param_name'	=> 'shape_background_image',
					'value'			=>'',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Top Position', 'deep' ),
					'param_name'	=> 'shape_top_position',
					'value'			=> '',
					'description'	=> esc_html__( 'Example: 16px or %', 'deep'),
					'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Right Position', 'deep' ),
					'param_name'	=> 'shape_right_position',
					'value'			=> '',
					'description'	=> esc_html__( 'Example: 16px or %', 'deep'),
					'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Bottom Position', 'deep' ),
					'param_name'	=> 'shape_bottom_position',
					'value'			=> '',
					'description'	=> esc_html__( 'Example: 16px or %', 'deep'),
					'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Left Position', 'deep' ),
					'param_name'	=> 'shape_left_position',
					'value'			=> '',
					'description'	=> esc_html__( 'Example: 16px or %', 'deep'),
					'edit_field_class' => 'vc_col-sm-3 vc_column paddingtop paddingbottom',
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Rotate', 'deep' ),
					'param_name'	=> 'shape_rotate',
					'value'			=> array(
						'none'		=> 'none',		
						'45deg'		=> '45deg',		
						'90deg'		=> '90deg',		
						'180deg'	=> '180deg',		
						'Custom'	=> 'custom',		
					),
					'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
					'std'			=> 'none'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Custom rotate', 'deep' ),
					'param_name'	=> 'shape_custom_rotate',
					'value'			=> '',
					'description'	=> esc_html__( 'You should enter your desired value with deg, For example 60deg', 'deep'),
					'dependency'	=> array( 'element' => 'shape_rotate', 'value' => 'custom' ),
				),
			),
		),

		array(
			'group'			=> 'Responsive',
			'type'			=> 'description',
			'heading'		=> esc_html__( 'Title Responsive', 'deep' ),
			'param_name'	=> 'title_responsive',
			'value'			=> '',
		),
		array(
			'group'			=> 'Responsive',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Title Font size in Tablet (960)', 'deep' ),
			'param_name'	=> 'title_font_size_tablet',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-4 vc_column paddingbottom',
		),
		array(
			'group'			=> 'Responsive',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Title Font size in mobile landscape (768)', 'deep' ),
			'param_name'	=> 'title_font_size_mob768',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-4 vc_column paddingbottom',
		),
		array(
			'group'			=> 'Responsive',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Title Font size in mobile portrait (480)', 'deep' ),
			'param_name'	=> 'title_font_size_mob480',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-4 vc_column paddingbottom',
		),
		array(
			'group'			=> 'Responsive',
			'type'			=> 'description',
			'heading'		=> esc_html__( 'Subtitle Responsive', 'deep' ),
			'param_name'	=> 'subtitle_responsive',
			'value'			=> '',
			'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop',
		),
		array(
			'group'			=> 'Responsive',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Subtitle Font size in Tablet (960)', 'deep' ),
			'param_name'	=> 'subtitle_font_size_tablet',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-4 vc_column paddingbottom',
		),
		array(
			'group'			=> 'Responsive',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Subtitle Font size in mobile landscape (768)', 'deep' ),
			'param_name'	=> 'subtitle_font_size_mob768',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-4 vc_column paddingbottom',
		),
		array(
			'group'			=> 'Responsive',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Subtitle Font size in mobile portrait (480)', 'deep' ),
			'param_name'	=> 'subtitle_font_size_mob480',
			'value'			=> '',
			'description'	=> esc_html__( 'Example: 16px', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-4 vc_column paddingbottom',
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
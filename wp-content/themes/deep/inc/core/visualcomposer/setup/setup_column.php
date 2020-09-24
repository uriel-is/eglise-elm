<?php
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

	if( ! function_exists( 'deep_setup_vc_column' ) ) {

		function deep_setup_vc_column() {

			$uniqid = uniqid();
			$webnus_class= 'wn-column-' . $uniqid . '';

			// Add column map
			$attributes = array(

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Inner Scroll?', 'deep' ),
					'param_name'		=> 'inner_scroll',
					'description'		=> esc_html__( 'Do you want to have inner scroll in this column?', 'deep' ),
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'group'				=> esc_html__( 'Inner Scroll', 'deep' ),
				),
				array(
					'heading'			=> esc_html__( 'Height Value in Desktop size', 'deep' ),
					'description'		=> esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
					'type'				=> 'textfield',
					'param_name'		=> 'scroll_height_desktop',
					'dependency'		=> array(
						'element'	=> 'inner_scroll',
						'value'		=> 'yes',
					),
					'group'				=> esc_html__( 'Inner Scroll', 'deep' ),
				),
				array(
					'heading'			=> esc_html__( 'Height Value in Tablet size', 'deep' ),
					'description'		=> esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
					'type'				=> 'textfield',
					'param_name'		=> 'scroll_height_tablet',
					'dependency'		=> array(
						'element'	=> 'inner_scroll',
						'value'		=> 'yes',
					),
					'group'				=> esc_html__( 'Inner Scroll', 'deep' ),
				),
				array(
					'heading'			=> esc_html__( 'Height Value in Mobile size', 'deep' ),
					'description'		=> esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
					'type'				=> 'textfield',
					'param_name'		=> 'scroll_height_mobile',
					'dependency'		=> array(
						'element'	=> 'inner_scroll',
						'value'		=> 'yes',
					),
					'group'				=> esc_html__( 'Inner Scroll', 'deep' ),
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Toggle', 'deep' ),
					'param_name'		=> 'toggle',
					'description'		=> esc_html__( 'Do you want to have toggle in this column?', 'deep' ),
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'group'				=> esc_html__( 'Toggle', 'deep' ),
				),
				array(
					'heading'			=> esc_html__( 'Width Value When Opened', 'deep' ),
					'description'		=> esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
					'type'				=> 'textfield',
					'param_name'		=> 'toggle_width_open',
					'dependency'		=> array(
						'element'	=> 'toggle',
						'value'		=> 'yes',
					),
					'group'				=> esc_html__( 'Toggle', 'deep' ),
				),
				array(
					'heading'			=> esc_html__( 'Height Value When Opened', 'deep' ),
					'description'		=> esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
					'type'				=> 'textfield',
					'param_name'		=> 'toggle_height_open',
					'dependency'		=> array(
						'element'	=> 'toggle',
						'value'		=> 'yes',
					),
					'group'				=> esc_html__( 'Toggle', 'deep' ),
				),
				array(
					'heading'			=> esc_html__( 'Width Value When Closed', 'deep' ),
					'description'		=> esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
					'type'				=> 'textfield',
					'param_name'		=> 'toggle_width_close',
					'dependency'		=> array(
						'element'	=> 'toggle',
						'value'		=> 'yes',
					),
					'group'				=> esc_html__( 'Toggle', 'deep' ),
				),
				array(
					'heading'			=> esc_html__( 'Height Value When Closed', 'deep' ),
					'description'		=> esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
					'type'				=> 'textfield',
					'param_name'		=> 'toggle_height_close',
					'dependency'		=> array(
						'element'	=> 'toggle',
						'value'		=> 'yes',
					),
					'group'				=> esc_html__( 'Toggle', 'deep' ),
				),
				
				// Column Gradient
				array(
					'group'			=> 'Gradient',
					'type'			=> 'checkbox',
					'heading'		=> esc_html__( 'Gradient', 'deep' ),
					'param_name'	=> 'column_color_type',
					'value'			=> array( esc_html__( 'Yes', 'deep' ) => 'column_gradient' ),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 1', 'deep'),
					'param_name'		=> 'column_grad_color_1',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'column_color_type',
						'value'		=> 'column_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 2', 'deep'),
					'param_name'		=> 'column_grad_color_2',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'column_color_type',
						'value'		=> 'column_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 3', 'deep'),
					'param_name'		=> 'column_grad_color_3',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'column_color_type',
						'value'		=> 'column_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 4', 'deep'),
					'param_name'		=> 'column_grad_color_4',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'column_color_type',
						'value'		=> 'column_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Direction', 'deep' ),
					'param_name'	=> 'column_grad_direction',
					'value'			=> '',
					'description'	=> esc_html__( 'Gradient direction example: 70', 'deep'),
					'dependency'	=> array(
						'element'	=> 'column_color_type',
						'value'		=> 'column_gradient',
					),
				),

				array(
					'type'				=> 'disable',
					'param_name'		=> 'wn_class',
					'value'				=> $webnus_class,
					'std'				=> $webnus_class,
				),
			);
			vc_add_params('vc_column',$attributes);
		}

	}
	add_action('admin_init', 'deep_setup_vc_column');
}
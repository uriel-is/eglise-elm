<?php
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

	if(!function_exists('deep_setup_vc_row_inner')){

		function deep_setup_vc_row_inner(){
			vc_remove_param('vc_row_inner', 'el_id');
			vc_remove_param('vc_row_inner', 'equal_height');
			vc_remove_param('vc_row_inner', 'content_placement');
			vc_remove_param('vc_row_inner', 'gap');
			vc_remove_param('vc_row_inner', 'disable_element');
			vc_remove_param('vc_row_inner', 'el_class');
			vc_remove_param('vc_row_inner', 'css');

		$attributes = array(
			array(
				'type'				=> 'dropdown',
				'heading'			=> esc_html__( 'Content position', 'deep' ),
				'param_name'		=> 'content_placement',
				'value'				=> array(
					esc_html__( 'Default', 'deep' )	=> '',
					esc_html__( 'Top', 'deep' )		=> 'top',
					esc_html__( 'Middle', 'deep' )	=> 'middle',
					esc_html__( 'Bottom', 'deep' )	=> 'bottom',
				),
				'description'		=> esc_html__( 'Select content position within columns.', 'deep' ),
			),

			array(
				'heading'			=> esc_html__( 'Columns gap', 'deep' ),
				'description'		=> esc_html__( 'Select gap between columns in row.', 'deep' ),
				'type'				=> 'dropdown',
				'param_name'		=> 'gap',
				'value'				=> array(
					''		=> '',
					'0px'	=> '0',
					'1px'	=> '1',
					'2px'	=> '2',
					'3px'	=> '3',
					'4px'	=> '4',
					'5px'	=> '5',
					'10px'	=> '10',
					'15px'	=> '15',
					'20px'	=> '20',
					'25px'	=> '25',
					'30px'	=> '30',
					'35px'	=> '35',
				),
			),

			array(
				'type'				=> 'checkbox',
				'heading'			=> esc_html__( 'Equal height', 'deep' ),
				'param_name'		=> 'equal_height',
				'description'		=> esc_html__( 'If checked columns will be set to equal height.', 'deep' ),
				'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
			),

			array(
				'heading'			=> esc_html__( 'Align Center?', 'deep' ),
				'description'		=> esc_html__('Align center content', 'deep'),
				'type'				=> 'checkbox',
				'param_name'		=> 'align_center',
				'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'aligncenter' ),
			),

			array(
				'heading'			=> esc_html__( 'White Text Color?', 'deep' ),
				'description' 		=> esc_html__( 'If you choose it, all text will be white.', 'deep' ),
				'type'				=> 'checkbox',
				'param_name'		=> 'white_text_color',
				'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
			),

			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__( 'Layer Animation', 'deep' ),
				'param_name'	=> 'layer_animation',
				'value'			=> array(
					'None'			=> 'none',	
					'Bottom to Top'	=> 'wn-layer-anim-bottom',	
					'Top to Bottom'	=> 'wn-layer-anim-top',	
					'Left to Right'	=> 'wn-layer-anim-left',	
					'Right to Left'	=> 'wn-layer-anim-right',
					'Right to Left'	=> 'wn-layer-anim-right',
					'Zoom in'		=> 'wn-layer-anim-zoom-in',
					'Zoom out'		=> 'wn-layer-anim-zoom-out',
					'Fade'			=> 'wn-layer-anim-fade',
					'Flip'			=> 'wn-layer-anim-flip',
				),
				'edit_field_class'	=> 'vc_col-sm-6',
				'std'				=> 'none',
			),

			array(
				'type'				=> 'checkbox',
				'heading'			=> esc_html__( 'Disable row', 'deep' ),
				'param_name'		=> 'disable_element',
				'description'		=> esc_html__( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'deep' ),
				'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
			),

			array(
				'type'				=> 'css_editor',
				'heading'			=> esc_html__( 'CSS box', 'deep' ),
				'param_name'		=> 'css',
				'group'				=> esc_html__( 'Background & Design', 'deep' ),
			),

			array(
				'type'				=> 'el_id',
				'heading'			=> esc_html__( 'Row ID', 'deep' ),
				'param_name'		=> 'el_id',
				'description'		=> sprintf( esc_html__( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'deep' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . esc_html__( 'link', 'deep' ) . '</a>' ),
				'group'				=> esc_html__( 'ID & Extra Class', 'deep' ),
			),

			array(
				'type'				=> 'textfield',
				'heading'			=> esc_html__( 'Extra class', 'deep' ),
				'param_name'		=> 'el_class',
				'description'		=> esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'deep' ),
				'group'				=> esc_html__( 'ID & Extra Class', 'deep' ),
			),

		);
		vc_add_params('vc_row_inner',$attributes);

		}

	}
	add_action('admin_init', 'deep_setup_vc_row_inner');
}
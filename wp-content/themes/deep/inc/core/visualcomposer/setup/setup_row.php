<?php
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

	if( ! function_exists( 'deep_setup_vc_row' ) ) {

		function deep_setup_vc_row() {

			// remove vc default row map
			vc_remove_param( 'vc_row', 'full_width' );
			vc_remove_param( 'vc_row', 'gap' );
			vc_remove_param( 'vc_row', 'full_height' );
			vc_remove_param( 'vc_row', 'columns_placement' );
			vc_remove_param( 'vc_row', 'equal_height' );
			vc_remove_param( 'vc_row', 'content_placement' );
			vc_remove_param( 'vc_row', 'video_bg' );
			vc_remove_param( 'vc_row', 'video_bg_url' );
			vc_remove_param( 'vc_row', 'video_bg_parallax' );
			vc_remove_param( 'vc_row', 'parallax' );
			vc_remove_param( 'vc_row', 'parallax_image' );
			vc_remove_param( 'vc_row', 'parallax_speed_video' );
			vc_remove_param( 'vc_row', 'parallax_speed_bg' );
			vc_remove_param( 'vc_row', 'el_id' );
			vc_remove_param( 'vc_row', 'disable_element' );
			vc_remove_param( 'vc_row', 'css_animation' );
			vc_remove_param( 'vc_row', 'el_class' );
			vc_remove_param( 'vc_row', 'css' );

			$uniqid = uniqid();
			$webnus_class= 'wn-row-' . $uniqid . '';

			// start webnus row map
			$attributes = array(

				/**
			     * ---> General group
			     */
				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Full height row?', 'deep' ),
					'param_name'		=> 'full_height',
					'description'		=> esc_html__( 'If checked row will be set to full height.', 'deep' ),
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
				),

				array(
					'heading'			=> esc_html__( 'Decrease height of full height section', 'deep' ),
					'description'		=> esc_html__( 'Can be used with px. Example: 35px', 'deep' ),
					'type'				=> 'textfield',
					'param_name'		=> 'dec_full_height',
					'dependency'		=> array(
						'element'	=> 'full_height',
						'not_empty'	=> true,
					),
				),

				array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__( 'Columns position', 'deep' ),
					'param_name'		=> 'columns_placement',
					'value'				=> array(
						esc_html__( 'Top', 'deep' )		=> 'top',
						esc_html__( 'Middle', 'deep' )	=> 'middle',
						esc_html__( 'Bottom', 'deep' )	=> 'bottom',
						esc_html__( 'Stretch', 'deep' )	=> 'stretch',
					),
					'description'		=> esc_html__( 'Select columns position within row.', 'deep' ),
					'dependency'		=> array(
						'element'	=> 'full_height',
						'not_empty' => true,
					),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__( 'Row Height', 'deep' ),
					'param_name'		=> 'row_height',
					'value'				=> '',
					'description'		=> esc_html__( 'Set height for row. This feature doesn\'t work in "Full Height" row.', 'deep' ),
					'dependency'		=> array(
						'element'	=> 'full_height',
						'is_empty'	=> true,
					),
				),

	    		array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__( 'Columns gap', 'deep' ),
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
					'std'				=> '',
					'description'		=> esc_html__( 'Select gap between columns in row.', 'deep' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

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
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__('Overlay pattern', 'deep'),
					'param_name'		=> 'row_pattern',
					'value'				=> array(
						esc_html__( 'No Pattern', 'deep' )	=> '',
						esc_html__( 'Pattern 1', 'deep' )		=> 'max-pat',
						esc_html__( 'Pattern 2', 'deep' )		=> 'max-pat2'
					),
					'description' 		=> esc_html__( 'Overlay Pattern', 'deep'),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Overlay color', 'deep'),
					'param_name'		=> 'row_pattern_color',
					'value'				=> '',
					'description'		=> esc_html__( 'Overlay Color', 'deep'),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'White Text Color?', 'deep' ),
					'param_name'		=> 'row_dark',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'description' 		=> esc_html__( 'If you choose it, all text will be white.', 'deep' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Equal height', 'deep' ),
					'param_name'		=> 'equal_height',
					'description'		=> esc_html__( 'If checked columns will be set to equal height.', 'deep' ),
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Align Center?', 'deep' ),
					'param_name'		=> 'align_center',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'aligncenter' ),
					'description'		=> esc_html__('Align center content', 'deep'),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Remove Margin Bottom?', 'deep' ),
					'param_name'		=> 'r_margin_bottom',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'description'		=> esc_html__('Remove Margin Bottom', 'deep'),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Disable Row', 'deep' ),
					'param_name'		=> 'disable_element',
					'description'		=> esc_html__( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'deep' ),
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'edit_field_class'	=> 'vc_col-sm-6',
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
						'Zoom in'		=> 'wn-layer-anim-zoom-in',
						'Zoom out'		=> 'wn-layer-anim-zoom-out',
						'Fade'			=> 'wn-layer-anim-fade',
						'Flip'			=> 'wn-layer-anim-flip',
					),
					'edit_field_class'	=> 'vc_col-sm-6',
					'std'				=> 'none',
				),
				
				/**
			     * ---> Start Background group
			     */
				array(
					'heading'			=> esc_html__( 'Background Image', 'deep' ),
					'description'		=> esc_html__( 'Select image from media library.', 'deep' ),
					'type'				=> 'attach_image',
					'param_name'		=> 'wn_bg_image',
					'value'				=> '',
					'group'				=> esc_html__( 'Background', 'deep' ),
				),

				array(
					'heading'			=> esc_html__( 'Background Color', 'deep' ),
					'description'		=> esc_html__( 'Select Custom Background color.', 'deep' ),
					'type'				=> 'colorpicker',
					'param_name'		=> 'wn_bg_color',
					'group'				=> esc_html__( 'Background', 'deep' ),
				),

				array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__( 'Background Position', 'deep' ),
					'param_name'		=> 'bg_position',
					'value'				=> array(
						esc_html__( 'Left Top'	, 'deep' )	=> 'left top',
						esc_html__( 'Left Center', 'deep' )	=> 'left center',
						esc_html__( 'Left Bottom', 'deep' )	=> 'left bottom',
						esc_html__( 'Center Top', 'deep' )	=> 'center top',
						esc_html__( 'Center Center', 'deep' )	=> 'center center',
						esc_html__( 'Center Bottom', 'deep' )	=> 'center bottom',
						esc_html__( 'Right Top'	, 'deep' )	=> 'right top',
						esc_html__( 'Right Center', 'deep' )	=> 'right center',
						esc_html__( 'Right Bottom', 'deep' )	=> 'right bottom',
					),
					'std'				=> 'center center',
					'description'		=> esc_html__( 'The background-position property sets the starting position of a background image.', 'deep' ),
					'group'				=> esc_html__( 'Background', 'deep' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__( 'Background Repeat', 'deep' ),
					'param_name'		=> 'bg_repeat',
					'value'				=> array(
						esc_html__( 'Repeat'	, 'deep' )	=> 'repeat',
						esc_html__( 'Repeat x', 'deep' )		=> 'repeat-x',
						esc_html__( 'Repeat y', 'deep' )		=> 'repeat-y',
						esc_html__( 'No Repeat', 'deep' )		=> 'no-repeat',
					),
					'std'				=> 'no-repeat',
					'description'		=> esc_html__( 'The background-position property sets the starting position of a background image.', 'deep' ),
					'group'				=> esc_html__( 'Background', 'deep' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'heading'			=> esc_html__( 'Background Cover ?', 'deep' ),
					'type'				=> 'checkbox',
					'param_name'		=> 'bg_cover',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'std'				=> 'yes',
					'group'				=> esc_html__( 'Background', 'deep' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'heading'			=> esc_html__( 'Fixed Background ?', 'deep' ),
					'type'				=> 'checkbox',
					'param_name'		=> 'bg_attachment',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'group'				=> esc_html__( 'Background', 'deep' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'heading'			=> esc_html__( 'Parallax', 'deep' ),
					'description'		=> esc_html__( 'Add parallax type background for row.', 'deep' ),
					'type'				=> 'dropdown',
					'param_name'		=> 'wn_parallax',
					'value'				=> array(
						esc_html__( 'None', 'deep' )		=> '',
						esc_html__( 'Parallax', 'deep' )	=> 'content-moving',
					),
					'group'				=> esc_html__( 'Background', 'deep' ),
				),				

				array(
					'heading'			=> esc_html__( 'Parallax Speed', 'deep' ),
					'type'				=> 'dropdown',
					'param_name'		=> 'wn_parallax_speed',
					'value'				=> array(
						esc_html__( 'Very Slow', 'deep' )	=> '108',
						esc_html__( 'Slow', 'deep' )		=> '123',
						esc_html__( 'Normal', 'deep' )	=> '190',
						esc_html__( 'Fast', 'deep' )		=> '225',
						esc_html__( 'Very Fast', 'deep' )	=> '260',
					),
					'std'				=> '123',
					'dependency'		=> array(
						'element'	=> 'wn_parallax',
						'not_empty'	=> true,
					),
					'group'				=> esc_html__( 'Background', 'deep' ),
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__('Background None in Mobile Size?', 'deep'),
					'param_name'		=> 'responsive_bg_none',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'respo-bg-none' ),
					'description'		=> esc_html__('If checked background columns will be disabled in mobile.', 'deep'),
					'edit_field_class'	=> 'vc_col-sm-6',
					'group'				=> esc_html__( 'Background', 'deep' ),
				),


				/**
			     * ---> Start video Background group
			     */
				array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__( 'Video Background Source', 'deep' ),
					'param_name'		=> 'video_bg_source',
					'description'		=> esc_html__( 'Please select video source', 'deep' ),
					'value'				=> array(
						esc_html__( 'Youtube', 'deep' )		=> 'youtube',
						esc_html__( 'Self Hosted', 'deep' )	=> 'host',
					),
					'group'				=> esc_html__( 'Video BG', 'deep' ),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__( 'YouTube link', 'deep' ),
					'param_name'		=> 'video_bg_url',
					'value'				=> '',
					'description'		=> esc_html__( 'Add YouTube link.', 'deep' ),
					'dependency'		=> array(
						'element'	=> 'video_bg_source',
						'value' 	=> 'youtube',
					),
					'group'				=> esc_html__( 'Video BG', 'deep' ),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__('.MP4 Format', 'deep'),
					'param_name'		=> 'mp4_format',
					'value'				=> '',
					'description'		=> esc_html__( 'Compatibility for Safari and IE9', 'deep'),
					'dependency'		=> array(
						'element'	=> 'video_bg_source',
						'value'		=> 'host',
					),
					'group'				=> esc_html__( 'Video BG', 'deep' ),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__('.WebM Format', 'deep'),
					'param_name'		=> 'webm_format',
					'value'				=> '',
					'description'		=> esc_html__( 'Compatibility for Firefox4, Opera, and Chrome', 'deep'),
					'dependency'		=> array(
						'element'	=> 'video_bg_source',
						'value'		=> 'host',
					),
					'group'				=> esc_html__( 'Video BG', 'deep' ),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__('.Ogg Format', 'deep'),
					'param_name'		=> 'ogg_format',
					'value'				=> '',
					'description'		=> esc_html__( 'Compatibility for older Firefox and Opera versions', 'deep'),
					'dependency'		=> array(
						'element'	=> 'video_bg_source',
						'value'		=> 'host',
					),
					'group'				=> esc_html__( 'Video BG', 'deep' ),
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Video Muted', 'deep' ),
					'param_name'		=> 'video_mute',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'muted' ),
					'std'				=> 'muted',
					'description'		=> esc_html__( 'If checked the video will be Muted', 'deep' ),
					'dependency'		=> array(
						'element'	=> 'video_bg_source',
						'value'		=> 'host',
					),
					'group'				=> esc_html__( 'Video BG', 'deep' ),
					'edit_field_class'	=> 'vc_col-sm-12',
				),

				/**
			     * ---> Start Styling
			     */
				array(
					'type'				=> 'css_editor',
					'heading'			=> esc_html__( 'CSS box', 'deep' ),
					'param_name'		=> 'css',
					'group'				=> esc_html__( 'Styling', 'deep' ),
					'edit_field_class' => 'vc_col-sm-12 vc_column wn-css-editor',
				),

				/**
			     * ---> Animation group
			     */
				//vc_map_add_css_animation( true ),
				array(
					'type'				=> 'animation_style',
					'heading'			=> esc_html__( 'CSS Animation', 'deep' ),
					'param_name'		=> 'css_animation',
					'admin_label'		=> true,
					'value'				=> '',
					'settings'			=> array(
						'type'		=> 'in',
						'custom'	=> array(
							array(
								'label'		=> esc_html__( 'Default', 'deep' ),
								'values'	=> array(
									esc_html__( 'Top to bottom', 'deep' ) 		=> 'top-to-bottom',
									esc_html__( 'Bottom to top', 'deep' ) 		=> 'bottom-to-top',
									esc_html__( 'Left to right', 'deep' ) 		=> 'left-to-right',
									esc_html__( 'Right to left', 'deep' ) 		=> 'right-to-left',
									esc_html__( 'Appear from center', 'deep' )	=> 'appear',
							),
						),
					),
					),
					'description'		=> esc_html__( 'Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).', 'deep' ),
					'group'				=> esc_html__( 'Animate', 'deep' ),
				),


				/**
			     * ---> Start Class & ID
			     */
				array(
					'type'				=> 'el_id',
					'heading'			=> esc_html__( 'Row ID', 'deep' ),
					'param_name'		=> 'el_id',
					'description'		=> wp_kses( __( 'Enter row ID (Note: make sure it is unique and valid according to <a href="http://www.w3schools.com/tags/att_global_id.asp" target="_blank">w3c specification</a>).', 'deep' ), deep_kses() ),
					'group'				=> esc_html__( 'Class & ID', 'deep' ),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__( 'Extra class', 'deep' ),
					'param_name'		=> 'el_class',
					'description'		=> esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'deep' ),
					'group'				=> esc_html__( 'Class & ID', 'deep' ),
				),

				array(
					'type'				=> 'disable',
					'param_name'		=> 'wn_class',
					'value'				=> $webnus_class,
					'std'				=> $webnus_class,
					'group'				=> esc_html__( 'Class & ID', 'deep' ),
				),

				// Row Gradient
				array(
					'group'			=> 'Gradient',
					'type'			=> 'checkbox',
					'heading'		=> esc_html__( 'Gradient', 'deep' ),
					'param_name'	=> 'row_color_type',
					'value'			=> array( esc_html__( 'Yes', 'deep' ) => 'row_gradient' ),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 1', 'deep'),
					'param_name'		=> 'row_grad_color_1',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'row_color_type',
						'value'		=> 'row_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 2', 'deep'),
					'param_name'		=> 'row_grad_color_2',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'row_color_type',
						'value'		=> 'row_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 3', 'deep'),
					'param_name'		=> 'row_grad_color_3',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'row_color_type',
						'value'		=> 'row_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 4', 'deep'),
					'param_name'		=> 'row_grad_color_4',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'row_color_type',
						'value'		=> 'row_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Direction', 'deep' ),
					'param_name'	=> 'row_grad_direction',
					'value'			=> '',
					'description'	=> esc_html__( 'Gradient direction example: 70', 'deep'),
					'dependency'	=> array(
						'element'	=> 'row_color_type',
						'value'		=> 'row_gradient',
					),
				),
			);
			vc_add_params('vc_row',$attributes);
		}

	}
	add_action('admin_init', 'deep_setup_vc_row');
}
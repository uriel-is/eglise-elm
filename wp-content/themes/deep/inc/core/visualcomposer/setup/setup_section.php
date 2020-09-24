<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( is_plugin_active( 'js_composer/js_composer.php' ) ) :

	add_action( 'admin_init', 'deep_setup_vc_section' );

	if ( ! function_exists( 'deep_setup_vc_section' ) ) :
		function deep_setup_vc_section() {

			//Remove Section Features
			vc_remove_param('vc_section', 'el_class');
			vc_remove_param('vc_section', 'full_width');
			vc_remove_param('vc_section', 'full_height');
			vc_remove_param('vc_section', 'columns_placement');
			vc_remove_param('vc_section', 'content_placement');
			vc_remove_param('vc_section', 'parallax');
			vc_remove_param('vc_section', 'parallax_image');
			vc_remove_param('vc_section', 'parallax_speed_bg');
			vc_remove_param('vc_section', 'css');
			vc_remove_param('vc_section', 'el_id');
			vc_remove_param('vc_section', 'video_bg');
			vc_remove_param('vc_section', 'video_bg_url');
			vc_remove_param('vc_section', 'video_bg_parallax');
			vc_remove_param('vc_section', 'parallax_speed_video');
			vc_remove_param('vc_section', 'css_animation');
			vc_remove_param('vc_section', 'disable_element');

			$uniqid = uniqid();
			$webnus_class= 'wn-section-' . $uniqid . '';

			$attributes = array(

				//general

				array(
					'heading'			=> esc_html__( 'Stretch content (Full width content)', 'deep' ),
					'description'		=> esc_html__( 'Select stretching options for section and content.', 'deep' ),
					'type'				=> 'checkbox',
					'param_name'		=> 'full_width',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
				),

				array(
					'heading' 			=> esc_html__( 'Full height section?', 'deep' ),
					'description'		=> esc_html__( 'If checked section will be set to full height.', 'deep' ),
					'type' 				=> 'checkbox',
					'param_name' 		=> 'full_height',
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
					'heading'			=> esc_html__( 'Section Height', 'deep' ),
					'description'		=> esc_html__( 'Set height for row. This feature doesn\'t work in "Full Height" row.', 'deep' ),
					'type'				=> 'textfield',
					'param_name'		=> 'wn_section_height',
					'dependency'		=> array(
						'element'	=> 'full_height',
						'is_empty'	=> true,
					),
				),

				array(
					'type'				=> 'dropdown',
					'heading' 			=> esc_html__( 'Content position', 'deep' ),
					'param_name' 		=> 'content_placement',
					'value' 			=> array(
						esc_html__( 'Default', 'deep' )	=> '',
						esc_html__( 'Top', 'deep' ) 	=> 'top',
						esc_html__( 'Middle', 'deep' )	=> 'middle',
						esc_html__( 'Bottom', 'deep' )	=> 'bottom',
					),
					'description'		=> esc_html__( 'Select content position within section.', 'deep' ),
				),

				array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__('Overlay pattern', 'deep'),
					'param_name'		=> 'sec_pattern',
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
					'param_name'		=> 'sec_pattern_color',
					'value'				=> '',
					'description'		=> esc_html__( 'Overlay Color', 'deep'),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'heading'			=> esc_html__( 'Align Center?', 'deep' ),
					'description'		=> esc_html__('Align center content', 'deep'),
					'type'				=> 'checkbox',
					'param_name'		=> 'align_center',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'aligncenter' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'heading'			=> esc_html__( 'White Text Color?', 'deep' ),
					'description' 		=> esc_html__( 'If you choose it, all text will be white.', 'deep' ),
					'type'				=> 'checkbox',
					'param_name'		=> 'white_text_color',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Disable section', 'deep' ),
					'param_name'		=> 'disable_element',
					'description'		=> esc_html__( 'If checked the section won\'t be visible on the public side of your website. You can switch it back any time.', 'deep' ),
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Expandable Section', 'deep' ),
					'param_name'		=> 'expandable_row',
					'description'		=> esc_html__( 'Make this section close on default and show plus icon for expand all of content in this section.', 'deep' ),
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => '1' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'heading'			=> esc_html__( 'Expand Text', 'deep' ),
					'description'		=> esc_html__( 'Show text above of expand icon button', 'deep' ),
					'type'				=> 'textfield',
					'param_name'		=> 'txt_expandable_row',
					'dependency'		=> array(
						'element'	=> 'expandable_row',
						'not_empty'	=> true,
					),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'heading'			=> esc_html__( 'Expand Button Color', 'deep' ),
					'description'		=> esc_html__( 'Select Custom Background color.', 'deep' ),
					'type'				=> 'colorpicker',
					'param_name'		=> 'color_expandable_row',
					'dependency'		=> array(
						'element'	=> 'expandable_row',
						'not_empty'	=> true,
					),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				/**
			     * ---> Start Background group
			     */
				array(
					'heading'			=> esc_html__( 'Background (Color or Image)', 'deep' ),
					'group'				=> esc_html__( 'Background', 'deep' ),
					'type'				=> 'css_editor',
					'param_name'		=> 'css',
					'edit_field_class' => 'vc_col-sm-12 vc_column wn-bg-editor',
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
						esc_html__( 'Normal', 'deep' )		=> '190',
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

				array(
					'heading'			=> esc_html__( 'Put shape on top of section?', 'deep' ),
					'type'				=> 'checkbox',
					'param_name'		=> 'shape_on_top',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'group'				=> esc_html__( 'Shape Divider', 'deep' ),
				),

				array(
					'type'				=> 'imageselect',
					'heading' 			=> esc_html__( 'Shape Divider', 'deep' ),
					'param_name' 		=> 'top_shape_divider',
					'options' 			=> array(
						'1'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider1-top.png',
						'2'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider2-top.png',
						'3'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider3-top.png',
						'4'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider4-top.png',
						'5'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider5-top.png',
						'6'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider6-top.png',
						'7'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider7-top.png',
						'8'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider8-top.png',
						'9'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider9-top.png',
					),
					'std'				=> '2',
					'description'		=> esc_html__( 'Select an image.', 'deep' ),
					'dependency'		=> array(
						'element' 	=> 'shape_on_top',
						'value' 	=> 'yes',
					),
					'group'				=> esc_html__( 'Shape Divider', 'deep' ),
				),

				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Background color', 'deep'),
					'param_name'		=> 'top_shape_bgcolor',
					'value'				=> '',
					'description'		=> esc_html__( 'Background Color', 'deep'),
					'dependency'		=> array(
						'element' 	=> 'shape_on_top',
						'value' 	=> 'yes',
					),
					'group'				=> esc_html__( 'Shape Divider', 'deep' ),
				),

				array(
					'heading'			=> esc_html__( 'Put shape on Bottom of section?', 'deep' ),
					'type'				=> 'checkbox',
					'param_name'		=> 'shape_on_bottom',
					'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
					'group'				=> esc_html__( 'Shape Divider', 'deep' ),
				),

				array(
					'type'				=> 'imageselect',
					'heading' 			=> esc_html__( 'Shape Divider', 'deep' ),
					'param_name' 		=> 'bottom_shape_divider',
					'options' 			=> array(
						'1'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider1-bottom.png',
						'2'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider2-bottom.png',
						'3'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider3-bottom.png',
						'4'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider4-bottom.png',
						'5'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider5-bottom.png',
						'6'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider6-bottom.png',
						'7'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider7-bottom.png',
						'8'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider8-bottom.png',
						'9'	=> DEEP_CORE_URL .'visualcomposer/assets/images/divider9-bottom.png',
					),
					'std'				=> '2',
					'description'		=> esc_html__( 'Select an image.', 'deep' ),
					'dependency'		=> array(
						'element' 	=> 'shape_on_bottom',
						'value' 	=> 'yes',
					),
					'group'				=> esc_html__( 'Shape Divider', 'deep' ),
				),

				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Background color', 'deep'),
					'param_name'		=> 'bottom_shape_bgcolor',
					'value'				=> '',
					'description'		=> esc_html__( 'Background Color', 'deep'),
					'dependency'		=> array(
						'element' 	=> 'shape_on_bottom',
						'value' 	=> 'yes',
					),
					'group'				=> esc_html__( 'Shape Divider', 'deep' ),
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
				// array(
				// 	'group'				=> esc_html__( 'Styling', 'deep' ),
				// 	'type'				=> 'css_editor',
				// 	'param_name'		=> 'styling',
				// 	'edit_field_class' => 'vc_col-sm-12 vc_column wn-css-editor',
				// ),


				/**
			     * ---> Start animation group
			     */
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
					'param_name'	=> 'section_color_type',
					'value'			=> array( esc_html__( 'Yes', 'deep' ) => 'section_gradient' ),
					'description'	=> esc_html__( 'Flip content', 'deep'),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 1', 'deep'),
					'param_name'		=> 'section_grad_color_1',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'section_color_type',
						'value'		=> 'section_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 2', 'deep'),
					'param_name'		=> 'section_grad_color_2',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'section_color_type',
						'value'		=> 'section_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 3', 'deep'),
					'param_name'		=> 'section_grad_color_3',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'section_color_type',
						'value'		=> 'section_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('color 4', 'deep'),
					'param_name'		=> 'section_grad_color_4',
					'value'				=> '',
					'edit_field_class'	=> 'vc_col-sm-3 vc_column paddingtop paddingbottom',
					'dependency'		=> array(
						'element'	=> 'section_color_type',
						'value'		=> 'section_gradient',
					),
				),
				array(
					'group'				=> 'Gradient',
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Direction', 'deep' ),
					'param_name'	=> 'section_grad_direction',
					'value'			=> '',
					'description'	=> esc_html__( 'Gradient direction example: 70', 'deep'),
					'dependency'	=> array(
						'element'	=> 'section_color_type',
						'value'		=> 'section_gradient',
					),
				),


			);
			vc_add_params( 'vc_section', $attributes );
		}
	endif;

endif;
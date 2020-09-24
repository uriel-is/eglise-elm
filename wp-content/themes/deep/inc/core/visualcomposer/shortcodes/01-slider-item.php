<?php
vc_map( array(
	'name'						=> esc_html__( 'Single Slide', 'deep' ),
	'base'						=> 'single_slide',
	'icon'						=> 'content_slider_icon',
	'class'						=> 'content_slider_icon',
	'allowed_container_element'	=> 'vc_row',
	'is_container'				=> true,
	'content_element'			=> true,
	'as_child'					=> array(
		'only'	=> 'content_slider_element'
	),
	'html_template'				=> get_template_directory() . '/vc_templates/single_slide.php',
	'js_view'					=> 'SingleSlideView',
	'params'					=> array(
		array(
			'heading' 			=> esc_html__( 'Stretch content (Full width content)?', 'deep' ),
			'description'		=> esc_html__( 'Select stretching options for section and content.', 'deep' ),
			'type' 				=> 'checkbox',
			'param_name' 		=> 'full_width',
			'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
		),
		
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title', 'deep' ),
			'param_name' => 'title',

		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class', 'deep' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'deep' ),
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
				esc_html__( 'Left Top'	, 'deep' )		=> 'left top',
				esc_html__( 'Left Center', 'deep' )		=> 'left center',
				esc_html__( 'Left Bottom', 'deep' )		=> 'left bottom',
				esc_html__( 'Center Top', 'deep' )		=> 'center top',
				esc_html__( 'Center Center', 'deep' )	=> 'center center',
				esc_html__( 'Center Bottom', 'deep' )	=> 'center bottom',
				esc_html__( 'Right Top'	, 'deep' )		=> 'right top',
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
				esc_html__( 'Repeat'	, 'deep' )		=> 'repeat',
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
	),

) );


define( 'CONTENT_SLIDER_TITLE', esc_html__( 'Slide', 'ultimate_vc' ) );
	if(function_exists('vc_path_dir')){
	require_once vc_path_dir('SHORTCODES_DIR', 'vc-column.php');
	}

if( is_plugin_active( 'js_composer/js_composer.php' ) ){
class WPBakeryShortCode_SINGLE_SLIDE extends WPBakeryShortCode_VC_Column {

			protected $controls_css_settings = 'tc vc_control-container';
			protected $controls_list = array('add', 'edit', 'clone', 'delete');
			protected $predefined_atts = array(
					'tab_id' => CONTENT_SLIDER_TITLE,
					'title' => '',
					'icon_type'=>'',
					'icon'=> '',
				);

		public function __construct( $settings ) {
			parent::__construct( $settings );

		}
		public function customAdminBlockParams() {
			return ' id="tab-' . $this->atts['tab_id'] . '"';
		}

		public function mainHtmlBlockParams( $width, $i ) {
			return 'data-element_type="' . $this->settings["base"] . '" class="wpb_' . $this->settings['base'] . ' wpb_sortable wpb_content_holder"' . $this->customAdminBlockParams();
		}

		public function containerHtmlBlockParams( $width, $i ) {
			return 'class="wpb_column_container vc_container_for_children"';
		}
		public function getColumnControls( $controls, $extended_css = '' ) {

		    return $this->getColumnControlsModular($extended_css);
		}

	}
}


<?php
$slide_id_1 = time() . '-1-' . rand( 0, 100 );
$slide_id_2 = time() . '-2-' . rand( 0, 100 );
vc_map( array(
	'name'						=> esc_html__('Content Slider',"deep"),
	'base'						=> 'content_slider_element',
	'category'					=> esc_html__('Webnus Shortcodes','deep'),
	'description'				=> esc_html__('Create Content Slider','deep'),
	'class'						=> 'content_slider_icon',
	'is_container'				=> true,
	'weight'					=> - 5,
	'html_template'				=> get_template_directory() . '/vc_templates/content_slider_element.php',
	'admin_enqueue_css'			=> preg_replace( '/\s/', '%20', DEEP_CORE_URL . 'visualcomposer/assets/content-slider.css'),
	'js_view'					=> 'DeepContentSlider',
	'icon' => 'webnus-content-slider',
	'params'					=> array(
		array(
			'heading' 			=> esc_html__( 'Full height Slider?', 'deep' ),
			'description'		=> esc_html__( 'If checked Slider will be set to full height.', 'deep' ),
			'type' 				=> 'checkbox',
			'param_name' 		=> 'full_height',
			'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
		),
		array(
			'heading' 			=> esc_html__( 'Autoplay?', 'deep' ),
			'description'		=> esc_html__( 'If you want to turn on autoplay slider check it out.', 'deep' ),
			'type' 				=> 'checkbox',
			'param_name' 		=> 'autoplay',
			'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
		),
		array(
			'heading' 			=> esc_html__( 'Slider Speed', 'deep' ),
			'description'		=> esc_html__( 'Animation Speed', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'slider_speed',
			'value'				=> '500',
		),
		array(
			'type'				=> 'dropdown',
			'heading' 			=> esc_html__( 'Arrow Type', 'deep' ),
			'param_name' 		=> 'arrow_type',
			'value' 			=> array(
				esc_html__( 'Without Arrow', 'deep' ) 		=> 'none',
				esc_html__( 'Normal Arrow', 'deep' ) 		=> 'arrow1',
				esc_html__( 'Arrow with Line', 'deep' ) 	=> 'arrow2',
				esc_html__( 'Box Arrow', 'deep' )			=> 'arrow3',
				esc_html__( 'Modern Box Arrow', 'deep' )	=> 'arrow4',
			),
			'group'				=> esc_html__( 'Arrows', 'deep' ),
			'description'		=> esc_html__( 'Select Arrow type', 'deep' ),
		),
		array(
			'type'				=> 'dropdown',
			'heading' 			=> esc_html__( 'Arrow Position', 'deep' ),
			'param_name' 		=> 'arrow_position',
			'value' 			=> array(
				esc_html__( 'Normal (left and right)', 'deep' )	=> 'wn-normal-arrow',
				esc_html__( 'Top Left', 'deep' ) 				=> 'wn-tleft',
				esc_html__( 'Top Right', 'deep' ) 				=> 'wn-tright',
				esc_html__( 'Top Center', 'deep' ) 				=> 'wn-tcenter',
				esc_html__( 'Bottom Left', 'deep' ) 			=> 'wn-bleft',
				esc_html__( 'Bottom Right', 'deep' ) 			=> 'wn-bright',
				esc_html__( 'Bottom center', 'deep' ) 			=> 'wn-bcenter',
				esc_html__( 'Middle Left', 'deep' ) 			=> 'wn-mleft',
				esc_html__( 'Middle Right', 'deep' ) 			=> 'wn-mright',
				esc_html__( 'Middle center', 'deep' ) 			=> 'wn-mcenter',
				esc_html__( 'Custom', 'deep' ) 					=> 'wn-custom-arrow',
			),
			'group'				=> esc_html__( 'Arrows', 'deep' ),
			'description'		=> esc_html__( 'Select Arrow Position', 'deep' ),
		),
		array(
			'type' 				=> 'colorpicker',
			'heading' 			=> esc_html__( 'Arrow color', 'deep' ),
			'description'		=> esc_html__( 'Select arrow color .', 'deep'),
			'param_name'		=> 'arrow_color',
			'value'				=> '',
			'group'				=> esc_html__( 'Arrows', 'deep' ),
		),
		array(
			'type' 				=> 'colorpicker',
			'heading' 			=> esc_html__( 'Arrow Background color', 'deep' ),
			'description'		=> esc_html__( 'Select arrow background color .', 'deep'),
			'param_name'		=> 'arrow_bg_color',
			'value'				=> '',
			'group'				=> esc_html__( 'Arrows', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_type',
				'value'		=> 'arrow3',
			),
		),
		array(
			'type' 				=> 'colorpicker',
			'heading' 			=> esc_html__( 'Line color', 'deep' ),
			'description'		=> esc_html__( 'Select line color .', 'deep'),
			'param_name'		=> 'line_color',
			'value'				=> '',
			'group'				=> esc_html__( 'Arrows', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_type',
				'value'		=> 'arrow2',
			),
		),
		array(
			'heading' 			=> esc_html__( 'Top Space', 'deep' ),
			'description'		=> esc_html__( 'Top space value. For example: 35px or 50%. If you enter value in this field then leave “Bottom Space” field blank.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'top_space',
			'value'				=> '',
			'group'				=> esc_html__( 'Desktop', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),
		array(
			'heading' 			=> esc_html__( 'Bottom Space', 'deep' ),
			'description'		=> esc_html__( 'Bottom space value. For example: 35px or 50%. If you enter value in this field then leave “Top Space” field blank.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'bottom_space',
			'value'				=> '',
			'group'				=> esc_html__( 'Desktop', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),
		array(
			'heading' 			=> esc_html__( 'Left Space', 'deep' ),
			'description'		=> esc_html__( 'Left space value for left arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'left_space',
			'value'				=> '',
			'group'				=> esc_html__( 'Desktop', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),
		array(
			'heading' 			=> esc_html__( 'Right Space', 'deep' ),
			'description'		=> esc_html__( 'Right space value for right arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'right_space',
			'value'				=> '',
			'group'				=> esc_html__( 'Desktop', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),

		array(
			'heading' 			=> esc_html__( 'Top Space', 'deep' ),
			'description'		=> esc_html__( 'Top space value. For example: 35px or 50%. If you enter value in this field then leave “Bottom Space” field blank.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'top_space_tablet',
			'value'				=> '',
			'group'				=> esc_html__( 'Tablet', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),
		array(
			'heading' 			=> esc_html__( 'Bottom Space', 'deep' ),
			'description'		=> esc_html__( 'Bottom space value. For example: 35px or 50%. If you enter value in this field then leave “Top Space” field blank.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'bottom_space_tablet',
			'value'				=> '',
			'group'				=> esc_html__( 'Tablet', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),
		array(
			'heading' 			=> esc_html__( 'Left Space', 'deep' ),
			'description'		=> esc_html__( 'Left space value for left arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'left_space_tablet',
			'value'				=> '',
			'group'				=> esc_html__( 'Tablet', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),
		array(
			'heading' 			=> esc_html__( 'Right Space', 'deep' ),
			'description'		=> esc_html__( 'Right space value for right arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'right_space_tablet',
			'value'				=> '',
			'group'				=> esc_html__( 'Tablet', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),

				array(
			'heading' 			=> esc_html__( 'Top Space', 'deep' ),
			'description'		=> esc_html__( 'Top space value. For example: 35px or 50%. If you enter value in this field then leave “Bottom Space” field blank.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'top_space_mobile',
			'value'				=> '',
			'group'				=> esc_html__( 'Mobile', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),
		array(
			'heading' 			=> esc_html__( 'Bottom Space', 'deep' ),
			'description'		=> esc_html__( 'Bottom space value. For example: 35px or 50%. If you enter value in this field then leave “Top Space” field blank.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'bottom_space_mobile',
			'value'				=> '',
			'group'				=> esc_html__( 'Mobile', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),
		array(
			'heading' 			=> esc_html__( 'Left Space', 'deep' ),
			'description'		=> esc_html__( 'Left space value for left arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'left_space_mobile',
			'value'				=> '',
			'group'				=> esc_html__( 'Mobile', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),
		array(
			'heading' 			=> esc_html__( 'Right Space', 'deep' ),
			'description'		=> esc_html__( 'Right space value for right arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
			'type' 				=> 'textfield',
			'param_name' 		=> 'right_space_mobile',
			'value'				=> '',
			'group'				=> esc_html__( 'Mobile', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'arrow_position',
				'value'		=> 'wn-custom-arrow',
			),
		),

		array(
			'type'				=> 'dropdown',
			'heading' 			=> esc_html__( 'Bullet Type', 'deep' ),
			'param_name' 		=> 'bullet_type',
			'value' 			=> array(
				esc_html__( 'None', 'deep' ) 		=> 'none',
				esc_html__( 'Circle', 'deep' ) 		=> 'wn-bullet-circle',
				esc_html__( 'Rectangular', 'deep' ) => 'wn-bullet-rec',
				esc_html__( 'Square', 'deep' ) 		=> 'wn-bullet-sq',
			),
			'group'				=> esc_html__( 'Bullets', 'deep' ),
			'description'		=> esc_html__( 'Select Bullet type', 'deep' ),
		),
		array(
			'type' 				=> 'colorpicker',
			'heading' 			=> esc_html__( 'Bullet color', 'deep' ),
			'description'		=> esc_html__( 'Select bullet color .', 'deep'),
			'param_name'		=> 'bullet_color',
			'value'				=> '',
			'group'				=> esc_html__( 'Bullets', 'deep' ),
			'dependency'		=> array(
				'element'	=> 'bullet_type',
				'value'		=> array( 'wn-bullet-circle' , 'wn-bullet-rec' , 'wn-bullet-sq' ),
			),
		),
		array(
			'type'				=> 'dropdown',
			'heading' 			=> esc_html__( 'Numbers', 'deep' ),
			'param_name' 		=> 'numbers',
			'value' 			=> array(
				esc_html__( 'None', 'deep' ) 			=> 'none',
				esc_html__( 'Top Left', 'deep' ) 		=> 'num-tl',
				esc_html__( 'Top Center', 'deep' ) 		=> 'num-tc',
				esc_html__( 'Top Right', 'deep' ) 		=> 'num-tr',
				esc_html__( 'Middle Left', 'deep' ) 	=> 'num-ml',
				esc_html__( 'Middle Center', 'deep' ) 	=> 'num-mc',
				esc_html__( 'Middle Right', 'deep' ) 	=> 'num-mr',
				esc_html__( 'Bottom Left', 'deep' ) 	=> 'num-bl',
				esc_html__( 'Bottom Center', 'deep' ) 	=> 'num-bc',
				esc_html__( 'Bottom Right', 'deep' ) 	=> 'num-br',
			),
			'group'				=> esc_html__( 'Numbers', 'deep' ),
			'description'		=> esc_html__( 'Select Numbers Position', 'deep' ),
		),
		array(
			'type' 				=> 'colorpicker',
			'heading' 			=> esc_html__( 'Background color', 'deep' ),
			'description'		=> esc_html__( 'Select background color. (Please first select Numbers Position on top)', 'deep'),
			'param_name'		=> 'num_bg_color',
			'value'				=> '',
			'group'				=> esc_html__( 'Numbers', 'deep' ),
		),
		array(
			'type' 				=> 'colorpicker',
			'heading' 			=> esc_html__( 'Number color', 'deep' ),
			'description'		=> esc_html__( 'Select Number color. (Please first select Numbers Position on top)', 'deep'),
			'param_name'		=> 'num_color',
			'value'				=> '',
			'group'				=> esc_html__( 'Numbers', 'deep' ),
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
	'custom_markup'				=> '<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
										<ul class="content_slides">
										</ul>
										%content%
									</div>'	,

	'default_content'			=> '[single_slide title="' . esc_html__( 'Slide 1', 'deep' ) . '" tab_id="' . $slide_id_1 . ' ][/single_slide][single_slide title="' . esc_html__( 'Slide 2', 'deep' ) . '" tab_id="' . $slide_id_2 . ' ][/single_slide]',
 ) );



class WPBakeryShortCode_CONTENT_SLIDER_ELEMENT extends WPBakeryShortCode {
	static $filter_added = false;
	protected $controls_css_settings = 'out-tc vc_controls-content-widget';
	protected $controls_list = array('edit', 'clone', 'delete');

	public function contentAdmin( $atts, $content = null ) {
		$width = $custom_markup = '';
		$shortcode_attributes = array( 'width' => '1/1' );
			foreach ( $this->settings['params'] as $param ) {
					if ( $param['param_name'] != 'content' ) {
						if ( isset( $param['value'] ) && is_string( $param['value'] ) ) {
							$shortcode_attributes[$param['param_name']] = esc_html__( $param['value'], "deep" );
						} elseif ( isset( $param['value'] ) ) {
							$shortcode_attributes[$param['param_name']] = $param['value'];
						}
					} else if ( $param['param_name'] == 'content' && $content == NULL ) {
						//$content = $param['value'];
						$content = esc_html__( $param['value'], "deep" );
					}
				}
		extract( shortcode_atts( $shortcode_attributes, $atts ) );


		preg_match_all( '/vc_tab title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $content, $matches, PREG_OFFSET_CAPTURE );

		$output = '';
		$inner = '';
		$element = $this->getElementHolder( $width );
		foreach ( $this->settings['params'] as $param ) {
			$custom_markup = '';
			$param_value = isset( $param['param_name'] ) ? $param['param_name'] : '';
			if ( is_array( $param_value ) ) {
				reset( $param_value );
				$first_key = key( $param_value );
				$param_value = $param_value[$first_key];
			}
			$inner .= $this->singleParamHtmlHolder( $param, $param_value );
		}

		if ( isset( $this->settings["custom_markup"] ) && $this->settings["custom_markup"] != '' ) {
			if ( $content != '' ) {
				$custom_markup = str_ireplace( "%content%", $tmp . $content, $this->settings["custom_markup"] );
			} else if ( $content == '' && isset( $this->settings["default_content_in_template"] ) && $this->settings["default_content_in_template"] != '' ) {
				$custom_markup = str_ireplace( "%content%", $this->settings["default_content_in_template"], $this->settings["custom_markup"] );
			} else {
				$custom_markup = str_ireplace( "%content%", '', $this->settings["custom_markup"] );
			}
			$inner .= do_shortcode( $custom_markup );
		}
		$element = str_ireplace( '%wpb_element_content%', $inner, $element );
		$output = $element;
		return $output;
	}
}


add_action( 'admin_print_scripts', 'deep_tabs_admin',999 );
function deep_tabs_admin() {
	$screen = get_current_screen();
	$screen_id = $screen->base;
	if($screen_id !== 'post')
		return false;
	wp_register_script('admin-tab', DEEP_CORE_URL . 'visualcomposer/assets/js/admin_tab.js',array( 'jquery'),false,true);
	wp_register_script('single-tab', DEEP_CORE_URL . 'visualcomposer/assets/js/tab_single.js',array( 'jquery'),false,true);

	wp_enqueue_script('admin-tab');
	wp_enqueue_script('single-tab');
}



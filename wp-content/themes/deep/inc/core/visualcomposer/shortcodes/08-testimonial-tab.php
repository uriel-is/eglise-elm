<?php
$tab_slide_id_1 = time() . '-1-' . rand( 0, 100 );
$tab_slide_id_2 = time() . '-2-' . rand( 0, 100 );
vc_map( array(
	'name'				=> esc_html__('Testimonial Tab',"deep") ,
	'base'				=> 'testimonial_tab_element',
	'category'			=> esc_html__('Webnus Shortcodes','deep'),
	'description'		=> esc_html__('Create Testimonial Tab','deep'),
	'class'				=> 'testimonial_tab_icon',
	'is_container'		=> true,
	'weight'			=> - 5,
	'html_template'		=> get_template_directory() . '/vc_templates/testimonial_tab_element.php',
	'admin_enqueue_css'	=> preg_replace( '/\s/', '%20', DEEP_CORE_URL . 'visualcomposer/assets/testimonial-tab.css'),
	'js_view'			=> 'DeepTestimonialTab',
	'icon' 				=> 'webnus-testimonial-tab',
	'params'			=> array(
		array(
			'heading'		=> esc_html__( 'Testimonial Center Align', 'deep' ),
			'description'	=> esc_html__( 'If checked Testimonial will be set to center align.', 'deep' ),
			'type' 			=> 'checkbox',
			'param_name'	=> 'center_align',
			'value' 		=> array( esc_html__( 'Enable', 'deep' ) => 'enable'),
			'admin_label'	=> true,
		),
	),
	'custom_markup'	=> '<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
						<ul class="content_slides"></ul>%content%</div>',
						
	'default_content' => '[testimonial_single_tab title="' . esc_html__( 'Tab 1', 'deep' ) . '" tab_id="' . $tab_slide_id_1 . ' ][/testimonial_single_tab][testimonial_single_tab title="' . esc_html__( 'Tab 2', 'deep' ) . '" tab_id="' . $tab_slide_id_2 . ' ][/testimonial_single_tab]',

 ) );



class WPBakeryShortCode_TESTIMONIAL_TAB_ELEMENT extends WPBakeryShortCode {
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


add_action( 'admin_print_scripts', 'deep_tabs_admin1',999 );
function deep_tabs_admin1() {
	$screen = get_current_screen();
	$screen_id = $screen->base;
	if($screen_id !== 'post')
		return false;
	wp_register_script('admin-testimonial-tab', DEEP_CORE_URL . 'visualcomposer/assets/js/admin_testimonial_tab.js',array( 'jquery'),false,true);
	wp_register_script('testimonial-tab-single', DEEP_CORE_URL . 'visualcomposer/assets/js/testimonial_tab_single.js',array( 'jquery'),false,true);

	wp_enqueue_script('admin-testimonial-tab');
	wp_enqueue_script('testimonial-tab-single');
}
<?php
$tab_content_id_1 = time() . '-1-' . rand( 0, 100 );
$tab_content_id_2 = time() . '-2-' . rand( 0, 100 );
vc_map( array(
	'name'				=> esc_html__('Content Carousel',"deep"),
	'base'				=> 'content_carousel',
	'category'			=> esc_html__('Webnus Shortcodes','deep'),
	'description'		=> esc_html__('Create Content Carousel','deep'),
	'class'				=> 'wn-content-carousel',
	'is_container'		=> true,
	'weight'			=> - 5,
	'html_template'		=> get_template_directory() . '/vc_templates/content_carousel.php',
	'admin_enqueue_css'	=> preg_replace( '/\s/', '%20', DEEP_CORE_URL . 'visualcomposer/assets/content_carousel.css'),
	'js_view'			=> 'DeepCarouselTab',
	'icon' 				=> 'webnus-content-carousel',
	'params'			=> array(
		array(
			'heading'		=> esc_html__( 'Content Carousel Items', 'deep' ),
			'type' 			=> 'textfield',
			'param_name'	=> 'item_num',
			'value' 		=> '',
			'admin_label'	=> true,
			'description'	=> esc_html__( 'Number of items want to show in content carousel', 'deep' ),
			'group'			=> esc_html__( 'General', 'deep' ),
		),
		array(
			'heading'		=> esc_html__( 'Item margin', 'deep' ),
			'type' 			=> 'textfield',
			'param_name'	=> 'item_margin',
			'value' 		=> '',
			'description'	=> esc_html__( 'Content carousel items margin right ( For example: 50 )', 'deep' ),
			'group'			=> esc_html__( 'General', 'deep' ),
		),
		array(
			'heading'		=> esc_html__( 'Items stage padding', 'deep' ),
			'type' 			=> 'textfield',
			'param_name'	=> 'items_stage_padding',
			'value' 		=> '',
			'description'	=> esc_html__( 'Content carousel padding left and right on stage ( For example: 30 )', 'deep' ),
			'group'			=> esc_html__( 'General', 'deep' ),
		),
		array(
			'heading'		=> esc_html__( 'Custom Padding for carousel container' , 'deep' ),
			'type'			=> 'checkbox',
			'param_name'	=> 'carousel_padding',
			'value'			=> array( esc_html__( 'Enable' , 'deep' ) => 'true' ),
			'description'	=> esc_html__( 'Content Carousel padding left and right, for Example 30px' , 'deep' ),
			'group'			=> esc_html__( 'General', 'deep' ),
		),
		array(
			'heading'		=> esc_html__( 'Carousel padding Value' , 'deep' ),
			'type'			=> 'textfield',
			'param_name'	=> 'carousel_paddin_val',
			'value'			=> '',
			'description'	=> esc_html__( 'Padding left and right, for Example 30px' , 'deep' ),
			'dependency'	=> array(
				'element'	=> 'carousel_padding',
				'not_empty'	=> true,
			),
			'group'			=> esc_html__( 'General', 'deep' ),
		),
		array(
			'heading'		=> esc_html__( 'RTL' , 'deep' ),
			'type'			=> 'checkbox',
			'param_name'	=> 'carousel_rtl',
			'value'			=> array( esc_html__( 'Enable' , 'deep' ) => 'true' ),
			'group'			=> esc_html__( 'General', 'deep' ),
		),
		array(
			'heading'		=> esc_html__( 'Bullets Navigation' , 'deep' ),
			'type'			=> 'checkbox',
			'param_name'	=> 'dots',
			'value'			=> array( esc_html__( 'Enable' , 'deep' ) => 'true' ),
			'group'			=> esc_html__( 'Navigation', 'deep' ),
		),
		array(
			'heading'		=> esc_html__( 'Navigation Arrows' , 'deep' ),
			'type'			=> 'checkbox',
			'param_name'	=> 'navigation',
			'value'			=> array( esc_html__( 'Enable' , 'deep' ) => 'true' ),
			'group'			=> esc_html__( 'Navigation', 'deep' ),
		),
		array(
			'heading'		=> esc_html__( 'Locate the navigation arrows on the content carousel' , 'deep' ),
			'type'			=> 'dropdown',
			'param_name'	=> 'nav_location',
			'value'			=> array( 
				esc_html__( 'Bottom ' , 'deep' ) => 'bottom_nav',
				esc_html__( 'Sidebar' , 'deep' ) => 'sidebar_nav',
				
			),
			'group'			=> esc_html__( 'Navigation', 'deep' ),
		),

		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Extra Class', 'deep' ),
			'param_name'	=> 'shortcodeclass',
			'value'			=> '',
			'group'			=> esc_html__( 'Class & ID', 'deep' ),
		),

		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Custom ID', 'deep' ),
			'param_name'	=> 'shortcodeid',
			'value'			=> '',
			'group'			=> esc_html__( 'Class & ID', 'deep' ),
		),

	),
	'custom_markup'	=> '<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
						<ul class="content_slides"></ul>%content%</div>',
						
	'default_content' => '[content_carousel_tab title="' . esc_html__( 'Content 1', 'deep' ) . '" tab_id="' . 
		$tab_content_id_1 . ' ][/content_carousel_tab][content_carousel_tab title="' . esc_html__( 'Content 2', 'deep' ) . '" tab_id="' . 
		$tab_content_id_2 . ' ][/content_carousel_tab]',

 ) );



class WPBakeryShortCode_CONTENT_CAROUSEL extends WPBakeryShortCode {
	static 		$filter_added = false;
	protected 	$controls_css_settings = 'out-tc vc_controls-content-widget';
	protected 	$controls_list = array('edit', 'clone', 'delete');

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


add_action( 'admin_print_scripts', 'deep_tabs_admin3',999 );
function deep_tabs_admin3() {
	$screen 	= get_current_screen();
	$screen_id	= $screen->base;
	if($screen_id !== 'post')
		return false;
	wp_register_script('admin_content_carousel_tab', DEEP_CORE_URL . 'visualcomposer/assets/js/admin_carousel.js',array( 'jquery'),false,true);
	wp_register_script('admin_content_carousel_single', DEEP_CORE_URL . 'visualcomposer/assets/js/tab_single_carousel.js',array( 'jquery'),false,true);

	wp_enqueue_script('admin_content_carousel_tab');
	wp_enqueue_script('admin_content_carousel_single');
}



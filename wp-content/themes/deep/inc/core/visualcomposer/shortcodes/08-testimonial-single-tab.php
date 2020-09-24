<?php
vc_map( array(
	'name'						=> esc_html__( 'Single Testimonial Tab', 'deep' ),
	'base'						=> 'testimonial_single_tab',
	'icon'						=> 'testimonial_tab_icon',
	'class'						=> 'testimonial_tab_icon',
	'allowed_container_element'	=> 'vc_row',
	'is_container'				=> true,
	'content_element'			=> true,
	'as_child'					=> array( 'only' => 'testimonial_tab_element' ),
	'html_template'				=> get_template_directory() . '/vc_templates/testimonial_single_tab.php',
	'js_view'					=> 'SingleSlideView',
	'params'					=> array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title', 'deep' ),
			'param_name' => 'title',
			'admin_label'	=> true,
		),
		
		array(
			'heading'		=> esc_html__( 'Testimonial Image', 'deep' ),
			'type'			=> 'attach_image',
			'param_name'	=> 'img',
			'value'			=> '',
			'admin_label'	=> true,
		),

		array(
			'heading'		=> esc_html__( 'Testimonial Name', 'deep' ),
			'type'			=> 'textfield',
			'param_name'	=> 'name',
			'value'			=> '',
			'admin_label'	=> true,
		),

		array(
			'heading'		=> esc_html__( 'Testimonial Job', 'deep' ),
			'type'			=> 'textfield',
			'param_name'	=> 'job',
			'value'			=> '',
			'admin_label'	=> true,
		),
	),

) );


define( 'TESTIMONIAL_SLIDER_TITLE', esc_html__( 'Slide', 'ultimate_vc' ) );
	if(function_exists('vc_path_dir')){
	require_once vc_path_dir('SHORTCODES_DIR', 'vc-column.php');
	}

if( is_plugin_active( 'js_composer/js_composer.php' ) ){
class WPBakeryShortCode_TESTIMONIAL_SINGLE_TAB extends WPBakeryShortCode_VC_Column {

			protected $controls_css_settings = 'tc vc_control-container';
			protected $controls_list = array('add', 'edit', 'clone', 'delete');
			protected $predefined_atts = array(
					'tab_id' => TESTIMONIAL_SLIDER_TITLE,
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


<?php
vc_map( array(
	'name'						=> esc_html__( 'Content Carousel Element', 'deep' ),
	'base'						=> 'content_carousel_tab',
	'icon'						=> 'wn-content-carousel',
	'class'						=> 'wn-content-carousel',
	'allowed_container_element'	=> 'vc_row',
	'is_container'				=> true,
	'content_element'			=> true,
	'as_child'					=> array( 'only' => 'content_carousel' ),
	'html_template'				=> get_template_directory() . '/vc_templates/content_carousel_tab.php',
	'js_view'					=> 'SingleSlideView',
) );


define( 'CONTENT_CAROUSEL_TITLE', esc_html__( 'Content', 'ultimate_vc' ) );
	if(function_exists('vc_path_dir')) {
		require_once vc_path_dir('SHORTCODES_DIR', 'vc-column.php');
	}

if( is_plugin_active( 'js_composer/js_composer.php' ) ) {
class WPBakeryShortCode_CONTENT_CAROUSEL_TAB extends WPBakeryShortCode_VC_Column {

			protected $controls_css_settings = 'tc vc_control-container';
			protected $controls_list = array('add', 'edit', 'clone', 'delete');
			protected $predefined_atts = array(
					'tab_id' 	=> CONTENT_CAROUSEL_TITLE,
					'title' 	=> '',
					'icon_type'	=>'',
					'icon'		=> '',
				);

		public function __construct( $settings ) {
			parent::__construct( $settings );
		}

		public function customAdminBlockParams() {
			return ' id="content-' . $this->atts['tab_id'] . '"';
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


<?php
class DeepWPBakeryToggleBox extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryToggleBox
	 */
	public static $instance;

	/**
	 * Provides access to a single instance of a module using the singleton pattern.
	 *
	 * @since   1.0.0
	 * @return  object
	 */
	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Define the core functionality of the theme.
	 *
	 * Load the dependencies.
	 *
	 * @since   1.0.0
	 */
	public function __construct() {
		add_shortcode( 'toggle_box', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $atts, $content = null ) {	
		extract(shortcode_atts(array(
			'type'						=> '',
			'service_single_title'		=> '',
			'bgcolor'					=> '',
			'service_single_content'	=> '',
			'icon_name'					=> '',
			'offers_subtitle'			=> '',
			'offers_title'				=> '',
			'background_image'			=> '',
			'bgcolor'					=> '',
			'open'						=> 'true',
			'offers_content'			=> '',
			'min_height'				=> '',
			'shortcodeclass' 			=> '',
			'shortcodeid' 	 			=> '',
		), $atts ));		

		// Class & ID 
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		$type = ( $type ) ? $type : '1' ;
		static $uniqid = 0;
		$uniqid++;
		$style = $live_page_builders_css = '';
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( $type == 1 ) {
			$service_single_title = ( $service_single_title ) ? '<h3>' . $service_single_title . '</h3>' : '' ;
			$style .= $background_1 = ( $bgcolor ) ? '.suite-toggle.suite-toggle' . $uniqid . ' { background-color:' . $bgcolor . '}' : '' ;
			$style .= $bgcolor ? '.suite-toggle.suite-toggle' . $uniqid . ' .toggle-content span i.ti-plus { color: ' . $bgcolor . ';} ': '';
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				$service_single_content = wpb_js_remove_wpautop($service_single_content, true);
			} else {
				$service_single_content = $service_single_content;
			}

			$service_main_content = ( $service_single_content ) ? '<div class="extra-content">' . $service_single_content . ' </div>' : '';
			$out = '
			<div class="suite-toggle suite-toggle' . $uniqid . ' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
				<div class="main-content">
					'. $service_single_title . '
					<div class="service-icon">
						<i class="'.$icon_name.'"></i>
					</div>
				</div>
				<div class="toggle-content">
					' . $service_main_content . '
					<span><i class="ti-plus"></i></span>
				</div>
			</div>';
			
			deep_save_dyn_styles( $style );
			// live editor
			$live_page_builders_css .= $style;
			if ( ! in_array( 'admin-bar', get_body_class() ) ) {

				if ( ! empty( $live_page_builders_css ) ) {

					$out .= '<style>';
						$out .= $live_page_builders_css;
					$out .= '</style>';

				}

			}
			return $out;

		} else {
			$min_height				= ( $min_height ) ? ' min-height:'. $min_height .'px;' : '' ;
			$open					= ( $open ) ? 'true' : 'false';
			$hide_content			= ( $open == "true" ) ? '' : 'w-hide' ;
			$plus_minus				= ( $open == "true" ) ? 'minus' : 'plus' ;
			$icon					= ( $icon_name ) ? '<div class="offer-icon"><i class="'. $icon_name .'"></i></div>' : '' ;
			$offers_subtitle 		= ( $offers_subtitle ) ? '<h4>' . $offers_subtitle . '</h4>' : '' ;
			$offers_title 	 		= ( $offers_title ) ? '<h3>' . $offers_title . '</h3>' : '' ;
			$background_color 		= ( $bgcolor ) ? ' background-color:' . $bgcolor . ';' : '' ;
			$background_image_url 	= ( $background_image ) ? wp_get_attachment_url( $background_image ) : '' ;
			$background_image 	 	= ( $background_image_url ) ? "background: url('{$background_image_url}') no-repeat center center; background-size: cover;" : '' ;
			$style .= $background 	= ( $background_image_url || $background_color ) ? ' .offer-toggle' . $uniqid . ' {' . $min_height . $background_color . $background_image . ' }'  : '' ;
			
			$plus_icon 				= ( $offers_content ) ? '<span class="toogle-plus"><i class="ti-'. $plus_minus .'"></i></span>' : '' ;
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				$offers_content 	= ( $offers_content ) ? wpb_js_remove_wpautop($offers_content, true) : '' ;
			} else {
				$offers_content 	= ( $offers_content ) ? $offers_content : '' ;
			}
			
			$offers_main_content	= ( $offers_content ) ? '<div class="extra-content">' . $offers_content . '</div>' : '';
			$out = '
			<div class="offer-toggle offer-toggle' . $uniqid . '">
				<figure>
					<div class="main-content">
						' . $icon . '
						' . $offers_subtitle . '
						' . $offers_title . '
						' . $plus_icon . '
						<div class="toggle-content  '. $hide_content . '">
							' . $offers_main_content . '
						</div>
					</div>
				</figure>
			</div>';

			deep_save_dyn_styles( $style );
			// live editor
			$live_page_builders_css .= $style;
			if ( ! in_array( 'admin-bar', get_body_class() ) ) {

				if ( ! empty( $live_page_builders_css ) ) {

					$out .= '<style>';
						$out .= $live_page_builders_css;
					$out .= '</style>';

				}

			}
			return $out;
		}

	}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'toggle_box' ) ) {
			wp_enqueue_style( 'wn-deep-toggle-box', DEEP_ASSETS_URL . 'css/frontend/toggle-box/toggle-box.css' );		
		}
	}

} DeepWPBakeryToggleBox::get_instance();
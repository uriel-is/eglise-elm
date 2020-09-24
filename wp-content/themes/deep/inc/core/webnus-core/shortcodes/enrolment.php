<?php
class DeepWPBakeryEnrolment extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryEnrolment
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
		add_shortcode( 'deep-enrolment', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {		
		extract( shortcode_atts( array(
			'enrolment_item' => '',
			'shortcodeclass' => '',
			'shortcodeid' 	 => '',
		), $attributes ) );
		
		static $uniqid = 0;
		$uniqid++;
		// enrolment_item loop
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$enrolment_item_data	= array();
		// Fetch Carousle Item Loop Variables
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			$enrolment_item		= (array) vc_param_group_parse_atts( $enrolment_item );
			foreach ( $enrolment_item as $data ) :
				$new_line 						= $data;
				$new_line['enrolment_title']	= isset( $data['enrolment_title'] ) ? $data['enrolment_title'] : '';
				$new_line['enrolment_content']	= isset( $data['enrolment_content'] ) ? $data['enrolment_content'] : '';
				$new_line['enrolment_num']		= isset( $data['enrolment_num'] ) ? $data['enrolment_num'] : '';
				$enrolment_item_data[]			= $new_line;
			endforeach;
		}
		
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		// render
		$out = '<div class="enrolment-wrap enrolment-wrap-' . $uniqid . ' ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
		
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			foreach ( $enrolment_item_data as $line ) {
				$out .= '
				<div class="enrolment-item">
					<h4>' . $line['enrolment_title'] . '</h4>
					<p>' . $line['enrolment_content']. '</p>
					<span>' . $line['enrolment_num'] . '</span>
				</div>';
			}
			$out .= '</div>';

			return $out;
		}
	}
	
	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'deep-enrolment' ) ) {
			wp_enqueue_style( 'deep-enrolment', DEEP_ASSETS_URL . 'css/frontend/enrolment/enrolment.css' );
		}
	}

} DeepWPBakeryEnrolment::get_instance();
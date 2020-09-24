<?php
class DeepWPBakeryIconDivider extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryIconDivider
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
		add_shortcode( 'icon-divider', array( $this, 'output' ) );
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
			'name'				=> '',
			'color'				=> '',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
		), $atts));		
		
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		static $uniqid = 0;
		$uniqid++;
		$color	= $color ? ' .cir-' . $uniqid . ':before { color:' . $color. ';}' : '';
		$name	= $name ? ' ' . $name : '';
		$out 	= '<div class="sec-divider ' . $shortcodeclass . '"  ' . $shortcodeid . ' ><div class="cir cir-' . $uniqid . ' '. $name .'"></div></div>';

		deep_save_dyn_styles( $color );
		return $out;
	}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'icon-divider' ) ) {
			wp_enqueue_style( 'wn-deep-icon-divider', DEEP_ASSETS_URL . 'css/frontend/icon-divider/icon-divider.css' );
		}
	}

} DeepWPBakeryIconDivider::get_instance();
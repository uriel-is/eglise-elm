<?php
class DeepWPBakeryQuote extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryQuote
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
		add_shortcode( 'quote', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {	
		extract(shortcode_atts(array(
			"text" 				=> '',
			"name" 				=> '',
			"name_sub" 			=> '',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
		), $attributes));		

		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		$out= '';
		$out .='<blockquote class="max-quote ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
		$out .='<h2>'. $text .'</h2>';
		$out .='<cite title="">'. $name .' <small>'. $name_sub .'</small></cite></blockquote>';
		return $out;
	}
	
	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'quote' ) ) {
			wp_enqueue_style( 'wn-deep-max-quote', DEEP_ASSETS_URL . 'css/frontend/max-quote/max-quote.css' );
		}
	}

} DeepWPBakeryQuote::get_instance();
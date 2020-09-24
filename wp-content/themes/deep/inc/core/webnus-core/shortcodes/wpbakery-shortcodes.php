<?php
class DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakery
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
	public function __construct() {}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public static function used_shortcode_in_page( $shortcode ) {
		global $post;
		if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, $shortcode) ) {
			return has_shortcode( $post->post_content, $shortcode );
		}
	}

} DeepWPBakery::get_instance();


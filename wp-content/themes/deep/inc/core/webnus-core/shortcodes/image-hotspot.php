<?php
class DeepWPBakeryImageHotspot extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryImageHotspot
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
		add_shortcode( 'image_hotspot', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
     */
    public function output( $atts, $content = null ) {	    
        extract( shortcode_atts( array(
            'hotspot_post'        => '',
        ), $atts ) );        

        if ( $post = get_page_by_path( $hotspot_post, OBJECT, 'points_image' ) ) {
            $id = $post->ID;
            return do_shortcode( '[devvn_ihotspot id="'.$id.'"]' );
        }   

    }
    
    /**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'image_hotspot' ) ) {
			wp_enqueue_style( 'wn-deep-image-hotspot', DEEP_ASSETS_URL . 'css/frontend/image-hotspot/image-hotspot.css' );
		}
	}

} DeepWPBakeryImageHotspot::get_instance();
<?php
class DeepWPBakeryGallery extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryGallery
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
		add_shortcode( 'deep_gallery', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $atts, $content = null ) {	
		extract(
			shortcode_atts(
				array(
					'images'  		 => '',
					'img_in_row'     => '',
					'imgh'           => '300',
					'imgw'           => '300',
					'shortcodeclass' => '',
					'shortcodeid'    => '',
				), 
			$atts ));

		include_once ABSPATH . 'wp-admin/includes/plugin.php';
		
		$images 	= explode ( ',', $images );	
		$img_in_row = $img_in_row ? $img_in_row : 'one';
		$out = '';

		$out .= '<div class="deep-gallery-wrap ' . esc_attr( $shortcodeclass ) . '" id="'. esc_attr( $shortcodeid ) .'">';
		$out .= '<div class="deep-gallery">';

		if ( $images ) {
			foreach ( $images as $image ) {
				$img_src = wp_get_attachment_url( $image );		
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				$rimage = new \Wn_Img_Maniuplate;
				$new_image  = $rimage->m_image( $image, $img_src , $imgw , $imgh );
								
				$out .= '<div class="deep-gallery-item deep-gallery-item-' . esc_attr( $img_in_row ) . '">
					<a class="gallery-item" href="'.$new_image.'" data-lcl-thumb="'.$new_image.'">
						<span style="background-image: url('.$new_image.')"></span>
						<i class="wn-icon ti-plus hover-icon"></i>
					</a>';							
				$out .= '</div>';																				
			}
			$out .= '</div>';
			$out .= '</div>';							
			}
		return $out;
	}	

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'deep_gallery' ) ) {
			wp_enqueue_style( 'wn-deep-gallery', DEEP_ASSETS_URL . 'css/frontend/deep-gallery/deep-gallery.css' );
			wp_enqueue_style( 'wn-deep-lc-lightbox', DEEP_ASSETS_URL . 'css/frontend/lc-lightbox/lc_lightbox.min.css' );	
			wp_enqueue_script('deep-gallery-js', DEEP_ASSETS_URL . 'js/libraries/lc.lightbox.min.js' ,array( 'jquery'),false,true);
			wp_enqueue_script('deep-gallery-vc', DEEP_ASSETS_URL . 'js/frontend/deep-gallery-vc.js' ,array( 'jquery'),false,true);
		}
	}

} DeepWPBakeryGallery::get_instance();

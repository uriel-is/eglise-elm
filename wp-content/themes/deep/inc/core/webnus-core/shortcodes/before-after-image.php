<?php
class DeepWPBakeryBeforeAfterImage extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryBeforeAfterImage
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
		add_shortcode( 'beforeafter', array( $this, 'output' ) );
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
			'img1'				=> '',
			'img1_alt'			=> '',
			'img2'				=> '',
			'img2_alt'			=> '',
			'arrow_type'		=> 'circle',
			'no_middle_line'	=> '',
			'visible_value'		=> '',
			'orientation_type'	=> '',
			'no_overlay'		=> '',
			'before_label'		=> '',
			'after_label'		=> '',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
		), $atts ));
	
		add_action( 'wp_enqueue_scripts', 'deep_before_after_image_style' );
		
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
		
		$img1_alt = $img1_alt ? $img1_alt : '';
		$img2_alt = $img2_alt ? $img2_alt : '';
		$out = '';
		if ( is_numeric( $img1 ) ) {
			$img1 = wp_get_attachment_url( $img1 );
		}
	
		if ( is_numeric( $img2 ) ) {
			$img2 = wp_get_attachment_url( $img2 );
		}
	
		if ( !empty( $visible_value ) ) {
			$visible_value = $visible_value;
		} else {
			$visible_value = '0.5';
		}
	
		if ( !empty( $orientation_type ) ) {
			$orientation_type = $orientation_type;
		} else {
			$orientation_type = 'horizontal';
		}
	
		if (  $no_overlay == 'yes'  ) {
			if ( !empty( $before_label ) || !empty( $after_label ) ) {
				$before_label 	= 'data-before-label = "'.$before_label.'"';
				$after_label 	= 'data-after-label = "'.$after_label.'"';
				$no_overlay 	= 'false';
			} else{
				$no_overlay = 'true';
				$before_label 	 = 'data-before-label = "none"';
				$after_label 	 = 'data-after-label = "none"';
			}
		} else{
			$no_overlay = 'true';
		}
	
		$arrow_type = ( $arrow_type == 'circle' ) ? 'arrow-circle' : 'arrow-square';
	
		$no_middle_line = ( $no_middle_line == 'yes' ) ? 'no-middle-line' : '' ;
	
	
		$out .= '
		<div class="wn-before-after ' . $arrow_type . ' ' . $no_middle_line . ' ' . $shortcodeclass . '"  ' . $shortcodeid . ' data-visible-value = "'.$visible_value.'" data-orientation = "'.$orientation_type.'" data-no-overlay = "'.$no_overlay.'" '.$before_label.' '.$after_label.' >
			<img src="'.$img1 .'" alt="' . $img1_alt . '"/>
				
			<img src="'.$img2 .'" alt="' . $img2_alt . '"/>
		</div>';
		return $out;
	}	

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'beforeafter' ) ) {
			wp_enqueue_script( 'jquery-twentytwenty', DEEP_ASSETS_URL . 'js/libraries/jquery.twentytwenty.js', array( 'jquery' ), false, true );
		}
	}

} DeepWPBakeryBeforeAfterImage::get_instance();

<?php
class DeepWPBakeryVideoPlayButton extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryVideoPlayButton
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
		add_shortcode( 'videoplay', array( $this, 'output' ) );
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
			'img'				=>	'',
			'img_alt'			=>	'',
			'bottom_text'		=>	'',
			'img_width'			=>	'',
			'img_height'		=>	'',
			'link'      		=>	'#',
			'img_align'			=>	'center',
			'link_class'    	=>	'',
			'size'				=>	'',
			'color'				=>	'',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
		), $atts));

		add_action( 'wp_enqueue_scripts', 'deep_video_play_button_style' );

		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		// if image is numeric, return image url
		if( is_numeric( $img ) ) {
			$image_id = $img;
			$img = wp_get_attachment_url( $img );
		}

		$style = $live_page_builders_css = '';
		static $uniqid = 0;
		$uniqid++;
		$fontsize	= $size ? ' font-size:' . $size. ';' : '';
		$color		= $color ? ' color:' . $color. ';' : '';
		
		$img_alt = $img_alt ? $img_alt : '';
		$bottom_text = $bottom_text ? $bottom_text : '';
		
		$style .= '.video-play-btn' . $uniqid . ' i { ' . $fontsize . $color . '}';

		$link_class 	= $link_class ? $link_class : '' ;
		$img_width		= $img_width ? $img_width : '' ;
		$img_height 	= $img_height ? $img_height : '' ;
		$bottom_text	= $bottom_text ? '<p class="bottom-btn-p">' . $img_alt . '</p>' : '' ;
		if ( strpos( $link, 'youtu.be' ) == true) {
			$link = 'https://www.youtube.com/watch?v=' . substr($link, 17 );
		}
		$link 	= $link ? '<a href="'. esc_url($link) .'" class="wn-popup-video video-play-btn video-play-btn' . $uniqid . ' '. $link_class .'"> <i class="sl-control-play"></i>' . $bottom_text . '</a>' : '' ;

		if( !empty( $img ) && !empty( $img_width ) && !empty( $img_height ) ) {
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$img = $image->m_image( $image_id, $img, $img_width, $img_height ); // set required and get result
		}
		$img = $img ? '<img src="' . esc_url( $img ) . '" alt="' . $img_alt . ' ">' : '' ;
		$out = '<div class="video-play-btn-wrap '. $img_align .' ' . $shortcodeclass . '"  ' . $shortcodeid . ' > ' . $img . $link . ' </div>';
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

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'videoplay' ) ) {
			wp_enqueue_style( 'wn-deep-video-play-button', DEEP_ASSETS_URL . 'css/frontend/video-play-button/video-play-button.css' );
		}
	}

} DeepWPBakeryVideoPlayButton::get_instance();


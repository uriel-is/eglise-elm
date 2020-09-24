<?php
class DeepWPBakeryvcw extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryvcw
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
		add_shortcode( 'vcw', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $atts, $content = null ) {	
		extract(shortcode_atts( array(
			'type'				=> '1',
			'symbol_1'			=> 'BTC',
			'symbol_2'			=> 'USD',
			'columns'			=> '1',
			'img_f1'			=> '',
			'symbol_f1'			=> 'BTC',
			'currency_f1'		=> 'USD',
			'img_f2'			=> '',
			'symbol_f2'			=> 'BTC',
			'currency_f2'		=> 'USD',
			'img_f3'			=> '',
			'symbol_f3'			=> 'BTC',
			'currency_f3'		=> 'USD',
			'img_f4'			=> '',
			'symbol_f4'			=> 'BTC',
			'currency_f4'		=> 'USD',
			'img_f5'			=> '',
			'symbol_f5'			=> 'BTC',
			'currency_f5'		=> 'USD',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
			), $atts));			
			
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		// Class & ID 
		$shortcodeclass		= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		// if image is numeric, return image url
		if( is_numeric( $img_f1 ) ) {
			$img_f1 = wp_get_attachment_url( $img_f1 );
		}
		if( is_numeric( $img_f2 ) ) {
			$img_f2 = wp_get_attachment_url( $img_f2 );
		}
		if( is_numeric( $img_f3 ) ) {
			$img_f3 = wp_get_attachment_url( $img_f3 );
		}
		if( is_numeric( $img_f4 ) ) {
			$img_f4 = wp_get_attachment_url( $img_f4 );
		}
		if( is_numeric( $img_f5 ) ) {
			$img_f5 = wp_get_attachment_url( $img_f5 );
		}

		if ($type == '1') {
			$out = do_shortcode( '[vcw-converter symbol1="' . $symbol_1 . '" symbol2="' . $symbol_2 . '" show_logo="no"]' );
		} elseif ($type == '2') {
			$out = '<div class="row vcw-wrapper ' . $shortcodeclass . '"  ' . $shortcodeid . '>' ;
			$image_f1 = '<figure class="symbol-icon"><img src="' . esc_url( $img_f1 ) . '" alt="' . $symbol_f1 . '"></figure>';
			$image_f2 = '<figure class="symbol-icon"><img src="' . esc_url( $img_f2 ) . '" alt="' . $symbol_f2 . '"></figure>';
			$image_f3 = '<figure class="symbol-icon"><img src="' . esc_url( $img_f3 ) . '" alt="' . $symbol_f3 . '"></figure>';
			$image_f4 = '<figure class="symbol-icon"><img src="' . esc_url( $img_f4 ) . '" alt="' . $symbol_f4 . '"></figure>';
			$image_f5 = '<figure class="symbol-icon"><img src="' . esc_url( $img_f5 ) . '" alt="' . $symbol_f5 . '"></figure>';

			switch ($columns) {
				case '1':
					$out .= '<div class="col-md-12 last-column">' . $image_f1;
					$out .= do_shortcode( '[vcw-full-card symbol="' . $symbol_f1 . '" currency1="' . $currency_f1 . '" show_logo="no"]' );
					$out .= '</div>';
					break;
				case '2':
					$out .= '<div class="col-md-6">' . $image_f1 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f1 . '" currency1="' . $currency_f1 . '" show_logo="no"]' ) . '</div>';
					$out .= '<div class="col-md-6 last-column ">' . $image_f2 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f2 . '" currency1="' . $currency_f2 . '" show_logo="no"]' ) . '</div>';
					break;
				case '3':
					$out .= '<div class="col-md-4">' . $image_f1 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f1 . '" currency1="' . $currency_f1 . '" show_logo="no"]' ) . '</div>';
					$out .= '<div class="col-md-4">' . $image_f2 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f2 . '" currency1="' . $currency_f2 . '" show_logo="no"]' ) . '</div>';
					$out .= '<div class="col-md-4 last-column">' . $image_f3 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f3 . '" currency1="' . $currency_f3 . '" show_logo="no"]' ) . '</div>';			
					break;
				case '4':
					$out .= '<div class="col-md-3">' . $image_f1 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f1 . '" currency1="' . $currency_f1 . '" show_logo="no"]' ) . '</div>';
					$out .= '<div class="col-md-3">' . $image_f2 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f2 . '" currency1="' . $currency_f2 . '" show_logo="no"]' ) . '</div>';
					$out .= '<div class="col-md-3">' . $image_f3 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f3 . '" currency1="' . $currency_f3 . '" show_logo="no"]' ) . '</div>';	
					$out .= '<div class="col-md-3 last-column">' . $image_f4 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f4 . '" currency1="' . $currency_f4 . '" show_logo="no"]' ) . '</div>';	
					break;
				case '5':
					$out .= '<div class="col-md-5th">' . $image_f1 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f1 . '" currency1="' . $currency_f1 . '" show_logo="no"]' ) . '</div>';
					$out .= '<div class="col-md-5th">' . $image_f2 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f2 . '" currency1="' . $currency_f2 . '" show_logo="no"]' ) . '</div>';
					$out .= '<div class="col-md-5th">' . $image_f3 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f3 . '" currency1="' . $currency_f3 . '" show_logo="no"]' ) . '</div>';	
					$out .= '<div class="col-md-5th">' . $image_f4 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f4 . '" currency1="' . $currency_f4 . '" show_logo="no"]' ) . '</div>';
					$out .= '<div class="col-md-5th last-column">' . $image_f5 . do_shortcode( '[vcw-full-card symbol="' . $symbol_f5 . '" currency1="' . $currency_f5 . '" show_logo="no"]' ) . '</div>';				
					break;
			}
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
		if ( self::used_shortcode_in_page( 'vcw' ) ) {
			wp_enqueue_style( 'wn-deep-full-card', DEEP_ASSETS_URL . 'css/frontend/full-card/full-card.css' );	
		}
	}

} DeepWPBakeryvcw::get_instance();

<?php
class DeepWPBakeryDeepLogin extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryDeepLogin
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
		add_shortcode( 'deep-login', array( $this, 'output' ) );
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
			'img'						=> '', 
			'title'						=> '', 
			'subtitle'					=> '', 
			'bpcontent'					=> '', 
			'bottom_text'				=> '', 
			'shortcodeclass' 			=> '',
			'shortcodeid' 	 			=> '',
		), $atts ) );		
		
		ob_start();

		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		if ( is_numeric( $img ) ) {
			$image_id = $img;
			$img = wp_get_attachment_url( $img );
		}
		
		if ($bottom_text == 'yes') {
			$disform = 'dis-social-login';
		} else {
			$disform = 'fix-form';
		}
		
		?>

			<div class="wp-sh-login <?php echo esc_attr($disform); ?> <?php echo '' . $shortcodeclass; ?>" <?php echo $shortcodeid; ?> >
				<?php
					echo !empty( $img ) ? '<div class="wp-login-logo">': '';
						echo !empty( $img ) ? '<img src="' . $img . '" class="img-responsive">': '';
					echo !empty( $img ) ? '</div>': '';

					echo !empty( $title ) || !empty( $subtitle )  ? '<div class="wp-login-title">': '';
						echo !empty( $title ) || !empty( $subtitle ) ? '<h2 class="login-title"> ' . $title . ' <span class="colorf"> '. $subtitle .' </span></h2>': '';
					echo !empty( $title ) || !empty( $subtitle ) ? '</div>': '';

					echo !empty( $bpcontent ) ? '<div class="wp-login-content">': '';
						echo !empty( $bpcontent ) ? '<p class="login-content"> ' . $bpcontent . ' </p>': '';
					echo !empty( $bpcontent ) ? '</div>': '';

					echo '<div class="wp-inner-login">';
						if ( function_exists('deep_login') ) {
							deep_login();
						}
					echo '</div>';			
				?>	

			</div>

		<?php
		$out = ob_get_contents();
		ob_end_clean();

		return $out;
	}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'deep-login' ) ) {
			wp_enqueue_style( 'wn-deep-login-box', DEEP_ASSETS_URL . 'css/frontend/login-box/login-box.css' );
		}
	}

} DeepWPBakeryDeepLogin::get_instance();
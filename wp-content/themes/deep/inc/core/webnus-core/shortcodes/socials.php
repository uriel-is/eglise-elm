<?php
class DeepWPBakeryWebnusSocials extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryWebnusSocials
	 */
	public static $instance;

	private $type;

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
		add_shortcode( 'webnus-socials', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );			
		add_action( 'wp_head', function() {
			echo '<script>var deep_webnus_socials_styles = {}; </script>';
		});
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'				=> '1',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
	), $atts ));
		
	wp_enqueue_style( 'wn-deep-social-network' . $type, DEEP_ASSETS_URL . 'css/frontend/social-network/social-network' . $type . '.css' );

	$this->type  = $type;

	add_action( 'wp_footer', function() use($type) {
		echo '<script>
		var element = document.getElementById("wn-deep-social-network'.$type.'-css");
		if(element && !deep_webnus_socials_styles["wn-deep-social-network'.$type.'-css"]) {
			deep_webnus_socials_styles["wn-deep-social-network'.$type.'-css"] = true;
			var wrap = document.createElement("div");
			wrap.appendChild(element.cloneNode(true));
			document.getElementsByTagName("head")[0].innerHTML = document.getElementsByTagName("head")[0].innerHTML + wrap.innerHTML;
			if(element.parentNode) {
				element.parentNode.removeChild(element);
			} else {
				element.remove(element);
			}
		}
		</script>';	
	}, 100);

	ob_start();
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	if ( $type == '1' ){
		echo '
		<div class="socialfollow wn-social-network ' . $shortcodeclass . '"  ' . $shortcodeid . '>
			<div class="social-main-content">';
			get_template_part( 'inc/templates/social' );
		echo '
			</div>
		</div>';
	}
	if ( $type == '2' ){
		echo '
		<div class="wn-social-network-type2 ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
			get_template_part( 'inc/templates/social' );
		echo '
		</div>';
	}
	if ( $type == '3' ){
		echo '
		<div class="wn-social-network-type3 ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
			get_template_part( 'inc/templates/social' );
			echo '
		</div>';
	}
	if ( $type == '4' ){
		echo '
		<div class="wn-social-network-type4 ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
			get_template_part( 'inc/templates/social' );
			echo '
		</div>';
	}
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
	if ( self::used_shortcode_in_page( 'webnus-socials' ) ) {			
		wp_enqueue_style( 'wn-deep-social-network0', DEEP_ASSETS_URL . 'css/frontend/social-network/social-network0.css' );
	}
}
} DeepWPBakeryWebnusSocials::get_instance();

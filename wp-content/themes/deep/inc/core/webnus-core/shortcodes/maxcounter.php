<?php
class DeepWPBakeryMaxCounter extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryMaxCounter
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
		add_shortcode( 'maxcounter', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );			
		add_action( 'wp_head', function() {
			echo '<script>var deep_maxcounter_styles = {}; </script>';
		});
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {
	extract(shortcode_atts(array(
		"type"				=> '1',
		"count"				=> '',
		"title"				=> '',
		"prefix"			=> '',
		"suffix"			=> '',
		"color"				=> '',
		"icon"				=> '',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
	), $attributes));

	
	wp_enqueue_style( 'wn-deep-max-counter' . $type, DEEP_ASSETS_URL . 'css/frontend/max-counter/max-counter' . $type . '.css' );

	
	$this->type  = $type;

	add_action( 'wp_footer', function() use($type) {
		echo '<script>
		var element = document.getElementById("wn-deep-max-counter'.$type.'-css");
		if(element && !deep_maxcounter_styles["wn-deep-max-counter'.$type.'-css"]) {
			deep_maxcounter_styles["wn-deep-max-counter'.$type.'-css"] = true;
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

	// Class & ID 
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	static $uniqid = 0;
	$uniqid++;
	$color	= $color ? '#wrap .max-counter-'. $uniqid . ' i { color: ' . $color . ' !important;}' : '';

	$out = '<div class="';

	switch( $type ) {
		case 1:
		 	$out .= 'm-counter';
		break;
		case 2:
			$out .= 's-counter';			
		break;
		case 3:
		 	$out .= 't-counter';
		break;
		case 4:
		 	$out .= 'f-counter';
		break;	
		case 5:
		 	$out .= 'd-counter';
		break;	
		case 6:
		 	$out .= 'e-counter';
		break;			
	}

	// Fix King Composer
	if ( empty( $type ) ) $out .= 'm-counter' ;

	$out  .= ' max-counter max-counter-' . $uniqid . ' ' . $shortcodeclass . '"  ' . $shortcodeid . '  data-effecttype="counter" data-counter="' . $count . '">';
	if ( $icon ) {
		$out  .= '<i class="colorf icon-counter '. $icon .'"></i>';
	}
	if( !empty( $prefix ) )
		$out  .= '<span class="pre-counter">'. $prefix .'</span>';
	if( !empty( $count ) )
		$out .= '<span class="max-count">'. $count .'</span>';
	if( !empty( $suffix ) )
		$out .= '<span class="suf-counter">'. $suffix .'</span>';
	if( $type == 5 )
		$out .= '<span class="after colorb"></span>';
	if( !empty( $title ) )
		$out .= '<h5>'. $title .'</h5>';
	
	$out .= '</div>';

	deep_save_dyn_styles( $color );
	
	// live editor
	if ( ! in_array( 'admin-bar', get_body_class() ) ) {

		if ( ! empty( $color ) ) {

			echo '<style>';
				echo $color;
			echo '</style>';

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
		if ( self::used_shortcode_in_page( 'maxcounter' ) ) {			
			wp_enqueue_style( 'wn-deep-max-counter0', DEEP_ASSETS_URL . 'css/frontend/max-counter/max-counter0.css' );
		}
	}
} DeepWPBakeryMaxCounter::get_instance(); ?>

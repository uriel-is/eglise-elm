<?php
class DeepWPBakeryProcessCarousel extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryProcessCarousel
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
		add_shortcode( 'process_carousel', array( $this, 'output' ) );
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
			'process_item'		=> '',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
		), $atts));		

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		// Class & ID 
		$shortcodeclass		= $shortcodeclass ? ' class="' . $shortcodeclass . '"' : '';
		$shortcodeid		= $shortcodeid ? $shortcodeid : '';

		$process_item_data	= array();

		// Fetch Carousle Item Loop Variables
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			$process_item		= (array) vc_param_group_parse_atts( $process_item );
			foreach ( $process_item as $data ) :
				$new_line 				= $data;
				$new_line['pc_title']	= isset( $data['pc_title'] ) 	? $data['pc_title'] 	:  '';
				$new_line['pc_content']	= isset( $data['pc_content'] )	? $data['pc_content'] 	:  '';
				$process_item_data[]= $new_line;
			endforeach;
		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' )  && (is_array($process_item) || is_object($process_item)) ) {
			foreach ( $atts['process_item'] as $key => $item ) :
				$new_line 				= $item;
				$new_line->pc_title		= isset( $item->pc_title ) 	? $item->pc_title 	:  '';
				$new_line->pc_content	= isset( $item->pc_content )	? $item->pc_content 	:  '';
				$process_item_data[]	= $new_line;
			endforeach;
		}

		$out ='
		<div id="process-carousel-wrap ' . $shortcodeid . '" ' . $shortcodeclass . ' >
			<div id="process-carousel" class="process-carousel owl-carousel owl-theme colorb">';	
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				foreach ( $process_item_data as $line ) :
				$out .= '
					<div class="process-item">
						<div class="process-title">
							<span>' . $line['pc_title'] . '</span>
						</div>
						<div class="process-content"> 
							<p>' . $line['pc_content']. '</p>
						</div>
					</div>';
				endforeach;
			} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
				foreach ( $process_item_data as $line ) :
				$out .= '
					<div class="process-item">
						<div class="process-title">
							<span>' . $line->pc_title . '</span>
						</div>
						<div class="process-content"> 
							<p>' . $line->pc_content. '</p>
						</div>
					</div>';
				endforeach;
			}
				$out .= '	
			</div>
			<div class="process-carousel-num"></div>
		</div>';
		return $out;
	}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'process_carousel' ) ) {
			wp_enqueue_style( 'wn-deep-process-carousel', DEEP_ASSETS_URL . 'css/frontend/process-carousel/process-carousel.css' );
		}
	}

} DeepWPBakeryProcessCarousel::get_instance();


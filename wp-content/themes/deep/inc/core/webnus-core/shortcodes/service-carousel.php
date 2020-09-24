<?php
class DeepWPBakeryServiceCarousel extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryServiceCarousel
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
		add_shortcode( 'service_carousel', array( $this, 'output' ) );
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
			'carousel_item'				=> '',
			'item_carousle'				=> '3',
			'shortcodeclass' 			=> '',
			'shortcodeid' 	 			=> '',
		), $atts ));		

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		// Class & ID 
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

			$carousel_item_data = array();

			// Fetch Carousle Item Loop Variables
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				$carousel_item = (array) vc_param_group_parse_atts( $carousel_item );
				foreach ( $carousel_item as $data ) {
					$new_line 						= $data;
					$new_line['service_icon'] 		= isset( $new_line['service_icon'] )	? $new_line['service_icon']: '';
					$new_line['service_title'] 		= isset( $new_line['service_title'] )	? $new_line['service_title']: '';
					$new_line['service_content'] 	= isset( $new_line['service_content'] )	? $new_line['service_content']: '';
					$carousel_item_data[]			= $new_line;
				}
			} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' )  && (is_array($carousel_item) || is_object($carousel_item)) ) {
				foreach( $atts['carousel_item'] as $key => $item ){
					$new_line 						= $item;
					$new_line->service_icon 		= isset( $new_line->service_icon )	? $new_line->service_icon: '';
					$new_line->service_title 		= isset( $new_line->service_title )	? $new_line->service_title: '';
					$new_line->service_content 		= isset( $new_line->service_content ) ? $new_line->service_content: '';
					$carousel_item_data[]			= $new_line;
				}
			}
			// Render
			$out = '
				<div class="clearfix ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
					<div class="container">
						<div class="our-service-carousel-wrap owl-carousel owl-theme" data-items="' . $item_carousle . '" >';
							if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
								foreach ( $carousel_item_data as $line ) :
								$line['service_icon'] 			= $line['service_icon'] 	? '<i class="colorf ' . $line['service_icon'] . '"></i>' : '' ;
								$line['service_title'] 			= $line['service_title'] 	? '<h2>' . $line['service_title'] . '</h2>' : '' ;
								$line['service_content'] 		= $line['service_content'] 	? '<p>' . $line['service_content'] . '</p>' : '' ;
								$out .='
								<div class="services-carousel">
									<div class="tdetail">
										' . $line['service_icon'] . $line['service_title'] . $line['service_content'] . '
									</div>
								</div>';
								endforeach;
							} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
								foreach ( $carousel_item_data as $line ) :
								$line->service_icon 	= $line->service_icon 	? '<i class="colorf ' . $line->service_icon . '"></i>' : '' ;
								$line->service_title 	= $line->service_title 	? '<h2>' . $line->service_title . '</h2>' : '' ;
								$line->service_content  = $line->service_content 	? '<p>' . $line->service_content . '</p>' : '' ;
								$out .='
								<div class="services-carousel">
									<div class="tdetail">
										' . $line->service_icon . $line->service_title . $line->service_content . '
									</div>
								</div>';
								endforeach;
							}
			$out .='
						</div>
					</div>
				</div>';
		return $out;
	}
	

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'service_carousel' ) ) {
			wp_enqueue_style( 'wn-deep-our-services-carousel', DEEP_ASSETS_URL . 'css/frontend/our-services-carousel/our-services-carousel.css' );
		}
	}

} DeepWPBakeryServiceCarousel::get_instance();
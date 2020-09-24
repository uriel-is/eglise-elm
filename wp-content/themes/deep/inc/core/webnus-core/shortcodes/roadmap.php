<?php
class DeepWPBakeryRoadmap extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryRoadmap
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
		add_shortcode( 'roadmap', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {	
		extract( shortcode_atts( array(
			'roadmap_item'	 => '',
			'shortcodeclass' => '',
			'shortcodeid' 	 => '',
		), $attributes ) );		

		// Class & ID 
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		static $uniqid = 0;
		$uniqid++;
		// roadmap_item loop
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$roadmap_item_data	= array();
		// Fetch  Item Loop Variables
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			$roadmap_item		= (array) vc_param_group_parse_atts( $roadmap_item );
			foreach ( $roadmap_item as $data ) :
				$new_line 					= $data;
				$new_line['item_title']		= isset( $data['item_title'] ) ? $data['item_title'] : '';
				$new_line['item_desc']		= isset( $data['item_desc'] ) ? $data['item_desc'] : '';
				$new_line['item_past']		= isset( $data['item_past'] ) ? $data['item_past'] : '';
				$new_line['item_select']	= isset( $data['item_select'] ) ? $data['item_select'] : '';
				$roadmap_item_data[]		= $new_line;
			endforeach;
		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && (is_array($roadmap_item) || is_object($roadmap_item)) ) {
			foreach( $attributes['roadmap_item'] as $key => $data ){
				$new_line 						= $data;
				$new_line->item_title			= isset( $data->item_title ) ? $data->item_title : '';
				$new_line->item_desc			= isset( $data->item_desc ) ? $data->item_desc : '';
				$new_line->item_past			= isset( $data->item_past ) ? $data->item_past : '';
				$new_line->item_select			= isset( $data->item_select ) ? $data->item_select : '';
				$roadmap_item_data[]			= $new_line;
			}
		}
		
		// render
		$out  = '
		<div class="roadmap-wrap roadmap-wrap-' . $uniqid . ' ' . $shortcodeclass . '"  ' . $shortcodeid . '>
			<div class="roadmap-items">';
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				foreach ( $roadmap_item_data as $line ) :
					$item_past_class = '';
					$item_select_class = '';
					if ($line['item_past']) {
						$item_past_class = ' roadmap-past';
					}
					if ($line['item_select']) {
						$item_select_class = ' roadmap-select';
					}
					$out .= '
					<div class="roadmap-item' . $item_past_class . $item_select_class . '">
						<div class="roadmap-line">
							<div class="text-wrap">
								<h4>' . $line['item_title'] . '</h4>
								<p>' . $line['item_desc'] . '</p>
							</div>
						</div>
					</div>';
				endforeach;
			} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
				foreach ( $roadmap_item_data as $line ) :
					$item_past_class = '';
					$item_select_class = '';
					if ($line->item_past) {
						$item_past_class = ' roadmap-past';
					}
					if ($line->item_select) {
						$item_select_class = ' roadmap-select';
					}				
					$out .= '
					<div class="roadmap-item' . $item_past_class . $item_select_class . '">
						<div class="roadmap-line">
							<div class="text-wrap">
								<h4>' . $line->item_title . '</h4>
								<p>' . $line->item_desc . '</p>
							</div>
						</div>
					</div>';
				endforeach;
			}
				
		$out .= '
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
		if ( self::used_shortcode_in_page( 'roadmap' ) ) {
			wp_enqueue_style( 'wn-deep-road-map', DEEP_ASSETS_URL . 'css/frontend/road-map/road-map.css' );	
		}
	}

} DeepWPBakeryRoadmap::get_instance();
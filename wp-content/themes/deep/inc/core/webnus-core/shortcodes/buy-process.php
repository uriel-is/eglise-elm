<?php
class DeepWPBakeryBuyProcess extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryBuyProcess
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
		add_shortcode( 'buy_process', array( $this, 'output' ) );
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
			'process_item'	 => '',
			'bg_color'		 => '',
			'shortcodeclass' => '',
			'shortcodeid' 	 => '',
		), $attributes ) );

		add_action( 'wp_enqueue_scripts', 'deep-buy-process' );
		
		static $uniqid = 0;
		$uniqid++;
		// process_item loop
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$process_item_data	= array();
		// Fetch Carousle Item Loop Variables
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			$process_item		= (array) vc_param_group_parse_atts( $process_item );
			foreach ( $process_item as $data ) :
				$new_line 						= $data;
				$new_line['process_title']		= isset( $data['process_title'] ) ? $data['process_title'] : '';
				$new_line['process_content']	= isset( $data['process_content'] ) ? $data['process_content'] : '';
				$new_line['icon_fontawesome']	= isset( $data['icon_fontawesome'] ) ? $data['icon_fontawesome'] : 'wn-fa wn-fa-adjust';
				$new_line['line_flag']			= isset( $data['line_flag'] ) ? $data['line_flag'] : '';
				$new_line['process_style']		= isset( $data['process_style'] ) && $data['process_style'] == 'featured' ? ' ' . $data['process_style'] : '';
				$process_item_data[]			= $new_line;
			endforeach;
		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && (is_array($process_item) || is_object($process_item)) ) {
			foreach( $attributes['process_item'] as $key => $data ){
				$new_line 						= $data;
				$new_line->process_title		= isset( $data->process_title ) ? $data->process_title : '';
				$new_line->process_content		= isset( $data->process_content ) ? $data->process_content : '';
				$new_line->icon_fontawesome		= isset( $data->icon_fontawesome ) ? $data->icon_fontawesome : 'wn-fa wn-fa-adjust';
				$new_line->line_flag			= isset( $data->line_flag ) ? $data->line_flag : '';
				$new_line->process_style		= isset( $data->process_style ) && $data->process_style == 'featured' ? ' ' . $data->process_style : '';
				$process_item_data[]			= $new_line;
			}
		}
		
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		// render
		$out  = '
		<div class="buy-process-wrap buy-process-wrap-' . $uniqid . ' ' . $shortcodeclass . '"  ' . $shortcodeid . '>
			<div class="buy-process-items">';
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				foreach ( $process_item_data as $line ) :
					$out .= '
					<div class="buy-process-item' . $line['process_style'] . '">
						<div class="text-wrap">
							<h4>' . $line['process_title'] . '</h4>
							<p>' . $line['process_content'] . '</p>
						</div>
						<span>' . $line['line_flag'] . '</span>
						<div class="icon-wrapper">
							<i class="' . esc_attr( $line['icon_fontawesome'] ) . '"></i>
						</div>
					</div>';
				endforeach;
			} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
				foreach ( $process_item_data as $line ) :
					$out .= '
					<div class="buy-process-item' . $line->process_style . '">
						<div class="text-wrap">
							<h4>' . $line->process_title . '</h4>
							<p>' . $line->process_content . '</p>
						</div>
						<span>' . $line->line_flag . '</span>
						<div class="icon-wrapper">
							<i class="' . esc_attr( $line->icon_fontawesome ) . '"></i>
						</div>
					</div>';
				endforeach;
			}				
		$out .= '</div></div>';
		
		// bg color
		$bg_color = $bg_color ? ' .buy-process-wrap-' . $uniqid . ' { background-color: ' . $bg_color . ';} ' : '';
		
		deep_save_dyn_styles( $bg_color );

		// live editor
		$live_page_builders_css = $bg_color;
		
		// live editor
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
		if ( self::used_shortcode_in_page( 'buy_process' ) ) {
			wp_enqueue_style( 'wn-deep-buy-process', DEEP_ASSETS_URL . 'css/frontend/buy-process/buy-process.css' );
		}
	}

} DeepWPBakeryBuyProcess::get_instance();
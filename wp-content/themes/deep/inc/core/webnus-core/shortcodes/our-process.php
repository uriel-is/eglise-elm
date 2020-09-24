<?php
class DeepWPBakeryOurProcess extends DeepWPBakery {
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryOurProcess
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
		add_shortcode( 'our_process', array( $this, 'output' ) );			
		add_action( 'wp_head', function() {
			echo '<script>var deep_our_process_styles = {}; </script>';
		});
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content ) {
	extract( shortcode_atts( array(
		'type'							=> '1',
		'process_item'					=> '',
		'process_item_t2'				=> '',
		'process_item_t3'				=> '',
		'shortcodeclass' 				=> '',
		'shortcodeid' 	 				=> '',
	), $attributes ) );

	wp_enqueue_style( 'wn-deep-our-process' . $type, DEEP_ASSETS_URL . 'css/frontend/our-process/our-process' . $type . '.css' );

	$this->type  = $type;

	add_action( 'wp_footer', function() use($type) {
		echo '<script>
		var element = document.getElementById("wn-deep-our-process'.$type.'-css");
		if(element && !deep_our_process_styles["wn-deep-our-process'.$type.'-css"]) {
			deep_our_process_styles["wn-deep-our-process'.$type.'-css"] = true;
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

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$process_item_data	= array();
	$process_item_data_t2	= array();
	$process_item_data_t3	= array();
	$style								= '';
	// Fetch Carousle Item Loop Variables
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		$process_item		= (array) vc_param_group_parse_atts( $process_item );
		foreach ( $process_item as $data ) :
			$new_line 						= $data;
			$new_line['line_flag']			= isset( $data['line_flag'] ) ? $data['line_flag'] : '';
			$new_line['process_title']		= isset( $data['process_title'] ) ? $data['process_title'] : '';
			$new_line['process_content']	= isset( $data['process_content'] ) ? $data['process_content'] : '';
			$new_line['icon_fontawesome']	= isset( $data['icon_fontawesome'] ) ? $data['icon_fontawesome'] : 'wn-fa wn-fa-adjust';
			$process_item_data[]			= $new_line;
		endforeach;
		// process_item loop type2
		$process_item_t2	= (array) vc_param_group_parse_atts( $process_item_t2 );
		foreach ( $process_item_t2 as $data ) :
			$new_line 						= $data;
			$new_line['line_flag_t2']			= isset( $data['line_flag_t2'] ) ? $data['line_flag_t2'] : '';
			$new_line['process_title_t2']		= isset( $data['process_title_t2'] ) ? $data['process_title_t2'] : '';
			$new_line['process_content_t2']	= isset( $data['process_content_t2'] ) ? $data['process_content_t2'] : '';
			$process_item_data_t2[]			= $new_line;
		endforeach;
		// process_item loop type3
		$process_item_t3		= (array) vc_param_group_parse_atts( $process_item_t3 );
		foreach ( $process_item_t3 as $data ) :
			$new_line 						= $data;
			$new_line['process_title_t3']		= isset( $data['process_title_t3'] ) ? $data['process_title_t3'] : '';
			$new_line['process_content_t3']	= isset( $data['process_content_t3'] ) ? $data['process_content_t3'] : '';
			$new_line['process_title_top_t3']	= isset( $data['process_title_top_t3'] ) ? $data['process_title_top_t3'] : '';
			$new_line['teaser_btn']	= isset( $data['teaser_btn'] ) ? $data['teaser_btn'] : '';
			$new_line['link_url']	= isset( $data['link_url'] ) ? $data['link_url'] : '';
			$new_line['title_color']	= isset( $data['title_color'] ) ? $data['title_color'] : '';
			$new_line['content_color']	= isset( $data['content_color'] ) ? $data['content_color'] : '';
			$process_item_data_t3[]			= $new_line;
		endforeach;
	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' )  ) {
		if ( is_array($process_item) || is_object($process_item) ){
			foreach( $attributes['process_item'] as $key => $data ){
				$new_line 						= $data;
				$new_line->line_flag			= isset( $data->line_flag ) ? $data->line_flag : '';
				$new_line->process_title		= isset( $data->process_title ) ? $data->process_title : '';
				$new_line->process_content		= isset( $data->process_content ) ? $data->process_content : '';
				$new_line->icon_fontawesome		= isset( $data->icon_fontawesome ) ? $data->icon_fontawesome : 'wn-fa wn-fa-adjust';
				$process_item_data[]			= $new_line;
			}
		}
		if ( is_array($process_item_t2) || is_object($process_item_t2) ){
			foreach ( $attributes['process_item_t2'] as $key => $data ) :
				$new_line 						= $data;
				$new_line->line_flag_t2			= isset( $data->line_flag_t2 ) ? $data->line_flag_t2 : '';
				$new_line->process_title_t2		= isset( $data->process_title_t2 ) ? $data->process_title_t2 : '';
				$new_line->process_content_t2	= isset( $data->process_content_t2 ) ? $data->process_content_t2 : '';
				$process_item_data_t2[]			= $new_line;
			endforeach;
		}
		if ( is_array($process_item_t3) || is_object($process_item_t3) ){
			foreach ( $attributes['process_item_t3'] as $key => $data ) :
				$new_line 						= $data;
				$new_line->process_title_t3			= isset( $data->process_title_t3 ) ? $data->process_title_t3 : '';
				$new_line->process_title_top_t3		= isset( $data->process_title_top_t3 ) ? $data->process_title_top_t3 : '';
				$new_line->process_content_t3	= isset( $data->process_content_t3 ) ? $data->process_content_t3 : '';
				$new_line->link_url	= isset( $data->link_url ) ? $data->link_url : '';
				$new_line->teaser_btn	= isset( $data->teaser_btn ) ? $data->teaser_btn : '';
				$process_item_data_t3[]			= $new_line;
			endforeach;
		}

	}

	// render
	if( $type == '1' ){
		$out  = '<div class="our-process-wrap ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			foreach ( $process_item_data as $line ) :
				// Enqueue needed icon font
				vc_icon_element_fonts_enqueue( 'fontawesome' );
				$out .= '
					<div class="our-process-item ">
						<i class="' . esc_attr( $line['icon_fontawesome'] ) . '"></i>
						<h4>' . $line['process_title'] . '</h4>
						<p>' . $line['process_content'] . '</p>
					</div>';
			endforeach;
		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
			foreach ( $process_item_data as $line ) :
				// Enqueue needed icon font
				$out .= '
					<div class="our-process-item ">
						<i class="' . esc_attr( $line->icon_fontawesome ) . '"></i>
						<h4>' . $line->process_title . '</h4>
						<p>' . $line->process_content . '</p>
					</div>';
			endforeach;
		}

		$out .= '</div>';
	} elseif( $type == '2' ){
		$out = '<div class= "our-process-wrap-type2 ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			foreach ( $process_item_data_t2 as $line) :
				$out .= '
					<div class="our-process-item-type2">
						<span>' . $line['line_flag_t2'] . '</span>
						<h4>' . $line['process_title_t2'] . '</h4>
						<p>' . $line['process_content_t2'] . '</p>
					</div>';
			endforeach;
		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
			foreach ( $process_item_data_t2 as $line) :
				$out .= '
					<div class="our-process-item-type2">
						<span>' . $line->line_flag_t2 . '</span>
						<h4>' . $line->process_title_t2 . '</h4>
						<p>' . $line->process_content_t2 . '</p>
					</div>';
			endforeach;
		}
		$out .= '</div>';
	} elseif( $type == '3' ){
		$out = '<div class= "our-process-wrap-type3 ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			static $uniqid = 0;
			foreach ( $process_item_data_t3 as $line) :

				$uniqid++;

				$out .= '
					<div class="our-process-item-type3 our-prc-typ3-'. $uniqid .'">
						<span>' . $line['process_title_t3'] . '</span>
						<h4>' . $line['process_title_top_t3'] . '</h4>
						<p>' . $line['process_content_t3'] . '</p>
						<a href="' . esc_url( $line['link_url'] ) . '">' . $line['teaser_btn'] . '</a>
					</div>';

					$style .= ! empty ( $line['title_color'] ) ? '.our-process-wrap-type3 .our-prc-typ3-'. $uniqid .' h4 { color: '. $line['title_color'] .';}' : '';
					$style .= ! empty ( $line['content_color'] ) ? '.our-process-wrap-type3 .our-prc-typ3-'. $uniqid .' p { color: '. $line['content_color'] .';}' : '';

			endforeach;
		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
			static $uniqid = 0;
			foreach ( $process_item_data_t3 as $line) :
				$uniqid++;
				$out .= '
				<div class= "our-process-item-type3 our-prc-typ3-'. $uniqid .'">
					<span>' . $line->process_title_t3 . '</span>
					<h4>' . $line->process_title_top_t3 . '</h4>
					<p>' . $line->process_content_t3 . '</p>
					<a href="' . esc_url( $line->link_url ) . '">' . $line->teaser_btn . '</a>
				</div>';
			endforeach;
		}
		$out .= '</div>';
	}

	deep_save_dyn_styles( $style );
	// live editor
	if ( ! in_array( 'admin-bar', get_body_class() ) ) {

		if ( ! empty( $style ) ) {

			echo '<style>';
				echo $style;
			echo '</style>';

		}

	}
	return $out;
}
} DeepWPBakeryOurProcess::get_instance();


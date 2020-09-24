<?php
class DeepWPBakeryTestimonialCarousel extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryTestimonialCarousel
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
		add_shortcode( 'testimonial-carousel', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );			
		add_action( 'wp_head', function() {
			echo '<script>var deep_testimonial_carousel_styles = {}; </script>';
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
		'testimonial_item_type4'=> '',
		'testimonial_item'		=> '',
		'items'					=> '3',
		'type'					=> '1',
		'shortcodeclass' 		=> '',
		'shortcodeid' 	 		=> '',
	), $atts));
	
	wp_enqueue_style( 'wn-deep-testimonial-carousel' . $type, DEEP_ASSETS_URL . 'css/frontend/testimonial-carousel/testimonial-carousel' . $type . '.css' );

	$this->type  = $type;

	add_action( 'wp_footer', function() use($type) {
		echo '<script>
		var element = document.getElementById("wn-deep-testimonial-carousel'.$type.'-css");
		if(element && !deep_testimonial_carousel_styles["wn-deep-testimonial-carousel'.$type.'-css"]) {
			deep_testimonial_carousel_styles["wn-deep-testimonial-carousel'.$type.'-css"] = true;
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

	$testimonial_item_data	= array();
	$testimonial_item_data_t4	= array();

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		
		// testimonial_item loop
		$testimonial_item		= (array) vc_param_group_parse_atts( $testimonial_item );
		foreach ( $testimonial_item as $data ) {
			
			$img_id = $data['img'];
			
			if( isset( $data['img'] ) && is_numeric( $data['img'] ) )
				$data['img'] = wp_get_attachment_url( $data['img'] );

			// crop image if thumbnail is set
			$data['thumbnail'] = isset( $data['thumbnail'] ) ? $data['thumbnail'] : '90x90';
			if ( !empty( $data['thumbnail'] ) ) {
				
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				
				$patt 			= array ( '0'  => 'x', '1'  => '*' );
				$arr			= explode( chr( 1 ), str_replace( $patt, chr( 1 ), $data['thumbnail'] ) ); // get width and height
				$arr['0']		= isset( $arr['0'] ) ? $arr['0'] : '90';
				$arr['1']		= isset( $arr['1'] ) ? $arr['1'] : '90';
				$image 			= new Wn_Img_Maniuplate; // instance from settor class
				$data['img']	= $image->m_image( $img_id, $data['img'] , $arr['0'] , $arr['1'] ); // set required and get result

			}

			$new_line 					= $data;
			$new_line['img']			= isset( $data['img'] ) ? '<img src="' . esc_url( $data['img'] ) . '" alt="' . $data['img'] . '">' : '';
			$new_line['tc_content']		= isset( $data['tc_content'] ) ? '<p class="tc-content">' . esc_html( $data['tc_content'] ) . '</p>' : '';
			$new_line['name']			= isset( $data['name'] ) ? '<p class="tc-name colorf">' . esc_html( $data['name'] ) . '</p>' : '';
			$new_line['job']			= isset( $data['job'] ) ? '<p class="tc-job">' . esc_html( $data['job'] ) . '</p>' : '';
			$new_line['thumbnail'] 		= isset( $data['thumbnail'] )	? $data['thumbnail']: '';
			$testimonial_item_data[]	= $new_line;
	
		}

		// testimonial_item_type4 loop
		$testimonial_item_type4	= (array) vc_param_group_parse_atts( $testimonial_item_type4 );
		
		foreach ($testimonial_item_type4 as $value) {
	
			$new_line					= $value;
			$new_line['tc_content_t4']	= isset( $value['tc_content_t4'] ) ? esc_html( $value['tc_content_t4'] ) : '';
			$new_line['first_url']		= isset( $value['first_url'] )	? '<a href="' . esc_url( $value['first_url'] )  . '" target="_blank"><i class="wn-fab wn-fa-' . $value['first_social']  . '"></i></a>' : '';
			$new_line['second_url']		= isset( $value['second_url'] )  ? '<a href="' . esc_url( $value['second_url'] )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value['second_social']  . '"></i></a>' : '';
			$new_line['third_url']		= isset( $value['third_url'] )	? '<a href="' . esc_url( $value['third_url'] )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value['third_social']  . '"></i></a>' : '';
			$new_line['fourth_url']		= isset( $value['fourth_url'] )	? '<a href="' . esc_url( $value['fourth_url'] )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value['fourth_social']  . '"></i></a>' : '';
			$testimonial_item_data_t4[]	= $new_line;

		}
	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && is_array($testimonial_item)  ) {

		foreach ( $atts['testimonial_item'] as $key => $data ) {
	
				$img_id = $data->img;

			if( isset( $data->img ) && is_numeric( $data->img ) )

				$data->img = wp_get_attachment_url( $data->img );

			// crop image if thumbnail is set
			if ( !empty($data->thumbnail) ) {

				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {

					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';

				}

				$patt		= array ( '0'  => 'x', '1'  => '*' );
				$arr		= explode( chr( 1 ), str_replace( $patt, chr( 1 ), $data->thumbnail ) ); // get width and height
				$image		= new Wn_Img_Maniuplate; // instance from settor class
				$data->img	= $image->m_image( $img_id, $data->img ,  $arr['0'] , $arr['1'] ); // set required and get result

			}

			$new_line 					= $data;
			$new_line->img				= isset( $data->img ) ? '<img src="' . esc_url( $data->img ) . '" alt="' . $data->img . '">' : '';
			$new_line->tc_content		= isset( $data->tc_content ) ? '<p class="tc-content">' . esc_html( $data->tc_content ) . '</p>' : '';
			$new_line->name				= isset( $data->name ) ? '<p class="tc-name colorf">' . esc_html( $data->name ) . '</p>' : '';
			$new_line->job				= isset( $data->job ) ? '<p class="tc-job">' . esc_html( $data->job ) . '</p>' : '';
			$new_line->thumbnail 		= isset( $data->thumbnail )	? $data->thumbnail: '';
			$testimonial_item_data[]	= $new_line;

		}

	} elseif (  is_plugin_active( 'kingcomposer/kingcomposer.php' ) && is_object( $testimonial_item_type4 ) ) {
		
		// testimonial_item_type4 loop
		foreach ( $atts['testimonial_item_type4'] as $key => $value ) {
		
			$new_line					= $value;
			$new_line->tc_content_t4	= isset( $value->tc_content_t4 ) ? esc_html( $value->tc_content_t4 ) : '';
			$new_line->first_url	= $value->first_url	? '<a href="' . esc_url( $value->first_url )  . '" target="_blank"><i class="wn-fab wn-fa-' . $value->first_social  . '"></i></a>' : '';
			$new_line->second_url	= $value->second_url  ? '<a href="' . esc_url( $value->second_url )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value->second_social  . '"></i></a>' : '';
			$new_line->third_url	= $value->third_url	? '<a href="' . esc_url( $value->third_url )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value->third_social  . '"></i></a>' : '';
			$new_line->fourth_url	= $value->fourth_url	? '<a href="' . esc_url( $value->fourth_url )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value->fourth_social  . '"></i></a>' : '';
			$testimonial_item_data_t4[]= $new_line;
		
		}
	
	}

	// render
	if ( $type == '1' ) { 

		$out = '<div class="testimonial-carousel testi-carou-' . $type . ' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
			$out .= '<div class="testimonial-owl-carousel owl-carousel owl-theme" data-count="' . $items . '">';
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				foreach ( $testimonial_item_data as $line ) :
					$out .= '<div class="tc-item">' . $line['img'] . $line['tc_content'] . $line['name'] . $line['job'] . '</div>';
				endforeach;
			} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
				foreach ( $testimonial_item_data as $line ) :
					$out .= '<div class="tc-item">' . $line->img . $line->tc_content . $line->name . $line->job . '</div>';
				endforeach;
			}
			$out .= '</div>';
		$out .= '</div>';
		
		return $out;

	} if ( $type == '2' ) {

		$out = '<div class="testimonial-carousel testi-carou-' . $type . ' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
			$out .= '<div class="testimonial-owl-carousel owl-carousel owl-theme" data-testimonial_count="' . $items . '">';
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				foreach ( $testimonial_item_data as $line ) :
					$out .= '<div class="tc-item">
								' . $line['tc_content'] . '
								<div class="t-m-footer">'. $line['img'] . $line['name'] . $line['job'] . '</div>
							</div>';
				endforeach;
			} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
				foreach ( $testimonial_item_data as $line ) :
					$out .= '<div class="tc-item">
								' . $line->tc_content . '
								<div class="t-m-footer">'. $line->img . $line->name . $line->job . '</div>
							</div>';
				endforeach;
			}
			$out .= '</div>';
		$out .= '</div>';

		return $out;

	} if ( $type == '3' ) {

		$out = '<div class="testimonial-carousel testi-carou-' . $type . ' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
			$out .= '<div class="testimonial-owl-carousel owl-carousel owl-theme" data-testimonial_count="' . $items . '">';
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				foreach ( $testimonial_item_data as $line ) :
					$out .= '<div class="tc-item">
								' . $line['img'] . '
								<div class="main-content">
									' . $line['name'] . $line['job'] . '
									<div class="t-m-footer"> ' . $line['tc_content'] . ' </div>
								</div>
								
							</div>';
				endforeach;
			} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
				foreach ( $testimonial_item_data as $line ) :
					$out .= '<div class="tc-item">
								' . $line->img . '
								<div class="main-content">
									' . $line->name . $line->job . '
									<div class="t-m-footer"> ' . $line->tc_content . ' </div>
								</div>
								
							</div>';
				endforeach;
			}
			$out .= '</div>';
		$out .= '</div>';

		return $out;

	} if ( $type == '4' ) {

		$out = '<div class="testimonial-carousel testi-carou-' . $type . ' colorb ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
			$out .= '<div class="testimonial-owl-carousel owl-carousel owl-theme" data-testimonial_count="' . $items . '">';
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				foreach ( $testimonial_item_data_t4 as $line ) :
					$out .= '<div class="tc-content-t4">
								<p>' . $line['tc_content_t4'] . ' </p>
								<div class="tc-social-t4">
									<li>' . $line['first_url'] . '</li>
									<li>' . $line['second_url'] . '</li>
									<li>' . $line['third_url'] . '</li>
									<li>' . $line['fourth_url'] . '</li>
								</div>
							</div>';
				endforeach;
			} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
				foreach ( $testimonial_item_data_t4 as $line ) :
					$out .= '<div class="tc-content-t4">
								<p>' . $line->tc_content_t4 . ' </p>
								<div class="tc-social-t4">
									<li>' . $line->first_url . '</li>
									<li>' . $line->second_url . '</li>
									<li>' . $line->third_url . '</li>
									<li>' . $line->fourth_url . '</li>
								</div>
							</div>';
				endforeach;
			}	
			$out .= '</div>';
		$out .= '</div>';
		
		return $out;

	}
	

}

/**
* Required scripts.
*
* @since   1.0.0
*/
public function scripts() {
	if ( self::used_shortcode_in_page( 'testimonial-carousel' ) ) {				
		wp_enqueue_style( 'wn-deep-testimonial-carousel0', DEEP_ASSETS_URL . 'css/frontend/testimonial-carousel/testimonial-carousel0.css' );
	}
}
} DeepWPBakeryTestimonialCarousel::get_instance();
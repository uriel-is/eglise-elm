<?php
class DeepWPBakeryTestimonialSlider extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryTestimonialSlider
	 */
	public static $instance;

	private $style_type;

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
		add_shortcode( 'testimonial_slider', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );			
		add_action( 'wp_head', function() {
			echo '<script>var deep_testimonial_slider_styles = {}; </script>';
		});
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {
	extract( shortcode_atts( array(
		'type'						=> 'mono',
		'testimonial_item'			=> '',
		'testimonial_bgcolor'		=> '',
		'testimonial_img_octa'		=> '',
		'testimonial_item_octa'		=> '',
		'testimonial_item_two'		=> '',
		'testimonial_item_eleven'	=> '',
		'shortcodeclass' 			=> '',
		'shortcodeid' 	 			=> '',
		'thumbnail' 	 			=> '',
	), $attributes) );

	switch ($type) {
		case 'mono':
			$style_type = '1';
			break;
		case 'di':
			$style_type = '2';
			break;
		case 'tri':
			$style_type = '3';
			break;
		case 'tetra':
			$style_type = '4';
			break;
		case 'penta':
			$style_type = '5';
			break;
		case 'hexa':
			$style_type = '6';
			break;
		case 'hepta':
			$style_type = '7';
			break;
		case 'octa':
			$style_type = '8';
			break;
		case 'nona':
			$style_type = '9';
			break;
		case 'deca':
			$style_type = '10';
			break;
		case 'undeca':
			$style_type = '11';
			break;
		case 'dodeca':
			$style_type = '12';
			break;
	}
	
	wp_enqueue_style( 'wn-deep-testimonial-slider' . $style_type, DEEP_ASSETS_URL . 'css/frontend/testimonial-slider/testimonial-slider' . $style_type . '.css' );
	
	$this->style_type  = $style_type;

	add_action( 'wp_footer', function() use($style_type) {
		echo '<script>
		var element = document.getElementById("wn-deep-testimonial-slider'.$style_type.'-css");
		if(element && !deep_testimonial_slider_styles["wn-deep-testimonial-slider'.$style_type.'-css"]) {
			deep_testimonial_slider_styles["wn-deep-testimonial-slider'.$style_type.'-css"] = true;
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

	$out	= '';
	$live_page_builders_css = '';
	$shortcodeclass 		= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid			= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	static $uniqid = 0;
	$uniqid++;
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		// testimonial_item loop
		$testimonial_item		= (array) vc_param_group_parse_atts( $testimonial_item );
		$testimonial_item_data	= array();
		foreach ( $testimonial_item as $data ) :
			$new_line	= $data;
			$new_line['testimonial_name']				= isset( $data['testimonial_name'] )			? $data['testimonial_name'] : '';
			$new_line['testimonial_img_id']				= isset( $data['testimonial_img_id'] ) 			? $data['testimonial_img_id'] : '';
			$new_line['testimonial_thumbnail']			= isset( $data['testimonial_thumbnail'] ) 		? $data['testimonial_thumbnail'] : '';
			$new_line['testimonial_subtitle']			= isset( $data['testimonial_subtitle'] ) 		? $data['testimonial_subtitle'] : '';
			$new_line['testimonial_content']			= isset( $data['testimonial_content'] ) 		? $data['testimonial_content'] : '';
			$new_line['testimonial_first_social']		= isset( $data['testimonial_first_social'] ) 	? $data['testimonial_first_social'] : '';
			$new_line['testimonial_first_url']			= isset( $data['testimonial_first_url'] ) 		? $data['testimonial_first_url'] : '';
			$new_line['testimonial_second_social']		= isset( $data['testimonial_second_social'] ) 	? $data['testimonial_second_social'] : '';
			$new_line['testimonial_second_url']			= isset( $data['testimonial_second_url'] ) 		? $data['testimonial_second_url'] : '';
			$new_line['testimonial_third_social']		= isset( $data['testimonial_third_social'] ) 	? $data['testimonial_third_social'] : '';
			$new_line['testimonial_third_url']			= isset( $data['testimonial_third_url'] ) 		? $data['testimonial_third_url'] : '';
			$new_line['testimonial_fourth_social']		= isset( $data['testimonial_fourth_social'] ) 	? $data['testimonial_fourth_social'] : '';
			$new_line['testimonial_fourth_url']			= isset( $data['testimonial_fourth_url'] ) 		? $data['testimonial_fourth_url'] : '';
			$testimonial_item_data[]					= $new_line;
		endforeach;


		// testimonial_item loop type octa
		$testimonial_item_octa		= (array) vc_param_group_parse_atts( $testimonial_item_octa );
		$testimonial_item_octa_data	= array();
		// crop image if thumbnail is set
		if( isset( $data['testimonial_img_octa'] ) && is_numeric( $data['testimonial_img_octa'] ) ) {
			$image_url_octa = wp_get_attachment_url( $data['testimonial_img_octa'] );
		  	if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
		    	require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
		  	}
		  	$image = new Wn_Img_Maniuplate; 
		  	$testimonial_img_octa = $image->m_image( $data['testimonial_img_octa'] , $image_url_octa , '970' , '667' );
		}
		foreach ( $testimonial_item_octa as $data ) :
			$new_line	= $data;
			$new_line['testimonial_name_octa']		= isset( $data['testimonial_name_octa'] )		? $data['testimonial_name_octa'] : '';
			$new_line['testimonial_subtitle_octa']	= isset( $data['testimonial_subtitle_octa'] ) 	? $data['testimonial_subtitle_octa'] : '';
			$new_line['testimonial_content_octa']	= isset( $data['testimonial_content_octa'] ) 	? $data['testimonial_content_octa'] : '';
			$testimonial_item_octa_data[]			= $new_line;
		endforeach;


		// testimonial_item loop type two
		$testimonial_item_two		= (array) vc_param_group_parse_atts( $testimonial_item_two );
		$testimonial_item_two_data	= array();
		foreach ( $testimonial_item_two as $data ) :
			// crop image if thumbnail is set
			if( isset( $data['testimonial_img_id_two'] ) && is_numeric( $data['testimonial_img_id_two'] ) ) {
				$image_url_two = wp_get_attachment_url( $data['testimonial_img_id_two'] );
			  	if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			    	require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			  	}
			  	$image = new Wn_Img_Maniuplate; 
			  	$data['new_image_url_two'] = $image->m_image( $data['testimonial_img_id_two'] , $image_url_two , '60' , '60' );
			}
			// crop image if thumbnail is set
			if( isset( $data['testimonial_img_id_two'] ) && is_numeric( $data['testimonial_img_id_two'] ) ) {
				$image_url_two = wp_get_attachment_url( $data['testimonial_img_id_two'] );
			  	if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			    	require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			  	}
			  	$image = new Wn_Img_Maniuplate; 
			  	$data['new_image_url_two'] = $image->m_image( $data['testimonial_img_id_two'] , $image_url_two , '160' , '160' );
			}
			$new_line	= $data;
			$new_line['testimonial_img_url_two']	= isset( $data['new_image_url_two'] )			? $data['new_image_url_two'] : '';
			$new_line['testimonial_name_two']		= isset( $data['testimonial_name_two'] )		? $data['testimonial_name_two'] : '';
			$new_line['testimonial_img_two']		= isset( $data['testimonial_img_two'] ) 		? $data['testimonial_img_two'] : '';
			$new_line['testimonial_title_two']		= isset( $data['testimonial_title_two'] ) 		? $data['testimonial_title_two'] : '';
			$new_line['testimonial_subtitle_two']	= isset( $data['testimonial_subtitle_two'] ) 	? $data['testimonial_subtitle_two'] : '';
			$new_line['testimonial_content_two']	= isset( $data['testimonial_content_two'] ) 	? $data['testimonial_content_two'] : '';
			$testimonial_item_two_data[]			= $new_line;
		endforeach;


		// testimonial_item loop type undeca
		if ( $type == 'undeca' ) {
			$testimonial_item_eleven	= (array) vc_param_group_parse_atts( $testimonial_item_eleven );
			$testimonial_item_data_11	= array();
			foreach ($testimonial_item_eleven as $value) {
				$new_line					= $value;
				$new_line['tc_content_t11']	= isset( $value['tc_content_t11'] ) ? esc_html( $value['tc_content_t11'] ) : '';
				$new_line['first_url']		=  isset( $value['first_url'] )	? '<a href="' . esc_url( $value['first_url'] )  . '" target="_blank"><i class="wn-fab wn-fa-' . $value['first_social']  . '"></i></a>' : '';
				$new_line['second_url']		=  isset( $value['second_url'] ) ? '<a href="' . esc_url( $value['second_url'] )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value['second_social']  . '"></i></a>' : '';
				$new_line['third_url']		=  isset( $value['third_url'] )	? '<a href="' . esc_url( $value['third_url'] )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value['third_social']  . '"></i></a>' : '';
				$new_line['fourth_url']		=  isset( $value['fourth_url'] )	? '<a href="' . esc_url( $value['fourth_url'] )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value['fourth_social']  . '"></i></a>' : '';
				$testimonial_item_data_11[]	= $new_line;
			}
		}
	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
		// testimonial_item loop
		if ( ! empty( $testimonial_item ) ) :
			$testimonial_item_data	= array();
			foreach ( $attributes['testimonial_item'] as $key => $data ) :
				$new_line	= $data;
				$new_line->testimonial_name				= isset( $data->testimonial_name )			? $data->testimonial_name : '';
				$new_line->testimonial_img_id				= isset( $data->testimonial_img_id ) 			? $data->testimonial_img_id : '';
				$new_line->testimonial_thumbnail			= isset( $data->testimonial_thumbnail ) 		? $data->testimonial_thumbnail : '';
				$new_line->testimonial_subtitle			= isset( $data->testimonial_subtitle ) 		? $data->testimonial_subtitle : '';
				$new_line->testimonial_content			= isset( $data->testimonial_content ) 		? $data->testimonial_content : '';
				$new_line->testimonial_first_social		= isset( $data->testimonial_first_social ) 	? $data->testimonial_first_social : '';
				$new_line->testimonial_first_url			= isset( $data->testimonial_first_url ) 		? $data->testimonial_first_url : '';
				$new_line->testimonial_second_social		= isset( $data->testimonial_second_social ) 	? $data->testimonial_second_social : '';
				$new_line->testimonial_second_url			= isset( $data->testimonial_second_url ) 		? $data->testimonial_second_url : '';
				$new_line->testimonial_third_social		= isset( $data->testimonial_third_social ) 	? $data->testimonial_third_social : '';
				$new_line->testimonial_third_url			= isset( $data->testimonial_third_url ) 		? $data->testimonial_third_url : '';
				$new_line->testimonial_fourth_social		= isset( $data->testimonial_fourth_social ) 	? $data->testimonial_fourth_social : '';
				$new_line->testimonial_fourth_url			= isset( $data->testimonial_fourth_url ) 		? $data->testimonial_fourth_url : '';
				$testimonial_item_data[]					= $new_line;
			endforeach;
		endif;


		// testimonial_item loop type octa
		if ( ! empty( $testimonial_item_octa ) ) :
			$testimonial_item_octa_data	= array();
			// crop image if thumbnail is set
			if( isset( $data->testimonial_img_octa ) && is_numeric( $data->testimonial_img_octa ) ) {
				$image_url_octa = wp_get_attachment_url( $data->testimonial_img_octa );
			  	if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			    	require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			  	}
			  	$image = new Wn_Img_Maniuplate; 
			  	$testimonial_img_octa = $image->m_image( $data->testimonial_img_octa , $image_url_octa , '970' , '667' );
			}
			array_shift($attributes['testimonial_item_octa']);
			foreach ( $attributes['testimonial_item_octa'] as $key => $data ) :
				$new_line	= $data;
				$new_line->testimonial_name_octa		= isset( $data->testimonial_name_octa )		? $data->testimonial_name_octa : '';
				$new_line->testimonial_subtitle_octa	= isset( $data->testimonial_subtitle_octa ) 	? $data->testimonial_subtitle_octa : '';
				$new_line->testimonial_content_octa		= isset( $data->testimonial_content_octa ) 	? $data->testimonial_content_octa : '';
				$testimonial_item_octa_data[]			= $new_line;
			endforeach;
		endif;


		// testimonial_item loop type two
		if ( ! empty( $testimonial_item_two ) ) :
			$testimonial_item_two_data	= array();
			array_shift($attributes['testimonial_item_two']);
			foreach ( $attributes['testimonial_item_two'] as $key => $data ) :
				// crop image if thumbnail is set
				if( isset( $data->testimonial_img_id_two ) && is_numeric( $data->testimonial_img_id_two ) ) {
					$image_url_two = wp_get_attachment_url( $data->testimonial_img_id_two );
				  	if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				    	require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				  	}
				  	$image = new Wn_Img_Maniuplate; 
				  	$data->new_image_url_two = $image->m_image( $data->testimonial_img_id_two , $image_url_two , '60' , '60' );
				}
				
				$new_line	= $data;
				$new_line->testimonial_img_url_two		= isset( $data->new_image_url_two )			? $data->new_image_url_two : '';
				$new_line->testimonial_name_two			= isset( $data->testimonial_name_two )		? $data->testimonial_name_two : '';
				$new_line->testimonial_img_two			= isset( $data->testimonial_img_two ) 		? $data->testimonial_img_two : '';
				$new_line->testimonial_title_two		= isset( $data->testimonial_title_two ) 		? $data->testimonial_title_two : '';
				$new_line->testimonial_subtitle_two		= isset( $data->testimonial_subtitle_two ) 	? $data->testimonial_subtitle_two : '';
				$new_line->testimonial_content_two		= isset( $data->testimonial_content_two ) 	? $data->testimonial_content_two : '';
				$testimonial_item_two_data[]			= $new_line;
			endforeach;
		endif;


		// testimonial_item loop type undeca
		if ( $type == 'undeca' && ! empty( $testimonial_item_eleven ) ) {
			$testimonial_item_data_11	= array();
			array_shift($attributes['testimonial_item_eleven']);
			foreach ($attributes['testimonial_item_eleven'] as $key => $value) {
				$new_line					= $value;
				$new_line->tc_content_t11	= isset( $value->tc_content_t11 ) ? esc_html( $value->tc_content_t11 ) : '';
				$new_line->first_url		=  isset( $value->first_url )	? '<a href="' . esc_url( $value->first_url )  . '" target="_blank"><i class="wn-fab wn-fa-' . $value->first_social  . '"></i></a>' : '';
				$new_line->second_url		=  isset( $value->second_url ) ? '<a href="' . esc_url( $value->second_url )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value->second_social  . '"></i></a>' : '';
				$new_line->third_url		=  isset( $value->third_url )	? '<a href="' . esc_url( $value->third_url )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value->third_social  . '"></i></a>' : '';
				$new_line->fourth_url		=  isset( $value->fourth_url )	? '<a href="' . esc_url( $value->fourth_url )	. '" target="_blank"><i class="wn-fab wn-fa-' . $value->fourth_social  . '"></i></a>' : '';
				$testimonial_item_data_11[]	= $new_line;
			}
		}
	}

	// Render
	if ( $type == 'undeca') {
		$out .= '<div class="testimonial-slider-'.$type.' colorb">';
	}

	$out .= '
	 	<div class="testimonial-slider-owl-carousel owl-carousel owl-theme ts-' . $type . ' ts-' . $type . $uniqid . ' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
	 	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	 		foreach ( $testimonial_item_data as $line ) :
				if( ! empty( $line['testimonial_img_id'] ) ) {
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					if( is_numeric( $line['testimonial_img_id'] ) ) {
						$url = wp_get_attachment_url( $line['testimonial_img_id'] );
					}
					if ( $thumbnail ) {
						$patt = array ( '0'  => 'x', '1'  => '*' );
						$arr = explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) ); // get width and height
					} elseif ( $type == 'di' ) {
						$arr = array( '500', '500' );
					} elseif ( $type == 'tetra' ) {
						$arr = array( '76', '76' );
					} elseif ( $type == 'hexa' ) {
						$arr = array( '70', '70' );
					} elseif ( $type == 'hepta' ) {
						$arr = array( '200', '200' );
					} elseif ( $type == 'deca' ) {
						$arr = array( '805', '805' );
					} else {
						$arr = array( '100', '100' );
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$line['testimonial_img_id'] = $image->m_image( $line['testimonial_img_id'], $url , $arr['0'] , $arr['1'] ); // set required and get result
				}
				$line['testimonial_img_id'] = $line['testimonial_img_id'] ? '<img src="'. $line['testimonial_img_id'] .'" alt="'.$line['testimonial_name'].'">' : '' ;
				
				$socialvar = '';
				if( $line['testimonial_first_url'] || $line['testimonial_second_url'] ||  $line['testimonial_third_url'] || $line['testimonial_fourth_url'] ) :
					$socialvar .= '<div class="social-testimonial"><ul>';

				if( !empty( $line['testimonial_first_url'] ) )
					$socialvar .= '<li class="first-social"><a href="'. esc_url($line['testimonial_first_url']) .'"><i class="wn-fab wn-fa-'. $line['testimonial_first_social'] .'"></i></a></li>';

				if(!empty($line['testimonial_second_url']))
					$socialvar .= '<li class="second-social"><a href="'. esc_url($line['testimonial_second_url']) .'"><i class="wn-fab wn-fa-'. $line['testimonial_second_social'] .'"></i></a></li>';

				if(!empty($line['testimonial_third_url']))
					$socialvar .= '<li class="third-social"><a href="'. esc_url($line['testimonial_third_url']) .'"><i class="wn-fab wn-fa-'.  $line['testimonial_third_social'] .'"></i></a></li>';

				if(!empty($line['testimonial_fourth_url']))
					$socialvar .= '<li class="fourth-social"><a href="'. esc_url($line['testimonial_fourth_url']) .'"><i class="wn-fab wn-fa-'. $line['testimonial_fourth_social'] .'"></i></a></li>';

				$socialvar .= '</ul></div>';
				endif;

				if ( $type == 'mono' || $type == 'di' || $type == 'tri' || $type == 'tetra' || $type == 'penta' || $type == 'hexa' || $type == 'hepta') {
					$out .='
						<div class="testimonial">		  
							<div class="testimonial-content">
								<h4><q>'.$line['testimonial_content'].'</q></h4>			
								<div class="testimonial-arrow"></div>			  
							</div>			  
							<div class="testimonial-brand">
								' . $line['testimonial_img_id'] . '		
								<h5>
									<strong>'.$line['testimonial_name'].'</strong><br>			
									<em>'.$line['testimonial_subtitle'].'</em>
								</h5>		  
								<div class="social-testimonial">
									' . $socialvar . '
								</div>
							</div>
						</div>';
				}
				if ( $type == 'deca' ) {
					$out .='
						<div class="testimonial">		  
							<div class="testimonial-content">
								<h4><q>'.$line['testimonial_content'].'</q></h4>
								<h5>
									<strong>'.$line['testimonial_name'].'</strong><br>			
									<em>'.$line['testimonial_subtitle'].'</em>
								</h5>		  
								<div class="social-testimonial">
									' . $socialvar . '
								</div>
							</div>
							<div class="center-line">
								<span class="deca-line"></span>	
							</div>			  
							<div class="testimonial-brand">
								' . $line['testimonial_img_id'] . '		
							</div>
						</div>';
				}
			endforeach;

			foreach ( $testimonial_item_octa_data as $line ) :
				if ( $type == 'octa' ) {
					$out .='
					<div class="testimonial">		
						<div class="testimonial-content">
							<h4><q>'.$line['testimonial_content_octa'].'</q></h4>			
							<div class="testimonial-arrow"></div>			  
						</div>			  
						<div class="testimonial-brand">
							<h5>
								<strong>'.$line['testimonial_name_octa'].'</strong><br>			
								<em>'.$line['testimonial_subtitle_octa'].'</em>
							</h5>
						</div>
					</div>';
				}
			endforeach;

			foreach ( $testimonial_item_two_data as $line ) :
				if ( $type == 'nona' ) {
					$line['testimonial_img_url_two'] = !empty( $line['testimonial_img_url_two'] ) ? '<img src="'.$line['testimonial_img_url_two'].'" alt="'.$line['testimonial_name_two'].'">' : '' ;
					$out .='
					<div class="testimonial">		  
						<em>'.$line['testimonial_subtitle_two'].'</em>
						<div class="testimonial-content">
							<div class="testimonial-title">'.$line['testimonial_title_two'].'</div>
							<h4><q>'.$line['testimonial_content_two'].'</q></h4>						  
						</div>			  
						<div class="testimonial-brand">
							' . $line['testimonial_img_url_two'] . '
							<strong>'.$line['testimonial_name_two'].'</strong><br>			  
						</div>
					</div>';
				}
			endforeach;

			if ( $type == 'undeca' ) {
				foreach ( $testimonial_item_data_11 as $line ) :
					$out .= '
					<div class="tc-content-t11">
						<p>' . $line['tc_content_t11'] . ' </p>
						<div class="tc-social-t11">
							<li>' . $line['first_url'] . '</li>
							<li>' . $line['second_url'] . '</li>
							<li>' . $line['third_url'] . '</li>
							<li>' . $line['fourth_url'] . '</li>
						</div>
					</div>';
				endforeach;
			}

			if ( $type == 'dodeca' ) {
				foreach ( $testimonial_item_two_data as $line ) :
					$line['testimonial_img_url_two'] = !empty( $line['testimonial_img_url_two'] ) ? '<img src="'.$line['testimonial_img_url_two'].'" alt="'.$line['testimonial_name_two'].'">' : '' ;
					$out .='
					<div class="testimonial">		
						<div class="testimonial-brand">
							' . $line['testimonial_img_url_two'] . '	  
						</div>  
							<div class="testimonial-title colorf">'.$line['testimonial_name_two'].'</div>
							<span class="testimonial-sub-title">'.$line['testimonial_title_two'].'</span>
							<span class="testimonial-sub-title">'.$line['testimonial_subtitle_two'].'</span>
						<div class="testimonial-content">	
							<p>'.$line['testimonial_content_two'].'</p>						  
						</div>			  
					</div>';
				endforeach;
			}

		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {

			if ( is_array( $testimonial_item_data ) ) {
				foreach ( $testimonial_item_data as $line ) :

	 			if( is_numeric( $line->testimonial_img_id ) )
					$line->testimonial_img_id = wp_get_attachment_url( $line->testimonial_img_id );
				
				$socialvar = '';
				if( $line->testimonial_first_url || $line->testimonial_second_url ||  $line->testimonial_third_url || $line->testimonial_fourth_url ) :
					$socialvar .= '<div class="social-testimonial"><ul>';

				if( !empty( $line->testimonial_first_url ) )
					$socialvar .= '<li class="first-social"><a href="'. esc_url($line->testimonial_first_url) .'"><i class="wn-fab wn-fa-'. $line->testimonial_first_social .'"></i></a></li>';

				if(!empty($line->testimonial_second_url))
					$socialvar .= '<li class="second-social"><a href="'. esc_url($line->testimonial_second_url) .'"><i class="wn-fab wn-fa-'. $line->testimonial_second_social .'"></i></a></li>';

				if(!empty($line->testimonial_third_url))
					$socialvar .= '<li class="third-social"><a href="'. esc_url($line->testimonial_third_url) .'"><i class="wn-fab wn-fa-'.  $line->testimonial_third_social .'"></i></a></li>';

				if(!empty($line->testimonial_fourth_url))
					$socialvar .= '<li class="fourth-social"><a href="'. esc_url($line->testimonial_fourth_url) .'"><i class="wn-fab wn-fa-'. $line->testimonial_fourth_social .'"></i></a></li>';

				$socialvar .= '</ul></div>';
				endif;

				if ( $type == 'mono' || $type == 'di' || $type == 'tri' || $type == 'tetra' || $type == 'penta' || $type == 'hexa' || $type == 'hepta' ) {
					$line->testimonial_img_id = !empty( $line->testimonial_img_id ) ? '<img src="'.$line->testimonial_img_id.'" alt="'.$line->testimonial_name.'">' : '' ;
					$out .='
						<div class="testimonial">		  
							<div class="testimonial-content">
								<h4><q>'.$line->testimonial_content.'</q></h4>			
								<div class="testimonial-arrow"></div>			  
							</div>			  
							<div class="testimonial-brand">
								' . $line->testimonial_img_id . '		
								<h5>
									<strong>'.$line->testimonial_name.'</strong><br>			
									<em>'.$line->testimonial_subtitle.'</em>
								</h5>		  
								<div class="social-testimonial">
									' . $socialvar . '
								</div>
							</div>
						</div>';
				}
				if ( $type == 'deca' ) {
					$line->testimonial_img_id = !empty( $line->testimonial_img_id ) ? '<img src="'.$line->testimonial_img_id.'" alt="'.$line->testimonial_name.'">' : '' ;
					$out .='
						<div class="testimonial">		  
							<div class="testimonial-content">
								<h4><q>'.$line->testimonial_content.'</q></h4>
								<h5>
									<strong>'.$line->testimonial_name.'</strong><br>			
									<em>'.$line->testimonial_subtitle.'</em>
								</h5>		  
								<div class="social-testimonial">
									' . $socialvar . '
								</div>
							</div>
							<div class="center-line">
								<span class="deca-line"></span>	
							</div>			  
							<div class="testimonial-brand">
								' . $line->testimonial_img_id . '		
							</div>
						</div>';
				}
				endforeach;
			}
			
			if ( is_array( $testimonial_item_octa_data ) ) {
				foreach ( $testimonial_item_octa_data as $line ) :
				if ( $type == 'octa' ) {
					$out .='
						<div class="testimonial">		  
							<div class="testimonial-content">
								<h4><q>'.$line->testimonial_content_octa.'</q></h4>			
								<div class="testimonial-arrow"></div>			  
							</div>			  
							<div class="testimonial-brand">
								<h5>
									<strong>'.$line->testimonial_name_octa.'</strong><br>			
									<em>'.$line->testimonial_subtitle_octa.'</em>
								</h5>		  
							</div>
						</div>';
					}
				endforeach;
			}

			if ( is_array( $testimonial_item_two_data ) ) {
				foreach ( $testimonial_item_two_data as $line ) :
				if ( $type == 'nona' ) {
					$line->testimonial_img_url_two = !empty ( $line->testimonial_img_url_two ) ? '<img src="'.$line->testimonial_img_url_two.'" alt="'.$line->testimonial_name_two.'">' : '' ;
					$out .='
					<div class="testimonial">		  
						<em>'.$line->testimonial_subtitle_two.'</em>
						<div class="testimonial-content">
							<div class="testimonial-title">'.$line->testimonial_title_two.'</div>
							<h4><q>'.$line->testimonial_content_two.'</q></h4>						  
						</div>			  
						<div class="testimonial-brand">
							' . $line->testimonial_img_url_two . '
							<strong>'.$line->testimonial_name_two.'</strong><br>			  
						</div>
					</div>';
				}
				endforeach;
			}

			if ( $type == 'undeca' ) {
			foreach ( $testimonial_item_data_11 as $line ) :
					$out .= '
					<div class="tc-content-t11">
						<p>' . $line->tc_content_t11 . ' </p>
						<div class="tc-social-t11">
							<li>' . $line->first_url . '</li>
							<li>' . $line->second_url . '</li>
							<li>' . $line->third_url . '</li>
							<li>' . $line->fourth_url . '</li>
						</div>
					</div>';
			endforeach;
			}
			if ( $type == 'dodeca' ) {
				foreach ( $testimonial_item_two_data as $line ) :
						$line->new_image_url_two = !empty ( $line->new_image_url_two ) ? '<img src="'.$line->new_image_url_two.'" alt="'.$line->testimonial_name_two.'">' : '' ;
						$out .='
						<div class="testimonial">		  
							<div class="testimonial-brand">
								' . $line->new_image_url_two . '		  
							</div>
							<em>'.$line->testimonial_name_two.'</em>
							<div class="testimonial-content">
								<div class="testimonial-title">'.$line->testimonial_subtitle_two.'</div>
								<div class="testimonial-title">'.$line->testimonial_title_two.'</div>
								<h4><q>'.$line->testimonial_content_two.'</q></h4>						  
							</div>			  
						</div>';
					
				endforeach;
			}
		}
    $out .= 
    	'</div>';

    if ( $type == 'undeca') {
		$out .= '</div>';
	}

	$background_img = '';
	if ( $type == 'octa') {
		if (!empty($testimonial_img_octa)) {
			$image = wp_get_attachment_url($testimonial_img_octa);
			$background_img  = '.testimonial-slider-owl-carousel.ts-' . $type . '.ts-' . $type . $uniqid .'{ background-image:url( ' . $image . ' ); background-repeat: no-repeat; background-position: center center; background-size: cover; }';
		}
	}

	$backgound_color = '';
	if( $type == 'octa') {
		if (!empty( $testimonial_bgcolor )) {
			$backgound_color = '#wrap .ts-' . $type . '.ts-' . $type . $uniqid . '{ background-color:' . $testimonial_bgcolor . ' }';	
		}
	}

	$style = '';
	$style .= $background_img . $backgound_color;
	deep_save_dyn_styles( $style );

    return $out;
}

/**
* Required scripts.
*
* @since   1.0.0
*/
public function scripts() {
	if ( self::used_shortcode_in_page( 'testimonial_slider' ) ) {			
		wp_enqueue_style( 'wn-deep-testimonial-slider0', DEEP_ASSETS_URL . 'css/frontend/testimonial-slider/testimonial-slider0.css' );
	}
}
} DeepWPBakeryTestimonialSlider::get_instance();
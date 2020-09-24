<?php
class DeepWPBakeryTestimonial extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryTestimonial
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
		add_shortcode( 'testimonial', array( $this, 'output' ) );
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
			'type'						=>'1',
			'testimonial_content'		=>'Testimonial content text goes here',
			'testimonial_background' 	=>'',
			'testimonial_content_color' =>'',
			'img'						=>'',
			'name'						=>'',
			'social'					=> '',
			'first_social'				=> 'twitter',
			'first_url'					=> '',
			'second_social'				=> 'facebook',
			'second_url'				=> '',
			'third_social'				=> 'google-plus',
			'third_url'					=> '',
			'fourth_social'				=> 'linkedin',
			'fourth_url'				=> '',
			'member_job'				=> '',
			'thumbnail' 				=> '',
			'link_target'				=> '',
			'shortcodeclass' 			=> '',
			'shortcodeid' 	 			=> '',
		), $atts));		

		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		$link_target_tag = '';
		if ( $link_target == 'true' ){
			$link_target_tag = ' target="_blank" ';
		}

		if( ! empty( $img ) ) {
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			}
			if( is_numeric( $img ) ) {
				$url = wp_get_attachment_url( $img );
			}
			if ( $thumbnail ) {
				$patt = array ( '0'  => 'x', '1'  => '*' );
				$arr = explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) ); // get width and height
			} else {
				$arr = array( '60', '60' );
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$img = $image->m_image( $img, $url , $arr['0'] , $arr['1'] ); // set required and get result
		}

		$style			= '';
		static $uniqid = 0;
		$uniqid++;
		$comma_job		= ( $type == '5' && $member_job ) ? $member_job  : '' ;
		$color			= ( $testimonial_content_color ) ? ' #wrap .testimonial-'. $uniqid .' { color:' . $testimonial_content_color . ';} ' : '';
		$background		= ( $testimonial_background ) ? '#wrap .testimonial-'. $uniqid .' .content, #wrap .testimonial-'. $uniqid .' .testimonial-content { background:' . $testimonial_background . ';} ' : '';
		$background		.= ( $testimonial_background ) ? ' #wrap .testimonial-'. $uniqid .' .testimonial-arrow:after { border-color: ' . $testimonial_background . ' transparent transparent;}' : '';
		$background		.= ( $testimonial_background ) ? ' #wrap .testimonial-'. $uniqid .' .testimonial2 .testimonial-content:after { border-right-color: ' . $testimonial_background . ';}' : '';
		$border_color	= ( $testimonial_background && $type == 2 ) ? ' #wrap .testimonial2.testimonial-'. $uniqid .' .testimonial-content:after { border-right-color:' . $testimonial_background . ';}  ' : '';
		$style .= $color . $background . $border_color;
		$live_page_builders_css	= '';

		// socials
		$socials = '';
		if ( $social == 'enable' ) :
			$social1 = $social2 = $social3 = $social4 = '';
			$social1 = ( $first_url ) ? '<a href="' . esc_url( $first_url ) . '" '.$link_target_tag.'><i class="wn-fab wn-fa-' . $first_social . '"></i></a>' : '';
			$social2 = ( $second_url ) ? '<a href="' . esc_url( $second_url ) . '" '.$link_target_tag.'><i class="wn-fab wn-fa-' . $second_social . '"></i></a>' : '';
			$social3 = ( $third_url ) ? '<a href="' . esc_url( $third_url ) . '" '.$link_target_tag.'><i class="wn-fab wn-fa-' . $third_social . '"></i></a>' : '';
			$social4 = ( $fourth_url ) ? '<a href="' . esc_url( $fourth_url ) . '" '.$link_target_tag.'><i class="wn-fab wn-fa-' . $fourth_social . '"></i></a>' : '';
			$socials = '<div class="tl-social-team">' . $social1 . $social2 . $social3 . $social4 . '</div>';
		endif;

		$out = '';
		$img = $img ? '<img src="'. $img .'" alt="'. $name .'">' : '';

		if ( $type == 1 ) :
			$out .= '<div class="testimonial testimonial-'. $uniqid .' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
			$out .= '<div class="testimonial-content content">';
			$out .= '<h4><q>'. $testimonial_content .'</q></h4>';
			$out .= '<div class="testimonial-arrow"></div>';
			$out .= '</div>';
			$out .= '<div class="testimonial-brand">'.$img;
			$out .= '<h5><strong>'.$name.'</strong><br><em>'.$member_job.'</em></h5></div>';
			$out .= '</div>';
		elseif( $type == 4 ) :
			$out .='
				<div class="testimonial'. esc_attr( $type ) .' testimonial-'. $uniqid .' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
					<div class="testimonial-content content	">
						<div class="testimonial-image">
							' . $img . '
						</div>
						<h5> ' . $name . ' </h5>
						<q> ' . $testimonial_content . ' </q>
					</div>
				</div>
			';
		elseif( $type == 5 ) :
			$out .='
				<div class="testimonial'. esc_attr( $type ) .' testimonial-'. $uniqid .' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
					<div class="testimonial-content">
						<div class="testimonial-image">
							' . $img . '
						</div>
						<q class="content"> ' . $testimonial_content . ' </q>
						<span class="triangle"></span>
						<div class="name"> ' . $name . ' </div>
						<div class="job"> ' . $comma_job . ' </div>
					</div>
				</div>
		';
		else :
			$name	 = $name ? '<h5><strong>'. $name .'</strong></h5>' : '';
			$member_job	 = $member_job ? '<h6>'. $member_job .'</h6>' : '';
			$content = $testimonial_content ? '<p class="content">'. $testimonial_content .'<span class="shape"></span></p>' : '';

			if ( $type == 3 ) {
				$out = '<div class="testimonial'. esc_attr( $type ) .' testimonial-'. $uniqid .' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
				$out .= '<div class="testimonial-content">'. $testimonial_content .' <div class="t-m-footer">' . $img . $name . $member_job . $socials . '</div></div></div>';
			} else {
				$out = '
				<div class="testimonial'. esc_attr( $type ) .' testimonial-'. $uniqid .'">
					' . $img . '
					<div class="testimonial-content">' . $name . $content . '</div>
				</div>';
			}
		endif;
		deep_save_dyn_styles( $style );

		// live editor
		$live_page_builders_css .= $style;
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
		if ( self::used_shortcode_in_page( 'testimonial' ) ) {
			wp_enqueue_style( 'wn-deep-testimonial', DEEP_ASSETS_URL . 'css/frontend/testimonial/testimonial.css' );
		}
	}

} DeepWPBakeryTestimonial::get_instance();

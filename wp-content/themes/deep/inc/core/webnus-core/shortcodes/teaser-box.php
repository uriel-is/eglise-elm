<?php
class DeepWPBakeryTeaserBox extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryTeaserBox
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
		add_shortcode( 'teaserbox', array( $this, 'output' ) );		
		add_action( 'wp_head', function() {
			echo '<script>var deep_teaserbox_styles = {}; </script>';
		});
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' 					=> '1',
		'img' 					=> '',
		'title' 				=> '',
		'subtitle' 				=> '',
		'link_url' 				=> '#',
		'img_alt' 				=> '',
		'text_content'		 	=> '',
		'featured' 				=> '',
		'thumbnail' 			=> '',
		'suburl_color'		 	=> '',
		'link_target' 			=> '',
		'teaser_btn' 			=> '',
		'teaser_btn_bg_color' 	=> '',
		'teaser_btn_txt_color' 	=> '',
		'price' 				=> '',
		'features' 				=> '',
		'textfield' 			=> '',
		'time' 					=> '',
		'time_description' 		=> '',
		'shortcodeclass' 		=> '',
		'shortcodeid' 	 		=> '',
		'introduction_title'	=> '',
		'introduction_link_url'	=> '',
		'live_preview_title'	=> '',
		'live_preview_link_url'	=> '',
		'buy_item_title'		=> '',
		'buy_item_link_url'		=> '',

	), $atts ) );

	wp_enqueue_style( 'wn-deep-teaser-box' . $type, DEEP_ASSETS_URL . 'css/frontend/teaser-box/teaser-box' . $type . '.css' );

	$this->type  = $type;

	add_action( 'wp_footer', function() use($type) {
		echo '<script>
		var element = document.getElementById("wn-deep-teaser-box'.$type.'-css");
		if(element && !deep_teaserbox_styles["wn-deep-teaser-box'.$type.'-css"]) {
			deep_teaserbox_styles["wn-deep-teaser-box'.$type.'-css"] = true;
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
	
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );


	// Class & ID 
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	$introduction_title			= $introduction_title 		? $introduction_title : '';
	$introduction_link_url		= $introduction_link_url 	? $introduction_link_url : '';
	$live_preview_title			= $live_preview_title 		? $live_preview_title : '';
	$live_preview_link_url		= $live_preview_link_url 	? $live_preview_link_url : '';
	$buy_item_title				= $buy_item_title 			? $buy_item_title : '';
	$buy_item_link_url			= $buy_item_link_url 		? $buy_item_link_url : '';

	$link_target_tag = '';
	if ( $link_target == 'true' ) {
		$link_target_tag = ' target="_blank" ';
	}
	static $uniqid = 0;
	$uniqid++;
	$live_page_builders_css = '';
	$suburl_color = !empty( $suburl_color ) ? $suburl_color : '';
	$link_color = !empty( $suburl_color ) ? 'style = "color: ' . $suburl_color . ';"': '';
	$style = '';

	$teaser_btn_bg_color = $teaser_btn_bg_color ? ' .teaser-box' . $type . '.teaser-box-' . $uniqid . ' .teaser-btn { background: ' . $teaser_btn_bg_color . ';}': '';
	$teaser_btn_txt_color = $teaser_btn_txt_color ? ' .teaser-box' . $type . '.teaser-box-' . $uniqid . ' .teaser-btn { color: ' . $teaser_btn_txt_color . ';}': '';
	$style = $teaser_btn_bg_color . $teaser_btn_txt_color;

	if ( is_numeric( $img ) ) {
		$image_id = $img;
		$img = wp_get_attachment_url( $img );
	}

	if ( !empty( $thumbnail ) ) {
		if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
		}
		$patt = array( '0' => 'x', '1' => '*' );
		$arr		= explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) );
		$image		= new Wn_Img_Maniuplate;
		$image_url	= $image->m_image( $image_id, $img, $arr[ '0' ], $arr[ '1' ] );
	} else {
		$image_url = $img;
	}


	$img = $img ? 'background-image: url(' . esc_url( $img ) . ')': '';
	$out = '';
	$out .= '<div class="teaser-box-' . $uniqid . ' teaser-box' . $type . ' clearfix ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
	if ( ( $type != '15' ) && ( $type != '16' ) && ( $type != '17' ) &&  ( $type != '18' ) ) {
		$has_image = $teaser_image = '';

		if ( ( ( $type == 4 )OR( $type == 5 ) ) && ( empty( $subtitle ) ) ) {
			$subtitle = $title;
		}

		if ( ( $type == 6 ) && ( empty( $subtitle ) ) ) {
			$subtitle = esc_html__( 'understand more', 'deep' );
		}

		$overlay = $type == '13' ? '
		
		<span class="colorb overlay-teaser-box' . $type . '">
		
		</span>
		
		
		<i class="colorf ti-arrow-right">
		
		</i>
		
		': '';
		if ( $image_url ) {
			$has_image = 'has-image';
			$teaser_image = '<figure>' . $overlay . '<img class="teaser-image " src="' . $image_url . '" alt="' . $img_alt . '"></figure>';
		}
		if ( $type == '12' )
			$out .= '<div class="teaser-content">';

		if ( $type == '11' || $type == '12' )
			$out .= '<div class="bgc-overlay"></div>';

		if ( !empty( $link_url ) )
			$out .= '<a href="' . $link_url . '" ' . $link_target_tag . '>';
		$out .= $teaser_image;

		if ( !empty( $featured ) )
			$out .= '<h6 class="teaser-featured">' . $featured . '</h4>';

		$before = $type == '13' ? '<span class="before"></span>' : '';
		$after = $type == '13' ? '<span class="after colorb"></span>' : '';

		$out .= '<h4 class="teaser-title ' . $has_image . '"  ' . $link_color . ' >' . $before . $title . $after . '</h4>';


		if ( !empty( $subtitle ) )
			$out .= '<h5 class="teaser-subtitle">' . $subtitle . '</h5> ' . $teaser_btn = $type == '8' ? '<span class="teaser-btn">' . esc_html( $teaser_btn ) . '</span>': '';

		if ( !empty( $link_url ) )
			$out .= '</a>';

		if ( $type == '12' )
			$out .= '</div>';

		if ( !empty( $text_content ) && $type == '10' )
			$out .= '<p>' . $text_content . '</p>';

		if ( !empty( $text_content ) && $type == '11' )
			$out .= '<p>' . $text_content . '</p>';
		// type 15
	} elseif ( $type == '15' ) {
			$out .= '<div class="col-xs-12 col-md-4 col-sm-4 tsb15-imgwrap">';
			$out .= !empty( $image_url ) ? '<img src="' . $image_url . '" alt="' . $img_alt . '" class="img-responsive">': '';
			$out .= '</div>';
			$out .= '<div class="col-xs-12 col-md-8 col-sm-8">';
			$out .= '<div class="inner-c">';
			$out .= !empty( $price ) ? '<span class="c-price"> ' . $price . ' </span>': '';
			$out .= !empty( $featured ) ? '<div class="c-featured"> ' . $featured . ' </div>': '';
			$out .= !empty( $title ) ? '<h3 class="c-title"> ' . $title . ' </h3>': '';
			$out .= !empty( $subtitle ) ? '<h4 class="c-subtitle"> ' . $subtitle . ' </h4>': '';
			$out .= !empty( $text_content ) ? '<p class="c-text_content"> ' . $text_content . ' </p>': '';
				if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
					$features = ( array )vc_param_group_parse_atts( $features );
					if ( !empty( $features ) ) {
						$out .= '<div class="feat-box">';
						foreach ( $features as $data ):
							$new_line = $data;
						$new_line[ 'text' ] = isset( $data[ 'text' ] ) ? $data[ 'text' ] : '';
						$new_line[ 'number' ] = isset( $data[ 'number' ] ) ? $data[ 'number' ] : '';
						$features_data[] = $new_line;
						endforeach;
						foreach ( $features_data as $line ):
							$out .= '<div class="features-data">';
							$out .= '<span class="c-feat"> ' . $line[ 'text' ] . ' </span>';
							$out .= '<span class="c-feat-n"> ' . $line[ 'number' ] . ' </span>';
							$out .= '</div>';
						endforeach;
						$out .= '</div>'; // Close feat-box
					}
				} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
						$out .= '<div class="feat-box">';
						foreach ( $atts['features'] as $key => $item ):
							$new_line = $item;
							$new_line->text = isset( $new_line->text ) ? $new_line->text : '';
							$new_line->number = isset( $new_line->number ) ? $new_line->number : '';
							$features_data[] = $new_line;
						endforeach;
						foreach ( $features_data as $line ):
							$out .= '<div class="features-data">';
						$out .= '<span class="c-feat"> ' . $line->text . ' </span>';
						$out .= '<span class="c-feat-n"> ' . $line->number . ' </span>';
						$out .= '</div>';
						endforeach;
						$out .= '</div>'; // Close feat-box
				}
			if ( !empty( $teaser_btn ) && !empty( $link_url ) ) {
				$out .= '<a href="' . $link_url . '" class="colorf c-link" ' . $link_target_tag . '>';
				$out .= $teaser_btn;
				$out .= '</a>';
			} // close c-btn
			$out .= '</div>'; // close inner-c
			$out .= '</div>'; // close col-md-8
		}
		//type 16
	elseif ( $type == '16' ) {
		$out .= '<div class="tb16-content">';
		
			$out .= !empty( $image_url ) ? '<img src="' . $image_url . '" alt="' . $img_alt . '" class="img-responsive">': '';
		
				$out .= '<div class="tb16-inner-c">';
					$out .= !empty( $title ) ? '<h4 class="c-title"> ' . $title . ' </h4>': '';
					$out .= !empty( $subtitle ) ? '<h5 class="c-subtitle"> ' . $subtitle . ' </h5>': '';
					if ( !empty( $teaser_btn ) && !empty( $link_url ) ) {
						$out .= '<a href="' . $link_url . '" class="colorf c-link" ' . $link_target_tag . '>';
						$out .= $teaser_btn;
						$out .= '</a>';
					} // close c-btn
				$out .= '</div>'; // close tb16-inner-c
		
		$out .= '</div>'; // close tb16-content
	}
	
	elseif ( $type == '17' ) {
	$out .= !empty( $link_url ) ? '<a href="' . $link_url . '">': '';
		$out .= '<div class="tb17-content">';
				$out .= '<div class="tb17-inner-c">';
					$out .= '<div class="time-content">';
						$out .= '<i class="wn-far wn-fa-clock"></i>'.'<br>';
						$out .= !empty( $time ) ? '<span class="time-tb17">' . $time . '</span>'.'<br>': '';
						$out .= !empty( $time_description ) ? '<span class="c-subtitle"> ' . $time_description . ' </span>': '';
					$out .= '</div>';//time-content
					$out .= !empty( $title ) ? '<h4 class="c-title"> ' . $title . ' </h4>': '';
					$out .= !empty( $text_content ) ? '<p class="tb17-p"> ' . $text_content . ' </p>': '';
					$out .= !empty( $price ) ? '<span class="c-price"> ' . $price . ' </span>': '';
				$out .= '</div>';// close tb17-inner-c
		$out .= '</div>';// tb17-content
	$out .= !empty( $link_url ) ? '</a>': '';
		if(!empty ($image_url))
		{
			$t17_background=' .teaser-box-' . $uniqid . '.teaser-box17 { background: url('.$image_url.') no-repeat;}';
			deep_save_dyn_styles( $t17_background );
			$live_page_builders_css .= $t17_background;
		}
	}

	elseif ( $type == '18' ) {	
		$out .= '<div class="tb18-content">';
			$out .= '<div class="wn-image-box">';
				$out .= '<div class="wn-title-box">';
				if ( !empty( $link_url ) ) {
						$out .= '<a href="' . $link_url . '" ' . $link_target_tag . '>';
							$out .= !empty( $title ) ? '<h4 class="tb-title"> ' . $title . ' </h4>': '';
						$out .= '</a>';
				} else {
					$out .= !empty( $title ) ? '<h4 class="tb-title"> ' . $title . ' </h4>': '';
				}
				$out .= '</div>';			
				$out .= !empty( $image_url ) ? '<img src="' . $image_url . '" alt="' . $img_alt . '" class="img-responsive">': '';
				$out .= '<div class="wn-button-box">';
					if ( !empty( $introduction_link_url ) && !empty( $introduction_title ) ) {
						$out .= '<a class="button small wn-btn" href="' . $introduction_link_url  . '"><i class="-sl-link icon-basic-link"></i><span> ' . $introduction_title  .  ' </spn></a>';
					}
					if ( !empty( $live_preview_link_url ) && !empty( $live_preview_title ) ) {
						$out .= '<a class="button small wn-btn" href="' . $live_preview_link_url  . '" target="_blank"><i class="icon-basic-display"></i><span> ' . $live_preview_title  .  ' </spn></a>';
					}
					if ( !empty( $buy_item_link_url ) && !empty( $buy_item_title ) ) {
						$out .= '<a class="button small wn-btn" href="' . $buy_item_link_url  . '"><i class="-sl-basket icon-ecommerce-cart-content"></i><span> ' . $buy_item_title  .  ' </spn></a>';
					}
				$out .= '</div>';				
			$out .= '</div>';
		$out .= '</div>';
	}

$out .= '</div>';
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
} DeepWPBakeryTeaserBox::get_instance();
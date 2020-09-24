<?php
class DeepWPBakeryOurTeam extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryOurTeam
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
		add_shortcode( 'ourteam', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );			
		add_action( 'wp_head', function() {
			echo '<script>var deep_ourteam_styles = {}; </script>';
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
		'type'					=> '1',
		'img'					=> '',
        'name'                  => '',
		'number'				=> '',
		'title'					=> '',
		'text'					=> '',
		'link'					=> '',
		'des_top'				=> '',
		'ourteam_content'		=> '',
		'social_type15_var'		=> '',
		'type15_social'			=> 'twitter',
		'type15_url'			=> '',
		'social'				=> '',		
		'first_social'			=> 'twitter',
		'first_url'				=> '',
		'second_social'			=> 'facebook',
		'second_url'			=> '',
		'third_social'			=> 'twitter',
		'third_url'				=> '',
		'fourth_social'			=> 'linkedin',
		'fourth_url'			=> '',
		'fifth_social'			=> 'vimeo',
		'fifth_url'				=> '',
		'thumbnail'				=> '',
		'ourteam_item_type9'	=> '',
		'ourteam_item_type10'	=> '',
		'shortcodeclass' 		=> '',
		'shortcodeid' 	 		=> '',
		'a_target' 	 			=> '',
	), $atts ) );
	
	wp_enqueue_style( 'wn-deep-our-team' . $type, DEEP_ASSETS_URL . 'css/frontend/our-team/our-team' . $type . '.css' );

	
	$this->type  = $type;

	add_action( 'wp_footer', function() use($type) {
		echo '<script>
		var element = document.getElementById("wn-deep-our-team'.$type.'-css");
		if(element && !deep_ourteam_styles["wn-deep-our-team'.$type.'-css"]) {
			deep_ourteam_styles["wn-deep-our-team'.$type.'-css"] = true;
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
	// if image is numeric, return image url
	$thumbnail_id 		= $img;
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id=' . $shortcodeid . '' : '';

	if( is_numeric( $img ) )
		$img = wp_get_attachment_url( $img );

	if( !empty( $thumbnail ) ) {
		if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
		}
		$patt = array ( '0'  => 'x', '1'  => '*' );
		$arr = explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) );
		$image = new Wn_Img_Maniuplate;
		$img = $image->m_image( $thumbnail_id, $img , $arr['0'] , $arr['1'] );
	}
	$thumbnail_url = wp_get_attachment_url($img);
	if( !empty( $thumbnail_url ) ) {
	  // if main class not exist get it
	  if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
	    require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
	  }
	  $image = new Wn_Img_Maniuplate; // instance from settor class
	  $thumbnail_url = $image->m_image( $thumbnail_url , '90' , '90' ); // set required and get result
	}

	// crop image if thumbnail type12 is set
	if( !empty( $thumbnail_id ) ) {
	  
	  // if main class not exist get it
	  if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
	  	require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
	  }
	  
		$image = new Wn_Img_Maniuplate; // instance from settor class
		$image_url_12 = $image->m_image($thumbnail_id, $img , '822' , '886' ); // set required and get result
	}

	// link
	$start_link = $a_tar = $end_link = ''; 
	if ( $a_target ) :
		$a_tar = 'target=_blank';
	endif;
	if ( $link ) :
		$start_link = '<a href="' . esc_url($link) . '" ' . esc_html( $a_tar ) . '>';
		$end_link 	= '</a>';
	endif;

	$ourteam_item_data_type9 = $ourteam_item_data_type10 = array();

	// Fetch Carousle Item Loop Variables
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		if ( $type == '9' ) :
			// ourteam_item_type9 loop
			$ourteam_item_type9		= (array) vc_param_group_parse_atts( $ourteam_item_type9 );
			foreach ( $ourteam_item_type9 as $data ) :
				if( isset( $data['ourteam_type9_image'] ) && is_numeric( $data['ourteam_type9_image'] ) )
					$data['ourteam_type9_image'] = wp_get_attachment_url( $data['ourteam_type9_image'] );
				$new_line = $data;
				$new_line['ourteam_type9_image']	= isset( $data['ourteam_type9_image'] )	? $data['ourteam_type9_image'] : '';
				$new_line['ourteam_type9_name']		= isset( $data['ourteam_type9_name']  )	? $data['ourteam_type9_name']  : '';
				$new_line['ourteam_type9_title']	= isset( $data['ourteam_type9_title'] )	? $data['ourteam_type9_title'] : '';
				$new_line['ourteam_type9_link']		= isset( $data['ourteam_type9_link']  )	? $data['ourteam_type9_link'] : '';
				$ourteam_item_data_type9[] = $new_line;
			endforeach;
		endif;

		if ( $type == '10' ) :
			// ourteam_item_type10 loop
			$ourteam_item_type10		= (array) vc_param_group_parse_atts( $ourteam_item_type10 );
			foreach ( $ourteam_item_type10 as $data ) {
				
				if( isset( $data['ourteam_type10_image'] ) && is_numeric( $data['ourteam_type10_image'] ) ) {
					$thumbnail_id = $data['ourteam_type10_image'];
					$data['ourteam_type10_image'] = wp_get_attachment_url( $data['ourteam_type10_image'] );
					// if main class not exist get it
				  	if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				    	require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				  	}
				  	$image = new Wn_Img_Maniuplate; // instance from settor class
				  	$thumbnail_url['ourteam_type10_image2'] = $image->m_image( $thumbnail_id , $data['ourteam_type10_image'] , '90' , '90' ); // set required and get result
				}

				$new_line = $data;
				$new_line['ourteam_type10_image2']	= isset( $thumbnail_url['ourteam_type10_image2'] )	? $thumbnail_url['ourteam_type10_image2'] : '';
				$new_line['ourteam_type10_name' ]	= isset( $data['ourteam_type10_name']  )	? $data['ourteam_type10_name']  : '';
				$new_line['ourteam_type10_title']	= isset( $data['ourteam_type10_title'] )	? $data['ourteam_type10_title'] : '';
				$new_line['ourteam_type10_content']	= isset( $data['ourteam_type10_content'] )	? $data['ourteam_type10_content'] : '';
				$new_line['ourteam_type10_social']	= isset( $data['ourteam_type10_social'] )	? $data['ourteam_type10_social'] : '';
				if( $new_line['ourteam_type10_social'] == 'enable' ) {
					$new_line['ourteam_type10_first_social']  = isset( $data['ourteam_type10_first_url'] ) ? '<a href="' . esc_url( $data['ourteam_type10_first_url'] )  . '" target="_blank"><i class="wn-fab wn-fa-' . $data['ourteam_type10_first_social']  . '"></i></a>' : '';
					$new_line['ourteam_type10_second_social'] = isset( $data['ourteam_type10_second_url'] ) ? '<a href="' . esc_url( $data['ourteam_type10_second_url'] )  . '" target="_blank"><i class="wn-fab wn-fa-' . $data['ourteam_type10_second_social']  . '"></i></a>' : '';
					$new_line['ourteam_type10_third_social']  = isset( $data['ourteam_type10_third_url'] ) ? '<a href="' . esc_url( $data['ourteam_type10_third_url'] )  . '" target="_blank"><i class="wn-fab wn-fa-' . $data['ourteam_type10_third_social']  . '"></i></a>' : '';
					$new_line['ourteam_type10_fourth_social'] = isset( $data['ourteam_type10_fourth_url'] ) ? '<a href="' . esc_url( $data['ourteam_type10_fourth_url'] )  . '" target="_blank"><i class="wn-fab wn-fa-' . $data['ourteam_type10_fourth_social']  . '"></i></a>' : '';
				}
				$ourteam_item_data_type10[] = $new_line;
			};
		endif;
	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
		if ( $type == '9' && (is_array($ourteam_item_type9) || is_object($ourteam_item_type9)) ) :
			// ourteam_item_type9 loop
			foreach( $atts['ourteam_item_type9'] as $key => $data ) :
				if( isset( $data->ourteam_type9_image ) && is_numeric( $data->ourteam_type9_image ) )
					$data->ourteam_type9_image = wp_get_attachment_url( $data->ourteam_type9_image );
				$new_line = $data;
				$new_line->ourteam_type9_image	= isset( $data->ourteam_type9_image )	? $data->ourteam_type9_image : '';
				$new_line->ourteam_type9_name		= isset( $data->ourteam_type9_name  )	? $data->ourteam_type9_name  : '';
				$new_line->ourteam_type9_title	= isset( $data->ourteam_type9_title )	? $data->ourteam_type9_title : '';
				$new_line->ourteam_type9_link		= isset( $data->ourteam_type9_link  )	? $data->ourteam_type9_link : '';
				$ourteam_item_data_type9[] = $new_line;
			endforeach;
		endif;

		if ( $type == '10' && (is_array($ourteam_item_type10) || is_object($ourteam_item_type10)) ) :
			// ourteam_item_type10 loop
			foreach( $atts['ourteam_item_type10'] as $key => $data ) {	
				if( isset( $data->ourteam_type10_image ) && is_numeric( $data->ourteam_type10_image ) ) {
					$data->ourteam_type10_image = wp_get_attachment_url( $data->ourteam_type10_image );
					// if main class not exist get it
				  	if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				    	require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				  	}
				  	$image = new Wn_Img_Maniuplate; // instance from settor class
				  	$thumbnail_url->ourteam_type10_image2 = $image->m_image( $img , $data->ourteam_type10_image , '90' , '90' ); // set required and get result
				}

				$new_line = $data;
				$new_line->ourteam_type10_image2	= isset( $thumbnail_url->ourteam_type10_image2 )	? $thumbnail_url->ourteam_type10_image2 : '';
				$new_line->ourteam_type10_name	= isset( $data->ourteam_type10_name  )	? $data->ourteam_type10_name  : '';
				$new_line->ourteam_type10_title	= isset( $data->ourteam_type10_title )	? $data->ourteam_type10_title : '';
				$new_line->ourteam_type10_content	= isset( $data->ourteam_type10_content )	? $data->ourteam_type10_content : '';
				$new_line->ourteam_type10_social	= isset( $data->ourteam_type10_social )	? $data->ourteam_type10_social : '';
				if( $new_line->ourteam_type10_social == 'enable' ) {
					$new_line->ourteam_type10_first_social  = isset( $data->ourteam_type10_first_url ) ? '<a href="' . esc_url( $data->ourteam_type10_first_url )  . '" target="_blank"><i class="wn-fab wn-fa-' . $data->ourteam_type10_first_social  . '"></i></a>' : '';
					$new_line->ourteam_type10_second_social = isset( $data->ourteam_type10_second_url ) ? '<a href="' . esc_url( $data->ourteam_type10_second_url )  . '" target="_blank"><i class="wn-fab wn-fa-' . $data->ourteam_type10_second_social  . '"></i></a>' : '';
					$new_line->ourteam_type10_third_social  = isset( $data->ourteam_type10_third_url ) ? '<a href="' . esc_url( $data->ourteam_type10_third_url )  . '" target="_blank"><i class="wn-fab wn-fa-' . $data->ourteam_type10_third_social  . '"></i></a>' : '';
					$new_line->ourteam_type10_fourth_social = isset( $data->ourteam_type10_fourth_url ) ? '<a href="' . esc_url( $data->ourteam_type10_fourth_url )  . '" target="_blank"><i class="wn-fab wn-fa-' . $data->ourteam_type10_fourth_social  . '"></i></a>' : '';
				}
				$ourteam_item_data_type10[] = $new_line;
			}
		endif;
	}

	
	 
	// socials
	$socials = '';
	if ( $social == 'enable' ) :
		$social1 = $social2 = $social3 = $social4 = $social5 = '';
		$social1 = ( $first_url )  ? '<a href="' . esc_url( $first_url ) . '" target="_blank"><i class="wn-fab wn-fa-' . $first_social  . '"></i></a>' : '';
		$social2 = ( $second_url ) ? '<a href="' . esc_url( $second_url ) . '" target="_blank"><i class="wn-fab wn-fa-' . $second_social . '"></i></a>' : '';
		$social3 = ( $third_url )  ? '<a href="' . esc_url( $third_url )  . '" target="_blank"><i class="wn-fab wn-fa-' . $third_social  . '"></i></a>' : '';
		$social4 = ( $fourth_url ) ? '<a href="' . esc_url( $fourth_url ) . '" target="_blank"><i class="wn-fab wn-fa-' . $fourth_social . '"></i></a>' : '';
		$social5 = ( $fifth_url )  ? '<a href="' . esc_url( $fifth_url )  . '" target="_blank"><i class="wn-fab wn-fa-' . $fifth_social  . '"></i></a>' : '';
		$socials = '<div class="social-team">' . $social1 . $social2 . $social3 . $social4 . $social5 . '</div>';
	endif; 

	// socials
	$name_socials = '';
	if ( $social == 'enable' ) :
		$social1 = $social2 = $social3 = $social4 = $social5 = '';
		$social1 = ( $first_url )  ? '<a href="' . esc_url( $first_url ) . '" target="_blank">  ' . $first_social  . ' </a>' : '';
		$social2 = ( $second_url ) ? '<a href="' . esc_url( $second_url ) . '" target="_blank"> ' . $second_social . ' </a>' : '';
		$social3 = ( $third_url )  ? '<a href="' . esc_url( $third_url )  . '" target="_blank"> ' . $third_social  . ' </a>' : '';
		$social4 = ( $fourth_url ) ? '<a href="' . esc_url( $fourth_url ) . '" target="_blank"> ' . $fourth_social . ' </a>' : '';
		$social5 = ( $fifth_url )  ? '<a href="' . esc_url( $fifth_url )  . '" target="_blank"> ' . $fifth_social  . ' </a>' : '';
		$name_socials = '<div class="social-ourteam first">' . $social1 . $social2 . '</div><div class="social-ourteam">' . $social3 . $social4 . '</div><div class="social-ourteam">' . $social5 . '</div>';
	endif; 

	// render content
	$out = '';
	switch ( $type ) :
		case '3':
			$out .= '
			<article class="our-team3 clearfix ' . $shortcodeclass . '"  ' . esc_attr( $shortcodeid ) . '>
				<figure>
					<img src="' . esc_url( $img ) . '" alt="' . esc_html( $name ) . '">
				</figure>
				<div class="tdetail">
					' . $start_link . '
						<h2>' . esc_html( $name ) . '</h2>
						<h5>' . esc_html( $title ) . '</h5>
					' . $end_link . '
					' . $socials . '
				</div>
			</article>';
		break;
		case '7':
			$out .= '
				<article class="our-team7 ' . $shortcodeclass . '"  ' . esc_attr( $shortcodeid ) . '>
					<figure>
						<img src="' . esc_url( $img ) . '" alt="' . esc_html( $name ) . '">
						<figcaption>
							' . $start_link . '
								<h2>' . esc_html( $name ) . '</h2>
								<h5>' . esc_html( $title ) . '</h5>
								<p> ' . $ourteam_content . ' </p>
							' . $end_link . '
						</figcaption>
					</figure>
					<div class="hover-item7">
						' . $socials . '
					</div>
				</article>';
		break;
		case '8':
			if ( $des_top == 'enable'){
			$out .='
				<article class="our-team8 top ' . $shortcodeclass . '"  ' . esc_attr( $shortcodeid ) . '>
					'.$start_link.'
					<div class="tdetail">
							<h2>' . esc_html( $name ) . '</h2>
							<h5>' . esc_html( $title ) . '</h5>
					</div>
					<figure>
						<img src="' . esc_url( $img ) . '" alt="' . esc_html( $name ) . '">
					</figure>
					'.$end_link.'
				</article>';
			} else {
			$out .= '
				<article class="our-team8 ' . $shortcodeclass . '"  ' . esc_attr( $shortcodeid ) . '>
					'.$start_link.'
					<figure>
						<img src="' . esc_url( $img ) . '" alt="' . esc_html( $name ) . '">
					</figure>
					<div class="tdetail">
							<h2>' . esc_html( $name ) . '</h2>
							<h5>' . esc_html( $title ) . '</h5>
					</div>
					'.$end_link.'
				</article>';
			}
		break;
		case '9':
			$out .='
				<article class="ourteam-owl-carousel-type9 owl-carousel owl-theme ' . $shortcodeclass . '"  ' . esc_attr( $shortcodeid ) . '>';
				if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
					foreach ( $ourteam_item_data_type9 as $line ) :
						$out .= '
							<div class="ourteam-item">
								<figure>
									<img src="' . $line['ourteam_type9_image'] . '"  alt="' . $line['ourteam_type9_name'] . '">
								</figure>
								<div class="tdetail">
									<h2 class="colorf">' . $line['ourteam_type9_name'] . '</h2>
									<h5>' . $line['ourteam_type9_title'] . '</h5>
								</div>
							</div>';	
					endforeach;
				} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
					foreach ( $ourteam_item_data_type9 as $line ) :
						$out .= '
							<div class="ourteam-item">
								<figure>
									<img src="' . $line->ourteam_type9_image . '"  alt="' . $line->ourteam_type9_name . '">
								</figure>
								<div class="tdetail">
									<h2 class="colorf">' . $line->ourteam_type9_name . '</h2>
									<h5>' . $line->ourteam_type9_title . '</h5>
								</div>
							</div>';	
					endforeach;
				}
		$out .='</article>';
		break;
		case '10':
			$out .='
			<div class="clearfix">
				<div class="col-md-10">
					<article class="ourteam-owl-carousel-type10 owl-carousel owl-theme ' . $shortcodeclass . '"  ' . esc_attr( $shortcodeid ) . '>';
					if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
						foreach ( $ourteam_item_data_type10 as $line ) :
							$out .= '
								<div class="ourteam-item">
									<figure>
										<img src="' . $line['ourteam_type10_image2'] . '"  alt="' . $line['ourteam_type10_name'] . '">
									</figure>
									<div class="t-detail">
										<h2>' . $line['ourteam_type10_name'] . '</h2>
										<h5>' . $line['ourteam_type10_title'] . '</h5>
									</div>
									<div class="t-content">
										<p>' . $line['ourteam_type10_content'] . '</p>
									</div>
									<div class="t-footer">
									' . $line['ourteam_type10_fourth_social'] . '
									' . $line['ourteam_type10_third_social']  . '
									' . $line['ourteam_type10_second_social'] . '
									' . $line['ourteam_type10_first_social']  . '
									</div>
								</div>';	
						endforeach;
					} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
						foreach ( $ourteam_item_data_type10 as $line ) :
							$out .= '
								<div class="ourteam-item">
									<figure>
										<img src="' . $line->ourteam_type10_image2 . '"  alt="' . $line->ourteam_type10_name . '">
									</figure>
									<div class="t-detail">
										<h2>' . $line->ourteam_type10_name . '</h2>
										<h5>' . $line->ourteam_type10_title . '</h5>
									</div>
									<div class="t-content">
										<p>' . $line->ourteam_type10_content . '</p>
									</div>
									<div class="t-footer">
										' . $line->ourteam_type10_fourth_social . '
										' . $line->ourteam_type10_third_social  . '
										' . $line->ourteam_type10_second_social . '
										' . $line->ourteam_type10_first_social  . '
									</div>
								</div>';	
						endforeach;
					}
					$out .='</article>
				</div>
				<div class="col-md-2"></div>
			</div>';
		break;
		case '11':
			$out .= '
			<article class="our-team11 ' . $shortcodeclass . '"  ' . esc_attr( $shortcodeid ) . '>
				<div class="img-box">
					<img src="' . esc_url( $img ) . '" alt="' . esc_html( $name ) . '">
				</div>
				<div class="content-box">
					<div class="name-box">
						<span class="grayline"></span>
						<h4 class="colorb">' . esc_html( $name ) . '</h4>
					</div>
					<div class="bottom">
						<h6 class="colorf">' . esc_html( $title ) . '</h6>
						<p> ' . $ourteam_content . ' </p>
					</div>
				</div>
			</article>';
		break;
		case '12':
			$out .= '
			<article class="our-team12 ' . $shortcodeclass . '"  ' . esc_attr( $shortcodeid ) . '>
				<div class="img-box">
					<img src="' . esc_url( $image_url_12 ) . '" alt="' . esc_html( $title ) . '">
				</div>
				<div class="content-box colorb">
				<span class="thisline"></span>
					<h1>' . esc_html( $title ) . '</h1>
					<p> ' . $ourteam_content . ' </p>
						' . $name_socials . ' 
				</div>
			</article>';
		break;
        case '13':
            $out .= '
            <article class="our-team13 ' . $shortcodeclass . '"  ' . esc_attr( $shortcodeid ) . '>
                <img src="' . esc_url( $image_url_12 ) . '" alt="' . esc_html( $title ) . '">
                <span class="our-team-hover"></span>
                <span class="our-team-num">' . $number . '</span>
                <div class="content-box">
                    <h3 class="our-team-name colorf">' . esc_html( $name ) . '</h3>
                    <p class="our-team-title"> ' . $title . ' </p>
                    <div class="our-team-socail">   ' . $socials . ' </div>
                </div>
            </article>';
        break;
        case '14':
            $out .= '
            <article class="our-team14 ' . $shortcodeclass . '"  ' . esc_attr( $shortcodeid ) . '>
                <img src="' . esc_url( $img ) . '" alt="' . esc_html( $title ) . '">
                <div class="content-box">
                    <h3 class="our-team-name">' . esc_html( $name ) . '</h3>
                    <p class="our-team-title"> ' . $title . ' </p>
                    <div class="our-team-socail">   ' . $socials . ' </div>
                </div>
            </article>';
        break;
        case '15':

			$social1 = '';

			if ( $social_type15_var == 'enable' ) {
				if (!empty($type15_url)) {
					$social1 = '<a href="' . esc_url( $type15_url ) . '" target="_blank"><i class="wn-fab wn-fa-' . $type15_social . '"></i></a>';
				} else {
					$social1 = '<i class="wn-fab wn-fa-' . $type15_social . '"></i>';
				}
			}
		
			$type15_social = $social_type15_var ? '<div class="social-team ' . $type15_social . '">' . $social1 . '</div>' : '';
			
			$out .= '
			<article class="our-team15 ' . esc_attr( $shortcodeclass ) . '"  ' . esc_attr( $shortcodeid ) . '>
				<figure>
					<div class="img-wrapper">
						<img src="' . esc_url( $img ) . '" alt="' . esc_html( $name ) . '">
						' . wp_kses( $type15_social, wp_kses_allowed_html('post') ) . '
					</div>
					<figcaption>
						<h2>' . esc_html( $name ) . '</h2>
						<h5>' . esc_html( $title ) . '</h5>
					</figcaption>
				</figure>
			</article>';        

		break;
		case '16':
			$out .= '
			<article class="our-team16 ' . $shortcodeclass . '"  ' . $shortcodeid . '>
				<img src="' . esc_url( $img ) . '" alt="' . esc_html( $title ) . '">
				<div class="content-box">
					<h3 class="our-team-name">' . esc_html( $name ) . '</h3>
					<p class="our-team-title"> ' . $title . ' </p>
					<div class="our-team16-share">
					<i class="sl-share hcolorf"></i>
					<div class="our-team16-socail">' . $socials . '</div>
					</div>						
				</div>
			</article>';
		break;
		// other types
		default:
			// description text
			$text = ( $text && $type == '6' ) ? '<p>' . esc_html( $text ) . '</p>' : '';
			$out .= '
			<article class="our-team' . $type . ' ' . $shortcodeclass . '"  ' . esc_attr( $shortcodeid ) . '>
				<figure>
					<img src="' . esc_url( $img ) . '" alt="' . esc_html( $name ) . '">
					' . $start_link . '
						<figcaption>
							<h2>' . esc_html( $name ) . '</h2>
							<h5>' . esc_html( $title ) . '</h5>
						</figcaption>
					' . $end_link . '
				</figure>
				' . $text . '
				' . $socials . '
			</article>';	
		break;
	endswitch;

	return $out;
}

/**
* Required scripts.
*
* @since   1.0.0
*/
public function scripts() {
	if ( self::used_shortcode_in_page( 'ourteam' ) ) {			
		wp_enqueue_style( 'wn-deep-our-team0', DEEP_ASSETS_URL . 'css/frontend/our-team/our-team0.css' );
	}
}
} DeepWPBakeryOurTeam::get_instance();

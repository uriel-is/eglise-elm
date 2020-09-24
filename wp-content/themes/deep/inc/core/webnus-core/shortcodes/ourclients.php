<?php
class DeepWPBakeryOurClients extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryOurClients
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
		add_shortcode( 'ourclients', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {	
		extract(shortcode_atts(array(
			'type'				=> '1',
			'client_images'		=> '',
			'image_filter'		=> '',
			'thumbnail'			=> '',
			'show_text'			=> '',
			'pre_txt'			=> 'Pre',
			'next_txt'			=> 'Next',
			'shortcodeclass'	=> '',
			'shortcodeid' 	 	=> '',
			'image_width' 	 	=> '100',
			'image_height' 	 	=> '100',
		), $attributes) );
		
		$images_filter = '';
		if ( $image_filter == 'enable' ) {
			$images_filter = 'class="wn-gray-filter"';
		}

		$show_text = ( ! empty($show_text) ) ? "ourclient6-nav-show" : '';
		
		// Class & ID 
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
		$client_images_url = '';
		$client_images_url2 = '';
		if( !empty( $client_images ) ) {
			$images_id_array = array();
			$images_id_array = explode( ',',$client_images );
			foreach( $images_id_array as $id ) {
				$link			= get_post($id)->post_content;
				$alt_text		= get_post_meta($id, '_wp_attachment_image_alt', true);
				$img			= wp_get_attachment_url( $id );

				$thumbnail_url = wp_get_attachment_url( $id );
				$thumbnail_id  = $id;

				if ( !empty($image_width) && !empty($image_height) ) {
					if( !empty( $thumbnail_url ) ) {
						// if main class not exist get it
						if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
							require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
						}
						$image = new Wn_Img_Maniuplate; // instance from settor class
						$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , $image_width , $image_height ); // set required and get result
					}
				}

				if( empty( $link ) ) {
					$client_images_url .= '
						<div class="our-client-item">
							<img alt="'.$alt_text.'" src="' .$thumbnail_url . '" '.$images_filter.'>
						</div>';
					$client_images_url2 .= '
						<div class="our-clients-item-t'.$type.'">
							<img alt="'.$alt_text.'" src="' .$thumbnail_url . '" '.$images_filter.'>
						</div>';
				} else {
					$client_images_url .= '
						<div class="our-client-item">
							<a target="_blank" href="' . esc_url( $link ) . '">
								<img alt="' . $alt_text . '"  src="' . $thumbnail_url . '" ' . $images_filter . '>
							</a>
						</div>';
					$client_images_url2 .= '
						<div class="our-clients-item-t' . $type . '">
							<a href="' . esc_url( $link ) . '">
								<img alt="'.$alt_text.'" src="' .$thumbnail_url . '" ' . $images_filter . '>
							</a>
						</div>';
				} 
			}
		}

		$out = '';
		if ( $type == 1 || $type == 2 ) {
			$out .= '<div class="aligncenter ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
			$out .= '<hr class="vertical-space1"><div class="col-md-12 our-clients-wrap">';
			$out .= '<div id="our-clients" class="our-clients ';
			if ( $type == 2 ) {
				$out .= 'owl-carousel owl-theme our-clients-wrap-carousel';
			}
			$out .= '">';
			$out .= $client_images_url;
			$out .='</div>';
			$out .= '</div><hr class="vertical-space2"></div>';
		} elseif( $type == 4 ) {
			$out .= '<div class="our-clients-type4 our-clients-wrap ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
			$out .= '<div class="center">';
			$out .= $client_images_url;  
			$out .= '</div>';
			$out .= '</div>';   
		} elseif( $type == 5 ) {
			$out  = '<div class="our-clients-wrap our-clients-type5 owl-carousel owl-theme ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
			$out .= $client_images_url2;     
			$out .= '</div>';
		} elseif( $type == 6 ) {
			$out .= '<div class="our-clients-wrap our-clients-type6 owl-carousel owl-theme '. $show_text .' ' . $shortcodeclass . '"  ' . $shortcodeid . ' data-next="' . $next_txt . '" data-pre="' . $pre_txt . '">';
			$out .= $client_images_url2;  
			$out .= '</div>';   
		}
		return $out;	
	}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'ourclients' ) ) {
			wp_enqueue_style( 'wn-deep-our-clients', DEEP_ASSETS_URL . 'css/frontend/our-clients/our-clients.css' );
		}
	}

} DeepWPBakeryOurClients::get_instance();

// function deep_client($attributes, $content){
// 	extract(shortcode_atts(array(
// 		"img" => '',
// 		"img_alt" => '',
// 	), $attributes));

// 	return !empty($img)?'<li><img src="'.$img.'" alt="'.$img_alt.'"></li>':'';
// }
// add_shortcode("client", "deep_client");
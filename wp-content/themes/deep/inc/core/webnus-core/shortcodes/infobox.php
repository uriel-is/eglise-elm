<?php
class DeepWPBakeryInfobox extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryInfobox
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
		add_shortcode( 'infobox', array( $this, 'output' ) );
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
			'setup'		  		=> '',
			'featured'			=> '',
			'url'				=> '',
			'branch'			=> '',
			'phone'		  		=> '',
			'mail' 				=> '',
			'startofday' 		=> '',
			'time'  			=> '',
			'endofday' 			=> '',
			'ib_color' 			=> '#242524',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
		), $atts));	

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	static $uniqid = 0;
	$uniqid++;
	$live_page_builders_css  	= '';
	$ib_color 					= isset( $ib_color ) ? $ib_color:'';
	$ib_color_set 				= isset( $ib_color ) ? '.infoboxcolor-' . $uniqid . ' { color :'. $ib_color .';} ':'';
	$featured					= isset( $featured ) ? $featured : '';
	$url						= isset( $url ) ? $url : '';
	$out = $output = '';
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			$setup = (array) vc_param_group_parse_atts( $setup );
			foreach ( $setup as $data ) :
				$new_line 				= $data;
				$new_line['branch'] 	= isset( $data['branch'] ) ? $data['branch'] : '';
				$new_line['phone'] 		= isset( $data['phone'] ) ? $data['phone'] : '';
				$new_line['mail'] 		= isset( $data['mail'] ) ? $data['mail'] : '';
				$new_line['startofday'] = isset( $data['startofday'] ) ? $data['startofday'] : '';
				$new_line['time'] 		= isset( $data['time'] ) ? $data['time'] : '';
				$new_line['endofday'] 	= isset( $data['endofday'] ) ? $data['endofday'] : '';
				$setup_data[] 			= $new_line;
			endforeach;
		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && (is_array($setup) || is_object($setup)) ) {

			foreach( $atts['setup'] as $key => $item ){
				$new_line 			= $item;
				$new_line->branch 	= isset( $new_line->branch ) ? $new_line->branch: '';
				$new_line->phone 	= isset( $new_line->phone ) ? $new_line->phone: '';
				$new_line->mail 	= isset( $new_line->mail ) ? $new_line->mail: '';
				$new_line->startofday 	= isset( $new_line->startofday ) ? $new_line->startofday: '';
				$new_line->time 	= isset( $new_line->time ) ? $new_line->time: '';
				$new_line->endofday 	= isset( $new_line->endofday ) ? $new_line->endofday: '';
				$setup_data[]	= $new_line;
			}

		}

		$out .= '<div class="infobox infoboxcolor-' . $uniqid . ' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			$out .= '<select class="wn-niceselect infoselect infoboxcolor-' . $uniqid . '">';
			$i = 1;
			if ( isset( $setup_data ) ) {

				foreach ( $setup_data as $line ) :
					$out .= '<option value="' . $line['branch'] . '" class="select-' . $i++ . '">' . $line['branch'] . '</option>';
				endforeach;

			
				$out .= '</select>';
				$out .= '<div class="showbox">';
				foreach ( $setup_data as $line ) :
					$out .= '<div  id="' . $line['branch'] . '" class="info type-'. $line['branch'] . '">
								<div class="img"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve"><g><path fill="none" stroke="'. $ib_color .'" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M33.477,17.5c0,8.693-7.156,15.74-15.977,15.74c-8.827,0-15.977-7.047-15.977-15.74S8.673,1.76,17.5,1.76 C26.321,1.76,33.477,8.807,33.477,17.5z"/><line fill="none" stroke="'. $ib_color .'" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="25.836" y1="25.712" x2="18.968" y2="18.949"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M19.584,17.5c0,1.133-0.936,2.053-2.084,2.053c-1.153,0-2.084-0.919-2.084-2.053c0-1.133,0.931-2.053,2.084-2.053 C18.648,15.447,19.584,16.367,19.584,17.5z"/><line fill="none" stroke="'. $ib_color .'" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="16.805" y1="9.972" x2="16.805" y2="15.561"/></g></svg></div>
								<div class="timebox">
									<span class="time">' . $line['time'] . '</span>
									<span class="weekday">' . $line['startofday'] . ' ' . esc_html__('to', 'deep') . ' ' . $line['endofday'] . '</span>
								</div>
								<div class="img"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve"><g><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M4.152,21.713c-1.552,0-2.81-1.241-2.81-2.771c0-1.531,1.258-2.771,2.81-2.771"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M21.013,31.413h2.81c2.717,0,4.918-1.478,4.918-4.157V25.78"/><ellipse fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="18.905" cy="31.413" rx="2.108" ry="2.079"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M9.772,25.87h-2.81c-1.552,0-2.81-1.241-2.81-2.771v-8.314c0-1.531,1.258-2.771,2.81-2.771h2.81V25.87z"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M30.848,21.713c1.552,0,2.81-1.241,2.81-2.771c0-1.531-1.258-2.771-2.81-2.771"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M25.228,25.87h2.81c1.552,0,2.81-1.241,2.81-2.771v-8.314c0-1.531-1.258-2.771-2.81-2.771h-2.81V25.87z"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linejoin="round" stroke-miterlimit="10" d="M7.664,12.012	c0-5.357,4.403-9.7,9.835-9.7c5.431,0,9.835,4.343,9.835,9.7"/></g></svg></div>
								<div class="callbox">
									<span class="phone">' . $line['phone'] . '</span>
									<span class="mail">' . $line['mail'] . '</span>
								</div>
							</div>';
				endforeach;
				$out .= '</div>';
			}
				
		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
			$out .= '<select class="wn-niceselect infoselect infoboxcolor-' . $uniqid . '">';
			$i = 1;
			foreach ( $setup_data as $line ) :
				$out .= '<option value="' . $line->branch . '" class="select-' . $i++ . '">' . $line->branch . '</option>';
			endforeach;
			$out .= '</select>';
			$out .= '<div class="showbox">';
			foreach ( $setup_data as $line ) :
				$out .= '<div  id="' . $line->branch . '" class="info type-'. $line->branch . '">
							<div class="img"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve"><g><path fill="none" stroke="'. $ib_color .'" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M33.477,17.5c0,8.693-7.156,15.74-15.977,15.74c-8.827,0-15.977-7.047-15.977-15.74S8.673,1.76,17.5,1.76 C26.321,1.76,33.477,8.807,33.477,17.5z"/><line fill="none" stroke="'. $ib_color .'" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="25.836" y1="25.712" x2="18.968" y2="18.949"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M19.584,17.5c0,1.133-0.936,2.053-2.084,2.053c-1.153,0-2.084-0.919-2.084-2.053c0-1.133,0.931-2.053,2.084-2.053 C18.648,15.447,19.584,16.367,19.584,17.5z"/><line fill="none" stroke="'. $ib_color .'" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="16.805" y1="9.972" x2="16.805" y2="15.561"/></g></svg></div>
							<div class="timebox">
								<span class="time">' . $line->time . '</span>
								<span class="weekday">' . $line->startofday . ' ' . esc_html__('to', 'deep') . ' ' . $line->endofday . '</span>
							</div>
							<div class="img"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve"><g><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M4.152,21.713c-1.552,0-2.81-1.241-2.81-2.771c0-1.531,1.258-2.771,2.81-2.771"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M21.013,31.413h2.81c2.717,0,4.918-1.478,4.918-4.157V25.78"/><ellipse fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="18.905" cy="31.413" rx="2.108" ry="2.079"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M9.772,25.87h-2.81c-1.552,0-2.81-1.241-2.81-2.771v-8.314c0-1.531,1.258-2.771,2.81-2.771h2.81V25.87z"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M30.848,21.713c1.552,0,2.81-1.241,2.81-2.771c0-1.531-1.258-2.771-2.81-2.771"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M25.228,25.87h2.81c1.552,0,2.81-1.241,2.81-2.771v-8.314c0-1.531-1.258-2.771-2.81-2.771h-2.81V25.87z"/><path fill="none" stroke="'. $ib_color .'" stroke-width="2" stroke-linejoin="round" stroke-miterlimit="10" d="M7.664,12.012	c0-5.357,4.403-9.7,9.835-9.7c5.431,0,9.835,4.343,9.835,9.7"/></g></svg></div>
							<div class="callbox">
								<span class="phone">' . $line->phone . '</span>
								<span class="mail">' . $line->mail . '</span>
							</div>
						</div>';
			endforeach;
			$out .= '</div>';
		}
			$out .= '<div class="button-box">
						<div class="featured-text infoboxcolor-' . $uniqid . '">' . $featured . '</div>
						<a href="' . $url . '" class="button rounded small colorb">' . esc_html__('contact us today', 'deep' ) . '</a>
					</div>';
		$out .= '</div>';
		deep_save_dyn_styles( $ib_color_set );
		$live_page_builders_css .= $ib_color_set;

		// live editor
		if ( ! in_array( 'admin-bar', get_body_class() ) ) {

			if ( ! empty( $live_page_builders_css ) ) {

				$output .= '<style>';
					$output .= $live_page_builders_css;
				$output .= '</style>';

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
		if ( self::used_shortcode_in_page( 'infobox' ) ) {
			wp_enqueue_style( 'wn-deep-nice-select', DEEP_ASSETS_URL . 'css/libraries/nice-select.css' );
			wp_enqueue_style( 'wn-deep-info-box', DEEP_ASSETS_URL . 'css/frontend/info-box/info-box.css' );
		}
	}

} DeepWPBakeryInfobox::get_instance();

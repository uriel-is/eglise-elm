<?php
class DeepWPBakeryCollection extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryCollection
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
		add_shortcode( 'collection', array( $this, 'output' ) );
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
			'title'				=> '',
			'image'				=> '',
			'image_top_bottom'	=> 'top',
			'image_left_right'	=> 'right',
			'year'				=> '',
			'brands'			=> '',
			'c_content'			=> '',
			'link_title'		=> '',
			'link_href'			=> '',
			'link_target'		=> '',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
		), $atts ));
		
		add_action( 'wp_enqueue_scripts', 'deep-collection' );

		$link_target_tag = '';
		if ( $link_target == 'true' ){
			$link_target_tag = ' target="_blank" ';
		}
		
		// Class & ID 
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
		$image_alt			= $title;
		$title  			= ( $title ) ? '<div class="collection-title wn-animation-run"><span class="before"></span><h3>'.$title.'</h3><span class="after"></span></div>' : '' ;
		$year 				= ( $year ) ? '<div class="collection-year"><span>'.$year.'</span></div>' : '' ;
		$brands 			= ( $brands ) ? '<div class="collection-brands colorf"><span>'.$brands.'</span></div>' : '' ;
		$c_content 			= ( $c_content ) ? '<div class="collection-content"><p>'.$c_content.'</p></div>' : '' ;
		$link_href 			= ( $link_href ) ? $link_href : '' ;
		$link_title 		= ( $link_title ) ? '<div class="collection-link"><a class="colorf button" href="'.$link_href.'" '.$link_target_tag.'><span>'.$link_title.'</span></a></div>' : '' ;
		$image_url			= isset( $image_url ) ? $image_url : '';
		if( is_numeric( $image ) ){
			$image_url = wp_get_attachment_url( $image );
				// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			}
			$image_class = new Wn_Img_Maniuplate; // instance from settor class
			$image_url = $image_class->m_image( $image , $image_url , '365' , '415' ); // set required and get result
		}
		$image_url = ( $image_url ) ? '<div class="collection-img"><img src="'.$image_url.'" alt="' . $image_alt . '"></div>' : '' ;

		$out = '<div class="wn-collections type-'.$image_top_bottom.'-'.$image_left_right.' ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
		$out.= $image_url;
		if ( $image_top_bottom == 'top' && $image_left_right == 'right' ){
			$out .= '
				<div class="collection-year-brands">
					<div class="clearfix">
						<div class="col-lg-6 col-md-7 col-sm-9 col-xs-6">' . $year . $brands . '</div>
						<div class="col-md-5"></div>
					</div>
				</div>
				<div class="collection-meta">
					<div class="clearfix">
						<div class="col-md-6 col-sm-12">'.$title.'</div>
						<div class="col-md-6 col-sm-12"></div>
					</div>
					<div class="clearfix collection-content-wrap">
						<div class="col-md-12">'.$c_content.'</div>
					</div>
					<div class="clearfix collection-button">
						<div class="col-md-12">'.$link_title.'</div>
					</div>
				</div>
			';
		} elseif ( $image_top_bottom == 'top' && $image_left_right == 'left' ) {
			$out .= '
				<div class="collection-year-brands">
					<div class="clearfix">
						<div class="col-md-6 col-sm-6 col-xs-6"></div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">' . $year . $brands . '</div>
					</div>
				</div>
				<div class="collection-meta">
					<div class="clearfix">
						<div class="col-md-6 col-sm-12 col-xs-12"></div>
						<div class="col-md-6 col-sm-12 col-xs-12">'.$title.'</div>
					</div>
					<div class="clearfix collection-content-wrap">
						<div class="col-md-6 col-sm-12 col-xs-12"></div>
						<div class="col-md-6 col-sm-12 col-xs-12">'.$c_content.'</div>
					</div>
					<div class="clearfix collection-button">
						<div class="col-md-6 col-sm-12 col-xs-12"></div>
						<div class="col-md-6 col-sm-12 col-xs-12">'.$link_title.'</div>
					</div>
				</div>
			';
		} elseif ( ( $image_top_bottom == 'bottom' && $image_left_right == 'left' ) ) {
			$out .= '
				<div class="collection-meta">
					'.$title.'
					'.$c_content.'
					'.$link_title.'
				</div>
				<div class="collection-year-brands">
					<div class="clearfix">
						<div class="col-md-6 col-sm-5 col-xs-6"></div>
						<div class="col-lg-6 col-md-6 col-sm-7 col-xs-6">' . $year . $brands . '</div>
					</div>
				</div>
			';
		} elseif ( $image_top_bottom == 'bottom' && $image_left_right == 'right' ) {
			$out .= '
				<div class="collection-meta">
					'.$title.'
					'.$c_content.'
					'.$link_title.'
				</div>
				<div class="collection-year-brands">
					<div class="clearfix">
						<div class="col-lg-6 col-md-6 col-sm-7 col-xs-6">' . $year . $brands . '</div>
						<div class="col-md-6 col-sm-5 col-xs-6"></div>
					</div>
				</div>
			';
		}
		$out .= '</div>';
		return $out;
	}	

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'collection' ) ) {
			wp_enqueue_style( 'wn-deep-collection', DEEP_ASSETS_URL . 'css/frontend/collection/collection.css' );
		}
	}

} DeepWPBakeryCollection::get_instance();
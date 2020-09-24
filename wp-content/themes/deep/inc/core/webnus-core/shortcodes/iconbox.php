<?php
class DeepWPBakeryIconBox extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryIconBox
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
		add_shortcode( 'iconbox', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );			
		add_action( 'wp_head', function() {
			echo '<script>var deep_iconBox_styles = {}; </script>';
		});
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {		
		extract(shortcode_atts(array(		
			'type'									=> '',
			'tilteffect'							=> '',
			'iconbox_color_type'					=> 'iconbox-solid-color',
			'iconbox_grad_color_1'					=> '',
			'iconbox_grad_color_2'					=> '',
			'iconbox_grad_color_3'					=> '',
			'iconbox_grad_color_4'					=> '',
			'iconbox_grad_direction'				=> '',
			'background_color'						=> '',
			'iconbox_color_type_hover'				=> 'iconbox-solid-color_hover',
			'iconbox_grad_color_1_hover'			=> '',
			'iconbox_grad_color_2_hover'			=> '',
			'iconbox_grad_color_3_hover'			=> '',
			'iconbox_grad_color_4_hover'			=> '',
			'iconbox_grad_direction_hover'			=> '',
			'background_color_hover'				=> '',
			'icon_title'							=> '',
			'icon_link_url'							=> '',
			'icon_link_text'						=> '',
			'icon_name'								=> '',
			'iconbox_content'						=> '',
			'iconbox_content_size'					=> '',
			'icon_size'								=> '',
			'icon_bg'								=> '',
			'icon_color'							=> '',
			'title_color_type'						=> 'title-solid-color',
			'title_color'							=> '',
			'title_grad_color_1'					=> '',
			'title_grad_color_2'					=> '',
			'title_grad_color_3'					=> '',
			'title_grad_color_4'					=> '',
			'title_grad_direction'					=> '',
			'title_color_type_hover'				=> 'title-solid-color_hover',
			'title_color_hover'						=> '',
			'title_grad_color_1_hover'				=> '',
			'title_grad_color_2_hover'				=> '',
			'title_grad_color_3_hover'				=> '',
			'title_grad_color_4_hover'				=> '',
			'title_grad_direction_hover'			=> '',

			'icon_color_type'						=> 'icon-solid-color',
			'icon_color'							=> '',
			'icon_grad_color_1'						=> '',
			'icon_grad_color_2'						=> '',
			'icon_grad_color_3'						=> '',
			'icon_grad_color_4'						=> '',
			'icon_grad_direction'					=> '',

			'icon_color_type_hover'					=> 'icon-solid-color_hover',
			'icon_color_hover'						=> '',
			'icon_grad_color_1_hover'				=> '',
			'icon_grad_color_2_hover'				=> '',
			'icon_grad_color_3_hover'				=> '',
			'icon_grad_color_4_hover'				=> '',
			'icon_grad_direction_hover'				=> '',

			'content_color'							=> '',
			'content_color_hover'					=> '',
			'link_color'							=> '',
			'icon_image'							=> '',
			'featured'								=> '',
			'border_left'							=> '',
			'border_right'							=> '',
			'icon_subtitle'							=> '',
			'min_height'							=> '',
			'align'									=> '',
			'thumbnail'								=> '',
			'bg_img_pos'							=> '',
			'background_image'						=> '',
			'aligncenter'							=> '', 	
			'link_target'							=> '',
			'icon_or_image'							=> 'icon',
			'icon_link_align'						=> '',
			'side_by_side_title_icon'				=> '',
			
			// iconbox
			'pad_top'								=> '',
			'pad_right'								=> '',
			'pad_bottom'							=> '',
			'pad_left'								=> '',
			'marg_top'								=> '',
			'marg_right'							=> '',
			'marg_bottom'							=> '',
			'marg_left'								=> '',
			'icon_box_border'						=> '',
			'iconbox_bord_top'						=> '',
			'iconbox_bord_right'					=> '',
			'iconbox_bord_bottom'					=> '',
			'iconbox_bord_left'						=> '',
			'iconbox_border_color'					=> '',
			'iconbox_bord_top_left_radius'			=> '',
			'iconbox_bord_top_right_radius'			=> '',
			'iconbox_bord_bottom_left_radius'		=> '',
			'iconbox_bord_bottom_right_radius'		=> '',
			'shadow_left'							=> '',
			'shadow_top'							=> '',
			'shadow_blur'							=> '',
			'shadow_spread'							=> '',
			'shadow_status'							=> '',
			'shadow_color'							=> '',
			'box_linkable'							=> '',
			'title_linkable'						=> '',
			
			// title
			'title_pad_top'							=> '',
			'title_pad_right'						=> '',
			'title_pad_bottom'						=> '',
			'title_pad_left'						=> '',
			'title_marg_top'						=> '',
			'title_marg_right'						=> '',
			'title_marg_bottom'						=> '',
			'title_marg_left'						=> '',
			'icon_title_align'						=> '',
			'icon_title_font_size'					=> '',
			'icon_title_font_style'					=> '',
			'icon_title_font_weight'				=> '',
			'icon_title_border'						=> '',
			'title_bord_top'						=> '',
			'title_bord_right'						=> '',
			'title_bord_bottom'						=> '',
			'title_bord_left'						=> '',
			'title_bord_top_left_radius'			=> '',
			'title_bord_top_right_radius'			=> '',
			'title_bord_bottom_left_radius'			=> '',
			'title_bord_bottom_right_radius'		=> '',
			'title_title_color'						=> '',
			'title_border_color'					=> '',
			
			// subtitle
			'subtitle_pad_top'						=> '',
			'subtitle_pad_right'					=> '',
			'subtitle_pad_bottom'					=> '',
			'subtitle_pad_left'						=> '',
			'subtitle_marg_top'						=> '',
			'subtitle_marg_right'					=> '',
			'subtitle_marg_bottom'					=> '',
			'subtitle_marg_left'					=> '',
			'icon_subtitle_align'					=> '',
			'icon_subtitle_font_style'				=> '',
			'icon_subtitle_border'					=> '',
			'subtitle_bord_top'						=> '',
			'subtitle_bord_right'					=> '',
			'subtitle_bord_bottom'					=> '',
			'subtitle_bord_left'					=> '',
			'subtitle_border_color'					=> '',
			'subtitle_bord_top_left_radius'			=> '',
			'subtitle_bord_top_right_radius'		=> '',
			'subtitle_bord_bottom_left_radius'		=> '',
			'subtitle_bord_bottom_right_radius'		=> '',
			'icon_subtitle_font_size'				=> '',
			
			// content
			'content_pad_top'						=> '',
			'content_pad_right'						=> '',
			'content_pad_bottom'					=> '',
			'content_pad_left'						=> '',
			'content_marg_top'						=> '',
			'content_marg_right'					=> '',
			'content_marg_bottom'					=> '',
			'content_marg_left'						=> '',
			'icon_content_align'					=> '',
			'icon_content_font_style'				=> '',
			'icon_content_border'					=> '',
			'content_bord_top'						=> '',
			'content_bord_right'					=> '',
			'content_bord_bottom'					=> '',
			'content_bord_left'						=> '',
			'content_border_color'					=> '',
			
			// icon
			'icon_border'							=> '',
			'icon_border_bord_top'					=> '',
			'icon_border_bord_right'				=> '',
			'icon_border_bord_bottom'				=> '',
			'icon_border_bord_left'					=> '',
			'icon_border_bord_top_left_radius'		=> '',
			'icon_border_bord_top_right_radius'		=> '',
			'icon_border_bord_bottom_left_radius'	=> '',
			'icon_border_bord_bottom_right_radius'	=> '',
			'icon_border_border_color'				=> '',
			'icon_pad_top'							=> '',
			'icon_pad_right'						=> '',
			'icon_pad_bottom'						=> '',
			'icon_pad_left'							=> '',
			'icon_marg_top'							=> '',
			'icon_marg_right'						=> '',
			'icon_marg_bottom'						=> '',
			'icon_marg_left'						=> '',
			'icon_align'							=> '',
			
			// Google fonts
			'title_text_font'						=> '',
			'subtitle_text_font'					=> '',
			'content_text_font'						=> '',

			// Class & ID
			'shortcodeclass' 						=> '',
			'shortcodeid' 							=> '',
			
		), $attributes));		

		
		$this->type  = $type;

		wp_enqueue_style( 'wn-deep-icon-box' . $this->type, DEEP_ASSETS_URL . 'css/frontend/icon-box/icon-box' . $this->type . '.css' );		
		add_action( 'wp_footer', function() use($type) {
			echo '<script>
			var element = document.getElementById("wn-deep-icon-box'.$type.'-css");
			if(element && !deep_iconBox_styles["wn-deep-icon-box'.$type.'-css"]) {
				deep_iconBox_styles["wn-deep-icon-box'.$type.'-css"] = true;
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

		ob_start();

		$link_target_tag		= '';
		$live_page_builders_css	= '';
		$style					= '';
		$title_style_font		= '';
		$content_style_font		= '';
		$subtitle_style_font	= '';
		static $uniqid = 0;
		$uniqid++;
		
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			
			// Title google fonts
			$title_text_font			= ! empty( $title_text_font ) ? $title_text_font : '';
			$title_font_data			= getFontsData( $title_text_font );
			$title_font_inline_style	= googleFontsStyles( $title_font_data );   
			$title_style_font			= $title_text_font ? $title_font_inline_style : '' ;
			enqueueGoogleFonts( $title_font_data );
			
			// Subtitle google fonts
			$subtitle_text_font			= ! empty( $subtitle_text_font ) ? $subtitle_text_font : '';
			$subtitle_font_data			= getFontsData( $subtitle_text_font );
			$subtitle_font_inline_style	= googleFontsStyles( $subtitle_font_data );   
			$subtitle_style_font			= $subtitle_text_font ? $subtitle_font_inline_style : '' ;
			enqueueGoogleFonts( $subtitle_font_data );
			
			// Content google fonts
			$content_text_font			= ! empty( $content_text_font ) ? $content_text_font : '';
			$content_font_data			= getFontsData( $content_text_font );
			$content_font_inline_style	= googleFontsStyles( $content_font_data );   
			$content_style_font			= $content_text_font ? $content_font_inline_style : '' ;
			enqueueGoogleFonts( $content_font_data );
		}
		$shortcodeclass 			= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid				= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
		$title_color				= $title_color ? 'color: ' . $title_color . ';' : '' ;
		$title_color_hover			= $title_color_hover ? 'color: ' . $title_color_hover . ';' : '' ;
		$shadow_left				= $shadow_left ? deep_pixel_separate( $shadow_left ) : '' ;
		$shadow_top					= $shadow_top ? deep_pixel_separate( $shadow_top ) : '' ;
		$shadow_blur				= $shadow_blur ? deep_pixel_separate( $shadow_blur ) : '' ;
		$shadow_spread				= $shadow_spread ? deep_pixel_separate( $shadow_spread ) : '' ;
		$box_linkable				= $box_linkable ? $box_linkable : '';
		$title_linkable				= $title_linkable ? $title_linkable : '';
		$box_shadow					= ( !empty( $shadow_left ) && !empty( $shadow_top ) && !empty( $shadow_blur ) && !empty( $shadow_spread ) && !empty( $shadow_color ) ) ? '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' { box-shadow:' . deep_pixel_separate( $shadow_left ) . ' ' . deep_pixel_separate( $shadow_top ) . ' ' . deep_pixel_separate( $shadow_blur ) . ' ' . deep_pixel_separate( $shadow_spread ) . ' ' . $shadow_color . ' ' . $shadow_status . '; }' : '' ;
		$icon_title_font_size 		= ( isset( $icon_title_font_size ) && $icon_title_font_size != '' )  ? '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .title-style { font-size: ' . deep_pixel_separate( $icon_title_font_size ) . ' ;}' : '' ;
		$icon_subtitle_font_size 	= ( isset( $icon_subtitle_font_size ) && $icon_subtitle_font_size != '' )  ? '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' h5, #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .sub-title-style { font-size: ' . deep_pixel_separate( $icon_subtitle_font_size ) . ' ;}' : '' ;
		$pad_top					= ( isset( $pad_top ) && $pad_top != '' )  ? 'padding-top :' . deep_pixel_separate( $pad_top ) . ';' : '';
		$pad_right					= ( isset( $pad_right ) && $pad_right != '' )  ? 'padding-right :' . deep_pixel_separate( $pad_right ) . ';' : '';
		$pad_bottom					= ( isset( $pad_bottom ) && $pad_bottom != '' )  ? 'padding-bottom :' . deep_pixel_separate( $pad_bottom ) . ';' : '';
		$pad_left					= ( isset( $pad_left ) && $pad_left != '' )  ? 'padding-left :' . deep_pixel_separate( $pad_left ) . ';' : '';
		$marg_top					= ( isset( $marg_top ) && $marg_top != '' )  ? 'margin-top :' . deep_pixel_separate( $marg_top ) . ';'  : '';
		$marg_right					= ( isset( $marg_right ) && $marg_right != '' )  ? 'margin-right :' . deep_pixel_separate( $marg_right ) . ';'  : '';
		$marg_bottom				= ( isset( $marg_bottom ) && $marg_bottom != '' )  ? 'margin-bottom :' . deep_pixel_separate( $marg_bottom ) . ';'  : '';
		$marg_left					= ( isset( $marg_left ) && $marg_left != '' )  ? 'margin-left :' . deep_pixel_separate( $marg_left ) . ';'  : '';
		$title_pad_top				= ( isset( $title_pad_top ) && $title_pad_top != '' )  ? 'padding-top :' . deep_pixel_separate( $title_pad_top ) . ';' : '';
		$title_pad_right			= ( isset( $title_pad_right ) && $title_pad_right != '' )  ? 'padding-right :' . deep_pixel_separate( $title_pad_right ) . ';' : '';
		$title_pad_bottom			= ( isset( $title_pad_bottom ) && $title_pad_bottom != '' )  ? 'padding-bottom :' . deep_pixel_separate( $title_pad_bottom ) . ';' : '';
		$title_pad_left				= ( isset( $title_pad_left ) && $title_pad_left != '' )  ? 'padding-left :' . deep_pixel_separate( $title_pad_left ) . ';' : '';
		$title_marg_top				= ( isset( $title_marg_top ) && $title_marg_top != '' )  ? 'margin-top :' . deep_pixel_separate( $title_marg_top ) . ';' : '';
		$title_marg_right			= ( isset( $title_marg_right ) && $title_marg_right != '' )  ? 'margin-right :' . deep_pixel_separate( $title_marg_right ) . ';' : '';
		$title_marg_bottom			= ( isset( $title_marg_bottom ) && $title_marg_bottom != '' )  ? 'margin-bottom :' . deep_pixel_separate( $title_marg_bottom ) . ';' : '';
		$title_marg_left			= ( isset( $title_marg_left ) && $title_marg_left != '' )  ? 'margin-left :' . deep_pixel_separate( $title_marg_left ) . ';' : '';
		$subtitle_pad_top			= ( isset( $subtitle_pad_top ) && $subtitle_pad_top != '' )  ? 'padding-top :' . deep_pixel_separate( $subtitle_pad_top ) . ';' : '';
		$subtitle_pad_right			= ( isset( $subtitle_pad_right ) && $subtitle_pad_right != '' )  ? 'padding-right :' . deep_pixel_separate( $subtitle_pad_right ) . ';' : '';
		$subtitle_pad_bottom		= ( isset( $subtitle_pad_bottom ) && $subtitle_pad_bottom != '' )  ? 'padding-bottom :' . deep_pixel_separate( $subtitle_pad_bottom ) . ';' : '';
		$subtitle_pad_left			= ( isset( $subtitle_pad_left ) && $subtitle_pad_left != '' )  ? 'padding-left :' . deep_pixel_separate( $subtitle_pad_left ) . ';' : '';
		$subtitle_marg_top			= ( isset( $subtitle_marg_top ) && $subtitle_marg_top != '' )  ? 'margin-top :' . deep_pixel_separate( $subtitle_marg_top ) . ';' : '';
		$subtitle_marg_right		= ( isset( $subtitle_marg_right ) && $subtitle_marg_right != '' )  ? 'margin-right :' . deep_pixel_separate( $subtitle_marg_right ) . ';' : '';
		$subtitle_marg_bottom		= ( isset( $subtitle_marg_bottom ) && $subtitle_marg_bottom != '' )  ? 'margin-bottom :' . deep_pixel_separate( $subtitle_marg_bottom ) . ';' : '';
		$subtitle_marg_left			= ( isset( $subtitle_marg_left ) && $subtitle_marg_left != '' )  ? 'margin-left :' . deep_pixel_separate( $subtitle_marg_left ) . ';' : '';
		$content_pad_top			= ( isset( $content_pad_top ) && $content_pad_top != '' )  ? 'padding-top :' . deep_pixel_separate( $content_pad_top ) . ';' : '';
		$content_pad_right			= ( isset( $content_pad_right ) && $content_pad_right != '' )  ? 'padding-right :' . deep_pixel_separate( $content_pad_right ) . ';' : '';
		$content_pad_bottom			= ( isset( $content_pad_bottom ) && $content_pad_bottom != '' )  ? 'padding-bottom :' . deep_pixel_separate( $content_pad_bottom ) . ';' : '';
		$content_pad_left			= ( isset( $content_pad_left ) && $content_pad_left != '' )  ? 'padding-left :' . deep_pixel_separate( $content_pad_left ) . ';' : '';
		$content_marg_top			= ( isset( $content_marg_top ) && $content_marg_top != '' )  ? 'margin-top :' . deep_pixel_separate( $content_marg_top ) . ';' : '';
		$content_marg_right			= ( isset( $content_marg_right ) && $content_marg_right != '' )  ? 'margin-right :' . deep_pixel_separate( $content_marg_right ) . ';' : '';
		$content_marg_bottom		= ( isset( $content_marg_bottom ) && $content_marg_bottom != '' )  ? 'margin-bottom :' . deep_pixel_separate( $content_marg_bottom ) . ';' : '';
		$content_marg_left			= ( isset( $content_marg_left ) && $content_marg_left != '' )  ? 'margin-left :' . deep_pixel_separate( $content_marg_left ) . ';' : '';
		$icon_title_align			= ! empty( $icon_title_align ) ? 'text-align: ' . $icon_title_align . ';' : '';
		$icon_subtitle_align		= ! empty( $icon_subtitle_align ) ? 'text-align: ' . $icon_subtitle_align . ';' : '';
		$icon_content_align			= ! empty( $icon_content_align ) ? 'text-align: ' . $icon_content_align . ';' : '';
		$icon_align					= ! empty( $icon_align ) ? 'text-align: ' . $icon_align . ';' : '';
		$icon_link_align			= ! empty( $icon_link_align ) ? 'text-align: ' . $icon_link_align . ';' : '';
		$side_by_side_title_icon	= ! empty( $side_by_side_title_icon ) ? 'position:relative; float: ' . $side_by_side_title_icon . ';' : '';
		$title_border_color			= ! empty( $title_border_color ) ? 'border-color: ' . $title_border_color . ';' : '';
		$subtitle_border_color		= ! empty( $subtitle_border_color ) ? 'border-color: ' . $subtitle_border_color . ';' : '';
		$content_border_color		= ! empty( $content_border_color ) ? 'border-color: ' . $content_border_color . ';' : '';
		$iconbox_border_color		= ! empty( $iconbox_border_color ) ? 'border-color: ' . $iconbox_border_color . ';' : '';
		$style 						.= $box_shadow . $icon_title_font_size . $icon_subtitle_font_size;
		
		if ( $icon_border != 'none' ) {
			$icon_border 							= $icon_border ? 'border-style: ' . $icon_border . ';' : '';
			$icon_border_bord_top 					= $icon_border_bord_top ? 'border-top-width: ' . deep_pixel_separate( $icon_border_bord_top ) . ';' : '';
			$icon_border_bord_right 				= $icon_border_bord_right ? 'border-right-width: ' . deep_pixel_separate( $icon_border_bord_right ) . ';' : '';
			$icon_border_bord_bottom 				= $icon_border_bord_bottom ? 'border-bottom-width: ' . deep_pixel_separate( $icon_border_bord_bottom ) . ';' : '';
			$icon_border_bord_left 					= $icon_border_bord_left ? 'border-left-width: ' . deep_pixel_separate( $icon_border_bord_left ) . ';' : '';
			$icon_border_border_color 				= $icon_border_border_color ? 'border-color: ' . $icon_border_border_color  . ';': '';
			$icon_border_bord_top_left_radius 		= $icon_border_bord_top_left_radius ? 'border-top-left-radius: ' . deep_pixel_separate( $icon_border_bord_top_left_radius ) . '; ' : '';
			$icon_border_bord_top_right_radius 		= $icon_border_bord_top_right_radius ? 'border-top-right-radius: ' . deep_pixel_separate( $icon_border_bord_top_right_radius ) . '; ' : '';
			$icon_border_bord_bottom_left_radius 	= $icon_border_bord_bottom_left_radius ? 'border-bottom-left-radius: ' . deep_pixel_separate( $icon_border_bord_bottom_left_radius ) . '; ' : '';
			$icon_border_bord_bottom_right_radius 	= $icon_border_bord_bottom_right_radius ? 'border-bottom-right-radius: ' . deep_pixel_separate( $icon_border_bord_bottom_right_radius ) . '; ' : '';
			
		}
		
		if ( $icon_box_border != 'none' ) {
			$icon_box_border 					= $icon_box_border ? 'border-style: ' . $icon_box_border . ';' : '';
			$iconbox_bord_top 					= $iconbox_bord_top ? 'border-top-width: ' . deep_pixel_separate( $iconbox_bord_top ) . ';' : '';
			$iconbox_bord_right 				= $iconbox_bord_right ? 'border-right-width: ' . deep_pixel_separate( $iconbox_bord_right ) . ';' : '';
			$iconbox_bord_bottom 				= $iconbox_bord_bottom ? 'border-bottom-width: ' . deep_pixel_separate( $iconbox_bord_bottom ) . ';' : '';
			$iconbox_bord_left 					= $iconbox_bord_left ? 'border-left-width: ' . deep_pixel_separate( $iconbox_bord_left ) . ';' : '';
			$iconbox_border_color 				= $iconbox_border_color ? $iconbox_border_color : '';
			$iconbox_bord_top_left_radius 		= $iconbox_bord_top_left_radius ? 'border-top-left-radius: ' . deep_pixel_separate( $iconbox_bord_top_left_radius ) . '; ' : '';
			$iconbox_bord_top_right_radius 		= $iconbox_bord_top_right_radius ? 'border-top-right-radius: ' . deep_pixel_separate( $iconbox_bord_top_right_radius ) . '; ' : '';
			$iconbox_bord_bottom_left_radius 	= $iconbox_bord_bottom_left_radius ? 'border-bottom-left-radius: ' . deep_pixel_separate( $iconbox_bord_bottom_left_radius ) . '; ' : '';
			$iconbox_bord_bottom_right_radius 	= $iconbox_bord_bottom_right_radius ? 'border-bottom-right-radius: ' . deep_pixel_separate( $iconbox_bord_bottom_right_radius ) . '; ' : '';
		}
		
		if ( $icon_title_border != 'none' ) {
			$icon_title_border 				= $icon_title_border ? 'border-style: ' . $icon_title_border . ';' : '';
			$title_bord_top 				= $title_bord_top ? 'border-top-width: ' . deep_pixel_separate( $title_bord_top ) . ';' : '';
			$title_bord_right 				= $title_bord_right ? 'border-right-width: ' . deep_pixel_separate( $title_bord_right ) . ';' : '';
			$title_bord_bottom 				= $title_bord_bottom ? 'border-bottom-width: ' . deep_pixel_separate( $title_bord_bottom ) . ';' : '';
			$title_bord_left 				= $title_bord_left ? 'border-left-width: ' . deep_pixel_separate( $title_bord_left ) . ';' : '';
			$title_border_color 			= $title_border_color ? $title_border_color : '';
			$title_bord_top_left_radius 	= $title_bord_top_left_radius ? 'border-top-left-radius: ' . deep_pixel_separate( $title_bord_top_left_radius ) . '; ' : '';
			$title_bord_top_right_radius 	= $title_bord_top_right_radius ? 'border-top-right-radius: ' . deep_pixel_separate( $title_bord_top_right_radius ) . '; ' : '';
			$title_bord_bottom_left_radius 	= $title_bord_bottom_left_radius ? 'border-bottom-left-radius: ' . deep_pixel_separate( $title_bord_bottom_left_radius ) . '; ' : '';
			$title_bord_bottom_right_radius = $title_bord_bottom_right_radius ? 'border-bottom-right-radius: ' . deep_pixel_separate( $title_bord_bottom_right_radius ) . '; ' : '';
		}
		
		if ( $icon_subtitle_border != 'none' ) {
			$icon_subtitle_border 				= $icon_subtitle_border ? 'border-style: ' . $icon_subtitle_border . ';' : '';
			$subtitle_bord_top 					= $subtitle_bord_top ? 'border-top-width: ' . deep_pixel_separate( $subtitle_bord_top ) . ';' : '';
			$subtitle_bord_right 				= $subtitle_bord_right ? 'border-right-width: ' . deep_pixel_separate( $subtitle_bord_right ) . ';' : '';
			$subtitle_bord_bottom 				= $subtitle_bord_bottom ? 'border-bottom-width: ' . deep_pixel_separate( $subtitle_bord_bottom ) . ';' : '';
			$subtitle_bord_left 				= $subtitle_bord_left ? 'border-left-width: ' . deep_pixel_separate( $subtitle_bord_left ) . ';' : '';
			$subtitle_border_color 				= $subtitle_border_color ? $subtitle_border_color : '';
			$subtitle_bord_top_left_radius 		= $subtitle_bord_top_left_radius ? 'border-top-left-radius: ' . deep_pixel_separate( $subtitle_bord_top_left_radius ) . '; ' : '';
			$subtitle_bord_top_right_radius 	= $subtitle_bord_top_right_radius ? 'border-top-right-radius: ' . deep_pixel_separate( $subtitle_bord_top_right_radius ) . '; ' : '';
			$subtitle_bord_bottom_left_radius 	= $subtitle_bord_bottom_left_radius ? 'border-bottom-left-radius: ' . deep_pixel_separate( $subtitle_bord_bottom_left_radius ) . '; ' : '';
			$subtitle_bord_bottom_right_radius 	= $subtitle_bord_bottom_right_radius ? 'border-bottom-right-radius: ' . deep_pixel_separate( $subtitle_bord_bottom_right_radius ) . '; ' : '';
			
		}
		
		if ( $icon_content_border != 'none' ) {
			$icon_content_border 	= $icon_content_border ? 'border-style: ' . $icon_content_border . ';' : '';
			$content_bord_top 		= $content_bord_top ? 'border-top-width: ' . deep_pixel_separate( $content_bord_top ) . ';' : '';
			$content_bord_right 	= $content_bord_right ? 'border-right-width: ' . deep_pixel_separate( $content_bord_right ) . ';' : '';
			$content_bord_bottom 	= $content_bord_bottom ? 'border-bottom-width: ' . deep_pixel_separate( $content_bord_bottom ) . ';' : '';
			$content_bord_left 		= $content_bord_left ? 'border-left-width: ' . deep_pixel_separate( $content_bord_left ) . ';' : '';
			$content_border_color 	= $content_border_color ? $content_border_color : '';
		}
		
		// Title font style
		if ( $icon_title_font_style == 'italic' ) {
			
			$icon_title_font_style = 'font-style: ' . $icon_title_font_style . ';';
			
		} elseif ( $icon_title_font_style == 'underline' ) {
			
			$icon_title_font_style = 'text-decoration: ' . $icon_title_font_style . ';';
			
		} else {
			
			$icon_title_font_style = '';
			
		}

		// Font weight
		$icon_title_font_weight = $icon_title_font_weight ? 'font-weight: ' . $icon_title_font_weight . ';' : '';  
		
		// Subtitle font style
		if ( $icon_subtitle_font_style == 'italic' ) {
			
			$icon_subtitle_font_style = 'font-style: ' . $icon_subtitle_font_style . ';';
			
		} elseif ( $icon_subtitle_font_style == 'underline' ) {
			
			$icon_subtitle_font_style = 'text-decoration: ' . $icon_subtitle_font_style . ';';
			
		} else {
			
			$icon_subtitle_font_style = '';
			
		}
		
		// Content font style
		if ( $icon_content_font_style == 'italic' ) {
			
			$icon_content_font_style = 'font-style: ' . $icon_content_font_style . ';';
			
		} elseif ( $icon_content_font_style == 'underline' ) {
			
			$icon_content_font_style = 'text-decoration: ' . $icon_content_font_style . ';';
			
		} else {
			
			$icon_content_font_style = '';
			
		}

		// content font size 
		$iconbox_content_size = $iconbox_content_size ? 'font-size: ' . deep_pixel_separate ( $iconbox_content_size ) . ' ;' : '';
		
		if ( $icon_or_image == 'icon' ) {
			
			if ( ! empty( $icon_border ) || ! empty( $icon_border_bord_top ) || ! empty( $icon_border_bord_right ) || ! empty( $icon_border_bord_bottom ) || ! empty( $icon_border_bord_left ) || ! empty( $icon_border_bord_top_left_radius ) || ! empty( $icon_border_bord_top_right_radius ) || ! empty( $icon_border_bord_bottom_left_radius ) || ! empty( $icon_border_bord_bottom_right_radius ) || ! empty( $icon_border_border_color ) ) {
				
				$style .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' i {' . $icon_border . $icon_border_bord_top . $icon_border_bord_right . $icon_border_bord_bottom . $icon_border_bord_left . $icon_border_bord_top_left_radius . $icon_border_bord_top_right_radius . $icon_border_bord_bottom_left_radius . $icon_border_bord_bottom_right_radius . $icon_border_border_color . '}';
				
			} 
			
		} elseif ( $icon_or_image == 'image' ) {
			
			if ( ! empty( $icon_border ) || ! empty( $icon_border_bord_top ) || ! empty( $icon_border_bord_right ) || ! empty( $icon_border_bord_bottom ) || ! empty( $icon_border_bord_left ) || ! empty( $icon_border_bord_top_left_radius ) || ! empty( $icon_border_bord_top_right_radius ) || ! empty( $icon_border_bord_bottom_left_radius ) || ! empty( $icon_border_bord_bottom_right_radius ) || ! empty( $icon_border_border_color  ) ) {
				
				$style .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' img {' . $icon_border . $icon_border_bord_top . $icon_border_bord_right . $icon_border_bord_bottom . $icon_border_bord_left . $icon_border_bord_top_left_radius . $icon_border_bord_top_right_radius . $icon_border_bord_bottom_left_radius . $icon_border_bord_bottom_right_radius . $icon_border_border_color . '}';
				
			} 
			
		} 
		
		if ( ! empty( $icon_align ) || ! empty( $pad_top ) || ! empty( $pad_right ) || ! empty( $pad_bottom ) || ! empty( $pad_left ) || ! empty( $marg_top ) || ! empty( $marg_right ) || ! empty( $marg_bottom ) || ! empty( $marg_left ) || ! empty( $icon_box_border ) || ! empty( $iconbox_bord_top ) || ! empty( $iconbox_bord_right ) || ! empty( $iconbox_bord_bottom ) || ! empty( $iconbox_bord_left ) || ! empty( $iconbox_border_color ) || ! empty( $iconbox_bord_top_left_radius ) || ! empty( $iconbox_bord_top_right_radius ) || ! empty( $iconbox_bord_bottom_left_radius ) || ! empty( $iconbox_bord_bottom_right_radius ) ) {
			
			$style .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' {' . $icon_align . $pad_top . $pad_right . $pad_bottom . $pad_left . $marg_top . $marg_right . $marg_bottom . $marg_left . $icon_box_border . $iconbox_bord_top . $iconbox_bord_right . $iconbox_bord_bottom . $iconbox_bord_left . $iconbox_border_color . $iconbox_bord_top_left_radius . $iconbox_bord_top_right_radius . $iconbox_bord_bottom_left_radius . $iconbox_bord_bottom_right_radius . '}';
			
		} 
		if ( ! empty( $title_color ) || ! empty( $icon_title_align ) || ! empty( $title_style_font ) || ! empty( $title_pad_top ) || ! empty( $title_pad_right ) || ! empty( $title_pad_bottom ) || ! empty( $title_pad_left ) || ! empty( $title_marg_top ) || ! empty( $title_marg_right ) || ! empty( $title_marg_left ) || ! empty( $title_marg_bottom ) || ! empty( $title_marg_bottom ) || ! empty( $icon_title_font_style ) || ! empty( $icon_title_font_weight ) || ! empty( $icon_title_border ) || ! empty( $title_bord_top ) || ! empty( $title_bord_right ) || ! empty( $title_bord_bottom ) || ! empty( $title_bord_left ) || ! empty( $title_border_color ) || ! empty( $title_bord_top_left_radius ) || ! empty( $title_bord_top_right_radius ) || ! empty( $title_bord_bottom_left_radius ) || ! empty( $title_bord_bottom_right_radius ) || ! empty( $title_bord_top_left_radius ) || ! empty( $title_bord_top_right_radius ) || ! empty( $title_bord_bottom_left_radius ) || ! empty( $title_bord_bottom_right_radius ) ) {
		
			$style .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .title-style {' . $title_color . $icon_title_align . $title_style_font . $title_pad_top . $title_pad_right . $title_pad_bottom . $title_pad_left . $title_marg_top . $title_marg_right . $title_marg_left . $title_marg_bottom . $icon_title_font_style . $icon_title_font_weight . $icon_title_border . $title_bord_top . $title_bord_right . $title_bord_bottom . $title_bord_left . $title_border_color . $title_bord_top_left_radius . $title_bord_top_right_radius . $title_bord_bottom_left_radius . $title_bord_bottom_right_radius . '}';
		
		} 
		if ( ! empty( $icon_subtitle_align ) || ! empty( $subtitle_style_font ) || ! empty( $subtitle_pad_top ) || ! empty( $subtitle_pad_right ) || ! empty( $subtitle_pad_bottom ) || ! empty( $subtitle_pad_left ) || ! empty( $subtitle_marg_top ) || ! empty( $subtitle_marg_right ) || ! empty( $subtitle_marg_bottom ) || ! empty( $subtitle_marg_left ) || ! empty( $icon_subtitle_font_style ) || ! empty( $icon_subtitle_border ) || ! empty( $subtitle_bord_top ) || ! empty( $subtitle_bord_right ) || ! empty( $subtitle_bord_bottom ) || ! empty( $subtitle_bord_left ) || ! empty( $subtitle_border_color ) || ! empty( $subtitle_bord_top_left_radius ) || ! empty( $subtitle_bord_top_right_radius ) || ! empty( $subtitle_bord_bottom_left_radius ) || ! empty( $subtitle_bord_bottom_right_radius ) ) {
			
			$style .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' h5, #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .sub-title-style {' . $icon_subtitle_align . $subtitle_style_font . $subtitle_pad_top . $subtitle_pad_right . $subtitle_pad_bottom . $subtitle_pad_left . $subtitle_marg_top . $subtitle_marg_right . $subtitle_marg_bottom . $subtitle_marg_left . $icon_subtitle_font_style . $icon_subtitle_border . $subtitle_bord_top . $subtitle_bord_right . $subtitle_bord_bottom . $subtitle_bord_left . $subtitle_border_color . $subtitle_bord_top_left_radius . $subtitle_bord_top_right_radius . $subtitle_bord_bottom_left_radius . $subtitle_bord_bottom_right_radius . '}';
			
		} 
		if ( ! empty( $icon_content_align ) || ! empty( $content_style_font ) || ! empty( $content_pad_top ) || ! empty( $content_pad_right ) || ! empty( $content_pad_bottom ) || ! empty( $content_pad_left ) || ! empty( $content_marg_top ) || ! empty( $content_marg_right ) || ! empty( $content_marg_bottom ) || ! empty( $content_marg_left ) || ! empty( $icon_content_font_style ) || ! empty( $iconbox_content_size ) || ! empty( $icon_content_border ) || ! empty( $content_bord_top ) || ! empty( $content_bord_right ) || ! empty( $content_bord_bottom ) || ! empty( $content_bord_left ) || ! empty( $content_border_color ) ) {
			
			$style .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .content-style {' . $icon_content_align . $content_style_font . $content_pad_top . $content_pad_right . $content_pad_bottom . $content_pad_left . $content_marg_top . $content_marg_right . $content_marg_bottom . $content_marg_left . $icon_content_font_style . $iconbox_content_size . $icon_content_border . $content_bord_top . $content_bord_right . $content_bord_bottom . $content_bord_left . $content_border_color . '}';
			
		} 
		
		if ( $icon_or_image == 'icon' ) {
			
			$icon_pad_top		= ! empty( $icon_pad_top ) ? 'padding-top :' . deep_pixel_separate( $icon_pad_top ) . ';' : '';
			$icon_pad_right		= ! empty( $icon_pad_right ) ? 'padding-right :' . deep_pixel_separate( $icon_pad_right ) . ';' : '';
			$icon_pad_bottom	= ! empty( $icon_pad_bottom ) ? 'padding-bottom :' . deep_pixel_separate( $icon_pad_bottom ) . ';' : '';
			$icon_pad_left		= ! empty( $icon_pad_left ) ? 'padding-left :' . deep_pixel_separate( $icon_pad_left ) . ';' : '';
			$icon_marg_top		= ! empty( $icon_marg_top ) ? 'margin-top :' . deep_pixel_separate( $icon_marg_top ) . ';' : '';
			$icon_marg_right	= ! empty( $icon_marg_right ) ? 'margin-right :' . deep_pixel_separate( $icon_marg_right ) . ';' : '';
			$icon_marg_bottom	= ! empty( $icon_marg_bottom ) ? 'margin-bottom :' . deep_pixel_separate( $icon_marg_bottom ) . ';' : '';
			$icon_marg_left		= ! empty( $icon_marg_left ) 	? 'margin-left :' . deep_pixel_separate( $icon_marg_left ) . ';' : '';
			
			if ( ! empty( $side_by_side_title_icon ) || ! empty( $icon_pad_top ) || ! empty( $icon_pad_right ) || ! empty( $icon_pad_bottom ) || ! empty( $icon_pad_left ) || ! empty( $icon_marg_top ) || ! empty( $icon_marg_right ) || ! empty( $icon_marg_bottom ) || ! empty( $icon_marg_left ) ) {
				$style .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' i {' . $side_by_side_title_icon . $icon_pad_top . $icon_pad_right . $icon_pad_bottom . $icon_pad_left . $icon_marg_top . $icon_marg_right . $icon_marg_bottom . $icon_marg_left . '}';
			}
			
		} else {
			$icon_pad_top		= ! empty( $icon_pad_top ) ? 'padding-top :' . deep_pixel_separate( $icon_pad_top ) . ';' : '';
			$icon_pad_right		= ! empty( $icon_pad_right ) ? 'padding-right :' . deep_pixel_separate( $icon_pad_right ) . ';' : '';
			$icon_pad_bottom	= ! empty( $icon_pad_bottom )	? 'padding-bottom :' . deep_pixel_separate( $icon_pad_bottom ) . ';' : '';
			$icon_pad_left		= ! empty( $icon_pad_left ) ? 'padding-left :' . deep_pixel_separate( $icon_pad_left ) . ';' : '';
			$icon_marg_top		= ! empty( $icon_marg_top ) ? 'margin-top :' . deep_pixel_separate( $icon_marg_top ) . ';' : '';
			$icon_marg_right	= ! empty( $icon_marg_right )	? 'margin-right :' . deep_pixel_separate( $icon_marg_right ) . ';' : '';
			$icon_marg_bottom	= ! empty( $icon_marg_bottom ) ? 'margin-bottom :' . deep_pixel_separate( $icon_marg_bottom ) . ';' : '';
			$icon_marg_left		= ! empty( $icon_marg_left )	? 'margin-left :' . deep_pixel_separate( $icon_marg_left ) . ';' : '';
			
			if ( ! empty( $side_by_side_title_icon ) || ! empty( $icon_pad_top ) || ! empty( $icon_pad_right ) || ! empty( $icon_pad_bottom ) || ! empty( $icon_pad_left ) || ! empty( $icon_marg_top ) || ! empty( $icon_marg_right ) || ! empty( $icon_marg_bottom ) || ! empty( $icon_marg_left ) ) {
				$style .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' img {' . $side_by_side_title_icon . $icon_pad_top . $icon_pad_right . $icon_pad_bottom . $icon_pad_left . $icon_marg_top . $icon_marg_right . $icon_marg_bottom . $icon_marg_left . '}';
			}
			
		}
		
		if ( $link_target == 'true' ){
			$link_target_tag = ' target="_blank" ';
		}
		
		if( is_numeric( $background_image ) ){
			$background_image = wp_get_attachment_url( $background_image );
		}
		
		$type 				= ( $type == 0 ) ? '' : $type ;
		$icon_bg 			= ( $icon_bg ) ? 'background:'. esc_attr($icon_bg) .'; ' : '' ;
		$min_height 		= ( $min_height ) ? 'min-height:'. deep_pixel_separate( $min_height ) .'; ' : '' ;
		$background_image	= $background_image  ? 'background: url(' . $background_image . ');' : '' ;
		$aligncenter 		= $aligncenter		 ? ' aligncenter' : '' ;
		$bg_img_pos 		= ( $type == 28 && $bg_img_pos ) ? $bg_img_pos : 'tlp' ;
		$iconbox_content	= $iconbox_content ? '<p class="content-style">'.$iconbox_content .'</p>' : '' ;
		$style .= ( $icon_bg || $min_height ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .icon-wrap { ' . $icon_bg . $min_height . ' }' : '' ;
		$start_wrap = $end_wrap = '';
		if ( $type == 17 ) {
			$style .= ( !empty($icon_color) ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' { color: ' . esc_attr($icon_color) . '; } ' : '' ;
			$style .= ( !empty($icon_color) ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .icon-wrap { background-color:' . esc_attr($icon_color) . '; } ' : '' ;
			
			$start_wrap = '<div class="icon-wrap">';
			$end_wrap   = '</div>';
		}
		
		if ( $type == 26 ) {
			$start_wrap = '<div class="icon-wrap">';
			$end_wrap   = '</div>';
		}
		
		$iconbox22_class = '';
		if ( $type == 15 || $type == 22 ) {
			$iconbox22_class .= $featured ? ' ' . $featured : '';
			$iconbox22_class .= $border_right ? ' ' . $border_right : '';
		}
		
		$style .= ( $background_image ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' { ' . $background_image . ' } ' : '' ;

		$master_class= '';
		if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
			$master_class = implode(' ', apply_filters( 'kc-el-class', $attributes ));
			$master_class .= ' wn-kc-elm';
		}

		$tilteffect = $tilteffect == 'yes' ? ' wniconbx-tilt' : '';
		if ( !empty( $icon_link_url ) && $box_linkable == 'true' ) {
			echo '<a href="' . $icon_link_url . '" class="icon-box-wrap-link" ' . $link_target_tag . '>';
		}
			echo '<article class="wn-icon-box icon-box-id-' . $uniqid . ' icon-box' . $type . $tilteffect . $iconbox22_class . ' ' . $bg_img_pos . ' ' . $align . ' ' . $aligncenter . ' ' . $master_class . ' ' . $shortcodeclass . '"  ' . $shortcodeid . '>';

		// gradient div
		if ( ! empty( $iconbox_grad_color_1 ) || ! empty( $iconbox_grad_color_2 ) || ! empty( $iconbox_grad_color_3 ) || ! empty( $iconbox_grad_color_4 ) || ! empty( $iconbox_grad_color_1_hover ) || ! empty( $iconbox_grad_color_2_hover ) || ! empty( $iconbox_grad_color_3_hover ) || ! empty( $iconbox_grad_color_4_hover ) ) {
			echo '<div class="wn-grad-bg"></div>';
		}

		if ( $type == 18 ) {
			echo '<span class="shape"></span>';
			echo '<div class="wn-content-wrap">';
		}			
		if( !empty( $icon_link_url ) && $icon_name != '' && $box_linkable != 'true' ) {
			echo '' . $start_wrap . '<a href="' . esc_url($icon_link_url) . '" '.$link_target_tag.'>';
			if ( $type != 21  && $icon_name != '' ) {
				echo do_shortcode(  "[icon name='$icon_name']" );
			}
			echo '</a>' . $end_wrap ;
		} elseif ( $icon_name != '' && $icon_name != '' && $type != 21 ){
			echo '' . $start_wrap . do_shortcode(  "[icon name='$icon_name']" ) . $end_wrap;
		}

		if ( !empty( $icon_image ) && ( empty( $icon_name ) ||  $icon_name == 'none' ) ) {
			if( is_numeric( $icon_image ) ){
				
				$icon_image_url = wp_get_attachment_url( $icon_image );					
				
				if( ! empty( $thumbnail ) ) {
					
					// if main class not exist get it
					if ( ! class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';						
					}
					
					$patt = array ( '0'  => 'x', '1'  => '*' );
					
					$arr = explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) ); // get width and height
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $icon_image, $icon_image_url , $arr['0'] , $arr['1'] ); // set required and get result
				} else {
					$thumbnail_url = $icon_image_url; // set required and get result
					
				}
				
			}
			
			if ( $type != 21 ) {
				if( !empty( $icon_link_url ) && $box_linkable != 'true' ) {
					echo '<a href='. $icon_link_url .' '.$link_target_tag.'>' . '<img src="'.$thumbnail_url.'" alt="' . $icon_title . '" />' . '</a>' ;
				} else {
					echo '' . $start_wrap . '<img src="'.$thumbnail_url.'" alt="' . $icon_title . '" />' . $end_wrap ;
				}
			}
			
		}
		if ( $type == 21 ) {
			
			echo '<div class="iconbox-leftsection">';
			if ( $icon_name != '' ) {
				echo do_shortcode(  "[icon name='$icon_name']" );
			}
			
			if( !empty( $icon_link_url ) && !empty( $icon_image ) && $box_linkable != 'true' ) {
				echo '<a href='. $icon_link_url .' '.$link_target_tag.'>' . '<img src="'.$thumbnail_url.'" alt="' . $icon_title . '" />' . '</a>' ;
			} elseif ( !empty( $icon_image ) ) {
				echo '' . $start_wrap . '<img src="'.$thumbnail_url.'" alt="' . $icon_title . '" />' . $end_wrap ;
			}
			echo '</div>';
			
		}
		
		
		if ( $type != 21 ) {
			echo (!empty($icon_subtitle)) ? '<h5>' . $icon_subtitle . '</h5>' : '';
			if ( $title_linkable == 'true' && $box_linkable != 'true' ) {
				echo '<a href="' . $icon_link_url . '" ' . $link_target_tag . '><h4 class="title-style">' . $icon_title . '</h4></a>';
			} else {
				echo '<h4 class="title-style">' . $icon_title . '</h4>';
			}
			echo  $iconbox_content ;
			echo (!empty($icon_link_url) &&  (!empty($icon_link_text)) && $box_linkable != 'true' )?"<div class=\"readmore\"><a class=\"magicmore\" href=\"{$icon_link_url}\" {$link_target_tag}>{$icon_link_text}</a></div>":'';
		}
		if ( $type == 21 ) {
			$icon_subtitle = $icon_subtitle ? '<h6 class="sub-title-style">'.$icon_subtitle.'</h6>' : '' ;
			echo '
			<div class="iconbox-rightsection">';

				if ( $title_linkable == 'true' && $box_linkable != 'true' ) {
					echo '<a href="' . $icon_link_url . '" ' . $link_target_tag . '><h4 class="title-style">' . $icon_title . '</h4></a>';
				} else {
					echo '<h4 class="title-style">' . $icon_title . '</h4>';
				}
			echo $icon_subtitle . $iconbox_content;
			echo'
				<div class="readmore">
				<a class="magicmore" href="' . $icon_link_url . '" '.$link_target_tag.'>' . $icon_link_text . '</a>
				</div>
			</div>';
		}
		if ( $type == 18 ) {
			echo '</div>';
		}
		
		
			echo '</article>';
		if ( !empty($icon_link_url) && $box_linkable == 'true' ) {
			echo '</a>';
		}
		$style .= $icon_size ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' i { width: auto; height: auto; font-size:' . deep_pixel_separate( $icon_size ). '; } ' : '' ;
		

		// icon color
		if ( $icon_color_type == 'icon-solid-color' ) {
			
			$style .= $icon_color ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' i { color:' . $icon_color . '; } ' : '' ;
			
		} else {
			
			$icon_grad_direction = $icon_grad_direction ? $icon_grad_direction : '';
			$icon_gradient = deep_gradient( $icon_grad_color_1, $icon_grad_color_2, $icon_grad_color_3, $icon_grad_color_4, $icon_grad_direction );
			deep_save_dyn_styles('
			#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' i {
				' . $icon_gradient . '
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
			}
			');
			$live_page_builders_css .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' i { ' . $icon_gradient . ' -webkit-background-clip: text; -webkit-text-fill-color: transparent; }';
		}

		// icon hover color
		if ( $icon_color_type_hover == 'icon-solid-color_hover' ) {
			
			$style .= $icon_color_hover ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ':hover i { color:' . $icon_color_hover . '; -webkit-text-fill-color: inherit; text-fill-color: inherit;} ' : '' ;
			
		} else {
			
			$icon_grad_direction_hover = $icon_grad_direction_hover ? $icon_grad_direction_hover : '';
			$icon_gradient_hover = deep_gradient( $icon_grad_color_1_hover, $icon_grad_color_2_hover, $icon_grad_color_3_hover, $icon_grad_color_4_hover, $icon_grad_direction_hover );
			deep_save_dyn_styles('
			#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ':hover i {
				' . $icon_gradient_hover . '
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
			}
			');
			$live_page_builders_css .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ':hover i { ' . $icon_gradient_hover . ' -webkit-background-clip: text; -webkit-text-fill-color: transparent; }';
		}

		
		if ( $title_color_type == 'title-solid-color' ) {
			
			
			$style .= $title_color ? '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .title-style {' . $title_color . '}' : '' ;
			
			
		} else {
			
			$title_grad_direction = $title_grad_direction ? $title_grad_direction : '';
			$sub_title_gradient = deep_gradient( $title_grad_color_1, $title_grad_color_2, $title_grad_color_3, $title_grad_color_4, $title_grad_direction );
			deep_save_dyn_styles('
			#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .title-style {
				' . $sub_title_gradient . '
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
			}
			');
			$live_page_builders_css .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .title-style { ' . $sub_title_gradient . ' -webkit-background-clip: text; -webkit-text-fill-color: transparent; }';
		}
		
		if ( $title_color_type_hover == 'title-solid-color_hover' ) {
			
			
			$style .= $title_color_hover ? '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ':hover .title-style {' . $title_color_hover . '}' : '';
			
			
		} else {
			$title_grad_direction_hover = isset($title_grad_direction_hover) ? $title_grad_direction_hover : '';
			$sub_title_gradient_hover = deep_gradient( $title_grad_color_1_hover, $title_grad_color_2_hover, $title_grad_color_3_hover, $title_grad_color_4_hover, $title_grad_direction_hover );
			deep_save_dyn_styles('
			#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ':hover .title-style {
				' . $sub_title_gradient_hover . '
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
			}
			');
			$live_page_builders_css .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ':hover .title-style { ' . $sub_title_gradient_hover . ' -webkit-background-clip: text; -webkit-text-fill-color: transparent; }';
		}

		// icon box background
		if ( $iconbox_color_type == 'iconbox-solid-color' ) {
			
			$style .= ( $background_color ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .shape { background:' . $background_color . '; } ' : '' ;
			$style .= ( $background_color ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .wn-content-wrap { background:' . $background_color . '; } ' : '' ;
			$style .= ( $background_color ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' { background:' . $background_color . '; } ' : '' ;
			
		} else {
			
			$iconbox_grad_direction = $iconbox_grad_direction ? $iconbox_grad_direction : '';
			$iconbox_gradient = deep_gradient( $iconbox_grad_color_1, $iconbox_grad_color_2, $iconbox_grad_color_3, $iconbox_grad_color_4, $iconbox_grad_direction );
			deep_save_dyn_styles('
			#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ',
			#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .shape,
			#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .wn-content-wrap {
				' . $iconbox_gradient . '
			}
			');
			$live_page_builders_css .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ', #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .shape, #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .wn-content-wrap { ' . $iconbox_gradient . ' }';
		}
		
		// icon box background hover 
		if ( $iconbox_color_type_hover == 'iconbox-solid-color_hover' ) {
			
			$style .= ( $background_color_hover ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .shape:hover { background:' . $background_color_hover . '; } ' : '' ;
			$style .= ( $background_color_hover ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .wn-content-wrap:hover { background:' . $background_color_hover . '; } ' : '' ;
			$style .= ( $background_color_hover ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ':hover { background:' . $background_color_hover . '; } ' : '' ;
			
		} else {
			
			$iconbox_grad_direction_hover = $iconbox_grad_direction_hover ? $iconbox_grad_direction_hover : '';
			$iconbox_gradient_hover = deep_gradient( $iconbox_grad_color_1_hover, $iconbox_grad_color_2_hover, $iconbox_grad_color_3_hover, $iconbox_grad_color_4_hover, $iconbox_grad_direction_hover );
			deep_save_dyn_styles('
				#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .wn-grad-bg {
					' . $iconbox_gradient_hover . '
					opacity: 0;
					position: absolute;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					transition: all .3s ease;
				}
				#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ':hover .wn-grad-bg {
					opacity: 1;
				}
			');
			$live_page_builders_css .= '#wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .wn-grad-bg { ' . $iconbox_gradient_hover . ' opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%; transition: all .3s ease; } #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ':hover .wn-grad-bg { opacity: 1; }';
		}
		
		$style .= ! empty( $content_color ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .content-style { color:'.$content_color.'; } ' : '' ;
		$style .= ! empty( $content_color_hover ) ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ':hover .content-style { color:'.$content_color_hover.'; } ' : '' ;
		$style .= $link_color ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' .magicmore { ' . $icon_link_align . ' color:'.$link_color.' } ' : '' ;	 	
		$style .= $icon_link_align ? ' #wrap .icon-box' . $type . '.icon-box-id-' . $uniqid . ' div.readmore { ' . $icon_link_align . ' } ' : '' ;	 	
		
		
		$out = ob_get_contents();
		ob_end_clean();
		$out = str_replace('<p></p>','',$out);
		deep_save_dyn_styles( $style );
					
		return $out;
	}
	
	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
	
		if ( self::used_shortcode_in_page( 'iconbox' ) ) {			
			wp_enqueue_style( 'wn-deep-icon-box0', DEEP_ASSETS_URL . 'css/frontend/icon-box/icon-box0.css' );				
			wp_enqueue_script( 'deep-tilt-lib' );
			wp_enqueue_script( 'deep-tilt' );
		}
	}

} DeepWPBakeryIconBox::get_instance(); ?>

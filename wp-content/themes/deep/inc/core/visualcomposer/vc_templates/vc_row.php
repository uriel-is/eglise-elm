<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

//Main Parameters
$output = '';
extract(shortcode_atts(array(
	// General
	'full_height'			=> '',
	'dec_full_height'		=> '',
	'columns_placement'		=> 'top',
	'row_height'			=> '',
	'gap'					=> '',
	'row_pattern'			=> '',
	'row_pattern_color'		=> '',
	'content_placement'		=> '',
	'row_dark'				=> '',
	'equal_height'			=> '',
	'align_center'			=> '',
	'r_margin_bottom'		=> '',
	'disable_element'		=> '',
	'layer_animation'		=> '',
	'rtl_reverse'		    => '',
	// bg image
	'wn_bg_image'			=> '',
	'wn_bg_color'			=> '',
	'bg_position'			=> 'center center',
	'bg_repeat'				=> 'no-repeat',
	'bg_cover'				=> 'yes',
	'bg_attachment'			=> '',
	'wn_parallax'			=> '',
	'wn_parallax_speed'		=> '190',
	'responsive_bg_none'	=> '',
	// bg video
	'video_bg_source'		=> 'youtube',
	'video_bg_url'			=> '',
	'mp4_format'			=> '',
	'webm_format'			=> '',
	'ogg_format'			=> '',
	'video_mute'			=> 'muted',
	// styling
	'css'					=> '',
	// Animation
	'css_animation'			=> '',
	// ID and Extra Classes
	'el_id'					=> '',
	'el_class'				=> '',
	'wn_class'				=> '',
	// Gradient
	'row_grad_color_1'		=> '',
	'row_grad_color_2'		=> '',
	'row_grad_color_3'		=> '',
	'row_grad_color_4'		=> '',
	'row_grad_direction'	=> '',
), $atts));

wp_enqueue_script( 'wpb_composer_front_js' );
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$uniqid = uniqid();
$style = '';

// Added Parameters
$wn_style = $bg_styles = $video_host = $has_video_bg = $live_page_builders_css = '';
$row_dark = ( $row_dark ) ? 'blox dark' : '' ;
$layer_animation = ( $layer_animation ) ? $layer_animation : '' ;

// Row Height Style
if ( $row_height ){
	$w_height = ltrim ($row_height);
	if(substr($w_height,-2,2)=="px")
		$bg_styles .= " min-height: {$w_height}; ";
	else
		$bg_styles .= " min-height: {$w_height}px; ";
}

// RTL check 
if ( $rtl_reverse === 'yes' ) {
	$rtl_supp = 'vc_rtl-columns-reverse';
} else {
	$rtl_supp = '';
}

$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_row-fluid',
	$rtl_supp,
	$el_class,
	// Webnus Classes
	$row_pattern,
	$responsive_bg_none,
	$align_center,
	$row_dark,
	$layer_animation,
	$wn_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

// full height
if ( ! empty( $full_height ) ) {
	$height_val = $dec_full_height ? 'calc(100vh - ' . $dec_full_height . ') !important' : '100vh !important' ;
	$bg_styles .= ' min-height: ' . $height_val . ';';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

if ( ! empty( $r_margin_bottom ) ) {
	$css_classes[] = 'wn-margin-bottom0';
}

// background image
$wn_bg_image_id	= $wn_bg_image;
$wn_bg_image	= is_numeric( $wn_bg_image ) ? wp_get_attachment_url( $wn_bg_image ) : $wn_bg_image;
$bg_styles .= $wn_bg_image ? ' background-image: url(' . $wn_bg_image . ') !important;' : '' ;

// background color
$bg_styles .= $wn_bg_color ? ' background-color: ' . $wn_bg_color . ' !important;' : '' ;

// background position
$bg_styles .= $bg_position ? ' background-position: ' . $bg_position . ' !important;' : '' ;

// background repeat
$bg_styles .= $bg_repeat ? ' background-repeat: ' . $bg_repeat . ' !important;' : '' ;

// background cover
$bg_styles .= $bg_cover ? ' background-size: cover !important;' : '' ;

// background attachment
$bg_styles .= $bg_attachment ? ' background-attachment: fixed !important;' : '' ;

// background parallax
$parallax_content = '';
if ( $wn_parallax ) :
	$css_classes[] = 'wn-parallax';
	$parallax_content .= '<div class="wn-parallax-bg-holder" data-wnparallax-speed="' . $wn_parallax_speed . '"><div class="wn-parallax-bg"></div></div>';
endif;


// video background
$wn_has_video_bg = $video_bg_url || $mp4_format || $webm_format || $ogg_format ? true : false;
if ( $wn_has_video_bg ) :
	if ( ( $video_bg_source == 'host' ) & ( $mp4_format || $webm_format || $ogg_format ) ) :
		// self hosted
		$css_classes[] = 'wn_video-bg-container';
		$video_host .= '<div class="vc_video-bg vc_hidden-xs">';
		$video_host	.= '<video  loop autoplay ' . $video_mute . ' preload="auto">';
		$video_host .= ! empty( $mp4_format ) ? '<source src="' . $mp4_format . '" type="video/mp4">' : '';
		$video_host .= ! empty( $webm_format ) ? '<source src="' . $webm_format . '" type="video/webm">' : '';
		$video_host .= ! empty( $ogg_format ) ? '<source src="' . $ogg_format . '" type="video/ogg">' : '';
		$video_host .= esc_html__('Your browser does not support the video tag. I suggest you upgrade your browser.','deep');
		$video_host .= '</video>';
		$video_host .= '</div>';
	elseif ( ( $video_bg_source == 'youtube' ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) ) :
		// youtube
		$css_classes[] = 'vc_row vc_video-bg-container';
		wp_enqueue_script( 'vc_youtube_iframe_api_js' );
		$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
	endif;
endif;

$css_class				= preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
if ( ! empty( $wn_class ) ) {
	$wrapper_attributes[]	= 'class="' . esc_attr( trim( $css_class ) ) . '"';
	$wn_style				.= ! empty( $wn_class ) ? '.' . $wn_class . '{' . $bg_styles . '}' : '';
} else {
	$wrapper_attributes[]	= 'class="' . esc_attr( trim( $css_class ) ) . ' wn-row-' . $uniqid . '"';
	$wn_style				.= '.wn-row-' . $uniqid . ' {' . $bg_styles . '}';
}
$deep_options			= deep_options();

if ( $deep_options['deep_adaptive_images'] == '1' && ! empty( $wn_bg_image_id ) ) {
	if ( ! empty( $wn_class ) ) {

		$adaptive_row 		= deep_adaptive_images_css( $wn_bg_image_id, '.vc_row.wn-row-' . $uniqid . ',.vc_row.' . $wn_class, '!important' );
		$adaptive_parallax 	= deep_adaptive_images_css( $wn_bg_image_id, '.vc_row.wn-row-' . $uniqid . ' .wn-parallax-bg,.vc_row.' . $wn_class . ' .wn-parallax-bg', '!important' );
		$style .= $adaptive_row . $adaptive_parallax;

	} else {

		$adaptive_row 		= deep_adaptive_images_css( $wn_bg_image_id, '.vc_row.wn-row-' . $uniqid . '', '!important' );
		$adaptive_parallax 	= deep_adaptive_images_css( $wn_bg_image_id, '.vc_row.wn-row-' . $uniqid . ' .wn-parallax-bg', '!important' );
		$style .= $adaptive_row . $adaptive_parallax;

	}
}


// Gradient
$grad_html = '';

if ( ! empty( $row_grad_color_1 ) || ! empty( $row_grad_color_2 ) || ! empty( $row_grad_color_3 ) || ! empty( $row_grad_color_4 ) ) {
	$grad_html = '<div class="wn-grad-row" ></div>';
	$row_grad_direction = $row_grad_direction ? $row_grad_direction : '';
	$row_gradient = deep_gradient( $row_grad_color_1, $row_grad_color_2, $row_grad_color_3, $row_grad_color_4, $row_grad_direction );
	deep_save_dyn_styles('
		.' . $wn_class . ' {
			position: relative;
		}
		.' . $wn_class . ' .wn-grad-row {
			' . $row_gradient . '
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
		}
	');
	$live_page_builders_css .= '.' . $wn_class . ' { position: relative; } .' . $wn_class . ' .wn-grad-row { ' . $row_gradient . ' position: absolute; top: 0; right: 0; bottom: 0; left: 0; }';
}

// Pattern Overlay
$pattern = '';
$color_overlay = '';
$color_overlay .= !empty( $row_pattern_color ) && !empty( $wn_class ) ? '.' . $wn_class . ' .max-overlay { background-color:' . $row_pattern_color . '; } ' : '' ;
$color_overlay .= !empty( $row_pattern_color ) ? '.wn-row-' . $uniqid . ' .max-overlay { background-color:' . $row_pattern_color . '; } ' : '' ;

if ( ! empty( $row_pattern_color ) || ! empty( $row_pattern ) ) {
	$pattern =	'<div class="max-overlay"></div>';
}

$output .= '<div class="container">';
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>' . $parallax_content . $video_host . $pattern;
$output .= $grad_html;
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$style .= $wn_style . $color_overlay;
deep_save_dyn_styles( $style );

// live editor
$live_page_builders_css .= $style;
if ( ! in_array( 'admin-bar', get_body_class() ) ) {

	if ( ! empty( $live_page_builders_css ) ) {

		$output .= '<style>';
			$output .= $live_page_builders_css;
		$output .= '</style>';

	}

}
// update WPBakery Page Builder _wpb_shortcodes_custom_css
deep_save_dyn_styles( $css );

echo '' . $output;

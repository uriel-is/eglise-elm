<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';
extract(shortcode_atts(array(
	// General
	'width'					=> '',
	'parallax_speed_bg'		=> '',
	'parallax_speed_video'	=> '',
	'parallax'				=> '',
	'parallax_image'		=> '',
	'video_bg'				=> '',
	'video_bg_url'			=> '',
	'video_bg_parallax'		=> '',
	'offset'				=> '',
	//Scroll
	'inner_scroll'			=> '',
	'scroll_height_desktop'	=> '',
	'scroll_height_tablet'	=> '',
	'scroll_height_mobile'	=> '',
	//toggle
	'toggle'				=> '',
	'toggle_height_open'	=> '',
	'toggle_width_open'		=> '',
	'toggle_height_close'	=> '',
	'toggle_width_close'	=> '',
	// styling
	'css'					=> '',
	// Animation
	'css_animation'			=> '',
	// ID and Extra Classes
	'el_id'					=> '',
	'el_class'				=> '',
	'wn_class'				=> '',
	// Gradient
	'column_grad_color_1'	=> '',
	'column_grad_color_2'	=> '',
	'column_grad_color_3'	=> '',
	'column_grad_color_4'	=> '',
	'column_grad_direction'	=> '',

), $atts));

wp_enqueue_script( 'wpb_composer_front_js' );

$width 	= wpb_translateColumnWidthToSpan( $width );
$width 	= vc_column_offset_class_merge( $offset, $width );
$uniqid = uniqid();
$live_page_builders_css = '';


$toggle_class = $toggle_icon ='';
if ( $toggle == 'yes') {
	$toggle_class = 'wn-toggle-column';
	$toggle_height_open_out		= $toggle_height_open 	? 'data-toggle_height_open		= "' . $toggle_height_open	 . '"'	: '';
	$toggle_width_open_out 		= $toggle_width_open  	? 'data-toggle_width_open		= "' . $toggle_width_open	 . '"' 	: '';
	$toggle_height_close_out	= $toggle_height_close	? 'data-toggle_height_close		= "' . $toggle_height_close	 . '"'	: '';
	$toggle_width_close_out		= $toggle_width_close 	? 'data-toggle_width_close		= "' . $toggle_width_close	 . '"'	: '';
	$toggle_icon = '<span class="wn-toggle-column-icon" ' . $toggle_height_open_out . $toggle_width_open_out . $toggle_height_close_out . $toggle_width_close_out  . '><i class="icon-arrows-left-double-32"></i></span>';
	deep_save_dyn_styles ( '
		@media only screen and (min-width : 961px) {	
			.wn-toggle-column { height: ' . $toggle_height_open .' ; width: ' . $toggle_width_open . ' ; margin-bottom : -1px; }
		}
	' );
	$live_page_builders_css .= '@media only screen and (min-width : 961px) { .wn-toggle-column { height: ' . $toggle_height_open .' ; width: ' . $toggle_width_open . ' ; margin-bottom : -1px; } } @media only screen and (max-width : 960px) { .wn-toggle-column-icon { display: none; } }';
}

$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	'wn-column-' . $uniqid . '',
	$width,
	$wn_class,
	$toggle_class,
);


if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_col-has-fill';
}

$wrapper_attributes = array();

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}


$extra_class = esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) );
$scroll_class = '';
if ( $inner_scroll == 'yes' ) {
	wp_enqueue_script( 'deep-nicescroll-script', DEEP_ASSETS_URL . 'js/libraries/jquery.nicescroll.js', array( 'jquery' ), null, true );
	$height_desktop_style = $scroll_height_desktop ? ' height: '.$scroll_height_desktop.'; ' : '' ;
	deep_save_dyn_styles ( '.wn-inner-scroll-column { overflow-y: scroll; ' . $height_desktop_style .' } ' );
	$live_page_builders_css .= '.wn-inner-scroll-column { overflow-y: scroll; ' . $height_desktop_style .' }';
	if ( $scroll_height_tablet ) {
		deep_save_dyn_styles ( '	
			@media only screen and (max-width : 960px) {
				.wn-inner-scroll-column { height: ' . $scroll_height_tablet .' }
			}	
		' );
		$live_page_builders_css .= '@media only screen and (max-width : 960px) { .wn-inner-scroll-column { height: ' . $scroll_height_tablet .' } }';
	}
	if ( $scroll_height_mobile ) {
		deep_save_dyn_styles ( '	
			@media only screen and (max-width : 480px) {
				.wn-inner-scroll-column { height: ' . $scroll_height_mobile .' }
			}	
		' );
		$live_page_builders_css .= '@media only screen and (max-width : 480px) { .wn-inner-scroll-column { height: ' . $scroll_height_mobile .' } }';
	}
	$scroll_class = ' wn-inner-scroll-column';
}

// Gradient
$grad_html = '';
if ( ! empty( $column_grad_color_1 ) || ! empty( $column_grad_color_2 ) || ! empty( $column_grad_color_3 ) || ! empty( $column_grad_color_4 ) ) {
	$grad_html = '<div class="wn-grad-column" ></div>';
	$column_grad_direction = $column_grad_direction ? $column_grad_direction : '';
	$column_gradient = deep_gradient( $column_grad_color_1, $column_grad_color_2, $column_grad_color_3, $column_grad_color_4, $column_grad_direction );
	deep_save_dyn_styles('
		.wn-column-' . $uniqid . ', .' . $wn_class . ' {
			position: relative;
		}
		.wn-column-' . $uniqid . ' .wn-grad-column, .' . $wn_class . ' .wn-grad-column {
			' . $column_gradient . '
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
		}
	');
	$live_page_builders_css .= '.wn-column-' . $uniqid . ', .' . $wn_class . ' { position: relative; } .wn-column-' . $uniqid . ' .wn-grad-column, .' . $wn_class . ' .wn-grad-column { ' . $column_gradient . ' position: absolute; top: 0; right: 0; bottom: 0; left: 0; }';

}

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ' >';
$output .= $toggle_icon;
$output .= '<div class="vc_column-inner ' . $extra_class . $scroll_class . ' ">';
$output .= '<div class="wpb_wrapper">';
$output .= $grad_html;
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

// update WPBakery Page Builder _wpb_shortcodes_custom_css
// deep_save_dyn_styles( $css );

// live editor
if ( ! in_array( 'admin-bar', get_body_class() ) ) {

	if ( ! empty( $live_page_builders_css ) ) {

		$output .= '<style>';
			$output .= $live_page_builders_css;
		$output .= '</style>';

	}

}

echo '' . $output;
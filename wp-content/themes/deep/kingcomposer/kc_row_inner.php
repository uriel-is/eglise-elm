<?php

$output = $row_class_container = $row_class = $row_id = $css = '';

//Main Parameters
$output = '';
extract(shortcode_atts(array(
	// General
	'full_height'			=> '',
	'dec_full_height'		=> '',
	'columns_placement'		=> 'top',
	'row_height'			=> '',
	'row_pattern'			=> '',
	'row_pattern_color'		=> '',
	'content_placement'		=> '',
	'row_dark'				=> '',
	'equal_height'			=> '',
	'align_center'			=> '',
	'r_margin_bottom'		=> '',
	'disable_element'		=> '',
	'layer_animation'		=> '',
	// bg image
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
	'css_editor'			=> '',
	// Animation
	'animate'				=> '',
	// ID and Extra Classes
	'el_id'					=> '',
	'el_class'				=> '',
	// Gradient
	'row_grad_color_1'		=> '',
	'row_grad_color_2'		=> '',
	'row_grad_color_3'		=> '',
	'row_grad_color_4'		=> '',
	'row_grad_direction'	=> '',
), $atts));

// Added Parameters
$uniqid = uniqid();
$wn_style = $video_host = $has_video_bg = $live_page_builders_css ='';
$row_dark = ( $row_dark == 'yes' ) ? 'blox dark' : '' ;
$layer_animation = ( $layer_animation != 'none' ) ? $layer_animation : '' ;
$responsive_bg_none = $responsive_bg_none == 'respo-bg-none' ? 'respo-bg-none' : '' ;
$align_center = $align_center == 'aligncenter' ? 'aligncenter' : '' ;
$specific_class = apply_filters( 'kc-el-class', $atts );
// Row Height Style
if ( $row_height ){
	$w_height = ltrim ($row_height);
	if(substr($w_height,-2,2)=="px") {
		deep_save_dyn_styles ( '#wrap .wn-row-'.$uniqid.' { min-height: ' . $w_height . ';} ' );
		$live_page_builders_css .='#wrap .wn-row-'.$uniqid.' { min-height: ' . $w_height . ';} ';
	} else {
		deep_save_dyn_styles ( '#wrap .wn-row-'.$uniqid.' { min-height: ' . $w_height . 'px;} ' );
		$live_page_builders_css .='#wrap .wn-row-'.$uniqid.' { min-height: ' . $w_height . 'px;} ';
	}
}

// Pattern Overlay
$uniqid = uniqid();
$style = '';

$pattern = '';
$color_overlay = '';
$color_overlay .= !empty( $row_pattern_color ) && !empty( $wn_class ) ? '.' . $wn_class . ' .max-overlay { background-color:' . $row_pattern_color . '; } ' : '' ;
$color_overlay .= !empty( $row_pattern_color ) ? '.wn-row-' . $uniqid . ' .max-overlay { background-color:' . $row_pattern_color . '; } ' : '' ;

if ( ! empty( $row_pattern_color ) || ! empty( $row_pattern ) ) {
	$pattern =	'<div class="max-overlay"></div>';
}


$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_row-fluid',
	$el_class,
	// Webnus Classes
	$row_pattern,
	$responsive_bg_none,
	$align_center,
	$row_dark,
	$layer_animation,
	'wn-row-'.$uniqid.'',
	'wn-kc-elm',
);

if ( 'yes' === $disable_element ) {
	$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

// full height

if (  $full_height == 'yes' ) {
	$height_val = $dec_full_height ? 'calc(100vh - ' . $dec_full_height . ') !important' : '100vh !important' ;
	deep_save_dyn_styles ( '#wrap .wn-row-'.$uniqid.' { min-height: ' . $height_val . ';} ' );
	$live_page_builders_css .='#wrap .wn-row-'.$uniqid.' { min-height: ' . $height_val . ';} ';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( $equal_height == 'yes' ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( $r_margin_bottom == 'yes' ) {
	$css_classes[] = 'wn-margin-bottom0';
}


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
		$css_classes[] = 'wn_video-bg-container ';
		$video_host .= '<div class="vc_video-bg vc_hidden-xs wn-kc-video-bg">';
		$video_host	.= '<video  loop autoplay ' . $video_mute . ' preload="auto">';
		$video_host .= ! empty( $mp4_format ) ? '<source src="' . $mp4_format . '" type="video/mp4">' : '';
		$video_host .= ! empty( $webm_format ) ? '<source src="' . $webm_format . '" type="video/webm">' : '';
		$video_host .= ! empty( $ogg_format ) ? '<source src="' . $ogg_format . '" type="video/ogg">' : '';
		$video_host .= esc_html__('Your browser does not support the video tag. I suggest you upgrade your browser.','deep');
		$video_host .= '</video>';
		$video_host .= '</div>';
	elseif ( ( $video_bg_source == 'youtube' ) && ! empty( $video_bg_url ) && kc_youtube_id_from_url( $video_bg_url ) ) :
		// youtube
		$css_classes[] = 'video-background-wrap kc-elm kc_row kc-video-bg';
		wp_register_script('kc-youtube-iframe-api', 'https://www.youtube.com/iframe_api', null, KC_VERSION, true );
		wp_enqueue_script('kc-youtube-iframe-api');
		$wrapper_attributes[] = 'data-kc-video-bg="' . esc_attr( $video_bg_url ) . '"';
	endif;
endif;
// Gradient
$grad_html = '';

if ( ! empty( $row_grad_color_1 ) || ! empty( $row_grad_color_2 ) || ! empty( $row_grad_color_3 ) || ! empty( $row_grad_color_4 ) ) {
	$grad_html = '<div class="wn-grad-row" ></div>';
	$row_grad_direction = $row_grad_direction ? $row_grad_direction : '';
	$row_gradient = deep_gradient( $row_grad_color_1, $row_grad_color_2, $row_grad_color_3, $row_grad_color_4, $row_grad_direction );
	deep_save_dyn_styles('
		.wn-row-'.$uniqid.' {
			position: relative;
		}
		.wn-row-'.$uniqid.' .wn-grad-row {
			' . $row_gradient . '
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
		}
	');
	$live_page_builders_css .='.wn-row-'.$uniqid.' { position: relative; } .wn-row-'.$uniqid.' .wn-grad-row { ' . $row_gradient . ' position: absolute; top: 0; right: 0; bottom: 0; left: 0; }';
}
$css_class = array_merge( $specific_class, $css_classes);
$css_class = implode(' ', $css_class);
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div class="container">';
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>' . $parallax_content . $video_host . $pattern . $grad_html;
$output .= do_shortcode( str_replace('kc_row_inner#', 'kc_row_inner', $content ) );
$output .= '</div>';
$output .= '</div>';
$style .= $color_overlay ;
deep_save_dyn_styles( $style );
$live_page_builders_css .= $style;
// live editor
if ( ! in_array( 'admin-bar', get_body_class() ) ) {

	if ( ! empty( $live_page_builders_css ) ) {

		$output .= '<style>';
			$output .= $live_page_builders_css;
		$output .= '</style>';

	}

}

echo $output;
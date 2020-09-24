<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	// general
	'full_width'			=> '',
	'full_height'			=> '',
	'dec_full_height'		=> '',
	'wn_section_height'		=> '',
	'content_placement'		=> '',
	'sec_pattern'			=> '',
	'sec_pattern_color'		=> '',
	'align_center'			=> '',
	'white_text_color'		=> '',
	'disable_element'		=> '',
	'expandable_row'		=> '',
	'txt_expandable_row'	=> '',
	'color_expandable_row'	=> '',

	// bg image
	'css'					=> '',
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
	// animation
	'css_animation'			=> '',
	// extra class and id
	'el_id'					=> '',
	'el_class'				=> '',
	'wn_class'				=> '',
	// Divider
	'shape_on_top'			=> '',
	'shape_on_bottom'		=> '',
	'top_shape_divider'		=> '2',
	'bottom_shape_divider'	=> '2',
	'top_shape_bgcolor'		=> '',
	'bottom_shape_bgcolor'	=> '',
	// styling
	// 'styling'				=> '',
	// Gradient
	'section_grad_color_1'		=> '',
	'section_grad_color_2'		=> '',
	'section_grad_color_3'		=> '',
	'section_grad_color_4'		=> '',
	'section_grad_direction'	=> '',
), $atts ) );
wp_enqueue_script( 'wpb_composer_front_js' );

$uniqid = uniqid();
$style = '';
$deep_options = deep_options();

$wn_style = $bg_styles = $has_video_bg = $video_host = $live_page_builders_css = '';
$wn_has_video_bg = $video_bg_url || $mp4_format || $webm_format || $ogg_format ? true : false;

$white_text_color = $white_text_color ? 'dark' : '' ;

// extra class
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	' section wn-section blox clearfix',
	$white_text_color,
	$align_center,
	$responsive_bg_none,
	$sec_pattern,
	$el_class,
	$wn_class,
	vc_shortcode_custom_css_class( $css ),
	// vc_shortcode_custom_css_class( $styling ),
);


// Pattern Overlay
$pattern = '';
$color_overlay = $sec_pattern_color ? '.max-overlay-' . $uniqid . ' { background-color:' . $sec_pattern_color . '; } ' : '' ;
if ( ! empty( $sec_pattern_color ) || ! empty( $sec_pattern ) ) {
	$pattern =	'<div class="max-overlay max-overlay-' . $uniqid . '"></div>';
}

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

$css_classes[] = $full_width == 'yes' ? 'stretch_section_content' : 'stretch_section';
$container_class = $full_width == 'yes' ? 'container-fluid' : 'container';

if ( $full_height == 'yes' ) {
	$height_val = $dec_full_height ? 'calc(100vh - ' . $dec_full_height . ') !important' : '100vh !important' ;
	$bg_styles .= ' min-height: ' . $height_val . ';';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_section-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_section-flex';
}

// Row Height Style
if ( $wn_section_height ) {
	$w_height = ltrim( $wn_section_height );
	if( substr( $w_height, -2, 2 ) == 'px' )
		$bg_styles .= ' min-height: ' . $w_height . ';';
	else
		$bg_styles .= ' min-height: ' . $w_height . 'px;';
}

// background color
$bg_styles .= $wn_bg_color ? ' background-color: ' . $wn_bg_color . ';' : '' ;

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

// check Shape Dividers
$shape_on_top_html 		= '';
$shape_on_bottom_html 	= '';
$shape_on_top_svg 		= '';
$shape_on_bottom_svg 	= '';
$uniqid 				= substr(uniqid(rand(),1),0,6);

if ( $top_shape_divider == '2' ) {
	$shape_on_top_svg = '
	<svg>
		<defs>
			<pattern id="shapedivider2" preserveAspectRatio="none" patternUnits="userSpaceOnUse" x="0" y="0" width="55px" height="70px" viewBox="0 0 18 22">
				<path d="M12.056,2.855C13.586,4.788,15.826,6,18,6V0H0v6c2.175,0,4.414-1.213,5.944-3.146C7.729,0.604,10.271,0.604,12.056,2.855">
				</path>
			</pattern>
		</defs>
		<rect x="0" y="0" fill="url(#shapedivider2)"></rect>
	</svg>';
}elseif ( $top_shape_divider == '4' ) {
	$shape_on_top_svg = '
	<svg>
		<defs>
			<pattern id="shapedivider4" preserveAspectRatio="none" patternUnits="userSpaceOnUse" x="0" y="0" width="100%" height="800px" viewBox="0 0 100 800">
			<path d="M100,80V0H0v80C0,80,0,2,50,2S100,80,100,80z"></path></pattern>
		</defs>
		<rect x="0" y="0" fill="url(#shapedivider4)"></rect>
	</svg>';
}elseif ( $top_shape_divider == '9' ) {
	$shape_on_top_svg = '
	<svg viewBox="0 0 100 100" preserveAspectRatio="none">
		<path d="M100,80V0H-10v100C0,80,0,-10,30,2S100,60,110,120z"></path>
	</svg>
	';
}


if ( $bottom_shape_divider == '2' ) {
	$shape_on_bottom_svg = '
	<svg>
		<defs>
			<pattern id="shapedivider2-bottom" preserveAspectRatio="none" patternUnits="userSpaceOnUse" x="0" y="0" width="55px" height="70px" viewBox="0 -13 18 22">
				<path d="M5.944,3.146C4.415,1.213,2.174,0,0,0v6h18V0c-2.175,0-4.414,1.213-5.944,3.146C10.271,5.397,7.729,5.397,5.944,3.146">
				</path>
			</pattern>
		</defs>
		<rect x="0" y="0" fill="url(#shapedivider2-bottom)"></rect>
	</svg>';
}elseif ( $bottom_shape_divider == '4' ) {
	$shape_on_bottom_svg = '
	<svg>
		<defs>
			<pattern id="shapedivider4-bottom" preserveAspectRatio="none" patternUnits="userSpaceOnUse" x="0" y="0" width="100%" height="800px" viewBox="0 0 100 800">
				<path d="M0,0v80h100V0c0,0,0,78-50,78S0,0,0,0z"></path>
			</pattern>
		</defs>
		<rect x="0" y="0" fill="url(#shapedivider4-bottom)"></rect>
	</svg>';
}elseif ( $bottom_shape_divider == '9' ) {
	$shape_on_bottom_svg = '
	<svg viewBox="0 0 100 100" preserveAspectRatio="none">
		<path d="M-1,0v80h104V-11c0,0,0,95-30,90S0,0,0,2z"></path>
	</svg>
	';
}


if ( $shape_on_top == 'yes' ) {
	$shape_on_top_html = '<div class="top-divider-'.$uniqid.' wn-shape-divider wn-shape-top-'.$top_shape_divider.'">';
	$shape_on_top_html .= $shape_on_top_svg;
	$shape_on_top_html .= '</div>';
}

if ( $shape_on_bottom == 'yes' ) {
	$shape_on_bottom_html = '<div class="bottom-divider-'.$uniqid.' wn-shape-divider wn-shape-bottom-'.$bottom_shape_divider.'">';
	$shape_on_bottom_html .= $shape_on_bottom_svg;
	$shape_on_bottom_html .= '</div>';
}

if ( $top_shape_bgcolor ) {
	if ( $top_shape_divider == '1' ){
		deep_save_dyn_styles ( '#wrap .top-divider-'.$uniqid.':before { border-left-color: '.$top_shape_bgcolor.';} ' );
		$live_page_builders_css .= '#wrap .top-divider-'.$uniqid.':before { border-left-color: '.$top_shape_bgcolor.';} ';
	}elseif ( $top_shape_divider == '2' ||  $top_shape_divider == '4' ) {
		deep_save_dyn_styles ( '#wrap .top-divider-'.$uniqid.' path { fill: '.$top_shape_bgcolor.';  } ' );
		$live_page_builders_css .= '#wrap .top-divider-'.$uniqid.' path { fill: '.$top_shape_bgcolor.';  } ';
	}elseif ( $top_shape_divider == '3' ) {
		deep_save_dyn_styles ( '#wrap .top-divider-'.$uniqid.' { background-image: linear-gradient(225deg, '.$top_shape_bgcolor.' 18%, transparent 18%), linear-gradient( -225deg, '.$top_shape_bgcolor.' 18%, transparent 18%);} ' );
		$live_page_builders_css .= '#wrap .top-divider-'.$uniqid.' { background-image: linear-gradient(225deg, '.$top_shape_bgcolor.' 18%, transparent 18%), linear-gradient( -225deg, '.$top_shape_bgcolor.' 18%, transparent 18%);} ';
	}elseif ( $top_shape_divider == '5' ) {
		deep_save_dyn_styles ( '#wrap .top-divider-'.$uniqid.':before, #wrap .top-divider-'.$uniqid.':after { border-top-color: '.$top_shape_bgcolor.';} ' );
		$live_page_builders_css .= '#wrap .top-divider-'.$uniqid.':before, #wrap .top-divider-'.$uniqid.':after { border-top-color: '.$top_shape_bgcolor.';} ';
	}elseif ( $top_shape_divider == '6' ) {
		deep_save_dyn_styles ( '#wrap .top-divider-'.$uniqid.':before, #wrap .top-divider-'.$uniqid.':after  { background : '.$top_shape_bgcolor.';} ' );
		$live_page_builders_css .= '#wrap .top-divider-'.$uniqid.':before, #wrap .top-divider-'.$uniqid.':after  { background : '.$top_shape_bgcolor.';} ';
	}elseif ( $top_shape_divider == '7' ) {
		deep_save_dyn_styles ( '#wrap .top-divider-'.$uniqid.'  { background : '.$top_shape_bgcolor.';  box-shadow: -50px 50px 0 '.$top_shape_bgcolor.', 50px -50px 0 '.$top_shape_bgcolor.';} ' );
		$live_page_builders_css .= '#wrap .top-divider-'.$uniqid.'  { background : '.$top_shape_bgcolor.';  box-shadow: -50px 50px 0 '.$top_shape_bgcolor.', 50px -50px 0 '.$top_shape_bgcolor.';} ';
	}elseif ( $top_shape_divider == '8' ) {
		deep_save_dyn_styles ( '#wrap .top-divider-'.$uniqid.':before  { background-image: -webkit-gradient(linear, 0 0, 10% 100%, color-stop(0.5, '.$top_shape_bgcolor.'), color-stop(0.5, '.$top_shape_bgcolor.')); background-image: linear-gradient(195deg, '.$top_shape_bgcolor.' 49%, transparent 50%); } ' );
		$live_page_builders_css .= '#wrap .top-divider-'.$uniqid.':before  { background-image: -webkit-gradient(linear, 0 0, 10% 100%, color-stop(0.5, '.$top_shape_bgcolor.'), color-stop(0.5, '.$top_shape_bgcolor.')); background-image: linear-gradient(195deg, '.$top_shape_bgcolor.' 49%, transparent 50%); } ';
	}elseif ( $top_shape_divider == '9' ) {
		deep_save_dyn_styles ( '#wrap .top-divider-'.$uniqid.' path { fill: '.$top_shape_bgcolor.'; stroke: '.$top_shape_bgcolor.' } ' );
		$live_page_builders_css .= '#wrap .top-divider-'.$uniqid.' path { fill: '.$top_shape_bgcolor.'; stroke: '.$top_shape_bgcolor.' } ';
	}
	
}

if ( $bottom_shape_bgcolor ) {
	if ( $bottom_shape_divider == '1' ){
		deep_save_dyn_styles ( '#wrap .bottom-divider-'.$uniqid.':before { border-right-color: '.$bottom_shape_bgcolor.';} ' );
		$live_page_builders_css .= '#wrap .bottom-divider-'.$uniqid.':before { border-right-color: '.$bottom_shape_bgcolor.';} ';
	}elseif ( $bottom_shape_divider == '2' ||  $bottom_shape_divider == '4' ) {
		deep_save_dyn_styles ( '#wrap .bottom-divider-'.$uniqid.' path { fill: '.$bottom_shape_bgcolor.'; } ' );
		$live_page_builders_css .= '#wrap .bottom-divider-'.$uniqid.' path { fill: '.$bottom_shape_bgcolor.'; } ';
	}elseif ( $bottom_shape_divider == '3' ) {
		deep_save_dyn_styles ( '#wrap .bottom-divider-'.$uniqid.' { background-image: linear-gradient(315deg, '.$bottom_shape_bgcolor.' 18%, transparent 18%), linear-gradient( 45deg, '.$bottom_shape_bgcolor.' 18%, transparent 18%); ;} ' );
		$live_page_builders_css .= '#wrap .bottom-divider-'.$uniqid.' { background-image: linear-gradient(315deg, '.$bottom_shape_bgcolor.' 18%, transparent 18%), linear-gradient( 45deg, '.$bottom_shape_bgcolor.' 18%, transparent 18%); ;} ';
	}elseif ( $bottom_shape_divider == '5' ) {
		deep_save_dyn_styles ( '#wrap .bottom-divider-'.$uniqid.':before, #wrap .bottom-divider-'.$uniqid.':after { border-bottom-color: '.$bottom_shape_bgcolor.';} ' );
		$live_page_builders_css .= '#wrap .bottom-divider-'.$uniqid.':before, #wrap .bottom-divider-'.$uniqid.':after { border-bottom-color: '.$bottom_shape_bgcolor.';} ';
	}elseif ( $bottom_shape_divider == '6' ) {
		deep_save_dyn_styles ( '#wrap .bottom-divider-'.$uniqid.':before, #wrap .bottom-divider-'.$uniqid.':after  { background : '.$bottom_shape_bgcolor.';} ' );
		$live_page_builders_css .= '#wrap .bottom-divider-'.$uniqid.':before, #wrap .bottom-divider-'.$uniqid.':after  { background : '.$bottom_shape_bgcolor.';} ';
	}elseif ( $bottom_shape_divider == '7' ) {
		deep_save_dyn_styles ( '#wrap .bottom-divider-'.$uniqid.'  { background : '.$bottom_shape_bgcolor.';  box-shadow: -50px 50px 0 '.$bottom_shape_bgcolor.', 50px -50px 0 '.$bottom_shape_bgcolor.';} ' );
		$live_page_builders_css .= '#wrap .bottom-divider-'.$uniqid.'  { background : '.$bottom_shape_bgcolor.';  box-shadow: -50px 50px 0 '.$bottom_shape_bgcolor.', 50px -50px 0 '.$bottom_shape_bgcolor.';} ';
	}elseif ( $bottom_shape_divider == '8' ) {
		deep_save_dyn_styles ( '#wrap .bottom-divider-'.$uniqid.':before  { background-image: -webkit-gradient(linear, 0 0, 10% 100%, color-stop(0.5, '.$bottom_shape_bgcolor.'), color-stop(0.5, '.$bottom_shape_bgcolor.')); background-image: linear-gradient(15deg, '.$bottom_shape_bgcolor.' 49%, transparent 50%); } ' );
		$live_page_builders_css .= '#wrap .bottom-divider-'.$uniqid.':before  { background-image: -webkit-gradient(linear, 0 0, 10% 100%, color-stop(0.5, '.$bottom_shape_bgcolor.'), color-stop(0.5, '.$bottom_shape_bgcolor.')); background-image: linear-gradient(15deg, '.$bottom_shape_bgcolor.' 49%, transparent 50%); } ';
	}elseif ( $bottom_shape_divider == '9' ) {
		deep_save_dyn_styles ( '#wrap .bottom-divider-'.$uniqid.' path { fill: '.$bottom_shape_bgcolor.'; stroke: '.$bottom_shape_bgcolor.' } ' );
		$live_page_builders_css .= '#wrap .bottom-divider-'.$uniqid.' path { fill: '.$bottom_shape_bgcolor.'; stroke: '.$bottom_shape_bgcolor.' } ';
	}
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . ' wn-section-' . $uniqid . '"';

$wn_style .= !empty( $wn_class ) ? '#wrap .' . $wn_class . '{' . $bg_styles . '}' : '';

if ( $deep_options['deep_adaptive_images'] == '1' && ! empty( $css ) ) {
	// Get section background image id
	preg_match('#\((.*?)\)#', $css, $adaptive_section_bg);
	$adaptive_section_bg 			= array_filter($adaptive_section_bg);
	if ( ! empty( $adaptive_section_bg ) ) {
		$adaptive_section_bg 		= $adaptive_section_bg[1];
		$adaptive_section_bg		= explode( '=', $adaptive_section_bg );
		$adaptive_section_bg_id		= $adaptive_section_bg[1];
		if ( ! empty( $adaptive_section_bg_id ) ) {
			$adaptive = deep_adaptive_images_css( $adaptive_section_bg_id, '.wn-section-' . $uniqid, '!important' );
			$adaptive .= !empty($wn_class) ? deep_adaptive_images_css( $adaptive_section_bg_id, '.' . $wn_class, '!important' ) : '';
			$adaptive = $adaptive ? $adaptive : '' ;
			$style .= $adaptive;
		}
	}

}

// Add expandable option to row
$expandable = '';
$expandable_style = '';
if ( $expandable_row == '1' ) {
	$css_classes[] = 'wn-expandable';
	$expandable .= '
	<script>
		jQuery(document).ready(function(){

			jQuery(".wn-section-' . $uniqid . ' .wn-expandable-sec i,.'.$wn_class.' .wn-expandable-sec i").wnExpandable({
				id: "'.$uniqid.'",
				selector: ".wn-section-' . $uniqid . ' .wn-expandable-sec i,.'.$wn_class.' .wn-expandable-sec i"		
			});
			jQuery(".wn-section-' . $uniqid . ' .wn-expandable-sec i,.'.$wn_class.' .wn-expandable-sec i").on("click", function(event) {
				if ( jQuery(".wn-section-' . $uniqid . ' .wn-expandable-sec,.'.$wn_class.' .wn-expandable-sec").hasClass("wn-expanded") ) {
					jQuery(this).closest(".wn-expandable-sec").removeClass("wn-expanded");
				} else {
					jQuery(this).closest(".wn-expandable-sec").addClass("wn-expanded");
				}
			});
		});
	</script>
	';

	$expandable .= '<div class="wn-expandable-sec">';
	$expandable .= ! empty( $txt_expandable_row ) ? '<div class="expandable-sec-text"> '. $txt_expandable_row .' </div>' : '';
	$expandable .= '<i class="sl-plus" data-clickid="0" ></i></div>';
	if ( ! empty( $color_expandable_row ) ) {
		deep_save_dyn_styles('
			.' . $wn_class . ' .wn-expandable-sec i {
				color:'. $color_expandable_row .';
			}
		');
		$live_page_builders_css .= '.' . $wn_class . ' .wn-expandable-sec i { color:'. $color_expandable_row .'; }';
	}
	deep_save_dyn_styles('
		.' . $wn_class . ' .vc_section{
			display: none;
		}
	');
	$live_page_builders_css .= '.' . $wn_class . ' .vc_section{ display: none; }';
}

$grad_html = '';
// Gradient
if ( ! empty( $section_grad_color_1 ) || ! empty( $section_grad_color_2 ) || ! empty( $section_grad_color_3 ) || ! empty( $section_grad_color_4 ) ) {
	$grad_html = '<div class="wn-grad-section"></div>';
	$section_grad_direction = $section_grad_direction ? $section_grad_direction : '';
	$section_gradient = deep_gradient( $section_grad_color_1, $section_grad_color_2, $section_grad_color_3, $section_grad_color_4, $section_grad_direction );
	deep_save_dyn_styles('
		.' . $wn_class . ' {
			position: relative;
		}
		.wn-section-' . $uniqid . ' .wn-grad-section, .' . $wn_class . ' .wn-grad-section {
			' . $section_gradient . '
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
		}
	');
	$live_page_builders_css .= '.' . $wn_class . ' { position: relative; } .wn-section-' . $uniqid . ' .wn-grad-section, .' . $wn_class . ' .wn-grad-section { ' . $section_gradient . ' position: absolute; top: 0; right: 0; bottom: 0; left: 0; }';
}

// render output
$output ='
	<section ' . implode( ' ', $wrapper_attributes ) . '> '. $expandable .'
		' . $grad_html . '
		' . $shape_on_top_html . '
		' . $parallax_content . $video_host . $pattern . '
		<div class="' . $container_class . '" >
			<div class="vc_section" '. $expandable_style .'>
				' . wpb_js_remove_wpautop( $content ) . '
			</div>
		</div>
		' . $shape_on_bottom_html . '
	</section>';

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
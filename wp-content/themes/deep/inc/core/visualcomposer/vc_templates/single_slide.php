<?php
extract( shortcode_atts( array(
  //'maintitle' => '',
  'full_width'          => '',
  'arrow_type'          => 'dotted',
  'arrow_position'      => 'normal',
  'slider_speed'        => '500',
  'el_class'            => '',
  // bg image
  'css'                 => '',
  'wn_bg_color'         => '',
  'bg_position'         => 'center center',
  'bg_repeat'           => 'no-repeat',
  'bg_cover'            => 'yes',
  'bg_attachment'       => '',
  'wn_parallax'         => '',
  'wn_parallax_speed'   => '190',
  'responsive_bg_none'  => '',
  // animation
  'css_animation'     => '',
), $atts ) );

$uniqid = uniqid();
global $cslider_top_space,$cslider_bottom_space,$cslider_left_space,$cslider_right_space;
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$out = $output = $live_page_builders_css = $wn_style ='';

$css_classes = array(
  'content-slider-single',
  $responsive_bg_none,
  $el_class,
  vc_shortcode_custom_css_class( $css ),
  // vc_shortcode_custom_css_class( $styling ),
);

if( current_user_can('editor') || current_user_can('administrator') ) { 
  $notice="Empty tab. Edit page to add content here.";
}else{
   $notice="";
}

// background color
$wn_style .= $wn_bg_color ? ' background-color: ' . $wn_bg_color . ' !important;' : '' ;

// background position
$wn_style .= $bg_position ? ' background-position: ' . $bg_position . ' !important;' : '' ;

// background repeat
$wn_style .= $bg_repeat ? ' background-repeat: ' . $bg_repeat . ' !important;' : '' ;

// background cover
$wn_style .= $bg_cover ? ' background-size: cover !important;' : '' ;

// background attachment
$wn_style .= $bg_attachment ? ' background-attachment: fixed !important;' : '' ;

deep_save_dyn_styles( '
  #content-slider-single-'.$uniqid.' {
    '.$wn_style.'
  }
' );
  // live editor
	$live_page_builders_css .= '#content-slider-single-'.$uniqid.' { '.$wn_style.' }';
	if ( ! in_array( 'admin-bar', get_body_class() ) ) {

		if ( ! empty( $live_page_builders_css ) ) {

			$out .= '<style>';
				$out .= $live_page_builders_css;
			$out .= '</style>';

		}

	}

// background parallax
$parallax_content = '';
if ( $wn_parallax ) :
  $css_classes[] = 'wn-parallax';
  $parallax_content .= '<div class="wn-parallax-bg-holder" data-wnparallax-speed="' . $wn_parallax_speed . '"><div class="wn-parallax-bg"></div></div>';
endif;

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= "\n\t\t\t" . '<div id="content-slider-single-'.$uniqid.'" ' . implode( ' ', $wrapper_attributes ) . '>'.$parallax_content.'';
if ( empty( $full_width ) ) {
  $output .= '<div class="container">';
}
$output .= ($content=='' || $content==' ') ? __($notice, "deep") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
if ( empty( $full_width ) ) {
  $output .= '</div>';
}

$output .= "\n\t\t\t" . '</div> ' ;
echo '' . $output;
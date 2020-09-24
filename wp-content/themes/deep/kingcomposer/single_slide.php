<?php
$output = $wn_style = $parallax_class = $parallax_content = '';
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

// background parallax
if ( $wn_parallax ) :
  $parallax_class = 'wn-parallax';
  $parallax_content .= '<div class="wn-parallax-bg-holder" data-wnparallax-speed="' . $wn_parallax_speed . '"><div class="wn-parallax-bg"></div></div>';
endif;

$css_class = apply_filters( 'kc-el-class', $atts );

$css_class = array_merge( $css_class, array( $responsive_bg_none , $parallax_class ));


if( isset( $class ) )
  array_push( $css_class, $class );

$output .= '<div class="' . esc_attr( implode( ' ', $css_class ) ) . ' wn-kc-elm">';
$output .= "\n\t\t\t" . '<div class="content-slider-single">'.$parallax_content.'';
if ( empty( $full_width ) ) {
  $output .= "<div class=\"container force-container\">";
}
$output .= do_shortcode( str_replace('kc_tab#', 'kc_tab', $content ) );
if ( empty( $full_width ) ) {
  $output .= "</div>";
}
$output .= "\n\t\t\t" . '</div> ' ;
$output .= '</div> ' ;
echo $output;


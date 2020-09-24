<?php
/* main shortcode for Tab Element*/
extract( shortcode_atts( array(
    'center_align'  => '',
), $atts ) );

wp_enqueue_style( 'wn-deep-testimonial-tab', DEEP_ASSETS_URL . 'css/frontend/testimonial-tab/testimonial-tab.css' );		

$uniqid = uniqid();
$out = '';
$centeralign = '';

if( $center_align == 'enable') {
    $centeralign =" aligncenter";
}

$out .= '<div id="wn-testimonial-tab" class="testimonial-tab-' . $uniqid . '" data-id="' . $uniqid . '" >
    <div class="testimonial-tab-items"><div class="testimonial-tabs' . $centeralign .'">' . do_shortcode(  $content ) . '</div></div>
</div>';

echo $out;
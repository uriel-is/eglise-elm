<?php
function deep_distance ($atts, $content = null) {
	extract(shortcode_atts(array(
 	'desktop_type'	=> '10',
 	'phone_type'	=> 'inherit',
	), $atts));
	if ( empty( $desktop_type ) ) $desktop_type == '10';
 	return  '<div class="wn-distance-'.$desktop_type.' wn-distance-mob-'.$phone_type.'"></div>';
}
add_shortcode('distance','deep_distance');
<?php

function deep_onethird( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-4">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_third', 'deep_onethird');
 
 
function deep_onehalf( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-6">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_half', 'deep_onehalf');

 
 
function deep_twothird( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-8">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('two_third', 'deep_twothird');
 
 
 
 
function deep_onefourth( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-3">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_fourth', 'deep_onefourth');
 
 
 
function deep_onesixth( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-2">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_sixth', 'deep_onesixth');
 
 function deep_onetwelfth( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-1">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_twelfth', 'deep_onetwelfth');
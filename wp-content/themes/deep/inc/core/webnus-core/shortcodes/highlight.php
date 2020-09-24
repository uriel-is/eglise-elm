<?php
function deep_highlight1 ($atts, $content = null) {

 	return '<span class="highlight1">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight1','deep_highlight1');

 function deep_highlight2 ($atts, $content = null) {

 	return '<span class="highlight2">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight2','deep_highlight2');

 function deep_highlight3 ($atts, $content = null) {

 	return '<span class="highlight3">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight3','deep_highlight3');

 function deep_highlight4 ($atts, $content = null) {

 	return '<span class="highlight4">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight4','deep_highlight4');
 
 
 function deep_highlight( $atts, $content = null ) {
 	extract( shortcode_atts( array(
 	'type' => '1', 
 	
 	), $atts ) );
	return '<span class="highlight'.$type.'">' . do_shortcode($content) . '</span>';
}
 add_shortcode('highlight','deep_highlight');
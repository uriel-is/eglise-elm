<?php
 
 
function deep_maxone_paragraph ($atts, $content = null) {
	extract(shortcode_atts(array(
		'class'      => ''
	), $atts));
 	return '<p class="max-p">' . do_shortcode($content) . '</p>';
 }
 add_shortcode('max-p','deep_maxone_paragraph');


 // Link (magicmore)
 add_shortcode( 'link', 'deep_magiclink_shortcode' );
function  deep_magiclink_shortcode( $attributes, $content = null ) {
	extract( shortcode_atts( array(
		'url' 	 			=> '#',
		'shortcodeid' 	 	=> '',
		'content_text'		=> 'Readmore',
		'shortcodeclass' 	=> '',
	), $attributes ) );

	$shortcodeid = $shortcodeid ? ' id=' . $shortcodeid . '' : '';
	$shortcodeclass = $shortcodeclass ?  ' ' . $shortcodeclass : '';
	return '<a class="magicmore ' . esc_attr( $shortcodeclass ) . '"  ' . esc_attr( $shortcodeid ) . ' href="'. esc_url( $url ) .'" target="_blank">'. esc_html( $content_text ) . '</a>';
}

 // Lists (ul li)
 function deep_ul( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => '',

 	), $atts));
 	return '<ul class="'. $type . '" >' . do_shortcode($content) . '</ul>';
 }
 add_shortcode('list-ul', 'deep_ul');

 function deep_li( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => '',

 	), $atts));
	return '<li class="'. $type .'">' . do_shortcode($content) . '</li>';
 }
 add_shortcode('li-row', 'deep_li');

 

  // Center
 function deep_center( $atts, $content = null ) {
 	
	return '<div class="aligncenter">' . do_shortcode($content) . '</div>';
 }
 add_shortcode('center', 'deep_center');


  // Span
 function deep_span( $atts, $content = null ) {
 	
	return '<span>' . do_shortcode($content) . '</span>';
 }
 add_shortcode('span', 'deep_span');


  // Row
 function deep_row( $atts, $content = null ) {
 	
	return '<div class="row">' . do_shortcode($content) . '</div>';
 }
 add_shortcode('row', 'deep_row');

 // Row
 function deep_container( $atts, $content = null ) {
 	
	
	return '<section class="container">' . do_shortcode($content) . '</section>';
	
 }
 add_shortcode('container', 'deep_container');

// Horizonal line1
 function deep_hr1( $atts, $content = null ) {
 	return '<hr class="vertical-space1">';
 }
 add_shortcode('line1', 'deep_hr1');
 
// Horizonal line2
 function deep_hr2( $atts, $content = null ) {
 	return '<hr class="vertical-space2">';
 }
 add_shortcode('line2', 'deep_hr2');
 // Clear
 function deep_clear( $atts, $content = null ) {
 	return '<div class="clear"></div>';
 }
 add_shortcode('clear', 'deep_clear');


 
  // Horizonal line
 function deep_hr( $atts, $content = null ) {
 	
extract(shortcode_atts(array(
	'type'    			=> '1',
	'shortcodeclass' 	=> '',
	'shortcodeid' 	 	=> '',

), $atts));
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	return ( $type == '1')?  '<hr class="' . $shortcodeclass . '"  ' . $shortcodeid . '>' : '<hr class="boldbx ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
	
 }
 add_shortcode('line', 'deep_hr');

 
 // Horizonal line
 function deep_thickline( $atts, $content = null ) {
 	return '<hr class="boldbx">';
 }
 add_shortcode('tline', 'deep_thickline');


 // Maxone line
 function deep_maxline( $atts, $content = null ) {
 	return '<span class="max-line"></span>';
 }
 add_shortcode('max-line', 'deep_maxline');
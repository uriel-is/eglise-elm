<?php

// Alerts
function deep_search( $atts, $content = null ) {
 	extract( shortcode_atts( array(
 	'placeholder'		=> '', /* alert-info, alert-success, alert-error */
	'shortcodeclass' 	=> '',
	'shortcodeid' 	 	=> '',
 	), $atts ) );
    if ( empty($placeholder) ) $placeholder = esc_html__('Enter Keywords...' , 'deep');
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
 	$out = '<div class="wn-search-sh ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
    $out .= '<form action="' . esc_url(home_url( '/' )) . '" method="get"><input name="s" type="text" placeholder="'.$placeholder.'" class="wn-search-field" autocomplete="off"> <input type="submit" value="'.esc_html__('Search' , 'deep').'" class="btn"></form>';
    $out .= '</div>';
 	return $out;
 }

 add_shortcode('search', 'deep_search');
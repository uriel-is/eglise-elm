<?php

function deep_dropcap( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type'				=> '1', 
		'dropcap_content'	=> '', 
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',

	), $atts ) );
	
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	$out = '<span class="dropcap'.$type.' ' . $shortcodeclass . '"  ' . $shortcodeid . '>' . $dropcap_content . '</span>';
	return $out;
}

add_shortcode('dropcap','deep_dropcap');

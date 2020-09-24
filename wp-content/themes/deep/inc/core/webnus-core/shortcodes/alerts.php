<?php

// Alerts
function deep_alerts( $atts, $content = null ) {
 	extract( shortcode_atts( array(
		'type'				=> 'info', /* alert-info, alert-success, alert-error */
		'close'				=> 'false', /* display close link */
		'aler_content'		=> esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, odio?', 'deep' ),
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
		'opacity' 	 		=> '',
	), $atts ) );

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id=' . $shortcodeid . '' : '';
	$aler_content		= $aler_content ? $aler_content : '';

 	$out = '<div class="alert alert-'. esc_attr( $type ) . ' ' . esc_attr( $shortcodeclass ) . '"  ' . esc_attr( $shortcodeid ) . '>';
 	if( $close == 'true' ) {
 		$out .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
 	}
 	$out .= $aler_content;
 	$out .= '</div>';
 	return $out;
}

add_shortcode('alert', 'deep_alerts'); ?>
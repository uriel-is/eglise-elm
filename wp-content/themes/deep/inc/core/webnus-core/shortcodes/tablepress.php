<?php

// Alerts
function deep_tablepress( $atts, $content = null ) {
 	extract( shortcode_atts( array(
 	'table_id'			=> '',
	'shortcodeclass' 	=> '',
	'shortcodeid' 	 	=> '',
 	), $atts ) );

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	$out = '<div class="wn-tablepress ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
	
	if ( is_plugin_active( 'tablepress/tablepress.php' ) ) {

		$out .= do_shortcode( '[table id='.$table_id.' /]' );

	} else {

		$out .= esc_html__( 'Please first Install/Activate Tablepress plugin and create a table' , 'deep' );

	}
	
 	$out .= '</div>';

 	return $out;
 }

 add_shortcode('wntablepress', 'deep_tablepress');
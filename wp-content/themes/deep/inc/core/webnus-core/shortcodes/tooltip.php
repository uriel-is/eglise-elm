<?php
function deep_tooltips( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'tooltiptext'		=> 'Tooltip Text',
		'link_target'		=> '',
		'shortcodeid' 	 	=> '',
		'tooltip_link'		=> '',
		'shortcodeclass' 	=> '',
		'tooltip_content'	=> '',
	), $atts));

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id=' . $shortcodeid . '' : '';

	$link_target_tag = '';
	if ( $link_target == 'true' ){
	    $link_target_tag = ' target="_blank" ';
	}
	$out = '<span class="tooltips ' . esc_attr( $shortcodeclass ) . '"  ' . esc_attr( $shortcodeid ) . '>';
	$out .= '<a href="' . $tooltip_link . '" '.$link_target_tag.'>';
	$out .= '<span class="tooltip-content">' . $tooltip_content  . '</span>';
	$out .= '<p>' . esc_html( $tooltiptext ) . '</p>';
	$out .= '</a>';
	$out .= '</span>';
	return $out;
	
}
add_shortcode( 'tooltip','deep_tooltips' );

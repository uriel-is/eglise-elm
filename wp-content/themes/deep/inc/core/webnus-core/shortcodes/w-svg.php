<?php
function deep_icon_svg ($atts, $content = null) {
 	extract(shortcode_atts(array(
		'type'				=> 'svg',
 		'svg_img'			=> '',
 		'svg_color'			=> '',
 		'svg_size'			=> '',
		'svg_align'			=> 'left',
		'svg_link_url'		=> '',
		'link_target'		=> '',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
	), $atts));
	 include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	 
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	$type				= $type ? $type : '';

	if( is_numeric( $svg_img ) )
		$svg_img = wp_get_attachment_url( $svg_img );

	static $uniqid = 0;
	$uniqid++;

	if ( $link_target == 'true' ){
		$link_target_tag = ' target="_blank" ';
	} else {
		$link_target_tag = ' target="_self"';
	}
	
	if ( $type == 'img' ) {
		$out = '<div class="wn-svg-wrap ' . $shortcodeclass . '"  ' . $shortcodeid . '  data-svg="wn-' . $uniqid . '">';
			$out .= '<img src="' . $svg_img . '">';
		$out .= '</div>';
		$style = '';
		$style .= $svg_align ? '.wn-svg-wrap[data-svg="wn-' . $uniqid . '"] { text-align: ' . $svg_align . '; }' : '';
		$style .= $svg_size ? '.wn-svg-wrap[data-svg="wn-' . $uniqid . '"] img { height: auto; width: ' . $svg_size . '; }' : '';
		deep_save_dyn_styles( $style );

	} else {

		$svg = deep_get_file_content( $svg_img );
		$svg = find_string( $svg, '<svg', '</svg>' );
		$svg = str_replace( 'Layer_1', 'wn-'.$uniqid , $svg );
	
		$out = '<div class="wn-svg-wrap ' . $shortcodeclass . '"  ' . $shortcodeid . '  data-svg="wn-' . $uniqid . '">';
		if ( !empty( $svg_link_url ) ) {
			$out .= '<a href="' . $svg_link_url . '" ' . $link_target_tag . '>';
		}
			$out .= '<svg' . $svg . '</svg>';
		if ( !empty($svg_link_url) ) {
			$out .= '</a>';
		}
		$out .= '</div>';
		
		$style = '';
		$style .= $svg_align ? '.wn-svg-wrap[data-svg="wn-' . $uniqid . '"] { text-align: ' . $svg_align . '; }' : '';
		$style .= $svg_color ? '#wrap .wn-svg-wrap[data-svg="wn-' . $uniqid . '"] svg * { stroke: ' . $svg_color . '; }' : '';
		$style .= $svg_size ? '.wn-svg-wrap[data-svg="wn-' . $uniqid . '"] svg { height: auto; width: ' . $svg_size . '; }' : '';
		deep_save_dyn_styles( $style );

	}

	return $out;
}
add_shortcode('icon_svg','deep_icon_svg');

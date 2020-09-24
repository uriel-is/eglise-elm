<?php
function deep_icon( $atts, $content = null ) {
	extract(shortcode_atts(array(	
		'name'				=> '',
		'link'      		=> '',
		'link_class'    	=> '',
		'size'				=> '',
		'color'				=> '',
		'padding' 			=> '',
		'bg_color' 			=> '',
		'border_radius' 	=> '',
		'el_class' 			=> '',
		'link_target'		=> '',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',		
	), $atts));
	
	$link_target_tag = '';
	if ( $link_target == 'true' ) {
		$link_target_tag = ' target="_blank" ';
	}

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id=' . $shortcodeid . '' : '';

	static $uniqid = 0;
	$uniqid++;
	$style		= $live_page_builders_css = '';
	
	if( $size )  $style .= ' .wn-icon-' . $uniqid . ' { font-size:' . deep_pixel_separate( $size ) . '; }';
	if( $color ) $style .= ' .wn-icon-' . $uniqid . ' { color:' . $color . '; }';
	if( $bg_color ) $style .= ' .wn-icon-' . $uniqid . ' { background-color:' . $bg_color. '; }';
	if( $padding ) $style .= ' .wn-icon-' . $uniqid . ' { padding:' . deep_pixel_separate( $padding ) . '; }';
	if( $border_radius ) $style .= ' .wn-icon-' . $uniqid . ' { border-radius:' . deep_pixel_separate( $border_radius ) . '; }';
	
	$out = $class = '';
	$class .= $link_class ? $link_class : '';
	$class .= $shortcodeclass ? $shortcodeclass : '';
	$class = $class ? 'class=' . $class . '' : '';
	
	if( !empty( $link ) ) {
		$out .= '
		<a href="'. esc_url($link) .'" ' . esc_attr( $class ) . ' ' . esc_attr( $link_target_tag ) . ' ' . esc_attr( $shortcodeid ) . '>
		<i class="wn-icon-' . $uniqid . ' '. $name . ' ' . $el_class . '"></i>
		</a>';
	}
	else {
		$out .= '<i class="wn-icon-' . $uniqid . ' '. $name . ' ' . $el_class . ' "></i>';
	}
	
	deep_save_dyn_styles( $style );

	// live editor
	$live_page_builders_css .= $style;
	if ( ! in_array( 'admin-bar', get_body_class() ) ) {

		if ( ! empty( $live_page_builders_css ) ) {

			$out .= '<style>';
				$out .= $live_page_builders_css;
			$out .= '</style>';

		}

	}
	return $out;

	
}
add_shortcode('icon','deep_icon');


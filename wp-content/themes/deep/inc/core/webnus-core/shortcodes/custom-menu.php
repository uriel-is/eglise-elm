<?php
function deep_custom_menu ( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'menu'				=> '',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',

	), $atts ) );

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	$uniqid 			= substr(uniqid(rand(),1),0,7);
	if ( is_nav_menu( $menu ) ) {
		$menu_out = wp_nav_menu( array(
			'menu'			=> $menu,
			'container'		=> false,
			'menu_id'		=> 'custom-nav'.$uniqid,
			'depth'			=> '5',
			'fallback_cb'	=> 'wp_page_menu',
			'items_wrap'	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'echo'			=> false,
			'walker'		=> new wn_description_walker(),
		));

	
		return '<div class="wn-custom-menu ' . $shortcodeclass . '" ' . $shortcodeid . '>' . $menu_out . '</div>';
	}
}

add_shortcode('custom-menu','deep_custom_menu');
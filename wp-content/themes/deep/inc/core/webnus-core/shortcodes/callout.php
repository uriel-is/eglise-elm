<?php
function deep_callout_shortcode($attributes, $content)
{
	extract(shortcode_atts(array(
	"title" 		 => '',
	"text" 			 => '',
	"button_text" 	 => '',
	"button_link" 	 => '',
	'link_target'	 => 'false',
	'shortcodeclass' => '',
	'shortcodeid' 	 => '',
		), $attributes));
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	$link_target_tag 	= '';
	if ( $link_target == 'true' ){
		$link_target_tag = ' target="_blank" ';
	}
	$out = '<article class="callout ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
	$out .='<a class="callurl" href="'. esc_url($button_link) .'"  '.$link_target_tag.' >'. $button_text .'</a>';
	$out .='<h3>'. $title .'</h3>';
	$out .='<p>'. $text .'</p>';
	$out .='</article>';
	  
	return $out;
}
add_shortcode("callout", 'deep_callout_shortcode');
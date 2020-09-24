<?php


function deep_pie($attributes, $content){

	extract(shortcode_atts(array(
	
	"percent" => '50',
	"text"=>''
	), $attributes));

$out = '<div class="pie" data-percent="'.$percent.'"><span>'.$percent.'</span>%<br><p>'.$text.' </p></div>';

return $out;
}

add_shortcode("progresspie", "deep_pie");
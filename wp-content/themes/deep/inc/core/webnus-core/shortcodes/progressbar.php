<?php


function deep_progressbar_shortcode($attributes, $content){

	extract(shortcode_atts(array(
	"type" => 'info',
	"percent" => '50',
	"text"=>''
	), $attributes));

$out = '<div class="progress progress-'.$type.' progress-striped" data-progress="'.$percent.'">';
$out .= '<div class="bar">'.$text.' - <small>'.$percent.'%</small></div>';
$out .= '</div>';

return $out;
}

add_shortcode("progress", "deep_progressbar_shortcode");
?>
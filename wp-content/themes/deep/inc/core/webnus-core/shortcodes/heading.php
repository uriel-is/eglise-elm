<?php
function deep_h1 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h1 class="'. $class .'">' . do_shortcode($content) . '</h1>';
 }
 add_shortcode('h1','deep_h1');
 
 function deep_h2 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h2 class="'. $class .'">' . do_shortcode($content) . '</h2>';
 }
 add_shortcode('h2','deep_h2');
 
 function deep_h3 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h3 class="'. $class .'">' . do_shortcode($content) . '</h3>';
 }
 add_shortcode('h3','deep_h3');
 
 function deep_h4 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h4 class="'. $class .'">' . do_shortcode($content) . '</h4>';
 }
 add_shortcode('h4','deep_h4');
 
 function deep_h5 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h5 class="'. $class .'">' . do_shortcode($content) . '</h5>';
 }
 add_shortcode('h5','deep_h5');
 
 function deep_h6 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h6 class="'. $class .'">' . do_shortcode($content) . '</h6>';
 }
 add_shortcode('h6','deep_h6');
 
 
 function deep_strong ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<strong class="'. $class .'">' . do_shortcode($content) . '</strong>';
 }
 add_shortcode('strong','deep_strong');
 
 function deep_br ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<br class="'. $class .'">';
 }
 add_shortcode('br','deep_br');
 
  function deep_div ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<div class="'. $class .'">'.do_shortcode($content). '</div>';
 }
 add_shortcode('div','deep_div');
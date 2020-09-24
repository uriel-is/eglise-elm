<?php

$counter = uniqid();

if( current_user_can('editor') || current_user_can('administrator') ) { 
  $notice="Empty tab. Edit page to add content here.";
}else{
   $notice="";
}

$maincontent ='';
$maincontent = ($content=='' || $content==' ') ? __($notice, "deep") : "\n\t\t\t\t". wpb_js_remove_wpautop($content)  ;

$output = '';
$output .= '<div id="' . $counter . '" class="content-carousel">' . $maincontent . '</div>';

echo '' . $output;
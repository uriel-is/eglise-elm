<?php

$counter = uniqid();

if( current_user_can('editor') || current_user_can('administrator') ) { 
  $notice="Empty tab. Edit page to add content here.";
}else{
   $notice="";
}

$maincontent = do_shortcode( str_replace('kc_tab#', 'kc_tab', $content ) );

$output = '';
$output .= '<div id="' . $counter . '" class="content-carousel">' . $maincontent . '</div>';

echo $output;
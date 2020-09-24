<?php
extract( shortcode_atts( array(
  'alias'        => '',
), $atts ) );
$output = do_shortcode( '[rev_slider '.$alias.']' ) ;

echo $output;

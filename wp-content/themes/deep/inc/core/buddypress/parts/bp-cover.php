<?php
// Chnag Cover Size
function your_theme_xprofile_cover_image( $settings = array() ) {
    $settings['width']  = 1120;
    $settings['height'] = 440;
 
    return $settings;
}
add_filter( 'bp_before_xprofile_cover_image_settings_parse_args', 'your_theme_xprofile_cover_image', 10, 1 );

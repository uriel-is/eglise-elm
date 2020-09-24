<?php 

// Text param
vc_add_shortcode_param( 'text', 'text_settings_field' );

function text_settings_field( $settings, $value ) {
    $settings['type']           = isset ( $settings['type'] ) ? $settings['type'] : '' ;
    $settings['param_name']     = isset ( $settings['param_name'] ) ? $settings['param_name'] : '' ;
    $settings['options']        = isset ( $settings['options'] ) ? $settings['options'] : '' ;
    $uniqid                     = substr(uniqid(rand(),1),0,7);
    
    $output = '<div class="wn-text-wrap wn-text' . esc_attr( $uniqid ) . '">';
    $output .= esc_attr( $value );
    $output .= '</div>';

    return $output;
}
<?php 

// disable param
vc_add_shortcode_param( 'disable', 'disable_settings_field' );

function disable_settings_field( $settings, $value ) {
    $settings['type']           = isset ( $settings['type'] ) ? $settings['type'] : '' ;
    $settings['param_name']     = isset ( $settings['param_name'] ) ? $settings['param_name'] : '' ;
    $settings['options']        = isset ( $settings['options'] ) ? $settings['options'] : '' ;
    $uniqid                     = substr(uniqid(rand(),1),0,7);
    $output                     = '';


        $output .= '
        <div class="wn-disable-wrap wn-disable' . esc_attr( $uniqid ) . '">
            <input
                type="hidden"
                name="' . esc_attr( $settings['param_name'] ) . '"
                class="wpb_vc_param_value"
                value="' . esc_attr( $value ) . '"
                disabled
            >
        </div>';


    return $output;

}
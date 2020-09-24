<?php 

add_action( 'admin_enqueue_scripts', 'deep_radio_param_scripts' );
function deep_radio_param_scripts() {
    // css
    wp_enqueue_style( 'deep-radio', DEEP_CORE_URL . 'visualcomposer/params/radio/assets/css/radio.css' );
}

// radio select param
vc_add_shortcode_param( 'radio', 'radio_settings_field' );

function radio_settings_field( $settings, $value ) {
    $settings['type']           = isset ( $settings['type'] ) ? $settings['type'] : '' ;
    $settings['param_name']     = isset ( $settings['param_name'] ) ? $settings['param_name'] : '' ;
    $settings['options']        = isset ( $settings['options'] ) ? $settings['options'] : '' ;
    $uniqid                     = uniqid();
    $output                     = '';

    if ( $settings['options'] ) :

        $output .= '
        <div class="wn-radio-wrap  wn-radio-select-wrap wn-radio-select' . esc_attr( $uniqid ) . '">
            <input
                type="hidden"
                name="' . esc_attr( $settings['param_name'] ) . '"
                class="wpb_vc_param_value"
                value="' . esc_attr( $value ) . '"
            >';

        foreach ( $settings['options'] as $key ) :

            $checked = '';

            if ( $key == $value ) {
                $checked = ' checked';
            }

            $output .= '
                <input
                    type="radio"
                    name="' . esc_attr( $settings['param_name'] ) . '"
                    id="wn_label' . esc_attr( $uniqid . $key ) . '"
                    value="' . esc_attr( $key ) . '"
                    ' . $checked . '
                >
                <label for="wn_label' . esc_attr( $uniqid . $key ) . '" class="wn-' . esc_attr( $key ) . ' wn-label' . esc_attr( $checked ) . '">' . esc_html( $key ) . '</label>';

        endforeach;

        $output .= '
            </div>

            <script>
                jQuery( ".wn-radio-select' . esc_attr( $uniqid ) . '" ).find( "input[type=radio]" ).change( function() {
                    var main_key = jQuery(this).val();
                    jQuery( ".wn-radio-select' . esc_attr( $uniqid ) . '" ).find( ".wn-label" ).removeClass( "checked" );
                    jQuery(this).parent().addClass( "checked" );
                    jQuery(this).closest( ".wn-radio-select-wrap" ).find( "input.wpb_vc_param_value[type=hidden]" ).val( main_key );
                });
            </script>';

    endif; // end $settings['options']

    return $output;

} // end radio select func
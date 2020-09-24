<?php 

add_action( 'admin_enqueue_scripts', 'deep_imageselect_param_scripts' );
function deep_imageselect_param_scripts() {
    // css
    wp_enqueue_style( 'deep-imageselect', DEEP_CORE_URL . 'visualcomposer/params/imageselect/assets/css/imageselect.css' );
}

// image select param
vc_add_shortcode_param( 'imageselect', 'imageselect_settings_field' );

function imageselect_settings_field( $settings, $value ) {
    $settings['type']           = isset ( $settings['type'] ) ? $settings['type'] : '' ;
    $settings['param_name']     = isset ( $settings['param_name'] ) ? $settings['param_name'] : '' ;
    $settings['options']        = isset ( $settings['options'] ) ? $settings['options'] : '' ;
    $uniqid                     = substr(uniqid(rand(),1),0,7);
    $output                     = '';

    if ( $settings['options'] ) :

        $output .= '
        <div class="wn-image-select-wrap wn-image-select' . esc_attr( $uniqid ) . '">
            <input
                type="hidden"
                name="' . esc_attr( $settings['param_name'] ) . '"
                class="wpb_vc_param_value"
                value="' . esc_attr( $value ) . '"
            >';

        foreach ( $settings['options'] as $key => $address ) :

            $checked = '';

            if ( $key == $value ) {
                $checked = ' checked';
            }

            $output .= '
                <label for="wn_label' . esc_attr( $uniqid . $key ) . '" class="wn-label' . esc_attr( $checked ) . '">
                    <span class="checked-element"><i class="ti-check"></i></span>
                    <input
                        type="radio"
                        name="' . esc_attr( $settings['param_name'] ) . '"
                        id="wn_label' . esc_attr( $uniqid . $key ) . '"
                        value="' . esc_attr( $key ) . '"
                        ' . $checked . '
                    >
                    <img src="' . esc_url( $address ) . '">
                </label>';

        endforeach;

        $output .= '
            </div>

            <script>
                jQuery( ".wn-image-select' . esc_attr( $uniqid ) . '" ).find( "input[type=radio]" ).change( function() {
                    var main_key = jQuery(this).val();
                    jQuery( ".wn-image-select' . esc_attr( $uniqid ) . '" ).find( ".wn-label" ).removeClass( "checked" );
                    jQuery(this).parent().addClass( "checked" );
                    jQuery(this).closest( ".wn-image-select-wrap" ).find( "input.wpb_vc_param_value[type=hidden]" ).val( main_key );
                });
            </script>';

    endif; // end $settings['options']

    return $output;

} // end image select func
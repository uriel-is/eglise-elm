<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$revslider_array = '';
if ( is_plugin_active( 'revslider/revslider.php' ) ) {
    $slider = new RevSlider();
    $arrSliders = $slider->getArrSliders();
    $revsliders_alias = $revsliders_name = array();
    if ( $arrSliders ) {
        foreach ( $arrSliders as $slider ) {
            /** @var $slider RevSlider */
            $revsliders_alias[ $slider->getTitle() ] = $slider->getAlias();
            $revsliders_name[ $slider->getTitle() ] = $slider->getTitle();
        }
    } else {
        $revsliders_alias[ __( 'No sliders found', 'deep' ) ] = 0;
        $revsliders_name[ __( 'No sliders found', 'deep' ) ] = __( 'No sliders found', 'deep' );
    }
    $revslider_array  = array_combine($revsliders_alias, $revsliders_name);
}
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'rev_slider_vc' => array(
                'name'          => esc_html__( 'Revolution Slider', 'deep' ),
                'description'   => esc_html__( 'Select Slider', 'deep' ),
                'icon'          => 'webnus-revslider',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'alias',
                            'label'         => esc_html__( 'Select Slider', 'deep' ),
                            'type'          => 'select',
                            'options'       => $revslider_array,
                        ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
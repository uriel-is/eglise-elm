<?php
if ( ! defined( 'WNPW_DIR' ) ) {
	return;
}
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'prayerwall-form' => array(
                'name'          => esc_html__( 'Prayer wall form', 'deep' ),
                'description'   => esc_html__( 'Show Prayer Wall Form', 'deep' ),
                'icon'          => 'webnus-prayerwall-form',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => '',
                            'label'         => esc_html__( 'Prayer Wall Form', 'deep' ),
                            'type'          => '',                            
                            'description' => esc_html__( 'Show Prayer Wall Form', 'deep' ),
                        ),                      
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
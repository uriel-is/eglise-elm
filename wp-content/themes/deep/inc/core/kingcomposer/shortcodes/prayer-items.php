<?php
if ( ! defined( 'WNPW_DIR' ) ) {
	return;
}
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'prayerwall-items' => array(
                'name'          => esc_html__( 'Prayer wall items', 'deep' ),
                'description'   => esc_html__( 'Show Prayer Wall items', 'deep' ),
                'icon'          => 'webnus-prayerwall-items',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => '',
                            'label'         => esc_html__( 'Prayer wall items', 'deep' ),
                            'type'          => '',                            
                            'description' => esc_html__( 'Show Prayer Wall items', 'deep' ),
                        ),                      
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
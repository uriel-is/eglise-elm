<?php
if ( ! defined( 'WNPW_DIR' ) ) {
	return;
}
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'review-items' => array(
                'name'          => esc_html__( 'Review items', 'deep' ),
                'description'   => esc_html__( 'Show review items', 'deep' ),
                'icon'          => 'webnus-review-items',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => '',
                            'label'         => esc_html__( 'Review items', 'deep' ),
                            'type'          => '',                            
                            'description' => esc_html__( 'Show Review items', 'deep' ),
                        ),                      
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
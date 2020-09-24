<?php
if ( ! defined( 'WNPW_DIR' ) ) {
	return;
}
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'wn-review-form' => array(
                'name'          => esc_html__( 'Review form', 'deep' ),
                'description'   => esc_html__( 'Show Review Form', 'deep' ),
                'icon'          => 'webnus-review-form',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => '',
                            'label'         => esc_html__( 'Review Form', 'deep' ),
                            'type'          => '',                            
                            'description' => esc_html__( 'Show Review Form', 'deep' ),
                        ),                      
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
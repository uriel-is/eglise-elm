<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'distance' => array(
                'name'          => esc_html__( 'Distance', 'deep' ),
                'description'   => esc_html__( 'Blank Space', 'deep' ),
                'icon'          => 'webnus-distance',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'desktop_type',
                            'label'         => esc_html__( 'Desktop Blank Space', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '10'   => '10px',
                                '20'   => '20px',
                                '30'   => '30px',
                                '40'   => '40px',
                                '50'   => '50px',
                                '60'   => '60px',
                                '70'   => '70px',
                                '80'   => '80px',
                                '90'   => '90px',
                                '100'  => '100px',
                            ),
                            'description' => esc_html__( 'How much empty desktop space would you like to add?', 'deep' ),
                        ),
                        array(
                            'name'          => 'phone_type',
                            'label'         => esc_html__( 'Phone Blank Space', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'inherit' => 'inherit',
                                '0' 	  => '0px',
                                '10'      => '10px',
                                '20'      => '20px',
                                '30'      => '30px',
                                '40'      => '40px',
                                '50'      => '50px',
                                '80'      => '80px',
                                '100'     => '100px',
                            ),
                            'description' => esc_html__( 'How much empty phone space would you like to add?', 'deep' ),
                        ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'line' => array(
                'name'          => esc_html__( 'Line', 'deep' ),
                'description'   => esc_html__( 'Horizonal line', 'deep' ),
                'icon'          => 'webnus-line',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Line Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'   => 'Line',
                                '2'   => 'Thick Line',
                            ),
                            'description'   => esc_html__( 'Select the Line type', 'deep'),
                        ),
                    ),
                    'Class & ID' => array(
                        array(
                            'name'          => 'shortcodeclass',
                            'label'         => esc_html__('Extra Class', 'deep'),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'shortcodeid',
                            'label'         => esc_html__('ID', 'deep'),
                            'type'          => 'text',
                        ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'dropcap' => array(
                'name'          => esc_html__( 'Dropcap', 'deep' ),
                'description'   => esc_html__( 'Dropcap', 'deep' ),
                'icon'          => 'webnus-dropcap',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Dropcap Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'   => 'Dropcap 1',
                                '2'   => 'Dropcap 2',
                                '3'   => 'Dropcap 3',
                            ),
                            'description'   => esc_html__( 'Specify the Dropcap type', 'deep'),
                        ),
                        array(
                            'name'          => 'dropcap_content',
                            'label'         => esc_html__( 'Dropcap Character', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Specify the Dropcap Text', 'deep'),
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
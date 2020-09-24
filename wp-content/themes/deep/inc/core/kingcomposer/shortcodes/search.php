<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'search' => array(
                'name'          => esc_html__( 'Search', 'deep' ),
                'description'   => esc_html__( 'Search box', 'deep' ),
                'icon'          => 'webnus-alert',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'placeholder',
                            'label'         => esc_html__('Placeholder Text', 'deep'),
                            'type'          => 'text',
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
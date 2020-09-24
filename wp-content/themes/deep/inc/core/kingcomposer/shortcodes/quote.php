<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'quote' => array(
                'name'          => esc_html__( 'Quote', 'deep' ),
                'description'   => esc_html__( 'Quote', 'deep' ),
                'icon'          => 'webnus-quote',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'name',
                            'label'         => esc_html__( 'Name', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the Name', 'deep'),
                        ),
                        array(
                            'name'          => 'name_sub',
                            'label'         => esc_html__( 'Name Subtitle', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the Name Subtitle', 'deep'),
                        ),
                        array(
                            'name'          => 'text',
                            'label'         => esc_html__( 'Content', 'deep' ),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Enter the Quote of the Week content text', 'deep'),
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
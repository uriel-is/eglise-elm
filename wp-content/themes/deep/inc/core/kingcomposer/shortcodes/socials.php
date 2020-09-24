<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'webnus-socials' => array(
                'name'          => esc_html__( 'Socials', 'deep' ),
                'description'   => esc_html__( 'socials', 'deep' ),
                'icon'          => 'webnus-socials',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'   => 'Type 1',
                                '2'   => 'Type 2',
                                '3'   => 'Type 3',
                                '4'   => 'Type 4',
                                ),
                            'description'   => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
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
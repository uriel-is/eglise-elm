<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'countdown' => array(
                'name'          => esc_html__( 'Countdown', 'deep' ),
                'description'   => esc_html__( 'Countdown', 'deep' ),
                'icon'          => 'webnus-countdown',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Style', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'type-1' => 'Type 1',
                                'type-2' => 'Type 2',
                                'type-3' => 'Type 3',
                                'type-4' => 'Type 4 (flip)',
                                'type-5' => 'Type 5',
                            ),
                            'description'   => esc_html__( 'Select Countdown Type', 'deep'),
                        ),
                        array(
                            'name'          => 'datetime',
                            'label'         => esc_html__( 'Date and Time', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter date and time (October 13, 2018 11:13:00)', 'deep'),
                        ),
                        array(
                            'name'          => 'done',
                            'label'         => esc_html__( 'Finished text', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Finished text', 'deep'),
                        ),
                        array(
                            'name'          => 'content_color',
                            'label'         => esc_html__('Content color (leave bank for default color)', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select content color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => 'minimal',
                            ),
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
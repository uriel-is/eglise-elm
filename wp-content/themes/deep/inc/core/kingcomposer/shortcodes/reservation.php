<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'reservation' => array(
                'name'          => esc_html__( 'Reservation', 'deep' ),
                'description'   => esc_html__( 'Book a Table', 'deep' ),
                'icon'          => 'webnus-reservation',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                                                array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'    => 'Type 1',
                                '2'    => 'Type 2',
                                '3'    => 'Type 3',
                            ),
                            'description'   => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                        ),
                        array(
                            'name'          => 'restaurant_id',
                            'label'         => esc_html__( 'Open Table Restaurant ID', 'deep' ),
                            'type'          => 'text',
                            'value'			=> '53425',
                        ),
                        array(
                            'name'          => 'description',
                            'label'         => esc_html__( 'Description', 'deep' ),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Openning hour is 7:00 am - 11:00 pm every day on week', 'deep' ),
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
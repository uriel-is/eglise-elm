<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'ourclients' => array(
                'name'          => esc_html__( 'Our Clients', 'deep' ),
                'description'   => esc_html__( 'Our Clients', 'deep' ),
                'icon'          => 'webnus-ourclients',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'  =>  "Grid",
                                '2'  =>  "Carousel",
                                //'3'  =>  "Zoom",
                                '4'  =>  "Simple",
                                '5'  =>  "Simple Carousel",
                                '6'  =>  "Carousel 2",
                            ),
                        ),
                        array(
                            'name'          => 'client_images',
                            'label'         => esc_html__( 'Clients Image', 'deep' ),
                            'type'          => 'attach_images',
                            'description'   => esc_html__( 'OurClients Images', 'deep'),
                        ),
                        array(
                            'name'          => 'image_filter',
                            'label'         => esc_html__( 'Greyscale Images' , 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'enable'   => 'Enable',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Set filter on images.' , 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '1' , '2' , '4' , '5' ),
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
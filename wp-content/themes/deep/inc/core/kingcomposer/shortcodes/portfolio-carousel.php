<?php
if (function_exists('kc_add_map')) {
    kc_add_map(
        array(
            'portfolio-carousel' => array(
                'name'          => esc_html__( 'Portfolio Carousel', 'deep' ),
                'description'   => esc_html__( 'Portfolio Carousel Element', 'deep' ),
                'icon'          => 'webnus-portfolio-carousel',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                      array(
                          'name'          => 'type',
                          'label'         => esc_html__( 'Type', 'deep' ),
                          'type'          => 'select',
                          'options'       => array(
                              '1'  => 'Type 1',
                              '2'  => 'Type 2',
                          ),
                      ),
                        array(
                            'name'          => 'carousel_count',
                            'label'         => esc_html__( 'Carousel Count', 'deep' ),
                            'type'          => 'text',
                            'value'         => '10',
                            'description'   => esc_html__( 'Default: 10', 'deep'),
                        ),
                        array(
                            'name'          => 'title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '2' ),
                            ),
                        ),
                        array(
                            'name'          => 'enable_title',
                            'label'         => esc_html__( 'Show Title' , 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'enable'   => 'Enable',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Enable and disable title' , 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '1' ),
                            ),
                        ),
                        array(
                            'name'          => 'enable_content',
                            'label'         => esc_html__( 'Show Content' , 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'enable'   => 'Enable',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Enable and disable title' , 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '1' ),
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

<?php
if (function_exists('kc_add_map')) {
    kc_add_map(
        array(
            'deep-instagram' => array(
                'name'          => esc_html__( 'Instagram', 'deep' ),
                'description'   => esc_html__( 'Deep Instagram', 'deep' ),
                'icon'          => 'webnus-instagram',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                       array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'default'  => 'Default',
                                'carousel'  => 'Carousel',
                                'grid'  => 'Grid',
                            ),
                            'description'   => esc_html__( 'Select shortcode type', 'deep'),
                        ),
                        array(
                            'name'          => 'insta_access_token',
                            'label'         => esc_html__( 'Access Token', 'deep' ),
                            'type'          => 'text',
                            'description'   => wp_kses ( __( 'Access Token ( For access token please read <a href="https://youtu.be/WTBqQQN910A?list=PLlzlPp2QQwz6gB6TJ5UT0EnDGflFRNr8O" target="_blank">this link</a> )', 'deep' ), array('a' => array( 'href' => array(), 'target' => array(), ), ) ),
                        ),
                        array(
                            'name'          => 'insta_user',
                            'label'         => esc_html__( 'Username', 'deep' ),
                            'type'          => 'text',
                            'description'	=> esc_html__( 'Instagram Username', 'deep'),
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

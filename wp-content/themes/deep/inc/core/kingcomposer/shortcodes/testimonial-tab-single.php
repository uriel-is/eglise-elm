<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'testimonial_single_tab' => array(
                'name'         => esc_html__( 'Single Testimonial Tab', 'deep' ),
                'system_only'  => true, // Don't show as an element on list elements
                'title'        => 'Tab Settings',
                'is_container' => true,
                'category'     => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'       => array(
                    'general' => array(
                        array(
                            'name'          => 'title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'img',
                            'label'         => esc_html__( 'Testimonial Image', 'deep' ),
                            'type'          => 'attach_image',
                        ),
                        array(
                            'name'          => 'name',
                            'label'         => esc_html__( 'Testimonial Name', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'job',
                            'label'         =>  esc_html__( 'Testimonial Job', 'deep' ),
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
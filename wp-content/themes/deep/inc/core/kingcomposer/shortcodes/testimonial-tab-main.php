<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'testimonial_tab_element' => array(
                'name'         => esc_html__('Testimonial Tab',"deep"),
                'description'  => esc_html__('Create Testimonial Tab','deep'),
                'title'        => 'Tabs Settings',
                'is_container' => true,
                'views'        => array(
                    'type'     => 'views_sections',
                    'sections' => 'testimonial_single_tab' // this is children item was added above
                ),
                'icon'          => 'webnus-testimonial-tab',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'center_align',
                            'label'         => esc_html__( 'Testimonial Center Align', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'enable'   => 'Enable',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'If checked Testimonial will be set to center align.', 'deep' ),
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
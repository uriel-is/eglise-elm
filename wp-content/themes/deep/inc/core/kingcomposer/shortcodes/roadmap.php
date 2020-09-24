<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'roadmap' => array(
                'name'          => esc_html__( 'Roadmap', 'deep' ),
                'description'   => esc_html__( 'Roadmap', 'deep' ),
                'icon'          => 'webnus-roadmap',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Roadmap Item', 'deep' ),
                            'name'          => 'roadmap_item',
                            'options'       => array( 
                                'add_text'  => __('Add New', 'deep')
                            ),
                            'params' => array(
                                array(
                                    'name'          => 'item_title',
                                    'label'         => esc_html__( 'Mileston Title', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'item_past',
                                    'label'         => esc_html__( 'Past Mileston', 'deep' ),
                                    'type'          => 'checkbox',
                                    'options'       => array(
                                        'yes'   => 'Yes',
                                    ),
                                    'value'         => 'false',
                                ),
                                array(
                                    'name'          => 'item_select',
                                    'label'         => esc_html__( 'Selected Mileston', 'deep' ),
                                    'type'          => 'checkbox',
                                    'options'       => array(
                                        'yes'   => 'Yes',
                                    ),
                                    'value'         => 'false',
                                ),
                                array(
                                    'name'          => 'item_desc',
                                    'label'         =>  esc_html__( 'Mileston Description', 'deep' ),
                                    'type'          => 'textarea',
                                ),
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
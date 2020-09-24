<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'schedule' => array(
                'name'          => esc_html__( 'Schedule', 'deep' ),
                'description'   => esc_html__( 'Schedule', 'deep' ),
                'icon'          => 'webnus-schedule',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'start_date',
                            'label'         => esc_html__( 'Start Text', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'end_date',
                            'label'         => esc_html__( 'End Text', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'dark_bg',
                            'label'         => esc_html__( "Dark Background (White color)", 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'false',
                        ),
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Schedule Item', 'deep' ),
                            'name'          => 'schedule_item',
                            'options'       => array( 
                                'add_text'  => __('Add New', 'deep')
                            ),
                            'params' => array(
                                array(
                                    'name'          => 'item_time',
                                    'label'         => esc_html__( 'Time', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'item_title',
                                    'label'         => esc_html__( 'Title', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'item_presenter_name',
                                    'label'         => esc_html__( 'Presenter name', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name' 	        => 'item_presenter_image',
                                    'label' 		=> esc_html__( 'Presenter Image', 'deep' ),
                                    'type' 			=> 'attach_image',
                                ),
                                array(
                                    'name'          => 'item_location',
                                    'label'         => esc_html__( 'Location', 'deep' ),
                                    'type'          => 'text',
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
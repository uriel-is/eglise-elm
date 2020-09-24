<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'infobox' => array(
                'name'          => esc_html__( 'InfoBox', 'deep' ),
                'description'   => esc_html__( 'Create your branch contact info', 'deep' ),
                'icon'          => 'webnus-info-box',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'featured',
                            'label'         => esc_html__( 'Featured Text', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'url',
                            'label'         => esc_html__( 'Featured URL', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'ib_color',
                            'label'         => esc_html__( 'Color of text', 'deep' ),
                            'type'          => 'color_picker',
                            'value'         => '#242524',
                        ),
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Location Setup', 'deep' ),
                            'name'          => 'setup',
                            'description'   => esc_html__( 'each row for each branch', 'deep' ),
                            'options'       => array( 
                                'add_text' => esc_html__('Add new', 'deep')
                            ),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '2',
                            ),
                            'params' => array(
                                array(
                                    'name'          => 'branch',
                                    'label'         => esc_html__( 'Branch', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Type a Location of your branch (EX : Area/State/Province/City/Country)', 'deep'),
                                ),
                                array(
                                    'name'          => 'phone',
                                    'label'         => esc_html__( 'Phone number of branch', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'EX: (555) 123 - 4567', 'deep'),
                                ),
                                array(
                                    'name'          => 'mail',
                                    'label'         =>  esc_html__( 'Email address of branch', 'deep' ),
                                    'type'          => 'text',
                                    'description'   =>  esc_html__( 'EX: info@yourdomain.com', 'deep'),
                                ),
                                array(
                                    'name'          => 'startofday',
                                    'label'         => esc_html__( 'Start of week for branch', 'deep' ),
                                    'type'          => 'select',
                                    'options'       => array(
                                        'Sunday'        => esc_html__( 'Sunday', 'deep' ),
                                        'Monday'        => esc_html__( 'Monday', 'deep' ),
                                        'Tuesday'       => esc_html__( 'Tuesday', 'deep' ),
                                        'Wednesday'     => esc_html__( 'Wednesday', 'deep' ),
                                        'Thursday'      => esc_html__( 'Thursday', 'deep' ),
                                        'Friday'        => esc_html__( 'Friday', 'deep' ),
                                        'Saturday'      => esc_html__( 'Saturday', 'deep' ),
                                    ),
                                ),
                                array(
                                    'name'          => 'time',
                                    'label'         =>  esc_html__( 'Time of work', 'deep' ),
                                    'type'          => 'text',
                                    'description'   =>  esc_html__( 'Start Time and End of Time day', 'deep'),
                                ),
                                array(
                                    'name'          => 'endofday',
                                    'label'         => esc_html__( 'End of week for branch', 'deep' ),
                                    'type'          => 'select',
                                    'options'       => array(
                                        'Sunday'        => esc_html__( 'Sunday', 'deep' ),
                                        'Monday'        => esc_html__( 'Monday', 'deep' ),
                                        'Tuesday'       => esc_html__( 'Tuesday', 'deep' ),
                                        'Wednesday'     => esc_html__( 'Wednesday', 'deep' ),
                                        'Thursday'      => esc_html__( 'Thursday', 'deep' ),
                                        'Friday'        => esc_html__( 'Friday', 'deep' ),
                                        'Saturday'      => esc_html__( 'Saturday', 'deep' ),
                                    ),
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
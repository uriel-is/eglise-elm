<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'maxcounter' => array(
                'name'          => esc_html__( 'Max Counter', 'deep' ),
                'description'   => esc_html__( 'MaxCounter', 'deep' ),
                'icon'          => 'webnus-maxcounter',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__('Type', 'deep'),
                            'type'          => 'select',
                            'options'       => array(
                                '1'  => 'Type 1',
                                '2'  => 'Type 2',
                                '3'  => 'Type 3',
                                '4'  => 'Type 4',
                                '5'  => 'Type 5',
                                '6'  => 'Type 6',
                            ),
                            'description'   => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                        ),
                        array(
                            'name'          => 'count',
                            'label'         => esc_html__('Count', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the number that you want to count.', 'deep'),
                        ),
                        array(
                            'name'          => 'title',
                            'label'         => esc_html__('Title', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the title', 'deep'),
                        ),
                        array(
                            'name'          => 'prefix',
                            'label'         => esc_html__('Prefix', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Show the unit content before your counter number., Example: $', 'deep'),
                        ),
                        array(
                            'name'          => 'suffix',
                            'label'         => esc_html__('Suffix', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Show the unit content after your counter number., Example: %', 'deep'),
                        ),
                        array(
                            'name'          => 'color',
                            'label'         => esc_html__( 'Icon Color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Please select icon color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => '6',
                            ),
                        ),
                        array(
                            'name'          => 'icon',
                            'label'         => esc_html__( 'Icon', 'deep' ),
                            'type'          => 'icon_picker',
                            'description'   => esc_html__( 'Please select counter icon', 'deep'),
                            'value'         => 'none',
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => '6',
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
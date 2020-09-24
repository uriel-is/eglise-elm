<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'ul' => array(
                'name'          => esc_html__( 'List', 'deep' ),
                'description'   => esc_html__( 'List + custom style', 'deep' ),
                'icon'          => 'webnus-list',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'List Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'plus'   => 'Plus' ,
                                'minus'  => 'Minus',
                                'star'   => 'Star' ,
                                'arrow'  => 'Arrow',
                                'arrow2' => 'Arrow 2',
                                'square' => 'Square',
                                'circle' => 'Circle',
                                'cross'  => 'Cross',
                                'check'  => 'Check',
                                'number' => 'Number',
                            ),
                            'description'   => esc_html__( 'Select the List Items type', 'deep'),
                        ),
                        array(
                            'name'          => 'list_content',
                            'label'         => esc_html__( 'Items', 'deep' ),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'For separating items please use | Example (First Item|Second Item)', 'deep'),
                        ),
                        array(
                            'name'          => 'icon_color',
                            'label'         => esc_html__('Icon color', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select icon color (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array(
                                    'plus',
                                    'minus',
                                    'star',
                                    'arrow',
                                    'arrow2',
                                    'square',
                                    'circle',
                                    'cross',
                                    'check',
                                ) ,
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
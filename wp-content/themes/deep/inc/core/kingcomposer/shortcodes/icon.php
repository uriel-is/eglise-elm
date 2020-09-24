<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'icon' => array(
                'name'          => esc_html__( 'Icon', 'deep' ),
                'description'   => esc_html__( 'Vector font icon', 'deep' ),
                'icon'          => 'webnus-icon',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'size',
                            'label'         => esc_html__('Icon Size', 'deep'),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'color',
                            'label'         => esc_html__('Icon color', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( "Select icon color", 'deep'),
                        ),
                        array(
                            'name'          => 'link',
                            'label'         => esc_html__('Icon Link URL', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( "Icon link URL http:// ", 'deep'),
                        ),
                        array(
                            'name'          => 'link_target',
                            'label'         => esc_html__( 'Open link in a new tab?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                                ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Add Target = _blank', 'deep'),
                        ),
                        array(
                            'name'          => 'link_class',
                            'label'         => esc_html__('Icon Link Class', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( "Icon link Class ", 'deep'),
                        ),
                        array(
                            'name'          => 'bg_color',
                            'label'         => esc_html__( 'Custom background color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( "Select background color", 'deep'),
                        ),
                        array(
                            'name'          => 'padding',
                            'label'         => esc_html__('Padding', 'deep'),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'border_radius',
                            'label'         => esc_html__('Border Radius', 'deep'),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'el_class',
                            'label'         => esc_html__( 'Extra class', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'deep' ),
                        ),
                        array(
                            'name'          => 'name',
                            'label'         => esc_html__('Icon', 'deep'),
                            'type'          => 'icon_picker',
                            'description'   => esc_html__( 'Select Icon', 'deep'),
                            'value'         => 'none',
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
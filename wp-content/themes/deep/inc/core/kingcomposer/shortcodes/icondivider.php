<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'icon-divider' => array(
                'name'          => esc_html__( 'Icon Divider', 'deep' ),
                'description'   => esc_html__( 'Vector font icon', 'deep' ),
                'icon'          => 'webnus-icondivider',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'color',
                            'label'         => esc_html__( 'Icon Color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Please select icon color', 'deep'),
                        ),
                        array(
                            'name'          => 'name',
                            'label'         => esc_html__( 'Icon', 'deep' ),
                            'type'          => 'icon_picker',
                            'description'   => esc_html__( 'Please select icon', 'deep'),
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
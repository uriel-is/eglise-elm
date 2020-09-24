<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'tooltip' => array(
                'name'          => esc_html__( 'Tooltip', 'deep' ),
                'description'   => esc_html__( 'Tooltip', 'deep' ),
                'icon'          => 'webnus-tooltip',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'tooltiptext',
                            'label'         => esc_html__( "Tooltip Text", 'deep' ),
                            'type'          => 'textarea',
                            'description'   => esc_html__( "Tooltip text goes here", 'deep'),
                        ),
                        array(
                            'name'          => 'tooltip_content',
                            'label'         => esc_html__( 'Tooltip Content', 'deep' ),
                            'type'          => 'textarea',
                            'description'   => esc_html__( "Contet Goes Here", 'deep'),
                        ),
                        array(
                            'name'          => 'tooltip_link',
                            'label'         => esc_html__( 'Conten URL', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( "Please enter content url", 'deep'),
                        ),
                        array(
                            'name'          => 'link_target',
                            'label'         => esc_html__( 'Open link in a new tab? ', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Add Target = _blank', 'deep'),
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
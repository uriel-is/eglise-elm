<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'lvs' => array(
                'name'          => esc_html__( 'Like + View + Share', 'deep' ),
                'description'   => esc_html__( 'You can put like, view and share for your pages.', 'deep' ),
                'icon'          => 'webnus-lvs',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'display_like',
                            'label'         => esc_html__( 'Display Like?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'yes',
                        ),
                        array(
                            'name'          => 'display_view',
                            'label'         => esc_html__( 'Display View?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'yes',
                        ),
                        array(
                            'name'          => 'display_share',
                            'label'         => esc_html__( 'Display Share?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'yes',
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
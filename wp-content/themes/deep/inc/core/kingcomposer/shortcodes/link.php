<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'link' => array(
                'name'          => esc_html__( 'Link', 'deep' ),
                'description'   => esc_html__( 'Learn more link', 'deep' ),
                'icon'          => 'webnus-link',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'url',
                            'label'         => esc_html__( 'Link URL', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Link URL, Example: http://domain.com', 'deep'),
                            'value'         => '#',
                        ),
                        array(
                            'name'          => 'content_text',
                            'label'         => esc_html__( 'Link Text', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Link Text (Content)', 'deep'),
                            'value'         => 'Link Text',
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
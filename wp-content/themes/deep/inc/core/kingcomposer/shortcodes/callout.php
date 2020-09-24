<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'callout' => array(
                'name'          => esc_html__( 'Callout', 'deep' ),
                'description'   => esc_html__( 'Call to action + button', 'deep' ),
                'icon'          => 'webnus-callout',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the Callout title', 'deep'),
                        ),
                        array(
                            'name'          => 'button_text',
                            'label'         => esc_html__( 'Button Text', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Callout Button text', 'deep'),
                        ),
                        array(
                            'name'          => 'button_link',
                            'label'         => esc_html__( 'Button Link', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Button Link URL', 'deep'),
                        ),
                        array(
                            'name'          => 'link_target',
                            'label'         => esc_html__( 'Open link in a new tab?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Add Target = _blank', 'deep'),
                        ),
                        array(
                            'name'          => 'text',
                            'label'         => esc_html__( 'Content Text', 'deep' ),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Enter the Callout content text', 'deep'),
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
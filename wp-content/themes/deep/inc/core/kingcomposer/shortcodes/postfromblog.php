<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'postblog' => array(
                'name'          => esc_html__( 'Single Post From Blog', 'deep' ),
                'description'   => esc_html__( 'Single Post', 'deep' ),
                'icon'          => 'webnus-postfromblog',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'           => esc_html__( 'Type 1', 'deep' ),
                                '2'           => esc_html__( 'Type 2', 'deep' ),
                                ),
                            'description'   => esc_html__( 'You can choose Single Post types.', 'deep'),
                        ),
                        array(
                            'name'          => 'post',
                            'label'         => esc_html__( 'Post ID', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Pick up the ID & follow this instruction: admin panel > posts > ID column.', 'deep'),
                        ),
                        array(
                            'name'          => 'hide_cat',
                            'label'         => esc_html__( 'Hide Category', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
                        ),
                        array(
                            'name'          => 'hide_date',
                            'label'         => esc_html__( 'Hide Category', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
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
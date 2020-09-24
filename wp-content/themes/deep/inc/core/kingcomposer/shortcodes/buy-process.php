<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'buy_process' => array(
                'name'          => esc_html__( 'Buy Process', 'deep' ),
                'description'   => esc_html__( 'Buy Process', 'deep' ),
                'icon'          => 'webnus-ourprocess',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'bg_color',
                            'label'         => esc_html__( 'Background Color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select custom background color', 'deep' ),
                        ),
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Process Item', 'deep' ),
                            'name'          => 'process_item',
                            'description'   => esc_html__( 'If you want this element cover whole page width, please add it inside of a full row. For this purpose, click on edit button of the row and set Select Row Type on Full Width Row.', 'deep' ),
                            'options'       => array( 
                                'add_text' => __('Add New', 'deep')
                            ),
                            'params' => array(
                                array(
                                    'name'          => 'process_title',
                                    'label'         => esc_html__( 'Process Title', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'process_content',
                                    'label'         => esc_html__( 'Process Content', 'deep' ),
                                    'type'          => 'textarea',
                                ),
                                array(
                                    'name'          => 'icon_fontawesome',
                                    'label'         => esc_html__( 'Icon', 'deep' ),
                                    'type'          => 'icon_picker',
                                    'description'   => esc_html__( 'Select icon from library.', 'deep' ),
                                    'value'         => 'none',
                                ),
                                array(
                                    'name'          => 'line_flag',
                                    'label'         => esc_html__( 'Line number ( or text )', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'process_style',
                                    'label'         => esc_html__( 'Porcess style', 'deep' ),
                                    'type'          => 'select',
                                    'options'       => array(
                                        'default'     => esc_html__( 'Default Porcess', 'deep' ),        
                                        'featured'    => esc_html__( 'Featured Porcess', 'deep' ),        
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
 ?>
<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'our_process' => array(
                'name'          => esc_html__( 'Our Process', 'deep' ),
                'description'   => esc_html__( 'Our Process', 'deep' ),
                'icon'          => 'webnus-ourprocess',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'  => 'Type 1',
                                '2'  => 'Type 2',
                                '3'  => 'Type 3',
                            ),
                            'description'   => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                        ),
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Process Item', 'deep' ),
                            'name'          => 'process_item',
                            'description'   => esc_html__( 'Enter process items for our process - title, content and icon.', 'deep' ),
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
                                    'name'          => 'line_flag',
                                    'label'         => esc_html__( 'Line number ( or text )', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'icon_fontawesome',
                                    'label'         => esc_html__( 'Icon', 'deep' ),
                                    'type'          => 'icon_picker',
                                    'description'   => esc_html__( 'Select icon from library.', 'deep' ),
                                    'value'         => 'none',
                                ),
                            ),
                        ),
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Process Item', 'deep' ),
                            'name'          => 'process_item_t2',
                            'description'   => esc_html__( 'Enter process items for our process - title, content and icon.', 'deep' ),
                            'options'       => array( 
                                'add_text' => __('Add New', 'deep')
                            ),
                            'params' => array(
                                array(
                                    'name'          => 'process_title_t2',
                                    'label'         => esc_html__( 'Process Title', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'process_content_t2',
                                    'label'         => esc_html__( 'Process Content', 'deep' ),
                                    'type'          => 'textarea',
                                ),
                                array(
                                    'name'          => 'line_flag_t2',
                                    'label'         => esc_html__( 'Line number ( or text )', 'deep' ),
                                    'type'          => 'text',
                                ),
                            ),
                        ),

                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Process Item', 'deep' ),
                            'name'          => 'process_item_t3',
                            'description'   => esc_html__( 'Enter process items for our process - title, content and icon.', 'deep' ),
                            'options'       => array( 
                                'add_text' => __('Add New', 'deep')
                            ),
                            'params' => array(
                                array(
                                    'name'          => 'process_title_t3',
                                    'label'         => esc_html__( 'Process Top Title', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'process_title_top_t3',
                                    'label'         => esc_html__( 'Process Title', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'title_color',
                                    'label'         => esc_html__('Title color', 'deep'),
                                    'type'          => 'color_picker',
                                    'description'   => esc_html__( 'Select title color (leave blank for default color)', 'deep'),
                                ),
                                array(
                                    'name'          => 'process_content_t3',
                                    'label'         => esc_html__( 'Process Content', 'deep' ),
                                    'type'          => 'textarea',
                                ),
                                array(
                                    'name'          => 'content_color',
                                    'label'         => esc_html__('Title color', 'deep'),
                                    'type'          => 'color_picker',
                                    'description'   => esc_html__( 'Select title color (leave blank for default color)', 'deep'),
                                ),
                                array(
                                    'name'          => 'link_url',
                                    'label'         => esc_html__( 'Link URL', 'deep' ),
                                    'type'          => 'text',
                                    'value'         =>'#',
                                    'description'   => esc_html__( 'Enter the link url. Example: http://yourdomain.com', 'deep'),
                                ),
                                array(
                                    'name'          => 'teaser_btn',
                                    'label'         => esc_html__( 'button', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Enter your text here', 'deep'),
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
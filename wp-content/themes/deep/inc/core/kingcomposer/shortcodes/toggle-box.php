<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'toggle_box' => array(
                'name'          => esc_html__( 'Toggle box', 'deep' ),
                'description'   => esc_html__( 'toggle box', 'deep' ),
                'icon'          => 'webnus-togglebox',
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
                            ),
                            'description'   => esc_html__( 'Please select type', 'deep'),
                        ),
                        array(
                            'name'          => 'service_single_title',
                            'label'         => esc_html__('Service Title', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the Title', 'deep'),
                            'relation'      => array(
                                'parent'         => 'type',
                                'show_when'      => '1',
                            ),
                        ),
                        array(
                            'name'          => 'service_single_content',
                            'label'         => esc_html__('Content', 'deep'),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Please write Content', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '1',
                            ),
                        ),
                        array(
                            'name'          => 'background_image',
                            'label'         => esc_html__( 'Background Image', 'deep' ),
                            'type'          => 'attach_image',
                            'description'   => wp_kses( __( 'Select Image for background<br>Note: If you have another Icon that not is here. You can put PNG image of that instead of these Icons.', 'deep'), array( 'br' => array() ) ),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '2',
                            ),
                        ),
                        array(
                            'name'          => 'offers_subtitle',
                            'label'         => esc_html__('Subtitle', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Please write Offer Subtitle', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '2',
                            ),
                        ),
                        array(
                            'name'          => 'offers_title',
                            'label'         => esc_html__('Title', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Please write Offer Title', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '2',
                            ),
                        ),
                        array(
                            'name'          => 'min_height',
                            'label'         => esc_html__('Minimum Height', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Please Enter Minimum Height (just write number, like: 575)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '2',
                            ),
                        ),
                        array(
                            'name'          => 'open',
                            'label'         => esc_html__('Do you want the content open as default?', 'deep'),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value' => 'true',
                            'description' => esc_html__('Please check to enable this feature. ', 'deep'),
                        ),
                        array(
                            'name'          => 'offers_content',
                            'label'         => esc_html__('Content', 'deep'),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Please write Content', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '2',
                            ),
                        ),
                    ),
                    'Icons' => array(
                        array(
                            'name'          => 'icon_name',
                            'label'         => esc_html__( 'Icon', 'deep' ),
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
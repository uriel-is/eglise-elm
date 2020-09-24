<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'single_slide' => array(
                'name'         => esc_html__( 'Single Slide', 'deep' ),
                'system_only'  => true, // Don't show as an element on list elements
                'title'        => 'Sliders Settings',
                'is_container' => true,
                'category'     => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'       => array(
                    'general' => array(
                        array(
                            'name'          => 'full_width',
                            'label'         => esc_html__( 'Stretch content (Full width content)?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Select stretching options for section and content.', 'deep' ),
                        ),
                        array(
                            'name'          => 'title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'content_slider_sub_class',
                            'label'         => esc_html__( 'Extra class', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'deep' ),
                        ),
                    ),
                    'Styling' => array(
                        array(
                            'name'    => 'css_editor',
                            'type'    => 'css',
                            'options' => array(
                                array(
                                    "screens"       => "any,1024,999,767,479",
                                    'Background'    => array(
                                        array('property' => 'background', 'label' => 'Background', 'selector' => '.content-slider-single'),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name'          => 'wn_parallax',
                            'label'         => esc_html__( 'Parallax', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                ''                => esc_html__( 'None', 'deep' ),
                                'content-moving'  => esc_html__( 'Parallax', 'deep' ),
                            ),
                            'description'   => esc_html__( 'Add parallax type background for row.', 'deep' ),
                        ),
                        array(
                            'name'          => 'wn_parallax_speed',
                            'label'         => esc_html__( 'Parallax Speed', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '108'  => esc_html__( 'Very Slow', 'deep' ),
                                '123'  => esc_html__( 'Slow', 'deep' ),
                                '190'  => esc_html__( 'Normal', 'deep' ),
                                '225'  => esc_html__( 'Fast', 'deep' ),
                                '260'  => esc_html__( 'Very Fast', 'deep' ),
                            ),
                            'value'         => '123',
                            'description'   => esc_html__( 'Add parallax type background for row.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_type',
                                'hide_when'  => '',
                            ),
                        ),
                        array(
                            'name'          => 'responsive_bg_none',
                            'label'         => esc_html__('Background None in Mobile Size?', 'deep'),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'respo-bg-none'   => 'Yes',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__('If checked background columns will be disabled in mobile.', 'deep'),
                        ),
                    ),
                    'Animate' => array(
                        array(
                            'name'    => 'css_animation',
                            'type'    => 'animate'
                        )
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
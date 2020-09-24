<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'content_slider_element' => array(
                'name'         => esc_html__('Content Slider',"deep"),
                'description'  => esc_html__('Create Content Slider','deep'),
                'title'        => 'Sliders Settings',
                'is_container' => true,
                'views'        => array(
                    'type'     => 'views_sections',
                    'sections' => 'single_slide' // this is children item was added above
                ),
                'icon'          => 'webnus-content-slider',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'full_height',
                            'label'         => esc_html__( 'Full height Slider?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'If checked Slider will be set to full height.', 'deep' ),
                        ),
                        array(
                            'name'          => 'slider_speed',
                            'label'         => esc_html__( 'Slider Speed', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Animation Speed', 'deep' ),
                            'value'         => '500',
                        ),
                    ),
                    'Arrows' => array(
                        array(
                            'name'          => 'arrow_type',
                            'label'         => esc_html__( 'Arrow Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'none'    => esc_html__( 'Without Arrow', 'deep' ),
                                'arrow1'  => esc_html__( 'Normal Arrow', 'deep' ),
                                'arrow2'  => esc_html__( 'Arrow with Line', 'deep' ),
                                'arrow3'  => esc_html__( 'Box Arrow', 'deep' ),
                                'arrow4'  => esc_html__( 'Modern Box Arrow', 'deep' ),
                            ),
                            'description'   => esc_html__( 'Select Arrow type', 'deep' ),
                        ),
                        array(
                            'name'          => 'arrow_position',
                            'label'         => esc_html__( 'Arrow Position', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'wn-normal-arrow'  => esc_html__( 'Normal (left and right)', 'deep' ),
                                'wn-tleft'         => esc_html__( 'Top Left', 'deep' ),
                                'wn-tright'        => esc_html__( 'Top Right', 'deep' ),
                                'wn-tcenter'       => esc_html__( 'Top Center', 'deep' ),
                                'wn-bleft'         => esc_html__( 'Bottom Left', 'deep' ),
                                'wn-bright'        => esc_html__( 'Bottom Right', 'deep' ),
                                'wn-bcenter'       => esc_html__( 'Bottom center', 'deep' ),
                                'wn-mleft'         => esc_html__( 'Middle Left', 'deep' ),
                                'wn-mright'        => esc_html__( 'Middle Right', 'deep' ),
                                'wn-mcenter'       => esc_html__( 'Middle center', 'deep' ),
                                'wn-custom-arrow'  => esc_html__( 'Custom', 'deep' ),
                            ),
                            'description'   => esc_html__( 'Select Arrow Position', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_type',
                                'hide_when'  => 'none',
                            ),
                        ),
                        array(
                            'name'          => 'arrow_color',
                            'label'         => esc_html__( 'Arrow color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select arrow color .', 'deep'),
                            'relation'      => array(
                                'parent'     => 'arrow_type',
                                'hide_when'  => 'none',
                            ),
                        ),
                        array(
                            'name'          => 'arrow_bg_color',
                            'label'         => esc_html__( 'Arrow Background color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select arrow background color .', 'deep'),
                            'relation'      => array(
                                'parent'     => 'arrow_type',
                                'show_when'  => 'arrow3',
                            ),
                        ),
                        array(
                            'name'          => 'line_color',
                            'label'         => esc_html__( 'Line color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select line color .', 'deep'),
                            'relation'      => array(
                                'parent'     => 'arrow_type',
                                'show_when'  => 'arrow2',
                            ),
                        ),
                    ),
                    'Desktop (Just Custom Arrow)' => array(
                        array(
                            'name'          => 'top_space',
                            'label'         => esc_html__( 'Top Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Top space value. For example: 35px or 50%. If you enter value in this field then leave “Bottom Space” field blank.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                        array(
                            'name'          => 'bottom_space',
                            'label'         => esc_html__( 'Bottom Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Bottom space value. For example: 35px or 50%. If you enter value in this field then leave “Top Space” field blank.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                        array(
                            'name'          => 'left_space',
                            'label'         => esc_html__( 'Left Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Left space value for left arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                        array(
                            'name'          => 'right_space',
                            'label'         => esc_html__( 'Right Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Right space value for right arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                    ),
                    'Tablet (Just Custom Arrow)' => array(
                        array(
                            'name'          => 'top_space_tablet',
                            'label'         => esc_html__( 'Top Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Top space value. For example: 35px or 50%. If you enter value in this field then leave “Bottom Space” field blank.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                        array(
                            'name'          => 'bottom_space_tablet',
                            'label'         => esc_html__( 'Bottom Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Bottom space value. For example: 35px or 50%. If you enter value in this field then leave “Top Space” field blank.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                        array(
                            'name'          => 'left_space_tablet',
                            'label'         => esc_html__( 'Left Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Left space value for left arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                        array(
                            'name'          => 'right_space_tablet',
                            'label'         => esc_html__( 'Right Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Right space value for right arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                    ),
                    'Mobile (Just Custom Arrow)' => array(
                        array(
                            'name'          => 'top_space_mobile',
                            'label'         => esc_html__( 'Top Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Top space value. For example: 35px or 50%. If you enter value in this field then leave “Bottom Space” field blank.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                        array(
                            'name'          => 'bottom_space_mobile',
                            'label'         => esc_html__( 'Bottom Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Bottom space value. For example: 35px or 50%. If you enter value in this field then leave “Top Space” field blank.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                        array(
                            'name'          => 'left_space_mobile',
                            'label'         => esc_html__( 'Left Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Left space value for left arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                        array(
                            'name'          => 'right_space_mobile',
                            'label'         => esc_html__( 'Right Space', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Right space value for right arrow. For example: 35px or 50%. In “arrow with line” type this field moves line and arrows together.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'arrow_position',
                                'show_when'  => 'wn-custom-arrow',
                            ),
                        ),
                    ),
                    'Bullets' => array(
                        array(
                            'name'          => 'bullet_type',
                            'label'         => esc_html__( 'Bullet Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'none'              => esc_html__( 'None', 'deep' ),
                                'wn-bullet-circle'  => esc_html__( 'Circle', 'deep' ),
                                'wn-bullet-rec'     => esc_html__( 'Rectangular', 'deep' ),
                                'wn-bullet-sq'      => esc_html__( 'Square', 'deep' ),
                            ),
                            'description'   => esc_html__( 'Select Bullet type', 'deep' ),
                        ),
                        array(
                            'name'          => 'bullet_color',
                            'label'         => esc_html__( 'Bullet color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select bullet color .', 'deep'),
                            'relation'      => array(
                                'parent'     => 'bullet_type',
                                'hide_when'  => 'none',
                            ),
                        ),
                    ),
                    'Numbers' => array(
                        array(
                            'name'          => 'numbers',
                            'label'         => esc_html__( 'Numbers', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'none'    => esc_html__( 'None', 'deep' ),
                                'num-tl'  => esc_html__( 'Top Left', 'deep' ),
                                'num-tc'  => esc_html__( 'Top Center', 'deep' ),
                                'num-tr'  => esc_html__( 'Top Right', 'deep' ),
                                'num-ml'  => esc_html__( 'Middle Left', 'deep' ),
                                'num-mc'  => esc_html__( 'Middle Center', 'deep' ),
                                'num-mr'  => esc_html__( 'Middle Right', 'deep' ),
                                'num-bl'  => esc_html__( 'Bottom Left', 'deep' ),
                                'num-bc'  => esc_html__( 'Bottom Center', 'deep' ),
                                'num-br'  => esc_html__( 'Bottom Right', 'deep' ),
                            ),
                            'description'   => esc_html__( 'Select Numbers Position', 'deep' ),
                        ),
                        array(
                            'name'          => 'num_bg_color',
                            'label'         => esc_html__( 'Background color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Background color .', 'deep'),
                            'relation'      => array(
                                'parent'     => 'numbers',
                                'hide_when'  => 'none',
                            ),
                        ),
                        array(
                            'name'          => 'num_color',
                            'label'         => esc_html__( 'Number color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Number color .', 'deep'),
                            'relation'      => array(
                                'parent'     => 'numbers',
                                'hide_when'  => 'none',
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
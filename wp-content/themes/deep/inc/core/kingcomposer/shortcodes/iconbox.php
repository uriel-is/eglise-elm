<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'iconbox' => array(
                'name'          => esc_html__( 'Icon Box', 'deep' ),
                'description'   => esc_html__( 'Icon + text article', 'deep' ),
                'icon'          => 'webnus-iconbox',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '0'    => 'Type 0',
                                '1'    => 'Type 1',
                                '2'    => 'Type 2',
                                '3'    => 'Type 3',
                                '4'    => 'Type 4',
                                '5'    => 'Type 5',
                                '6'    => 'Type 6',
                                '7'    => 'Type 7',
                                '8'    => 'Type 8',
                                '9'    => 'Type 9',
                                '10'   => 'Type 10',
                                '11'   => 'Type 11',
                                '12'   => 'Type 12',
                                '13'   => 'Type 13',
                                '14'   => 'Type 14',
                                '15'   => 'Type 15',
                                '16'   => 'Type 16',
                                '17'   => 'Type 17',
                                '18'   => 'Type 18',
                                '19'   => 'Type 19',
                                '20'   => 'Type 20',
                                '21'   => 'Type 21',
                                '22'   => 'Type 22',
                                '23'   => 'Type 23',
                                '24'   => 'Type 24',
                                '25'   => 'Type 25',
                                '26'   => 'Type 26',
                                '27'   => 'Type 27',
                                '28'   => 'Type 28',
                                '29'   => 'Type 29',
                                '30'   => 'Type 30',
                            ),
                            'description'   => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                        ),
                        array(
                            'name'          => 'iconbox_color_type',
                            'label'         => esc_html__( 'Background Color type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'iconbox-solid-color'    => 'Solid color',
                                'iconbox_gradient'       => 'Gradient',
                            ),
                            'value'         => 'iconbox-solid-color',
                        ),
                        array(
                            'name'          => 'background_color',
                            'label'         => esc_html__( "Background color style", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type',
                                'show_when'  => 'iconbox-solid-color',
                            ),
                        ),
                        array(
                            'name'          => 'iconbox_grad_color_1',
                            'label'         => esc_html__( "Color 1", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type',
                                'show_when'  => 'iconbox_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'iconbox_grad_color_2',
                            'label'         => esc_html__( "Color 2", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type',
                                'show_when'  => 'iconbox_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'iconbox_grad_color_3',
                            'label'         => esc_html__( "Color 3", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type',
                                'show_when'  => 'iconbox_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'iconbox_grad_color_4',
                            'label'         => esc_html__( "Color 4", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type',
                                'show_when'  => 'iconbox_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'iconbox_grad_direction',
                            'label'         => esc_html__('Direction', 'deep'),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type',
                                'show_when'  => 'iconbox_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'iconbox_color_type_hover',
                            'label'         => esc_html__( 'Hover Background Color type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'iconbox-solid-color_hover'    => 'Solid color',
                                'iconbox_gradient_hover'       => 'Gradient',
                            ),
                            'value'         => 'iconbox-solid-color_hover',
                        ),
                        array(
                            'name'          => 'background_color_hover',
                            'label'         => esc_html__( 'Hover Background Color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Hover Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type_hover',
                                'show_when'  => 'iconbox-solid-color_hover',
                            ),
                        ),
                        array(
                            'name'          => 'iconbox_grad_color_1_hover',
                            'label'         => esc_html__( "Color 1", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type_hover',
                                'show_when'  => 'iconbox_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'iconbox_grad_color_2_hover',
                            'label'         => esc_html__( "Color 2", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type_hover',
                                'show_when'  => 'iconbox_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'iconbox_grad_color_3_hover',
                            'label'         => esc_html__( "Color 3", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type_hover',
                                'show_when'  => 'iconbox_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'iconbox_grad_color_4_hover',
                            'label'         => esc_html__( "Color 4", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type_hover',
                                'show_when'  => 'iconbox_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'iconbox_grad_direction_hover',
                            'label'         => esc_html__('Direction', 'deep'),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'iconbox_color_type_hover',
                                'show_when'  => 'iconbox_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'align',
                            'label'         => esc_html__( 'Align', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'left'  => esc_html__( "Left", 'deep' ),
                                'right' => esc_html__( "right", 'deep' ),
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( "Please choose align, Left or Right", 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '18',
                            ),
                        ),
                        array(
                            'name'          => 'featured',
                            'label'         => esc_html__( 'Featured Iconbox ?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                ' w-featured'  => esc_html__( "Yes", 'deep' ),
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Iconbox Featured Plan', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '22',
                            ),
                        ),
                        array(
                            'name'          => 'border_right',
                            'label'         => esc_html__( 'Remove right border?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                ' w-border-right'  => esc_html__( "Yes", 'deep' ),
                            ),
                            'value'         => 'false',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '15' , '22' ),
                            ),
                        ),
                        array(
                            'name'          => 'bg_img_pos',
                            'label'         => esc_html__( 'Background Image Position', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'tlp'    => 'Top Left Position',
                                'trp'    => 'Top Right Position',
                                'blp'    => 'Bottom Left Position',
                                'brp'    => 'Bottom Right Position',
                            ),
                            'description'   => esc_html__( 'You can choose Background Image Position.', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '28',
                            ),
                        ),
                        array(
                            'name'          => 'side_by_side_title_icon',
                            'label'         => esc_html__( 'Make title and icon/image side by side', 'deep' ),
                            'type'          => 'radio',
                            'options'       => array(
                                'none'   => 'none',
                                'left'   => 'left',
                                'right'  => 'right',
                            ),
                        ),
                        array(
                            'name'          => 'min_height',
                            'label'         => esc_html__('Minimum Background Color Height', 'deep'),
                            'type'          => 'textarea',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '26',
                            ),
                        ),
                        array(
                            'name'          => 'icon_bg',
                            'label'         => esc_html__('Icon Background Color', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '26',
                            ),
                        ),
                        array(
                            'name'          => 'background_image',
                            'label'         => esc_html__( 'Background Image', 'deep' ),
                            'type'          => 'attach_image',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '30',
                            ),
                        ),
                    ),
                    'Link' => array(
                        array(
                            'name'          => 'icon_link_text',
                            'label'         => esc_html__('Link Text', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'IconBox Link Text', 'deep'),
                        ),
                        array(
                            'name'          => 'icon_link_url',
                            'label'         => esc_html__('Link URL', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'IconBox Link URL (http://example.com)', 'deep'),
                        ),
                        array(
                            'name'          => 'icon_link_align',
                            'label'         => esc_html__('Link text alignment', 'deep'),
                            'type'          => 'radio',
                            'options'       => array(
                                'left'   => 'left',
                                'center' => 'center',
                                'right'  => 'right',
                            ),
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
                        array(
                            'name'          => 'link_color',
                            'label'         => esc_html__('Link color (leave bank for default color)', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select link color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => '30',
                            ),
                        ),
                        array(
                            'name'          => 'title_linkable',
                            'label'         => esc_html__( 'Title linkable', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Add Link to title', 'deep'),
                        ),
                        array(
                            'name'          => 'box_linkable',
                            'label'         => esc_html__( 'Icon box linkable', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'By activating this option read more and icon link will be disabled.', 'deep'),
                        ),
                    ),  
                    'styling' => array(
                        array(
                            'name'          => 'icon_style_box',
                            'label'         => esc_html__( 'Font', 'deep' ),
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,999,767,479",
                                    'Box'   => array(
                                        array('property' => 'padding', 'label' => 'Padding', 'selector' => ''),
                                        array('property' => 'margin', 'label' => 'Margin', 'selector' => ''),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => ''),
                                        array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => ''),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'title' => array(
                        array(
                            'name'          => 'icon_title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'IconBox Title', 'deep'),
                        ),
                        array(
                            'name'          => 'icon_title_style',
                            'label'         => esc_html__( 'Font', 'deep' ),
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,999,767,479",
                                    'Font'   => array(
                                        array('property' => 'font-size', 'label' => 'Title Size', 'selector' => 'h4.title-style'),
                                        array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => 'h4.title-style'),
                                        array('property' => 'text-align', 'label' => 'Text Align', 'selector' => 'h4.title-style'),
                                        array('property' => 'font-style', 'label' => 'Font Style', 'selector' => 'h4.title-style'),
                                    ),
                                    'Box'   => array(
                                        array('property' => 'padding', 'label' => 'Padding', 'selector' => 'h4.title-style'),
                                        array('property' => 'margin', 'label' => 'Margin', 'selector' => 'h4.title-style'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => 'h4.title-style'),
                                        array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'h4.title-style'),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name'          => 'title_color_type',
                            'label'         => esc_html__( 'Color type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'title-solid-color'    => 'Solid color',
                                'title_gradient'       => 'Gradient',
                            ),
                            'value'         => 'title-solid-color',
                        ),
                        array(
                            'name'          => 'title_color',
                            'label'         => esc_html__('Title color (leave bank for default color)', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select title color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type',
                                'show_when'  => 'title-solid-color',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_color_1',
                            'label'         => esc_html__( "Color 1", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type',
                                'show_when'  => 'title_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_color_2',
                            'label'         => esc_html__( "Color 2", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type',
                                'show_when'  => 'title_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_color_3',
                            'label'         => esc_html__( "Color 3", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type',
                                'show_when'  => 'title_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_color_4',
                            'label'         => esc_html__( "Color 4", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type',
                                'show_when'  => 'title_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_direction',
                            'label'         => esc_html__('Direction', 'deep'),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'title_color_type',
                                'show_when'  => 'title_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'title_color_type_hover',
                            'label'         => esc_html__( 'Hover Color type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'title-solid-color_hover'    => 'Solid color',
                                'title_gradient_hover'       => 'Gradient',
                            ),
                            'value'         => 'title-solid-color_hover',
                        ),
                        array(
                            'name'          => 'title_color_hover',
                            'label'         => esc_html__('Title Hover color (leave bank for default color)', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select title color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type_hover',
                                'show_when'  => 'title-solid-color_hover',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_color_1_hover',
                            'label'         => esc_html__( "Color 1", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type_hover',
                                'show_when'  => 'title_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_color_2_hover',
                            'label'         => esc_html__( "Color 2", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type_hover',
                                'show_when'  => 'title_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_color_3_hover',
                            'label'         => esc_html__( "Color 3", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type_hover',
                                'show_when'  => 'title_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_color_4_hover',
                            'label'         => esc_html__( "Color 4", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type_hover',
                                'show_when'  => 'title_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_direction_hover',
                            'label'         => esc_html__('Direction', 'deep'),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'title_color_type_hover',
                                'show_when'  => 'title_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'title_theme_fonts',
                            'label'         => esc_html__( 'Use theme default font family?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'yes',
                            'description'   => esc_html__( 'Use font family from the theme.', 'deep' ),
                        ),
                        array(
                            'name'          => 'title_text_font',
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,1024,999,767,479",
                                    'Title'  => array(
                                        array('property' => 'font-family', 'label' => 'Subtitle Font Family', 'selector' => 'h4.title-style, h5'),
                                    ),
                                ),
                            ),
                            'relation'      => array(
                                'parent'     => 'title_theme_fonts',
                                'hide_when'  => 'yes',
                            ),
                        ),
                    ),
                    'subtitle' => array(
                        array(
                            'name'          => 'icon_subtitle',
                            'label'         => esc_html__( 'Subtitle', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'IconBox Subtitle', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '1' , '15' , '21' ),
                            ),
                        ),
                        array(
                            'name'          => 'icon_subtitle_style',
                            'label'         => esc_html__( 'Font', 'deep' ),
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,999,767,479",
                                    'Font'   => array(
                                        array('property' => 'font-size', 'label' => 'Font Size', 'selector' => 'h6.title-style'),
                                        array('property' => 'text-align', 'label' => 'Text Align', 'selector' => 'h6.title-style'),
                                        array('property' => 'font-style', 'label' => 'Font Style', 'selector' => 'h6.title-style'),
                                    ),
                                    'Box'   => array(
                                        array('property' => 'padding', 'label' => 'Padding', 'selector' => 'h6.title-style'),
                                        array('property' => 'margin', 'label' => 'Margin', 'selector' => 'h6.title-style'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => 'h6.title-style'),
                                        array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'h6.title-style'),
                                    ),
                                ),
                            ),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '1' , '15' , '21' ),
                            ),
                        ),
                        array(
                            'name'          => 'subtitle_theme_fonts',
                            'label'         => esc_html__( 'Use theme default font family?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'yes',
                            'description'   => esc_html__( 'Use font family from the theme.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '1' , '15' , '21' ),
                            ),
                        ),
                        array(
                            'name'          => 'subtitle_text_font',
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,1024,999,767,479",
                                    'Subtitle'  => array(
                                        array('property' => 'font-family', 'label' => 'Subtitle Font Family', 'selector' => 'h6.title-style'),
                                    ),
                                ),
                            ),
                            'relation'      => array(
                                'parent'     => 'subtitle_theme_fonts',
                                'hide_when'  => 'yes',
                            ),
                        ),
                    ),
                    'Content' => array(
                        array(
                            'name'          => 'iconbox_content',
                            'label'         => esc_html__('Content', 'deep'),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'IconBox Content Goes Here', 'deep'),
                        ),
                        array(
                            'name'          => 'icon_content_style',
                            'label'         => esc_html__( 'Font', 'deep' ),
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,999,767,479",
                                    'Font'   => array(
                                        array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.content-style'),
                                        array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.content-style'),
                                        array('property' => 'font-style', 'label' => 'Font Style', 'selector' => '.content-style'),
                                    ),
                                    'Box'   => array(
                                        array('property' => 'padding', 'label' => 'Padding', 'selector' => '.content-style'),
                                        array('property' => 'margin', 'label' => 'Margin', 'selector' => '.content-style'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => '.content-style'),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name'          => 'content_theme_fonts',
                            'label'         => esc_html__( 'Use theme default font family?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'yes',
                            'description'   => esc_html__( 'Use font family from the theme.', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '1' , '15' , '21' ),
                            ),
                        ),
                        array(
                            'name'          => 'content_text_font',
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,1024,999,767,479",
                                    'Content'  => array(
                                        array('property' => 'font-family', 'label' => 'Subtitle Font Family', 'selector' => '.content-style'),
                                    ),
                                ),
                            ),
                            'relation'      => array(
                                'parent'     => 'content_theme_fonts',
                                'hide_when'  => 'yes',
                            ),
                        ),
                        array(
                            'name'          => 'content_color',
                            'label'         => esc_html__('Content color (leave bank for default color)', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select content color', 'deep'),
                        ),
                        array(
                            'name'          => 'content_color_hover',
                            'label'         => esc_html__('Hover content color (leave bank for default color)', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select hover content color', 'deep'),
                        ),
                    ),
                    'icon/image' => array(
                        array(
                            'name'          => 'icon_or_image',
                            'label'         => esc_html__( 'Icon or image', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'icon'    => 'Icon',
                                'image'   => 'Image',
                            ),
                            'value'         => 'icon',
                        ),
                        array(
                            'name'          => 'icon_image',
                            'label'         => esc_html__( 'Pick an image', 'deep' ),
                            'type'          => 'attach_image',
                            'description'   => wp_kses( __( 'Select Image instead of Icons.<br>Note: If you have another Icon that not is here. You can put PNG image of that instead of these Icons.', 'deep'), array( 'br' => array() ) ),
                            'relation'      => array(
                                'parent'     => 'icon_or_image',
                                'show_when'  => 'image',
                            ),
                        ),
                        array(
                            'name'          => 'thumbnail',
                            'label'         => esc_html__( 'Image Size', 'deep' ),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'icon_or_image',
                                'show_when'  => 'image',
                            ),
                        ),
                        array(
                            'name'          => 'icon_size',
                            'label'         => esc_html__('Icon Size (leave blank for default size)', 'deep'),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'icon_or_image',
                                'show_when'  => 'icon',
                            ),
                        ),
                        array(
                            'name'          => 'icon_color_type',
                            'label'         => esc_html__( 'Color type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'icon-solid-color'    => 'Solid color',
                                'icon_gradient'       => 'Gradient',
                            ),
                            'value'         => 'icon-solid-color',
                        ),
                        array(
                            'name'          => 'icon_color',
                            'label'         => esc_html__('Icon color (leave bank for default color)', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select icon color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'icon_color_type',
                                'show_when'  => 'icon-solid-color',
                            ),
                        ),
                        array(
                            'name'          => 'icon_grad_color_1',
                            'label'         => esc_html__( "Color 1", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'icon_color_type',
                                'show_when'  => 'icon_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'icon_grad_color_2',
                            'label'         => esc_html__( "Color 2", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'icon_color_type',
                                'show_when'  => 'icon_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'icon_grad_color_3',
                            'label'         => esc_html__( "Color 3", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'icon_color_type',
                                'show_when'  => 'icon_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'icon_grad_color_4',
                            'label'         => esc_html__( "Color 4", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'icon_color_type',
                                'show_when'  => 'icon_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'icon_grad_direction',
                            'label'         => esc_html__('Direction', 'deep'),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'icon_color_type',
                                'show_when'  => 'icon_gradient',
                            ),
                        ),
                        array(
                            'name'          => 'icon_color_type_hover',
                            'label'         => esc_html__( 'Hover Color type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'icon-solid-color_hover'    => 'Solid color',
                                'icon_gradient_hover'       => 'Gradient',
                            ),
                            'value'         => 'icon-solid-color_hover',
                        ),
                        array(
                            'name'          => 'icon_color',
                            'label'         => esc_html__('Hover Icon color (leave bank for default color)', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select hover icon color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'icon_color_type_hover',
                                'show_when'  => 'icon-solid-color_hover',
                            ),
                        ),
                        array(
                            'name'          => 'icon_grad_color_1_hover',
                            'label'         => esc_html__( "Color 1", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'icon_color_type_hover',
                                'show_when'  => 'icon_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'icon_grad_color_2_hover',
                            'label'         => esc_html__( "Color 2", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'icon_color_type_hover',
                                'show_when'  => 'icon_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'icon_grad_color_3_hover',
                            'label'         => esc_html__( "Color 3", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'icon_color_type_hover',
                                'show_when'  => 'icon_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'icon_grad_color_4_hover',
                            'label'         => esc_html__( "Color 4", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'icon_color_type_hover',
                                'show_when'  => 'icon_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'icon_grad_direction_hover',
                            'label'         => esc_html__('Direction', 'deep'),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'icon_color_type_hover',
                                'show_when'  => 'icon_gradient_hover',
                            ),
                        ),
                        array(
                            'name'          => 'icon_style',
                            'label'         => esc_html__( 'Font', 'deep' ),
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,999,767,479",
                                    'Font'   => array(
                                        array('property' => 'text-align', 'label' => 'Text Align', 'selector' => 'i'),
                                    ),
                                    'Box'   => array(
                                        array('property' => 'padding', 'label' => 'Padding', 'selector' => 'i'),
                                        array('property' => 'margin', 'label' => 'Margin', 'selector' => 'i'),
                                        array('property' => 'border', 'label' => 'Border', 'selector' => 'i'),
                                        array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'i'),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name'          => 'icon_name',
                            'label'         => esc_html__( 'Pick an icon', 'deep' ),
                            'type'          => 'icon_picker',
                            'description'   => esc_html__( 'Select Icon', 'deep'),
                            'value'         => 'none',
                        ),
                    ),
                    'Box Shadow' => array(
                        array(
                            'name'          => 'shadow_left',
                            'label'         => esc_html__( 'X offset', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'shadow_top',
                            'label'         => esc_html__( 'Y offset', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'shadow_blur',
                            'label'         => esc_html__( 'Blur', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'shadow_spread',
                            'label'         => esc_html__( 'Spread', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'shadow_color',
                            'label'         => esc_html__( 'Shadow color', 'deep' ),
                            'type'          => 'color_picker',
                        ),
                        array(
                            'name'          => 'shadow_status',
                            'label'         => esc_html__( 'Shadow Status', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                ''       => 'Outset',        
                                'inset'  => 'Inset',        
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
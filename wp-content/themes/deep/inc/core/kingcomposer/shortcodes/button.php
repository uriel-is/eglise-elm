<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'button' => array(
                'name'          => esc_html__( 'Button', 'deep' ),
                'description'   => esc_html__( 'Button shortcode', 'deep' ),
                'icon'          => 'webnus-button',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'shape',
                            'label'         => esc_html__( 'Shape', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                ''         => 'Default',
                                'square'   => 'Square',
                                'rounded'  => 'Rounded',
                            ),
                            'description'   => esc_html__( "Button Type", 'deep'),
                        ),
                        array(
                            'name'          => 'btn_content',
                            'label'         => esc_html__( "Button text", 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( "Button Text Button text", 'deep'),
                        ),
                        array(
                            'name'          => 'url',
                            'label'         => esc_html__( "Button link", 'deep' ),
                            'type'          => 'text',
                            'value'         => '#',
                            'description'   => esc_html__( "Button Button link Link", 'deep'),
                        ),
                        array(
                            'name'          => 'target',
                            'label'         => esc_html__( 'Target', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '_parent' => 'Parent',
                                '_self'   => 'Self',
                                '_blank'  => 'Blank',
                                '_top'    => 'Top',
                            ),
                            'description'   => esc_html__( "Button Type", 'deep'),
                        ),
                        array(
                            'name'          => 'size',
                            'label'         => esc_html__( "Size", 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'small'   => 'Small',
                                'medium'  => 'Medium',
                                'large'   => 'Large',
                            ),
                            'description'   => esc_html__( "Button Size", 'deep'),
                        ),
                        array(
                            'name'          => 'border',
                            'label'         => esc_html__( "Set bordered style", 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'false'  => 'Normal',
                                'true'   => 'Bordered',
                            ),
                        ),
                        array(
                            'name'          => 'button_arrow',
                            'label'         => esc_html__( 'Do you want to have arrow when hover?' , 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'enable'   => 'Enable',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Put the arrow for button when hovering over it.' , 'deep'),
                        ),
                    ),
                    'Icons' => array(
                        array(
                            'name'          => 'icon',
                            'label'         => esc_html__( "Icon", 'deep' ),
                            'type'          => 'icon_picker',
                            'description'   => esc_html__( "Select Button Icon", 'deep'),
                            'value'         => 'none',
                        ),
                        array(
                            'name'          => 'btn_icon_color',
                            'label'         => esc_html__('Button Icon Color', 'deep'),
                            'type'          => 'color_picker',
                        ),                    
                        array(
                            'name'          => 'btn_icon_color_hover',
                            'label'         => esc_html__('Button Hover Icon Color', 'deep'),
                            'type'          => 'color_picker',
                        ),                        
                    ),
                    'Styling' => array(
                        array(
                            'name'          => 'btn_theme_fonts',
                            'label'         => esc_html__( 'Use theme default font family?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'yes',
                            'description'   => esc_html__( 'Use font family from the theme.', 'deep' ),
                        ),
                        array(
                            'name'          => 'btn_text_font',
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,1024,999,767,479",
                                    'Title'  => array(
                                        array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => 'a.button'),
                                    ),
                                ),
                            ),
                            'relation'      => array(
                                'parent'     => 'btn_theme_fonts',
                                'hide_when'  => 'yes',
                            ),
                        ),
                        array(
                            'name'         => 'btn_style',
                            'label'        => esc_html__( 'Font size', 'deep' ),
                            'type'         => 'css',
                            'options'      => array(
                                array(
                                    "screens" => "any,1024,999,767,479",
                                    'Title'   => array(
                                        array('property' => 'font-size', 'label' => 'Title Size' ),
                                        array('property' => 'letter-spacing', 'label' => 'Letter Spacing' ),
                                        array('property' => 'font-weight', 'label' => 'Font Weight' ),
                                        array('property' => 'padding', 'label' => 'Padding'),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name'          => 'botton_skin',
                            'label'         => esc_html__( 'Button Skin', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'predefined' => 'Predefined',
                                'custom'     => 'Custom',
                            ),
                            'description'   => esc_html__( 'Select shortcode type', 'deep'),
                        ),
                        array(
                            'name'          => 'color',
                            'label'         => esc_html__( "Color", 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                "theme-skin" => "Default",
                                "green"      => "Green",
                                "gold"       => "Gold",
                                "red"        => "Red",
                                "blue"       => "Blue",
                                "gray"       => "Gray",
                                "dark-gray"  => "Dark gray",
                                "cherry"     => "Cherry",
                                "orchid"     => "Orchid",
                                "pink"       => "Pink",
                                "orange"     => "Orange",
                                "teal"       => "Teal",
                                "skyblue"    => "SkyBlue",
                                "jade"       => "Jade",
                                "white"      => "White",
                                "black"      => "Black",
                            ),
                            'description'   => esc_html__( "Button Color", 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'predefined',
                            ),
                        ),
                        array(
                            'name'          => 'btn_color',
                            'label'         => esc_html__('Button color', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Button color (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'btn_color_hover',
                            'label'         => esc_html__('Button color Hover', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Button color Hover (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'btn_border_color',
                            'label'         => esc_html__('Button Border color', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'select button border color (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'btn_border_color_hover',
                            'label'         => esc_html__('Button Border color Hover', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'select button border color hover (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'border_style',
                            'label'         => esc_html__( 'Font', 'deep' ),
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,999,767,479",
                                    'Box'   => array(
                                        array('property' => 'border', 'label' => 'Border', 'selector' => ''),
                                        array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => ''),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name'          => 'btn_background',
                            'label'         => esc_html__('Button background 1', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Button background 1 (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'btn_background_1',
                            'label'         => esc_html__('Button background 2', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Button background 2 (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'btn_background_2',
                            'label'         => esc_html__('Button background 3', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Button background 3 (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'bg_grad_direction',
                            'label'         => esc_html__( 'Direction', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Gradient direction example: 70deg', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'btn_background_hover',
                            'label'         => esc_html__('Button background Hover 1', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Button background hover 1 (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'btn_background_hover_1',
                            'label'         => esc_html__('Button background Hover 2', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Button background hover 2 (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'btn_background_hover_2',
                            'label'         => esc_html__('Button background Hover 3', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Button background hover 3 (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'bg_hover_grad_direction',
                            'label'         => esc_html__( 'Hover Direction', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Gradient direction example: 70deg', 'deep'),
                            'relation'      => array(
                                'parent'     => 'botton_skin',
                                'show_when'  => 'custom',
                            ),
                        ),
                    ),
                    'Box Shadow' => array(
                        array(
                            'name'          => 'shadow_left',
                            'label'         => esc_html__( 'X offset', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Please enter desired value with px', 'deep'),
                        ),
                        array(
                            'name'          => 'shadow_top',
                            'label'         => esc_html__( 'Y offset', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Please enter desired value with px', 'deep'),
                        ),
                        array(
                            'name'          => 'shadow_blur',
                            'label'         => esc_html__( 'Blur', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Please enter desired value with px', 'deep'),
                        ),
                        array(
                            'name'          => 'shadow_spread',
                            'label'         => esc_html__( 'Spread', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Please enter desired value with px', 'deep'),
                        ),
                        array(
                            'name'          => 'shadow_status',
                            'label'         => esc_html__( 'Shadow Status', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                ''       => 'Outset',
                                'inset'  => 'inset',
                            ),
                        ),
                        array(
                            'name'          => 'shadow_color',
                            'label'         => esc_html__( 'Shadow color', 'deep' ),
                            'type'          => 'color_picker',
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
<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'deep-title' => array(
                'name'          => esc_html__( 'Title builder', 'deep' ),
                'description'   => esc_html__( 'Title builder', 'deep' ),
                'icon'          => 'webnus-title',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'title',
                            'label'         => esc_html__('Title', 'deep'),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Enter main title', 'deep'),
                        ),
                        array(
                            'name'          => 'subtitle',
                            'label'         => esc_html__('Subtitle', 'deep'),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Enter subtitle', 'deep'),
                        ),
                        array(
                            'name'          => 'text_align',
                            'label'         => esc_html__( 'Alignment', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'left'    => 'Left',
                                'center'  => 'Center',
                                'right'   => 'Right',
                            ),
                        ),
                        array(
                            'name'          => 'rotate',
                            'label'         => esc_html__( 'Rotate', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'none'    => 'none',
                                '45deg'   => '45deg',
                                '90deg'   => '90deg',
                                '180deg'  => '180deg',
                                'custom'  => 'Custom',
                            ),
                        ),
                        array(
                            'name'          => 'custom_rotate',
                            'label'         => esc_html__( 'Custom rotate', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'You should enter your desired value with deg, For example 60deg', 'deep'),
                            'relation'      => array(
                                'parent'     => 'rotate',
                                'show_when'  => 'custom',
                            ),
                        ),
                        array(
                            'name'          => 'display',
                            'label'         => esc_html__( 'Display', 'deep' ),
                            'type'          => 'radio',
                            'options'       => array(
                                	'auto'	        => esc_html__( 'auto', 'deep' ),
                               		'inline'	    => esc_html__( 'inline', 'deep' ),
                                	'inline-block'  => esc_html__( 'inline block', 'deep' ),
                                	'block'		    => esc_html__( 'block', 'deep' ),
                            ),
                            'value'         => 'auto',
                        ),
                        array(
                            'name'          => 'layer_animation',
                            'label'         => esc_html__( 'Layer animation', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'none'                      => 'None',  
                                'wn-layer-anim-bottomB'     => 'Bottom to Top',  
                                'wn-layer-anim-top'         => 'Top to Bottom', 
                                'wn-layer-anim-left'        => 'Left to Right',    
                                'wn-layer-anim-right'       => 'Right to Left',
                                'wn-layer-anim-zoom-in'     => 'Zoom in',
                                'wn-layer-anim-zoom-out'    => 'Zoom out',
                                'wn-layer-anim-fade'        => 'Fade',
                                'wn-layer-anim-flip'        => 'Flip',
                            ),
                        ),
                    ),
                    'Title Styling' => array(
                        array(
                            'name'          => 'title_heading',
                            'label'         => esc_html__( 'Heading', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'h1'    => 'h1',        
                                'h2'    => 'h2',        
                                'h3'    => 'h3',        
                                'h4'    => 'h4',        
                                'h5'    => 'h5',        
                                'h6'    => 'h6',
                                'div'   => 'div',
                                'p'     => 'p',
                                'span'  => 'span',
                            ),
                           'value'         => 'h1',
                           'description'    => esc_html__( 'Select heading', 'deep'),
                        ),
                        array(
                            'name'          => 'title_custom_class',
                            'label'         => esc_html__( 'Custom class', 'deep' ),
                            'type'          => 'text',
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
                                        array('property' => 'font-family', 'label' => 'Title Font Family', 'selector' => '.wn-deep-innertitle'),
                                    ),
                                ),
                            ),
                            'relation'      => array(
                                'parent'     => 'title_theme_fonts',
                                'hide_when'  => 'yes',
                            ),
                        ),
                        array(
                            'name'          => 'title_color_type',
                            'label'         => esc_html__( 'Color type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'title-solid-color' => 'Solid color',
                                'gradient'          => 'Gradient',
                            ),
                            'value'         => 'title-solid-color',
                        ),
                        array(
                            'name'          => 'title_color',
                            'label'         =>  esc_html__('Title color', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select title color (leave blank for default color)', 'deep'),
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
                                'show_when'  => 'gradient',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_color_2',
                            'label'         => esc_html__( "Color 2", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type',
                                'show_when'  => 'gradient',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_color_3',
                            'label'         => esc_html__( "Color 3", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type',
                                'show_when'  => 'gradient',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_color_4',
                            'label'         => esc_html__( "Color 4", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type',
                                'show_when'  => 'gradient',
                            ),
                        ),
                        array(
                            'name'          => 'title_grad_direction',
                            'label'         => esc_html__('Direction', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Gradient direction example: 70', 'deep'),
                            'relation'      => array(
                                'parent'     => 'title_color_type',
                                'show_when'  => 'gradient',
                            ),
                        ),
                        array(
                            'name'          => 'title_style',
                            'label'         => esc_html__( 'Font', 'deep' ),
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,999,767,479",
                                    'Title'   => array(
                                        array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wn-deep-innertitle'),
                                        array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wn-deep-innertitle'),
                                        array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.wn-deep-innertitle'),
                                        array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wn-deep-innertitle'),
                                        array('property' => 'padding', 'label' => 'Padding' , 'selector' => '.wn-deep-innertitle'),
                                        array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wn-deep-innertitle'),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name'          => 'display_title',
                            'label'         => esc_html__( 'Display Title', 'deep' ),
                            'type'          => 'radio',
                            'options'       => array(
                                	'auto'	        => esc_html__( 'auto', 'deep' ),
                               		'inline'	    => esc_html__( 'inline', 'deep' ),
                                	'inline-block'  => esc_html__( 'inline block', 'deep' ),
                                	'block'		    => esc_html__( 'block', 'deep' ),
                            ),
                            'value'         => 'auto',
                        ),
                    ),
                    'Subtitle Styling' => array(
                        array(
                            'name'          => 'subtitle_heading',
                            'label'         => esc_html__( 'Heading', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'h1'    => 'h1',        
                                'h2'    => 'h2',        
                                'h3'    => 'h3',        
                                'h4'    => 'h4',        
                                'h5'    => 'h5',        
                                'h6'    => 'h6',
                                'div'   => 'div',
                                'p'     => 'p',
                                'span'  => 'span',
                            ),
                           'value'         => 'h1',
                           'description'    => esc_html__( 'Select heading', 'deep'),
                        ),
                        array(
                            'name'          => 'subtitle_custom_class',
                            'label'         => esc_html__('Custom class', 'deep'),
                            'type'          => 'text',
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
                        ),
                        array(
                            'name'          => 'subtitle_text_font',
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,1024,999,767,479",
                                    'Subtitle'  => array(
                                        array('property' => 'font-family', 'label' => 'Subtitle Font Family', 'selector' => '.wn-deep-subtitle'),
                                    ),
                                ),
                            ),
                            'relation'      => array(
                                'parent'     => 'subtitle_theme_fonts',
                                'hide_when'  => 'yes',
                            ),
                        ),
                                                array(
                            'name'          => 'sub_title_color_type',
                            'label'         => esc_html__( 'Color type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'subtitle-solid-color' => 'Solid color',
                                'gradient'          => 'Gradient',
                            ),
                            'value'         => 'subtitle-solid-color',
                        ),
                        array(
                            'name'          => 'subtitle_color',
                            'label'         =>  esc_html__('Subtitle color', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select title color (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'sub_title_color_type',
                                'show_when'  => 'subtitle-solid-color',
                            ),
                        ),
                        array(
                            'name'          => 'sub_title_grad_color_1',
                            'label'         => esc_html__( "Color 1", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'sub_title_color_type',
                                'show_when'  => 'gradient',
                            ),
                        ),
                        array(
                            'name'          => 'sub_title_grad_color_2',
                            'label'         => esc_html__( "Color 2", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'sub_title_color_type',
                                'show_when'  => 'gradient',
                            ),
                        ),
                        array(
                            'name'          => 'sub_title_grad_color_3',
                            'label'         => esc_html__( "Color 3", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'sub_title_color_type',
                                'show_when'  => 'gradient',
                            ),
                        ),
                        array(
                            'name'          => 'sub_title_grad_color_4',
                            'label'         => esc_html__( "Color 4", 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Icon box Background Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'sub_title_color_type',
                                'show_when'  => 'gradient',
                            ),
                        ),
                        array(
                            'name'          => 'sub_title_grad_direction',
                            'label'         => esc_html__('Direction', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Gradient direction example: 70', 'deep'),
                            'relation'      => array(
                                'parent'     => 'sub_title_color_type',
                                'show_when'  => 'gradient',
                            ),
                        ),
                        array(
                            'name'          => 'subtitle_style',
                            'label'         => esc_html__( 'Font size', 'deep' ),
                            'type'          => 'css',
                            'options'   => array(
                                array(
                                    "screens" => "any,999,767,479",
                                    'Subtitle'   => array(
                                        array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wn-deep-subtitle'),
                                        array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wn-deep-subtitle'),
                                        array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.wn-deep-subtitle'),
                                        array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wn-deep-subtitle'),
                                        array('property' => 'padding', 'label' => 'Padding' , 'selector' => '.wn-deep-subtitle'),
                                        array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wn-deep-subtitle'),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name'          => 'display_sub_title',
                            'label'         => esc_html__( 'Display Subtitle', 'deep' ),
                            'type'          => 'radio',
                            'options'       => array(
                                	'auto'	        => esc_html__( 'auto', 'deep' ),
                               		'inline'	    => esc_html__( 'inline', 'deep' ),
                                	'inline-block'  => esc_html__( 'inline block', 'deep' ),
                                	'block'		    => esc_html__( 'block', 'deep' ),
                            ),
                            'value'         => 'auto',
                        ),
                    ),
                    'Shape' => array(
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Add Shape', 'deep' ),
                            'name'          => 'shape',
                            'options'       => array('add_text' => __('Add Shape', 'deep')),
                            'params' => array(
                                array(
                                    'name'          => 'shape_width',
                                    'label'         => esc_html__( 'Width', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Enter value with px or %', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_height',
                                    'label'         => esc_html__( 'Height', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Enter value with px or %', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_radius',
                                    'label'         => esc_html__( 'Shape Radius', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Enter value with px or %', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_background_color',
                                    'label'         => esc_html__( 'Shape background color 1', 'deep' ),
                                    'type'          => 'color_picker',
                                    'description'   => esc_html__( 'Shape Gradient Background Color 1', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_background_color_2',
                                    'label'         => esc_html__( 'Shape background color 2', 'deep' ),
                                    'type'          => 'color_picker',
                                    'description'   => esc_html__( 'Shape Gradient Background Color 2', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_background_color_3',
                                    'label'         => esc_html__( 'Shape background color 3', 'deep' ),
                                    'type'          => 'color_picker',
                                    'description'   => esc_html__( 'Shape Gradient Background Color 3', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_background_color_4',
                                    'label'         => esc_html__( 'Shape background color 4', 'deep' ),
                                    'type'          => 'color_picker',
                                    'description'   => esc_html__( 'Shape Gradient Background Color 4', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_gradient_direction',
                                    'label'         => esc_html__( 'Share Gradient Direction', 'deep' ),
                                    'type'          => 'text',
                                    'description'	=> esc_html__( 'Gradient direction example: 70deg', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_background_image',
                                    'label'         => esc_html__( 'Shape background image', 'deep' ),
                                    'type'          => 'attach_image',
                                ),
                                array(
                                    'name'          => 'shape_top_position',
                                    'label'         => esc_html__( 'Top Position', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Enter value with px or %', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_right_position',
                                    'label'         => esc_html__( 'Right Position', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Enter value with px or %', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_bottom_position',
                                    'label'         => esc_html__( 'Bottom Position', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Enter value with px or %', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_left_position',
                                    'label'         => esc_html__( 'Left Position', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Enter value with px or %', 'deep'),
                                ),
                                array(
                                    'name'          => 'shape_rotate',
                                    'label'         => esc_html__( 'Rotate', 'deep' ),
                                    'type'          => 'select',
                                    'options'       => array(
                                        'none'    => 'none',
                                        '45deg'   => '45deg',
                                        '90deg'   => '90deg',
                                        '180deg'  => '180deg',
                                        'custom'  => 'Custom',
                                    ),
                                ),
                                array(
                                    'name'          => 'shape_custom_rotate',
                                    'label'         => esc_html__( 'Custom rotate', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'You should enter your desired value with deg, For example 60deg', 'deep'),
                                    'relation'      => array(
                                        'parent'     => 'shape-shape_rotate',
                                        'show_when'  => 'custom',
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
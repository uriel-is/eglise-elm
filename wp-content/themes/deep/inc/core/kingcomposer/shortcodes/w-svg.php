<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'icon_svg' => array(
                'name'          => esc_html__( 'SVG live icon', 'deep' ),
                'description'   => esc_html__( 'SVG live icon', 'deep' ),
                'icon'          => 'webnus-svg',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'live'  => esc_html__( 'Live Icon', 'deep' ),
                                'img'   => esc_html__( 'Image Tag', 'deep' ),
                            ),
                            'std'			=> 'live',
                            'description'   => esc_html__( 'Render img tag', 'deep'),
                        ),
                        array(
                            'name'          => 'svg_img',
                            'label'         => esc_html__( 'Upload SVG', 'deep' ),
                            'type'          => 'attach_image',
                            'description'   => esc_html__( 'Shortcode image', 'deep'),
                        ),
                        array(
                            'name'          => 'svg_color',
                            'label'         => esc_html__( 'SVG color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select icon color (leave blank for default color)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => 'live',
                            ),
                        ),
                        array(
                            'name'          => 'svg_size',
                            'label'         => esc_html__( 'SVG Size', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter SVG size (Example: 200px. Leave blank for default size).', 'deep'),
                        ),
                        array(
                            'name'          => 'svg_align',
                            'label'         => esc_html__( 'Alignment', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'left'    => 'Left' ,
                                'center'  => 'Center',
                                'right'   => 'Right' ,
                            ),
                            'description'   => esc_html__( 'Select desired alignment', 'deep'),
                        ),
                    ),
                    'Link' => array(
                        array(
                            'name'          => 'svg_link_url',
                            'label'         => esc_html__('Link URL', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'IconBox Link URL (http://example.com)', 'deep'),
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
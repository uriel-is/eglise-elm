<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'videoplay' => array(
                'name'          => esc_html__( 'Video Play Button', 'deep' ),
                'description'   => esc_html__( 'Video Play Button', 'deep' ),
                'icon'          => 'webnus-videoplay',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'img',
                            'label'         => esc_html__( 'Background Image', 'deep' ),
                            'type'          => 'attach_image',
                            'description'   => esc_html__('Image Width in px format, Example : 100px' , 'deep'),
                        ),
                        array(
                            'name'          => 'img_alt',
                            'label'         => esc_html__( 'Image Alt', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'bottom_text',
                            'label'         => esc_html__( 'Show Alt Tag Under Video Button', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                        ),
                        array(
                            'name'          => 'img_width',
                            'label'         => esc_html__( 'Image Width', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Image Height in px format, Example : 100px' , 'deep'),
                        ),
                        array(
                            'name'          => 'img_height',
                            'label'         => esc_html__( 'Image Height', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'link',
                            'label'         => esc_html__( 'Video URL', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'YouTube/Vimeo URL', 'deep'),
                        ),
                        array(
                            'name'          => 'img_align',
                            'label'         =>  esc_html__( 'Image Alignment', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'center'  => 'Center' ,
                                'right'   => 'Right',
                                'left'    => 'left',
                            ),
                        ),
                        array(
                            'name'          => 'size',
                            'label'         => esc_html__( 'Icon Size', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Icon size in px format, Example: 80px', 'deep'),
                        ),
                        array(
                            'name'          => 'color',
                            'label'         => esc_html__('Icon color', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select icon color', 'deep'),
                        ),
                        array(
                            'name'          => 'link_class',
                            'label'         => esc_html__('Extra Class', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Extra Class ', 'deep'),
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
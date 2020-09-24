<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'video-background' => array(
                'name'          => esc_html__( 'Video Teaser', 'deep' ),
                'description'   => esc_html__( 'Video teaser', 'deep' ),
                'icon'          => 'webnus-videoteaser',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'video_type',
                            'label'         => esc_html__( 'Background Video Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'youtube'  => 'Youtube' ,
                                'internal' => 'Internal',
                            ),
                            'description'   => esc_html__( 'Please select video type', 'deep'),
                        ),
                        array(
                            'name'          => 'video_url',
                            'label'         => esc_html__( 'Video URL', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'action_type',
                            'label'         =>  esc_html__( 'Action on click', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'popup'    => 'Light box video' ,
                                'page_url' => 'Page URL',
                            ),
                        ),
                        array(
                            'name'          => 'target_url',
                            'label'         => esc_html__( 'Target URL', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Please enter target URL(Popup)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'action_type',
                                'show_when'  => 'page_url',
                            ),
                        ),
                        array(
                            'name'          => 'overlay_color',
                            'label'         => esc_html__('Overlay color', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select overlay color (leave blank for default color)', 'deep'),
                        ),
                        array(
                            'name'          => 'thumbnail',
                            'label'         => esc_html__( 'Background Image for Mobile.', 'deep' ),
                            'type'          => 'attach_image',
                        ),
                        array(
                            'name'          => 'thumbnail_size',
                            'label'         => esc_html__( 'Image Size', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'deep'),
                        ),
                        array(
                            'name'          => 'height',
                            'label'         => esc_html__( 'Video Height' , 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Please enter height value with px, Example : 100px' , 'deep'),
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
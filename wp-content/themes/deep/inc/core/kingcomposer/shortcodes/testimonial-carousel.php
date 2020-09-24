<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'testimonial-carousel'  => array(
                'name'          => esc_html__( 'Testimonial Carousel', 'deep' ),
                'description'   => esc_html__( 'Testimonial Carousel', 'deep' ),
                'icon'          => 'webnus-testimonial-carousel',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    array(
                        'name'          => 'type',
                        'label'         => esc_html__( 'Testimonial Type', 'deep' ),
                        'type'          => 'select',
                        'options'       => array(
                            '1'  => 'One',
                            '2'  => 'Two',
                            '3'  => 'Three',
                            '4'  => 'Four',
                        ),
                    ),
                    array(
                        'name'          => 'items',
                        'label'         => esc_html__('Testimonial Items Per View', 'deep'),
                        'type'          => 'text',
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => array( '1' , '2' , '3' ),
                        ),
                    ),
                    array(
                        'type'          => 'group',
                        'label'         => esc_html__( 'Testimonial Items', 'deep' ),
                        'name'          => 'testimonial_item',
                        'description'   => esc_html__( 'Please Add Your images', 'deep' ),
                        'options'       => array(
                            'add_text' => esc_html__( 'Add new' , 'deep' )
                        ),
                        'params' => array(
                            array(
                                'name'          => 'img',
                                'label'         => esc_html__( 'Testimonial Image', 'deep' ),
                                'type'          => 'attach_image',
                            ),
                            array(
                                'name'          => 'thumbnail',
                                'label'         => esc_html__( 'Image Size', 'deep' ),
                                'type'          => 'text',
                                'description'   => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'deep'),
                            ),
                            array(
                                'name'          => 'tc_content',
                                'label'         => esc_html__('Testimonial Content', 'deep'),
                                'type'          => 'textarea',
                            ),
                            array(
                                'name'          => 'name',
                                'label'         => esc_html__('Testimonial Name', 'deep'),
                                'type'          => 'text',
                            ),
                            array(
                                'name'          => 'job',
                                'label'         => esc_html__('Testimonial Job', 'deep'),
                                'type'          => 'text',
                            ),
                        ),
                    ),
                    array(
                        'type'          => 'group',
                        'label'         => esc_html__( 'Testimonial Items', 'deep' ),
                        'name'          => 'testimonial_item_type4',
                        'description'   => esc_html__( 'Please Add Your images', 'deep' ),
                        'options'       => array(
                            'add_text' => esc_html__( 'Add new' , 'deep' )
                        ),
                        'params' => array(
                            array(
                                'name'          => 'tc_content_t4',
                                'label'         => esc_html__('Testimonial Content', 'deep'),
                                'type'          => 'textarea',
                            ),
                            array(
                                'name'          => 'first_social',
                                'label'         => esc_html__( 'First Social Name', 'deep' ),
                                'type'          => 'select',
                                'options'       => array(
                                    'twitter'       => 'Twitter',
                                    'facebook'      => 'Facebook',
                                    'google-plus'   => 'Google Plus',
                                    'vimeo'         => 'Vimeo',
                                    'dribbble'      => 'Dribbble',
                                    'youtube'       => 'Youtube',
                                    'pinterest'     => 'Pinterest',
                                    'linkedin'      => 'LinkedIn',
                                    'instagram'     => 'Instagram',
                                    ),
                                'value'         => 'twitter',
                                'description'   => esc_html__( 'Select Social Name', 'deep'),
                            ),
                            array(
                                'name'          => 'first_url',
                                'label'         => esc_html__( 'First Social URL', 'deep' ),
                                'type'          => 'text',
                                'description'   => esc_html__( 'First social URL', 'deep'),
                            ),
                            array(
                                'name'          => 'second_social',
                                'label'         => esc_html__( 'Second Social Name', 'deep' ),
                                'type'          => 'select',
                                'options'       => array(
                                    'twitter'       => 'Twitter',
                                    'facebook'      => 'Facebook',
                                    'google-plus'   => 'Google Plus',
                                    'vimeo'         => 'Vimeo',
                                    'dribbble'      => 'Dribbble',
                                    'youtube'       => 'Youtube',
                                    'pinterest'     => 'Pinterest',
                                    'linkedin'      => 'LinkedIn',
                                    'instagram'     => 'Instagram',
                                    ),
                                'value'         => 'twitter',
                                'description'   => esc_html__( 'Select Social Name', 'deep'),
                            ),
                            array(
                                'name'          => 'second_url',
                                'label'         => esc_html__( 'Second Social URL', 'deep' ),
                                'type'          => 'text',
                                'description'   => esc_html__( 'Second social URL', 'deep'),
                            ),
                            array(
                                'name'          => 'third_social',
                                'label'         => esc_html__( 'Third Social Name', 'deep' ),
                                'type'          => 'select',
                                'options'       => array(
                                    'twitter'       => 'Twitter',
                                    'facebook'      => 'Facebook',
                                    'google-plus'   => 'Google Plus',
                                    'vimeo'         => 'Vimeo',
                                    'dribbble'      => 'Dribbble',
                                    'youtube'       => 'Youtube',
                                    'pinterest'     => 'Pinterest',
                                    'linkedin'      => 'LinkedIn',
                                    'instagram'     => 'Instagram',
                                    ),
                                'value'         => 'twitter',
                                'description'   => esc_html__( 'Select Social Name', 'deep'),
                            ),
                            array(
                                'name'          => 'third_url',
                                'label'         => esc_html__( 'Third Social URL', 'deep' ),
                                'type'          => 'text',
                                'description'   => esc_html__( 'Third social URL', 'deep'),
                            ),
                            array(
                                'name'          => 'fourth_social',
                                'label'         => esc_html__( 'Fourth Social Name', 'deep' ),
                                'type'          => 'select',
                                'options'       => array(
                                    'twitter'       => 'Twitter',
                                    'facebook'      => 'Facebook',
                                    'google-plus'   => 'Google Plus',
                                    'vimeo'         => 'Vimeo',
                                    'dribbble'      => 'Dribbble',
                                    'youtube'       => 'Youtube',
                                    'pinterest'     => 'Pinterest',
                                    'linkedin'      => 'LinkedIn',
                                    'instagram'     => 'Instagram',
                                    ),
                                'value'         => 'twitter',
                                'description'   => esc_html__( 'Select Social Name', 'deep'),
                            ),
                            array(
                                'name'          => 'fourth_url',
                                'label'         => esc_html__( 'Fourth Social URL', 'deep' ),
                                'type'          => 'text',
                                'description'   => esc_html__( 'Fourth social URL', 'deep'),
                            ),
                        ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
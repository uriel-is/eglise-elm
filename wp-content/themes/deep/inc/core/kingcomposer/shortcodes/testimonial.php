<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'testimonial' => array(
                'name'          => esc_html__( 'Testimonial', 'deep' ),
                'description'   => esc_html__( 'Testimonial', 'deep' ),
                'icon'          => 'webnus-testimonial',
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
                                '3'  => 'Type 3',
                                '4'  => 'Type 4',
                                '5'  => 'Type 5',
                            ),
                            'description'   => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                        ),
                        array(
                            'name'          => 'name',
                            'label'         => esc_html__( 'Name', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the Testimonial Name', 'deep'),
                        ),
                        array(
                            'name'          => 'img',
                            'label'         => esc_html__( 'Image', 'deep' ),
                            'type'          => 'attach_image',
                            'description'   => esc_html__( 'Testimonial Image', 'deep'),
                        ),
                        array(
                            'name'          => 'thumbnail',
                            'label'         => esc_html__( 'Image Size', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'deep'),
                        ),
                        array(
                            'name'          => 'testimonial_content',
                            'label'         => esc_html__( 'Content', 'deep' ),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Enter the Testimonial content text', 'deep'),
                        ),
                        array(
                            'name'          => 'member_job',
                            'label'         => esc_html__('Job', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Please enter job', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '3' , '5' ),
                            ),
                        ),
                        array(
                            'name'          => 'testimonial_background',
                            'label'         => esc_html__( 'Background', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Background Color', 'deep'),
                        ),
                        array(
                            'name'          => 'testimonial_content_color',
                            'label'         => esc_html__( 'Color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Content Color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '3',
                            ),
                        ),
                        array(
                            'name'          => 'social',
                            'label'         => esc_html__('Social Icons', 'deep'),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'enable'   => 'Enable',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'By enabling this option, Member social networks links will appear.', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '3',
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
                            'relation'      => array(
                                'parent'     => 'social',
                                'show_when'  => 'enable',
                            ),
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
                            'relation'      => array(
                                'parent'     => 'social',
                                'show_when'  => 'enable',
                            ),
                        ),
                        array(
                            'name'          => 'first_url',
                            'label'         => esc_html__( 'First Social URL', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'First social URL', 'deep'),
                            'relation'      => array(
                                'parent'     => 'social',
                                'show_when'  => 'enable',
                            ),
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
                            'relation'      => array(
                                'parent'     => 'social',
                                'show_when'  => 'enable',
                            ),
                        ),
                        array(
                            'name'          => 'second_url',
                            'label'         => esc_html__( 'Second Social URL', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Second social URL', 'deep'),
                            'relation'      => array(
                                'parent'     => 'social',
                                'show_when'  => 'enable',
                            ),
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
                            'relation'      => array(
                                'parent'     => 'social',
                                'show_when'  => 'enable',
                            ),
                        ),
                        array(
                            'name'          => 'third_url',
                            'label'         => esc_html__( 'Third Social URL', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Third social URL', 'deep'),
                            'relation'      => array(
                                'parent'     => 'social',
                                'show_when'  => 'enable',
                            ),
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
                            'relation'      => array(
                                'parent'     => 'social',
                                'show_when'  => 'enable',
                            ),
                        ),
                        array(
                            'name'          => 'fourth_url',
                            'label'         => esc_html__( 'Fourth Social URL', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Fourth social URL', 'deep'),
                            'relation'      => array(
                                'parent'     => 'social',
                                'show_when'  => 'enable',
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
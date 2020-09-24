<?php
if (function_exists('kc_add_map')) {
    kc_add_map(
        array(
            'deep-login' => array(
                'name'          => esc_html__( 'Login', 'deep' ),
                'description'   => esc_html__( 'Webnus Login', 'deep' ),
                'icon'          => 'webnus-login',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                       array(
                            'name'          => 'img',
                            'label'         => esc_html__('Webnus login logo', 'deep'),
                            'type'          => 'attach_image',
                            'description'   => esc_html__( 'Select images for logo', 'deep'),
                        ),
                        array(
                            'name'          => 'title',
                            'label'         => esc_html__('Title', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the title', 'deep'),
                        ),
                        array(
                            'name'          => 'subtitle',
                            'label'         => esc_html__('Subtitle', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the subtitle', 'deep'),
                        ),
                        array(
                            'name'          => 'bpcontent',
                            'label'         => esc_html__('Content', 'deep'),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Enter the content', 'deep'),
                        ),
                        array(
                            'name'          => 'bottom_text',
                            'label'         => esc_html__( 'Hide login with Facebook or Google + ?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
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

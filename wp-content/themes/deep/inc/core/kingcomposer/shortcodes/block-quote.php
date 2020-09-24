<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'block-quote' => array(
                'name'          => esc_html__( 'Blockquote', 'deep' ),
                'description'   => esc_html__( 'Blockquote', 'deep' ),
                'icon'          => 'webnus-block-quote',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'     => '1',
                                '2'     => '2',
                            ),
                            'description'       => esc_html__( 'Select shortcode type', 'deep'),
                        ),
                        array(
                            'name'          => 'background_image',
                            'label'         => esc_html__( 'Background Image', 'deep' ),
                            'type'          => 'attach_image',
                            'description'   => esc_html__( 'Select an image for background image', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '1',
                            ),
                        ),
                        array(
                            'name'          => 'author_image',
                            'label'         => esc_html__( 'Author Image', 'deep' ),
                            'type'          => 'attach_image',
                            'description'   => esc_html__( 'Select an image for author image recommended size ( 50px X 50px )', 'deep'),
                        ),
                        array(
                            'name'          => 'background_image_alt',
                            'label'         => esc_html__( 'Background Image alt', 'deep' ),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '1',
                            ),
                        ),
                        array(
                            'name'          => 'author_image_alt',
                            'label'         => esc_html__( 'Author Image alt', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'author_name',
                            'label'         => esc_html__( 'Author name', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'block_content',
                            'label'         => esc_html__( 'Content', 'deep' ),
                            'type'          => 'textarea',
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
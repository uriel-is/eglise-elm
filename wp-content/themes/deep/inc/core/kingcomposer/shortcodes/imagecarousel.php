<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'imagecarousel' => array(
                'name'          => esc_html__( 'Image Carousel', 'deep' ),
                'description'   => esc_html__( 'Webnus Image Carousel', 'deep' ),
                'icon'          => 'webnus-imagecarousel',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Image Carousel Type' , 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'type1'   => 'Type 1' ,
                                'type2'   => 'Type 2' ,
                                'type3'   => 'Type 3' ,
                                'type4'   => 'Type 4' ,
                                ),
                            'description'   => esc_html__( 'Please Select image carousel type' , 'deep'),
                        ),
                        array(
                            'name'          => 'item_carousle',
                            'label'         => esc_html__( 'Carousel Items', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Please enter carousel items to show', 'deep' ),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => 'type1',
                            ),
                        ),
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Image Item', 'deep' ),
                            'name'          => 'image_item',
                            'description'   => esc_html__( 'Please Add Your images', 'deep' ),
                            'options'       => array('add_text' => __('Add new Image', 'deep')),
                            'params' => array(
                                array(
                                    'name'          => 'image',
                                    'label'         => esc_html__( 'Select image', 'deep' ),
                                    'type'          => 'attach_image',
                                    'description'   => esc_html__( 'Please Select Your Desired image', 'deep' ),
                                ),
                            ),
                        ),
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Image Item', 'deep' ),
                            'name'          => 'image_item_t3',
                            'description'   => esc_html__( 'Please Add Your images', 'deep' ),
                            'options'       => array('add_text' => __('Add new Image', 'deep')),
                            'params' => array(
                                array(
                                    'name'          => 'image_t3',
                                    'label'         => esc_html__( 'Select image', 'deep' ),
                                    'type'          => 'attach_image',
                                    'description'   => esc_html__( 'Please Select Your Desired image', 'deep' ),
                                ),
                                array(
                                    'name'          => 'title_t3',
                                    'label'         => esc_html__( 'Caption', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Enter Your Image Title', 'deep' ),
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
<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'service_carousel'  => array(
                'name'          => esc_html__( 'Box Carousel', 'deep' ),
                'description'   => esc_html__( 'Box Carousel', 'deep' ),
                'icon'          => 'webnus-services-carousel',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    array(
                        'type'          => 'group',
                        'label'         => esc_html__( 'Box Item', 'deep' ),
                        'name'          => 'carousel_item',
                        'description'   => esc_html__( 'Please Add Your service', 'deep' ),
                        'options'       => array(
                            'add_text' => esc_html__( 'Add new' , 'deep' )
                        ),
                        'params' => array(
                            array(
                                'name'          => 'service_title',
                                'label'         => esc_html__( 'Box Title', 'deep' ),
                                'type'          => 'text',
                                'description'   => esc_html__( 'Please enter your title', 'deep' ),
                            ),
                            array(
                                'name'          => 'service_content',
                                'label'         => esc_html__( 'Box Content', 'deep' ),
                                'type'          => 'textarea',
                                'description'   => esc_html__( 'Please enter your content', 'deep' ),
                            ),
                            array(
                                'name'          => 'service_icon',
                                'label'         => esc_html__( 'Select Icon', 'deep' ),
                                'type'          => 'icon_picker',
                                'value'         => 'none',
                            ),
                        ),
                    ),
                    array(
                        'name'          => 'item_carousle',
                        'label'         => esc_html__( 'Carousel Items', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Please enter carousel items to show', 'deep' ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
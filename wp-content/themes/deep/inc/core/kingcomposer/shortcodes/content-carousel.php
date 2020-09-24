<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'content_carousel' => array(
                'name'         => esc_html__('Content Carousel',"deep"),
                'description'  => esc_html__('Create Content Carousel','deep'),
                'title'        => 'Carousel Settings',
                'is_container' => true,
                'views'        => array(
                    'type'     => 'views_sections',
                    'sections' => 'content_carousel_tab' // this is children item was added above
                ),
                'icon'          => 'webnus-content-carousel',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'item_num',
                            'label'         => esc_html__( 'Content Carousel Items', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Number of items want to show in content carousel', 'deep' ),
                        ),
                        array(
                            'name'          => 'item_margin',
                            'label'         => esc_html__( 'Item margin', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Content carousel items margin right ( For example: 50 )', 'deep' ),
                        ),
                        array(
                            'name'          => 'items_stage_padding',
                            'label'         => esc_html__( 'Items stage padding', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Content carousel padding left and right on stage ( For example: 30 )', 'deep' ),
                        ),
                        array(
                            'name'          => 'carousel_padding',
                            'label'         => esc_html__( 'Custom Padding for carousel container' , 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Enable',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Content Carousel padding left and right, for Example 30px' , 'deep' ),
                        ),
                        array(
                            'name'          => 'carousel_paddin_val',
                            'label'         => esc_html__( 'Carousel padding Value' , 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Padding left and right, for Example 30px' , 'deep' ),
                            'relation'      => array(
                                'parent'     => 'carousel_padding',
                                'show_when'  => 'true',
                            ),
                        ),
                        array(
                            'name'          => 'carousel_rtl',
                            'label'         => esc_html__( 'RTL' , 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Enable',
                            ),
                            'value'         => 'false',
                        ),
                    ),
                    'Navigation' => array(
                        array(
                            'name'          => 'dots',
                            'label'         => esc_html__( 'Bullets Navigation' , 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Enable',
                            ),
                            'value'         => 'false',
                        ),
                        array(
                            'name'          => 'navigation',
                            'label'         => esc_html__( 'Navigation Arrows' , 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Enable',
                            ),
                            'value'         => 'false',
                        ),
                        array(
                            'name'          => 'nav_location',
                            'label'         => esc_html__( 'Locate the navigation arrows on the content carousel' , 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'bottom_nav'    => 'Bottom',
                                'sidebar_nav'   => 'Sidebar',
                            ),
                            'relation'      => array(
                                'parent'     => 'navigation',
                                'show_when'  => 'true',
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
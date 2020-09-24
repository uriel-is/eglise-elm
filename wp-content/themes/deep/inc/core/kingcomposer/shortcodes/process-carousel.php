<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'process_carousel'  => array(
                'name'          => esc_html__( 'Process Carousel', 'deep' ),
                'description'   => esc_html__( 'Process Carousel', 'deep' ),
                'icon'          => 'webnus-process-carousel',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    array(
                        'type'          => 'group',
                        'label'         => esc_html__( 'Process Carousel Item', 'deep' ),
                        'name'          => 'process_item',
                        'description'   => esc_html__( 'Please Add Your images', 'deep' ),
                        'options'       => array(
                            'add_text' => esc_html__( 'Add new' , 'deep' )
                        ),
                        'params' => array(
                            array(
                                'name'          => 'pc_title',
                                'label'         => esc_html__('Process Title', 'deep'),
                                'type'          => 'text',
                            ),
                            array(
                                'name'          => 'pc_content',
                                'label'         => esc_html__('Process Content', 'deep'),
                                'type'          => 'textarea',
                            ),
                        ),
                    ),
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
                )
            ),
        )
    ); // End add map
 } // End if
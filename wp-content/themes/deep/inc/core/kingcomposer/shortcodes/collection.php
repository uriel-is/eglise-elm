<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'collection' => array(
                'name'          => esc_html__( 'Collection', 'deep' ),
                'description'   => esc_html__( 'Collection Box', 'deep' ),
                'icon'          => 'webnus-collection',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Put your title', 'deep'),
                        ),
                        array(
                            'name'          => 'image',
                            'label'         => esc_html__( 'Select Image', 'deep' ),
                            'type'          => 'attach_image',
                            'description'   => esc_html__( 'Select Image', 'deep'),
                        ),
                        array(
                            'name'          => 'image_top_bottom',
                            'label'         => esc_html__( 'Image in Top or Bottom?', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'top'    => 'Top',
                                'bottom' => 'Bottom',
                            ),
                            'description'   => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                        ),
                        array(
                            'name'          => 'image_left_right',
                            'label'         => esc_html__( 'Image in Left or Right?', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'right'  => 'Right',
                                'left'   => 'Left',
                            ),
                            'description'   => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                        ),
                        array(
                            'name'          => 'year',
                            'label'         => esc_html__('Collection Year', 'deep'),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'brands',
                            'label'         => esc_html__('Brands', 'deep'),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Put your brands each line', 'deep')
                        ),
                        array(
                            'name'          => 'c_content',
                            'label'         => esc_html__('Content', 'deep'),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Collection Content Goes Here', 'deep'),
                        ),
                        array(
                            'name'          => 'link_title',
                            'label'         => esc_html__('Link Title', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Put your link title', 'deep'),
                        ),
                        array(
                            'name'          => 'link_href',
                            'label'         => esc_html__('Link Address', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Put your link address', 'deep'),
                        ),
                        array(
                            'name'          => 'link_target',
                            'label'         => esc_html__( 'Open link in a new tab?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                                ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Add Target = _blank', 'deep'),
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
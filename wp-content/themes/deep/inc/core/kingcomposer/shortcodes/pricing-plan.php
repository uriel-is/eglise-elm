<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'pricing-plan'  => array(
                'name'          => esc_html__( 'Pricing Plan', 'deep' ),
                'description'   => esc_html__( 'Pricing Plan', 'deep' ),
                'icon'          => 'webnus-pricing-plan',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    array(
                        'name'          => 'type',
                        'label'         => esc_html__( 'Type', 'deep' ),
                        'type'          => 'select',
                        'options'       => array(
                            '1'    => esc_html__( 'Type 1', 'deep' ),        
                            '2'    => esc_html__( 'Type 2', 'deep' ),        
                            '3'    => esc_html__( 'Type 3', 'deep' ),        
                        ),
                       'description'    =>  esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                    ),
                    array(
                        'name'          => 'title',
                        'label'         => esc_html__('Title', 'deep'),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Pricing Plan Title', 'deep'),
                    ),
                    array(
                        'type'          => 'group',
                        'label'         => esc_html__( 'Features', 'deep' ),
                        'name'          => 'features',
                        'description'   => esc_html__( 'Please Add Your Features', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => array( '2' , '3' ),
                        ),
                        'options'       => array(
                            'add_text' => esc_html__( 'Add new' , 'deep' )
                        ),
                        'params' => array(
                            array(
                                'name'          => 'feature_icon',
                                'label'         => esc_html__( 'Feature Item Icon', 'deep' ),
                                'type'          => 'select',
                                'options'       => array(
                                    'empty-icon'         => esc_html__( 'Empty', 'deep' ),        
                                    'available-icon'     => esc_html__( 'Available', 'deep' ),        
                                    'not-available-icon' => esc_html__( 'Not Available', 'deep' ),        
                                ),
                            ),
                            array(
                                'name'          => 'feature_item',
                                'label'         => esc_html__('Feature Item Text', 'deep'),
                                'type'          => 'text',
                            ),
                        ),
                    ),
                    array(
                        'name'          => 'text_content',
                        'label'         => esc_html__( 'Content', 'deep' ),
                        'type'          => 'textarea',
                        'description'   => esc_html__( 'Enter the content Name', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => '1',
                        ),
                    ),
                    array(
                        'name'          => 'flag',
                        'label'         => esc_html__( 'Flag', 'deep' ),
                        'type'          => 'select',
                        'options'       => array(
                            'none'       => esc_html__( 'None', 'deep' ),        
                            'Featured'   => esc_html__( 'Featured', 'deep' ),        
                            'Popular'    => esc_html__( 'Popular', 'deep' ),        
                        ),
                       'description'    =>  esc_html__( 'Enter the content Name', 'deep' ),
                       'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => '2',
                        ),
                    ),
                    array(
                        'name'          => 'img',
                        'label'         => esc_html__( 'Background Image' , 'deep'),
                        'type'          => 'attach_image',
                        'description'   => esc_html__( 'Pricing Plan backgound Image', 'deep'),
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => '3',
                        ),
                    ),
                    array(
                        'name'          => 'price',
                        'label'         => esc_html__( 'Price', 'deep' ),
                        'type'          => 'text',
                        'value'         => '$',
                        'description'   => esc_html__( 'Enter the price Name', 'deep' ),
                    ),
                    array(
                        'name'          => 'period',
                        'label'         => esc_html__( 'Period', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Pricing Plan Period', 'deep' ),
                    ),
                    array(
                        'name'          => 'link_text',
                        'label'         => esc_html__( 'Link Text', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Link Text', 'deep' ),
                    ),
                    array(
                        'name'          => 'link_url',
                        'label'         => esc_html__( 'Link URL', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Link URL (http://example.com )', 'deep'),
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
<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'pricing-tables'  => array(
                'name'          => esc_html__( 'Pricing Tables', 'deep' ),
                'description'   => esc_html__( 'Pricing Tables', 'deep' ),
                'icon'          => 'webnus-pricingtable',
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
                            '4'    => esc_html__( 'Type 4', 'deep' ),        
                            '5'    => esc_html__( 'Type 5', 'deep' ),        
                            '6'    => esc_html__( 'Type 6', 'deep' ),
                            '7'    => esc_html__( 'Type 7', 'deep' ),
                            '8'    => esc_html__( 'Type 8', 'deep' ),
                            '9'    => esc_html__( 'Type 9', 'deep' ),
                            '10'    => esc_html__( 'Type 10', 'deep' ),
                        ),
                       'description'    =>  esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                    ),
                    array(
                        'name'          => 'title',
                        'label'         => esc_html__('Title', 'deep'),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Pricing Table Title', 'deep'),
                    ),
                    array(
                        'name'          => 'description',
                        'label'         => esc_html__( 'Header Description', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Pricing Table Description', 'deep'),
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => '4',
                        ),
                    ),
                    array(
                        'name'          => 'price',
                        'label'         => esc_html__('Price', 'deep'),
                        'type'          => 'text',
                        'value'         => '$10',
                        'description'   => esc_html__( 'Pricing Table Price', 'deep'),
                    ),
                    array(
                        'name'          => 'price_symbol',
                        'label'         => esc_html__( 'Price Symbol', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Pricing Symbol', 'deep'),
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => array( '7' , '10' ),
                        ),
                    ),
                    array(
                        'name'          => 'on_sale_price',
                        'label'         => esc_html__('Special Offer', 'deep'),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Pricing Table Special Offer or On Sale Price', 'deep'),
                        'relation'      => array(
                            'parent'     => 'type',
                            'hide_when'  => array( '8' , '9' ),
                        ),
                    ),
                    array(
                        'name'          => 'plan_label',
                        'label'         => esc_html__('Plan Label', 'deep'),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Pricing Table Label', 'deep'),
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => array( '3' , '5' ),
                        ),
                    ),
                    array(
                        'name'          => 'label_bg_color',
                        'label'         => esc_html__( 'Label Color', 'deep' ),
                        'type'          => 'color_picker',
                        'description'   => esc_html__( 'Select Custom Label Color', 'deep'),
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => '5',
                        ),
                    ),
                    array(
                        'name'          => 'period',
                        'label'         => esc_html__('Period', 'deep'),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Pricing Table Period', 'deep'),
                        'value'         => esc_html__( 'Month', 'deep'),
                    ),
                    array(
                        'type'          => 'group',
                        'label'         => esc_html__( 'Features', 'deep' ),
                        'name'          => 'features',
                        'description'   => esc_html__( 'Please Add Your images', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'type',
                            'hide_when'  => array( '8' , '9' ),
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
                        'name'          => 'content_text',
                        'label'         => esc_html__('Content Pricing Table Text', 'deep'),
                        'type'          => 'text',
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => '8',
                        ),
                    ),
                    array(
                        'name'          => 'footer_text',
                        'label'         => esc_html__('Footer Pricing Table Text', 'deep'),
                        'type'          => 'text',
                        'relation'      => array(
                            'parent'     => 'type',
                            'hide_when'  => array( '8' , '9' ),
                        ),
                    ),
                    array(
                        'name'          => 'button_text',
                        'label'         => esc_html__('Button Text', 'deep'),
                        'type'          => 'text',
                    ),
                    array(
                        'name'          => 'button_url',
                        'label'         => esc_html__('Button URL', 'deep'),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Button URL (http://example.com)', 'deep' ),
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
                        'name'          => 'featured',
                        'label'         => esc_html__( 'Featured Plan?', 'deep' ),
                        'type'          => 'checkbox',
                        'options'       => array(
                            'yes'   => 'Yes',
                        ),
                        'value'         => 'false',
                        'description'   => esc_html__( 'Pricing Tables Featured Plan', 'deep'),
                        'relation'      => array(
                            'parent'     => 'type',
                            'hide_when'  => array( '8' , '9' ),
                        ),
                    ),
                    array(
                        'name'          => 'icon',
                        'label'         => esc_html__( 'Plan Icon', 'deep' ),
                        'type'          => 'icon_picker',
                        'value'         => 'none',
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => '2',
                        ),
                    ),
                    array(
                        'name'          => 'heading_bg_color',
                        'label'         => esc_html__( 'Heading Background Color', 'deep' ),
                        'type'          => 'color_picker',
                        'description'   => esc_html__( 'Select Custom Background Color', 'deep'),
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => '6',
                        ),
                    ),
                    array(
                        'name'          => 'heading_text_color',
                        'label'         => esc_html__( 'Heading Text Color', 'deep' ),
                        'type'          => 'color_picker',
                        'description'   => esc_html__( 'Select Custom Text Color', 'deep'),
                        'relation'      => array(
                            'parent'     => 'type',
                            'show_when'  => '6',
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
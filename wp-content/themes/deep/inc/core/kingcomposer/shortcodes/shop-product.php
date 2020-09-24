<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'shop_products' => array(
                'name'          => esc_html__( 'Shop Products', 'deep' ),
                'description'   => esc_html__( 'Shop Products', 'deep' ),
                'icon'          => 'webnus-shop-products',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'number_of_columns',
                            'label'         => esc_html__( 'Shop Product Setting', 'deep' ),
                            'type'          => 'note',
                            'value'         => wp_kses( __( 'This shortcode uses Theme Options inside settings. Please go to this direction: Theme Options - Shop', 'deep'), array( '-' => array() ) ),
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
<?php
if (function_exists('kc_add_map')) { 
    $special_offers_product = array(
        'post_type'         => 'product',
        'order'             => 'ASC',
        'posts_per_page'    => '-1',
    );
    
    $spo_query = new WP_Query( $special_offers_product );
    $titles = array();
    if ( $spo_query->have_posts() ) {
        $titles[] = esc_html__( 'Please select a product', 'deep' );
        while ( $spo_query->have_posts() ) {
            $spo_query->the_post();
            
            $product_has_off        = get_post_meta( get_the_id(), '_sale_price', true );
            $sale_price_dates_from  = get_post_meta( get_the_id(), '_sale_price_dates_from', true );
            $sale_price_dates_to    = get_post_meta( get_the_id(), '_sale_price_dates_to', true );

            // Get the discount
            if ( $product_has_off != '' ) {
                $titles[] .= get_the_title();
            }
        }
    }
    wp_reset_postdata();

    kc_add_map(
        array(
            'special_offers' => array(
                'name'          => esc_html__( 'Special Offers', 'deep' ),
                'description'   => esc_html__( 'Special Offers', 'deep' ),
                'icon'          => 'webnus-special-offers',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Select Product', 'deep' ),
                            'type'          => 'select',
                            'options'       => $titles,
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
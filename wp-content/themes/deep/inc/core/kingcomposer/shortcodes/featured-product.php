<?php
$order_by_values = array(
    'date'          => esc_html__( 'Date', 'deep' ),
    'ID'            => esc_html__( 'ID', 'deep' ),
    'author'        => esc_html__( 'Author', 'deep' ),
    'title'         => esc_html__( 'Title', 'deep' ),
    'modified'      => esc_html__( 'Modified', 'deep' ),
    'rand'          => esc_html__( 'Random', 'deep' ),
    'comment_count' => esc_html__( 'Comment count', 'deep' ),
    'menu_order'    => esc_html__( 'Menu order', 'deep' ),
);
$order_way_values = array(
    'DESC' => esc_html__( 'Descending', 'deep' ),
    'ASC'  => esc_html__( 'Ascending', 'deep' ),
);
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'featured_products' => array(
                'name'          => esc_html__( 'Featured Products', 'deep' ),
                'icon'          => 'webnus-feature-product',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'per_page',
                            'label'         =>  esc_html__( 'Per page', 'deep' ),
                            'type'          => 'text',
                            'description'   => __( 'The "per_page" shortcode determines how many products to show on the page', 'deep' ),
                        ),
                        array(
                            'name'          => 'columns',
                            'label'         =>  esc_html__( 'Columns', 'deep' ),
                            'type'          => 'text',
                            'description'   => __( 'The columns attribute controls how many columns wide the products should be before wrapping.', 'deep' ),
                        ),
                        array(
                            'name'          => 'orderby',
                            'label'         => esc_html__( 'Order by', 'deep' ),
                            'type'          => 'select',
                            'options'       => $order_by_values,
                            'description'   => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'deep' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),

                        ),
                        array(
                            'name'          => 'orderby',
                            'label'         => esc_html__( 'Sort order', 'deep' ),
                            'type'          => 'select',
                            'options'       => $order_way_values,
                            'description'   => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'deep' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),

                        ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
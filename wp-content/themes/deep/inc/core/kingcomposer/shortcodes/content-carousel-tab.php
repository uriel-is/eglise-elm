<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'content_carousel_tab' => array(
                'name'         => esc_html__( 'Content Carousel Element', 'deep' ),
                'system_only'  => true, // Don't show as an element on list elements
                'title'        => 'Carousel Settings',
                'is_container' => true,
                'category'     => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'       => array(
                    
                )
            ),
        )
    ); // End add map
 } // End if
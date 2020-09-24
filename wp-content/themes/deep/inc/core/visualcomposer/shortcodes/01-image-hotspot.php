<?php
if ( is_plugin_active( 'devvn-image-hotspot/devvn-image-hotspot.php' ) ) {

    $args = array(
        'post_type'=> 'points_image',
        'order'    => 'ASC'
    );

    $titles = $wn_id = $the_hotspot_array = array();
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $titles[] = get_the_title();
            $wn_id[] = basename(get_permalink());
        }
        $the_hotspot_array  = array_combine( $titles , $wn_id );
    } else {
        $the_image_hotspot_array = array(
            'none' => 'none',
        );
    }
    wp_reset_postdata();
    
    vc_map(
        array(
        'name' 				=> esc_html__('Image Hotspot','deep'),
        'base' 				=> 'image_hotspot',
        'icon'    			=> 'webnus-hotspot',
        'category'			=> esc_html__( 'Webnus Shortcodes', 'deep' ),
        'params' => array(
                array(
                    'type'         => 'dropdown',
                    'heading'      => esc_html__('Select your Hotspot image', 'deep'),
                    'param_name'   => 'hotspot_post',
                    'value'        => $the_hotspot_array,
                ),
            ),
        )
    );
}

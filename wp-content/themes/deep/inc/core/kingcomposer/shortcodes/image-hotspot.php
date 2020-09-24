<?php
$the_image_hotspot_array = array();
if ( is_plugin_active( 'devvn-image-hotspot/devvn-image-hotspot.php' ) ) {
    $args = array(
        'post_type'=> 'points_image',
        'order'    => 'ASC'
    );              
    $titles = $wn_id = array();
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $titles[] = get_the_title();
            $wn_id[] = basename(get_permalink());
        }
        $the_image_hotspot_array  = array_combine($wn_id, $titles);
    } else {
        $the_image_hotspot_array = array(
            'none' => 'none',
        );
    }
    wp_reset_postdata();
}
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'image_hotspot' => array(
                'name'          => esc_html__('Image Hotspot','deep'),
                'icon'          => 'webnus-hotspot',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'hotspot_post',
                            'label'         => esc_html__( 'Select your Hotspot image', 'deep' ),
                            'type'          => 'select',
                            'options'       => $the_image_hotspot_array,
                        ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
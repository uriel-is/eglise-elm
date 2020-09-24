<?php
$the_grid_array = array();
if ( is_plugin_active( 'the-grid/the-grid.php' ) && class_exists( 'The_Grid_Base' ) ) {
    $args = array(
        'post_type'=> 'the_grid',
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
        $the_grid_array  = array_combine($wn_id, $titles);
    } else {
        $the_grid_array = esc_html__( 'No Grid Found', 'deep' );
    }
    wp_reset_postdata();
}
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'the_grid' => array(
                'name'          => esc_html__( 'The Grid', 'deep' ),
                'description'   => esc_html__( 'Select Grid', 'deep' ),
                'icon'          => 'webnus-grid',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'name',
                            'label'         => esc_html__( 'Select Grid', 'deep' ),
                            'type'          => 'select',
                            'options'       => $the_grid_array,
                        ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
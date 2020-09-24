<?php
if ( ! defined( 'SERMONS_DIR' ) ) {
	return;
}
add_action( 'init', 'deep_sermon_category_map' );
function deep_sermon_category_map() {
    // get sermon categoies
    $args = array(
        'type'         => 'sermon',
        'child_of'     => 0,
        'parent'       => '',
        'orderby'      => 'term_group',
        'hide_empty'   => false,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => '',
        'taxonomy'     => 'sermon_category',
        'pad_counts'   => false
    );
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $webnus_sermon_categories = '';
    if ( is_plugin_active( 'webnus-sermons/webnus-sermons.php' ) ) {
        $categories = get_categories( $args );
        // get category name
        $webnus_sermon_categories   = array();
        foreach( $categories as $category ) :
            $webnus_sermon_categories[] = $category->slug;
        endforeach;
    }
    vc_map( array(
        'name'          => esc_attr__( 'Sermon Category', 'deep' ),
        'base'          => 'sermon-category',
        'icon'          => 'webnus-sermons',
        'description'   => esc_attr__( 'Show Single sermon Category', 'deep' ),
        'category'      => esc_attr__( 'Webnus Shortcodes', 'deep' ),
        'params'        => array(
            array(
                'heading'       => esc_attr__( 'Select Category', 'deep' ),
                'description'   => esc_html__( 'Select specific category', 'deep' ),
                'param_name'    => 'category',
                'type'          => 'dropdown',
                'value'         => $webnus_sermon_categories,
                'save_always'   => true,
            ),
            array(
                'heading'       => esc_html__( 'Select Category Image', 'deep' ),
                'description'   => wp_kses( __( 'Select Image for your category.', 'deep'), array( 'br' => array() ) ),
                'param_name'    => 'image',
                'type'          => 'attach_image',
                'value'         => '',
            ),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Image Size', 'deep' ),
                'param_name'    => 'thumbnail',
                'value'         => '',
                'description'   => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'deep'),
            ),
            // Class & ID 
            array(
                'group'			=> 'Class & ID',
                'type'			=> 'textfield',
                'heading'		=> esc_html__( 'Extra Class', 'deep' ),
                'param_name'	=> 'shortcodeclass',
                'value'			=> '',
                'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop',
            ),
            array(
                'group'			=> 'Class & ID',
                'type'			=> 'textfield',
                'heading'		=> esc_html__( 'ID', 'deep' ),
                'param_name'	=> 'shortcodeid',
                'value'			=> '',
                'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop',
            ),
        ),
    ) ); // end vc_map
} // end deep_sermon_category_map fun

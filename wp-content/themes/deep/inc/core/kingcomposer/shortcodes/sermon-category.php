<?php
if (function_exists('kc_add_map')) { 
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
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
    $webnus_sermon_categories = '';
    if ( is_plugin_active( 'webnus-sermons/webnus-sermons.php' ) ) {
        $categories = get_categories( $args );
        // get category name
        $webnus_sermon_categories   = array();
        $webnus_sermon_categories_name   = array();
        foreach( $categories as $category ) :
            $webnus_sermon_categories[] = $category->slug;
            $webnus_sermon_categories_name[] = $category->name;
        endforeach;
        $category_array  = array_combine($webnus_sermon_categories, $webnus_sermon_categories_name);
    }
    kc_add_map(
        array(
            'sermon-category' => array(
                'name'          => esc_html__( 'Sermon Category', 'deep' ),
                'description'   => esc_html__( 'Show Latest Or Popular Sermons', 'deep' ),
                'icon'          => 'webnus-sermons',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'category',
                            'label'         => esc_html__( 'Select Category', 'deep' ),
                            'type'          => 'select',
                            'options'       => $category_array,
                            'description'   => esc_html__( 'Select specific category', 'deep' ),
                        ),
                        array(
                            'name'          => 'image',
                            'label'         => esc_html__( 'Select Category Image', 'deep' ),
                            'type'          => 'attach_image',
                        ),
                        array(
                            'name'          => 'thumbnail',
                            'label'         => esc_html__( 'Image Size', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'deep'),
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
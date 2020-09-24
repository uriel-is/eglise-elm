<?php
$categories = array();
$categories = get_categories();
$category_slug_array = array('');
$category_name_array = array('');
foreach( $categories as $category ) {
    $category_slug_array[] = $category->slug;
    $category_name_array[] = $category->slug;
}
$category_array  = array_combine($category_slug_array, $category_name_array);

if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'postslider' => array(
                'name'          => esc_html__( 'Post Slider', 'deep' ),
                'description'   => esc_html__( 'Wordpress Post Slider', 'deep' ),
                'icon'          => 'webnus-postslider',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'  => 'Type 1',
                                '2'  => 'Type 2',
                                '3'  => 'Type 3',
                            ),
                        ),
                        array(
                            'name'          => 'how_number_slide',
                            'label'         => esc_html__( 'Number of Show Slide', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Number of Show Slide (Please set number ) Default #2', 'deep'),
                        ),
                        array(
                            'name'          => 'alias',
                            'label'         => esc_html__( 'Select Slider', 'deep' ),
                            'type'          => 'select',
                            'options'       => $category_array,
                        ),
                        array(
                            'name'          => 'hide_cat',
                            'label'         => esc_html__( 'Hide Category', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
                        ),
                        array(
                            'name'          => 'hide_date',
                            'label'         => esc_html__( 'Hide Category', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
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
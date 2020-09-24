<?php
if (function_exists('kc_add_map')) {
    kc_add_map(
        array(
            'category-tab' => array(
                'name'          => esc_html__( 'Category Tab', 'deep' ),
                'description'   => esc_html__( 'category tab', 'deep' ),
                'icon'          => 'webnus-category-tab',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'label'         => esc_html__( 'Select desired categories', 'deep' ),
                            'type'          => 'category_param',
                            'name'          => 'param_category',
                            'value'         => ''
                        ),
                        array(
                            'name'          => 'sort_order',
                            'label'         => esc_html__( 'Sort order', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'date'          => 'Date',
                                'title'         => 'Title',
                                'comment_count' => 'Popular Post',
                                'latest'        => 'Recent Posts',
                                'rand'          => 'Random Post',
                                'modified'      => 'Last Modified Post',
                            ),
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

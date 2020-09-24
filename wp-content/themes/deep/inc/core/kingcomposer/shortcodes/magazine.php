<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'magazine' => array(
                'name'          => esc_html__( 'Magazine', 'deep' ),
                'description'   => esc_html__( 'magazine', 'deep' ),
                'icon'          => 'webnus-magazine',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'type'          => 'category_param',
                            'label'         => esc_html__( 'Select desired categories', 'deep' ),
                            'name'          => 'param_category',
                            'value'         => ''
                        ),
                        array(
                            'name'          => 'post_title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'post_url',
                            'label'         => esc_html__( 'Title URL', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'post_title_border_color',
                            'label'         => esc_html__( 'Title border color', 'deep' ),
                            'type'          => 'color_picker',
                        ),
                        array(
                            'name'          => 'post_title_color',
                            'label'         => esc_html__( 'Title color', 'deep' ),
                            'type'          => 'color_picker',
                        ),
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'    => '1',
                                '2'    => '2',
                                '3'    => '3',
                                ),
                            'value'         => '1',
                            'description'   => esc_html__( 'Select shortcode type', 'deep'),
                        ),
                        array(
                            'name'          => 'sort_order',
                            'label'         => esc_html__( 'Sort order', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'date'          => 'Date',
                                'title'         => 'Title Post',
                                'comment_count' => 'Popular Post',
                                'latest'        => 'Recent Posts',
                                'rand'          => 'Random Post',
                                'modified'      => 'Last Modified Post',
                                ),
                            'value'         => 'date',
                        ),
                        array(
                            'name'          => 'post_number',
                            'label'         => esc_html__( 'Number of show post', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'post_prepage',
                            'label'         => esc_html__( 'Post pre page', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'pagination',
                            'label'         => esc_html__( 'Pagination', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'enable'   => 'Yes',
                                ),
                            'value' => 'false',
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
                            'label'         => esc_html__( 'Hide Date', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
                        ),
                        array(
                            'name'          => 'hide_author',
                            'label'         => esc_html__( 'Hide Author', 'deep' ),
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
<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'sermons' => array(
                'name'          => esc_html__( 'Webnus Sermons', 'deep' ),
                'description'   => esc_html__( 'Show Latest Or Popular Sermons', 'deep' ),
                'icon'          => 'webnus-sermons',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'toggle'   => 'Toggle',
                                'toggle2'  => 'Toggle 2',
                                'minimal'  => 'Minimal',
                                'grid'     => 'Grid',
                                'clean'    => 'Clean',
                                'simple'   => 'Simple',
                            ),
                            'description'   => esc_html__( "You can choose from these pre-designed types.", 'deep')
                        ),
                        array(
                            'name'          => 'featured',
                            'label'         => esc_html__( 'Display featured image?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                            ),
                            'value'         => 'false',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'grid' ),
                            ),
                        ),
                        array(
                            'name'          => 'carousel',
                            'label'         => esc_html__( 'Would you like change it to carousel style?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                            ),
                            'value'         => 'false',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'grid' ),
                            ),
                        ),
                        array(
                            'name'          => 'sermon_carousel_item',
                            'label'         => esc_html__( 'Count in row', 'deep' ),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'carousel',
                                'show_when'  => 'true',
                            ),
                        ),
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                ''        => 'Most Recent',
                                'view'    => 'Most Popular',
                            ),
                            'description'   => esc_html__( "Recent Or Popular?", 'deep'),
                        ),
                        array(
                            'name'          => 'count',
                            'label'         => esc_html__( 'Post Count', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Type nothing to default (6) and type 0 to show all.', 'deep'),
                        ),
                        array(
                            'name'          => 'page',
                            'label'         => esc_html__('Page Navigation', 'deep'),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'enable'   => 'Enable',
                            ),
                            'value'         => 'false',
                            'description'   => wp_kses( __('Enable page navigation.<br/><br/>', 'deep'), array( 'br' => array() ) ),
                        ),
                        array(
                            'name'          => 'icon',
                            'label'         => esc_html__( "Icon", 'deep' ),
                            'type'          => 'icon_picker',
                            'value'         => 'none',
                            'description'   => esc_html__( "Show an icon on the left side of the sermon title.", 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => 'minimal',
                            ),
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
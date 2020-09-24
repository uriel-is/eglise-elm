<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'recipes' => array(
                'name'          => esc_html__( 'Food Recipes', 'deep' ),
                'description'   => esc_html__( 'Food Recipes', 'deep' ),
                'icon'          => 'webnus-recipes',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'one'  => 'One',
                                ),
                            'description'   => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                        ),
                        array(
                            'name'          => 'column',
                            'label'         => esc_html__( 'Column', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '3'   => esc_html__( '4 column', 'deep' ),
                                '4'   => esc_html__( '3 column', 'deep' ),
                                '6'   => esc_html__( '2 column', 'deep' ),
                                '12'  => esc_html__( '1 column', 'deep' ),
                                ),
                            'description'   => esc_html__( 'Set a column', 'deep'),
                        ),
                        array(
                            'name'          => 'post_count',
                            'label'         => esc_html__( 'Post count', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Number of grid item(s) to show. Note: When you type nothing it puts for default 6 grid items to show.', 'deep'),
                        ),
                        array(
                            'name'          => 'pagination',
                            'label'         => esc_html__( 'Page Navigation', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value' => 'false',
                            'description' => wp_kses( esc_html__('Enable page navigation.<br><br>', 'deep'), array( 'br' => array() ) ),
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
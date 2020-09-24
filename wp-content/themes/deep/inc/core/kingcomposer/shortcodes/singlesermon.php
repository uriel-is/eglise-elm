<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'asermon' => array(
                'name'          => esc_html__( 'Single Sermon', 'deep' ),
                'description'   => esc_html__( 'Show a sermon', 'deep' ),
                'icon'          => 'webnus-sermons',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'latest'   => 'Latest Sermon',
                                'custom'   => 'Custom Sermon',
                            ),
                            'description'   => esc_html__( "You can choose from these pre-designed types.", 'deep')
                        ),
                        array(
                            'name'          => 'style',
                            'label'         => esc_html__( 'Style', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                ''        => 'Standard',
                                'boxed'   => 'Boxed',
                            ),
                            'description'   => esc_html__( "You can choose from these pre-designed types.", 'deep')
                        ),
                        array(
                            'name'          => 'box_title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Choose a title for your sermon box style.', 'deep'),
                            'relation'      => array(
                                'parent'     => 'style',
                                'show_when'  => array( 'boxed' ),
                            ),
                        ),
                        array(
                            'name'          => 'post',
                            'label'         => esc_html__( 'Sermon ID', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Pick up the ID & follow this instruction: Sermons > Sermon Categories > ID column. Note: When you type nothing it puts latest sermon as default to show.', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'custom' ),
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
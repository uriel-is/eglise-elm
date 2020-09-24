<?php
if ( ! defined( 'CAUSES_DIR' ) ) {
	return;
}
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'causes' => array(
                'name'          => esc_html__( 'Webnus Causes', 'deep' ),
                'description'   => esc_html__( 'Show Latest Or Popular Causes', 'deep' ),
                'icon'          => 'webnus-causes',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'grid'   => 'Grid',
                                'grid2'  => 'Grid 2',
                                'list'   => 'List',
                                'list2'  => 'List 2',
                            ),
                            'description'   => esc_html__( "You can choose from these pre-designed types.", 'deep')
                        ),
                        array(
                            'name'          => 'sort',
                            'label'         => esc_html__( 'Order by', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                ''      => 'Most Recent',
                                'view'  => 'Most Popular',
                            ),
                        ),
                        array(
                            'name'          => 'count',
                            'label'         => esc_html__( 'Post Count', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Type nothing to default (6) and type 0 to show all.', 'deep'),
                        ),                 
                        array(
                            'name'          => 'featured',
                            'label'         => esc_html__( 'Page Navigation', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'enable'   => 'Enable',
                            ),
                            'value'         => 'false',
                            'description' 	=> wp_kses( __('Enable page navigation.<br/><br/>', 'deep'), array( 'br' => array() ) ),

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
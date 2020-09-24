<?php
if ( ! defined( 'CAUSES_DIR' ) ) {
	return;
}
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'acause' => array(
                'name'          => esc_html__( 'Single Cause', 'deep' ),
                'description'   => esc_html__( 'Show a cause', 'deep' ),
                'icon'          => 'webnus-causes',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'post',
                            'label'         => esc_html__( 'Cause ID', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Pick up the ID & follow this instruction: admin panel > causes > ID column. Note: When you type nothing it puts latest cause as default to show.', 'deep'),
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
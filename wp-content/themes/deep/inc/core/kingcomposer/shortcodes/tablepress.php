<?php
if ( ! is_plugin_active( 'tablepress/tablepress.php' ) ) {
	return;
}
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'wntablepress' => array(
                'name'          => esc_html__( 'Webnus Tablepress', 'deep' ),
                'icon'          => 'webnus-alert',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'table_id',
                            'label'         => esc_html__('Enter Table ID', 'deep'),
                            'type'          => 'text',
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
<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'speakers' => array(
                'name'          => esc_html__( 'Sermons Speakers', 'deep' ),
                'description'   => esc_html__( 'Show Sermons Speakers', 'deep' ),
                'icon'          => 'webnus-sermons',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'hide',
                            'label'         => esc_html__('Hide Speakers with no sermons', 'deep') ,
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
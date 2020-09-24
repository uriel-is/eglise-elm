<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'alert' => array(
                'name'          => esc_html__( 'Alert', 'deep' ),
                'description'   => esc_html__( 'Alert box', 'deep' ),
                'icon'          => 'webnus-alert',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'info'     => 'Info',
                                'success'  => 'Success',
                                'warning'  => 'Warning',
                                'danger'   => 'Danger',
                            ),
                            'description'   => esc_html__( 'Alert Type', 'deep'),
                        ),
                        array(
                            'name'          => 'close',
                            'label'         => esc_html__( 'Has Close?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes please',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Has Close Button?', 'deep'),
                        ),
                        array(
                            'name'          => 'aler_content',
                            'label'         => esc_html__('Alert Content', 'deep'),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Contet Goes Here', 'deep'),
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
<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'twitterfeed' => array(
                'name'          => esc_html__( 'Twitter Feed', 'deep' ),
                'description'   => esc_html__( 'Twitter Feed', 'deep' ),
                'icon'          => 'webnus-twitterfeed',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'username',
                            'label'         => esc_html__( 'Twitter Username', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Twitter ID', 'deep')
                        ),
                        array(
                            'name'          => 'count',
                            'label'         => esc_html__( 'Feed Count', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Twitter feed count', 'deep'),
                        ),
                        array(
                            'name'          => 'access_token',
                            'label'         => esc_html__( 'Access Token', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Twitter access token', 'deep'),
                        ),
                        array(
                            'name'          => 'access_token_secret',
                            'label'         => esc_html__( 'Access Token Secret', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Twitter access token secret', 'deep'),
                        ),
                        array(
                            'name'          => 'consumer_key',
                            'label'         => esc_html__( 'Consumer Key', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Twitter consumer key', 'deep'),
                        ),
                        array(
                            'name'          => 'consumer_secret',
                            'label'         => esc_html__( 'Consumer Secret', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Twitter consumer secret', 'deep'),
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
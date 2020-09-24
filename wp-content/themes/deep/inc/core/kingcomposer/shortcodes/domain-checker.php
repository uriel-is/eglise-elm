<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'wpdomainchecker' => array(
                'name'          => esc_html__( 'Domain Checker', 'deep' ),
                'description'   => esc_html__( 'Domain Checker', 'deep' ),
                'icon'          => 'webnus-wpdomainchecker',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                        array(
                            'name'          => 'button',
                            'label'         => esc_html__( 'Button Label', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Button Label', 'deep'),
                        ),
                        array(
                            'name'          => 'recaptcha',
                            'label'         => esc_html__( 'reCaptcha', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Enable',
                                ),
                            'value'         => 'false',
                        ),
                        array(
                            'name'          => 'advanced',
                            'label'         => esc_html__( 'Advanced Options', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'enable'   => 'Enable',
                                ),
                            'value'         => 'false',
                        ),
                        array(
                            'name'          => 'width',
                            'label'         => esc_html__( 'Width', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'To make it responsive just leave it', 'deep'),
                            'relation'      => array(
                                'parent'     => 'advanced',
                                'show_when'  => 'enable',
                            ),
                        ),
                        array(
                            'name'          => 'item_id',
                            'label'         => esc_html__( 'Product ID', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'For multiple checker for multiple product WooCommerce', 'deep'),
                            'relation'      => array(
                                'parent'     => 'advanced',
                                'show_when'  => 'enable',
                            ),
                        ),
                        array(
                            'name'          => 'tld',
                            'label'         => esc_html__( 'TLDs', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Multiple TLDs check if user not define tld on the domain. (e.g: com,net,org,info)', 'deep'),
                            'relation'      => array(
                                'parent'     => 'advanced',
                                'show_when'  => 'enable',
                            ),
                        ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
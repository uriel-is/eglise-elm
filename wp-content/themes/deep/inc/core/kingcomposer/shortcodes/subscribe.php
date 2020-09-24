<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'subscribe' => array(
                'name'          => esc_html__( 'Subscribe', 'deep' ),
                'description'   => esc_html__( 'Subscribe box', 'deep' ),
                'icon'          => 'webnus-subscribe',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'boxed'      => 'Boxed',
                                'bar1'       => 'Bar',
                                'flat'       => 'Flat',
                                'wish'       => 'wish',
                                'modern'     => 'modern',
                                'bordered'   => 'bordered',
                                "rounded"  	 => "Rounded",
                                "full"		 => "Full",
                            ),
                            'description'   => esc_html__( 'Select the List Items type', 'deep'),
                        ),
                        array(
                            'name'          => 'box_title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Subscribe title', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'boxed', 'bar1', 'flat' , 'bordered' ),
                            ),
                        ),
                        array(
                            'name'          => 'input_text',
                            'label'         => esc_html__( 'Input text', 'deep' ),
                            'type'          => 'text',
                            'value'         => 'YOUR E-MAIL',
                            'description'   => esc_html__( 'Input box text', 'deep'),
                        ),
                        array(
                            'name'          => 'box_text',
                            'label'         => esc_html__('Subscribe Text', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( "Subscribe content", 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'boxed', 'bar1', 'flat' , 'bordered' ),
                            ),
                        ),
                        array(
                            'name'          => 'service',
                            'label'         => esc_html__( 'Email Service', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'FeedBurner'  => 'FeedBurner',
                                'MailChimp'   => 'MailChimp',
                            ),
                            'description'   => esc_html__( 'FeedBurner or MailChimp', 'deep'),
                        ),
                        array(
                            'name'          => 'feedburner_id',
                            'label'         => esc_html__( 'FeedBurner ID', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Feedburner ID', 'deep'),
                            'relation'      => array(
                                'parent'     => 'service',
                                'show_when'  => 'FeedBurner',
                            ),
                        ),
                        array(
                            'name'          => 'mailchimp_url',
                            'label'         => esc_html__( 'MailChimp URL', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Mailchimp form action URL', 'deep'),
                            'relation'      => array(
                                'parent'     => 'service',
                                'show_when'  => 'MailChimp',
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
<?php
vc_map( array(
	'name'			=> esc_html__( 'Widget subscribe', 'deep' ),
	'base'			=> 'widget-subscribe',
	'category'		=> esc_html__( 'Webnus widgets', 'deep' ),
	'icon'			=> 'webnus-widgets',
	'params'		=> array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Display Type:', 'deep' ),
			'param_name'	=> 'display',
			'value'			=> array(
				'one'	=> 'one',
				'two'		=> 'two',
			),
		),
		array(
			'type'				=> 'dropdown',
			'heading'			=> esc_html__( 'Subscribe Service:', 'deep' ),
			'param_name'	=> 'subscribe_service',
			'value'				=> array(
				'FeedBurner'=> 'feedburner',
				'MailChimp'	=> 'mailchimp',
			),
			'std'					=> 'feedburner',
		),
		array(
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Feedburner ID:', 'deep' ),
			'param_name'	=> 'feedburner_txt',
			'dependency'	=> array(
				'element'		=> 'subscribe_service',
				'value'			=> 'feedburner',
			),
		),
		array(
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Mailchimp form action URL:', 'deep' ),
			'param_name'	=> 'mailchimp_txt',
			'dependency'	=> array(
				'element'		=> 'subscribe_service',
				'value'			=> 'mailchimp',
			),
		),
		array(
			'type'				=> 'textarea',
			'heading'			=> esc_html__( 'Custom text:', 'deep' ),
			'param_name'	=> 'custom_text',
		),
	),
));

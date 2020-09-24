<?php
if ( ! is_plugin_active('wp-domain-checker/wdc.php') ) {
	return;
}
vc_map( array(
	"name"			=>"Domain Checker",
	"base"			=> "wpdomainchecker",
	"description"	=> "Domain Checker",
	"category"		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	"icon"			=> "webnus-wpdomainchecker",
	"params"		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( "Button Label", 'deep' ),
			'param_name'	=> "button",
			'value'			=> '',
			'description'	=> esc_html__( "Button Label", 'deep')
		),
		array(
			'heading'		=> esc_html__( 'reCaptcha', 'deep') ,
			"description"	=> esc_html__( 'Protect your domain checker from spam and abuse.', 'deep'),
			'param_name'	=> 'recaptcha',
			'value'			=> array( esc_html__( 'Enable', 'deep' ) => 'yes'),
			'type'			=> 'checkbox',
			'std'			=> '',
		),	
		array(
			'heading'		=> esc_html__('Advanced Options', 'deep') ,
			"description"	=> esc_html__( "Show Advanced Options", 'deep'),
			'param_name'	=> 'advanced',
			'value'			=> array( esc_html__( 'Enable', 'deep' ) => 'enable'),
			'type'			=> 'checkbox',
			'std'			=> '',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Width', 'deep' ),
			'param_name'	=> 'width',
			'value'			=> '',
			'description'	=> esc_html__( 'To make it responsive just leave it.', 'deep' ),
			'dependency'	=> array(
				'element'	=> 'advanced',
				'value'		=> array( 'enable' )
			),
		),					
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Product ID', 'deep' ),
			'param_name'	=> 'item_id',
			'value'			=> '',
			'description'	=> esc_html__( 'For multiple checker for multiple product WooCommerce.', 'deep'),
			'dependency'	=> array(
				'element'	=> 'advanced',
				'value'		=> array( 'enable' )
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'TLDs', 'deep' ),
			'param_name'	=> 'tld',
			'value'			=> '',
			'description'	=> esc_html__( 'Multiple TLDs check if user not define tld on the domain. (e.g: com,net,org,info)', 'deep'),
			'dependency'	=> array(
				'element'	=> 'advanced',
				'value'		=> array( 'enable' )
			),
		),			
	),
) );
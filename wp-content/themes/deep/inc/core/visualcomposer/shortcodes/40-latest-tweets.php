<?php
vc_map( array(
	'name'			=> esc_html__( 'Twitter Feed', 'deep' ),
	'base'			=> 'twitterfeed',
	'description'	=> 'Twitter feed',
	'icon'			=> 'webnus-twitterfeed',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),

	'params'		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Twitter Username', 'deep' ),
			'param_name'	=> 'username',
			'value'			=>'',
			'description'	=> esc_html__( 'TTwitter ID', 'deep')
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Feed Count', 'deep' ),
			'param_name'	=> 'count',
			'value'			=>'',
			'description'	=> esc_html__( 'Twitter feed count', 'deep')
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Access Token', 'deep' ),
			'param_name'	=> 'access_token',
			'value'=>'',
			'description'	=> esc_html__( 'Twitter access token', 'deep')
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Access Token Secret', 'deep' ),
			'param_name'	=> 'access_token_secret',
			'value'			=>'',
			'description'	=> esc_html__( 'Twitter access token secret', 'deep')
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Consumer Key', 'deep' ),
			'param_name'	=> 'consumer_key',
			'value'			=>'',
			'description'	=> esc_html__( 'Twitter consumer key', 'deep')
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Consumer Secret', 'deep' ),
			'param_name'	=> 'consumer_secret',
			'value'			=>'',
			'description'	=> esc_html__( 'Twitter consumer secret', 'deep')
		),
		array(
			'group'			=> 'Class & ID',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Extra Class', 'deep' ),
			'param_name'	=> 'shortcodeclass',
			'value'			=> '',
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop',
		),
		array(
			'group'			=> 'Class & ID',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'ID', 'deep' ),
			'param_name'	=> 'shortcodeid',
			'value'			=> '',
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop',
		),
	),	
) );

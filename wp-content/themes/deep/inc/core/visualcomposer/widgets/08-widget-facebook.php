<?php
vc_map( array(
	'name'			=> esc_html__( 'Widget facebook', 'deep' ),
	'base'			=> 'widget-facebook',
	'category'		=> esc_html__( 'Webnus widgets', 'deep' ),
	'icon'			=> 'webnus-widgets',
	'params'		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Page Address:', 'deep' ),
			'param_name'	=> 'facebook_url',
		),
	),
));

<?php
vc_map( array(
	'name'			=> esc_html__( 'Widget login widget', 'deep' ),
	'base'			=> 'widget-login-widget',
	'category'		=> esc_html__( 'Webnus widgets', 'deep' ),
	'icon'			=> 'webnus-widgets',
	'params'		=> array(
		array(
			'type'				=> 'disable',
			'description'		=> 'Just select this widget',
			'param_name'		=> 'login_txt',
		),
	),
));

<?php
vc_map( array(
	'name'			=> esc_html__( 'Widget Social Icons', 'deep' ),
	'base'			=> 'widget-SocialWidget',
	'category'		=> esc_html__( 'Webnus widgets', 'deep' ),
	'icon'			=> 'webnus-widgets',
	'params'		=> array(
		array(
			'type'				=> 'disable',
			'description'		=> 'Just select this widget, the settings thereon: <code> Deep > Theme Options > Social Networks > Social </code>',
			'param_name'		=> 'social-widgets',
		),
	),
));

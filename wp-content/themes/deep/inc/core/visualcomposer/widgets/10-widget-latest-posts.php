<?php
vc_map( array(
	'name'			=> esc_html__( 'Widget Latest Posts', 'deep' ),
	'base'			=> 'widget-LatestPosts',
	'category'		=> esc_html__( 'Webnus widgets', 'deep' ),
	'icon'			=> 'webnus-widgets',
	'params'		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Number of Posts:', 'deep' ),
			'param_name'	=> 'post_number',
		),
	),
));

<?php
vc_map( array(
	'name'			=> esc_html__( 'Widget popular posts', 'deep' ),
	'base'			=> 'widget-popular-posts',
	'category'		=> esc_html__( 'Webnus widgets', 'deep' ),
	'icon'			=> 'webnus-widgets',
	'params'		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Title', 'deep' ),
			'param_name'	=> 'widget_title',
			'value'			=> '',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Number of Posts', 'deep' ),
			'param_name'	=> 'post_count',
			'value'			=> '',
		),
	),
) );

<?php
vc_map( array(
	'name'			=> esc_html__( 'Widget flickr', 'deep' ),
	'base'			=> 'widget-flickr',
	'category'		=> esc_html__( 'Webnus widgets', 'deep' ),
	'icon'			=> 'webnus-widgets',
	'params'		=> array(
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__( 'Flickr Script:', 'deep' ),
			'param_name'	=> 'flickr_script',
		),
	),
) );

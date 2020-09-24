<?php
vc_map( array(
	'name'			=> esc_html__( 'Widget Youtube', 'deep' ),
	'base'			=> 'widget-youtube',
	'category'		=> esc_html__( 'Webnus widgets', 'deep' ),
	'icon'			=> 'webnus-widgets',
	'params'		=> array(
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Channel ID:', 'deep' ),
			'description'	=> esc_html__( 'Channel ID is in the channel url usually it will start with UC example: https://www.youtube.com/channel/UCmQ-VeVK7nLR3bGpAkSYB1Q', 'deep' ),
			'param_name'	=> 'youtube_txt',
			'value'			=> 'UCmQ-VeVK7nLR3bGpAkSYB1Q'
		),
	),
) );

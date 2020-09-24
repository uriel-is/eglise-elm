<?php
vc_map( array(
	'name'			=> esc_html__( 'Widget tab', 'deep' ),
	'base'			=> 'widget-tab',
	'category'		=> esc_html__( 'Webnus widgets', 'deep' ),
	'icon'			=> 'webnus-widgets',
	'params'		=> array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Popular Posts Order By:', 'deep' ),
			'param_name'	=> 'sort_by',
			'value'			=> array(
				'Comments'	=> 'comments',
				'Views'		=> 'views',
			),
			'std'			=> 'comments',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Number of popular posts:', 'deep' ),
			'param_name'	=> 'counter_popular_post',
			'value'			=> '5',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Number of recent posts:', 'deep' ),
			'param_name'	=> 'counter_recent_post',
			'value'			=> '5',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Number of comments:', 'deep' ),
			'param_name'	=> 'counter_comments_post',
			'value'			=> '5',
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Show popular posts', 'deep' ),
			'param_name'	=> 'show_popular',
			'value'			=> array( esc_html__( 'On', 'deep' ) => 'on' ),
			'std'			=> 'on',
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Show recent posts', 'deep' ),
			'param_name'	=> 'show_recent',
			'value'			=> array( esc_html__( 'On', 'deep' ) => 'on' ),
			'std'			=> 'on',
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Show comments', 'deep' ),
			'param_name'	=> 'show_comments',
			'value'			=> array( esc_html__( 'On', 'deep' ) => 'on' ),
			'std'			=> 'on',
		),
	),
) );
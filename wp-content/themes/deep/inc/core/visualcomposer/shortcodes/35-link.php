<?php

vc_map( array(
	'name'			=>'Link',
	'base'			=> 'link',
	'description'	=> 'Learn more link',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'icon'			=> 'webnus-link',
	'params'		=> array(
		array(
				'type'         => 'textfield',
				'heading'      => esc_html__( 'Link URL', 'deep' ),
				'param_name'   => 'url',
				'value'        => '#',
				'description'  => esc_html__( 'Link URL, Example: http://domain.com', 'deep')
		),
		array(
				'type'         => 'textfield',
				'heading'      => esc_html__( 'Link Text', 'deep' ),
				'param_name'   => 'content_text',
				'value'        => 'Readmore',
				'admin_label'  => true,
				'description'  => esc_html__( 'Link Text (Content)', 'deep')
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
));
?>
<?php 
vc_map( array(
	'name'			=> esc_html__( 'Process Carousel' , 'deep' ),
	'base'			=> 'process_carousel',
	'description'	=> esc_html__( 'Process Carousel' , 'deep'),
	'icon'			=> 'webnus-process-carousel',
	'category'		=> esc_html__( 'Webnus Shortcodes' , 'deep'),
	'params'		=> array(
		array(
			'type'			=> 'param_group',
			'heading'		=> esc_html__( 'Process Carousel Item' , 'deep'),
			'param_name'	=> 'process_item',
			'params'		=> array(
				array(
					'type' 			=> 'textfield',
					'heading'		=> esc_html__( 'Process Title' , 'deep' ),
					'param_name'	=> 'pc_title',
					'value'			=> '',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__( 'Process Content' , 'deep' ),
					'param_name'	=> 'pc_content',
					'value'			=>	'',
				),
			),
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
	)
));
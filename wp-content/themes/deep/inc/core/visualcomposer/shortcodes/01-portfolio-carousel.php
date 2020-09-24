<?php
if ( ! is_plugin_active('webnus-portfolio/webnus-portfolio.php') ) {
	return;
}
vc_map(array(
	'name'		  => esc_html__( 'Portfolio Carousel', 'deep' ),
	'base'		  => 'portfolio-carousel',
	'description' => esc_html__( 'Portfolio Carousel Element', 'deep' ),
	'icon'		  => 'webnus-portfolio-carousel',
	'category'	  => esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'	  => array(
		array(
			'heading'		=> esc_html__( 'Type', 'deep' ),
			'description'	=> esc_html__( 'You can choose from these pre-designed types.', 'deep'),
			'type'			=> 'dropdown',
			'param_name'	=> 'type',
			'value'			=> array(
				esc_html__( 'Type 1', 'deep' ) => '1',
				esc_html__( 'Type 2', 'deep' ) => '2',
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Title', 'deep' ),
			'param_name'	=> 'title',
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> array(
					'2',
				),
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Carousel Count', 'deep' ),
			'param_name'	=> 'carousel_count',
			'value'			=> '10',
			'description'	=> esc_html__( 'Default: 10', 'deep'),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Show Post Title' , 'deep' ),
			'param_name'	=> 'enable_title',
			'value'			=> array( esc_html__( 'Enable' , 'deep' ) => 'enable'),
			'description'	=> esc_html__( 'Enable and disable title' , 'deep'),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> array(
					'1',
				),
			),
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Show Post Content' , 'deep' ),
			'param_name'	=> 'enable_content',
			'value'			=> array( esc_html__( 'Enable' , 'deep' ) => 'enable'),
			'description'	=> esc_html__( 'Enable and disable content' , 'deep'),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> array(
					'1',
				),
			),
		),
		// Class & ID
		array(
			'group'				=> 'Class & ID',
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Extra Class', 'deep' ),
			'param_name'		=> 'shortcodeclass',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop',
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> array(
					'1',
				),
			),
		),
		array(
			'group'				=> 'Class & ID',
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'ID', 'deep' ),
			'param_name'		=> 'shortcodeid',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop',
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> array(
					'1',
				),
			),
		),
	)
));

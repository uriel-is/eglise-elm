<?php
vc_map( array(
	'name'			=>'Distance',
	'base'			=> 'distance',
	'description'	=> 'Blank Space',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'icon'			=> 'webnus-distance',
	'params'		=> array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Desktop Blank Space', 'deep' ),
			'param_name'	=> 'desktop_type',
			'value' 		=> array(
				'10px'		=> '10',
				'20px'		=> '20',
				'30px'		=> '30',
				'40px'		=> '40',
				'50px'		=> '50',
				'60px'		=> '60',
				'70px'		=> '70',
				'80px'		=> '80',
				'90px'		=> '90',
				'100px'		=> '100',
			),
			'admin_label' => true,				
			'description' => esc_html__( 'How much empty desktop space would you like to add?', 'deep' ),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Phone Blank Space', 'deep' ),
			'param_name'	=> 'phone_type',
			'value'			=> array(
				'inherit' 	=> 'inherit',
				'0px' 		=> '0',
				'10px'  	=> '10',
				'20px'  	=> '20',
				'30px'  	=> '30',
				'40px'  	=> '40',
				'50px'  	=> '50',
				'80px'  	=> '80',
				'100px' 	=> '100',
			),
			'admin_label' => true,
			'description' => esc_html__( 'How much empty phone space would you like to add?', 'deep' ),
		),
	)
    
) );
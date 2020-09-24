<?php
vc_map( array(
    'name' 			=>'Testimonial',
    'base' 			=> 'testimonial',
	'description' 	=> 'Testimonial',
	'category' 		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
    'icon' 			=> 'webnus-testimonial',
    'params'		=>array(

		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Type', 'deep' ),
			'param_name' 	=> 'type',
			'value' 		=> array(
				'Type 1'=>'1',
				'Type 2'=>'2',
				'Type 3'=>'3',
				'Type 4'=>'4',
				'Type 5'=>'5',
			),
			'description' => esc_html__( 'You can choose from these pre-designed types.', 'deep')
		),

		array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__( 'Name', 'deep' ),
				'param_name' 	=> 'name',
				'value'			=>'Name',
				'description' 	=> esc_html__( 'Enter the Testimonial Name', 'deep')
		),

		array(
				'type' 			=> 'attach_image',
				'heading' 		=> esc_html__( 'Image', 'deep' ),
				'param_name' 	=> 'img',
				'value'			=> 'http://',
				'description' 	=> esc_html__( 'Testimonial Image', 'deep')
		),
		array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Image Size', 'deep' ),
				'param_name'	=> 'thumbnail',
				'value'			=>'',
				'description'	=> esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'deep')
		),
		array(
				'type' 			=> 'textarea',
				'heading' 		=> esc_html__( 'Content', 'deep' ),
				'param_name' 	=> 'testimonial_content',
				'value' 		=> 'Testimonial content text goes here',
				'description' 	=> esc_html__( 'Enter the Testimonial content text', 'deep')
		),

		array(
			'type' 				=> 'textfield',
			'heading' 			=> esc_html__('Job', 'deep') ,
			'description' 		=> wp_kses( __('Please enter job <br/><br/>', 'deep'), array( 'br' => array() ) ),
			'param_name' 		=> 'member_job',
			'std' 				=> '',
			'dependency' 		=> array('element'=>'type','value'=>array('3','5')),
		),
		array(
			'type' 				=> 'colorpicker',
			'heading' 			=> esc_html__( 'Background', 'deep' ),
			'param_name' 		=> 'testimonial_background',
			'value' 			=> '',
			'description' 		=> esc_html__( 'Select Background Color', 'deep')
		),
		array(
			'type' 				=> 'colorpicker',
			'heading' 			=> esc_html__( 'Color', 'deep' ),
			'param_name' 		=> 'testimonial_content_color',
			'value' 			=> '',
			'description' 		=> esc_html__( 'Select Content Color', 'deep'),
			'dependency' 		=> array('element'=>'type','value'=>array('3')),
		),
		array(
			'heading' 			=> esc_html__('Social Icons', 'deep') ,
			'description' 		=> wp_kses( __('By enabling this option, Member social networks links will appear.<br/><br/>', 'deep'), array( 'br' => array() ) ),
			'param_name' 		=> 'social',
			'value' 			=> array( esc_html__( 'Enable', 'deep' ) => 'enable'),
			'type' 				=> 'checkbox',
			'std' 				=> '',
			'dependency' 		=> array('element'=>'type','value'=>array('3')),
		),
		array(
			'type' 					=> 'dropdown',
			'heading' 				=> esc_html__( 'First Social Name', 'deep' ),
			'param_name' 			=> 'first_social',
			'value' 				=> array(
				'Twitter'		=>'twitter',
				'Facebook'		=>'facebook',
				'Vimeo'			=>'vimeo',
				'Dribbble'		=>'dribbble',
				'Youtube'		=>'youtube',
				'Pinterest'		=>'pinterest',
				'LinkedIn'		=>'linkedin',
				'Instagram'		=>'instagram',
			),
			'std' 					=> 'twitter',
			'description' 			=> esc_html__( 'Select Social Name', 'deep'),
			'dependency' 			=> array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'First Social URL', 'deep' ),
			'param_name' 	=> 'first_url',
			'value'			=>'',
			'description' 	=> esc_html__( 'First social URL', 'deep'),
			'dependency' 	=> array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' 					=> 'dropdown',
			'heading' 				=> esc_html__( 'Second Social Name', 'deep' ),
			'param_name' 			=> 'second_social',
			'value' 				=> array(
				'Twitter'		=>'twitter',
				'Facebook'		=>'facebook',
				'Vimeo'			=>'vimeo',
				'Dribbble'		=>'dribbble',
				'Youtube'		=>'youtube',
				'Pinterest'		=>'pinterest',
				'LinkedIn'		=>'linkedin',
				'Instagram'		=>'instagram',
			),
			'std' 					=> 'facebook',
			'description' 			=> esc_html__( 'Select Social Name', 'deep'),
			'dependency' 			=> array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'Second Social URL', 'deep' ),
			'param_name' 	=> 'second_url',
			'value'			=>'',
			'description' 	=> esc_html__( 'Second social URL', 'deep'),
			'dependency' 	=> array('element'=>'social','value'=>array('enable')),
		),


		array(
			'type' 					=> 'dropdown',
			'heading' 				=> esc_html__( 'Third Social Name', 'deep' ),
			'param_name' 			=> 'third_social',
			'value' 				=> array(
				'Twitter'		=>'twitter',
				'Facebook'		=>'facebook',
				'Vimeo'			=>'vimeo',
				'Dribbble'		=>'dribbble',
				'Youtube'		=>'youtube',
				'Pinterest'		=>'pinterest',
				'LinkedIn'		=>'linkedin',
				'Instagram'		=>'instagram',
			),
			'std' 					=> 'twitter',
			'description' 			=> esc_html__( 'Select Social Name', 'deep'),
			'dependency' 			=> array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'Third Social URL', 'deep' ),
			'param_name' 	=> 'third_url',
			'value'			=>'',
			'description' 	=> esc_html__( 'Third social URL', 'deep'),
			'dependency' 	=> array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' 					=> 'dropdown',
			'heading' 				=> esc_html__( 'Fourth Social Name', 'deep' ),
			'param_name' 			=> 'fourth_social',
			 'value' 				=> array(
				'Twitter'		=>'twitter',
				'Facebook'		=>'facebook',
				'Vimeo'			=>'vimeo',
				'Dribbble'		=>'dribbble',
				'Youtube'		=>'youtube',
				'Pinterest'		=>'pinterest',
				'LinkedIn'		=>'linkedin',
				'Instagram'		=>'instagram',
					),
			'std' 					=> 'linkedin',
			'description' 			=> esc_html__( 'Select Social Name', 'deep'),
			'dependency' 			=> array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'Fourth Social URL', 'deep' ),
			'param_name' 	=> 'fourth_url',
			'value'			=>'',
			'description' 	=> esc_html__( 'Fourth social URL', 'deep'),
			'dependency' 	=> array('element'=>'social','value'=>array('enable')),
		),

		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Open link in a new tab? ', 'deep' ),
            'description'   => __( 'Add Target = _blank', 'deep'),
            'param_name'    => 'link_target',
			'std'           => 'false',
			'dependency' 	=> array('element'=>'social','value'=>array('enable')),
        ),

		// Class & ID 
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
) );
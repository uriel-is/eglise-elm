<?php 
vc_map( array(
	'name'			=> esc_html__( 'Testimonial Carousel', 'deep' ),
	'base'			=> 'testimonial-carousel',
	'description'	=> esc_html__( 'Testimonial Carousel', 'deep' ),
	'icon'			=> 'webnus-testimonial-carousel',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Testimonial Type', 'deep' ),
			'param_name'	=> 'type',
			'value'			=>  array(
					'One'	=> '1',
					'Two'	=> '2',
					'Three'	=> '3',
					'Four'  => '4',
				),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Testimonial Items Per View', 'deep' ),
			'param_name'	=> 'items',
			'value'			=> '',
			'dependency'	=> array('element' => 'type','value' => array('1','2','3') ),
		),

		array(
			'heading'		=> esc_html__( 'Testimonial Items', 'deep' ),
			'type'			=> 'param_group',
			'param_name'	=> 'testimonial_item',
			'dependency'	=> array('element' => 'type','value' => array('1','2','3') ),
			'params' => array(
				array(
					'heading'		=> esc_html__( 'Testimonial Image', 'deep' ),
					'type'			=> 'attach_image',
					'param_name'	=> 'img',
					'value'			=> '',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image Size', 'deep' ),
					'param_name' => 'thumbnail',
					'value'=>'',
					'description' => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'deep')
				),

				array(
					'heading'		=> esc_html__( 'Testimonial Content', 'deep' ),
					'type'			=> 'textarea',
					'param_name'	=> 'tc_content',
					'value'			=> '',
				),

				array(
					'heading'		=> esc_html__( 'Testimonial Name', 'deep' ),
					'type'			=> 'textfield',
					'param_name'	=> 'name',
					'value'			=> '',
					'admin_label'	=> true,
				),

				array(
					'heading'		=> esc_html__( 'Testimonial Job', 'deep' ),
					'type'			=> 'textfield',
					'param_name'	=> 'job',
					'value'			=> '',
					'admin_label'	=> true,
				),
			),
		),

		array(
			'heading'		=> esc_html__( 'Testimonial Items', 'deep' ),
			'type'			=> 'param_group',
			'param_name'	=> 'testimonial_item_type4',
			'dependency'	=> array('element' => 'type','value' => '4'),
			'params'			=> array(
				array(
					'heading'		=> esc_html__( 'Testimonial Content', 'deep' ),
					'type'			=> 'textarea',
					'param_name'	=> 'tc_content_t4',
					'value'			=> '',
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'First Social Name', 'deep' ),
					'param_name' => 'first_social',
					'value' => array(
						"Twitter"		=>'twitter',
						"Facebook"		=>'facebook',
						"Google Plus"	=>'google-plus',
						"Vimeo"			=>'vimeo',
						"Dribbble"		=>'dribbble',
						"Youtube"		=>'youtube',
						"Youtube"		=>'youtube',
						"Pinterest"		=>'pinterest',
						"LinkedIn"		=>'linkedin',
						"Instagram"		=>'instagram',
					),
					'std' => 'twitter',
					'description' => esc_html__( 'Select Social Name', 'deep'),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'First Social URL', 'deep' ),
					'param_name' => 'first_url',
					'value'=>'',
					'description' => esc_html__( 'First social URL', 'deep'),
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Second Social Name', 'deep' ),
					'param_name' => 'second_social',
					'value' => array(
						"Twitter"=>'twitter',
						"Facebook"=>'facebook',
						"Google Plus"=>'google-plus',
						"Vimeo"=>'vimeo',
						"Dribbble"=>'dribbble',
						"Youtube"=>'youtube',
						"Youtube"=>'youtube',
						"Pinterest"=>'pinterest',
						"LinkedIn"=>'linkedin',
						"Instagram"=>'instagram',
					),
					'std' => 'facebook',

					'description' => esc_html__( 'Select Social Name', 'deep'),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Second Social URL', 'deep' ),
					'param_name' => 'second_url',
					'value'=>'',
					'description' => esc_html__( 'Second social URL', 'deep'),
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Third Social Name', 'deep' ),
					'param_name' => 'third_social',
					'value' => array(
						"Twitter"=>'twitter',
						"Facebook"=>'facebook',
						"Google Plus"=>'google-plus',
						"Vimeo"=>'vimeo',
						"Dribbble"=>'dribbble',
						"Youtube"=>'youtube',
						"Youtube"=>'youtube',
						"Pinterest"=>'pinterest',
						"LinkedIn"=>'linkedin',
						"Instagram"=>'instagram',
					),
					'std' => 'google-plus',
					'description' => esc_html__( 'Select Social Name', 'deep'),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Third Social URL', 'deep' ),
					'param_name' => 'third_url',
					'value'=>'',
					'description' => esc_html__( 'Third social URL', 'deep'),
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Fourth Social Name', 'deep' ),
					'param_name' => 'fourth_social',
					'value' => array(
						"Twitter"=>'twitter',
						"Facebook"=>'facebook',
						"Google Plus"=>'google-plus',
						"Vimeo"=>'vimeo',
						"Dribbble"=>'dribbble',
						"Youtube"=>'youtube',
						"Youtube"=>'youtube',
						"Pinterest"=>'pinterest',
						"LinkedIn"=>'linkedin',
						"Instagram"=>'instagram',
					),
					'std' => 'linkedin',
					'description' => esc_html__( 'Select Social Name', 'deep'),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Fourth Social URL', 'deep' ),
					'param_name' => 'fourth_url',
					'value'=>'',
					'description' => esc_html__( 'Fourth social URL', 'deep'),
				),
			),
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

	) ) );
<?php
vc_map( array(
		'name'			=> esc_html__( 'Box Carousel', 'deep' ),
		'base'			=> 'service_carousel',
		'description'	=> esc_html__( 'Box Carousel', 'deep' ),
		'icon'			=> 'webnus-services-carousel',
		'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'params'		=> array(
			array(
				'type'			=> 'param_group',
				'heading'		=> esc_html__( 'Box Item', 'deep' ),
				'description'	=> esc_html__( 'Please Add Your service', 'deep' ),
				'param_name'	=> 'carousel_item',
				'value' 		=> '',
				'params'		=> array(
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Box Title', 'deep' ),
						'description'	=> esc_html__( 'Please enter your title', 'deep' ),
						'param_name'	=> 'service_title',
						'value'			=> '',
						'admin_label'	=> true,
					),
					array(
						'type'			=> 'textarea',
						'heading'		=> esc_html__( 'Box Content', 'deep' ),
						'description'	=> esc_html__( 'Please enter your content', 'deep' ),
						'param_name'	=> 'service_content',
						'value'			=> '',
					),
					array(
						'type'			=> 'iconfonts',
						'heading'		=> esc_html__( 'Select Icon', 'deep' ),
						'param_name'	=> 'service_icon',
						'value'			=> '',
					),
				),
			),
			array(
				'heading'		=> esc_html__( 'Carousel Items', 'deep' ),
				'description'	=> esc_html__( 'Please enter carousel items to show', 'deep' ),
				'type'			=> 'textfield',
				'param_name'	=> 'item_carousle',
				'value'			=> '',
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
	)
);
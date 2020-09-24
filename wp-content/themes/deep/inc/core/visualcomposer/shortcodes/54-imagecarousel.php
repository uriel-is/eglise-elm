<?php
vc_map( array(
		'name'			=> esc_html__( 'Image Carousel', 'deep' ),
		'base'			=> 'imagecarousel',
		'description'	=> esc_html__( 'Webnus Image Carousel', 'deep' ),
		'icon'			=> 'webnus-imagecarousel',
		'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'params'		=> array(
			array(
				'heading'		=> esc_html__( 'Image Carousel Type' , 'deep' ),
				'description'	=> esc_html__( 'Plase Select image carousl type' , 'deep'),
				'type'			=> 'dropdown',
				'param_name'	=> 'type',
				'value'			=> array(
					'Type 1' 	=> 'type1',
					'Type 2' 	=> 'type2',
					'Type 3' 	=> 'type3',
					'Type 4' 	=> 'type4',
				),
				'std'			=> 'type1',
			),
			array(
				'heading'		=> esc_html__( 'Carousel Items', 'deep' ),
				'description'	=> esc_html__( 'Please enter carousel items to show', 'deep' ),
				'type'			=> 'textfield',
				'param_name'	=> 'item_carousle',
				'value'			=> '',
				'dependency'		=> array(
					'element' => 'type',
					'value'	  => 'type1',
				),
			),
			array(
				'type'			=> 'param_group',
				'heading'		=> esc_html__( 'Image Item', 'deep' ),
				'description'	=> esc_html__( 'Please Add Your image', 'deep' ),
				'param_name'	=> 'image_item',
				'dependency' 	=> array('element'=>'type','value'=>array('type1','type2','type4')),
				'value' 		=> '',
				'params'		=> array(
					array(
						'type'			=> 'attach_image',
						'heading'		=> esc_html__( 'Select image', 'deep' ),
						'description'	=> esc_html__( 'Please Select Your Desired image', 'deep' ),
						'param_name'	=> 'image',
						'value'			=> '',
					),
				),
			),
			array(
				'type'			=> 'param_group',
				'heading'		=> esc_html__( 'Image Item', 'deep' ),
				'description'	=> esc_html__( 'Please Add Your image', 'deep' ),
				'param_name'	=> 'image_item_t3',
				'value' 		=> '',
				'dependency' 	=> array('element'=>'type','value'=>'type3'),
				'params'		=> array(
					array(
						'type'			=> 'attach_image',
						'heading'		=> esc_html__( 'Select image', 'deep' ),
						'description'	=> esc_html__( 'Please Select Your Desired image', 'deep' ),
						'param_name'	=> 'image_t3',
						'value'			=> '',
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Caption', 'deep' ),
						'description'	=> esc_html__( 'Enter Your Image Title', 'deep' ),
						'param_name'	=> 'title_t3',
						'value'			=> '',
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
	)
);
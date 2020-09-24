<?php
vc_map(array(
	'name'		  => esc_html__( 'Food Menu', 'deep' ),
	'base'		  => 'food_menu',
	'description' => esc_html__( 'Create Your Food Menu', 'deep' ),
	'icon'		  => 'webnus-food-menu',
	'category'	  => esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'	  => array(

		array(
			'heading'	  => esc_html__( 'Type', 'deep' ),
			'description' => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
			'type'		  => 'dropdown',
			'param_name'  => 'type',
			'value'		  => array(
				esc_html__( 'Type 1', 'deep' ) => '1',
				esc_html__( 'Type 2', 'deep' ) => '2',
				esc_html__( 'Type 3', 'deep' ) => '3',
				esc_html__( 'Type 4', 'deep' ) => '4', 
				esc_html__( 'Type 5', 'deep' ) => '5', 
			),
		),

		array(
			'heading'	 => esc_html__( 'Food Menu Image', 'deep' ),
			'type'		 => 'attach_image',
			'param_name' => 'img',
			'dependency' => array( 'element' => 'type', 'value' => array( '1', '3', '4', '5', ) ),
		),

		array(
			'heading'	  => esc_html__( 'Title', 'deep' ),
			'description' => esc_html__( 'Food Menu Title', 'deep'),
			'type'		  => 'textfield',
			'param_name'  => 'title',
			'dependency'  => array( 
				'element' => 'type', 
				'value'   => array( '1', '3', '4', '5', ) ),
		),

		array(
			'heading'		=> esc_html__( 'Price', 'deep' ),
			'description'	=> esc_html__( 'Food Menu Price', 'deep'),
			'type'			=> 'textfield',
			'param_name'	=> 'price',
			'value'			=> '$10',
			'dependency' 	=> array( 
				'element' => 'type', 
				'value'   => array( '1', '3', '4', '5', ) ),
		),

		array(
			'heading'	  => esc_html__( 'Description', 'deep' ),
			'description' => esc_html__( 'Food Menu Description', 'deep'),
			'type'		  => 'textfield',
			'param_name'  => 'description',
			'dependency'  => array( 
				'element' => 'type', 
				'value'   => array( '3', '4', '5', ) ),
		),

		array(
			'heading'		=> esc_html__( 'Ingredients', 'deep' ),
			'description'	=> esc_html__( 'Enter Ingredients.', 'deep' ),
			'type'			=> 'param_group',
			'param_name'	=> 'ingredients',
			'params' => array(
				array(
					'heading'		=> esc_html__( 'Ingredient', 'deep' ),
					'type'			=> 'textfield',
					'param_name'	=> 'ingredient',
					'admin_label'	=> true,
				),
			),
			'dependency' => array(
					'element'	 => 'type',
					'value'		 => '1' ),
		),

		// start type 2
		array(
			'heading'		=> esc_html__( 'Food Items', 'deep' ),
			'description'	=> esc_html__( 'Enter Title, Price and Description. ', 'deep' ),
			'type'			=> 'param_group',
			'param_name'	=> 'food_menu2',
			'params' => array(
				array(
					'heading'	  => esc_html__( 'Title', 'deep' ),
					'description' => esc_html__( 'Food Menu Title', 'deep'),
					'type'		  => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'	  => esc_html__( 'Price', 'deep' ),
					'description' => esc_html__( 'Food Menu Price', 'deep'),
					'type'		  => 'textfield',
					'param_name'  => 'price',
					'value'		  => '$10',
					'admin_label' => true,
				),
				array(
					'type'          => 'colorpicker',
					'heading'       => esc_html__('Price and Title Background color ', 'deep'),
					'param_name'    => 'tp_color',
					'value'         => '#437df9',
					'description'   => esc_html__( 'You should choose a background color mode in any case', 'deep')
				),
				array(
					'heading'	  => esc_html__( 'Description', 'deep' ),
					'description' => esc_html__( 'Food Menu Description', 'deep'),
					'type'		  => 'textfield',
					'param_name'  => 'description',
					'value'		  => 'Soup / Lemon / Garlic',
				),
				array(
					'heading'		=> esc_html__( 'Food Item Style', 'deep' ),
					'type'			=> 'dropdown',
					'param_name'	=> 'food_style',
					'value'			=> array(
						esc_html__( 'Default Food Item', 'deep' )	=> 'default',
						esc_html__( 'Featured Food Item', 'deep' )	=> 'featured-w2',
					),
					'admin_label' => true,
				),
				array(
					'heading'	  => esc_html__( 'Featured Text', 'deep' ),
					'type'		  => 'textfield',
					'param_name'  => 'featured_text',
					'value'		  => 'Recommended',
					'dependency'  => array( 'element' => 'food_style', 'value' => 'featured-w2' ),
				),
			),
			'dependency'  => array( 
					'element' => 'type', 
					'value'   => '2' ),
		),
		// end type 2

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
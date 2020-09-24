<?php
vc_map( array(
	'base'			=> 'pricing-tables',
	'name'			=> 'Pricing Tables',
	'description'	=> 'Pricing Tables',
	'icon'			=> 'webnus-pricingtable',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(
		array(
			'heading'		=> esc_html__( 'Type', 'deep' ),
			'description'	=> esc_html__( 'You can choose from these pre-designed types.', 'deep'),
			'type'			=> 'dropdown',
			'param_name'	=> 'type',
			'value'			=> array(
				esc_html__( 'Type 1', 'deep' )  => '1',
				esc_html__( 'Type 2', 'deep' )  => '2',
				esc_html__( 'Type 3', 'deep' )  => '3',
				esc_html__( 'Type 4', 'deep' )  => '4',
				esc_html__( 'Type 5', 'deep' )  => '5',
				esc_html__( 'Type 6', 'deep' )  => '6',
				esc_html__( 'Type 7', 'deep' )  => '7',
				esc_html__( 'Type 8', 'deep' )  => '8',
				esc_html__( 'Type 9', 'deep' )  => '9',
                esc_html__( 'Type 10', 'deep' ) => '10',
			),
		),

		array(
			'heading'		=> esc_html__( 'Title', 'deep' ),
			'description' 	=> esc_html__( 'Pricing Table Title', 'deep'),
			'type'			=> 'textfield',
			'param_name'	=> 'title',
		),

		array(
			'heading'		=> esc_html__( 'Header Description', 'deep' ),
			'description' 	=> esc_html__( 'Pricing Table Description', 'deep'),
			'type'			=> 'textfield',
			'param_name'	=> 'description',
			'dependency'	=> array( 'element' => 'type', 'value' => '4' ),
		),

		array(
			'heading'		=> esc_html__( 'Price', 'deep' ),
			'description'	=> esc_html__( 'Pricing Table Price', 'deep'),
			'type'			=> 'textfield',
			'param_name'	=> 'price',
			'value'			=> '$10',
		),

        array(
            'heading'       => esc_html__( 'Price Symbol', 'deep' ),
            'description'   => esc_html__( 'Pricing Symbol', 'deep'),
            'type'          => 'textfield',
            'param_name'    => 'price_symbol',
            'dependency'    => array(
                'element' => 'type',
                'value' => array( '7' , '10' ),
            ),
        ),

		array(
			'heading'		=> esc_html__( 'Special Offer', 'deep' ),
			'description'	=> esc_html__( 'Pricing Table Special Offer or On Sale Price', 'deep'),
			'type'			=> 'textfield',
			'param_name'	=> 'on_sale_price',
			'value'			=> '',
			'dependency'	=> array(
				'element' => 'type',
				'value' => array('1','2','3','4','5','6','7','10'),
			),
		),

		array(
			'heading'		=> esc_html__( 'Plan Label', 'deep' ),
			'description'	=> esc_html__( 'Pricing Table Label', 'deep'),
			'type'			=> 'textfield',
			'param_name'	=> 'plan_label',
			'value'			=> '',
			'dependency'	=> array( 'element' => 'type', 'value' => array( '3', '5' ) ),
		),

		array(
			'heading'		=> esc_html__( 'Label Background Color', 'deep' ),
			'type'			=> 'colorpicker',
			'param_name'	=> 'label_bg_color',
			'dependency'	=> array( 'element' => 'type', 'value' => '5' ),
		),

		array(
			'heading'		=> esc_html__( 'Period', 'deep' ),
			'description'	=> esc_html__( 'Pricing Table Period', 'deep'),
			'type'			=> 'textfield',
			'param_name'	=> 'period',
			'value'			=> esc_html__( 'Month', 'deep'),
		),

		array(
			'heading'		=> esc_html__( 'Features', 'deep' ),
			'description'	=> esc_html__( 'Enter features for pricing table - value, title and color.', 'deep' ),
			'type'			=> 'param_group',
			'param_name'	=> 'features',
			'dependency'	=> array(
				'element' => 'type',
				'value' => array('1','2','3','4','5','6','7','10'),
			),
			'params' => array(
				array(
					'heading'	 => esc_html__( 'Feature Item Icon', 'deep' ),
					'type'		 => 'dropdown',
					'param_name' => 'feature_icon',
					'value'		 => array(
						esc_html__( 'Empty', 'deep' )			=> 'empty-icon',
						esc_html__( 'Available', 'deep' )		=> 'available-icon',
						esc_html__( 'Not Available', 'deep' )	=> 'not-available-icon',
					),
					'admin_label'	=> true,
				),
				array(
					'heading'		=> esc_html__( 'Feature Item Text', 'deep' ),
					'type'			=> 'textfield',
					'param_name'	=> 'feature_item',
					'admin_label'	=> true,
				),
			),
		),

		array(
			'heading'		=> esc_html__( 'Content Pricing Table Text', 'deep' ),
			'type'			=> 'textarea',
			'param_name'	=> 'content_text',
			'value'			=> '',
			'dependency'	=> array( 'element' => 'type' , 'value' => '8'),
		),	

		array(
			'heading'		=> esc_html__( 'Footer Pricing Table Text', 'deep' ),
			'type'			=> 'textfield',
			'param_name'	=> 'footer_text',
			'value'			=> '',
			'dependency'	=> array(
				'element' => 'type',
				'value' => array('1','2','3','4','5','6','7','10'),
			),
		),		

		array(
			'heading'		=> esc_html__( 'Button Text', 'deep' ),
			'type'			=> 'textfield',
			'param_name'	=> 'button_text',
			'value'			=> '',
		),

		array(
			'heading'		=> esc_html__( 'Button URL', 'deep' ),
			'description'	=> esc_html__( 'Button URL (http://example.com)', 'deep' ),	
			'type'			=> 'textfield',
			'param_name'	=> 'button_url',
			'value'			=> '',
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Open link in a new tab? ', 'deep' ),
            'description'   => __( 'Add Target = _blank', 'deep'),
            'param_name'    => 'link_target',
            'std'           => 'false',
        ),

		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Featured Plan ?', 'deep' ),
			'param_name'	=> 'featured',
			'value'			=> array( esc_html__( 'Yes', 'deep' ) => ' w-featured' ),
			'description'	=> esc_html__( 'Pricing Tables Featured Plan', 'deep'),
			'dependency'	=> array(
				'element' => 'type',
				'value' => array('1','2','3','4','5','6','7','10'),
			),
		),

		array(
			'heading'		=> esc_html__('Plan Icon', 'deep'),
			'type'			=> 'iconfonts',
			'param_name'	=> 'icon',
			'value'			=> '',
			'dependency'	=> array(
				'element' => 'type',
				'value'   => '2',
			),
		),

		array(
			'heading'		=> esc_html__( 'Heading Background Color', 'deep' ),
			'description' 	=> esc_html__( 'Select Custom Background Color', 'deep'),
			'type'			=> 'colorpicker',
			'param_name'	=> 'heading_bg_color',
			'dependency'	=> array( 'element' => 'type', 'value' => '6' ),
		),

		array(
			'heading'		=> esc_html__( 'Heading Text Color', 'deep' ),
			'description' 	=> esc_html__( 'Select Custom Text Color', 'deep'),
			'type'			=> 'colorpicker',
			'param_name'	=> 'heading_text_color',
			'dependency'	=> array( 'element' => 'type', 'value' => '6' ),
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
	)

) );
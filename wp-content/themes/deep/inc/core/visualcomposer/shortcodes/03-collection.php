<?php
vc_map( array(
        'name' =>'Collection',
        'base' => 'collection',
        'description' => 'Collection Box',
		'icon' => 'webnus-collection',
        'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
        'params' => array(
            array(
                'type'              => 'textarea',
                'heading'           => esc_html__('Title', 'deep'),
                'param_name'        => 'title',
                'value'             => '',
                'description'       => esc_html__( 'Put your title', 'deep')
            ),
           array(
                'type'              => 'attach_image',
                'heading'           => esc_html__( 'Select Image', 'deep' ),
                'param_name'        => 'image',
                'value'             => '',
                'description'       => esc_html__( 'Select Image', 'deep'),
            ),
            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Image in Top or Bottom?', 'deep' ),
                'param_name'        => 'image_top_bottom',
                'value'             => array(
    				'Top'       =>'top',
    				'Bottom'    =>'bottom',
				),
                'description'       => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                'edit_field_class'  => 'vc_col-sm-6',
            ),
            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Image in Left or Right?', 'deep' ),
                'param_name'        => 'image_left_right',
                'value'             => array(
                    'Right'      => 'right',
                    'Left'       => 'left',
                ),
                'description'       => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                'edit_field_class'  => 'vc_col-sm-6',
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__('Collection Year', 'deep'),
                'param_name'        => 'year',
                'value'             => '',
                'description'       => esc_html__( 'Collection Year', 'deep'),
            ),
			array(
				'type'              => 'textarea',
				'heading'           => esc_html__('Brands', 'deep'),
				'param_name'        => 'brands',
				'value'             => '',
				'description'       => esc_html__( 'Put your brands', 'deep')
			),
            array(
				'type'              => 'textarea',
				'heading'           => esc_html__('Content', 'deep'),
				'param_name'        => 'c_content',
				'value'             => '',
				'description'       => esc_html__( 'Collection Content Goes Here', 'deep'),
			),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__('Link Title', 'deep'),
                'param_name'        => 'link_title',
                'value'             => '',
                'description'       => esc_html__( 'Put your link title', 'deep'),
                'edit_field_class'  => 'vc_col-sm-6',
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__('Link Address', 'deep'),
                'param_name'        => 'link_href',
                'value'             => '',
                'description'       => esc_html__( 'Put your link address', 'deep'),
                'edit_field_class'  => 'vc_col-sm-6',
            ),
            array(
                'type'          => 'checkbox',
                'heading'       => __( 'Open link in a new tab? ', 'deep' ),
                'description'   => __( 'Add Target = _blank', 'deep'),
                'param_name'    => 'link_target',
                'std'           => 'false',
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


?>
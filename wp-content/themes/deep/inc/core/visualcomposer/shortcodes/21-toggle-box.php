<?php
vc_map( array(
		'name'			=> esc_html__( 'Toggle box', 'deep' ),
		'base'			=> 'toggle_box',
		'description'	=> esc_html__( 'toggle box', 'deep' ),
		'icon'			=> 'webnus-togglebox',
		'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'params'		=> array(
			array(
				'type'				=> 'dropdown',
				'heading'			=> esc_html__('Type', 'deep'),
				'param_name'		=> 'type',
				'value'				=> array(
					'Type 1' => '1',
					'Type 2' => '2',
					),
				'description'		=> esc_html__( 'Please select type', 'deep'),
				'edit_field_class'	=> 'vc_col-sm-6 paddingtop',
			),
			array(
				'type'				=> 'textfield',
				'heading'			=> esc_html__('Service Title', 'deep'),
				'param_name'		=> 'service_single_title',
				'value'				=> '',
				'description'		=> esc_html__( 'Please write Service Title', 'deep'),
				'edit_field_class'	=> 'vc_col-sm-6 paddingtop',
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('1',),
                ),
			),
			array(
				'type'				=> 'textarea',
				'heading'			=> esc_html__('Content', 'deep'),
				'param_name'		=> 'service_single_content',
				'value'				=> '',
				'description'		=> esc_html__( 'Please write Content', 'deep'),
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('1',),
                ),
			),

            array(
                'type'              => 'attach_image',
                'heading'           => esc_html__( 'Background Image', 'deep' ),
                'param_name'        => 'background_image',
                'value'             =>'',
                'description'       => wp_kses( __( 'Select Image for background<br>Note: If you have another Icon that not is here. You can put PNG image of that instead of these Icons.', 'deep'), array( 'br' => array() ) ),
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'colorpicker',
                'heading'           => esc_html__('Background Color', 'deep'),
                'param_name'        => 'bgcolor',
                'value'             => '',
                'description'       => esc_html__( 'Select Background color', 'deep'),
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__('Subtitle', 'deep'),
                'param_name'        => 'offers_subtitle',
                'value'             => '',
                'description'       => esc_html__( 'Please write Offer Subtitle', 'deep'),
                'edit_field_class'  => 'vc_col-sm-6',
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__('Title', 'deep'),
                'param_name'        => 'offers_title',
                'value'             => '',
                'description'       => esc_html__( 'Please write Offer Title', 'deep'),
                'edit_field_class'  => 'vc_col-sm-6 paddingtop',
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__('Minimum Height', 'deep'),
                'param_name'        => 'min_height',
                'value'             => '',
                'description'       => esc_html__( 'Please Enter Minimum Height (just write number, like: 575)', 'deep'),
                'edit_field_class'  => 'vc_col-sm-6 paddingtop',
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'checkbox',
                'heading'           => esc_html__('Do you want the content open as default?', 'deep'),
                'description'       => esc_html__('Please check to enable this feature. ', 'deep'),
                'std'               => 'true',
                'param_name'        => 'open',
                'edit_field_class'  => 'vc_col-sm-6',
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'textarea',
                'heading'           => esc_html__('Content', 'deep'),
                'param_name'        => 'offers_content',
                'value'             => '',
                'description'       => esc_html__( 'Please write Content', 'deep'),
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'iconfonts',
                'heading'           => esc_html__( 'Icon', 'deep' ),
                'param_name'        => 'icon_name',
                'value'             => '',
                'description'       => esc_html__( 'Select Icon', 'deep'),
                'group'             => 'Icons',
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
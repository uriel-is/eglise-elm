<?php
vc_map( array(
        'name' =>'Before After Image ( Comparison )',
        'base' => 'beforeafter',
		"description" => "You can choose 2 images to compare.",
        'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
        "icon" => "webnus-beforeafter",
		'params'=>array(
            array(
                'type'          => 'attach_image',
                'heading'       => esc_html__( '"Before" image', 'deep' ),
                'param_name'    => 'img1',
                'group'         => esc_html__( 'Images', 'deep' ),
            ),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__( 'Image ALT', 'deep' ),
				'param_name' 	=> 'img1_alt',
                'group'         => esc_html__( 'Images', 'deep' ),
			),
            array(
                'type'          => 'attach_image',
                'heading'       => esc_html__( '"After" image', 'deep' ),
                'param_name'    => 'img2',
                'group'         => esc_html__( 'Images', 'deep' ),
            ),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__( 'Image ALT', 'deep' ),
				'param_name' 	=> 'img2_alt',
                'group'         => esc_html__( 'Images', 'deep' ),
			),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__('Arrow type', 'deep'),
                'param_name'    => 'arrow_type',
                'value'         => array(
                    'Circle'     => 'circle' , 
                    'Square'     => 'square' , 
                ),
                'group'         => esc_html__( 'Options', 'deep' ),
            ),
            array(
                'type'          => 'checkbox',
                'heading'       => esc_html__( 'Remove Middle line?', 'deep' ),
                'param_name'    => 'no_middle_line',
                'std'           => '',
                'group'         => esc_html__( 'Options', 'deep' ),
                'value'         => array(
                    esc_html__( 'Yes', 'deep' ) => 'yes',
                ),
            ),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Visible "Before" image value', 'deep'),
                'param_name'    => 'visible_value',
                'std'           => '0.5',
                'description'   => esc_html__( 'How much of the "before" image is visible when the page loads? Please enter between 0 - 1. Default is 0.5', 'deep'),
                'group'         => esc_html__( 'Options', 'deep' ),
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__('Orientation type', 'deep'),
                'param_name'    => 'orientation_type',
                'value'         => array(
                    'Horizontal'    => 'horizontal' , 
                    'Vertical'      => 'vertical' , 
                ),
                'description'   => esc_html__( 'Orientation of the before and after images', 'deep'),
                'group'         => esc_html__( 'Options', 'deep' ),
            ),
            array(
                'type'          => 'checkbox',
                'heading'       => esc_html__( 'Display Overlay?', 'deep' ),
                'param_name'    => 'no_overlay',
                'std'           => '',
                'group'         => esc_html__( 'Options', 'deep' ),
                'value'         => array(
                    esc_html__( 'Yes', 'deep' ) => 'yes',
                ),
            ),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Before label', 'deep'),
                'param_name'    => 'before_label',
                'value'         => '',
                'description'   => esc_html__( 'Set a custom before label', 'deep'),
                'group'         => esc_html__( 'Options', 'deep' ),
                'dependency' => array( 
                    'element'   => 'no_overlay',
                    'value'     => 'yes',
                ),
            ),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('After label', 'deep'),
                'param_name'    => 'after_label',
                'value'         => '',
                'description'   => esc_html__( 'Set a custom after label', 'deep'),
                'group'         => esc_html__( 'Options', 'deep' ),
                'dependency' => array( 
                    'element'   => 'no_overlay',
                    'value'     => 'yes',
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
		)
        
    ) );
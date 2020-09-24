<?php

vc_map( array(
        'name' =>'Quote',
        'base' => 'quote',
		"description" => "Quote",
        "icon" => "webnus-quote",
        'params'=>array(
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Name', 'deep' ),
					'param_name' => 'name',
					'value'=>'',
					'description' => esc_html__( 'Enter the Name', 'deep')
			),
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Name Subtitle', 'deep' ),
					'param_name' => 'name_sub',
					'value'=>'',
					'description' => esc_html__( 'Enter the Name Subtitle', 'deep')
			),
			array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Content', 'deep' ),
					'param_name' => 'text',
					'value' => '',
					'description' => esc_html__( 'Enter the Quote of the Week content text', 'deep')
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
		),
		'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
        
    ) );


?>
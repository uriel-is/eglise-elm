<?php

vc_map( array(
        'name' =>'Dropcap',
        'base' => 'dropcap',
		"description" => "Dropcap",
        'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
         "icon" => "webnus-dropcap",
        'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Dropcap Type', 'deep' ),
				'param_name' => 'type',
				'value' => array(
					'Dropcap 1'=>'1',
					'Dropcap 2'=>'2',
					'Dropcap 3'=>'3',
				),
				'description' => esc_html__( 'Specify the Dropcap type', 'deep')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Dropcap Character', 'deep' ),
				'param_name' => 'dropcap_content',
				'value' => '',
				'description' => esc_html__( 'Specify the Dropcap Text', 'deep')
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
    ) );
?>
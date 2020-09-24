<?php

vc_map( array(
        'name' =>'Line',
        'base' => 'line',
		"description" => "Horizonal line",
        'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
        "icon" => "webnus-line",
        'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Line Type', 'deep' ),
				'param_name' => 'type',
				'value' => array(
					'Line'=>'1',
					'Thick Line'=>'2',				
				),
				'description' => esc_html__( 'Select the Line type', 'deep')
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
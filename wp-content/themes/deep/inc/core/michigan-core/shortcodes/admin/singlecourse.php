<?php
vc_map( array(
        'name' =>'Single Course',
        'base' => 'acourse',
        "icon" => "webnus-acourse",
		"description" => "Show an course",
        'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
        'params' => array(
			array(
				"type" => "dropdown",
				'heading' => esc_html__( 'Type', 'deep' ),
				'param_name' => 'type',
				"value" => array(
					"Latest Course"=>"latest",
					"Custom Course"=>"custom",
				),
				'description' => esc_html__( 'You can choose among these types.', 'deep')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Course ID', 'deep' ),
				'param_name' => 'post',
				'value'=>'',
				'description' => esc_html__( 'Pick up the ID & follow this instruction: admin panel > courses > ID column. Note: When you type nothing it puts latest course as default to show.', 'deep'),
				"dependency" => array('element'=>'type','value'=>array('custom')),
			), 
			),    
		) );
?>
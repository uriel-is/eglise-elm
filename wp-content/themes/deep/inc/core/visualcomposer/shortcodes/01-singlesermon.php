<?php
if ( ! defined( 'SERMONS_DIR' ) ) {
	return;
}
vc_map( array(
        'name' =>'Single Sermon',
        'base' => 'asermon',
        "icon" => "webnus-sermons",
		"description" => "Show a sermon",
        'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
        'params' => array(
			array(
				"type" => "dropdown",
				'heading' => esc_html__( 'Type', 'deep' ),
				'param_name' => 'type',
				"value" => array(
					"Latest Sermon"=>"latest",
					"Custom Sermon"=>"custom",
				),
				'description' => esc_html__( 'You can choose from these pre-designed types.', 'deep')
			),

			array(
					"type" => "dropdown",
					"heading" => esc_html__( "Style", 'deep' ),
					"param_name" => "style",
					"value" => array(
						"Standard"=>"",
						"Boxed"=>"boxed",
					),
					"description" => esc_html__( "You can choose among these pre-designed styles. Note: If you choose boxed style, your picture and explanation text won\'t show.", 'deep')
				),

			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'deep' ),
					'param_name' => 'box_title',
					'value'=>'',
					'description' => esc_html__( 'Choose a title for your sermon box style.', 'deep'),
					"dependency" => array('element'=>'style','value'=>array('boxed')),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Sermon ID', 'deep' ),
				'param_name' => 'post',
				'value'=>'',
				'description' => esc_html__( 'Pick up the ID & follow this instruction: Sermons > Sermon Categories > ID column. Note: When you type nothing it puts latest sermon as default to show.', 'deep'),
				"dependency" => array('element'=>'type','value'=>array('custom')),
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

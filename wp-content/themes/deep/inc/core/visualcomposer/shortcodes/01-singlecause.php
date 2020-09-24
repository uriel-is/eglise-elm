<?php
if ( defined( 'CAUSES_DIR' ) ) {
	vc_map( array(
		'name' =>'Single Cause',
        'base' => 'acause',
        "icon" => "webnus-causes",
		"description" => "Show a cause",
        'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
        'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Cause ID', 'deep' ),
				'param_name' => 'post',
				'value'=>'',
				'description' => esc_html__( 'Pick up the ID & follow this instruction: admin panel > causes > ID column. Note: When you type nothing it puts latest cause as default to show.', 'deep'),
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
}
?>

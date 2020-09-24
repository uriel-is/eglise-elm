<?php
if ( ! defined( 'SERMONS_DIR' ) ) {
	return;
}
vc_map( array(
        'name' =>'Sermons Speakers',
        'base' => 'speakers',
        "icon" => "webnus-sermons",
		"description" => "Show Sermons Speakers",
        'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
        'params' => array(
				array(
					'heading' => esc_html__('Hide Speakers with no sermons', 'deep') ,
					'param_name' => 'hide',
					'value' => array( esc_html__( 'Yes', 'deep' ) => true),
					'type' => 'checkbox',
					'std' => '',
				) ,
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

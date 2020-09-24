<?php
if ( ! is_plugin_active( 'tablepress/tablepress.php' ) ) {
	return;
}
vc_map( array(
		'name'			=>'Webnus Tablepress',
		'base'			=> 'wntablepress',
		"icon"			=> "webnus-causes",
		'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'params'		=> array(
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html__( "Enter Table ID", 'deep' ),
				"param_name" 	=> "table_id",
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

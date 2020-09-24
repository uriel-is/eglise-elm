<?php
if ( ! defined( 'CAUSES_DIR' ) ) {
	return;
}
vc_map( array(
		'name'			=>'Webnus Causes',
		'base'			=> 'causes',
		"icon"			=> "webnus-causes",
		"description"	=> "Show Latest Or Popular Causes",
		'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'params'		=> array(
			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__( "Type", 'deep' ),
				"param_name" 	=> "type",
				"value" 		=> array(
					"Grid"		=> "grid",
					"Grid 2"	=> "grid2",
					"List"		=> "list",
					"List 2"	=> "list2",
				),
				"description" => esc_html__( "You can choose from these pre-designed types.", 'deep')
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__( "Order by", 'deep' ),
				"description" 	=> esc_html__( "Recent Or Popular", 'deep'),
				"param_name" 	=> "sort",
				"value" 		=> array(
					"Most Recent"	=> "",
					"Most Popular"	=> "view",
				),
			),
			array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'Post Count', 'deep' ),
			'param_name' 	=> 'count',
			'value' 		=> '',
			'description' 	=> esc_html__( 'Type nothing to default (6) and type 0 to show all.', 'deep')
			),
			array(
				'heading' 		=> esc_html__('Page Navigation', 'deep') ,
				'description' 	=> wp_kses( __('Enable page navigation.<br/><br/>', 'deep'), array( 'br' => array() ) ),
				'param_name' 	=> 'page',
				'value' 		=> array( esc_html__( 'Enable', 'deep' ) => 'enable'),
				'type' 			=> 'checkbox',
				'std' 			=> '',
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

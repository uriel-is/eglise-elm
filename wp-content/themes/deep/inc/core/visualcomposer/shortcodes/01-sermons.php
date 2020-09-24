<?php
if ( ! defined( 'SERMONS_DIR' ) ) {
	return;
}
vc_map( array(
	'name' 			=>'Webnus Sermons',
	'base' 			=> 'sermons',
	"icon" 			=> "webnus-sermons",
	"description" 	=> "Show Latest Or Popular Sermons",
	'category' 		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params' 		=> array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__( "Type", 'deep' ),
			"param_name" => "type",
			"value" => array(
				"Toggle"	=>"toggle",
				"Toggle 2"	=>"toggle2",
				"Minimal"	=>"minimal",
				"Grid"		=>"grid",
				"Clean"		=>"clean",
				"Simple"	=>"simple"
			),
			"description" => esc_html__( "You can choose from these pre-designed types.", 'deep')
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Display featured image?', 'deep' ),
			'param_name'	=> 'featured',
			'value' 		=> array( esc_html__( 'Yes', 'deep' ) => true ),
			'dependency'	=> array( 'element' => 'type', 'value' => array('grid',) ),
			'std'			=> false,
		),

		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Would you like change it to carousel style?', 'deep' ),
			'param_name'	=> 'carousel',
			'value' 		=> array( esc_html__( 'Yes', 'deep' ) => true ),
			'dependency'	=> array( 'element' => 'type', 'value' => array('grid',) ),
			'std'			=> false,
		),

		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Count in row', 'deep' ),
			'param_name'	=> 'sermon_carousel_item',
			'value' 		=> '',
			'dependency'	=> array(
				'element'	=> 'carousel',
				'not_empty'	=> true,
			),
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__( "Order by", 'deep' ),
			"param_name" => "sort",
			"value" => array(
				"Most Recent"=>"",
				"Most Popular"=>"view",
			),
			"description" => esc_html__( "Recent Or Popular?", 'deep')
		),

		array(
		'type' => 'textfield',
		'heading' => esc_html__( 'Post Count', 'deep' ),
		'param_name' => 'count',
		'value' => '',
		'description' => esc_html__( 'Type nothing to default (6) and type 0 to show all.', 'deep')
		),

		array(
			'heading' => esc_html__('Page Navigation', 'deep') ,
			'description' => wp_kses( __('Enable page navigation.<br/><br/>', 'deep'), array( 'br' => array() ) ),
			'param_name' => 'page',
			'value' => array( esc_html__( 'Enable', 'deep' ) => 'enable'),
			'type' => 'checkbox',
			'std' => '',
		) ,

		array(
			"type" => "iconfonts",
			"heading" => esc_html__( "Icon", 'deep' ),
			"param_name" => "icon",
			'value'=>'',
			"description" => esc_html__( "Show an icon on the left side of the sermon title.", 'deep'),
			"dependency" => array('element'=>'type','value'=>array('minimal')),
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

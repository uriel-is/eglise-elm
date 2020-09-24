<?php
vc_map( array(
	'name' 			=> 'Single Post From Blog',
	'base' 			=> 'postblog',
	"icon" 			=> "webnus-postfromblog",
	"description" 	=> "Single Post",
	'category' 		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'	  	=> array(
		array(
			'heading'	  => esc_html__( 'Type', 'deep' ),
			'description' => esc_html__( 'You can choose Single Post types.', 'deep'),
			'type'		  => 'dropdown',
			'param_name'  => 'type',
			'value'		  => array(
				esc_html__( 'Type 1', 'deep' ) => '1',
				esc_html__( 'Type 2', 'deep' ) => '2',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Post ID', 'deep' ),
			'param_name' => 'post',
			'value'=>'',
			'description' => esc_html__( 'Pick up the ID & follow this instruction: admin panel > posts > ID column.', 'deep')
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Category', 'deep' ),
            'param_name'    => 'hide_cat',
            'std'           => 'false',
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Date', 'deep' ),
            'param_name'    => 'hide_date',
            'std'           => 'false',
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Open link in a new tab? ', 'deep' ),
            'description'   => __( 'Add Target = _blank', 'deep'),
            'param_name'    => 'link_target',
            'std'           => 'false',
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
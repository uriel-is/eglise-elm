<?php
vc_map( array(
	"name"			=>"Tooltip",
	"base"			=> "tooltip",
	"description"	=> "Tooltip",
	"category"		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	"icon"			=> "webnus-tooltip",
	"params"		=> array(
		array(
			"type"			=> "textarea",
			"heading"		=> esc_html__( "Tooltip Text", 'deep' ),
			"param_name"	=> "tooltiptext",
			"value"			=> '',
			"description"	=> esc_html__( "Tooltip text goes here", 'deep')
		),
		array(
			'type'			=> "textarea",
			"heading"		=> esc_html__( 'Tooltip Content', 'deep' ),
			"param_name"	=> 'tooltip_content',
			"value"			=>'',
			"description" 	=> esc_html__( "Contet Goes Here", 'deep')
		),
		array(
			'type' 			=> "textfield",
			"heading" 		=> esc_html__( 'Conten URL', 'deep' ),
			"param_name" 	=> 'tooltip_link',
			"value"			=>'',
			"description" 	=> esc_html__( "Please enter content url", 'deep')
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
));
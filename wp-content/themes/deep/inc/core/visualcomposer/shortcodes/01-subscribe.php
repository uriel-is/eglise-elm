<?php
vc_map( array(
	'name'		 	=>'Subscribe',
	'base' 			=> 'subscribe',
	"icon" 			=> "webnus-subscribe",
	"description" 	=> "Subscribe box",
	'category' 		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		 => array(
		array(
			"type" 			=> "dropdown",
			"heading" 		=> esc_html__( "Type", 'deep' ),
			"param_name"	=> "type",
			"value" 		=> array(
				"Boxed"		=>"boxed",
				"Bar"		=>"bar1",
				"Flat"		=>"flat",
				"Wish"		=> "wish",
				"Modern"	=> "modern",
				"Bordered"  => "bordered",
				"Rounded"  	=> "rounded",
				"Full"		=> "full",
			),
			"description" 	=> esc_html__( "Select style type", 'deep')
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'Title', 'deep' ),
			'param_name' 	=> 'box_title',
			'value'			=>'',
			'description'	=> esc_html__( 'Subscribe title', 'deep'),
			'dependency'	=> array(
				'element'	 => 'type',
				'value'   	 => array( 'boxed', 'bar1', 'flat' , 'bordered' ),
			),	
		),						
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'input text', 'deep' ),
			'param_name' 	=> 'input_text',
			'value'			=>'YOUR E-MAIL',
			'description' 	=> esc_html__( 'input box text', 'deep'),
			'dependency'	=> array(
				'element' 	 => 'type',
				'value'   	 => array( 'boxed', 'bar1', 'flat', 'wish', 'modern' , 'bordered' , 'rounded' , 'full' ),
			),	
		),
		array(
			"type"			=> 'textfield',
			"param_name"	=> "box_text",
			"heading"		=> esc_html__('Subscribe Text', 'deep'),
			"value"			=> "",
			"description"   => esc_html__( "Subscribe content", 'deep'),	
			'dependency'  	=> array(
				'element' 	 => 'type',
				'value'   	 => array( 'boxed', 'bar1', 'flat' , 'bordered' ),
			),
		),
		array(
			"type" 			=> "dropdown",
			'heading' 		=> esc_html__( 'Email Service', 'deep' ),
			'param_name'    => 'service',
			"value" 		=> array(
				"Feedburner" =>"feedburner",
				"Mailchimp"	 =>"mailchimp",
			),
			'description' 	=> esc_html__( 'FeedBurner or MailChimp', 'deep')
		), 
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'FeedBurner ID', 'deep' ),
			'param_name' 	=> 'feedburner_id',
			'value'			=>'',
			'description' 	=> esc_html__( 'Feedburner ID', 'deep'),
			'dependency'	=> array( 'element' => 'service', 'value' => 'feedburner' ),
		),	
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'MailChimp URL', 'deep' ),
			'param_name'	=> 'mailchimp_url',
			'value'			=>'',
			'description' 	=> esc_html__( 'Mailchimp form action URL', 'deep'),
			'dependency'	=> array( 'element' => 'service', 'value' => 'mailchimp' ),
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
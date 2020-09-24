<?php
vc_map( array(
        'name' 			=>'Schedule',
        'base' 			=> 'schedule',
		"description" 	=> "Schedule",
        'category' 		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'icon'			=> 'webnus-schedule',
        'params' 		=> array(
			array(
				'type'           => 'textfield',
				'heading'        => esc_html__( 'Start Text', 'deep' ),
				'param_name'     => 'start_date',
				'value'          => 'Feb, 2018',
			),
			array(
				'type'           => 'textfield',
				'heading'        => esc_html__( 'End Text', 'deep' ),
				'param_name'     => 'end_date',
				'value'          => 'May , 2018',
			),
			array(
				"type" 			 => "checkbox",
				"heading" 		 => esc_html__( "Dark Background (White color)", 'deep' ),
				"param_name" 	 => "dark_bg",
				"value" 		 => array(
					esc_html__( "Yes", 'deep' ) 	=> 'yes',
				),
			),
        	array(
				'heading'		 => esc_html__( 'Schedule Item', 'deep' ),
				'type'			 => 'param_group',
				'param_name'	 => 'schedule_item',
				'params'		 => array(
					array(
						'type'           => 'textfield',
						'heading'        => esc_html__( 'Time', 'deep' ),
						'param_name'     => 'item_time',
						'value'          => 'Feb 2017 - Present',
					),
					array(
						'type'           => 'textfield',
						'heading'        => esc_html__( 'Title', 'deep' ),
						'param_name'     => 'item_title',
						'value'          => 'Webnus Company',
					),
					array(
						'type'           => 'textfield',
						'heading'        => esc_html__( 'Presenter name', 'deep' ),
						'param_name'     => 'item_presenter_name',
						'value'          => 'Senior Mobile Developer',
					),
					array(
						'type' 			 => 'attach_image',
						'heading' 		 => esc_html__( 'Presenter Image', 'deep' ),
						'param_name' 	 => 'item_presenter_image',
						'value'			 => '',
					),
					array(
						'type'           => 'textfield',
						'heading'        => esc_html__( 'Location', 'deep' ),
						'param_name'     => 'item_location',
						'value'          => 'Redmond, WA, USA',
					),					
				),
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
<?php
vc_map( array(
        'name' =>'Roadmap',
        'base' => 'roadmap',
		"description" => "Roadmap",
        'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
		'icon'			=> 'webnus-roadmap',
        'params' => array(
        	array(
				'heading'		=> esc_html__( 'Roadmap Item', 'deep' ),
				'type'			=> 'param_group',
				'param_name'	=> 'roadmap_item',
				'params'		=> array(
					array(
						'type'           => 'textfield',
						'heading'        => esc_html__( 'Mileston Title', 'deep' ),
						'param_name'     => 'item_title',
						'value'          =>'',
						'description'    => esc_html__( 'Type your title, for example: Feb 5, 2018', 'deep' ),
					),
					array(
						'type'           => 'checkbox',
						'heading'        => esc_html__( 'Past Mileston', 'deep' ),
						'param_name'     => 'item_past',
						'value'          =>'Past',
						'description'    => esc_html__( 'Check it for past milestons', 'deep' ),
					),
					array(
						'type'           => 'checkbox',
						'heading'        => esc_html__( 'Selected Mileston', 'deep' ),
						'param_name'     => 'item_select',
						'value'          =>'Select',
						'description'    => esc_html__( 'Check it for show it different', 'deep' ),
					),						
					array(
						'type'           => 'textarea',
						'heading'        => esc_html__( 'Mileston Description', 'deep' ),
						'param_name'     => 'item_desc',
						'description'    => esc_html__( 'Type your description here', 'deep'),
						'value'			 => '',
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
<?php
vc_map( array(
        'name' =>'Callout',
        'base' => 'callout',
		"description" => "Call to action + button",
        "icon" => "webnus-callout",
        'params'=>array(
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'deep' ),
					'param_name' => 'title',
					'value'=>'',
					'description' => esc_html__( 'Enter the Callout title', 'deep')
			),
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Text', 'deep' ),
					'param_name' => 'button_text',
					'value'=>'',
					'description' => esc_html__( 'Callout Button text', 'deep')
			),
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Link', 'deep' ),
					'param_name' => 'button_link',
					'value'=>'',
					'description' => esc_html__( 'Button Link URL', 'deep')
			),
			array(
				'type'          => 'checkbox',
				'heading'       => __( 'Open link in a new tab? ', 'deep' ),
				'description'   => __( 'Add Target = _blank', 'deep'),
				'param_name'    => 'link_target',
				'std'           => 'false',
			),
			array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Content Text', 'deep' ),
					'param_name' => 'text',
					'value' => '',
					'description' => esc_html__( 'Enter the Callout content text', 'deep')
			),
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
		'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
        
    ) );


?>
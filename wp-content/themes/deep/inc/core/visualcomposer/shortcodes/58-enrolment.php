<?php
vc_map( array(
	'name'			=> esc_html__( 'Enrolment', 'deep' ),
	'base'			=> 'deep-enrolment',
	'description'	=> esc_html__( 'Lifterlms Enrolment', 'deep' ),
	'icon'			=> 'webnus-enrolment',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(
		array(
			'heading'		=> esc_html__( 'Enrolment', 'deep' ),
			'type'			=> 'param_group',
			'param_name'	=> 'enrolment_item',
			'params'		=> array(

				array(
					'heading'		=> esc_html__( 'Title', 'deep' ),
					'type'			=> 'textfield',
					'param_name'	=> 'enrolment_title',
					'value'			=> '',
					'admin_label'	=> true,
				),

				array(
					'heading'		=> esc_html__( 'Content', 'deep' ),
					'type'			=> 'textarea',
					'param_name'	=> 'enrolment_content',
					'value'			=> '',
				),

				array(
					'heading'		=> esc_html__( 'Number', 'deep' ),
					'type'			=> 'textfield',
					'param_name'	=> 'enrolment_num',
					'value'			=> '',
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
) ) );
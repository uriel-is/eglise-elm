<?php
vc_map( array(
	'name'			=> 'Blockquote',
	'base'			=> 'block-quote',
	'description'	=> esc_html__( 'blockquote', 'deep' ),
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'icon'			=> 'webnus-block-quote',
	'params'		=> array(
		array(
			'type'				=> 'dropdown',
			'heading'			=> esc_html__( 'Type', 'deep' ),
			'param_name'		=> 'type',
			'value'				=> array(
				'1'	=> '1',		
				'2'	=> '2',		
			),
			'description'		=> esc_html__( 'Select shortcode type', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
		),
		array(
			'type'				=> 'attach_image',
			'heading'			=> esc_html__( 'Background Image', 'deep' ),
			'param_name'		=> 'background_image',
			'value'				=>'',
			'description'		=> esc_html__( 'Select an image for background image', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop paddingbottom',
			'dependency'	=> array( 'element' => 'type', 'value' => '1' ),
		),
		array(
			'type'				=> 'attach_image',
			'heading'			=> esc_html__( 'Author Image', 'deep' ),
			'param_name'		=> 'author_image',
			'value'				=>'',
			'description'		=> esc_html__( 'Select an image for author image recommended size ( 50px X 50px )', 'deep'),
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop paddingbottom',
		),
		array(
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Background Image alt', 'deep' ),
			'param_name'		=> 'background_image_alt',
			'value'				=>'',
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop paddingbottom',
			'dependency'	=> array( 'element' => 'type', 'value' => '1' ),
		),
		array(
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Author Image alt', 'deep' ),
			'param_name'		=> 'author_image_alt',
			'value'				=>'',
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop paddingbottom',
		),
		array(
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Author name', 'deep' ),
			'param_name'		=> 'author_name',
			'value'				=>'',
			'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
		),
		array(
			'type'				=> 'textarea',
			'heading'			=> esc_html__( 'Content', 'deep' ),
			'param_name'		=> 'block_content',
			'value'				=>'',
			'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
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
	)

) );

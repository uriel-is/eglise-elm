<?php
vc_map( array(
	'name'				=> esc_html__( 'Our Process', 'deep' ),
	'base'				=> 'our_process',
	'description'	=> esc_html__( 'Our Process', 'deep' ),
	'icon'				=> 'webnus-ourprocess',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'			=> array(

		array(
			'type'				=> 'dropdown',
			'heading'			=> esc_html__('Type','deep'),
			'param_name'	=> 'type',
			'value' => array(
				'Type 1' => '1',
				'Type 2' => '2',
				'Type 3' => '3'
			),
			'description' => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
		),
		// type 1
		array(
			'heading'			=> esc_html__( 'Process Item', 'deep' ),
			'description'	=> esc_html__( 'Enter process items for our process - title, content and icon.', 'deep' ),
			'type'				=> 'param_group',
			'param_name'	=> 'process_item',
			'dependency'	=> array( 'element' => 'type', 'value' => '1' ),
			'params' => array(
				array(
					'heading'			=> esc_html__( 'Process Title', 'deep' ),
					'type'				=> 'textfield',
					'param_name'	=> 'process_title',
					'value'				=> '',
					'admin_label'	=> true,
				),
				array(
					'heading'			=> esc_html__( 'Process Content', 'deep' ),
					'type'				=> 'textarea',
					'param_name'	=> 'process_content',
					'value'				=> '',
				),
				array(
					'heading'			=> esc_html__( 'Line number ( or text )', 'deep' ),
					'type'				=> 'textfield',
					'param_name'	=> 'line_flag',
					'value'				=> '',
				),
				array(
					'type'				=> 'iconfonts',
					'heading'			=> esc_html__( 'Icon', 'deep' ),
					'param_name'	=> 'icon_fontawesome',
					'value'				=> 'wn-fa wn-fa-adjust', // default value to backend editor admin_label
					'settings'		=> array(
						// default true, display an "EMPTY" icon?
						'emptyIcon'		=> false,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						'iconsPerPage'	=> 4000,
					),
					'description'	=> esc_html__( 'Select icon from library.', 'deep' ),
				),
			),
		),
		// type 2
		array(
			'heading'			=> esc_html__( 'Process Item', 'deep' ),
			'description'	=> esc_html__( 'Enter process items for our process - title, content and icon.', 'deep' ),
			'type'				=> 'param_group',
			'param_name'	=> 'process_item_t2',
			'dependency'	=> array( 'element' => 'type', 'value' => '2' ),
			'params' => array(
				array(
					'heading'			=> esc_html__( 'Process Title', 'deep' ),
					'type'				=> 'textfield',
					'param_name'	=> 'process_title_t2',
					'value'				=> '',
					'admin_label'	=> true,
				),
				array(
					'heading'			=> esc_html__( 'Process Content', 'deep' ),
					'type'				=> 'textarea',
					'param_name'	=> 'process_content_t2',
					'value'				=> '',
				),
				array(
					'heading'			=> esc_html__( 'Line number ( or text )', 'deep' ),
					'type'				=> 'textfield',
					'param_name'	=> 'line_flag_t2',
					'value'				=> '',
				),
			),
		),

		// type 3
		array(
			'heading'		=> esc_html__( 'Process Item', 'deep' ),
			'description'	=> esc_html__( 'Enter process items for our process - title, content and icon.', 'deep' ),
			'type'			=> 'param_group',
			'param_name'	=> 'process_item_t3',
			'dependency'	=> array( 'element' => 'type', 'value' => '3' ),
			'params' => array(
				array(
					'heading'			=> esc_html__( 'Process Top Title', 'deep' ),
					'type'				=> 'textfield',
					'param_name'	=> 'process_title_t3',
					'value'				=> '',
					'admin_label'	=> true,
				),
				array(
					'heading'			=> esc_html__( 'Process Title', 'deep' ),
					'type'				=> 'textfield',
					'param_name'	=> 'process_title_top_t3',
					'value'				=> '',
					'admin_label'	=> true,
				),
				array(
					'group'				=> esc_html__( 'Title Styling', 'deep' ),
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Title color', 'deep'),
					'param_name'		=> 'title_color',
					'value'				=> '',
					'description'		=> esc_html__( 'Select title color (leave blank for default color)', 'deep'),
					'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
				),
				array(
					'heading'			=> esc_html__( 'Process Content', 'deep' ),
					'type'				=> 'textarea',
					'param_name'	=> 'process_content_t3',
					'value'				=> '',
				),
				array(
					'group'				=> esc_html__( 'Content Styling', 'deep' ),
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Content color', 'deep'),
					'param_name'		=> 'content_color',
					'value'				=> '',
					'description'		=> esc_html__( 'Select Content color (leave blank for default color)', 'deep'),
					'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
				),
				array(
					'type'           => 'textfield',
					'heading'        => esc_html__( 'Link URL', 'deep' ),
					'param_name'     => 'link_url',
					'value'          =>'#',
					'description'    => esc_html__( 'Enter the link url. Example: http://yourdomain.com', 'deep'),
				),
				array(
					'type'           => 'textfield',
					'heading'        => esc_html__( 'button', 'deep' ),
					'param_name'     => 'teaser_btn',
					'value'          => '',
					'description'    => esc_html__( 'Enter your text here', 'deep'),
					),
				),
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
) ) );

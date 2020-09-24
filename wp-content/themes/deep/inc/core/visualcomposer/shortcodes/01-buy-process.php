<?php
vc_map( array(
	'name'			=> esc_html__( 'Buy Process', 'deep' ),
	'base'			=> 'buy_process',
	'description'	=> esc_html__( 'Buy Process', 'deep' ),
	'icon'			=> 'webnus-ourprocess',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(
		array(
			'heading'		=> esc_html__( 'Process Item', 'deep' ),
			'description'	=> esc_html__( 'If you want this element cover whole page width, please add it inside of a full row. For this purpose, click on edit button of the row and set Select Row Type on Full Width Row.', 'deep' ),
			'type'			=> 'param_group',
			'param_name'	=> 'process_item',
			'params'		=> array(

				array(
					'heading'		=> esc_html__( 'Process Title', 'deep' ),
					'type'			=> 'textfield',
					'param_name'	=> 'process_title',
					'value'			=> '',
					'admin_label'	=> true,
				),

				array(
					'heading'		=> esc_html__( 'Process Content', 'deep' ),
					'type'			=> 'textarea',
					'param_name'	=> 'process_content',
					'value'			=> '',
				),

				array(
					'heading'		=> esc_html__( 'Line number ( or text )', 'deep' ),
					'type'			=> 'textfield',
					'param_name'	=> 'line_flag',
					'value'			=> '',
				),

				array(
					'heading'		=> esc_html__( 'Porcess style', 'deep' ),
					'type'			=> 'dropdown',
					'param_name'	=> 'process_style',
					'value'			=> array(
						esc_html__( 'Default Porcess', 'deep' )	 => 'default',
						esc_html__( 'Featured Porcess', 'deep' ) => 'featured',
					),
					'admin_label'	=> true,
				),

				array(
					'type'			=> 'iconfonts',
					'heading'		=> esc_html__( 'Icon', 'deep' ),
					'param_name'	=> 'icon_fontawesome',
					'value'			=> 'wn-fa wn-fa-adjust',
					'settings'		=> array(
						'emptyIcon'		=> false,
						'iconsPerPage'	=> 4000,
					),
					'description'	=> esc_html__( 'Select icon from library.', 'deep' ),
				),

			),
		),
		
		array(
			'heading'		=> esc_html__( 'Background Color', 'deep' ),
			'type'			=> 'colorpicker',
			'param_name'	=> 'bg_color',
			'value'			=> '',
			'description'	=> esc_html__( 'Select custom background color', 'deep' ),
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
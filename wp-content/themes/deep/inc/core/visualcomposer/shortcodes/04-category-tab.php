<?php
vc_map( array(
	'name'			=> esc_html__( 'Category Tab', 'deep' ),
	'base'			=> 'category-tab',
	'description'	=> esc_html__( 'category tab', 'deep' ),
	'icon'			=> 'webnus-category-tab',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(
		array(
			'type'				=> 'category_param',
			'param_name' 		=> 'param_category',
			'value' 			=> '',
		),	
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Sort order', 'deep' ),
			'param_name'	=> 'sort_order',
			'value'			=> array(
				'Date'					=> 'date',
				'Title'					=> 'title',
				'Popular Post'			=> 'comment_count',
				'Recent Posts'			=> 'latest',
				'Random Post'			=> 'rand',
				'Last Modified Post'	=> 'modified',
			),
			'std'				=> 'date',
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop paddingbottom',
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Post Category', 'deep' ),
            'param_name'    => 'hide_cat',
			'std'           => 'false',
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Post Date', 'deep' ),
            'param_name'    => 'hide_date',
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
		
	)
) );
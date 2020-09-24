<?php
vc_map( array(
	'name'			=> esc_html__( 'Magazine', 'deep' ),
	'base'			=> 'magazine',
	'description'	=> esc_html__( 'magazine', 'deep' ),
	'icon'			=> 'webnus-magazine',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(

		array(
			'type'				=> 'category_param',
			'param_name' 		=> 'param_category',
			'value' 			=> '',
			'edit_field_class'	=> 'vc_col-sm-12 vc_column paddingtop paddingbottom',
		),

		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Title', 'deep' ),
			'param_name'	=> 'post_title',
			'value'			=> '',
			'edit_field_class' => 'vc_col-sm-6 vc_column paddingtop paddingbottom',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Title URL', 'deep' ),
			'param_name'	=> 'post_url',
			'value'			=> '',
			'edit_field_class' => 'vc_col-sm-6 vc_column paddingtop paddingbottom',

		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_html__( 'Title border color', 'deep' ),
			'param_name'	=> 'post_title_border_color',
			'value'			=> '',
			'edit_field_class' => 'vc_col-sm-6 vc_column paddingtop paddingbottom',
		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_html__( 'Title color', 'deep' ),
			'param_name'	=> 'post_title_color',
			'value'			=> '',
			'edit_field_class' => 'vc_col-sm-6 vc_column paddingtop paddingbottom',
		),

		// Type
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Type', 'deep' ),
			'param_name'	=> 'type',
			'value'			=> array(
				'1'	=> '1',		
				'2'	=> '2',		
				'3'	=> '3',		
			),
			'description'	=> esc_html__( 'Select shortcode type', 'deep'),
			'std'			=> '1'
		),
		
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Sort order', 'deep' ),
			'param_name'	=> 'sort_order',
			'value'			=> array(
				esc_html__( 'Date', 'deep' )				=> 'date',
				esc_html__( 'Title', 'deep' )				=> 'title',
				esc_html__( 'Popular Post', 'deep' )		=> 'comment_count',
				esc_html__( 'Recent Posts', 'deep' )		=> 'latest',
				esc_html__( 'Random Post', 'deep' )			=> 'rand',
				esc_html__( 'Last Modified Post', 'deep' )	=> 'modified',
			),
			'std'			=> 'date',
		),
		

		array(
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Number of show post', 'deep' ),
			'param_name'		=> 'post_number',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop paddingbottom',
			'std'				=> '8',
		),

		array(
			'type'				=> 'textfield',
			'heading'			=> esc_html__( 'Post pre page', 'deep' ),
			'param_name'		=> 'post_prepage',
			'value'				=> '',
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop paddingbottom',
			'std'				=> '4',
		),
		// Type
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Reviews', 'deep' ),
			'param_name'	=> 'reviews',
			'value'			=> array(
				esc_html__( 'Hide', 'deep' )	=> 'hide',
				esc_html__( 'Show', 'deep' )	=> 'show',
			),
			'std'			=> 'show'
		),
		array(
			'type'				=> 'checkbox',
			'heading'			=> esc_html__( 'Pagination', 'deep' ),
			'param_name'		=> 'pagination',
			'value'				=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
			'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop paddingbottom',
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Category', 'deep' ),
            'param_name'    => 'hide_cat',
            'std'           => 'false',
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Date', 'deep' ),
            'param_name'    => 'hide_date',
            'std'           => 'false',
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Author', 'deep' ),
            'param_name'    => 'hide_author',
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
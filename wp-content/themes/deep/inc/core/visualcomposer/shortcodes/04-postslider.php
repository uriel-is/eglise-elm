<?php
$categories = array();
$categories = get_categories();
$category_slug_array = array('');
$category_name_array = array('');
foreach( $categories as $category ) {
	$category_slug_array[] = $category->slug;
	$category_name_array[] = $category->slug;
}
$category_array  = array_combine($category_slug_array, $category_name_array);

vc_map( array( 
	'name'			=> 'Post Slider',
	'base'			=> 'postslider',
	'description'	=> 'Wordpress Post Slider',
	'icon'			=> 'webnus-postslider',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Type', 'deep' ),
			'param_name'	=> 'type',
			'value' 		=> array(
				'Type 1'	=> '1',
				'Type 2'	=> '2',
				'Type 3'	=> '3',
			),
			'description' => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
			'std'			=> '1'
		),
		array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'Number of Show Slide', 'deep' ),
			'param_name' 	=> 'how_number_slide',
			'value' 		=> '',
			'description' 	=> esc_html__( 'Number of Show Slide (Please set number ) Default #2', 'deep'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'category', 'deep' ),
			'param_name'	=> 'category',
			'value'			=> $category_array,
			'description'	=> esc_html__( 'Select shortcode type', 'deep'),
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
	),

) );
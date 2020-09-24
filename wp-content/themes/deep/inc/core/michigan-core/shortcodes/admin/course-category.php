<?php
add_action( 'vc_before_init', 'michigan_course_category_map' );
function michigan_course_category_map() {
	// get course categoies
	$cat_args = array(
		'type'			=> 'post',
		'child_of'		=> 0,
		'parent'		=> '',
		'orderby'		=> 'id',
		'order'			=> 'ASC',
		'hide_empty'	=> false,
		'hierarchical'	=> 1,
		'exclude'		=> '',
		'include'		=> '',
		'number'		=> '',
		'taxonomy'		=> 'course_cat',
		'pad_counts'	=> false,
	);
	$categories = get_categories( $cat_args );

	// get category name
	$webnus_course_categories	= array();
	$webnus_course_categories[]	= esc_attr__( 'All Courses', 'deep' );
	foreach( $categories as $category ) :
		$webnus_course_categories[] = $category->slug;
	endforeach;

	vc_map( array(
		'name'			=> esc_attr__( 'Course Category', 'deep' ),
		'base'			=> 'course-category',
		'icon'			=> 'webnus-course-category',
		'description'	=> esc_attr__( 'Show Single Course Category', 'deep' ),
		'category'		=> esc_attr__( 'Webnus Shortcodes', 'deep' ),
		'params'		=> array(

			array(
				'heading'		=> esc_attr__( 'Type', 'deep' ),
				'description'	=> esc_attr__( 'You can choose from these pre-designed types', 'deep' ),
				'type'			=> 'dropdown',
				'param_name'	=> 'type',
				'value'			=> array(
					esc_attr__( 'Type 1', 'deep' )	=> '1',
					esc_attr__( 'Type 2', 'deep' )	=> '2',
				),
			),

			array(
				'heading'		=> esc_attr__( 'Border Bottom', 'deep' ),
				'description'	=> esc_attr__( 'Show Border Bottom ?', 'deep' ),
				'type'			=> 'checkbox',
				'param_name'	=> 'border_bottom',
				'value'			=> array(
					esc_attr__( 'Yes', 'deep' ) => true
				),
				'std'			=> true,
				'dependency'	=> array( 'element' => 'type', 'value' => '2' ),
			),

			array(
				'heading'		=> esc_attr__( 'Category', 'deep' ),
				'description'	=> wp_kses( __( 'Select specific category<br><span style="color: red; font-weight: bold;">Note: If you do not select any category, you\'ll have a link to "All Courses" page </span>', 'deep' ), array( 'br' => array(), 'span' => array( 'style' => array() ) ) ),
				'param_name'	=> 'category',
				'type'			=> 'dropdown',
				'value'			=> $webnus_course_categories,
				'save_always'	=> true,
			),

		),
	) ); // end vc_map
} // end michigan_course_category_map fun
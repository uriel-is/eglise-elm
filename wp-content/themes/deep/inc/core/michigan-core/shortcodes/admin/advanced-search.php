<?php
vc_map( array(
	'name'			=> esc_attr__( 'Advanced Search', 'deep' ),
	'base'			=> 'taxonomy-search',
	'icon'			=> 'webnus-taxonomy-search',
	'description'	=> esc_attr__( 'Advanced Search', 'deep' ),
	'category'		=> esc_attr__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(

		array(
			'heading'		=> esc_attr__( 'Type', 'deep' ),
			'description'	=> esc_attr__( 'You can choose from these pre-designed types', 'deep' ),
			'type'			=> 'dropdown',
			'param_name'	=> 'type',
			'value'			=> array(
				esc_attr__( 'Courses Search', 'deep' )	 => 'course',
				esc_attr__( 'Events Serach', 'deep' )	 => 'tribe_events',
				esc_attr__( 'Excursion Search', 'deep' ) => 'excursion',
			),
		),

		array(
			'heading'		=> esc_attr__( 'Category Field', 'deep' ),
			'description'	=> esc_attr__( 'Show category field ?', 'deep' ),
			'type'			=> 'checkbox',
			'param_name'	=> 'category_field',
			'value'			=> array(
				esc_attr__( 'Yes', 'deep' ) => true
			),
			'std'			=> true,
		),

		array(
			'heading'		=> esc_attr__( 'Instructor Field', 'deep' ),
			'description'	=> esc_attr__( 'Show instructor field ?', 'deep' ),
			'type'			=> 'checkbox',
			'param_name'	=> 'instructor_field',
			'value'			=> array(
				esc_attr__( 'Yes', 'deep' ) => true
			),
			'std'			=> true,
			'dependency'	=> array( 'element' => 'type', 'value' => 'course' ),
		),

		array(
			'heading'		=> esc_attr__( 'Date Field', 'deep' ),
			'description'	=> esc_attr__( 'Show date field ?', 'deep' ),
			'type'			=> 'checkbox',
			'param_name'	=> 'date_field',
			'value'			=> array(
				esc_attr__( 'Yes', 'deep' ) => true
			),
			'std'			=> true,
			'dependency'	=> array( 'element' => 'type', 'value' => array( 'tribe_events', 'excursion' ) ),
		),

	),
) ); // end vc_map
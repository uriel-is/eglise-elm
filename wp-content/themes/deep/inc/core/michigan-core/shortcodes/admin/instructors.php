<?php
vc_map( array(
    'name' =>'Courses Instructors',
    'base' => 'instructors',
    "icon" => "webnus-course-instructors",
	"description" => "Show Courses Instructors",
    'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
    'params' => array(				
		array(
			"type" => "dropdown",
			"heading" => esc_html__( "Instructors Type:", 'deep' ),
			"param_name" => "view",
			"value" => array(
				"New Instructors"=>"1",
				"Popular Instructors"=>"2",
				"Top Rated Instructorsr"=>"3",
				"Most Active Instructors"=>"4",
			)
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Instructors Count', 'deep' ),
			'param_name' => 'count',
			'value' => '',
			'description' => esc_html__( 'Number of instructor(s) to show.', 'deep')
		),
		array(
			'heading' => esc_html__('Page Navigation', 'deep') ,
			'description' => wp_kses( __('Enable page navigation.<br/><br/>', 'deep'), array( 'br' => array() ) ),
			'param_name' => 'page',
			'value' => array( esc_html__( 'Enable', 'deep' ) => 'enable'),
			'type' => 'checkbox',
			'std' => '',
		),
		array(
			"type"			=> "checkbox",
			"heading"		=> esc_html__( "Do you want to display this element as a carousel (slideshow)?", 'deep' ),
			"param_name"	=> "display_as_carousel",
			"value"			=> array(
				esc_html__( "Yes", 'deep' )	=> '1',
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Instructors items per view', 'deep' ),
			'param_name'	=> 'carousel_items',
			'value'			=> '3',
			'std'			=> '3',
			'dependency'	=> array( 'element' => 'display_as_carousel', 'value' => '1' ),
		),
	),
) );
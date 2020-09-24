<?php
$categories = array();
$categories = get_categories();
$category_slug_array = array('');
foreach($categories as $category)
{
	$category_slug_array[] = $category->slug;
}

vc_map( array(
        'name' =>'Webnus Courses',
        'base' => 'webnus_courses',
        "icon" => "webnus-courses",
		"description" => "Show Latest Or Popular Courses",
        'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
        'params' => array(
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Type", 'deep' ),
							"param_name" => "type",
							"value" => array(
								"List"		=>"list",
								"Grid"		=>"grid",
								"Modern"	=>"modern",
								"Table"		=>"table",
								"Carousel"	=>"carousel",
								
							),
							"description" => esc_html__( "You can choose from these pre-designed types.", 'deep')
						),
						
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Order by", 'deep' ),
							"param_name" => "sort",
							"value" => array(
								"Most Recent"=>"",
								"Most Popular"=>"view",
							),
							"description" => esc_html__( "Recent Or Popular", 'deep')
						),
					
						array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Post Count', 'deep' ),
						'param_name' => 'count',
						'value' => '',
						'description' => esc_html__( 'Number of course(s) to show.', 'deep')
						),

						array(
						'type' => 'textfield',
						'description' => esc_html__( 'Number of course(s) to show.', 'deep'),
						'heading' => esc_html__( 'Carousel Item', 'deep' ),
						'param_name' => 'item_carousel',
						'value' => '3',
						"dependency" => array( 'element'=>'type', 'value' => array( 'carousel', ) ),
						),
						
						array(
							'heading' => esc_html__('Page Navigation', 'deep') ,
							'description' => wp_kses( __('Enable page navigation.<br/><br/>', 'deep'), array( 'br' => array() ) ),
							'param_name' => 'page',
							'value' => array( esc_html__( 'Enable', 'deep' ) => 'enable'),
							'type' => 'checkbox',
							'std' => '',
							"dependency" => array('element'=>'type','value'=>array('list','grid','modern','table',)),
						) ,
			
						array(
							"type" => "iconfonts",
							"heading" => esc_html__( "Icon", 'deep' ),
							"param_name" => "icon",
							'value'=>'',
							"description" => esc_html__( "Show an icon on the left side of the course title.", 'deep'),
							"dependency" => array('element'=>'type','value'=>array('minimal')),
						),			
					
						
					),      
		) );
?>
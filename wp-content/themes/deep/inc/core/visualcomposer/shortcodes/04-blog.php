<?php
$categories = array();
$categories = get_categories();
$category_slug_array = array('');
foreach($categories as $category)
{
	$category_slug_array[] = $category->slug;
}
vc_map( array(
	'name'			=> 'Blog',
	'base'			=> 'blog',
	'description'	=> 'Blog Loop',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'icon'			=> 'webnus-blog',
	'params'		=>array(
		array(
			'type'						=> 'dropdown',
			'heading'					=> esc_html__( 'Type', 'deep' ),
			'param_name'				=> 'type',
			'value'						=> array(
				'Large Posts ( Default )'					=> '1',
				'List Posts ( Default )'					=> '2',							
				'Grid Posts ( Default )'					=> '3',							
				'First Large then List ( Default )'			=> '4',							
				'First Large then Grid ( Default )'			=> '5',			
				'Large Posts ( Personal blog )'				=> '6',
				'List Posts ( Personal blog )'				=> '7',							
				'Grid Posts ( Personal blog )'				=> '8',							
				'First Large then List ( Personal blog )'	=> '9',							
				'First Large then Grid ( Personal blog )'	=> '10',
				'Large Posts ( Magazine )'					=> '11',
				'List Posts ( Magazine )'					=> '12',							
				'Grid Posts ( Magazine )'					=> '13',							
				'First Large then List ( Magazine )'		=> '14',							
				'First Large then Grid ( Magazine )'		=> '15',							
				'Masonry'									=> '16',		
				'Timeline'									=> '17',
				'Large Posts ( Minimal )'					=> '18',
				'List Posts ( Minimal )'					=> '19',
				'Grid Posts ( Minimal )'					=> '20',
				'First Large then List ( Minimal )'			=> '21',
				'First Large then Grid ( Minimal )'			=> '22',
			),						
			'description' 				=> esc_html__( 'Blog type layout', 'deep')
		),
		array(
			'type'		 	=> 'dropdown',
			'heading'	 	=> esc_html__( 'Sidebar', 'deep' ),
			'param_name' 	=> 'sidebar',
			'value'		 	=> array(
				'None'		=> 'none',
				'Left'		=> 'left',
				'Right'		=> 'right',
				'Both'		=> 'both',
			),
			'std'			=> 'none',				
			'description' 	=> esc_html__( 'Sidebar does not support Masonry and Timeline', 'deep'),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> array( '1','2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '18' ,'19' ,'20' , '21' , '22'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Category', 'deep' ),
			'param_name'	=> 'category',
			'value'			=> $category_slug_array,
			'description'	=> esc_html__( 'Select specific category, leave blank to show all categories.', 'deep')
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Post Count', 'deep' ),
			'param_name'	=> 'count',
			'value'			=> '',
			'description'	=> esc_html__( 'Number of post(s) to show', 'deep')
		),
		array(
			'heading'		=> esc_html__( 'Order By', 'deep' ),
			'type'			=> 'dropdown',
			'param_name'	=> 'orderby',
			'value'			=> array(
				esc_html__( 'Date (Latest Posts)', 'deep' ) => 'date',
				esc_html__( 'Popular posts: Comment Count', 'deep' ) => 'comment_count',
				esc_html__( 'Popular posts: View Count', 'deep' ) => 'view_count',
				esc_html__( 'Popular Posts: Social Score', 'deep' ) => 'social_score',
			),
			'description' => esc_html__( 'If you use "Social Post Score" type, then Social Metrics Tracker plugin must be activated via Apperance > Install Plugins.', 'deep')
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Do you want load more button?', 'deep' ),
			'param_name'	=> 'loadmore_btn',
			'std'			=> 'false',
			'description'	=> esc_html__( 'if you select it, this option will add a button below the shortcode to load more post to show', 'deep'),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> array( '1','2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '17', '18' ,'19' ,'20' , '21' , '22' ),
			),
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
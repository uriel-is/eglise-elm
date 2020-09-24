<?php
$categories = array();
$categories = get_categories();
$category_slug_array = array('');
foreach($categories as $category)
{
	$category_slug_array[] = $category->slug;
}
if ( ! function_exists( 'deep_kses' )) {
	function deep_kses() {
		return array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'target' => array(),
				'style' => array(),
				'class' => array(),
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
			'span' => array(
				'class' => array(),
			),
		);
	}
}
vc_map( array(
    'name' 			=> 'Latest From Blog',
    'base' 			=> 'latestfromblog',
    "icon" 			=> "webnus-latestfromblog",
	"description"	=> "Recent posts",
    'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
    'params'		=> array(
		array(
			"type" 				=> "dropdown",
			"heading" 			=> esc_html__( "Type", 'deep' ),
			"param_name" 		=> "type",
			"value" 			=> array(
				"One"			=> "one",
				"Two"			=> "two",
				"Three"			=> "three",
				"Four"			=> "four",
				"Five"			=> "five",
				"Six"			=> "six",
				"Seven"			=> "seven",
				"Eight"			=> "eight",
				"Nine"			=> "nine",
				"Ten"			=> "ten",
				"Eleven"		=> "eleven",
				"Twelve"		=> "twelve",
				"Thirteen"		=> "thirteen",
				"Fourteen"		=> "fourteen",
				"Fifteen"		=> "fifteen",
				"Sixteen"		=> "sixteen",
				"Seventeen"		=> "seventeen",
				"Eighteen"		=> "eighteen",
				"Nineteen"		=> "ninteen",
				'Twenty'		=> 'twenty',
				'Twenty one'	=> 'twenty-one',
				'Twenty Two'	=> 'twenty-two',
				'Twenty Three'	=> 'twenty-three',
				'Twenty Four'	=> 'twenty-four',
				'Twenty Five'	=> 'twenty-five',
				'Twenty Six'	=> 'twenty-six',
				'Twenty seven'	=> 'twenty-seven',
				'Twenty Eight'	=> 'twenty-eight',
			),
			'admin_label'		=> true,
			"description" 		=> wp_kses( __( 'You can choose from these pre-designed types. <a href="http://deeptem.com/features/loops/latest-from-blogs/" target="_blank">View All Types</a>', 'deep'), deep_kses() ),
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Category', 'deep' ),
			'param_name' 	=> 'category',
			'value'			=>$category_slug_array,
			'description' 	=> esc_html__( 'Select specific category, leave blank to show all categories.', 'deep'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Title', 'deep' ),
			'param_name'	=> 'title',
			'value'			=> '',
			'dependency'	=> array(
				'element'	=>'type',
				'value'		=> array( 'twenty-four', 'twenty-five' ),
				),
		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_html__( 'Title color', 'deep' ),
			'param_name'	=> 'title_color',
			'value'			=> '',
			'dependency'	=> array(
				'element'	=>'type',
				'value'		=> array( 'twenty-four', 'twenty-five' ),
				),
			'edit_field_class'	=> 'vc_col-sm-6',
		),
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_html__( 'Title background color', 'deep' ),
			'param_name'	=> 'title_bg_color',
			'value'			=> '',
			'dependency'	=> array(
				'element'	=>'type',
				'value'		=> array( 'twenty-four', 'twenty-five' ),
				),
			'edit_field_class'	=> 'vc_col-sm-6',
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> __( 'Convert To Carousel', 'deep' ),
			'description'	=> __( 'Do you want change this type to carousel?', 'deep'),
			'param_name'	=> 'carousel',
			'std'			=> 'false',
			'dependency'	=> array(
				'element'	=>'type',
				'value'		=> array( 'twelve', 'thirteen', 'eighteen' , 'ninteen' ),
				),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Navigation', 'deep' ),
			'description'	=> esc_html__( 'please enter your desired number to show posts', 'deep'),
			'param_name'	=> 'navigation',
			"value" 			=> array(
				"Arrow"			=> "wn-lb-arrow-nav",
				"Bullet"		=> "wn-lb-bullet-nav",
				"Both"			=> "wn-lb-both-nav",
			),
			'dependency'	=> array(
				'element'	=>'carousel',
				'value'		=> 'true'
				),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Number Of Posts', 'deep' ),
			'description'	=> esc_html__( 'please enter your desired number to show posts', 'deep'),
			'param_name'	=> 'post_to_show',
			'value'			=> '',
			'dependency'	=> array(
				'element'	=>'carousel',
				'value'		=> 'true'
				),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Number Of Posts', 'deep' ),
			'description'	=> esc_html__( 'please enter your desired number to show posts', 'deep'),
			'param_name'	=> 'item_to_show',
			'value'			=> '',
			'dependency'	=> array(
				'element'	=>'type',
				'value'		=> array( 'twenty', 'twenty-five','twenty-six','twenty-seven' )
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Count in row', 'deep' ),
			'param_name'	=> 'item_carousel',
			'value'			=> '',
			'dependency'	=> array(
				'element'	=>'carousel',
				'value'		=> 'true'
				),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Reviews', 'deep' ),
			'param_name'	=> 'reviews',
			'value'			=> array(
				esc_html__( 'Hide', 'deep' )	=> 'hide',
				esc_html__( 'Show', 'deep' )	=> 'show',
			),
			'std'			=> 'show',
						'dependency'	=> array(
				'element'	=>'type',
				'value'		=> array( 'one', 'two', 'three', 'four', 'six', 'seven', 'eleven', 'twelve', 'twenty-one', ),
			),
		),
		array(
            'type'          => 'checkbox',
            'heading'       => esc_html__( 'Open link in a new tab? ', 'deep' ),
            'description'   => esc_html__( 'Add Target = _blank', 'deep'),
            'param_name'    => 'link_target',
            'std'           => 'false',
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Post Category', 'deep' ),
            'param_name'    => 'hide_cat',
			'std'           => 'false',
			'dependency'	=> array(
				'element'	=>'type',
				'value'		=> array( 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'nine', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'twenty', 'twenty-one', 'twenty-eight' ),
			),
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Post Date', 'deep' ),
            'param_name'    => 'hide_date',
			'std'           => 'false',
			'dependency'	=> array(
				'element'	=>'type',
				'value'		=> array( 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten' , 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'ninteen', 'twenty', 'twenty-one', 'twenty-two', 'twenty-four', 'twenty-five', 'twenty-seven', 'twenty-eight' ),
			),
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Post Author', 'deep' ),
            'param_name'    => 'hide_author',
			'std'           => 'false',
			'dependency'	=> array(
				'element'	=>'type',
				'value'		=> array( 'one', 'two', 'four', 'five', 'six', 'seven', 'eight', 'twelve', 'thirteen', 'sixteen', 'ninteen', 'twenty-one', 'twenty-seven' ),
			),
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Post View', 'deep' ),
            'param_name'    => 'hide_view',
			'std'           => 'false',
			'dependency'	=> array(
				'element'	=>'type',
				'value'		=> array( 'seven' ),
			),
		),
		array(
            'type'          => 'checkbox',
            'heading'       => __( 'Hide Post Comments', 'deep' ),
            'param_name'    => 'hide_comment',
			'std'           => 'false',
			'dependency'	=> array(
				'element'	=>'type',
				'value'		=> array( 'three', 'eight', 'nine', 'eleven' ),
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
		

	),
) );
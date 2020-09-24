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
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'latestfromblog' => array(
                'name'          => esc_html__( 'Latest From Blog', 'deep' ),
                'description'   => esc_html__( 'Latest From Blog', 'deep' ),
                'icon'          => 'webnus-latestfromblog',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'one'           => 'One',
                                'two'           => 'Two',
                                'three'         => 'Three',
                                'four'          => 'Four',
                                'five'          => 'Five',
                                'six'           => 'Six',
                                'seven'         => 'Seven',
                                'eight'         => 'Eight',
                                'nine'          => 'Nine',
                                'ten'           => 'Ten',
                                'eleven'        => 'Eleven',
                                'twelve'        => 'Twelve',
                                'thirteen'      => 'Thirteen',
                                'fourteen'      => 'Fourteen',
                                'fifteen'       => 'Fifteen',
                                'sixteen'       => 'Sixteen',
                                'seventeen'     => 'Seventeen',
                                'eighteen'      => 'Eighteen',
                                'ninteen'       => 'Nineteen',
                                'twenty'        => 'Twenty',
                                'twenty-one'    => 'Twenty one',
                                'twenty-two'    => 'Twenty Two',
                                'twenty-three'  => 'Twenty Three',
                                'twenty-four'   => 'Twenty Four',
                                'twenty-five'   => 'Twenty Five',
                                'twenty-six'    => 'Twenty Six',
                                'twenty-seven'  => 'Twenty Seven',
                                'twenty-eight'	=> 'Twenty Eight',
                                ),
                            'description'   => wp_kses( __( 'You can choose from these pre-designed types. <a href="http://deeptem.com/features/loops/latest-from-blogs/" target="_blank">View All Types</a>', 'deep'), deep_kses() ),
                        ),
                        array(
                            'name'          => 'category',
                            'label'         => esc_html__( 'Category', 'deep' ),
                            'type'          => 'select',
                            'options'       => $category_array,
                            'description'   => esc_html__( 'Select specific category, leave blank to show all categories.', 'deep'),
                        ),
                        array(
                            'name'          => 'title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'twenty-four', 'twenty-five' ),
                            ),
                        ),
                        array(
                            'name'          => 'title_color',
                            'label'         => esc_html__( 'Title color', 'deep' ),
                            'type'          => 'color_picker',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'twenty-four', 'twenty-five' ),
                            ),
                        ),
                        array(
                            'name'          => 'title_bg_color',
                            'label'         => esc_html__( 'Title background color', 'deep' ),
                            'type'          => 'color_picker',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'twenty-four', 'twenty-five' ),
                            ),
                        ),
                        array(
                            'name'          => 'carousel',
                            'label'         => esc_html__( 'Convert To Carousel', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value' => 'false',
                            'description' => esc_html__( 'Do you want change this type to carousel?', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'twelve', 'thirteen', 'eighteen' , 'ninteen' ),
                            ),
                        ),
                        array(
                            'name'          => 'navigation',
                            'label'         => esc_html__( 'Navigation', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'wn-lb-arrow-nav'  => 'Arrow',
                                'wn-lb-bullet-nav' => 'Bullet',
                                'wn-lb-both-nav'   => 'Both',
                            ),
                            'description'   => esc_html__( 'please enter your desired number to show posts', 'deep'),
                            'relation'      => array(
                                'parent'     => 'carousel',
                                'show_when'  => 'true',
                            ),
                        ),
                        array(
                            'name'          => 'post_to_show',
                            'label'         => esc_html__( 'Number Of Posts', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'please enter your desired number to show posts', 'deep'),
                            'relation'      => array(
                                'parent'     => 'carousel',
                                'show_when'  => 'true',
                            ),
                        ),
                        array(
                            'name'          => 'item_to_show',
                            'label'         => esc_html__( 'Number Of Posts', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'please enter your desired number to show posts', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  =>  array( 'twenty', 'twenty-six', 'twenty-seven' ),
                               
                            ),
                        ),
                        array(
                            'name'          => 'item_carousel',
                            'label'         => esc_html__( 'Count in row', 'deep' ),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'carousel',
                                'show_when'  => 'true',
                            ),
                        ),
                        array(
                            'name'          => 'hide_cat',
                            'label'         => esc_html__( 'Hide Category', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'two', 'four', 'five', 'six', 'seven', 'nine', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'eighteen', 'twenty-one', 'twenty-eight' ),
                            ),
                        ),
                        array(
                            'name'          => 'hide_date',
                            'label'         => esc_html__( 'Hide Category', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'eighteen', 'eighteen', 'twenty-one', 'twenty-two', 'twenty-four', 'twenty-seven', 'twenty-eight' ),
                            ),
                        ),
                        array(
                            'name'          => 'hide_author',
                            'label'         => esc_html__( 'Hide post author', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'twelve', 'thirteen', 'sixteen', 'eighteen', 'twenty-one', 'twenty-seven' ),
                            ),
                        ),
                        array(
                            'name'          => 'hide_view',
                            'label'         => esc_html__( 'Hide view counts', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                            ),
                            'value'         => 'false',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'seven'),
                            ),
                        ),
                        array(
                            'name'          => 'hide_comment',
                            'label'         => esc_html__( 'Hide comments count', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( 'three', 'eight', 'nine', 'eleven' ),
                            ),
                        ),
                        array(
                            'name'          => 'link_target',
                            'label'         => esc_html__( 'Open link in a new tab? ', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Add Target = _blank', 'deep'),
                        ),
                    ),
                    'Class & ID' => array(
                        array(
                            'name'          => 'shortcodeclass',
                            'label'         => esc_html__('Extra Class', 'deep'),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'shortcodeid',
                            'label'         => esc_html__('ID', 'deep'),
                            'type'          => 'text',
                        ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if
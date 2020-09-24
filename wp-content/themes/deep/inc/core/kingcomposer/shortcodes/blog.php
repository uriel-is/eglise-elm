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
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'blog' => array(
                'name'          => esc_html__( 'Blog', 'deep' ),
                'description'   => esc_html__( 'Blog Loop', 'deep' ),
                'icon'          => 'webnus-blog',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         =>  esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'   => 'Large Posts ( Default )',
                                '2'   => 'List Posts ( Default )',
                                '3'   => 'Grid Posts ( Default )',
                                '4'   => 'First Large then List ( Default )',
                                '5'   => 'First Large then Grid ( Default )',
                                '6'   => 'Large Posts ( Personal blog )',
                                '7'   => 'List Posts ( Personal blog )',
                                '8'   => 'Grid Posts ( Personal blog )',
                                '9'   => 'First Large then List ( Personal blog )',
                                '10'  => 'First Large then Grid ( Personal blog )',
                                '11'  => 'Large Posts ( Magazine )',
                                '12'  => 'List Posts ( Magazine )',
                                '13'  => 'Grid Posts ( Magazine )',
                                '14'  => 'First Large then List ( Magazine )',
                                '15'  => 'First Large then Grid ( Magazine )',
                                '16'  => 'Masonry',
                                '17'  => 'Timeline',
                                '18'	=>	'Large Posts ( Minimal )',
                                '19'	=>	'List Posts ( Minimal )',
                                '20'	=>	'Grid Posts ( Minimal )',
                                '21'	=>	'First Large then List ( Minimal )',
                                '22'	=>	'First Large then Grid ( Minimal )',
                            ),
                            'description'   => esc_html__( 'Type', 'deep'),
                        ),
                        array(
                            'name'          => 'sidebar',
                            'label'         =>  esc_html__( 'Sidebar', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'none'    => 'None',
                                'left'    => 'Left',
                                'right'   => 'Right',
                                'both'    => 'Both',
                            ),
                            'value'          => 'none',
                            'description' 	=> esc_html__( 'Sidebar does not support Masonry and Timeline', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => array( '16' , '17' ),
                            ),
                        ),
                        array(
                            'name'          => 'category',
                            'label'         => esc_html__( 'Category', 'deep' ),
                            'type'          => 'select',
                            'options'       => $category_array,
                            'description'   => esc_html__( 'Select specific category, leave blank to show all categories.', 'deep'),
                        ),
                        array(
                            'name'          => 'count',
                            'label'         => esc_html__( 'Post Count', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Number of post(s) to show', 'deep'),
                        ),
                        array(
                            'name'          => 'orderby',
                            'label'         =>  esc_html__( 'Order By', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'date'          => esc_html__( 'Date (Latest Posts)', 'deep' ),
                                'comment_count' => esc_html__( 'Popular posts: Comment Count', 'deep' ),
                                'view_count'    => esc_html__( 'Popular posts: View Count', 'deep' ),
                                'social_score'  => esc_html__( 'Popular Posts: Social Score', 'deep' ),
                            ),
                            'description'   => esc_html__( 'If you use "Social Post Score" type, then Social Metrics Tracker plugin must be activated via Apperance > Install Plugins.', 'deep'),
                        ),
                        array(
                            'name'          => 'link_target',
                            'label'         => esc_html__( 'Open link in a new tab? ', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Add Target = _blank', 'deep'),
                        ),
                        array(
                            'name'          => 'loadmore_btn',
                            'label'         => esc_html__( 'Do you want load more button?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'if you select it, this option will add a button below the shortcode to load more post to show', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => array( '16' ),
                            ),
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
<?php
function michigan_taxonomy_search( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'				=> 'course',
		'category_field'	=> true,
		'instructor_field'	=> true,
	), $atts));

	// category dropdown
	$taxonomy = '';
	switch ( $type ) :
		case 'course':
			$taxonomy = 'course_cat';
		break;
		case 'tribe_events':
			$taxonomy = 'tribe_events_cat';
		break;
		case 'excursion':
			$taxonomy = 'excursion_category';
		break;
	endswitch;
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
		'taxonomy'		=> $taxonomy,
		'pad_counts'	=> false,
	);
	$categories		= get_categories( $cat_args );
	$category_items	= $new_line = array();
	$options_cat	= '<option value="">' . esc_html__( 'All Categories', 'deep' ) . '</option>';

	foreach ( $categories as $category ) :
		$new_line['slug'] = $category->slug;
		$new_line['name'] = $category->name;
		$category_items[] = $new_line;
	endforeach;

	foreach ( $category_items as $category_item ) :
		$options_cat .= '<option value="' . $category_item['slug'] . '">' . $category_item['name'] . '</option>';
	endforeach;

	// instructor dropdown
	$options_user = '<option value="">' . esc_html__( 'All Instructor', 'deep' ) . '</option>';
	$blogusers	 = get_users();
	foreach ( $blogusers as $user ) :
		if ( michigan_webnus_count_user_posts_by_type( $user->ID, 'course' ) ) {
			$options_user .= '<option value="' . $user->user_nicename . '">' . $user->display_name . '</option>';
		}
	endforeach;

	$category_field   = ( $category_field ) ? '<select class="category-field" name="' . $taxonomy . '"><option value="">' . esc_html__( 'Categories' , 'deep' ) . '</option>' . $options_cat . '</select>' : '';
	$instructor_field = ( $instructor_field && $type == 'course' ) ? '<select class="instructor-field" name="author_name"><option value="">' . esc_html__( 'Instructor', 'deep' ) . '</option>' . $options_user . '</select>' : '';

	// render
	$out = '';
	$out .= '
		<form role="search" method="get" class="taxonomy-search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<div>
				<input type="search" class="search-field" placeholder="' . esc_attr__( 'Keyword', 'deep' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr__( 'Search for:', 'deep' ) . '">
				<input type="hidden" name="post_type" value="' . $type . '">
				' . $category_field . $instructor_field . '
				<input type="submit" class="submit-field colorb" value="Search">
			</div>
		</form>';

	return $out;
}

add_shortcode( 'taxonomy-search', 'michigan_taxonomy_search' );
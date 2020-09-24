<?php
function michigan_course_category( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'			=> '1',
		'category'		=> '',
		'border_bottom'	=> true,
	), $atts));

	$category = get_term_by( 'slug', $category, 'course_cat' );

	$term_id = $category->term_id;

	$term_meta = get_option("taxonomy_{$term_id}_metas");

	$cat_icon = $term_meta['icon'];
	
	// render
	$out = '';
	if ( $category ) :
		switch ( $type ) :
			case '1' :
				$course_text = ( $category->count > 1 ) ? esc_html__( 'Courses', 'deep' ) : esc_html__( 'Course', 'deep' );
				$out = '
				<div class="course-category-box">
					<a href="' . esc_url( get_category_link( $category ) ) . '" title="' . esc_attr( sprintf( __( '%s category', 'deep' ), $category->name ) ) . '">
						<div class="ccb-content colorf">
						<i class="' . $cat_icon . '"></i>
							<span class="category-name">' . esc_html( $category->name ) . '</span>
						</div>
						<div class="ccb-hover-content colorb">
							<span class="category-count">' . esc_html( $category->count ) . '</span>
							<span>' . $course_text . '</span>
						</div>
					</a>
				</div>';
			break;

			case '2' :
				$border_bottom = $border_bottom ? '' : esc_attr( ' no-border' );
				$out = '
				<div class="course-category-box2' . $border_bottom . '">
					<a href="' . esc_url( get_category_link( $category ) ) . '" title="' . esc_attr( sprintf( __( '%s category', 'deep' ), $category->name ) ) . '">
						<span class="colorf"><i class="' . $cat_icon . '"></i></span>
						<span class="category-name">' . esc_html( $category->name ) . '</span>
					</a>
				</div>';
			break;
		endswitch;
	else :
		switch ( $type ) :
			case '1' :
				$out = '
				<div class="course-category-box">
					<a class="hcolorf" href="' . esc_url( get_site_url() ) . '/courses/" title="' . esc_attr( 'View all Categories', 'deep' ). '">
						<div class="ccb-content colorf">
							<i class="fa-book"></i>
							<span class="category-name">' . esc_html__( 'All Courses', 'deep' ) . '</span>
						</div>
						<div class="ccb-hover-content colorb">
							<span>' . esc_html__( 'All Courses', 'deep' ) . '</span>
						</div>
					</a>
				</div>';
			break;

			case '2' :
				$border_bottom = $border_bottom ? '' : esc_attr( ' no-border' );
				$out = '
				<div class="course-category-box2' . $border_bottom . '">
					<a class="hcolorf" href="' . esc_url( get_site_url() ) . '/courses/" title="' . esc_attr( 'View all Categories', 'deep' ). '">
						<span class="colorf"><i class="fa-book"></i></span>
						<span class="category-name">' . esc_html( 'All Courses', 'deep' ) . '</span>
					</a>
				</div>';
			break;
		endswitch;
	endif;

	return $out;
}

add_shortcode( 'course-category', 'michigan_course_category' );
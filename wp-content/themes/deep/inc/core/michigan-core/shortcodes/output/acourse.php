<?php
 function michigan_webnus_acourse( $attributes, $content = null ) {
extract(shortcode_atts(	array(
	'post'=>'',
), $attributes));
	ob_start();
	$args = array(
		'post_type' => 'course',
		'posts_per_page' => 1,
		'p'	=> $post,
	);
	$query = new WP_Query($args);
?>
<div class="container courses single-course">
<?php	while ($query -> have_posts()) : $query -> the_post();
		$post_id = get_the_ID();
		$terms_slug_str = get_the_author_meta( 'display_name' );
		$cats = get_the_terms( $post_id , 'course_cat' );
		if(function_exists('tax_icons_output_term_icon') && $cats){
			$cat_icon = tax_icons_output_term_icon( $cats[0]->term_id )? tax_icons_output_term_icon( $cats[0]->term_id ):'';
		}else{
			$cat_icon = '';
		}
		if(is_array($cats)){
			$course_cat = array();
			foreach($cats as $cat){
				$course_cat[] = $cat->slug;
			}
		}else $course_cat=array();
		$cats_slug_str = '';
		if ($cats && !is_wp_error($cats)) :
			$cat_slugs_arr = array();
		foreach ($cats as $cat) {
			$cat_slugs_arr[] = '<a href="'. get_term_link($cat, 'course_cat') .'">' . $cat->name . '</a>';
		}
		$cats_slug_str = implode( ", ", $cat_slugs_arr);
		endif;
		$content ='<p>'.deep_excerpt(360).'</p>';
		$title = get_the_title();
		$permalink = get_the_permalink();
		$llms_product = new LLMS_Product( $post_id );
		$image = get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'michigan_webnus_blog3_img','echo'=>false, ) );
		$no_img = get_template_directory_uri().'/images/course_no_image_l.png';
			echo '<article class="w-course-list">';
			echo '<div class="clearfix">';
			echo '<div class="col-md-4 course-list-border-right">';
			echo ($cats_slug_str)?'<h6 class="course-list-cat">'. $cat_icon .$cats_slug_str.'</h6>':'';
			echo ($image)?'<figure>'.$image.'</figure>':'<figure><img src="' . $no_img . '" alt="Placeholder" class="w-no-img" /></figure>';
			echo '</div>';
			echo '<div class="col-md-8"><div class="course-list-content">';
			echo '<h5><a href="'.$permalink.'">'.$title.'</a></h5>';
			echo '<div class="course-list-price">';
			deep_michigan_course_price();
			echo '</div>';
			echo $content;
			echo '</div></div>';
			echo '</div>';
			echo '<div class="clearfix">';
			echo '<div class="col-md-4 course-list-border-right">';
			echo '<div class="course-list-review">';
			if(function_exists('the_ratings')) {
			echo expand_ratings_template('<span class="rating">%RATINGS_IMAGES%</span> <strong>(%RATINGS_USERS% '.esc_html__('Reviews','deep').')</strong>', get_the_ID());
			}
			echo '</div>';
			echo '</div>';
			echo '<div class="col-md-8 nopad-all"><div class="course-list-meta">';
			echo '<div class="clearfix">';
			global $course;
			$post_id = get_the_ID();
			echo ($length_html = get_post_meta( $post_id, '_llms_length', true ))?'<div class="col-md-2 col-sm-2 col-xs-6"><span class="course-list-duration"><i class="sl-clock"></i>'.$length_html.'</span></div>':'';
			if (!isset($lesson)){$lesson = new LLMS_Lesson( $post_id );}
			$course_id = $lesson->parent_course;
			$my_post = get_post( $course_id );
			$author_id = $my_post->post_author;
			$instructor_title = '<a href="'.get_author_posts_url( $author_id ).'">'.get_the_author_meta( 'display_name',$author_id ).'</a>';
			echo '<div class="col-md-4 col-sm-4 col-xs-6"><div class="course-list-instructor"><i class="sl-user"></i>'.$instructor_title.'</div></div>';
			$lesson_max_user = get_post_meta( $post_id , '_lesson_max_user', true );
			echo ($lesson_max_user)?'<div class="col-md-3 col-sm-3 col-xs-6"><div class="course-list-students"><i class="sl-people"></i>'.$lesson_max_user .' '. esc_html__('Studesnts','deep').'</div></div>':'';
			echo '<div class="col-md-3 col-sm-3 col-xs-6"><span class="modern-viewers"><i class="sl-eyeglass"></i>'.deep_getViews(get_the_ID()) .' '. esc_html__('Viewers','deep').'</span></div>';
			echo '</div>';
			echo '</div></div>';
			echo '</div>';
			echo '</article>';
	endwhile;
	echo '</div>';
		$out = ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $out;
	}
 add_shortcode('acourse', 'michigan_webnus_acourse');
?>
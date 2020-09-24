<?php
function michigan_webnus_instructors( $attributes, $content = null ) {
	extract(shortcode_atts(	array(
	'view'=>'1',
	'count'=>'4',
	'page'=>'',
	'display_as_carousel'=>'',
	'carousel_items'=>'3',
	), $attributes));
		ob_start();
	if($view) {
		switch($view){
			case '1':
				$orderby = 'ID';
				$meta_key = 'instructor_is';
			break;
			case '2':	
				$orderby = 'meta_value_num';
				$meta_key = 'instructor_students';
			break;
			case '3':
				$orderby = 'meta_value_num';
				$meta_key = 'instructor_rate';
			break;
			case '4':
				$orderby = 'meta_value_num';
				$meta_key = 'instructor_courses';
			break;
		}
		GLOBAL $post;
		$wp_instructors= new WP_User_Query( array(
			'role__in' => array('Administrator','Editor','Author','Contributer'),
			'has_published_posts' => true,
		));
		$instructors = $wp_instructors->get_results();
		if(!empty($instructors)) {
			foreach ($instructors as $instructor){
				michigan_webnus_instructor_update($instructor->ID);
			}
		}
		$rcount = 1;
		$count=($count==0)?4:$count;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : (( get_query_var('page') ) ? get_query_var('page') : 1);
		if ( ! $display_as_carousel ) {
		echo '<div class="container courses-instructors">';
		} else {
		echo '<div class="row courses-instructors">';	
		}
			$arg = array (
			'number' => $count,
			'order' => 'DESC',
			'orderby' => $orderby,
			'meta_key' => $meta_key,
			'offset' => (($paged - 1) * $count),
			'has_published_posts' => true,
		);
		$wp_user_query = new WP_User_Query($arg);
		$authors = $wp_user_query->get_results();
		if (!empty($authors)) {
			foreach ( $authors as $user) {
				$instructor_avatar = get_avatar( get_the_author_meta( 'user_email',$user->ID ), 265 );
				$instructor_title = '<a class="hcolorf" href="'.get_author_posts_url( $user->ID ).'">'.get_the_author_meta( 'display_name',$user->ID ).'</a>';
				$instructor_biography = get_the_author_meta( 'biography',$user->ID );
				$facebook = esc_url(get_the_author_meta( "facebook",$user->ID));
				$twitter = esc_url(get_the_author_meta( "twitter",$user->ID));
				$google_plus = esc_url(get_the_author_meta( "googleplus",$user->ID));
				$linkedin = esc_url(get_the_author_meta( "linkedin",$user->ID));
				$youtube = esc_url(get_the_author_meta( "youtube",$user->ID));
				$title = get_the_author_meta( "title",$user->ID);
				$instructor_email = get_the_author_meta( 'display_email' , $user->ID);
				$url = esc_url(get_the_author_meta( "url",$user->ID));
				
				// carousel variables
				$carousel_classes = $carousel_items_data = '';
				if ( $display_as_carousel ) :
					$carousel_classes	 = ' instructors-owl-carousel owl-carousel owl-theme';
					$carousel_items_data = ' data-instructors-count="' . $carousel_items . '"';
				endif;

				if ( ! $display_as_carousel ) {
					echo ($rcount == 1)?'<div class="row">':'';
				} else {
					echo ($rcount == 1) ? '<div class="clearfix' . $carousel_classes . '"' . $carousel_items_data . '>' : '';
				}
				if($count<5){
					$col=12/$count;
					$column='col-md-'.$col.' col-sm-'.$col;
				}elseif($count%4==0){
					$col=3;
					$column='col-md-3 col-sm-6';
				}else{
					$col=4;
					$column='col-md-4 col-sm-4';
				}
				$row = 12/$col;
				if ( ! $display_as_carousel ) { 
				echo '<div class="'. $column.'">';
				}
				echo '<article class="course-instructor"><a href="'.get_author_posts_url( $user->ID ).'"><figure>'.$instructor_avatar .'</figure></a>';
				echo '<div class="inst-detail">
				<span class="inst-tip colorf" title="' . esc_html__('Total Courses:','deep') . ' ' . get_the_author_meta( 'instructor_courses',$user->ID).'"><i title="" class="sl-book-open"></i></span>
				<span class="inst-tip colorf" title="' . esc_html__('Total Students:','deep') . ' ' . get_the_author_meta( 'instructor_students',$user->ID).'">
				<i title="" class="sl-people"></i>
				</span>
				<span class="inst-tip colorf" title=" ' . esc_html__('Total Rates:','deep') . ' ' . get_the_author_meta( 'instructor_rate',$user->ID) . '">
				<i title="" class="sl-star"></i>
				</span>
				</div>';
				echo '<div class="inst-desc"><h3>'. $instructor_title .'</h3><h5 class="colorf">'.$title.'</h5><p>'.$instructor_biography.'</p></div>';
				echo '<ul class="inst-social">';
				echo ($url)?'<li><a href="'.$url.'" target="_blank"><i class="fa-globe"></i></a></li>':'';
				echo ($instructor_email)?'<li><a href="mailto:'.$instructor_email.'"><i class="fa-envelope"></i></a></li>':'';
				echo ($facebook)?'<li><a href="'.$facebook.'"><i class="fa-facebook" target="_blank"></i></a></li>':'';
				echo ($twitter)?'<li><a href="'.$twitter.'"><i class="fa-twitter" target="_blank"></i></a></li>':'';
				echo ($linkedin)?'<li><a href="'.$linkedin.'"><i class="fa-linkedin" target="_blank"></i></a></li>':'';
				echo ($google_plus)?'<li><a href="'.$google_plus.'"><i class="fa-google-plus" target="_blank"></i></a></li>':'';
				echo ($youtube)?'<li><a target="_blank" href="'.$youtube.'"><i class="fa-youtube" target="_blank"></i></a></li>' : '';				
				echo '</ul>';
				echo '</article>';
				if ( ! $display_as_carousel ) { 
					echo '</div>'; // end col-md-*
				}
				if ( ! $display_as_carousel ) {
					if($rcount == $row){
						echo '</div>'; // end row
						$rcount = 0;
					}
					$rcount++;
				} else {
					$rcount = 0;
				}
			}

			if ( $display_as_carousel ) {
				echo '</div>'; // end row carousel
			}
		}
		echo '</div>';
		if ( ! $display_as_carousel ) {
			if($page){
				global $wp_rewrite;
				$pagination_args = array(
					'base' => @add_query_arg('paged','%#%'),
					'format' => '',
					'total' => ceil($wp_user_query->get_total() / $count),
					'current' => $paged,
					'show_all' => false,
					'type' => 'plain',
				);
				if( $wp_rewrite->using_permalinks() )
					$pagination_args['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');
				if( !empty($wp_query->query_vars['s']) )
					$pagination_args['add_args'] = array('s'=>get_query_var('s'));
				$links = paginate_links($pagination_args);
				echo '<div class="wp-pagenavi">'.$links.'</div>'; 
			}
		}
		$out = ob_get_contents();
		ob_end_clean();	
		wp_reset_postdata();
		return $out;
	}
}
add_shortcode('instructors', 'michigan_webnus_instructors');
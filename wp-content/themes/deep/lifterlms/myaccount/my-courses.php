<?php
/**
 * My Courses List
 * Used in My Account and My Courses shortcodes
 *
 * @version  3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $wp_query;

//Instructor Dashboard
global $wpdb;
$user_id = get_current_user_id();
$args = array(
	'post_type' => 'course' ,
	'author' => $user_id,
	'posts_per_page' => -1
);
$custom_posts = new WP_Query( $args );
$instructor_rate_score = $instructor_rate_users = $instructor_rate = $course_count = $student_count = $total_all_orders = $total_orders = 0;
while ( $custom_posts->have_posts() ) : $custom_posts->the_post();
	$post_id = get_the_ID();
	$students = $wpdb->get_results($wpdb->prepare(
		'SELECT
		user_id,
		meta_value,
		post_id
		FROM '.$wpdb->prefix . 'lifterlms_user_postmeta
		WHERE meta_key = "_status"
		AND meta_value = "Enrolled"
		AND post_id = %d
		AND EXISTS(SELECT 1 FROM ' . $wpdb->prefix . 'users WHERE ID = user_id)
		group by user_id'
	,$post_id));
	// $orders = $wpdb->get_results($wpdb->prepare(
	// 	'SELECT
	// 	_llms_product_id
	// 	FROM '.$wpdb->prefix . 'post
	// 	WHERE ID = %d
	// 	AND order_completed = "yes"
	// 	group by order_post_id'
	// ,$post_id));
	// foreach ($orders as $order) {
	// 	$total_orders += get_post_meta( $order->order_post_id, '_llms_order_total', true );
	// }
	if(function_exists('the_ratings')) {
		$instructor_rate_score = get_post_meta($post_id, 'ratings_score' , true);
		$instructor_rate_users = get_post_meta($post_id, 'ratings_users' , true);
	}
	$course_count++;
	$student_count = $student_count + count($students);
	//$total_all_orders = $total_all_orders + $total_orders;
endwhile;
$instructor_rate = ($instructor_rate_users)?($instructor_rate_score/$instructor_rate_users):0;
wp_reset_postdata();
delete_user_meta( $user_id, 'instructor_is');
delete_user_meta( $user_id, 'instructor_courses');
delete_user_meta( $user_id, 'instructor_students');
delete_user_meta( $user_id, 'instructor_rate');
add_user_meta( $user_id, 'instructor_is', true);
add_user_meta( $user_id, 'instructor_courses', $course_count);
add_user_meta( $user_id, 'instructor_students', $student_count);
add_user_meta( $user_id, 'instructor_rate', $instructor_rate);


if (current_user_can('edit_posts')){ ?>
	<div class="instructor-dashboard">
		<div class="row">
			<div class="col-md-3">
				<div class="hcolorb colorr inst-cell">
					<div class="inst-cell-icon">
						<i class="colorf fa fa-money"></i>
					</div>
					<div class="inst-cell-desc">
						<h4 class="inst-cell-title"><?php esc_html_e( 'Total Revenue', 'deep' );?></h4>
						<span><?php //echo get_lifterlms_currency_symbol().$total_all_orders; ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="hcolorb colorr inst-cell">
					<div class="inst-cell-icon">
						<i class="colorf sl-book-open"></i>
					</div>
					<div class="inst-cell-desc">
						<h4 class="inst-cell-title"><?php esc_html_e( 'Total Courses', 'deep' );?></h4>
						<span><?php echo get_the_author_meta( 'instructor_courses',$user_id); ?></span>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="hcolorb colorr inst-cell">
					<div class="inst-cell-icon">
						<i class="colorf sl-people"></i>
					</div>
					<div class="inst-cell-desc">
						<h4 class="inst-cell-title"><?php esc_html_e( 'Total Students', 'deep' );?></h4>
						<span><?php echo get_the_author_meta( 'instructor_students',$user_id); ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="hcolorb colorr inst-cell">
					<div class="inst-cell-icon">
						<i class="colorf sl-star"></i>
					</div>
					<div class="inst-cell-desc">
						<h4 class="inst-cell-title"><?php esc_html_e( 'Average Rates', 'deep' );?></h4>
						<span><?php echo get_the_author_meta( 'instructor_rate',$user_id); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }

/* Taught Courses */
	$args = array(
		'post_type' => 'course' ,
		'author' => $user_id,
		'showposts' => 10
	);
	$custom_posts = new WP_Query( $args );
	if ( $custom_posts->have_posts() ){ ?>
	<div class="clearfix author-courses w-llms-my-courses">
	<?php
		echo '<h3><i class="fa fa-chevron-right colorf"></i> ' . apply_filters( 'lifterlms_my_courses_title', esc_html__( 'Taught Courses', 'deep' ) ) . '</h3>';
		echo '<div class="author-carousel owl-carousel owl-theme">';
		while ( $custom_posts->have_posts() ) : $custom_posts->the_post();
			$post_id = get_the_ID();
			$students = $wpdb->get_results($wpdb->prepare(
				'SELECT
					user_id,
					meta_value,
					post_id
				FROM '.$wpdb->prefix . 'lifterlms_user_postmeta
				WHERE meta_key = "_status"
				AND meta_value = "Enrolled"
				AND post_id = %d
				AND EXISTS(SELECT 1 FROM ' . $wpdb->prefix . 'users WHERE ID = user_id)
				group by user_id'
			,$post_id));
			$course_students = rwmb_meta( 'michigan_course_students_meta' ) ? rwmb_meta( 'michigan_course_students_meta' ):count($students);
			$image_m = get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'deep_blog2_img','echo'=>false, ) );
			$no_img_m = get_template_directory_uri().'/images/course_no_image.png';
			$llms_product = new LLMS_Product( $post_id );
			$course_duration = get_post_meta( $post_id, '_llms_length', true );
			echo '<article class="modern-grid llms-course-list"><div class="llms-course-link">';
			echo '<div class="modern-feature"><a class="" href="'.get_the_permalink().'">';
			echo ($image_m)? $image_m :'<img src="' . $no_img_m . '" alt="Placeholder" class="w-no-img" />';
			echo ($course_duration)?'<span class="modern-duration">'.$course_duration.'<i class="fa fa-clock-o"></i></span>':'';
			echo '</a></div>';
			echo '<div class="modern-content">';
			echo '<h3 class="llms-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
			if(function_exists('the_ratings')) {
				echo expand_ratings_template('<div class="modern-rating"><span class="rating">%RATINGS_IMAGES%</span> <strong>(%RATINGS_USERS% '.esc_html__('Votes','deep').')</strong></div>', get_the_ID());
			}
				echo '<div class="llms-price-wrapper"><h4 class="llms-price"><span>';
				deep_michigan_course_price();
				echo '</span></h4></div>';
			echo '</div>';
			echo '<div class="clearfix modern-meta">';
			echo '<div class="col-md-8 col-sm-8 col-xs-8">';
			if ( ! isset( $lesson )) {$lesson = new LLMS_Lesson( $post_id );}
			$course_id = $lesson->parent_course;
			$my_post = get_post( $course_id );
			$author_id = $my_post->post_author;
			// $total_orders ='0';
			// 	$orders = $wpdb->get_results($wpdb->prepare(
			// 	'SELECT
			// 	order_post_id
			// 	FROM '.$wpdb->prefix . 'lifterlms_order
			// 	WHERE product_id = %d
			// 	AND order_completed = "yes"
			// 	group by order_post_id'
			// ,$post_id));
			// foreach ($orders as $order) {
			// 	$total_orders += get_post_meta( $order->order_post_id, '_llms_order_total', true );
			// }
			// echo '<div title="'.esc_attr('Total Sold','deep').'" class="modern-viewers"><i class="fa-money"></i> '. get_lifterlms_currency_symbol().$total_orders .'</div>';
			echo '</div>';
			echo '<div class="col-md-4 col-sm-4 col-xs-4">';
			echo ($course_students)?'<span class="modern-students" title="'.esc_attr('Enrolled Students','deep').'"><i class="sl-people"></i>'.$course_students.'</span>':'<span class="modern-viewers" title="'.esc_attr('Viewers','deep').'"><i class="fa fa-eye"></i>'.deep_getViews(get_the_ID()).'</span>';
			echo '</div>';
			echo'</div>';
			echo '</div></article>';
		endwhile;
	echo '</div>';
	echo '</div>';
	}else{
		// nothing found
	}
	wp_reset_postdata();
?>
<div class="llms-sd-section llms-my-courses w-llms-my-courses">
	<?php  
	$post_id = get_the_ID(); 
	$courses = $wpdb->get_results($wpdb->prepare(
			'SELECT
				user_id,
				meta_value,
				post_id
			FROM '.$wpdb->prefix . 'lifterlms_user_postmeta
			WHERE meta_key = "_status"
			AND meta_value = "Enrolled"
			AND user_id = %d
			AND EXISTS(SELECT 1 FROM ' . $wpdb->prefix . 'users WHERE ID = user_id)
			group by post_id'
		,$user_id));
		$students = $wpdb->get_results($wpdb->prepare(
				'SELECT
					user_id,
					meta_value,
					post_id
				FROM '.$wpdb->prefix . 'lifterlms_user_postmeta
				WHERE meta_key = "_status"
				AND meta_value = "Enrolled"
				AND post_id = %d
				AND EXISTS(SELECT 1 FROM ' . $wpdb->prefix . 'users WHERE ID = user_id)
				group by user_id'
			,$post_id));
?>
	<?php if ( empty ( $courses ) ) : ?>
		<p><?php _e( 'You are not enrolled in any courses.', 'lifterlms' ); ?></p>
	<?php else : ?>
		<div class="author-carousel owl-carousel owl-theme">
			
			<?php foreach ( $courses as $c ) :?>
				<article class="modern-grid llms-course-list">
					<div class="llms-course-link">
						<div class="modern-feature">
							<a href="<?php echo get_permalink($c->post_id); ?>">
								<?php global $post;
									if ( has_post_thumbnail($c->post_id ) ) {
										echo llms_featured_img($c->post_id, 'deep_blog2_img' );
									} elseif ( llms_placeholder_img_src() ) {
										echo llms_placeholder_img();
									}?>
							</a>
						</div>
						<div class="modern-content">
							<h3 class="llms-title">
								<a href="<?php echo get_the_permalink($c->post_id); ?>"><?php echo get_the_title($c->post_id); ?></a>
							</h3>
							<?php if ( 'yes' === get_option( 'lifterlms_course_display_author' ) ) : ?>
								<span class="author"><?php printf( __( 'Author: %s', 'lifterlms' ), '<span>' . get_author_name() . '</span>' ); ?></span>
							<?php endif; ?>
							<?php
							if(function_exists('the_ratings')) {
							 echo expand_ratings_template('<div class="modern-rating"><span class="rating">%RATINGS_IMAGES%</span> <strong>(%RATINGS_USERS% '.esc_html__('Votes','deep').')</strong></div>', $c->post_id ); }
							?>
							<div class="course-link">
								<a href="<?php echo get_the_permalink($c->post_id); ?>" class="button llms-button-primary llms-button colorb"><?php echo apply_filters( 'lifterlms_my_courses_course_button_text', __( 'View Course', 'lifterlms' ) ); ?></a>
							</div>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

	<?php endif; ?>
</div>
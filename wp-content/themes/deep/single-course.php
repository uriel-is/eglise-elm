<?php
/******************/
/**  Single Course
******************/
get_header();
$deep_options		= deep_options();
$course_features	= $deep_options['deep_webnus_course_features'];
?>
<section class="container page-content">
<hr class="vertical-space2">
<?php
// ===============//
// BreadCrumb
// ===============//
if ( $deep_options['deep_webnus_enable_breadcrumbs'] ) {
	$homeLink        = esc_url( home_url( '/' ) );
	$w_courses_id    = get_option( 'lifterlms_shop_page_id', '' ) ? get_option( 'lifterlms_shop_page_id', '' ) : '';
	$w_courses_slug  = ( $w_courses_id ) ? get_post( $w_courses_id ) : '';
	$w_courses_name  = ( $w_courses_slug ) ? $w_courses_slug->post_name : '';
	$w_courses_title = ( $w_courses_slug ) ? $w_courses_slug->post_title : '';
	$cat             = ( get_the_term_list( get_the_id(), 'course_cat', '', ', ' ) ) ? '<i class="fa fa-angle-right"></i> ' . get_the_term_list( get_the_id(), 'course_cat', '', ', ' ) : '';
	echo '<div class="breadcrumbs-w"><div class="container"><div id="crumbs"><a href="' . $homeLink . '">' . esc_html__( 'Home', 'deep' ) . '</a> <i class="fa fa-angle-right"></i> <a href="' . $homeLink . $w_courses_name . '/">' . $w_courses_title . '</a> ' . $cat . ' <i class="fa fa-angle-right"></i> <span class="current">' . get_the_title() . '</span></div></div></div>';
}
?>
<div class="course-main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			$post_id = get_the_ID();
			?>
	<div class="col-md-12 post-trait-w">
		<h1 class="post-title-ps1"><?php the_title(); ?></h1>
			<?php
			if ( isset( $course_features['price'] ) && $course_features['price'] ) {
				echo '<div class="w-course-price">';
				deep_michigan_course_price();
				echo '</div>';
			}
			?>
	</div>
	<div>
				</div>
	<section class="col-md-9 course-content cntt-w">
		<article class="course-single-post">
			<?php
			deep_setViews( get_the_ID() );
			$content = get_the_content();
			?>
		<div <?php post_class( 'post' ); ?>>
		<div class="container">
			<?php
			global $post;
			$course_features   = $deep_options['deep_webnus_course_features'];
			$course_no_img     = $deep_options['deep_webnus_course_no_image'];
			$start_date        = $end_date = $course_duration = $lesson_max_user = $difficulty = $students = '';
			$display_thubmnail = 'yes';
			if ( class_exists( 'LifterLMS' ) ) {
				$course          = new LLMS_Course( $post );
				$start_date      = get_post_meta( $post->ID, '_course_dates_from', true );
				$end_date        = get_post_meta( $post->ID, '_course_dates_to', true );
				$course_duration = get_post_meta( $post->ID, '_llms_length', true );
				$lesson_max_user = get_post_meta( $post->ID, '_lesson_max_user', true );
				$difficulty      = ( is_object( $course ) ) ? $course->get_difficulty() : '';
				$students        = $wpdb->get_results( $wpdb->prepare( 'SELECT user_id, meta_value, post_id FROM ' . $wpdb->prefix . 'lifterlms_user_postmeta WHERE meta_key = "_status" AND meta_value = "Enrolled" AND post_id = %d AND EXISTS(SELECT 1 FROM ' . $wpdb->prefix . 'users WHERE ID = user_id)', $post->ID ) );
			}
			$course_assessments = rwmb_meta( 'michigan_course_assessments_meta' );
			$course_certificate = rwmb_meta( 'michigan_course_certificate_meta' );
			$course_code        = rwmb_meta( 'michigan_course_code_meta' );
			$course_language    = rwmb_meta( 'michigan_course_language_meta' );
			$course_lessons     = rwmb_meta( 'michigan_course_lessons_meta' );
			$course_prequisite  = rwmb_meta( 'michigan_course_prequisite_meta' );
			$course_price       = rwmb_meta( 'michigan_course_price_meta' );
			$course_students    = rwmb_meta( 'michigan_course_students_meta' ) ? rwmb_meta( 'michigan_course_students_meta' ) : count( $students );
			// Course Thumbnail
			echo '<div class="post-thumbnail">';
			if ( has_post_thumbnail() ) {
				get_the_image(
					array(
						'meta_key'     => array( 'thumbnail', 'thumbnail' ),
						'size'         => 'deep_webnus_latest_img',
						'link_to_post' => false,
					)
				);
			} elseif ( $course_no_img ) {
				$no_image_src = isset( $deep_options['deep_webnus_course_no_image_src']['url'] ) ? $deep_options['deep_webnus_course_no_image_src']['url'] : get_template_directory_uri() . '/images/course_no_image.png';
				echo '<img alt="' . get_the_title() . '" width="420" height="330" src="' . $no_image_src . '">';
			}
			echo '</div>';
			?>

		<?php if ( isset( $course_features['date'] ) ): ?>
		<h4 class="course-titles"><?php esc_html_e( 'Course Features', 'deep' ); ?></h4>
		<div class="course-features clearfix">
			<div class="col-md-6">
				<div class="course-postmeta">
				<?php
				if ( isset( $course_features['date'] ) ) { // Course Date - by LifterLMS
					echo( $start_date ) ? '<div class="w-cal"><i class="fa fa-calendar"></i>' . esc_html__( 'Start Course: ', 'deep' ) . '<span>' . $start_date . '</span></div>' : '';
					echo( $end_date ) ? '<div class="w-cal"><i class="fa fa-calendar"></i>' . esc_html__( 'End Course: ', 'deep' ) . '<span>' . $end_date . '</span></div>' : '';
				}

				if ( isset( $course_features['duration'] ) && $course_features['duration'] && $course_duration ) { // Course Duration - by LifterLMS
					echo '<div class="w-duration"><i class="fa fa-clock-o"></i>' . esc_html__( 'Course Duration: ', 'deep' ) . '<span>' . $course_duration . '</span></div>';
				}
				if ( isset( $course_features['instructors'] ) && $course_features['instructors'] ) { // Course Instructors
					echo '<div class="w-instructors"><i class="sl-user"></i> ';
					if ( function_exists( 'coauthors_posts_links' ) ) {
						esc_html_e( 'Course Instructors: ', 'deep' );
						coauthors_posts_links();
					} else {
						esc_html_e( 'Course Instructor: ', 'deep' );
						echo '<span>' . get_the_author() . '</span>';
					}
					echo '</div>';
				}
				if ( isset( $course_features['category'] ) && $course_features['category'] ) { // Course Category
					echo '<div class="w-category"><i class="fa fa-bookmark"></i> ';
					esc_html_e( 'Category: ', 'deep' );
					the_terms( get_the_id(), 'course_cat' );
					echo '</div>';
				}
				if ( isset( $course_features['views'] ) && $course_features['views'] ) { // Course View
					echo '<div class="w-view"><i class="fa fa-eye"></i>';
					esc_html_e( 'Viewers: ', 'deep' );
					echo '<span>' . deep_getViews( get_the_ID() ) . '</span>';
					echo '</div>';
				}
				if ( isset( $course_features['students'] ) && $course_features['students'] ) {
					echo '<div class="w-students"><i class="fa fa-group"></i>';
					esc_html_e( 'Students: ', 'deep' );
					echo '<span>' . $course_students . '</span></div>';
				}
				if ( $course_prequisite ) {
					echo '<div class="w-preq"><i class="fa fa-lock"></i>';
					esc_html_e( 'Prequisite: ', 'deep' );
					echo '<span>' . $course_prequisite . '</span></div>';
				}
				?>
			</div>
		</div>
	<div class="col-md-6">
		<div class="course-postmeta">
			<?php
			if ( $course_assessments ) { // Course Assessments
				echo '<div class="w-assess"><i class="fa fa-check-square-o"></i>';
				esc_html_e( 'Assessment: ', 'deep' );
				echo '<span>' . $course_assessments . '</span></div>';
			}
			if ( $course_certificate ) { // Course Certificate
				echo '<div class="w-cert"><i class="fa fa-certificate"></i>';
				esc_html_e( 'Certificate: ', 'deep' );
				echo '<span>' . $course_certificate . '</span></div>';
			}
			if ( isset( $course_features['code'] ) && $course_features['code'] && $course_code ) {  // Course Code
				echo '<div class="w-code"><i class="fa fa-hashtag"></i>';
				esc_html_e( 'Code: ', 'deep' );
				echo '<span>' . $course_code . '</span></div>';
			}
			if ( $course_language ) {  // Course Language
				echo '<div class="w-language"><i class="fa fa-font"></i>';
				esc_html_e( 'Language: ', 'deep' );
				echo '<span>' . $course_language . '</span></div>';
			}
			if ( $course_lessons ) { // Course Lessons
				echo '<div class="w-lessons"><i class="fa fa-clipboard "></i>';
				esc_html_e( 'Lessons: ', 'deep' );
				echo '<span>' . $course_lessons . '</span></div>';
			}
			if ( isset( $course_features['difficulty'] ) && $course_features['difficulty'] && $difficulty ) { // Course Difficulty - by LifterLMS
				echo '<div class="w-difficulty"><i class="fa fa-signal"></i>';
				printf( __( 'Difficulty: <span class="difficulty">%s</span>', 'deep' ), $difficulty );
				echo '</div>';
			}
			if ( isset( $course_features['capacity'] ) && $course_features['capacity'] && $lesson_max_user ) { // Course Capacity - by LifterLMS
				echo '<div class="w-capacity"><i class="fa fa-briefcase"></i> ';
				esc_html_e( 'Course Capacity: ', 'deep' );
				echo '<span>' . $lesson_max_user . '</span>';
				echo '</div>';
			}
			?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php
if ( ( isset( $course_features['price'] ) && $course_features['price'] ) && class_exists( 'LifterLMS' ) && ! llms_is_user_enrolled( get_current_user_id(), $post->ID ) ) { ?>
	<div class="course-take-rate clearfix">
		<div class="col-md-12">
			<?php
			echo do_shortcode('[lifterlms_pricing_table product="' . $post->ID . '"]');
			if ( class_exists( 'LifterLMS' ) && ! llms_is_user_enrolled( get_current_user_id(), $post->ID ) ) {
				if ( 'yes' === $course->get( 'time_period' ) ) {
						// if the start date hasn't passed yet
					if ( ! $course->has_date_passed( 'start_date' ) ) {
						echo '<div class="llms-notice">' . do_shortcode( $course->get( 'course_opens_message' ) ) . '</div>';
					} // course end date has passed
					elseif ( $course->has_date_passed( 'end_date' ) ) {
						echo '<div class="llms-error llms-notice">' . do_shortcode( $course->get( 'course_closed_message' ) ) . '</div>';

					} else {
						if ( ! llms_is_user_enrolled( get_current_user_id(), $post->ID ) ) {
							if ( $deep_options['deep_webnus_course_taking'] == 1 && class_exists( 'LLMS_Integration_WooCommerce' ) ) { // Take Course
								$post = get_post( get_the_ID() );
								// dont output the thumbnail here
								remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

								$ret = '';
								$ids = llms_product_get_wc_product_ids( $post->ID );

								if ( $ids ) {

									$num = count( $ids );
									// show 1-5 columns, when there's 6 products show two rows of 3 products each
									$cols = 6 === $num ? 3 : $num;

									$sort    = get_post_meta( $post->ID, '_llms_wc_product_sorting', true );
									$sort    = explode( ',', $sort );
									$orderby = ! empty( $sort[0] ) ? $sort[0] : 'menu_order';
									$order   = ! empty( $sort[1] ) ? strtolower( $sort[1] ) : 'asc';

									$ret = sprintf(
										'[products columns="%1$d" ids="%2$s" orderby="%3$s" order="%4$s"]',
										apply_filters( 'llms_wc_products_shortcode_cols', $cols, $post ),
										apply_filters( 'llms_wc_products_shortcode_ids', implode( ',', $ids ), $post ),
										apply_filters( 'llms_wc_products_shortcode_orderby', $orderby, $post ),
										apply_filters( 'llms_wc_products_shortcode_order', $order, $post )
									);

								}

								echo do_shortcode( apply_filters( 'llms_wc_product_shortcode', $ret, $post, $ids ) );

							} elseif ( $deep_options['deep_webnus_course_taking'] == 1 && class_exists( 'LifterLMS' ) ) {
								llms_get_template( 'product/pricing-table.php', array( 'product' => new LLMS_Product( get_the_id() ) ) );
							} elseif ( $deep_options['deep_webnus_course_taking'] == 2 ) {
								echo '<br><a href="' . $deep_options['deep_webnus_course_taking_custom'] . '" class="llms-button" target="_self">' . esc_html__( 'Take This Course', 'deep' ) . '</a>';
							}
						}
					}
				} else {
					if ( ! llms_is_user_enrolled( get_current_user_id(), $post->ID ) ) {
						if ( $deep_options['deep_webnus_course_taking'] == 1 && class_exists( 'LLMS_Integration_WooCommerce' ) ) { // Take Course

							// if alreay enrolled, dont show the links
							if ( llms_is_user_enrolled( get_current_user_id(), get_the_ID() ) ) {
								return;
							}

							$post = get_post( get_the_ID() );

							// if it's a course, check a few restrictions first
							if ( 'course' === $post->post_type ) {

								$course = llms_get_post( $post );
								if ( 'yes' === $course->get( 'enrollment_period' ) ) {
									if ( ! $course->has_date_passed( 'enrollment_start_date' ) ) {
										return llms_print_notice( $course->get( 'enrollment_opens_message' ), 'notice' );
									} elseif ( $course->has_date_passed( 'enrollment_end_date' ) ) {
										return llms_print_notice( $course->get( 'enrollment_closed_message' ), 'error' );
									}
								}
								if ( ! $course->has_capacity() ) {
									return llms_print_notice( $course->get( 'capacity_message' ), 'error' );
								}
							}

							// dont output the thumbnail here
							remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

							$ret = '';
							$ids = llms_product_get_wc_product_ids( $post->ID );

							if ( $ids ) {

								$num = count( $ids );
								// show 1-5 columns, when there's 6 products show two rows of 3 products each
								$cols = 6 === $num ? 3 : $num;

								$sort    = get_post_meta( $post->ID, '_llms_wc_product_sorting', true );
								$sort    = explode( ',', $sort );
								$orderby = ! empty( $sort[0] ) ? $sort[0] : 'menu_order';
								$order   = ! empty( $sort[1] ) ? strtolower( $sort[1] ) : 'asc';

								$ret = sprintf(
									'[products columns="%1$d" ids="%2$s" orderby="%3$s" order="%4$s"]',
									apply_filters( 'llms_wc_products_shortcode_cols', $cols, $post ),
									apply_filters( 'llms_wc_products_shortcode_ids', implode( ',', $ids ), $post ),
									apply_filters( 'llms_wc_products_shortcode_orderby', $orderby, $post ),
									apply_filters( 'llms_wc_products_shortcode_order', $order, $post )
								);

							}

							echo do_shortcode( apply_filters( 'llms_wc_product_shortcode', $ret, $post, $ids ) );

						} elseif ( $deep_options['deep_webnus_course_taking'] == 1 && class_exists( 'LifterLMS' ) ) {
							llms_get_template( 'product/pricing-table.php', array( 'product' => new LLMS_Product( get_the_id() ) ) );
						} elseif ( $deep_options['deep_webnus_course_taking'] == 2 ) {
							echo '<br><a href="' . $deep_options['deep_webnus_course_taking_custom'] . '" class="llms-button" target="_self">' . esc_html__( 'Take This Course', 'deep' ) . '</a>';
						}
					}
				}
				?>

				<?php
			} elseif ( ! class_exists( 'LifterLMS' ) ) {
				echo esc_html__( 'Course Price is: ', 'deep' ) . ' ' . $course_price . esc_html__( '$', 'deep' );
			}
			?>
		</div>
	</div>
<?php } ?>
<h4 class="course-titles"><?php esc_html_e( 'Course Details', 'deep' ); ?></h4>
<div class="course-details">
	<?php
	global $post;
	if ( class_exists( 'LifterLMS' ) ) {
	$course = new LLMS_Course( $post );
	// retrieve sections to use in the template
	$sections = $course->get_sections( 'posts' );
	}
	?>
	<?php
	if ( class_exists( 'LifterLMS' ) && ! llms_is_user_enrolled( get_current_user_id(), $post->ID ) && ! ( $post->post_excerpt ) ) {
	echo do_shortcode( $post->post_content );
	} elseif ( class_exists( 'LifterLMS' ) && ! llms_is_user_enrolled( get_current_user_id(), $post->ID ) ) {
	echo do_shortcode( $post->post_excerpt );
	} else {
	echo do_shortcode( $post->post_content );
	}

	if ( class_exists( 'LifterLMS' ) ) { ?>
	<?php if ( $course->get_video() ): ?>
	<div class="llms-video-wrapper">
	<div class="center-video">
	<?php echo $course->get_video(); ?>
	</div>
	</div>
	<?php endif;?>
	<?php if ( $course->get_audio() ): ?>
	<div class="llms-audio-wrapper">
	<div class="center-audio">
	<?php echo $course->get_audio(); ?>
	</div>
	</div>
	<?php endif;?>
	<?php } ?>
	<div class="clear"></div>
	<div class="llms-syllabus-wrapper">
	<?php if ( class_exists( 'LifterLMS' ) ) { ?>
	<?php if ( ! $sections ) : ?>
		<?php _e( 'This course does not have any sections.', 'deep' ); ?>
	<?php else : ?>
		<?php
		foreach ( $sections as $s ) :
			$section = new LLMS_Section( $s->ID );
			?>

			<?php if ( $lessons = $section->get_lessons( "posts" ) ) : ?>
				<?php ob_start(); ?>
				<?php foreach ( $lessons as $l ) : ?>
					<?php
					// llms_get_template( 'course/lesson-preview.php', array(
					// 'lesson' => new LLMS_Lesson( $l->ID ),
					// 'total_lessons' => count( $lessons ),
					// ) );
					$lesson        = new LLMS_Lesson( $l->ID );
					$total_lessons = count( $lessons );
					$locked        = llms_is_page_restricted( $lesson->get( 'id' ), get_current_user_id() );
					if ( llms_is_user_enrolled( get_current_user_id(), $post->ID ) && $lesson->is_complete() ) {
						$check    = '<span class="llms-lesson-complete"><i class="fa fa-check"></i></span>';
						$complete = ' is-complete has-icon';
					} elseif ( llms_is_user_enrolled( get_current_user_id(), $post->ID ) && apply_filters( 'lifterlms_display_lesson_complete_placeholders', true ) ) {
						$complete = ' has-icon';
						$check    = '<span class="llms-lesson-complete-placeholder"><i class="fa fa-check"></i></span>';
					} elseif ( $lesson->is_free() ) {
						$check    = '<span class="llms-lesson-complete-placeholder free"><i>' . esc_html__( 'FREE', 'deep' ) . '</i></span>';
						$complete = ' has-icon';
					} else {
						if ( apply_filters( 'lifterlms_display_lesson_complete_placeholders', true ) ) {
							$complete = ' has-icon';
							$check    = '<span class="llms-lesson-complete-placeholder"><i class="fa fa-lock"></i></span>';
						} else {
							$complete = ' has-icon';
							$check    = '<span class="llms-lesson-complete-placeholder"></span>';
						}
					}
					$free_class = ( $lesson->is_free() ) ? ' free' : '';
					$locked     = $locked ? ' llms-lesson-link-locked' : '';
					?>

					<div class="llms-lesson-preview<?php echo $lesson->get_preview_classes(); ?>">
						<?php
						if ( 'course' === get_post_type( get_the_ID() ) ) {
							if ( apply_filters( 'llms_display_outline_thumbnails', true ) && null !== get_the_post_thumbnail( $lesson->get( 'id' ) ) ) {
								$background_image_url = wp_get_attachment_url( get_post_thumbnail_id( $lesson->get( 'id' ) ) );
								$background_style     = '';
								$background_style     = ! empty( $background_image_url ) ? "background: url('{$background_image_url}') no-repeat center center;background-size: cover;" : '';
							}
						}
						?>
						<a style="<?php echo $background_style; ?>" class="llms-lesson-link<?php echo $free_class . ' ' . $locked; ?>" href="<?php echo ( ! $locked ) ? get_permalink( $lesson->get( 'id' ) ) : '#llms-lesson-locked'; ?>">
							<div class="lesson-overlay"></div>
							<div class="llms-lesson-information">
								<div class="container">
									<div class="col-sm-1">
										<?php echo $check; ?>
									</div>
									<div class="col-sm-6">
										<h5 class="llms-h5 llms-lesson-title"><?php echo $lesson->post->post_title; ?></h5>
									</div>
									<div class="col-sm-4">
										<span class="llms-lesson-icons">
										<?php
										if ( $lesson->has_content() ) {
											echo '<span class="lesson-tip" title="Lesson has content"><i title="" class="fa fa-book"></i></span>';
										}
										if ( get_post_meta( $l->ID, '_video_embed', true ) ) {
											echo '<span class="lesson-tip" title="Lesson has video"><i title="" class="fa fa-play-circle"></i></span>';
										}
										if ( get_post_meta( $l->ID, '_audio_embed', true ) ) {
											echo '<span class="lesson-tip" title="Lesson has audio"><i title="" class="fa fa-microphone"></i></span>';
										}
										if ( $lesson->get( 'assigned_quiz' ) ) {
											echo '<span class="lesson-tip" title="Assigned Quiz: ' . get_the_title( $lesson->get( 'assigned_quiz' ) ) . '"><i title="" class="fa fa-question-circle"></i></span>';
										}
										if ( $lesson->get_prerequisite() ) {
											echo '<span class="lesson-tip" title="Prerequisite: ' . get_the_title( $lesson->get_prerequisite() ) . '"><i title="" class="fa fa-lock"></i></span>';
										}
										if ( $lesson->get( 'days_before_available' ) ) {
											echo '<span class="lesson-tip" title="Drip Delay: ' . $lesson->get( 'days_before_available' ) . ' days"><i title="" class="fa fa-calendar"></i></span>';
										}
										?>
										</span>
									</div>
									<div class="col-sm-1">
										<span class="llms-lesson-counter"><?php echo $lesson->get_order(); ?> <?php esc_html_e( 'of', 'deep' ); ?> <?php echo count( $lessons ); ?></span>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="llms-lesson-excerpt"><?php echo llms_get_excerpt( $lesson->id ); ?></div>
								</div>
							</div>
							<div class="clear"></div>
						</a>
					</div>

				<?php endforeach; ?>
				<?php
				$out = ob_get_contents();
				ob_end_clean();
				?>
			<?php else : ?>
				<?php _e( 'This section does not have any lessons.', 'deep' ); ?>
			<?php endif; ?>
			<?php if ( apply_filters( 'llms_display_outline_section_titles', true ) ) : ?>
				<?php

					if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
						echo do_shortcode( '[accordion title="' . $section->post->post_title . '"]' . $out . '[/accordion]' );
					} 

					if ( is_plugin_active( 'elementor/elementor.php' ) ) {
						echo '<div class="title-llms-course">' . $section->post->post_title . '</div>';
						echo '<div class="llms-course-wrapp">' . $out . '</div>';
					} 

				?>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
	<?php } ?>
	<div class="clear"></div>
			</div>
</div>
					<?php
					if ( isset( $course_features['tags'] ) && $course_features['tags'] ) {
						the_terms( get_the_id(), 'course_tag', '<div class="post-tags"><i class="fa fa-tags"></i>', '', '</div>' );
					}
					?>

					<?php
					if ( class_exists( 'LLMS_Reviews' ) ) {
						$course_review = new LLMS_Reviews();
						add_filter( 'webnus_course_after', array( $course_review, 'output' ), 30 );
						do_action( 'webnus_course_after' );
					}
					?>
		</article>
					<?php
	endwhile;
	endif;
	wp_reset_query();
	$post_ids[] = $post->ID;
	$author_id  = get_the_author_meta( 'ID' );
	$args       = array(
		'post__not_in' => $post_ids,
		'showposts'    => 3,
		'orderby'      => 'date',
		'order'        => 'desc',
		'post_type'    => 'course',
		'author'       => $author_id,
	);
	$rec_query  = new wp_query( $args );
	if ( $rec_query->have_posts() ) {
		echo '<hr class="vertical-space2"><h4 class="course-titles">' . esc_html__( 'More Courses by this Instructor', 'deep' ) . '</h4><hr class="vertical-space1">';
		echo '<div class="row recent-course">';
		while ( $rec_query->have_posts() ) {
			$rec_query->the_post();
			global $wpdb;
			$post_id         = get_the_ID();
			$students        = $wpdb->get_results( $wpdb->prepare( 'SELECT	user_id, meta_value, post_id FROM ' . $wpdb->prefix . 'lifterlms_user_postmeta WHERE meta_key = "_status"	AND meta_value = "Enrolled"	AND post_id = %d AND EXISTS(SELECT 1 FROM ' . $wpdb->prefix . 'users WHERE ID = user_id)	group by user_id', $post->ID ) );
			$course_students = rwmb_meta( 'michigan_course_students_meta' ) ? rwmb_meta( 'michigan_course_students_meta' ) : count( $students );
			?>
		<div class="col-md-4 col-sm-4">
		<article class="modern-grid llms-course-list"><div class="llms-course-link">
			<?php
			if ( get_the_terms( $post->ID, 'course_cat' ) ) {
				echo '<div class="modern-cat">';
				$categories = get_the_terms( $post->ID, 'course_cat' );
				$typeName   = array();
				foreach ( $categories as $category ) {
					$cat_icon   = ( function_exists( 'tax_icons_output_term_icon' ) ) ? tax_icons_output_term_icon( $category->term_id ) : '';
					$typeName[] = '<a class="hcolorf" href="' . esc_url( get_category_link( $category ) ) . '" title="' . esc_attr( sprintf( esc_html__( 'View all courses under %s', 'deep' ), $category->name ) ) . '">' . $cat_icon . esc_html( $category->name ) . '</a>';
				}
				echo implode( ', ', $typeName );
				echo '</div>';
			}
		?>
	<div class="modern-feature"><a class="" href="<?php the_permalink(); ?>">
		<?php
		if ( has_post_thumbnail( $post->ID ) ) {
			$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'deep_webnus_blog2_img' );
			if ( $img ) {
				echo apply_filters( 'lifterlms_featured_img', '<img src="' . $img[0] . '" alt="Placeholder" class="llms-course-image llms-featured-imaged wp-post-image" />' );
			}
		} elseif ( function_exists( 'llms_placeholder_img_src' ) ) {
			if ( llms_placeholder_img_src() ) {
				$no_img = get_template_directory_uri() . '/images/course_no_image.png';
				echo apply_filters( 'lifterlms_placeholder_img', '<img src="' . $no_img . '" alt="Placeholder" class="llms-course-image llms-placeholder wp-post-image" />' );
			}
		}
		echo '</a>';
		if ( class_exists( 'LLMS_Product' ) ) {
			global $course;
			$course_duration = get_post_meta( $post->ID, '_llms_length', true );
			echo ( $course_duration ) ? '<span class="modern-duration">' . $course_duration . '<i class="fa fa-clock-o"></i></span>' : '';
		}
		?>
	</div>
	<div class="modern-content">
	<h3 class="llms-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php
		if ( function_exists( 'the_ratings' ) ) {
			echo expand_ratings_template( '<div class="modern-rating"><span class="rating">%RATINGS_IMAGES%</span> <strong>(%RATINGS_USERS% ' . esc_html__( 'Votes', 'deep' ) . ')</strong></div>', $post->ID );
		}

		if ( class_exists( 'LLMS_Product' ) ) {
			echo '<div class="llms-price-wrapper"><h4 class="llms-price"><span>';
			deep_michigan_course_price();
			echo '</span></h4></div>';
		} else {
			if ( rwmb_meta( 'michigan_course_price_meta' ) ) {
				echo '<div class="llms-price-wrapper"><h4 class="llms-price"><span>';
				deep_michigan_course_price();
				echo '</span></h4></div>';
			}
		}

		?>
	</div>
	<div class="clearfix modern-meta">
	<div class="col-md-8 col-sm-8 col-xs-8">
	<?php
		$instructor_title = '<a href="' . get_author_posts_url( $author_id ) . '">' . get_avatar( get_the_author_meta( 'user_email', $author_id ), 20 ) . get_the_author_meta( 'display_name', $author_id ) . '</a>';
		echo '<div class="modern-instructor">' . $instructor_title . '</div>';
	?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-4">
	<?php
		echo ( $course_students ) ? '<span class="modern-students" title="' . esc_attr( 'Enrolled Students', 'deep' ) . '"><i class="sl-people"></i>' . $course_students . '</span>' : '<span class="modern-viewers" title="' . esc_attr( 'Viewers', 'deep' ) . '"><i class="fa fa-eye"></i>' . deep_getViews( $post->ID ) . '</span>';
	?>
	</div>
	</div>
	</div></article>
	</div>
			<?php
		}
		echo '</div>'; // close row
	}
	wp_reset_postdata();
	if ( isset( $course_features['comment'] ) && $course_features['comment'] ) {
		comments_template();
	}
	?>
	</section>
	<div class="col-md-3 sidebar">
		<aside class="course-bar">
			<?php
			if ( class_exists( 'LifterLMS' ) && llms_is_user_enrolled( get_current_user_id(), $post->ID ) ) {
				$student  = new LLMS_Student();
				$progress = $student->get_progress( $post->ID, 'course' );
				if ( $lesson = $student->get_next_lesson( $post->ID ) ) {
					echo '<a class="llms-button-primary wn-button" href="' . get_permalink( $lesson ) . '">';
					if ( 0 == $progress ) {
						esc_html_e( 'Get Started', 'deep' );
					} else {
						esc_html_e( 'Continue', 'deep' );
					}
					echo '</a>';
				}
			}

			if ( isset( $course_features['instructor'] ) && $course_features['instructor'] ) {
				get_template_part( 'parts/instructor-box' );
			}
			if ( isset( $course_features['rating'] ) && $course_features['rating'] && function_exists( 'the_ratings' ) ) {
				?>
					<div class="widget course-rating">
						<h4><?php esc_html_e( 'Course Rating', 'deep' ); ?></h4>
						<div id="rating-box">
							<?php the_ratings(); ?>
						 </div>
					 </div>
				<?php
			}
			if ( isset( $course_features['enrolled'] ) && $course_features['enrolled'] ) {
				get_template_part( 'parts/students' );
			}
			if ( isset( $course_features['sharing'] ) && $course_features['sharing'] ) {
				get_template_part( 'parts/sharing' );
			}
			if ( is_active_sidebar( 'llms_course_widgets_side' ) ) {
				dynamic_sidebar( 'llms_course_widgets_side' );}
			?>
		</aside>
	</div>
</div>
<!-- end-main-content -->
<div class="white-space"></div>
</section>
<?php get_footer(); ?>

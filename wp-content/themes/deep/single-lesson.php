<?php
/******************/
/**  Single Lesson
/******************/
	get_header();

	add_filter('wp_kses_allowed_html','allow_post_tags', 1);

	$deep_options = deep_options();
	deep_setViews( get_the_ID() );
	$lesson_features = $deep_options['deep_webnus_lesson_features'];
	
	if (!$lesson) {
		$quiz_session = LLMS()->session->get( 'llms_quiz' );
		$lesson = $quiz_session->assoc_lesson;
		$lesson_link = get_permalink( $lesson );
	} else {
		$lesson_link = get_permalink( $lesson );
	}

	$content = get_the_content();

	?>
<section class="container page-content" >
	<hr class="vertical-space2">
	<?php if( have_posts() ): while( have_posts() ): the_post(); ?>
	<?php
		if( $deep_options['deep_webnus_enable_breadcrumbs'] ) {
			
			//Breadcrumb
			$homeLink 	= esc_url(home_url('/'));
			$lesson 	= new LLMS_Lesson( $post->ID );

			$course_permalink = get_permalink( $lesson->get_parent_course() );
			$course_title = get_the_title( $lesson->get_parent_course() );
			$cat = (get_the_term_list($lesson->get_parent_course(), 'course_cat','',', ' ))? '<i class="fa-angle-right"></i> '.get_the_term_list($lesson->get_parent_course(), 'course_cat','',', ' ) : '';
			echo '<div class="breadcrumbs-w"><div class="container"><div id="crumbs"><a href="'.$homeLink.'">'.esc_html__('Home','deep').'</a> <i class="fa-angle-right"></i> <a href="' . $homeLink . 'courses/">' .esc_html__('Courses','deep'). '</a> '. $cat .'  <i class="fa-angle-right"></i> <a href="'.$course_permalink.'" >'.$course_title.'</a>   <i class="fa-angle-right"></i> <span class="current">'.get_the_title().'</span></div></div></div>';
		}
	?>

	<div class="col-md-12 blgt1-top-sec">
		<h1 class="post-title-ps1"><?php the_title() ?></h1>
		<?php if ( isset( $lesson_features['date'] ) && $lesson_features['date'] ) { ?>
			<h6><?php the_time( get_option( 'date_format' ) ) ?></h6>
		<?php } ?>

	</div>

	<section class="col-md-9 lesson-content cntt-w">
		<article class="blog-single-post">

			<?php if(isset($lesson_features['image']) && $lesson_features['image'] && has_post_thumbnail()){ ?>
				<div class="post-trait-w">
					<?php get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'Full', 'link_to_post' => false, ) ); 	?>
				</div>
			<?php } ?>

			<div <?php post_class('post'); ?>>
				<?php
				if( $post->post_content ) {
					if ( is_single( $post ) ) {
						echo '<p class="w-lesson-content">';
							the_content();
						echo '</p>';
					} else {
						the_excerpt();
					}
				}elseif( !($post->post_content) && ( isset($lesson->video_embed) || isset($lesson->audio_embed) ) ) {
					if (isset($lesson->video_embed)){ ?>
						<div class="llms-video-wrapper">
							<div class="center-video">
								<?php echo $lesson->get_video(); ?>
							</div>
						</div>
						<?php }

						//lesson audio
						if (isset($lesson->audio_embed)){ ?>
						<div class="llms-audio-wrapper">
							<div class="center-audio">
								<?php echo $lesson->get_audio(); ?>
							</div>
						</div>
						<?php }
						echo '<div class="lesson-button-navigation">';
						llms_get_template( 'course/complete-lesson-link.php' );
						llms_get_template( 'course/lesson-navigation.php' );
						echo '</div>';
				} ?>
				<?php endwhile; endif; ?>
			</div>

		</article>
	<?php 
		if( isset( $lesson_features['comment'] ) && $lesson_features['comment'] )
		comments_template(); ?>

	</section>
	<!-- end-main-conten -->

	<div class="col-md-3 sidebar">
		<aside class="course-bar">
			<?php //back to course
			if(isset($lesson_features['instructor']) && $lesson_features['instructor']){
				get_template_part('parts/instructor-box' );
			}
			if(is_active_sidebar('llms_lesson_widgets_side')) dynamic_sidebar( 'llms_lesson_widgets_side' );
			?>
		</aside>
	</div>

	<div class="white-space"></div>
</section>
<?php get_footer();
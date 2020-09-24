<?php
/**
 * @author 		codeBOX
 * @package 	lifterLMS/Templates
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

global $post;

$lesson = new LLMS_Lesson( $post->ID );

$prev_id = $lesson->get_previous_lesson();
$next_id = $lesson->get_next_lesson();
$locked = llms_is_page_restricted( $lesson->get( 'id' ), get_current_user_id() );
?>

<nav class="llms-course-navigation">

	<?php if ( $prev_id ) : ?>

		<div class="llms-course-nav llms-prev-lesson">
			<?php
				$lesson = new LLMS_Lesson( $prev_id );
				$pre_text = esc_html__( 'Previous Lesson', 'deep' );
			?>

			<div class="llms-lesson-preview prev-lesson previous<?php echo esc_attr( $lesson->get_preview_classes() ); ?>">
				<a class="llms-lesson-link<?php echo esc_attr( $locked ) ? ' llms-lesson-link-locked' : ''; ?>" href="<?php echo ( ! $locked ) ? get_permalink( $lesson->get( 'id' ) ) : '#llms-lesson-locked'; ?>">

					<?php if ( 'course' === get_post_type( get_the_ID() ) ) : ?>

						<?php  if ( apply_filters( 'llms_display_outline_thumbnails', true )  && $thumb = get_the_post_thumbnail( $lesson->get( 'id' ) ) ) : ?>
							<div class="llms-lesson-thumbnail"><?php echo wp_kses_post( $thumb ); ?></div>
						<?php endif; ?>

						<aside class="llms-extra">
							<span class="llms-lesson-counter"><?php printf( _x( '%1$d of %1$d', 'lesson order within section', 'deep' ), $lesson->get_order(), $total_lessons ); ?></span>
							<?php echo wp_kses_post( $lesson->get_preview_icon_html() ); ?>
						</aside>

					<?php endif; ?>

					<section class="llms-main">
						<?php if ( 'lesson' === get_post_type( get_the_ID() ) ) : ?>
							<span class="llms-pre-text"><?php echo wp_kses_post( $pre_text ); ?></span>
						<?php endif; ?>
						<h5 class="llms-h5 llms-lesson-title"><?php echo get_the_title( $lesson->get( 'id' ) ) ?></h5>
					</section>

					<div class="clear"></div>
				</a>
			</div>

		</div>

	<?php endif; ?>

	<?php if ( ! $prev_id || ! $next_id ) : ?>
		<div class="llms-course-nav llms-back-to-course">
			<div class="llms-lesson-preview prev-lesson previous">
				<a class="llms-lesson-link" href="<?php echo get_permalink( $lesson->get_parent_course() ); ?>">
					<section class="llms-main">
						<span class="llms-pre-text"><?php echo __( 'Back to Course', 'deep' ); ?></span>
						<h5 class="llms-h5 llms-lesson-title"><?php echo get_the_title( $lesson->get_parent_course() ) ?></h5>
					</section>
				</a>
			</div>
			
		</div>
	<?php endif; ?>

	<?php if ( $next_id ) : ?>

		<div class="llms-course-nav llms-next-lesson">
			<?php
			$lesson = new LLMS_Lesson( $next_id );
			$pre_text = esc_html__( 'Next Lesson', 'deep' );
			?>

			<div class="llms-lesson-preview  next-lesson next<?php echo esc_attr( $lesson->get_preview_classes() ); ?>">
				<a class="llms-lesson-link<?php echo esc_attr( $locked ) ? ' llms-lesson-link-locked' : ''; ?>" href="<?php echo ( ! $locked ) ? get_permalink( $lesson->get( 'id' ) ) : '#llms-lesson-locked'; ?>">

					<?php if ( 'course' === get_post_type( get_the_ID() ) ) : ?>

						<?php  if ( apply_filters( 'llms_display_outline_thumbnails', true )  && $thumb = get_the_post_thumbnail( $lesson->get( 'id' ) ) ) : ?>
							<div class="llms-lesson-thumbnail"><?php echo wp_kses_post( $thumb ); ?></div>
						<?php endif; ?>

						<aside class="llms-extra">
							<span class="llms-lesson-counter"><?php printf( _x( '%1$d of %1$d', 'lesson order within section', 'deep' ), $lesson->get_order(), $total_lessons ); ?></span>
							<?php echo wp_kses_post( $lesson->get_preview_icon_html() ); ?>
						</aside>

					<?php endif; ?>

					<section class="llms-main">
						<?php if ( 'lesson' === get_post_type( get_the_ID() ) ) : ?>
							<span class="llms-pre-text"><?php echo wp_kses_post( $pre_text ); ?></span>
						<?php endif; ?>
						<h5 class="llms-h5 llms-lesson-title"><?php echo get_the_title( $lesson->get( 'id' ) ) ?></h5>
					</section>

					<div class="clear"></div>
				</a>
			</div>

		</div>

	<?php endif; ?>



</nav>
<div class="clear"></div>

<?php return;


if ( $lesson->get_previous_lesson() ) {
	;
	$previous_lesson_link = get_permalink( $previous_lesson_id );
?>

	<div class="llms-lesson-preview prev-lesson previous">
		<a class="llms-lesson-link" href="<?php echo esc_url( $previous_lesson_link ); ?>" alt="<?php echo __( 'Previous Lesson', 'deep' ); ?>">
			<span class="llms-span"><?php echo __( 'Previous Lesson', 'deep' ); ?>:</span>
			<h5 class="llms-h5"><?php echo get_the_title( $previous_lesson_id ) ?></h5>
			<?php if (get_option( 'lifterlms_lesson_nav_display_excerpt', 'no' ) == 'yes') { echo '<p>' . llms_get_excerpt( $previous_lesson_id ) . '</p>'; } ?>
		</a>
	</div>

<?php }

if ( ! $lesson->get_previous_lesson() || ! $lesson->get_next_lesson() ) {
	$parent_style = $lesson->get_next_lesson() ? 'llms-lesson-preview prev-lesson previous' : 'llms-lesson-preview next-lesson next';
	$parent_course_id = $lesson->get_parent_course();
	$parent_course_link = get_permalink( $parent_course_id );

?>
	<div class="llms-lesson-preview <?php echo esc_attr( $parent_style ); ?>">
		<a class="llms-lesson-link" href="<?php echo esc_url( $parent_course_link ); ?>" alt="<?php echo __( 'Back to Course', 'deep' ); ?>">
			<span class="llms-span"><?php echo __( 'Back to Course', 'deep' ); ?>:</span>
			<h5 class="llms-h5"><?php echo get_the_title( $parent_course_id ) ?></h5>
		</a>
	</div>
<?php }

if ( $lesson->get_next_lesson() ) {
	$next_lesson_id = $lesson->get_next_lesson();
	$next_lesson_link = get_permalink( $next_lesson_id );
?>

	<div class="llms-lesson-preview next-lesson next">
		<a class="llms-lesson-link" href="<?php echo esc_url( $next_lesson_link ); ?>" alt="<?php echo __( 'Next Lesson', 'deep' ); ?>">
			<span class="llms-span"><?php echo __( 'Next Lesson', 'deep' ); ?>:</span>
			<h5 class="llms-h5"><?php echo get_the_title( $next_lesson_id ) ?></h5>
			<?php if (get_option( 'lifterlms_lesson_nav_display_excerpt', 'no' ) == 'yes') { echo '<p>' . llms_get_excerpt( $next_lesson_id ) . '</p>'; } ?>
		</a>
	</div>

<?php } ?>

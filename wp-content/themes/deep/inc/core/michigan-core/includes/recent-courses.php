<?php 
class Michigan_Recent_Courses extends WP_Widget {
	function __construct() {
		$params = array(
			'description' => 'Recent Courses',
			'name'        => 'Webnus Recent Courses',
		);
		parent::__construct( 'Michigan_Recent_Courses', '', $params );
	}
	public function form( $instance ) {
		extract( $instance ); 
		$title = esc_html( 'Recent Courses', 'deep' );
		$count = '3'; ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'deep' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php esc_html_e( 'Count:', 'deep' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>">
		</p>
		<?php
	}
	public function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		wp_kses_post( $before_widget );
		if ( ! empty( $title ) ) {
			echo wp_kses_post( $before_title . esc_html( $title ) . $after_title );
		}
		$course_price = rwmb_meta( 'michigan_course_price_meta' );

		global $post;
		$query = new \WP_Query('post_type=course&posts_per_page=3');

		echo '<div class="modern-grid llms-course-list deep-recent-courses owl-carousel owl-theme">';
		if( have_posts() ) { 
			while ( $query->have_posts() ) {
				$query->the_post();
				if ( class_exists( 'LifterLMS' ) ) {
					global $wpdb;
					$students        = $wpdb->get_results( $wpdb->prepare( 'SELECT	user_id, meta_value, post_id FROM ' . $wpdb->prefix . 'lifterlms_user_postmeta WHERE meta_key = "_status"	AND meta_value = "Enrolled"	AND post_id = %d AND EXISTS(SELECT 1 FROM ' . $wpdb->prefix . 'users WHERE ID = user_id)	group by user_id', $post->ID ) );
					$course_students = rwmb_meta( 'michigan_course_students_meta' ) ? rwmb_meta( 'michigan_course_students_meta' ) : count( $students );
				} ?>
				<div class="llms-course-link">
					<div class="modern-feature"><a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail();?>
					</div>
					<div class="modern-content">
						<h3 class="llms-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
						<div class="modern-rating"><span class="rating">
						<?php
						if ( function_exists( 'the_ratings' ) ) {
							echo expand_ratings_template( '<div class="modern-rating"><span class="rating">%RATINGS_IMAGES%</span> <strong>(%RATINGS_USERS% ' . esc_html__( 'Votes', 'deep' ) . ')</strong></div>', $post->ID );
						} ?>
						</div>					
						<div class="llms-price-wrapper">
							<h5 class="llms-price">
								<span><?php deep_michigan_course_price();?></span>
							</h5>
						</div>
						<div class="clearfix modern-meta">
						<div class="col-md-8 col-sm-8 col-xs-8">
							<div class="modern-instructor">
								<?php echo get_avatar(get_the_author_meta('ID'), 20) ?>
								<?php the_author_meta( 'nickname'); ?>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4">
							<?php echo ( $course_students ) ? '<span class="modern-students" title="' . esc_attr( 'Enrolled Students', 'deep' ) . '"><i class="sl-people"></i>' . $course_students . '</span>' : '<span class="modern-viewers" title="' . esc_attr( 'Viewers', 'deep' ) . '"><i class="fa fa-eye"></i>' . deep_getViews( $post->ID ) . '</span>'; ?>
						</div>					
						</div>
					</div>
				</div>
			<?php }
		}
		echo '</div>';
		wp_reset_query();		
		echo '' . $after_widget;
	}
}
add_action( 'widgets_init', 'michigan_Recent_Courses' );
function michigan_Recent_Courses() {
	register_widget( 'Michigan_Recent_Courses' );
}

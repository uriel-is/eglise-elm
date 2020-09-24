<?php 
class Michigan_Course_Sharing extends WP_Widget {
	function __construct() {
		$params = array(
			'description' => 'Display social sharing icons',
			'name'        => 'Webnus course sharing box',
		);
		parent::__construct( 'Michigan_Course_Sharing', '', $params );
	}
	public function form( $instance ) {
		extract( $instance ); 
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_attr( 'Share this course' );?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'deep' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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

		$get_post_id = get_queried_object();
		if ( $get_post_id ) {
			$post_id = $get_post_id->ID;
			$post_url = get_permalink( $post_id );
			$post_title = get_the_title( $post_id );
		}		
		?>
		
		<div class="deep-course-sharing-widget">
			<ul>
				<li>
					<a href="https://www.facebook.com/share?<?php echo esc_url( $post_url ) ?>" class="course-sharing-widget-facebook"><i class="wn-icon wn-fab wn-fa-facebook"></i></a>
					<a href="https://twitter.com/intent/tweet?url=<?php echo esc_url( $post_url ) ?>&text=<?php echo esc_attr( $post_title ) ?>" class="course-sharing-widget-twitter"><i class="wn-icon wn-fab wn-fa-twitter"></i></a>
					<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( $post_url ) ?>&title=<?php echo esc_attr( $post_title ) ?>" class="course-sharing-widget-linkedin"><i class="wn-icon wn-fab wn-fa-linkedin"></i></a>
					<a href="https://reddit.com/submit?url=<?php echo esc_url( $post_url ) ?>&title=<?php echo esc_attr( $post_title ) ?>" class="course-sharing-widget-reddit"><i class="wn-icon wn-fab wn-fa-reddit"></i></a>
					<a href="mailto:?subject=<?php echo esc_attr( $post_title ) ?>" class="course-sharing-widget-email"><i class="wn-icon wn-fas wn-fa-envelope"></i></a>
				</li>
			</ul>
		</div>
			
		<?php
		echo '' . $after_widget;
	}
}
add_action( 'widgets_init', 'michigan_course_social_sharing' );
function michigan_course_social_sharing() {
	register_widget( 'Michigan_Course_Sharing' );
}

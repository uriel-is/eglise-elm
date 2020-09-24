<?php 
class Michigan_Course_Instructor extends WP_Widget {
	function __construct() {
		$params = array(
			'description' => 'Display Instructor',
			'name'        => 'Webnus Course Instructor',
		);
		parent::__construct( 'Michigan_Course_Instructor', '', $params );
	}
	public function form( $instance ) {
		extract( $instance ); 
		$title = esc_html( 'Instructor', 'deep' ) ?>
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
		
		<div class="deep-course-instructor-widget">
			<div class="course-instructor-avatar">
				<?php echo get_avatar(get_the_author_meta('ID'), 300) ?>
			</div>
			<div class="course-instructor-name">
				<?php 
					esc_html_e( 'Course Instructor: ', 'deep' );
					echo get_the_author_meta('display_name');
					
				?>
			</div>
		</div>
			
		<?php
		echo '' . $after_widget;
	}
}
add_action( 'widgets_init', 'michigan_course_instructor' );
function michigan_course_instructor() {
	register_widget( 'Michigan_Course_Instructor' );
}

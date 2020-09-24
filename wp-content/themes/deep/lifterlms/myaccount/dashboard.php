<?php
/**
 * My Account page
 *
 * @author 		codeBOX
 * @package 	lifterlMS/Templates
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

llms_print_notices();
?>

<div class="llms-sd-tab dashboard">

	<?php do_action( 'lifterlms_before_student_dashboard_tab' ); ?>

	<section id="headline" class="my-courses">
		<div class="container">
		<div class="col-md-10"><h2>
		<?php esc_html_e('Hello ','deep');
		$current_user = wp_get_current_user();
		echo ! empty( $current_user->display_name ) ? esc_html( $current_user->display_name ) : esc_html( $current_user->user_login ) ;
		echo '</h2>';
		if (current_user_can('edit_posts')){
		echo '<span>'.esc_html__('What would you like to teach today?', 'deep').'</span>';
		echo '</div><div class="col-md-2"><a class="dashboard-button colorb" href="'.admin_url().'edit.php?post_type=course">'.esc_html__( 'Manage Courses', 'deep' ).'</a></div>';
		}else{
		echo '<span>'.esc_html__('What would you like to learn today?', 'deep').'</span>';
		echo '</div><div class="col-md-2"><a class="dashboard-button colorb" href="'.esc_url(home_url('/')).'courses">'.esc_html__( 'Courses', 'deep' ).'</a></div>';
		}
		?>
		</div>
	</section>

	<?php echo apply_filters( 'lifterlms_account_greeting', '' ); ?>

	<?php do_action( 'lifterlms_after_student_dashboard_greeting' ); ?>

	<?php llms_get_template( 'myaccount/my-courses.php' ); ?>

	<?php llms_get_template( 'myaccount/my-certificates.php' ); ?>

	<?php do_action( 'lifterlms_after_student_dashboard_tab' ); ?>

</div>

<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="wrap about-wrap wn-admin-wrap">

	<h1><?php echo esc_html__( 'Welcome to ', 'deep' ) . Deep_Admin::theme( 'name' ); ?></h1>
	<div class="about-text"><?php echo Deep_Admin::theme( 'name' ) . esc_html__( ' is now installed and ready to use! Let’s convert your imaginations to reality on the web!', 'deep' ); ?></div>
	<div class="wp-badge"><?php printf( esc_html__( 'Version %s', 'deep' ), Deep_Admin::theme( 'version' ) ); ?></div>
	<?php do_action( 'deep_before_start_dashboard' ); ?>
	<h2 class="nav-tab-wrapper wp-clearfix">	
		<?php
		// Dashboard Menu
		Deep_Admin::dashboard_menu();
		?>
	</h2>

	<!-- WP Super Cache  -->
	<div id="webnus-dashboard" class="wrap about-wrap">
		<div class="welcome-content w-clearfix extra">
			<div class="w-row">
				<div class="w-col-sm-12">
					<div class="w-box dp-dsb-performance free">
						<div class="w-box-head"> <?php esc_html_e( 'Free Performance Optimization', 'deep' ); ?> </div>
						<div class="w-box-content">
							<p><?php esc_html_e( 'You can optimize your website in 2 ways and you will get great results either way. We use "WP rocket " in our premium solution. In order to see the documentations for this plugin see the section below. Also, we use "WP Super Cache" and "Autoptimize" plugins in our free solution. In order to work with this plugin please see the section below.
Yours sincerely,', 'deep' ); ?> </p>							
							<div><a href="<?php echo esc_url( 'https://wordpress.org/plugins/wp-super-cache/' ); ?>" target="_blank"><?php esc_html_e( 'WP Super Cache', 'deep' ); ?> <i class="ti-arrow-right"></i></a> <a href="<?php echo esc_url( 'https://www.isitwp.com/wordpress-plugins/wp-super-cache/' ); ?>" target="_blank"><?php esc_html_e( 'WP Super Cache Features', 'deep' ); ?> <i class="ti-arrow-right"></i></a></div>
							<div><span class="rkt-title"><?php echo esc_html__( 'Increase Website Preformance By Using', 'deep' ) . ' ' . Deep_Admin::theme( 'name' ) . ' ' . esc_html__( 'Theme and WP Super Cache', 'deep' ); ?>:</span><a href="<?php echo esc_url( 'https://webnus.net/deep-premium-wordpress-theme-documentation/increase-page-speed/' ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'deep' ); ?> <i class="ti-arrow-right"></i></a></div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<!-- Rocket  -->
	<div id="webnus-dashboard" class="wrap about-wrap">
		<div class="welcome-content w-clearfix extra">
			<div class="w-row">
				<div class="w-col-sm-12">
					<div class="w-box dp-dsb-performance">
						<div class="w-box-head"> <?php esc_html_e( 'Performance Optimization', 'deep' ); ?> </div>
						<div class="w-box-content">
							<p><?php esc_html_e( 'Webnus partners with WP Rocket for best-in-class cache and performance optimization. Improve the performance and loading speed of your WordPress website today.', 'deep' ); ?> </p>
							<span><strong><?php esc_html_e( 'Note:', 'deep' ); ?></strong> <?php esc_html_e( 'WP Rocket is a third party plugin. It is not built or supported by Webnus', 'deep' ); ?></span><span class="rkt-title"><?php esc_html_e( 'More on WP Rocket', 'deep' ); ?>:</span>
							<div><a href="<?php echo esc_url( 'https://wp-rocket.me/' ); ?>" target="_blank"><?php esc_html_e( 'WP Rocket Website', 'deep' ); ?> <i class="ti-arrow-right"></i></a> <a href="<?php echo esc_url( 'https://wp-rocket.me/features/' ); ?>" target="_blank"><?php esc_html_e( 'WP Rocket Features', 'deep' ); ?> <i class="ti-arrow-right"></i></a> <a href="<?php echo esc_url( 'https://docs.wp-rocket.me/' ); ?>" target="_blank"><?php esc_html_e( 'WP Rocket Documentation', 'deep' ); ?> <i class="ti-arrow-right"></i></a></div>
							<div><span class="rkt-title"><?php echo esc_html__( 'Increase Website Preformance By Using', 'deep' ) . ' ' . Deep_Admin::theme( 'name' ) . ' ' . esc_html__( 'Theme and Wp Rocket', 'deep' ); ?>:</span><a href="<?php echo esc_url( 'https://webnus.net/deep-premium-wordpress-theme-documentation/increase-page-speed/' ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'deep' ); ?> <i class="ti-arrow-right"></i></a></div>
							<div class="w-rktbox">
							<div class="wp-rocket-logo"></div>
							<div><span><?php esc_html_e( 'Click the button below to', 'deep' ); ?> </span><span class="rkt-off"><?php esc_html_e( 'get 20% off!', 'deep' ); ?></span></div>
							<div class="w-button"><a href="<?php echo esc_url( 'https://wp-rocket.me/pricing/?utm_source=wp_theme&utm_campaign=deep&utm_medium=partnership' ); ?>" target="_blank"><?php esc_html_e( 'BUY NOW', 'deep' ); ?></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div> <!-- end wrap -->
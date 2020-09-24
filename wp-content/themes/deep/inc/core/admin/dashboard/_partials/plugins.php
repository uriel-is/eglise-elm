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

	<div class="wn-plugins wn-theme-browser-wrap">
		<?php
			$tgmpa_list_table	= new TGMPA_List_Table;
			$plugins			= TGM_Plugin_Activation::$instance->plugins;
		?>
		<div class="wn-plugins-categories">
			<a href="#" class="wn-plugin-selected" data-filter="*">All <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".premium">Premium <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".builder">Page Builder <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".slider">Slider <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".free">Free <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".buddypress">Buddypress <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".woocommerce">Woocommerce <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".webnus">Webnus <span class="wn-filter-count"></span></a>
			<a href="#" class="" data-filter=".hotel">Hotel <span class="wn-filter-count"></span></a>
		</div>
		<?php	
		
		if ( get_option( 'deep_purchase_validation', '' ) != 'success' || Deep_Envato::$purchase_date < Deep_Envato::$current_date ) {
			echo '
			<div id="wnPluginPurchaseCode">
				<div class="ppc-contents">
					<p style="font-size: 18px;"><b style="color: #ff7859;">' . esc_html__( 'Theme Activation', 'deep' ) . '</b>' . esc_html__( ' is required to install Plugins, Please visit the Dashboard tab and enter a valid ', 'deep' )  . '<b>' . esc_html__( 'purchase code', 'deep' ) . '</b>.</p>
					<div class="btn-wrap">
						<a class="importer-button" href="' . esc_url( self_admin_url( 'admin.php?page=wn-admin-welcome' ) ) . '">' . esc_html__( 'Dashboard Tab', 'deep' ) . '</a>
					</div>
				</div>
			</div>
			';
		}
		?>
		<div class="theme-browser rendered">
			<div class="themes">

			<?php
			foreach( $plugins as $plugin ) :

				$plugin_status				= '';
				$plugin['type']				= isset( $plugin['type'] ) ? $plugin['type'] : 'recommended';
				$plugin['sanitized_plugin']	= $plugin['name'];

				$plugin_action = $tgmpa_list_table->actions_plugin( $plugin );

				if ( is_plugin_active( $plugin['file_path'] ) ) {
					$plugin_status = 'active';
				}

				$category = $plugin['category']

				?>

				<div class="theme <?php echo esc_attr( $plugin_status ); ?> <?php echo $category; ?>">

					<?php if ( $plugin['type'] == 'Required' ) : ?>
						<div class="plugin-required"><?php esc_html_e( 'REQUIRED', 'deep' ); ?></div>
					<?php endif; ?>

					<div class="theme-screenshot">
						<img src="<?php echo esc_url( $plugin['image_src'] ); ?>" alt="">
					</div>

					<h3 class="theme-name"><?php echo esc_html( $plugin['name'] ); ?></h3>
					<?php if (get_option( 'deep_purchase_validation', '' ) == 'success') { ?>
						<div class="theme-actions"><?php echo '' . $plugin_action; ?></div>
					<?php } ?>

				</div>

			<?php endforeach; ?>

			</div>
		</div>
	</div>

</div> <!-- end wrap -->
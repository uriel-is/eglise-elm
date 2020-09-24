<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define directories
if ( ! defined( 'DEEP_DIR' ) ) {
	define( 'DEEP_DIR', get_template_directory() . '/' );
}
if ( ! defined( 'DEEP_URL' ) ) {
	define( 'DEEP_URL', get_template_directory_uri() );
}
if ( ! defined( 'DEEP_ASSETS_URL' ) ) {
	define( 'DEEP_ASSETS_URL', DEEP_URL . '/assets/dist/' );
}
if ( ! defined( 'DEEP_ASSETS_DIR' ) ) {
	define( 'DEEP_ASSETS_DIR', DEEP_DIR . 'assets/dist/' );
}
if ( ! defined( 'DEEP_INCLUDES_DIR' ) ) {
	define( 'DEEP_INCLUDES_DIR', DEEP_DIR . 'inc/' );
}
if ( ! defined( 'DEEP_SVG' ) ) {
	define( 'DEEP_SVG', '<svg version="1.1" id="Rectangle_3_1_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="562 242 76 76" style="enable-background:new 562 242 76 76;" xml:space="preserve"><g id="Rectangle_3"><g><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="570.627" y1="322.1832" x2="616.2863" y2="246.1934" gradientTransform="matrix(1 0 0 -1 0 560)"><stop  offset="0" style="stop-color:#4400D0"/><stop  offset="0.43" style="stop-color:#6520F4"/><stop  offset="1" style="stop-color:#930AFD"/></linearGradient><path class="st0" d="M599.8,242.7h-30.6h-1.1h-5.6v60.8h5.6h1.1h30.6c13.1,0,23.9-10.4,23.9-23.9s-10.4-23.9-23.9-23.9h-23.9v2.6 v4.5V290h1.9h5.2h17.2c5.6,0,10.1-4.5,10.1-10.1s-4.5-10.1-10.1-10.1h-10.4v6.7h10.4c1.9,0,3.4,1.5,3.4,3.4c0,1.9-1.5,3.4-3.4,3.4 H583v-20.1h17.2c9.3,0,16.8,7.5,16.8,16.8s-7.5,16.8-16.8,16.8h-30.6v-47.4h30.6c16.8,0,30.6,13.8,30.6,30.6s-13.8,30.6-30.6,30.6 h-23.9v6.7h23.9c20.5,0,37.3-16.8,37.3-37.3S620.3,242.7,599.8,242.7z"/></g></g></svg>' );
}

define( 'DEEP_CORE_DIR', get_template_directory() . '/inc/core/' );
define( 'DEEP_CORE_URL', get_template_directory_uri() . '/inc/core/' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php.
 *
 * @since 1.0.0
 */
add_action( 'activated_plugin', 'deep_activate' );
function deep_activate( $plugin ) {
	if ( $plugin == plugin_basename( __FILE__ ) ) {
		exit( wp_redirect( admin_url( 'admin.php?page=wn-admin-demo-importer' ) ) );
	}
}

/**
 * Define the locale for this plugin for internationalization.
 *
 * @since   1.0.0
 */
add_action( 'plugins_loaded', 'deep_load_textdomain' );
function deep_load_textdomain() {
	load_plugin_textdomain( 'deep', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}

/**
 * Load admin/frontend files.
 *
 * @since   1.0.0
 */
if ( is_admin() ) {
	require_once DEEP_CORE_DIR . 'admin/class-setup-wizard.php';
	require_once DEEP_CORE_DIR . 'admin/dashboard/webnus-admin.php';
}
require_once ABSPATH . 'wp-admin/includes/plugin.php';
require_once DEEP_CORE_DIR . 'helper-classes/breadcrumbs.php';
require_once DEEP_CORE_DIR . 'helper-classes/cat-field.php';
require_once DEEP_CORE_DIR . 'helper-classes/show-ids.php';
require_once DEEP_CORE_DIR . 'helper-classes/get-the-image.php';
require_once DEEP_CORE_DIR . 'helper-classes/blog-helper.php';
require_once DEEP_CORE_DIR . 'helper-classes/wn-like.php';
require_once DEEP_CORE_DIR . 'admin/meta-box/meta-box-core/meta-box.php';
require_once DEEP_CORE_DIR . 'admin/meta-box/meta-box-config.php';
require_once DEEP_CORE_DIR . 'admin/header-builder/webnus-header-builder.php';
require_once DEEP_CORE_DIR . 'admin/theme-options/ReduxCore/framework.php';
require_once DEEP_CORE_DIR . 'admin/theme-options/theme-options-config.php';
require_once DEEP_CORE_DIR . 'dynamicfiles/dyncss.php';
require_once DEEP_CORE_DIR . 'functions/functions-helper.php';
require_once DEEP_CORE_DIR . 'functions/functions-general.php';
require_once DEEP_CORE_DIR . 'functions/frontend.php';
require_once DEEP_CORE_DIR . 'functions/functions-content.php';
require_once DEEP_CORE_DIR . 'navigation/navigation.php';
require_once DEEP_CORE_DIR . 'navigation/mega-menu-post-type.php';
require_once DEEP_CORE_DIR . 'footer-builder/footer-builder-post-type.php';
require_once DEEP_CORE_DIR . 'widgets/widgets-init.php';
require_once DEEP_CORE_DIR . 'hotella-core/hotella-core.php';
require_once DEEP_CORE_DIR . 'webnus-core/webnus-core.php';
require_once DEEP_CORE_DIR . 'visualcomposer/init.php';
require_once DEEP_CORE_DIR . 'kingcomposer/init.php';
require_once DEEP_CORE_DIR . 'buddypress/bp-integration.php';
require_once DEEP_CORE_DIR . 'importer/config/setup.php';

if ( is_plugin_active( 'lifterlms/lifterlms.php' ) ) {
	include_once DEEP_CORE_DIR . 'michigan-core/michigan-core.php';
}
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	include_once DEEP_CORE_DIR . 'sections-templates/vc/class-vc-templates.php';
}

add_action(
	'after_setup_theme',
	function() {
		require_once DEEP_CORE_DIR . 'elementor/elementor-integration.php';
		if ( ! is_admin() ) {
			require_once DEEP_CORE_DIR . 'functions/frontend.php';
			load_webnus_woocommerce();
		}
	}
);

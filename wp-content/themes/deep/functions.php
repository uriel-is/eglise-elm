<?php
/**
 * Deep Theme.
 * Deep definitions and call main file.
 *
 * @since   1.0.0
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DEEP_VERSION', '4.2.8' );

/**
 * Core path.
 *
 * @since 1.0.0
 */
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

require_once DEEP_INCLUDES_DIR . 'init.php';
require_once DEEP_INCLUDES_DIR . 'core/deepcore.php';
require_once DEEP_DIR . 'core-templates.php';

if ( ! defined( 'DEEPFREE' ) ) {
	require_once DEEP_INCLUDES_DIR . 'functions/setup.php';
}
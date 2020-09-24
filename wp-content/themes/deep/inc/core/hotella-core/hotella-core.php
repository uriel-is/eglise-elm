<?php
/**
 * Plugin Name: Hotella Core
 * Plugin URI: http://webnus.net/
 * Description: Make compatiblity with WP Hotel Booking
 * Author: Webnus
 * Version: 1.0.0
 * Author URI: http://webnus.net
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_plugin_active( 'wp-hotel-booking/wp-hotel-booking.php' ) ) {
	return;
}

/**
 * defines
 */
define( 'HOTELLA_CORE_VERSION', '1.0.0' );
define( 'HOTELLA_CORE', DEEP_CORE_DIR . 'hotella-core/' );
define( 'HOTELLA_CORE_URI', DEEP_CORE_URL . 'hotella-core/' );
define( 'HOTELLA_CORE_ASSETS', DEEP_CORE_DIR . 'hotella-core/assets/' );

/**
 * Metaboxes
 */
require_once HOTELLA_CORE . 'includes/metabox-config/class-extra-posttype.php';
require_once HOTELLA_CORE . 'includes/metabox-config/class-wphb-extra-room.php';

/**
 * templates
 */
require_once HOTELLA_CORE . 'includes/templates/class-room-single.php';

if ( ! class_exists( 'HTC_HB' ) ) {
	class HTC_HB {

		/**
		 * Instance of this class
		 *
		 * @since   1.0.0
		 * @access  public
		 * @var     HTC_HB
		 */
		public static $instance;

		/**
		 * Provides access to a single instance of a module using the singleton pattern.
		 *
		 * @since   1.0.0
		 * @return  object
		 */
		public static function get_instance() {
			if ( self::$instance === null ) :
				self::$instance = new self();
			endif;
			return self::$instance;
		}

		public function __construct() {
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_script' ] );
		}

		/**
		 * enqueue scripts
		 */
		public function enqueue_script() {
			wp_enqueue_style( 'htc', HOTELLA_CORE_URI . 'assets/css/htc.css', null, HOTELLA_CORE_VERSION, 'all' );
			wp_enqueue_script( 'htc', HOTELLA_CORE_URI . 'assets/js/htc.js', array( 'jquery' ), HOTELLA_CORE_VERSION, true );
			wp_dequeue_script( 'wp-hotel-booking-owl-carousel' );
		}

	}
	HTC_HB::get_instance();
}

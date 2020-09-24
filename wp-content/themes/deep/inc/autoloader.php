<?php
/**
 * Deep Theme.
 * 
 * Deep autoloader handler class is responsible for loading the different
 * classes needed to run the theme.
 *
 * @since   1.0.0
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WN_Autoloader' ) ) {
	class WN_Autoloader {

		/**
		 * Instance of this class.
         *
		 * @since	1.0.0
		 * @access	private
		 * @var		WN_Autoloader
		 */
		private static $instance;

		/**
		 * File names.
         *
		 * @since	1.0.0
		 * @access	private
		 */
		private static $file_names = [
			'WN_404'				=> '404.php',
			'WN_Archive'			=> 'archive.php',
			'WN_Rooms_Archive'		=> 'archive-room.php',
			'WN_Archive_Gallery'	=> 'archive-gallery.php',
			'WN_Attachment'			=> 'attachment.php',
			'WN_Author'				=> 'author.php',
			'WN_Buddypress'			=> 'buddypress.php',
			'WN_Comments'			=> 'comments.php',
			'WN_Core_Templates'		=> 'core-templates.php',
			'WN_Footer'				=> 'footer.php',
			'WN_Header'				=> 'header.php',
			'WN_Index'				=> 'index.php',
			'WN_Page'				=> 'page.php',
		];

		/**
		 * Provides access to a single instance of a module using the singleton pattern.
		 *
		 * @since	1.0.0
		 * @return	object
		 */
		public static function get_instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
            }
			return self::$instance;
		}

		/**
		 * Constructor.
		 *
		 * @since	1.0.0
		 */
		protected function __construct() {
			spl_autoload_register( [ $this, 'load_dependencies' ] );
		}

		/**
		 * Loads all the WEBNUS Header Builder dependencies.
		 *
		 * @since	1.0.0
		 */
		private function load_dependencies( $class ) {
			if ( strpos( $class, WN_Deep::CLASS_PREFIX ) !== false ) {
				$path = DEEP_DIR . self::$file_names[$class];
				require_once $path;
			}
		}

	}
}

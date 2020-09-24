<?php
/**
 * Deep Theme.
 * 
 * The template for displaying gallery pages
 *
 * @since   1.0.0
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WN_Archive_Gallery' ) ) {
    class WN_Archive_Gallery extends WN_Core_Templates {

        /**
		 * Instance of this class.
         *
		 * @since   1.0.0
		 * @access  public
		 * @var     WN_Archive_Gallery
		 */
		public static $instance;

        /**
		 * Provides access to a single instance of a module using the singleton pattern.
		 *
		 * @since   1.0.0
		 * @return	object
		 */
		public static function get_instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
            }
			return self::$instance;
		}

        /**
		 * Define the core functionality of the archive-gallery.php
		 *
		 * @since	1.0.0
		 */
		public function __construct() {
			parent::__construct();
			$this->get_header();
			$this->content();
			$this->get_footer();
		}

		/**
		 * Render content.
		 * 
		 * @since	1.0.0
		 */
		private function content() {
			$this->headline(); ?>
            <div class="clearfix gallery-archive">
                <div class="row">
                    <div class="col-md-12">
                        <section class="page-content" >
                            <?php
                            if ( class_exists( 'The_Grid_Plugin' ) ) {
                                // Get title from ID
                                $setgrid	= deep_get_option( $this->theme_options, 'deep_thegrid_gallery' );
                                $gridname	= get_the_title( $setgrid );
                                // Archive The Grid Gallery
                                echo do_shortcode( '[the_grid name="' . $gridname . '"]' );
                            } else {
                                // If Not Install & Or Activate
                                echo'<div class="container"><h5>'. esc_html__('To create a gallery please install and/or activate The Grid plugin.', 'deep') .'</h5></div>';
                            }
                            ?>
                        </section>
                    </div>
                </div>
            </div>
			
			<?php
		}

		/**
		 * Get page title
		 * 
		 * @since	1.0.0
		 */
		private function headline() {
			$gallery_title			= deep_get_option( $this->theme_options, 'deep_gallery_title' );
			$enable_gallery_title	= deep_get_option( $this->theme_options, 'deep_gallery_page_title_enable' );
			if ( $enable_gallery_title ) {
				echo '
				<section id="headline" class="page-title gallery-archive-page-title">
					<div class="container">
						<h1>' . esc_html( $gallery_title ) .' </h1>
					</div>
				</section>';
			} 
		}
		
    }

	// Run
	WN_Archive_Gallery::get_instance();
}
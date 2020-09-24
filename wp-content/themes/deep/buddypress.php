<?php
/**
 * Deep Theme.
 * 
 * @since   1.0.0
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
 
if ( ! class_exists( 'WN_Buddypress' ) ) {
    class WN_Buddypress extends WN_Core_Templates {

        /**
		 * Instance of this class.
         *
		 * @since   1.0.0
		 * @access  public
		 * @var     WN_Buddypress
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
		 * Define the core functionality of the buddypress.php
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
			if ( defined( 'DEEP_CORE_DIR' ) ) {
				do_action( 'buddypress_content' );
			} else {
				?>
				<section id="headline">
					<div class="container"><h1><?php the_title(); ?></h1></div>
				</section>
				<section id="main-content" class="container">
					<?php
					if( is_active_sidebar( 'buddypress-sidebar' ) ) { ?>
						<aside class="col-md-3 sidebar buddypress-sidebar">
							<?php dynamic_sidebar( 'buddypress-sidebar' ); ?>
						</aside>
					<?php
					}
					?>
					<section class="col-md-9 cntt-w">
						<article>
							<?php 
							if ( have_posts() ):
								while( have_posts() ):
									the_post();
									the_content();
								endwhile;
							endif;
							?>
						</article>
					</section>
				</section>
				<?php
			}
		}
    }
	// Run
	WN_Buddypress::get_instance();
}

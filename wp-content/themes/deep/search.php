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

class WN_Search extends WN_Core_Templates {

	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     WN_Search
	 */
	public static $instance;

	/**
	 * Provides access to a single instance of a module using the singleton pattern.
	 *
	 * @since   1.0.0
	 * @return  object
	 */
	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Define the core functionality of the theme.
	 *
	 * Load the dependencies.
	 *
	 * @since   1.0.0
	 */
	public function __construct() {
		parent::__construct();
		$this->get_header();
		$this->content();
		$this->get_footer();
	}
	private function content() {
		if ( defined( 'DEEP_CORE_DIR' ) ) {
			do_action( 'search_content' );
		} else {
			?>
			<section id="headline">
				<div class="container">
					<h2><?php printf( '<small>' . esc_html__( 'Search Results for', 'deep' ) . ':</small> %s', get_search_query() ); ?></h2>
				</div>
			</section>
			<section class="container search-results">
				<hr class="vertical-space2">
				<aside class="col-md-3 sidebar">
					<?php
					if ( is_active_sidebar( 'Left Sidebar' ) ) {
						dynamic_sidebar( esc_html__( 'Left Sidebar', 'deep' ) );
					}
					?>
				</aside>
				<section class="col-md-8">
					<?php
					if ( have_posts() ) :
						// Start the Loop.
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content/content', 'excerpt' );

							// End the loop.
						endwhile;

					else :
						get_template_part( 'template-parts/content/content', 'none' );
					endif;
					?>
					<br class="clear">
					<?php
					if ( function_exists( 'wp_pagenavi' ) ) {
						wp_pagenavi();
					} else {
						echo '<div class="wp-pagenavi">';
						next_posts_link( esc_html__( '&larr; Previous page', 'deep' ) );
						previous_posts_link( esc_html__( 'Next page &rarr;', 'deep' ) );
					}
					?>
				</section>
			</section>
			<?php
		}
	}
}
// Run
WN_Search::get_instance();

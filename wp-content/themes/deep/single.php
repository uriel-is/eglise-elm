<?php
/**
 * Deep Theme.
 *
 * The template for displaying all single posts
 *
 * @since   1.0.0
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WN_Single extends WN_Core_Templates {

	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     WN_Single
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
	 * Define the core functionality of the theme.
	 *
	 * Load the dependencies.
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
			do_action( 'single_content' );
		} else {
			?>
			<section id="main-content" class="container">
				<aside class="col-md-3">
					<?php if( is_active_sidebar( 'Left Sidebar' ) ) dynamic_sidebar( esc_html__( 'Left Sidebar', 'deep' ) ); ?>
				</aside>
				<div class="col-md-9">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', 'single' );

						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation(
								array(
									/* translators: %s: parent post link */
									'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'deep' ), '%title' ),
								)
							);
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation(
								array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'deep' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Next post:', 'deep' ) . '</span> <br/>' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'deep' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Previous post:', 'deep' ) . '</span> <br/>' .
										'<span class="post-title">%title</span>',
								)
							);
						}

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

					endwhile; // End of the loop.
					?>
				</div>
			</section>
			<?php
		}
	}
}

// Run
WN_Single::get_instance();
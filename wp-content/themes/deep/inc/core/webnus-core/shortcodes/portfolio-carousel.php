<?php
class DeepWPBakeryPortfolioCarousel extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryPortfolioCarousel
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
		add_shortcode( 'portfolio-carousel', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $atts, $content = null ) {	
		extract(shortcode_atts(array(
			'type' 	 				 => '1',
			'carousel_count' => '10',
			'enable_title'	 => '',
			'enable_content' => '',
			'shortcodeclass' => '',
			'shortcodeid' 	 => '',
			'title' 	 			 => '',
		), $atts));		

		ob_start();

		$post_id = get_the_ID();
		$shortcodeclass 			= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid 				= $shortcodeid ? $shortcodeid : '';
		// new Query
		$args = array(
			'post_type'		 => 'portfolio',
			'posts_per_page' => $carousel_count,
			'post__not_in'	 => array( $post_id ),
		);
		$rw_query = new WP_Query( $args );

		if ( $enable_title == "enable") {
			$title_state = 'enable';
		}

		if ( $enable_content == "enable") {
			$content_state = 'enable';
		}
	?>

		<?php if ($type == '1') {
			?>

			<section class="related-works">
				<!-- latest-projects (owl-carousel) -->
				<ul id="portfolio <?php echo $shortcodeid; ?>" class="portfolio-carousel owl-carousel owl-theme <?php echo '' . $shortcodeclass; ?>">
					<?php if ( $rw_query->have_posts() ) :
						while ( $rw_query->have_posts() ) :
							$rw_query->the_post(); ?>
								<li class="portfolio-item">
									<a class="portfolio-img">
									<?php
										$thumbnail_url = get_the_post_thumbnail_url();
										$thumbnail_id  = get_post_thumbnail_id();
										if( !empty( $thumbnail_url ) ) {
											if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
												require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
											}
											$image = new Wn_Img_Maniuplate; // instance from settor class
											$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '591' , '461' ); // set required and get result
										} elseif ( empty( $thumbnail_url ) ) {
											$thumbnail_url = DEEP_ASSETS_URL . 'images/no_image_att.jpg' ;
										}
									?>
									<img src="<?php echo '' . $thumbnail_url ?>" alt="<?php the_title(); ?>">
									</a>
									<div class="bgc-overlay"></div>
									<h5 class="portfolio-title <?php echo '' . $title_state ?> "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
									<div class="portfollo-content <?php echo '' . $content_state ?> "><?php echo deep_excerpt(25); ?></div>
								</li>
					<?php endwhile; endif;
					wp_reset_query(); ?>
				</ul> <!-- end latest-projects -->
			</section> <!-- end related-works -->

		<?php
		} ?>

	<?php if ($type == '2') { ?>

		<section class="related-works">
			<!-- subtitle -->
			<div class="portfolio-carousel-subtitle">
				<h4 class="subtitle"><?php echo esc_html( $title ); ?></h4>
				<!-- owl-carousel custom navigation -->
				<div class="latest-projects-navigation">
					<a class="btn prev"><i class="wn-fas wn-fa-angle-left"></i></a>
					<a class="btn next"><i class="wn-fas wn-fa-angle-right"></i></a>
				</div>
			</div>

			<!-- latest-projects (owl-carousel) -->
			<ul id="latest-projects-<?php echo esc_attr( $type ); ?>" class="latest-projects-<?php echo esc_attr( $type ); ?> owl-carousel owl-theme">
		<?php if ( $rw_query->have_posts()) : while ( $rw_query->have_posts() ) : $rw_query->the_post(); ?>
			<li class="portfolio-item">
			<a class="portfolio-img">
			<?php
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '300' , '200' ); // set required and get result
				} elseif ( empty( $thumbnail_url ) ) {
				$thumbnail_url = get_template_directory_uri() . '/images/no_image_att.jpg' ;
				}
			?>
			<img src="<?php echo '' . $thumbnail_url ?>" alt="<?php the_title(); ?>">
			</a>
			<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<div class="portfolio-meta"><?php echo '<span class="portfolio-date">' . get_the_date() . '</span>'; ?></div>
			</li>
		<?php endwhile; endif;
		wp_reset_query(); ?>
		</ul> <!-- end latest-projects -->
		</section> <!-- end related-works -->
		<?php
	}
	?>

		<?php

		$out = ob_get_contents();
		ob_end_clean();
		$out = str_replace('<p></p>','',$out);

		return $out;
	}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'portfolio-carousel' ) ) {
			wp_enqueue_style( 'wn-deep-portfolio-carousel', DEEP_ASSETS_URL . 'css/frontend/portfolio-carousel/portfolio-carousel.css' );
		}
	}

} DeepWPBakeryPortfolioCarousel::get_instance();

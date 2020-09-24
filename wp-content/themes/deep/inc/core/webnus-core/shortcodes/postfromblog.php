<?php
class DeepWPBakeryPostBlog extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryPostBlog
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
		add_shortcode( 'postblog', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {	
		extract(shortcode_atts(	array(
			'type'	        	=> '1',
			'post'	        	=> '',
			'link_target'   	=> '',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
			'hide_cat' 	 		=> '',
			'hide_date' 	 	=> '',
		), $attributes));		

		ob_start();	

		// Class & ID 
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
		$hide_cat			= $hide_cat == 'true' ? 'true' : 'false';
		$hide_date			= $hide_date == 'true' ? 'true' : 'false';

		$gcolor = '#000' ;
		static $uniqid = 0;
		$uniqid++;

		$link_target_tag = '';
		if ( $link_target == 'true' ){
			$link_target_tag = ' target="_blank" ';
		}

		$query = new WP_Query('p='.$post.'');
		if ($query -> have_posts()) : $query -> the_post();
		$thumbnail_id  = get_post_thumbnail_id();
		$thumbnail_url  = get_the_post_thumbnail_url();
		if( !empty( $thumbnail_url ) ) {
			// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$thumbnail_url = $image->m_image( $thumbnail_id , $thumbnail_url , '690' , '460' ); // set required and get result
		}

		if ( $type == 1 ) { ?>
			
		<article class="a-post-box-<?php echo esc_html( $type ); ?> <?php echo '' . $shortcodeclass; ?>" <?php echo $shortcodeid; ?>>
			<figure class="latest-img"><img src="<?php echo esc_html( $thumbnail_url); ?>" alt="<?php the_title(); ?>"></figure>
				<div class="latest-overlay"></div>
				<div class="latest-txt">
					<h4 class="latest-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag; ?>><?php the_title(); ?></a></h4>
					<?php
					if ( $hide_cat != 'true' ) { ?>
						<span class="latest-cat"><?php the_category(' / '); ?></span>
					<?php
					} ?>
					<?php
					if ( $hide_date != 'true' ) { ?>
						<span class="latest-date"><i class="sl-clock"></i> <?php the_time(get_option( 'date_format' )); ?></span>
					<?php
					} ?>
				</div>
		</article>
	<?php } if ( $type == 2 ) { ?>
		<article class="a-post-box-<?php echo esc_html( $type); ?> a-post-box-<?php echo esc_html( $type) . $uniqid; ?> <?php echo '' . $shortcodeclass; ?>" <?php echo $shortcodeid; ?>>
			<figure class="latest-img"><img src="<?php echo esc_html( $thumbnail_url); ?>" alt="<?php the_title(); ?>" ></figure>
				<div class="latest-txt">
					<?php
					if ( $hide_cat != 'true' ) { ?>
						<span class="latest-cat">
							<div class="latest-color"></div>
							<?php the_category(' / '); ?>
						</span>
					<?php
					} ?>
				<?php
					if ( $hide_date != 'true' ) { ?>
						<span class="latest-date"><?php the_time(get_option( 'date_format' )); ?></span>
					<?php
					} ?>
					<h4 class="latest-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag; ?>><?php the_title(); ?></a></h4>
				</div>
		</article> 
		<?php $style	= '.a-post-box-' . $type . $uniqid . ' .latest-color { background: ' . deep_category_color() . '; }';
			deep_save_dyn_styles( $style );
			// live editor
			if ( ! in_array( 'admin-bar', get_body_class() ) ) {
				if ( ! empty( $style ) ) {
					echo '<style>';
						echo $style;
					echo '</style>';
				}
			}
		}
		endif;
		$out = ob_get_contents();
		ob_end_clean();	
		wp_reset_postdata();
		return $out;
	}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'postblog' ) ) {
			wp_enqueue_style( 'wn-deep-post-from-blog', DEEP_ASSETS_URL . 'css/frontend/post-from-blog/post-from-blog.css' );
		}
	}

} DeepWPBakeryPostBlog::get_instance();
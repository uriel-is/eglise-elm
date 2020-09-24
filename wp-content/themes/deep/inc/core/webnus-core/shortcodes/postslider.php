<?php
class DeepWPBakeryPostSlider extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryPostSlider
	 */
	public static $instance;

	private $type;

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
		add_shortcode( 'postslider', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );			
		add_action( 'wp_head', function() {
			echo '<script>var deep_postslider_styles = {}; </script>';
		});
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {

	extract(shortcode_atts(array(

		'type'				=> '1',
		'how_number_slide'	=> '2', 	
		'category'			=> '', 	
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
		'hide_cat' 	 		=> '',
		'hide_date' 	 	=> '',

	), $attributes) );
	
	wp_enqueue_style( 'wn-deep-post-slider' . $type, DEEP_ASSETS_URL . 'css/frontend/post-slider/post-slider' . $type . '.css' );

	$this->type  = $type;

	add_action( 'wp_footer', function() use($type) {
		echo '<script>
		var element = document.getElementById("wn-deep-post-slider'.$type.'-css");
		if(element && !deep_postslider_styles["wn-deep-post-slider'.$type.'-css"]) {
			deep_postslider_styles["wn-deep-post-slider'.$type.'-css"] = true;
			var wrap = document.createElement("div");
			wrap.appendChild(element.cloneNode(true));
			document.getElementsByTagName("head")[0].innerHTML = document.getElementsByTagName("head")[0].innerHTML + wrap.innerHTML;
			if(element.parentNode) {
				element.parentNode.removeChild(element);
			} else {
				element.remove(element);
			}
		}
		</script>';	
	}, 100);

	ob_start();

	// Class & ID 
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	$style = '';
	echo '<div class="postslider-owl-carousel postslider-' . $type . ' owl-carousel owl-theme ' . $shortcodeclass . '"  ' . $shortcodeid . ' data-postslider_count="1">';


		switch ( $type ) :

			case '1':
				$query = new WP_Query('posts_per_page=' . $how_number_slide . '&category_name=' . $category . '');
					
				static $uniqid = 0;
				while ( $query->have_posts() ) : $query->the_post();

					$uniqid++;
					$thumbnail_url	= get_the_post_thumbnail_url();
					$thumbnail_id	= get_post_thumbnail_id();

					if( !empty( $thumbnail_url ) ) {
						
						// if main class not exist get it
						if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
							require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
						}
						
						$image = new Wn_Img_Maniuplate; // instance from settor class
						$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '1920' , '1080' ); // set required and get result

					} ?>

					<div class="postslider-carousel postslider-a basic">
						<figure class="latest-img">
							<img src="<?php echo '' . $thumbnail_url; ?>" alt="<?php the_title() ?>" >
						</figure>
						<div class="latest-content latest-content-<?php echo '' . $uniqid; ?>">
							<?php if ( $hide_cat != 'true' ) { ?>
								<span class="category"><span class="category-color"></span><?php the_category(', '); ?></span>
							<?php } ?>
							<?php if ( $hide_date != 'true' ) { ?>
								<span class="date"><?php the_time(get_option( 'date_format' ) ); ?></span>
							<?php } ?>
							<h3 class="latest-title"><a href=<?php the_permalink(); ?> class="hcolor"><?php the_title(); ?></a></h3>
						</div>
					</div> <?php 	
					$style	.= '.latest-content-' . $uniqid . ' .category-color { background: ' . deep_category_color() . '; }';
					

				endwhile;

			break;

			case '2':
				$query = new WP_Query('posts_per_page=' . $how_number_slide . '&category_name='.$category.'');
				
				static $uniqid = 0;
				while ( $query->have_posts() ) : $query->the_post();

					$uniqid++;
					$thumbnail_url	= get_the_post_thumbnail_url();
					$thumbnail_id	= get_post_thumbnail_id();

					if( !empty( $thumbnail_url ) ) {
				
						// if main class not exist get it
						if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
							require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
						}
				
						$image = new Wn_Img_Maniuplate; // instance from settor class
						$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '1920' , '1080' ); // set required and get result
				
					} ?>
				
					<div class="postslider-carousel postslider-b new">
						<figure class="latest-img">
							<img src="<?php echo '' . $thumbnail_url; ?>" alt="<?php the_title() ?>" >
						</figure>
						<div class="latest-content latest-content-<?php echo '' . $uniqid; ?>">
							<?php if ( $hide_cat != 'true' ) { ?>
								<span class="category"><span class="category-color"></span><?php the_category(', '); ?></span>
							<?php } ?>
							<?php if ( $hide_date != 'true' ) { ?>
								<span class="date"><?php the_time(get_option( 'date_format' ) ); ?></span>
							<?php } ?>
						<h3 class="latest-title"><a href=<?php the_permalink(); ?> class="hcolorf"><?php the_title(); ?></a></h3>
						</div>
					</div> <?php 	
					$style	.= '.latest-content-' . $uniqid . ' .category-color { background: ' . deep_category_color() . '; }';


				endwhile;
			break;

			case '3':
				$query = new WP_Query('posts_per_page=' . $how_number_slide . '&category_name='.$category.'');

				static $uniqid = 0;
				while ( $query->have_posts() ) : $query->the_post();

					$uniqid++;
					$thumbnail_url	= get_the_post_thumbnail_url();
					$thumbnail_id 	= get_post_thumbnail_id();
					
					if( !empty( $thumbnail_url ) ) {
				
						// if main class not exist get it
						if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
							require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
						}
				
						$image = new Wn_Img_Maniuplate; // instance from settor class
						$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '1214' , '980' ); // set required and get result
				
					} ?>
				
					<div class="postslider-carousel postslider-b ">
						<figure class="latest-img">
							<img src="<?php echo '' . $thumbnail_url; ?>" alt="<?php the_title() ?>" >
						</figure>
						<div class="latest-content latest-content-<?php echo '' . $uniqid; ?>">
							<?php if ( $hide_cat != 'true' ) { ?>
								<span class="category"><span class="category-color"></span><?php the_category(', '); ?></span>
							<?php } ?>
							<?php if ( $hide_date != 'true' ) { ?>
								<span class="date"><?php the_time(get_option( 'date_format' ) ); ?></span>
							<?php } ?>
							<h3 class="latest-title"><a href=<?php the_permalink(); ?> class="hcolorf"><?php the_title(); ?></a></h3>
							<?php $style	.= '.latest-content-' . $uniqid . ' .category-color { background: ' . deep_category_color() . '; }';
							?>

							<p class="excerpt"><?php echo deep_excerpt(25); ?></p>
							<a href="<?php the_permalink(); ?>" class="magicmore"><i class="icon-arrows-slim-right"></i><?php esc_html_e( 'READ MORE', 'deep' ) ?></a>
						</div>
					</div> <?php
				endwhile;
			break;
		endswitch;

		echo '</div>';
	deep_save_dyn_styles( $style );
					
	// live editor
	if ( ! in_array( 'admin-bar', get_body_class() ) ) {

		if ( ! empty( $style ) ) {

			echo '<style>';
				echo $style;
			echo '</style>';

		}

	}
	$out = ob_get_contents();
	ob_end_clean();
	$out = str_replace('<p></p>','',$out);
	wp_reset_postdata();
	return $out;
}

/**
* Required scripts.
*
* @since   1.0.0
*/
public function scripts() {
	if ( self::used_shortcode_in_page( 'postslider' ) ) {			
		wp_enqueue_style( 'wn-deep-post-slider0', DEEP_ASSETS_URL . 'css/frontend/post-slider/post-slider0.css' );
	}
}
} DeepWPBakeryPostSlider::get_instance();
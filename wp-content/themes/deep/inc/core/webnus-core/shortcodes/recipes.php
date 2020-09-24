<?php
class DeepWPBakeryRecipes extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryRecipes
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
		add_shortcode( 'recipes', array( $this, 'output' ) );
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
			'category'			=> '',
			'column'			=> '3',
			'pagination'		=> '',
			'post_count'		=> '4',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
		), $attributes));		
		
		$post_format = get_post_format(get_the_ID());
		ob_start();

		// Class & ID 
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		$deep_options = deep_options();
		echo '<div class="container wn-recipes ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
		$column 	= $column ?  $column  : '';
		// Query
		$pagination = $pagination ? get_query_var( is_front_page() ? 'page' : 'paged' ) : '1';
		$recipes_query = array(
			'post_type'			=> 'recipe',
			'posts_per_page'	=> $post_count,
			'paged'				=> $pagination,
		);
		$query = new WP_Query( $recipes_query );
		//$query = new WP_Query($recipes_post);
		while ($query -> have_posts()) : $query -> the_post();
		$thumbnail_url = get_the_post_thumbnail_url();
		$thumbnail_id  = get_post_thumbnail_id(); // id of image
		$post_id		= get_the_ID();
		$cats 			= get_the_terms( $post_id , 'recipe_category' );
		$cats_slug_str	= '';
		$cat_slugs_arr	= array();
		if( !empty( $thumbnail_url ) ) {
			// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			switch ( $column ) {
				case '3':
						$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '319' , '517' ); // set required and get result
					break;
				case '4':
						$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '426' , '517' ); // set required and get result
					break;
				case '6':
						$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '852' , '517' ); // set required and get result
					break;
				case '12':
						$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '1276' , '517' ); // set required and get result
					break;
			}
		}
		if( is_array( $cats ) ) {
			$recipe_category = array();
			foreach( $cats as $cat ){
				$recipe_category[] = $cat->slug;
			}
		} else {
			$recipe_category = array();
		}
		if ( $cats && ! is_wp_error( $cats ) ) {
			foreach ($cats as $cat) {
				$cat_slugs_arr[] = ' <a href="'. get_term_link($cat, 'recipe_category') .'"> ' . $cat->name . ' </a> ';
			}
			$cats_slug_str = implode( ", ", $cat_slugs_arr );
		}
			$category = ( $cats_slug_str ) ? $cats_slug_str:'';
			$recipe			= rwmb_meta( 'deep_recipe' );
			$food_name		= rwmb_meta( 'deep_recipe_food_name' );
			?>
			<!-- Single Recipes /Start -->
				<div class="col-md-<?php echo '' . $column; ?> recipe-one">
					<article class="recipes">
						<figure class="recipe-one-img">
							<img src="<?php echo '' . $thumbnail_url ?>" alt="<?php the_title(); ?>" >
							<div class="recipe-one-date colorb">
								<span class="author"><i class="ti-user"></i></strong><?php the_author_posts_link(); ?></span>
								<span class="categories"><i class="ti-folder"></i><?php echo '' . $category; ?></span>
								<span class="date"><i class="ti-calendar"></i><?php echo get_the_date(); ?></span>
							</div>
						</figure>
						<div class="recipe-one-content">
							<h3 class="recipe-one-title"><a href="<?php the_permalink(); ?>" class="hcolorf"><?php echo '' . $food_name . ' ' . $recipe ; ?></a></h3>
							<p class="latest-excerpt"><?php echo deep_excerpt(31); ?></p>
						</div>
					</article>
				</div>
			<!-- Recipes /End -->
			<?php endwhile;
			if ( $pagination != 1 ) : ?>
			<div class="row">
				<div class="col-sm-12">
					<?php if( function_exists( 'wp_pagenavi' ) )
						wp_pagenavi( array( 'query' => $query ) );?>
				</div>
			</div>
	<?php endif;
		echo '</div>';
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
		if ( self::used_shortcode_in_page( 'recipes' ) ) {			
			wp_enqueue_style( 'wn-deep-recipes', DEEP_ASSETS_URL . 'css/frontend/recipes/recipes.css' );	
		}
	}

} DeepWPBakeryRecipes::get_instance();
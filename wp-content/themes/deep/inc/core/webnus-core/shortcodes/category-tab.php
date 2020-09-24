<?php
function deep_category_tab( $attributes, $content = null ) {
	extract(shortcode_atts(	array(
	
		'param_category'	=> '',
		'sort_order'		=> 'date',
		'post_number'		=> '8',
		'pagination'		=> '',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
		'hide_cat' 	 		=> '',
		'hide_date' 	 	=> '',
	
	), $attributes));
	
	ob_start();
	// glob variables
	global $post;
	$post_slug = $post->post_name; 
	// Class & ID 
	$shortcodeclass		= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		$param_category 		= str_replace( '`{`', '', $param_category);
		$param_category 		= str_replace( '`}`', '', $param_category);
		$param_category_array 	= explode(',', $param_category);
	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
		$param_category 		= str_replace( ':lsqb:', '', $param_category);
		$param_category 		= str_replace( ':rsqb:', '', $param_category);
		$param_category_array 	= explode(',', $param_category);
	}

	// variables
	
	$param_category				= $param_category ? $param_category : '';
	$sort_order					= !empty( $sort_order ) ? $sort_order : '';
	$post_number				= $post_number ? $post_number : -1;
	static $uniqid = 0;
	$uniqid++;

	// Get category
	$categories = array();
	$categories = get_categories();
	$category_slug_array = array('');


	$args = array(
		'post_type' 		=> 'post',
		'posts_per_page'	=> -1,
		'cat'				=> $param_category,
		'orderby'			=> $sort_order
	);


	// Instantiate custom query
	$out			= '';
	$category_tab 	= new WP_Query( $args );?>
	
	<div class="wn-category-wrap clearfix <?php echo '' . $shortcodeclass; ?>" <?php echo $shortcodeid; ?>> <?php

		if ( $param_category_array ) {  ?>
				
			<ul class="wn-category-tab-nav">
				<?php $category_list = '
					<li class="active" data-cat-slug="all">
						<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '" class="all cat-item colorf" data-param_category="all">
							' . esc_html__( 'All', 'deep' ) . '
						</a>
					</li>'; ?>

				<?php
				foreach( $param_category_array as $cat_id ) {

					if ( deep_get_cat_slug( $cat_id ) != null ) {
	
						$category_list .='
							<li data-cat-slug="' . deep_get_cat_slug( $cat_id ) . '">
								<a href="' . get_category_link( $cat_id ) . '" data-cat-slug="all ' . deep_get_cat_slug( $cat_id ) . '" class="cat-item">
									' . get_the_category_by_ID( $cat_id ) . '
								</a>
							</li>';
	
					}
	
				}

				echo '' . $category_list; ?>
			</ul> <?php
		} ?>
		<div class="wn-category-posts clearfix" data-cat-slug="all"><?php

			if ( $category_tab->have_posts() ) {
				
				// The 2nd Loop
				while ( $category_tab->have_posts() ) {

					$category_tab->the_post();
					// $cat_id = the_category_ID( $echo = false );

					// thumbnail
					$thumbnail_url = get_the_post_thumbnail_url( $category_tab->post->ID );
					$thumbnail_id  = get_post_thumbnail_id( $category_tab->post->ID );
					if( !empty( $thumbnail_url ) ) {
						// if main class not exist get it
						if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
							require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
						}
						$image = new Wn_Img_Maniuplate; // instance from settor class
						$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '315' , '217' ); // set required and get result
					}

					?>
					<div class="wn-category-tab <?php echo '' . $uniqid; ?> wn-pagination active"  data-cat-slug="<?php echo get_the_terms( get_the_ID(), 'category' )[0]->slug; ?>">
						<article class="wn-category">
							<a href="<?php the_permalink() ?>">
								<img src="<?php echo '' . $thumbnail_url; ?> " alt="<?php the_title($category_tab->post->ID); ?>">
							</a>
							<div class="wn-tab-cat-content">
								<?php if ( $hide_cat != 'true' ) { ?>
									<div class="wn-category-meta" style="background: <?php echo deep_category_color(); ?>;">
										<?php echo the_category(', '); ?>
									</div>
								<?php } ?>
								<?php if ( $hide_date != 'true' ) { ?>
									<div class="wn-category-date">
										<i class="pe-7s-clock"></i>
										<?php echo get_the_date(); ?>
									</div>
								<?php } ?>

								<h5 class="wn-category-title"><a class="hcolorf" href="<?php the_permalink($category_tab->post->ID); ?>"><?php the_title(); ?></a></h5>
							</div>
						</article>
					</div> <?php
				}

				// pagination
				// if ( $pagination ) {

				// 	echo '
				// 		<div class="pagination">
				// 			<a class="wn-cat-tab-previous" data-type="previous"><i class="ti-arrow-left"></i></a>
				// 			<a class="wn-cat-tab-next" data-type="next"><i class="ti-arrow-right"></i></a>
				// 		</div>';

				// }

				// Restore original Post Data
				wp_reset_postdata();
			}?>
		</div>
	</div><?php // end wn-category-wrap
}

add_shortcode( 'category-tab', 'deep_category_tab' );

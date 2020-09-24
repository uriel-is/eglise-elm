<?php get_header(); 
// Recipe single options
$serves			= rwmb_meta( 'deep_recipe_serves' );
$prep_time		= rwmb_meta( 'deep_recipe_prep_time' );
$calories		= rwmb_meta( 'deep_recipe_calories' );
$cooking_time	= rwmb_meta( 'deep_recipe_cooking_time' );
$recipe			= rwmb_meta( 'deep_recipe' );
$food_name		= rwmb_meta( 'deep_recipe_food_name' );
$brief_desc		= rwmb_meta( 'deep_recipe_brief_desc' );
// Recipe information
$serves			= $serves ? '<p class="food-info serves"> ' . esc_html__( 'Serves:', 'deep' ) . ' <strong>' . $serves . '</strong></p>' : '';		
$prep_time		= $prep_time ? '<p class="food-info prep-time"> ' . esc_html__( 'Prep Time:', 'deep' ) . ' <strong>' . $prep_time . '</strong></p>' : '';	
$calories		= $calories ? '<p class="food-info calories"> ' . esc_html__( 'Calories:', 'deep' ) . ' <strong>' . $calories . '</strong></p>' : '';	
$cooking_time	= $cooking_time ? '<p class="food-info cooking"> ' . esc_html__( 'Cooking:', 'deep' ) . ' <strong>' . $cooking_time . '</strong></p>' : '';

// Recipe
$recipe			= $recipe ? $recipe  : '';
$food_name		= $food_name ? $food_name  : '';
$brief_desc		= $brief_desc ? '<p class="wn-deep-recipe-desc">' . $brief_desc . '</p>' : '';



// Recipe theme options options
$deep_options = deep_options();
$next_and_prev		= $deep_options['deep_recipe_next_and_prev'] ? $deep_options['deep_recipe_next_and_prev'] : '';
$author				= $deep_options['deep_recipe_author'] ? $deep_options['deep_recipe_author'] : '';
$social_share		= $deep_options['deep_recipe_social_share'] ? $deep_options['deep_recipe_social_share'] : '';
$top_related		= $deep_options['deep_recipe_top_related'] ? $deep_options['deep_recipe_top_related'] : '';
$meta_data			= $deep_options['deep_recipe_meta_data'] ? $deep_options['deep_recipe_meta_data'] : '';
$meta_data_cat		= $deep_options['deep_recipe_meta_data_cat'] ? $deep_options['deep_recipe_meta_data_cat'] : '';
$meta_data_time		= $deep_options['deep_recipe_meta_data_time'] ? $deep_options['deep_recipe_meta_data_time'] : '';
$meta_data_comment	= $deep_options['deep_recipe_meta_data_comment'] ? $deep_options['deep_recipe_meta_data_comment'] : '';
$meta_data_view		= $deep_options['deep_recipe_meta_data_view'] ? $deep_options['deep_recipe_meta_data_view'] : '';
$deep_recipe_layout	= $deep_options['deep_recipe_layout'] ? $deep_options['deep_recipe_layout'] : '';
$sidebar_type 		= $deep_options['deep_sidebar_blog_options'] = isset($deep_options['deep_sidebar_blog_options']) ? $deep_options['deep_sidebar_blog_options'] : '' ;

if ( isset( get_adjacent_post(false,'',false, 'recipe_category')->ID) ) {
	$have_next_post 				= get_adjacent_post(false,'',false, 'recipe_category')->ID ;
	$next_post_id 					= $have_next_post;
	$next_post_link 				= get_permalink( $next_post_id );
	$next_post_thumbnail_id			= get_post_thumbnail_id( $next_post_id );
}

if ( isset( get_adjacent_post(false,'',true, 'recipe_category')->ID ) ){
	$have_prev_post 				= get_adjacent_post(false,'',true, 'recipe_category')->ID ;
	$prev_post_id 					= $have_prev_post;
	$prev_post_link 				= get_permalink( $prev_post_id );
	$prev_post_thumbnail_id  		= get_post_thumbnail_id( $prev_post_id );
}

?>

<!-- Start Page Content -->
	<div class="wn-recipe-single">
		<?php
			if( have_posts() ):
				while( have_posts() ):
					the_post();
					global $post;
					$post_id = $post->ID; ?>

					<section class="wn-recipe-wrap">
						<figure class="recipe-single-featured-image image-id-<?php echo get_post_thumbnail_id(); ?>">
							<img src="<?php echo get_the_post_thumbnail_url( $post_id, 'full' ); ?>" alt="<?php the_title(); ?>">
							<div class="wn-deep-recipe">
								<?php 
									if ( is_plugin_active( 'js_composer/js_composer.php' ) ) { 
										echo do_shortcode('[deep-title title="' . $recipe . '" subtitle="' . $food_name . '" text_align="center" layer_animation="wn-layer-anim-bottom" title_heading="h1" title_text_font="font_family:Aguafina%20Script%3Aregular|font_style:400%20regular%3A400%3Anormal" title_color="#fe1743" title_font_size="250px" title_line_height="0px" title_margin_right="62px" subtitle_heading="h3" subtitle_custom_class="dp-r-subtitle" subtitle_theme_fonts="yes" subtitle_color="#ffffff" subtitle_font_size="57px" subtitle_line_height="0px" subtitle_letter_spacing="91px" subtitle_font_weight="900" subtitle_margin_top="-7px" subtitle_margin_left="87px" title_font_size_tablet="200px" title_font_size_mob768="150px" title_font_size_mob480="100px" subtitle_font_size_tablet="47px" subtitle_font_size_mob768="24px" subtitle_font_size_mob480="22px" shape="%5B%7B%22shape_rotate%22%3A%22none%22%7D%5D"]');
									} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
										echo do_shortcode('[deep-title title="' . base64_encode( $recipe ) . '" subtitle="' . base64_encode( $food_name ) . '" text_align="center" layer_animation="wn-layer-anim-bottom" title_heading="h1" title_text_font="font_family:Aguafina%20Script%3Aregular|font_style:400%20regular%3A400%3Anormal" title_color="#fe1743" title_font_size="250px" title_line_height="0px" title_margin_right="62px" subtitle_heading="h3" subtitle_custom_class="dp-r-subtitle" subtitle_theme_fonts="yes" subtitle_color="#ffffff" subtitle_font_size="57px" subtitle_line_height="0px" subtitle_letter_spacing="91px" subtitle_font_weight="900" subtitle_margin_top="-7px" subtitle_margin_left="87px" title_font_size_tablet="200px" title_font_size_mob768="150px" title_font_size_mob480="100px" subtitle_font_size_tablet="47px" subtitle_font_size_mob768="24px" subtitle_font_size_mob480="22px" shape="%5B%7B%22shape_rotate%22%3A%22none%22%7D%5D"]');
									}
								?>
								<?php echo '' . $brief_desc; ?>
							</div>
						</figure>
						<section class="container wn-recipe-content-wrap">
						<?php if ( $deep_recipe_layout == 'left' ) { ?>
							<?php if( is_active_sidebar( 'Recipe Sidebar' ) ) { ?>
								<aside class="col-md-3 leftside sidebar <?php echo esc_attr( $sidebar_type ); ?> recipeside">
									<?php dynamic_sidebar( 'Recipe Sidebar' ); ?>
								</aside>
							<?php } ?>
						<?php } ?>
						<?php $deep_main_content_class = $deep_recipe_layout  == 'full' ? 'col-md-12' : 'col-md-9 cntt-w' ?>
							<div class="<?php echo esc_attr( $deep_main_content_class ); ?>">
								<div class="recipe-header">
									
									<!-- author -->
									<?php if ( $author == '1' ) { ?>
										<div class="au-avatar-box">
											<div class="au-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 ); ?></div>
											<p class="recipe-author"><?php esc_html_e('By ','deep');  the_author_posts_link(); ?></p>
										</div>
									<?php } ?>
									
									<!-- meta data -->
									<?php if ( $meta_data == '1' ) { ?>
										<div class="recipe-metadata">
										<?php if ( $meta_data_cat == '1' ) { 
											
												$post_id = get_the_ID();
												$terms	 = get_the_terms( $post_id , 'recipe_category' );

												// get current recipe category names
												$recipe_cat = '';
												if( is_array( $terms ) ) :
												foreach( $terms as $term )
													$recipe_cat .= $term->name . ' ';
												endif; ?>
											<div class="meta recipe-cat"><i class="ti-folder"></i><?php echo '' . $recipe_cat; ?> </div>
										<?php } ?>
										<?php if ( $meta_data_time == '1' ) {  ?>
											<div class="meta recipe-date"><i class="ti-calendar"></i><?php the_time(get_option( 'date_format' )) ?></div>
										<?php } ?>
										<?php if ( $meta_data_comment == '1' ) {  ?>
											<div class="meta recipe-comments"><i class="ti-comment"></i><?php comments_number(); ?> </div>
										<?php } ?>
										<?php if ( $meta_data_view == '1' ) {  ?>
											<div class="meta blog-views"><i class="ti-eye"></i><span><?php deep_setViews( $post_id ); echo deep_getViews( $post_id ); ?></span></div>
										<?php } ?>
										</div>
									<?php } ?>

									<!-- title -->
									<h1 class="recipe-title"><?php the_title(); ?></h1>
									
									<!-- excerpt -->
									<?php if ( get_the_excerpt() ) { ?>
										<p class="recipe-excerpt"><?php echo get_the_excerpt(); ?></p>
									<?php } ?>

									<!-- food information -->
									<?php if ( $serves || $prep_time || $calories || $cooking_time ) { ?>
										<div class="food-information colorb blox dark">
											<?php echo '' . $serves . $prep_time . $calories . $cooking_time ?>
										</div>
									<?php } ?>
							
								</div>
								
								<!-- content -->
								<?php the_content(); ?>

								<!-- social share -->
								<?php if ( $social_share == '1' ) { ?>
									<?php deep_social_share($post_id); ?>
								<?php } ?>
								<?php // Next and Prev Post 
							if ( $next_and_prev == '1') { ?>
								<div class="row">
									<div class="wn-recipe-nav">

										<!-- Prev Post -->
										<div class="col-md-6">
											<?php if ( ( isset( $have_prev_post ) ) ){ ?>
												<div class="wn-recipe-nav-wrap">
													<div class="wn-recipe-nav-text">
														<a href="<?php echo esc_attr( $prev_post_link ); ?>" class="hcolorf">
															<i class="icon-arrows-slim-left" ></i> <span> <?php esc_html_e( 'NXT POST' , 'deep' ); ?></span>
														</a>
													</div>
												</div>
											<?php } ?>
										</div>

										<!-- Next Post -->
										<div class="col-md-6 alignright">
											<?php if ( ( isset( $have_next_post ) ) ){ ?>
												<div class="wn-recipe-nav-wrap">
													<div class="wn-recipe-nav-text">
														<a href="<?php echo esc_attr( $next_post_link ); ?>" class="hcolorf">
															<span> <?php esc_html_e( 'PRV POST' , 'deep' ); ?></span> <i class="icon-arrows-slim-right" ></i>
														</a>
													</div>
												</div>
											<?php } ?>
										</div>

									</div> <!-- End nav -->
								</div>
							<?php } ?>
		<?php endwhile; endif; ?>
	<!-- Start Top Related -->
							<?php
						if ( $top_related == '1' ) {

								// get current recipe terms
								$post_id = get_the_ID();
								$terms	 = get_the_terms( $post_id , 'recipe_category' );

								// get current recipe category names
								$category_filter = array();
								if( is_array( $terms ) ) :
									foreach( $terms as $term )
										$category_filter[] = $term->slug;
								endif;

								// new Query
								$args = array(
									'post_type'		 => 'recipe',
									'taxonomy'		 => 'recipe_category',
									'post__not_in'	 => array( $post_id ),
									'orderby'        => 'rand',
									'posts_per_page' => 10,
									'tax_query'		 => array(
										array(
											'taxonomy' => 'recipe_category',
											'field'    => 'slug',
											'terms'    => $category_filter,
										),
									),
								);
								$rw_query = new WP_Query( $args );
							?>
								<section class="top-related">
									<!-- subtitle -->
									<div class="container">
											<!-- Top Related -->
											<div class="top-related row">
											<div class="col-md-12"><p class="top-related-title"><?php esc_html_e( 'TOP RELATED', 'deep' ) ?></p></div>
												<?php if ( $rw_query->have_posts()) : while ( $rw_query->have_posts() ) : $rw_query->the_post(); ?>
													<?php
													global $post;

													$deep_recipe = get_post_meta( $post->ID, 'deep_recipe', true );
													$deep_recipe_food_name = get_post_meta( $post->ID, 'deep_recipe_food_name', true );

													$thumbnail_url = get_the_post_thumbnail_url();
													$thumbnail_id  = get_post_thumbnail_id();
														if( !empty( $prev_post_thumbnail_id ) ) {
															// if main class not exist get it
															if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
																require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
															}
															$image = new Wn_Img_Maniuplate; // instance from settor class
															$img = $image->m_image( $thumbnail_id , $thumbnail_url , '342' , '415' ); // set required and get result
														}
													?>
													<div class="recipe-item col-md-4">
														<a href="<?php the_title(); ?>"><img src="<?php echo esc_attr( $img ); ?>" alt="<?php echo esc_html( $deep_recipe ); ?> <?php esc_html( $deep_recipe_food_name ); ?>">
															<h5><a class="hcolorf" href="<?php the_permalink(); ?>"><?php echo esc_html( $deep_recipe ) . ' ' . esc_html( $deep_recipe_food_name ); ?></a></h5>
														</a>
													</div>
												<?php endwhile; endif;
												wp_reset_postdata(); ?>
											</div> <!-- end latest-projects -->
									</div>
								</section>
						<?php } ?> 
								<?php comments_template(); ?>
							</div>
						<?php if( $deep_recipe_layout == 'right' ) { ?>
							<?php if( is_active_sidebar( 'Recipe Sidebar' ) ) { ?>
								<aside class="col-md-3 sidebar <?php echo esc_attr( $sidebar_type ); ?> recipeside">
									<?php dynamic_sidebar( 'Recipe Sidebar' ); ?>
								</aside>
							<?php } ?>
						<?php } ?>
						</section>
					</section>

	</div>

<?php get_footer(); ?>
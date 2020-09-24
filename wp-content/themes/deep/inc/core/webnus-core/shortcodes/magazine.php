<?php
add_action( 'wp_ajax_deep_magazine_ajax',			'deep_magazine_ajax' );
add_action( 'wp_ajax_nopriv_deep_magazine_ajax',	'deep_magazine_ajax' );
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
function deep_magazine_ajax() {
	$uniqid 		= $_POST['uniqid']			? $_POST['uniqid'] : '' ;
	$param_category	= $_POST['param_category']	? $_POST['param_category'] : '' ;
	$post_title		= $_POST['post_title']		? $_POST['post_title'] : '' ;
	$post_url		= $_POST['post_url']		? $_POST['post_url'] : '' ;
	$post_number	= $_POST['post_number']		? $_POST['post_number'] : '' ;
	$post_prepage	= $_POST['post_prepage']	? $_POST['post_prepage'] : '' ;
	$sort_order		= $_POST['sort_order']		? $_POST['sort_order'] : '' ;
	$type			= $_POST['type'] 			? $_POST['type'] : '' ;
	$param_tag		= $_POST['param_tag']		? $_POST['param_tag'] : '' ;
	$pagination		= $_POST['pagination']		? $_POST['pagination'] : '' ;
	$reviews		= $_POST['reviews']			? $_POST['reviews'] : '' ;

	echo do_shortcode( '[magazine param_category ="' . $param_category . '" post_title ="' . $post_title . '" post_url ="' . $post_url . '" post_number ="' . $post_number . '" post_prepage ="' . $post_prepage . '" sort_order ="' . $sort_order . '" type ="' . $type . '" param_tag ="' . $param_tag . '" pagination ="' . $pagination . '" reviews ="' . $reviews . '" ]' );
	wp_die();
}
function deep_magazine( $attributes, $content = null ) {
	extract(shortcode_atts(	array(
		'param_category'			=> '',
		'param_tag'					=> '',
		'post_title'				=> '',
		'post_title_border_color'	=> '',
		'post_title_color'			=> '',
		'post_url'					=> '',
		'type'						=> '1',
		'sort_order'				=> 'date',
		'post_number'				=> '8',
		'post_prepage'				=> '4',
		'readmore'					=> '',
		'readmore_text'				=> '',
		'pagination'				=> '',
		'shortcodeclass' 			=> '',
		'shortcodeid' 	 			=> '',
		'reviews' 	 				=> '',
		'hide_cat' 	 				=> '',
		'hide_date' 	 			=> '',
		'hide_author' 	 			=> '',
	), $attributes));

	wp_enqueue_style( 'wn-deep-magazine', DEEP_ASSETS_URL . 'css/frontend/magazine/magazine.css' );

	ob_start();
	// glob variables
	global $post;
	$post_slug = $post->post_name; 

	// Class & ID 
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	$hide_cat			= $hide_cat == 'true' ? ' hide-cat ' : '';
	$hide_date			= $hide_date == 'true' ? ' hide-date ' : '';
	$hide_author		= $hide_author == 'true' ? ' hide-author ' : '';
	$shortcodeclass 	.= $hide_cat . $hide_date . $hide_author;

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
	$readmore					= $readmore ? $readmore : '';
	$readmore_text				= $readmore_text ? $readmore_text : '';
	$param_category				= $param_category ? $param_category : '';
	$param_tag					= $param_tag ? $param_tag : '';
	$post_title					= $post_title ? $post_title : '';
	$post_url					= $post_url ? $post_url : '';
	$type						= $type ? $type : '';
	$sort_order					= $sort_order ? $sort_order : '';
	$post_number				= $post_number ? $post_number : '';
	$post_prepage				= $post_prepage ? $post_prepage : '';
	$post_title_border_color	= $post_title_border_color ? $post_title_border_color : '';
	$post_title_color			= $post_title_color ? $post_title_color : '';
	$excerpt_value				= isset( $excerpt_value ) ? $excerpt_value : '';
	
	// Get category
	$categories = array();
	$categories = get_categories();
	$category_slug_array = array('');
	$thumbnail_url_1 = $thumbnail_url_2 = '';

	$args = array(
		'post_type' 		=> 'post',
		'posts_per_page'	=> $post_number,
		'cat'				=> $param_category,
		'orderby'			=> $sort_order
	);

	// Instantiate custom query
	$custom_query 	= new WP_Query( $args );

	// Pagination fix
	$temp_query		= $custom_query;
	$custom_query	= NULL;
	$magazine		= $temp_query;

	$totall_post	= $magazine->post_count ? $magazine->post_count : '';

	if ( $type == '1' ) { 
		static $magazin_uniqid = 0;
		$magazin_uniqid++; ?>

	<div 
		class="magazin-wrap magazin-<?php echo '' . esc_attr( $type ) . ' ' . esc_attr( $shortcodeclass ); ?>"
		<?php echo $shortcodeid; ?>
		data-id="<?php echo esc_attr( $magazin_uniqid ); ?>"
		data-post-name="<?php echo esc_attr( $post_slug ); ?>"
		data-totall_post="<?php echo esc_attr( $totall_post ); ?>"
		data-pagination="<?php echo esc_attr( $pagination ); ?>"
		data-param_category="<?php echo esc_attr( $param_category ); ?>"
		data-param_tag="<?php echo esc_attr( $param_tag ); ?>"
		data-post_title="<?php echo esc_attr( $post_title ); ?>"
		data-post_url="<?php echo esc_attr( $post_url ); ?>"
		data-type="<?php echo esc_html( $type ); ?>"
		data-sort_order="<?php echo esc_attr( $sort_order ); ?>"
		data-post_number="<?php echo esc_attr( $post_number ); ?>"
		data-post_prepage="<?php echo esc_attr( $post_prepage ); ?>"
	>
		<?php
		static $title_uniqid = 0;
		$title_uniqid++;
		$post_title 	= $post_title ? '<h4 class="magazin-title" data-id="' . $title_uniqid . '">' . $post_title . '</h4>' : ''; ?>
		<div class="clearfix">
				
			<?php if ( $param_category_array ) {  ?>
			
				<div class="magazin-cat-nav-wrap">
					<?php if( $post_url ) { ?>
						<?php echo '<a href="' . esc_url( $post_url ) . '">'; ?>
					<?php } ?>
					<?php echo wp_kses( $post_title, wp_kses_allowed_html( 'post' ) ); ?>
					<?php if( $post_url ) { ?>
						<?php echo '</a>'; ?>
					<?php } ?>
					<ul class="magazin-cat-nav">
						<?php $category_list	= '<li><a href="#" class="all cat-item colorf" data-param_category="' . $param_category . '">' . esc_html__( 'All', 'deep' ) . '</a></li>'; ?>
						<?php $cat_counter		= 0; ?>
						<?php $catsize 			= sizeof($param_category_array); ?>
						<?php foreach( $param_category_array as $cat_id ) {

							$cat_counter++;
							$total_cat_counter = $cat_counter;

							$start_ul = ( $cat_counter == 5 ) ? '<li class="magazin-dropdown-list"><i class="sl-options"></i><ul>' : '';
							$category_term = get_term( $cat_id, 'category' );
							if ($category_term) {
								$category_list .= $start_ul . '<li><a href="#" data-cat-slug="' . $category_term->slug . '" class="cat-item" data-param_category="' . $cat_id . '">' . $category_term->name . '</a></li>';
							}
						}
						if ( $cat_counter == 5 ) {
							if ( $cat_counter == $catsize ) {
								$end_ul = '</ul></li>';
								$category_list .= $end_ul;
							}
						}
						echo '' . $category_list; ?>
					</ul>
				</div>
			
			<?php } ?>

			<div class="magazin-wrap-content">
				
				<?php
				$post_counter = 0;

					// The Loop
				if ( $magazine->have_posts() ) { ?>
					<?php
					static $uniqid = 0;
					while ( $magazine->have_posts() ) {

						// post counter
						$post_counter++;
						$magazine->the_post();

						$uniqid++;
						$thumbnail_url 	= get_the_post_thumbnail_url();
						$thumbnail_id  	= get_post_thumbnail_id();

						if( !empty( $thumbnail_url ) ) {

							// if main class not exist get it
							if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
								require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';

							}

							$image = new Wn_Img_Maniuplate; // instance from settor class
							$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '508' , '300' ); // set required and get result

						} ?>

						<?php if ( $post_counter % 2 == 1 ) { ?>

							<div class="row">

						<?php } ?>

								<div class="col-md-6 wn-pagination" >
									<article class="magazine-b<?php echo '' . $type;?> magazine-b<?php echo '' . $type ?>-cont" data-id="<?php echo '' . $uniqid; ?>">
										<figure class="magazine-b<?php echo '' . $type;?>-img">
											<a href="<?php the_permalink(); ?>">
												<img src="<?php echo '' . $thumbnail_url ?>" alt="<?php the_title(); ?>" >
											</a>
										</figure>
										<div class="magazine-b<?php echo '' . $type;?>-cont">
											<?php 
											if ( $hide_cat != 'true' ) { ?>
												<div class="magazine-b<?php echo '' . $type;?>-category" style="background: <?php echo deep_category_color(); ?>;">
														<span class="magazine-b<?php echo '' . $type;?>-cat magazine-cat" data-id="<?php echo '' . $uniqid; ?>"><?php the_category(', '); ?></span>
												</div>
											<?php
											} ?>
											<div class="magazine-b<?php echo '' . $type;?>-date">
												<i class="pe-7s-clock"></i><?php echo get_the_date();?>
											</div>
											<h3 class="magazine-b<?php echo '' . $type;?>-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="magazine-author">
												<span><?php echo get_avatar( get_the_author_meta( 'user_email' ), 28 ); ?></span>
												<span><?php the_author_posts_link(); ?></span>	
											</div>
											<?php $reviews = $reviews == 'show' ? deep_admin_post_review() : ''; ?>
										</div>
									</article>
								</div>

						<?php if ( $post_counter % 2 == 0 ) { ?>

							</div>

						<?php } ?>
					<?php } ?>
			</div>
		</div><!-- End magazin-wrap  -->
			<?php }	
			$pagination 				= ( $pagination != 'yes' ) ? '#wrap .magazin-wrap[data-id="' . $magazin_uniqid . '"] .pagination { display: none !important;}' : '';
			$post_title_border_color	= !empty( $post_title_border_color ) ? '.magazin-wrap .magazin-cat-nav-wrap .magazin-title[data-id="' . $title_uniqid . '"]:before { background-color: ' . $post_title_border_color . '; }' : '';
			$post_title_color			= !empty( $post_title_color ) ? '.magazin-wrap .magazin-cat-nav-wrap .magazin-title[data-id="' . $title_uniqid . '"] { color: ' . $post_title_color . '; }' : '';
			$style 						= $post_title_border_color . $post_title_color . $pagination; 
			deep_save_dyn_styles( $style );
			// live editor
			if ( ! in_array( 'admin-bar', get_body_class() ) ) {

				if ( ! empty( $style ) ) {

					echo '<style>';
						echo $style;
					echo '</style>';

				}

			}
			?>

	</div>

	<?php } elseif ( $type == '2' ) { 
		static $magazin_uniqid = 0;
		$magazin_uniqid++; ?>

	<div 
		class="magazin-wrap magazin-<?php echo esc_attr( $type ) . ' ' . esc_attr( $shortcodeclass ); ?>"
		<?php echo $shortcodeid; ?>
		data-id="<?php echo esc_attr( $magazin_uniqid );?>"
		data-post-name="<?php echo esc_attr( $post_slug );?>"
		data-totall_post="<?php echo esc_attr( $totall_post );?>"
		data-pagination="<?php echo esc_attr( $pagination );?>"
		data-param_category="<?php echo esc_attr( $param_category );?>"
		data-param_tag="<?php echo esc_attr( $param_tag );?>"
		data-post_title="<?php echo esc_attr( $post_title );?>"
		data-post_url="<?php echo esc_attr( $post_url ) ; ?>"
		data-type="<?php echo esc_html( $type ); ?>"
		data-sort_order="<?php echo esc_attr( $sort_order)	; ?>"
		data-post_number="<?php echo esc_attr( $post_number) ; ?>"
		data-post_prepage="<?php echo esc_attr( $post_prepage) ; ?>"
		data-excerpt_value="<?php echo esc_attr( $excerpt_value) ; ?>"
	>
		<?php
		static $title_uniqid = 0;
		$title_uniqid++;

		$post_title 	= $post_title ? '<h4 class="magazin-title" data-id="' . $title_uniqid . '">' . $post_title . '</h4>' : ''; ?>
		<div class="clearfix">
			<?php if ( $param_category_array ) {  ?>
				<div class="magazin-cat-nav-wrap">
					<?php if( $post_url ) { ?>
						<?php echo '<a href="' . esc_url( $post_url ) . '">' ?>
					<?php } ?>
					<?php echo wp_kses( $post_title, wp_kses_allowed_html( 'post' ) ); ?>
					<?php if( $post_url ) { ?>
						<?php echo '</a>' ?>
					<?php } ?>
					
					<ul class="magazin-cat-nav">
						<?php $category_list	= '<li><a href="#" class="all cat-item colorf" data-param_category="' . $param_category . '">' . esc_html__( 'All', 'deep' ) . '</a></li>'; ?>
						<?php $cat_counter		= 0; ?>
						<?php $catsize 			= sizeof($param_category_array); ?>
						<?php foreach( $param_category_array as $cat_id ) {
							
							$cat_counter++;
							$total_cat_counter = $cat_counter;

							$start_ul = ( $cat_counter == 5 ) ? '<li class="magazin-dropdown-list"><i class="sl-options"></i><ul>' : '';
							
							$category_list .= $start_ul . '<li><a href="#" data-cat-slug="' . deep_get_cat_slug( $cat_id ) . '" class="cat-item" data-param_category="' . $cat_id . '">' . get_the_category_by_ID( $cat_id ) . '</a></li>';
						}
						if ( $cat_counter == 5 ) {
							if ( $cat_counter == $catsize ) {
								$end_ul = '</ul></li>';
								$category_list .= $end_ul;
							}
						}
						echo '' . $category_list; ?>
					</ul>
				</div>
			
			<?php } ?>

			<div class="magazin-wrap-content">
				
				<?php
				$first_post = true;
				$post_counter = 0;
					// The Loop
				if ( $magazine->have_posts() ) {
					static $uniqid = 0;  ?>

					<div class="row">
						<?php while ( $magazine->have_posts() ) {

							$post_counter++;

							// post counter
							$magazine->the_post();
							$uniqid++;
							$thumbnail_url 	= get_the_post_thumbnail_url();
							$thumbnail_id  	= get_post_thumbnail_id();
							
							if( !empty( $thumbnail_url ) ) {

								// if main class not exist get it
								if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
									require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';

								}

								$image = new Wn_Img_Maniuplate; // instance from settor class
								$thumbnail_url_1 = $image->m_image( $thumbnail_id, $thumbnail_url , '508' , '300' ); // set required and get result
								$thumbnail_url_2 = $image->m_image( $thumbnail_id, $thumbnail_url , '120' , '80' ); // set required and get result

							} 
							if ( $first_post == true ) { ?>
								<div class="col-md-6">
									<div class="left-section">
										<article class="magazine-b<?php echo '' . $type;?> magazine-b<?php echo '' . $type ?>-cont" data-id="<?php echo '' . $uniqid; ?>">
											<figure class="magazine-b<?php echo '' . $type;?>-img">
												<img src="<?php echo '' . $thumbnail_url_1 ?>" alt="<?php the_title(); ?>" >
											</figure>
											<div class="magazine-b<?php echo '' . $type;?>-cont">
												<?php 
												if ( $hide_cat != 'true' ) { ?>
													<div class="magazine-b<?php echo '' . $type;?>-category" style="background: <?php echo deep_category_color(); ?>;">
														<span class="magazine-b<?php echo '' . $type;?>-cat magazine-cat" data-id="<?php echo '' . $uniqid; ?>"><?php the_category(', '); ?></span>
													</div>												<?php
												} ?>
												<div class="magazine-b<?php echo '' . $type;?>-date">
													<i class="pe-7s-clock"></i><?php echo get_the_date();?>
												</div>
												<h3 class="magazine-b<?php echo '' . $type;?>-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<div class="magazine-author">
													<span><?php echo get_avatar( get_the_author_meta( 'user_email' ), 28 ); ?></span>
													<span><?php the_author_posts_link(); ?></span>	
												</div>
												<?php $reviews = $reviews == 'show' ? deep_admin_post_review() : ''; ?>
											</div>
										</article>
									</div>
								</div>
							<?php } else { ?>
									<?php if ( $post_counter == 2 ) { ?>
										<div class="col-md-6">
											<div class="right-section">
									<?php } ?>
											<article class="wn-pagination magazine-b<?php echo '' . $type;?> magazine-b<?php echo '' . $type ?>-cont" data-id="<?php echo '' . $uniqid; ?>">
												<figure class="magazine-b<?php echo '' . $type;?>-img">
													<img src="<?php echo '' . $thumbnail_url_2 ?>" alt="<?php the_title(); ?>" >
												</figure>
												<div class="magazine-b<?php echo '' . $type;?>-cont">
													<div class="magazine-b<?php echo '' . $type;?>-date">
														<i class="pe-7s-clock"></i><?php echo get_the_date();?>
													</div>
													<?php $reviews = $reviews == 'show' ? deep_admin_post_review() : ''; ?>
													<h3 class="magazine-b<?php echo '' . $type;?>-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												</div>
											</article>
									<?php if (( $magazine->current_post +1 ) == ( $magazine->post_count) ) { ?>
											</div>
										</div>
									<?php } ?>
								<?php if ( $first_post == true ) { ?>
									</div>
								<?php } ?>
							<?php } $first_post = false;
						} ?>
					</div>
			</div>
		</div><!-- End magazin-wrap  -->

			<?php } 
			$pagination 				= ( $pagination != 'yes' ) ? '#wrap .magazin-wrap[data-id="' . $magazin_uniqid . '"] .pagination { display: none !important;}' : '';
			$post_title_border_color	= !empty( $post_title_border_color ) ? '.magazin-wrap .magazin-cat-nav-wrap .magazin-title[data-id="' . $title_uniqid . '"]:before { background-color: ' . $post_title_border_color . '; }' : '';
			$post_title_color			= !empty( $post_title_color ) ? '.magazin-wrap .magazin-cat-nav-wrap .magazin-title[data-id="' . $title_uniqid . '"] { color: ' . $post_title_color . '; }' : '';
			$style 						= $post_title_border_color . $post_title_color . $pagination; 
			deep_save_dyn_styles( $style );
			// live editor
			if ( ! in_array( 'admin-bar', get_body_class() ) ) {

				if ( ! empty( $style ) ) {

					echo '<style>';
						echo $style;
					echo '</style>';

				}

			}
			?>

	</div>

	<?php }  elseif ( $type == '3' ) { 
		static $magazin_uniqid = 0;
		$magazin_uniqid++; ?>


	<div 
		class="magazin-wrap magazin-<?php echo esc_attr( $type ) . ' ' . esc_attr( $shortcodeclass ); ?>"
		<?php echo $shortcodeid; ?>
		data-id="<?php echo esc_attr( $magazin_uniqid ); ?>"
		data-post-name="<?php echo esc_attr( $post_slug ); ?>"
		data-totall_post="<?php echo esc_attr( $totall_post ); ?>"
		data-pagination="<?php echo esc_attr( $pagination ); ?>"
		data-param_category="<?php echo esc_attr( $param_category ); ?>"
		data-param_tag="<?php echo esc_attr( $param_tag ); ?>"
		data-post_title="<?php echo esc_attr( $post_title ); ?>"
		data-post_url="<?php echo esc_attr( $post_url ); ?>"
		data-type="<?php echo esc_html( $type ); ?>"
		data-sort_order="<?php echo esc_attr( $sort_order )	; ?>"
		data-post_number="<?php echo esc_attr( $post_number ); ?>"
		data-post_prepage="<?php echo esc_attr( $post_prepage ); ?>"
		data-excerpt_value="<?php echo esc_attr( $excerpt_value ); ?>"
	>
		<?php 
		static $title_uniqid = 0;
		$title_uniqid++;
		$post_title 	= $post_title ? '<h4 class="magazin-title" data-id="' . $title_uniqid . '">' . $post_title . '</h4>' : ''; ?>
		<div class="clearfix">
				
			<?php if ( $param_category_array ) {  ?>
			
				<div class="magazin-cat-nav-wrap">
					<?php if( $post_url ) { ?>
						<?php echo '<a href="' . esc_url( $post_url ) . '">' ?>
					<?php } ?>
					<?php echo wp_kses( $post_title, wp_kses_allowed_html( 'post' ) ); ?>
					<?php if( $post_url ) { ?>
						<?php echo '</a>' ?>
					<?php } ?>
					<ul class="magazin-cat-nav">
						<?php $category_list	= '<li><a href="#" class="all cat-item colorf" data-param_category="' . $param_category . '">' . esc_html__( 'All', 'deep' ) . '</a></li>'; ?>
						<?php $cat_counter		= 0; ?>
						<?php $catsize 			= sizeof($param_category_array); ?>

						<?php foreach( $param_category_array as $cat_id ) {

							$cat_counter++;
							$total_cat_counter = $cat_counter;

							$start_ul = ( $cat_counter == 5 ) ? '<li class="magazin-dropdown-list"><i class="sl-options"></i><ul>' : '';
							
							$category_list .= $start_ul . '<li><a href="#" data-cat-slug="' . deep_get_cat_slug( $cat_id ) . '" class="cat-item" data-param_category="' . $cat_id . '">' . get_the_category_by_ID( $cat_id ) . '</a></li>';
						}
						if ( $cat_counter == 5 ) {
							if ( $cat_counter == $catsize ) {
								$end_ul = '</ul></li>';
								$category_list .= $end_ul;
							}
						}
						
						echo '' . $category_list; ?>
					</ul>
				</div>
			
			<?php } ?>

			<div class="magazin-wrap-content">
				
				<?php
				$first_post = true;
				$post_counter = 0;
					// The Loop
				if ( $magazine->have_posts() ) { ?>
					<div class="row">
						<?php
						static $uniqid = 0;
						while ( $magazine->have_posts() ) {

							$post_counter++;

							// post counter
							$magazine->the_post();
							$uniqid++;
							$thumbnail_url 	= get_the_post_thumbnail_url();
							$thumbnail_id  	= get_post_thumbnail_id();
							if( !empty( $thumbnail_url ) ) {

								// if main class not exist get it
								if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
									require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';

								}

								$image = new Wn_Img_Maniuplate; // instance from settor class
								$thumbnail_url_1 = $image->m_image( $thumbnail_id, $thumbnail_url , '508' , '300' ); // set required and get result
								$thumbnail_url_2 = $image->m_image( $thumbnail_id, $thumbnail_url , '120' , '80' ); // set required and get result

							} 
							if ( $first_post == true ) { ?>
								<div class="col-md-6">
									<div class="left-section ">
										<article class="magazine-b<?php echo '' . $type;?> magazine-b<?php echo '' . $type ?>-cont" data-id="<?php echo '' . $uniqid; ?>">
											<figure class="magazine-b<?php echo '' . $type;?>-img">
												<a href="<?php the_permalink(); ?>">
													<img src="<?php echo '' . $thumbnail_url_1 ?>" alt="<?php the_title(); ?>" >
												</a>
											</figure>
											<div class="magazine-b<?php echo '' . $type;?>-cont">
												<?php 
												if ( $hide_cat != 'true' ) { ?>
													<div class="magazine-b<?php echo '' . $type;?>-category" style="background: <?php echo deep_category_color(); ?>;">
														<span class="magazine-b<?php echo '' . $type;?>-cat magazine-cat" data-id="<?php echo '' . $uniqid; ?>"><?php the_category(', '); ?></span>
													</div>
												<?php
												} ?>
												<div class="magazine-b<?php echo '' . $type;?>-date">
													<i class="pe-7s-clock"></i><?php echo get_the_date();?>
												</div>
												<h3 class="magazine-b<?php echo '' . $type;?>-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<div class="magazine-author">
													<span><?php echo get_avatar( get_the_author_meta( 'user_email' ), 28 ); ?></span>
													<span><?php the_author_posts_link(); ?></span>	
												</div>
												<?php $reviews = $reviews == 'show' ? deep_admin_post_review() : ''; ?>
											</div>
										</article>
									</div>
								</div>
							<?php } else { ?>
									<?php if ( $post_counter == 2 ) { ?>
										<div class="col-md-6">
											<div class="left-section">
												<article class="magazine-b<?php echo '' . $type;?> magazine-b<?php echo '' . $type ?>-cont" data-id="<?php echo '' . $uniqid; ?>">
													<figure class="magazine-b<?php echo '' . $type;?>-img">
														<a href="<?php the_permalink(); ?>">
															<img src="<?php echo '' . $thumbnail_url_1 ?>" alt="<?php the_title(); ?>" >
														</a>
													</figure>
													<div class="magazine-b<?php echo '' . $type;?>-cont">
														<?php 
														if ( $hide_cat != 'true' ) { ?>
															<div class="magazine-b<?php echo '' . $type;?>-category" style="background: <?php echo deep_category_color(); ?>;">
																<span class="magazine-b<?php echo '' . $type;?>-cat magazine-cat" data-id="<?php echo '' . $uniqid; ?>"><?php the_category(', '); ?></span>
															</div>
														<?php
														} ?>
														<div class="magazine-b<?php echo '' . $type;?>-date">
															<i class="pe-7s-clock"></i><?php echo get_the_date();?>
														</div>
														<h3 class="magazine-b<?php echo '' . $type;?>-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
														<div class="magazine-author">
															<span><?php echo get_avatar( get_the_author_meta( 'user_email' ), 28 ); ?></span>
															<span><?php the_author_posts_link(); ?></span>	
														</div>
														<?php $reviews = $reviews == 'show' ? deep_admin_post_review() : ''; ?>
													</div>
												</article>
											</div>
										</div>
									</div>
									<?php } ?>
								<?php if ( $post_counter >= 3 ) { ?>
									<div class="col-md-6 below-section wn-pagination">
										<article class="magazine-b<?php echo '' . $type;?> magazine-b<?php echo '' . $type ?>-cont" data-id="<?php echo '' . $uniqid; ?>">
											<figure class="magazine-b<?php echo '' . $type;?>-img">
												<a href="<?php the_permalink(); ?>">
													<img src="<?php echo '' . $thumbnail_url_2 ?>" alt="<?php the_title(); ?>" >
												</a>
											</figure>
											<div class="magazine-b<?php echo '' . $type;?>-cont">
												<div class="magazine-b<?php echo '' . $type;?>-date">
													<i class="pe-7s-clock"></i><?php echo get_the_date();?>
												</div>
												<?php $reviews = $reviews == 'show' ? deep_admin_post_review() : ''; ?>
												<h3 class="magazine-b<?php echo '' . $type;?>-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											</div>
										</article>
									</div>
								<?php } ?>

							<?php } $first_post = false;
						} ?>
				</div>
			</div>
		</div><!-- End magazin-wrap  -->

			<?php } 
			$pagination 				= ( $pagination != 'yes' ) ? '#wrap .magazin-wrap[data-id="' . $magazin_uniqid . '"] .pagination { display: none !important;}' : '';
			$post_title_border_color	= !empty( $post_title_border_color ) ? '.magazin-wrap .magazin-cat-nav-wrap .magazin-title[data-id="' . $title_uniqid . '"]:before { background-color: ' . $post_title_border_color . '; }' : '';
			$post_title_color			= !empty( $post_title_color ) ? '.magazin-wrap .magazin-cat-nav-wrap .magazin-title[data-id="' . $title_uniqid . '"] { color: ' . $post_title_color . '; }' : '';
			$style 						= $post_title_border_color . $post_title_color . $pagination; 
			deep_save_dyn_styles( $style );
			// live editor
			if ( ! in_array( 'admin-bar', get_body_class() ) ) {

				if ( ! empty( $style ) ) {

					echo '<style>';
						echo $style;
					echo '</style>';

				}

			}
			?>


	<?php }

	// Reset main query object
	$magazine = NULL;
	$magazine = $temp_query;
	$out = ob_get_contents();
	ob_end_clean();
	wp_reset_postdata(); // Restore original Post Data
	return $out;

	wp_die();
}

add_shortcode('magazine', 'deep_magazine');

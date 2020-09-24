<?php
function hotella_rooms( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type' 	 				=> 'grid',
		'room_count' 	 		=> '',
		'number_row' 	 		=> 'three',
		'pagination' 	 		=> '',
		
	), $atts));
	
	ob_start();

	switch ($type) {
		case 'grid':
			
			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
				$args = array(  
					'post_type' 			=> 'hb_room',			
					'posts_per_page'  => $room_count,	
					'paged' 					=> $paged, 						
				);

				$query  = new \WP_Query( $args );
				
				while ( $query ->have_posts() ) : $query ->the_post();
					global $hb_room;
					$thumbnail_url 	= get_the_post_thumbnail_url();
					$thumbnail_id  	= get_post_thumbnail_id();
					$categories		= get_the_category(); 	
					$keyfeatures	= get_post_meta( get_the_ID(), '_hb_room_addition_information', true );
					$post_excerpt	= deep_excerpt(20);			
					$rating = $hb_room->average_rating(); 
					if( !empty( $thumbnail_url ) ) {
						if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
							require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
						}
						$image = new \Wn_Img_Maniuplate; // instance from settor class
						$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '420' , '330' ); // set required and get result
					}
					switch ($number_row) {
						case 'two':
							?>

							<article class="room-grid-item col-md-6"> 
								<figure class="room-grid-item-figure">
									<a href="<?php the_permalink(); ?>">
										<?php echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">'; ?>
									</a>
									<div class="room-grid-content">				
									<h2 class="room-grid-title"><?php the_title(); ?></h2>
									<?php if ( comments_open( $hb_room->ID ) ) { ?>
										<div class="grid-room-rating">
											<?php if ( $rating ) { ?>
												<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating"
													title="<?php echo sprintf( __( 'Rated %d out of 5', 'wp-hotel-booking' ), $rating ) ?>">
													<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"></span>
												</div>
											<?php } ?>
										</div>
									<?php } ?>	
									<p class="txt-excerpt"><?php echo $post_excerpt; ?></p>
									<a href="<?php the_permalink(); ?>" class="full-details"><?php echo esc_html__( 'All details', 'deep' ) ;?></a>
									<?php hotel_booking_loop_room_price(); ?>	
									</div>
								</figure>		
							</article>

							<?php
							break;

						case 'three':
							?>

							<article class="room-grid-item col-md-4"> 
								<figure class="room-grid-item-figure">
									<a href="<?php the_permalink(); ?>">
										<?php echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">'; ?>
									</a>
									<div class="room-grid-content">				
									<h2 class="room-grid-title"><?php the_title(); ?></h2>
									<?php if ( comments_open( $hb_room->ID ) ) { ?>
										<div class="grid-room-rating">
											<?php if ( $rating ) { ?>
												<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating"
													title="<?php echo sprintf( __( 'Rated %d out of 5', 'wp-hotel-booking' ), $rating ) ?>">
													<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"></span>
												</div>
											<?php } ?>
										</div>
									<?php } ?>	
									<p class="txt-excerpt"><?php echo $post_excerpt; ?></p>
									<a href="<?php the_permalink(); ?>" class="full-details"><?php echo esc_html__( 'All details', 'deep' ) ;?></a>
									<?php hotel_booking_loop_room_price(); ?>	
									</div>
								</figure>															
							</article>

							<?php
							break;
						
						case 'for':
							?>

							<article class="room-grid-item col-md-3"> 
								<figure class="room-grid-item-figure">
									<a href="<?php the_permalink(); ?>">
										<?php echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">'; ?>
									</a>
									<div class="room-grid-content">				
									<h2 class="room-grid-title"><?php the_title(); ?></h2>
									<?php if ( comments_open( $hb_room->ID ) ) { ?>
										<div class="grid-room-rating">
											<?php if ( $rating ) { ?>
												<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating"
													title="<?php echo sprintf( __( 'Rated %d out of 5', 'wp-hotel-booking' ), $rating ) ?>">
													<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"></span>
												</div>
											<?php } ?>
										</div>
									<?php } ?>	
									<p class="txt-excerpt"><?php echo $post_excerpt; ?></p>
									<a href="<?php the_permalink(); ?>" class="full-details"><?php echo esc_html__( 'All details', 'deep' ) ;?></a>
									<?php hotel_booking_loop_room_price(); ?>	
									</div>
								</figure>	
							</article>

							<?php
							break;
						
						case 'six':
							?>

							<article class="room-grid-item col-md-2"> 
								<figure class="room-grid-item-figure">
									<a href="<?php the_permalink(); ?>">
										<?php echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">'; ?>
									</a>
									<div class="room-grid-content">				
									<h2 class="room-grid-title"><?php the_title(); ?></h2>
									<?php if ( comments_open( $hb_room->ID ) ) { ?>
										<div class="grid-room-rating">
											<?php if ( $rating ) { ?>
												<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating"
													title="<?php echo sprintf( __( 'Rated %d out of 5', 'wp-hotel-booking' ), $rating ) ?>">
													<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"></span>
												</div>
											<?php } ?>
										</div>
									<?php } ?>	
									<p class="txt-excerpt"><?php echo $post_excerpt; ?></p>
									<a href="<?php the_permalink(); ?>" class="full-details"><?php echo esc_html__( 'All details', 'deep' ) ;?></a>
									<?php hotel_booking_loop_room_price(); ?>	
									</div>
								</figure>	
							</article>

							<?php
							
							break;
												
					}		
								
				endwhile;
				
				wp_reset_postdata();

				if ($pagination == 'true') {
					echo '<div class="pagination-room">';
					echo paginate_links( array(
						'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'total'        => $query->max_num_pages,
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'format'       => '?paged=%#%',
						'show_all'     => false,
						'type'         => 'plain',
						'end_size'     => 2,
						'mid_size'     => 1,
						'prev_next'    => true,						
						'add_args'     => false,
						'add_fragment' => '',
					) );				
				echo '</div>';
				}
				

				break;

		
		case 'list':
				$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
				$args = array(  
					'post_type' 	  => 'hb_room',			
					'posts_per_page'  => $room_count,	
					'paged' 		  => $paged, 						
				);

				$query  = new \WP_Query( $args );
				
				while ( $query ->have_posts() ) : $query ->the_post();
					global $hb_room;
					$thumbnail_url 	= get_the_post_thumbnail_url();
					$thumbnail_id  	= get_post_thumbnail_id();
					$categories = get_the_category(); 
					$keyfeatures	= get_post_meta( get_the_ID(), '_hb_room_addition_information', true );
					$post_excerpt	= deep_excerpt(20);					
					$extra_product = \Deep_HB_Room_Extra::instance( get_the_ID() );
					$room_extra    = $extra_product->get_extra();					
					if( !empty( $thumbnail_url ) ) {
						if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
							require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
						}
						$image = new \Wn_Img_Maniuplate; // instance from settor class
						$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '600' , '400' ); // set required and get result
					}
					
					?>
						<div class="col-md-12 room-list-wrap">
							<article class="room-list-item"> 
								<div class="room-list-left">
									<figure class="room-list-item-figure">
										<a href="<?php the_permalink(); ?>">
											<?php echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">'; ?>
										</a>
									</figure>
								</div>							
								<div class="room-list-right">
									<div class="room-list-content">														
										<?php hotel_booking_room_title(); ?>
										<?php hotel_booking_loop_room_price(); ?>											
										<?php 													
											if ( $keyfeatures > 0 ) {
												echo '<h4 class="pack-title"> ' . esc_html__( 'key features:', 'deep' ). '</h4>';
												echo '<div class="room-list-features">';
												echo $keyfeatures;
												echo '</div>';
											}										
										?>										
										 <div class="htc-single-extra-wrap">										
											<ul class="htc-extras">
											<?php
												foreach ($room_extra as $key => $value) { ?>
													<li class="extra-item">
														<?php
														// icon
														if ( $value->icon ) : ?>
															<i class="colorf <?php echo esc_attr($value->icon); ?>"></i>
														<?php
														endif;
														// title
														if ( $value->title ) : ?>
															<p class="extra-title">
															<?php echo esc_attr($value->title); ?>
															</p>
														<?php endif; ?>
													</li>
												<?php
											} ?>
											</ul>
										<?php do_action( 'hotel_booking_single_room_title' ); ?>
										
										<a href="<?php the_permalink(); ?>" class="room-list-view-more"><?php echo esc_html__( 'View more infomation', 'deep' ) ?></a>
																		
										</div>				
									</div>
								</div>																			
							</article>
						</div>
              
					<?php
								
				endwhile;
					
					wp_reset_postdata();

					if ($pagination == 'true') {
						echo '<div class="pagination-room">';
						echo paginate_links( array(
							'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
							'total'        => $query->max_num_pages,
							'current'      => max( 1, get_query_var( 'paged' ) ),
							'format'       => '?paged=%#%',
							'show_all'     => false,
							'type'         => 'plain',
							'end_size'     => 2,
							'mid_size'     => 1,
							'prev_next'    => true,						
							'add_args'     => false,
							'add_fragment' => '',
						) );				
					echo '</div>';
					}

			break;

		default:
			# code...
			break;
	}


	$out = ob_get_contents();
	ob_end_clean();
	$out = str_replace('<p></p>','',$out);

	return $out;
}

add_shortcode('rooms', 'hotella_rooms');

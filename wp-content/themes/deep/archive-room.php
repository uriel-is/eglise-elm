<?php
/**
 * Deep Theme.
 * 
 * The template for displaying gallery pages
 *
 * @since   1.0.0
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( class_exists( 'HTC_HB' ) ) {
    class WN_Rooms_Archive extends WN_Core_Templates {

        /**
		 * Instance of this class.
         *
		 * @since   1.0.0
		 * @access  public
		 * @var     WN_Rooms_Archive
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
		 * Define the core functionality of the archive-gallery.php
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
			$this->headline();
			$room_archive_sidebar	   = deep_get_option( $this->theme_options, 'deep_room_archive_sidebar' );			
			$catalog_number_column     = get_option('tp_hotel_booking_catalog_number_column');							
			?>
			<div class="container">
				<?php if($room_archive_sidebar == 'left'){ ?>
					<aside class="col-md-3 sidebar leftside">
						<?php dynamic_sidebar( 'Left Sidebar' ); ?>
					</aside>
				<?php } ?>
				
				<section class="page-content <?php echo ($room_archive_sidebar =='none')?'col-md-12':'col-md-9 cntt-w'?>" >			
					<?php
					if ( class_exists( 'WP_Hotel_Booking' ) ) {
																																	
						$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
						$args = array(  
							'post_type' 		=> 'hb_room',
							'paged' 			=> $paged,
							'nopaging'			=> false, 
							'orderby' 			=> 'date',								
						);							
						$query  = new WP_Query( $args );
						
						while ( $query ->have_posts() ) : $query ->the_post();
							global $hb_room;
							$thumbnail_url 	= get_the_post_thumbnail_url();
							$thumbnail_id  	= get_post_thumbnail_id();
							$categories		= get_the_category(); 
							$keyfeatures	= get_post_meta( get_the_ID(), '_hb_room_addition_information', true );
							$post_excerpt	= deep_excerpt(20);
							$rating 		= $hb_room->average_rating(); 
							if( !empty( $thumbnail_url ) ) {
								if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
									require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
								}
								$image = new Wn_Img_Maniuplate; // instance from settor class
								$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '420' , '330' ); // set required and get result
							}
								
							switch ($catalog_number_column) {
								case '2':
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
								case '3':
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
									
								case '4':
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
									
								case '6':
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
					?>
				</section>

				<?php if($room_archive_sidebar == 'right'){ ?>
					<aside class="col-md-3 sidebar rightside">
						<?php dynamic_sidebar( 'right Sidebar' ); ?>
					</aside>
				<?php } ?>
			</div>	
			<?php
			wp_reset_postdata();
		}

		/**
		 * Get page title
		 * 
		 * @since	1.0.0
		 */
		private function headline() {
			$enable_archive_title	   = deep_get_option( $this->theme_options, 'deep_room_archive_enable' );
			$room_archive_title	       = deep_get_option( $this->theme_options, 'deep_room_archive_title' );			
			if ( $enable_archive_title ) {
				echo '
				<section id="headline">
					<div class="container">
						<h2>'. $room_archive_title .'</h2>
					</div>
				</section>';
			} 
		}
		
    }

	// Run
    WN_Rooms_Archive::get_instance();    
}

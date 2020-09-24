<?php
/******************/
/**  Single Gallery Post
/******************/
get_header();


$deep_options = deep_options();
$deep_options['deep_blog_social_share'] = isset($deep_options['deep_blog_social_share']) ? $deep_options['deep_blog_social_share'] : '1' ;

?>

<!-- Start Page Content -->
	<div class="wn-gallery-single">
		<?php
			if( have_posts() ):
				while( have_posts() ):
					the_post(); 

					$pure_content = get_the_content();
					$vc_enabled	  = ( $pure_content && substr( $pure_content, 0, 4 ) === '[vc_' ) ? true : false;
					if ( ! $vc_enabled ) : ?>
						<!-- Start Page Content -->
						<div class="wn-section clearfix">
							<div id="main-content" class="container">
								<figure class="gallery-single-featured-image image-id-<?php echo get_post_thumbnail_id(); ?>">
									<?php get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'Full', 'link_to_post' => false, ) );?>
								</figure>
								<div class="single-gallery-title"><h2><?php the_title(); ?></h2></div>
								<div class="gallery-information">
									<p class="itemx"><?php echo esc_html__( 'Images', 'deep' ); ?></p> || 
									<p><?php echo esc_html__( 'Created', 'deep' ); ?> <?php the_time(get_option( 'date_format' )) ?></p> ||
								</div>
								<?php
									if($deep_options['deep_blog_social_share']) { deep_social_share( get_the_id() ); }
										the_content();
								?>
								<div class="wn-search-gallery">
									<?php get_search_form(); ?>
								</div>
							</div> <!-- end container -->
						</div> <!-- end wn-section -->
					<?php else : ?>

					<div class="single-gallery-title"><h2><?php the_title(); ?></h2></div>
					<div class="gallery-information">
						<p class="itemx"><?php echo esc_html__( 'Images', 'deep' ); ?></p> || 
						<p><?php echo esc_html__( 'Created', 'deep' ); ?> <?php the_time(get_option( 'date_format' )) ?></p> ||
					</div>  
						<?php
						if($deep_options['deep_blog_social_share']) { deep_social_share( get_the_id() ); }
							the_content();
						endif;
						?>
		<?php	endwhile;
			endif;
		?>
	</div>


<?php get_footer(); ?>
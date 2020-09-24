<?php
	/******************/
	/**  Single Cause
	/******************/
	get_header();
	?>
	<section class="container page-content" >
	<hr class="vertical-space2">
	<?php
	$deep_options = deep_options();
	$progressbar = $cause_days = $cause_donate = '';
	$received = $percentage = 0;

	$received	= rwmb_meta( 'deep_cause_amount_received' );
	$amount		= rwmb_meta( 'deep_cause_amount' );
	$end		= rwmb_meta( 'deep_cause_end_date' );

	$currency 	= isset( $deep_options['webnus_cause_currency'] ) ? $deep_options['webnus_cause_currency'] : '$' ;


	$now		= date( 'Y-m-d 23:59:59' );
	$now		= strtotime( $now );
	$end_date	= $end.' 23:59:59';
	$your_date	= strtotime( $end_date );
	$datediff	= $your_date - $now;
	$days_left	= floor( $datediff / ( 60*60*24 ));
	$date_msg	= '';

	if( $days_left==0 ) {
		$date_msg = '1';
	} elseif($days_left<0) {
		$date_msg = 'No';
	} else {
		$date_msg = $days_left+'1'.'';
	}

	$cause_days = ( $percentage < 100 ) ? $date_msg . ' ' . esc_html__('Days left to achieve target','deep') : esc_html__('Thank You','deep') ;

	if( $amount ) {
		$uniqid = uniqid();
		$percentage 	= ($received/$amount)*100;
		$percentage 	= round($percentage);
		$out			= '<p>' . $percentage.'% '.esc_html__('DONATED OF ','deep').$currency.$amount . '</p>';
		$progressbar 	= '
			<div class="wn-cause-prgs-bar-wrap wn-cause-prgs-' . $uniqid . '">
				' . $out . '
				<div class="wn-cause-prgs-bar-bg">
					<div class="wn-cause-prgs-bar colorb"></div>
				</div>
			</div>';
		deep_save_dyn_styles( '
			.wn-cause-prgs-bar-wrap.wn-cause-prgs-' . $uniqid . ' .wn-cause-prgs-bar-bg .wn-cause-prgs-bar  {
				width: ' . $percentage . '%;
			}
		' );
	}
	?>

	<section class="col-sm-12 wn-single-couse">

		<?php if( have_posts() ): while( have_posts() ): the_post();  ?>
			<article class="blog-single-post">
				<?php

				deep_setViews( get_the_ID() );
				$content = get_the_content(); ?>

				<div class="post-trait-w">
					<h2 class="cause-title"><?php the_title() ?></h2>
				</div>

				<div <?php post_class('post'); ?>>
							<div class="postmetadata">

								<ul class="cause-metadata">
									<?php
									$deep_options['webnus_cause_date'] = isset( $deep_options['webnus_cause_date'] ) ? $deep_options['webnus_cause_date'] : '1';
									if($deep_options['webnus_cause_date']){ ?>
									<li class="cause-date"><i class="ti-calendar"></i><span><?php the_time('F d, Y') ?></span> </li>
									<?php }
									$deep_options['webnus_cause_category'] = isset( $deep_options['webnus_cause_category'] ) ? $deep_options['webnus_cause_category'] : '1';
									if($deep_options['webnus_cause_category']){ ?>
									<li class="cause-comments"><i class="ti-folder"></i><span><?php the_terms(get_the_id(), 'cause_category', '',' | ','' ); ?></span> </li>
									<?php }
									$deep_options['webnus_cause_comments'] = isset( $deep_options['webnus_cause_comments'] ) ? $deep_options['webnus_cause_comments'] : '1';
									if($deep_options['webnus_cause_comments']){ ?>
									<li class="cause-comments"><i class="ti-comment"></i><span><?php comments_number( '0', '1', '%' ); ?></span> </li>
									<?php }
									$deep_options['webnus_cause_views'] = isset( $deep_options['webnus_cause_views'] ) ? $deep_options['webnus_cause_views'] : '1';
									if($deep_options['webnus_cause_views']){ ?>
									<li  class="cause-views"> <i class="sl-eye"></i><span><?php echo deep_getViews(get_the_ID()); ?></span><?php esc_html_e(' Views','deep');?></li>
									<?php } ?>
								</ul>

							</div>

							<?php
							$deep_options['webnus_cause_featuredimage'] = isset( $deep_options['webnus_cause_featuredimage'] ) ? $deep_options['webnus_cause_featuredimage'] : '1';
							if(  $deep_options['webnus_cause_featuredimage'] ) {
								get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'Full', 'link_to_post' => false, ) );
							} ?>
							<div class="cause-box">
								<div class="clearfix">
									<div class="wn-donate-bar col-sm-8">
										<?php
										echo '' . $progressbar; ?>
									</div>
									<div class="wn-donate-button col-sm-4">
										<?php
										$deep_options['webnus_donate_form'] = isset( $deep_options['webnus_donate_form'] ) ? $deep_options['webnus_donate_form'] : '';

										if( $days_left >= 0 && $percentage < 100 && $deep_options['webnus_donate_form'] ){
											echo deep_modal_donate();
										} else{
											echo '<p class="cause-completed">'.esc_html__('Has been completed','deep').'</p>';
										}

										$deep_options['webnus_cause_social_share'] = isset( $deep_options['webnus_cause_social_share'] ) ? $deep_options['webnus_cause_social_share'] : '1';

										if( $deep_options['webnus_cause_social_share'] ) {
										$dashed_title =  sanitize_title_with_dashes ( get_the_title() );
										$dashed_blog_info_name =  sanitize_title_with_dashes ( get_bloginfo( 'name' ) );?>

										<div class="wn-cause-sharing">
											<ul class="wn-cause-sharing-icons">
												<li class="wn-wrap-social hcolorb"><i class="pe-7s-share"></i>
													<ul>
														<li class="hcolorb"><a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php $dashed_title ?>" target="blank"><i class="sl-social-facebook"></i></a></li>
														<li class="hcolorb"><a class="google" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink(); ?>" target="_blank"><i class="sl-social-google"></i></a></li>
														<li class="hcolorb"><a class="twitter" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php $dashed_title ?>&amp;tw_p=tweetbutton&amp;url=<?php the_permalink(); ?><?php echo isset( $twitter_user ) ? '&amp;via='.$twitter_user : ''; ?>" target="_blank"><i class="sl-social-twitter"></i></a></li>
													</ul>
												</li>
												<li class="single-mail hcolorb"><a class="email" href="mailto:?subject=<?php $dashed_title ?>&amp;body=<?php the_permalink(); ?>"><i class="pe-7s-mail"></i></a></li>
											</ul>
										</div>

										<?php } ?>
									</div>
								</div>
							</div>

							<?php echo apply_filters('the_content',$content); ?>
					<br class="clear">
					<?php the_tags( '<div class="post-tags"><i class="wn-fa wn-fa-tags"></i>', '', '</div>' ); ?><!-- End Tags -->
					<div class="next-prev-posts">
						<?php $args = array(
							'before'           => '',
							'after'            => '',
							'link_before'      => '',
							'link_after'       => '',
							'next_or_number'   => 'next',
							'nextpagelink'     => '&nbsp;&nbsp; '.esc_html__('Next Page','deep'),
							'previouspagelink' => esc_html__('Previous Page','deep').'&nbsp;&nbsp;',
							'pagelink'         => '%',
							'echo'             => 1
							);
						wp_link_pages($args);
						?>
					</div><!-- End next-prev post -->

				</div>
			</article>
			<?php
			endwhile;
			endif;
			comments_template(); ?>
		</section>
	<!-- end-main-conten -->
	<div class="white-space"></div>
	</section>
	<?php  get_footer(); ?>

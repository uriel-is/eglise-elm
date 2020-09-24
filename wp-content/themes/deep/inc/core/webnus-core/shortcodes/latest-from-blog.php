<?php
class DeepWPBakeryLatestFromBlog extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryLatestFromBlog
	 */
	public static $instance;

	private $style_type;

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
		add_shortcode( 'latestfromblog', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );			
		add_action( 'wp_head', function() {
			echo '<script>var deep_latestfromblog_styles = {}; </script>';
		});
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {
		extract(shortcode_atts(	array(
			'type'				=> 'one',
			'category'			=> '',
			'carousel'			=> 'false',
			'item_carousel'		=> '',
			'post_to_show'		=> '',
			'item_to_show'		=> '',
			'link_target'		=> 'false',
			'navigation'		=> 'wn-lb-arrow-nav',
			'title'				=> '',
			'title_color'		=> '',
			'title_bg_color'	=> '',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
			'hide_cat' 	 		=> '',
			'hide_date' 	 	=> '',
			'hide_author' 	 	=> '',
			'hide_view' 	 	=> '',
			'hide_comment' 	 	=> '',
			'reviews' 	 		=> 'show',
		), $attributes));

		$style_type = '';
		switch ($type) {
			case 'one':
				$style_type = '1';
				break;
			case 'two':
				$style_type = '2';
				break;
			case 'three':
				$style_type = '3';
				break;
			case 'four':
				$style_type = '4';
				break;
			case 'five':
				$style_type = '5';
				break;
			case 'six':
				$style_type = '6';
				break;
			case 'seven':
				$style_type = '7';
				break;
			case 'eight':
				$style_type = '8';
				break;
			case 'nine':
				$style_type = '9';
				break;
			case 'ten':
				$style_type = '10';
				break;
			case 'eleven' :
				$style_type = '11';
				break;
			case 'twelve' :
				$style_type = '12';
				break;
			case 'thirteen' :
				$style_type = '13';
				break;
			case 'fourteen' :
				$style_type = '14';
				break;
			case 'fifteen' :
				$style_type = '15';
				break;
			case 'sixteen' :
				$style_type = '16';
				break;
			case 'seventeen' :
				$style_type = '17';
				break;
			case 'eighteen' :
				$style_type = '18';
				break;
			case 'ninteen' :
				$style_type = '19';
				break;
			case 'twenty' :
				$style_type = '20';
				break;
			case 'twenty-one' :
				$style_type = '21';
				break;
			case 'twenty-two' :
				$style_type = '22';
				break;
			case 'twenty-three' :
				$style_type = '23';
				break;
			case 'twenty-four' :
				$style_type = '24';
				break;
			case 'twenty-five' :
				$style_type = '25';
				break;
			case 'twenty-six' :
				$style_type = '26';
				break;
			case 'twenty-seven' :
				$style_type = '27';
				break;
			case 'twenty-eight' :
				$style_type = '28';
				break;
		}

		
		wp_enqueue_style( 'wn-deep-latest-from-blog' . $style_type, DEEP_ASSETS_URL . 'css/frontend/latest-from-blog/latest-from-blog' . $style_type . '.css' );

		$this->style_type  = $style_type;
			
		add_action( 'wp_footer', function() use($style_type) {
			echo '<script>
			var element = document.getElementById("wn-deep-latest-from-blog'.$style_type.'-css");
			if(element && !deep_latestfromblog_styles["wn-deep-latest-from-blog'.$style_type.'-css"]) {
				deep_latestfromblog_styles["wn-deep-latest-from-blog'.$style_type.'-css"] = true;
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
		
		$link_target_tag = '';
		
		if ( $link_target == 'true' ) {
			$link_target_tag = ' target="_blank" ';
		}
		
		$post_format 	= get_post_format(get_the_ID());
		ob_start();
		
		$deep_options 	= deep_options();
		$uniqid 		= uniqid();
		$newsticker 	= ( $type == 'twenty-five' ) ? 'wn-news-ticker' : '' ;

		$shortcodeclass		= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
		$hide_cat			= $hide_cat == 'true' ? 'true' : 'false';
		$hide_date			= $hide_date == 'true' ? 'true' : 'false';
		$hide_author		= $hide_author == 'true' ? 'true' : 'false';
		$hide_view			= $hide_view == 'true' ? 'true' : 'false';
		$hide_comment		= $hide_comment == 'true' ? 'true' : 'false';
		// carousel
	if ( $carousel == 'true'  ) {
		
		$carousel					= $carousel ? 'latest-b-carousel owl-carousel owl-theme' : '' ;
		$lastest_b_carousel_item	= $item_carousel ? 'data-items="' . $item_carousel . '"' : '';

		echo '<div class="clearfix"></div><div class="container latestposts-'.esc_attr($type).' ' . $carousel . ' ' . $navigation . '" ' .$lastest_b_carousel_item. ' >';

	} elseif ( $type == 'twenty') {

		echo '<div class="clearfix"></div><div class="latestposts-'.esc_attr($type).' owl-carousel owl-theme ' . $navigation . ' ">';

	} else  {

		echo '<div class="container latestposts-'.esc_attr($type).' ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
	}
	?>
	<?php
		if ( $type=='one' ) {
				$query = new WP_Query('posts_per_page=2&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
					// if main class not exist get it
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '720' , '388' ); // set required and get result
				}
	?>
		<div class="col-md-6 col-sm-6">
		<article class="latest-b">
		<figure class="latest-img">
			<?php
				if( !empty($thumbnail_url) )
					echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
				else
					echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
			?>
		</figure>
		<div class="latest-content">
		<?php
			if ( $hide_cat != 'true' ) { ?>
				<h6 class="latest-b-cat"><?php the_category(', '); ?></h6> <?php
			}
		?>
		<h3 class="latest-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
		<p class="latest-author">
			<?php if ( $hide_author != 'true' ) { ?>
				<?php the_author_posts_link(); ?> 
			<?php } ?>
			<?php if ( $hide_date != 'true' ) { ?>
				<?php '/' . the_time(get_option( 'date_format' )); ?>
			<?php } ?>
		</p>
		<?php echo $reviews == 'show' ? deep_admin_post_review() : ''; ?>
		<p class="latest-excerpt"><?php echo deep_excerpt(36); ?></p>
		</div>
		</article>
		</div>
	<?php
		endwhile;
		}elseif ($type=='two'){
				$i = 0;
				$query = new WP_Query('posts_per_page=5&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();
				if( $i == 0 ) {
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
					// if main class not exist get it
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '720' , '388' ); // set required and get result
				}
				?>
				<div class="col-md-7">
					<article class="blog-post clearfix ">
						<figure class="pad-r20">
							<?php
								if( !empty($thumbnail_url) )
								echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
								else
								echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
							?>
						</figure>
						<div class="entry-content">
						<div class="blgt1-top-sec">
						<h4><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h4>
						<?php
						if ( $hide_cat != 'true' ) { ?>
							<h6 class="blog-cat"><?php the_category(', ') ?></h6>
						<?php } ?>
						<?php
						if ( $hide_date != 'true' ) { ?>
							<h6 class="blog-date">
								<i class="sl-clock"></i><?php the_time(get_option( 'date_format' )) ?>
							</h6>
						<?php } ?>
						<?php echo $reviews == 'show' ? deep_admin_post_review() : ''; ?>
						</div>
							<?php
								if( 'quote' == $post_format  ) echo '<blockquote>';
								echo '<p class="blog-detail">';
								echo deep_excerpt(45);
								echo '... <br><br><a class="readmore" href="' . get_permalink($query->ID) . '" '.$link_target_tag.'>' . esc_html($deep_options['deep_blog_readmore_text']) . '</a>';
								echo '</p>';
								if( 'quote' == $post_format  ) echo '</blockquote>';
							?>
						</div>
					</article>
				</div><div class="col-md-5">
			<?php  }else{ 
			$thumbnail_url = get_the_post_thumbnail_url();
			$thumbnail_id  = get_post_thumbnail_id();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '164' , '124' ); // set required and get result
			}
				?>

			<article class="blog-line clearfix">
				<a href="<?php the_permalink(); ?>" class="img-hover" <?php echo '' . $link_target_tag ?>><?php
					if( !empty($thumbnail_url) )
						echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
					else
						echo '<img src="'.DEEP_ASSETS_URL . 'images/featured_140x110.jpg"  alt="' . get_the_title() . '"/>';
				?></a>
				<?php
				if ( $hide_cat != 'true' ) { ?>
					<p class="blog-cat"> <?php the_category(', '); ?></p>
				<?php } ?>
				<?php echo $reviews == 'show' ? deep_admin_post_review() : ''; ?>
				<h4><a <?php echo '' . $link_target_tag ?> href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
					<p>
						<?php if ( $hide_date != 'true' ) { ?>		
							<?php echo get_the_time(get_option( 'date_format' )); ?> 	/
						<?php } ?>
						<?php if ( $hide_author != 'true' ) { ?>	
							<strong><?php esc_html_e('by', 'deep') ?></strong>
								<?php echo get_the_author(); ?>
						<?php } ?>
					</p>
			</article>

		<?php
			}
			$i++;
			endwhile;
			?>
			</div>
			<?php
		}elseif ($type=='three'){
		$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
		while ($query -> have_posts()) : $query -> the_post();
		$thumbnail_url = get_the_post_thumbnail_url();
		$thumbnail_id  = get_post_thumbnail_id();
		if( !empty( $thumbnail_url ) ) {
			// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '720' , '388' ); // set required and get result
		}
	?>
		<div class="col-md-4 col-sm-4">
			<article class="latest-b2">

				<figure class="latest-b2-img">
					<?php
						if( !empty($thumbnail_url) )
							echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
						else
							echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
					?>
				</figure>

				<div class="latest-b2-cont">
					<?php if ( $hide_cat != 'true' ) { ?>
						<h6 class="latest-b2-cat">
							<?php the_category(', '); ?>
						</h6>
					<?php } ?>
					<?php echo $reviews == 'show' ? deep_admin_post_review() : ''; ?>
					<h3 class="latest-b2-title">
						<a <?php echo '' . $link_target_tag ?> href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
					
					<p><?php echo deep_excerpt(17); ?></p>

					<?php if ( $hide_date != 'true' || $hide_comment != 'true' ) { ?>
						<div class="latest-b2-metad2">
					<?php } ?>
						<?php if ( $hide_comment != 'true' ) { ?>
							<i class="wn-fa wn-fa-comments"></i><span><?php echo get_comments_number() ?></span> /
						<?php } ?>

						<?php if ( $hide_date != 'true' ) { ?>
							<span class="latest-b2-date">
								<?php the_author_posts_link(); ?> / <?php echo get_the_date();?>
							</span>
						<?php } ?>
					<?php if ( $hide_date != 'true' || $hide_comment != 'true' ) { ?>
						</div>
					<?php } ?>

				</div>
			</article>
		</div>
	<?php
		endwhile;
		} elseif ($type=='four') {
			$query = new WP_Query('posts_per_page=2&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
			$thumbnail_url = get_the_post_thumbnail_url();
			$thumbnail_id  = get_post_thumbnail_id();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '720' , '388' ); // set required and get result
			}
			?>
			<?php $class = $hide_cat != 'true' && $hide_date != 'true' && $hide_author != 'true' ? 'col-md-9' : 'col-md-12';  ?>
			<div class="col-md-6">
				<article class="latest-b2"> 
					<?php if ( $hide_cat != 'true' || $hide_date != 'true' || $hide_author != 'true'  || $reviews == 'show' ) { ?>
						<div class="col-md-3"> 
					<?php } ?>
							<?php if ( $hide_date != 'true' ) { ?>
								<h6 class="blog-date">
									<span><?php the_time('d') ?> </span><?php the_time('M Y') ?>
								</h6>
							<?php } ?>

							<?php if ( $hide_author != 'true' ) { ?>
								<div class="au-avatar">
									<?php echo get_avatar( get_the_author_meta( 'user_email' ), 90 ); ?>
								</div>
								<h6 class="blog-author">
									<strong>
										<?php esc_html_e('Written by','deep'); ?>
									</strong><br> 
									<?php the_author_posts_link(); ?> 
								</h6>
							<?php } ?>
							<?php echo $reviews == 'show' ? deep_admin_post_review() : ''; ?>
							<?php if ( $hide_cat != 'true' ) { ?>
							<h6  class="latest-b2-cat"><?php the_category(', '); ?></h6> 
							<?php } ?>

					<?php if ( $hide_date != 'true' || $hide_author != 'true' || $hide_comment != 'true' || $reviews == 'show' ) { ?>
						</div>
					<?php } ?>

					<div class="<?php echo esc_attr( $class ); ?>">
						<figure class="latest-b2-img">
							<?php
								if( !empty($thumbnail_url) )
									echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
								else
									echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
							?>
						</figure>
						<div class="latest-b2-cont">
							<h3 class="latest-b2-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3> 
						</div> 
					</div>
					<div class="clearfix"></div>
				</article>
			</div>
		<?php
		endwhile;
		}elseif ($type=='five'){
				$query = new WP_Query('posts_per_page=6&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
					// if main class not exist get it
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '420' , '330' ); // set required and get result
				}
	?>
		<div class="col-md-6 col-lg-4"><article class="latest-b2">
		<figure class="latest-b2-img">
			<?php
				if( !empty($thumbnail_url) )
					echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
				else
					echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
			?>
		</figure>
		<div class="latest-b2-cont">
			<?php if ( $hide_cat != 'true' ) { ?>
			<h6 class="latest-b2-cat"><?php the_category(', '); ?></h6>
			<?php } ?>
			<h3 class="latest-b2-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
			<h5 class="latest-b2-date">
				<?php if ( $hide_author != 'true' ) { ?>
					<?php the_author_posts_link(); ?>
				<?php } ?>
				<?php if ( $hide_date != 'true' ) { ?>
					<?php echo get_the_date();?>
				<?php } ?>
			</h5>

		</div></article></div>
	<?php
		endwhile;
		} elseif ($type=='six') {
				$query = new WP_Query('posts_per_page=4&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
					// if main class not exist get it
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '720' , '388' ); // set required and get result
				}
	?>
		<div class="col-md-3 col-sm-6"><article class="latest-b">
		<figure class="latest-img">
			<?php
				if( !empty($thumbnail_url) )
					echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
				else
					echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
			?>
		</figure>
			<div class="latest-content">
			<?php if ( $hide_date != 'true' ) { ?>
				<p class="latest-date"><?php the_time(get_option( 'date_format' )); ?></p>
			<?php } ?>
			<?php echo $reviews == 'show' ? deep_admin_post_review() : ''; ?>
			<h3 class="latest-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
				<?php if ( $hide_author != 'true' || $hide_cat != 'true' ) { ?>
					<p class="latest-author">
				<?php } ?>
					<?php if ( $hide_author != 'true' ) { ?>
						<strong><?php esc_html_e('by','deep') ?></strong> <?php the_author_posts_link(); ?>
					<?php } ?>
					<?php if ( $hide_cat != 'true' ) { ?>
						<strong><?php esc_html_e('in','deep') ?></strong> <?php the_category(', '); ?>
					<?php } ?>
				</p>
			</div>
		</article></div>
	<?php
		endwhile;
		} elseif ( $type == 'seven' ) {
			$wpbp = new WP_Query('posts_per_page=3&category_name='.$category.'');
			if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
			$thumbnail_url = get_the_post_thumbnail_url();
			$thumbnail_id  = get_post_thumbnail_id();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '720' , '388' ); // set required and get result
			}
			?>
			<div class="col-md-4 col-sm-4"><article class="latest-b">
			<figure class="latest-img">
				<?php
					if( !empty($thumbnail_url) )
						echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
					else
						echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
				?>
			</figure>	
				<?php if ( $hide_date != 'true' ||  $hide_view != 'true' ) { ?>
					<div class="wrap-date-icons">
				<?php } ?>
						<?php if ( $hide_date != 'true' ) { ?>
							<h3 class="latest-date">
								<span class="latest-date-month"><?php the_time('M') ?></span>
								<span class="latest-date-day"><?php the_time('d') ?></span>
								<span class="latest-date-year"><?php the_time('Y') ?></span>
							</h3>
						<?php } ?>
						<?php if ( $hide_view != 'true' ) { ?>
							<div class="latest-icons">
								<p>
									<span><i class="wn-fa wn-fa-eye"></i></span>
								</p>
								<p>
									<span><?php echo deep_getViews(get_the_ID()); ?></span>
								</p>
							</div>
						<?php } ?>
				<?php if ( $hide_date != 'true' ||  $hide_view != 'true' ) { ?>
					</div>
				<?php } ?>
				<div class="latest-content">
					<h3 class="latest-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
					<?php if ( $hide_author != 'true' || $hide_cat != 'true' ) { ?>
						<p class="latest-author">
							<?php if ( $hide_author != 'true' ) { ?>
								<?php esc_html_e('by ','deep') . the_author(); ?>
							<?php } ?>

							<?php if ( $hide_cat != 'true' ) { ?>
								<?php esc_html_e(' in ','deep') . the_category(', '); ?>
							<?php } ?>
						</p>
					<?php } ?>
					<?php echo $reviews == 'show' ? deep_admin_post_review() : ''; ?>

				</div>
			</article></div> <?php

			endwhile; endif;
		} elseif ($type=='eight') {
			$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
			$thumbnail_url = get_the_post_thumbnail_url();
			$thumbnail_id  = get_post_thumbnail_id();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '720' , '388' ); // set required and get result
			}
			?>
				<div class="col-sm-4">
					<article class="latest-b8">
						<figure class="latest-b8-img">
							<?php
								if( !empty($thumbnail_url) )
									echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
								else
									echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
							?>
						</figure>
						<div class="latest-b8-content">
							<span class="post-format-icon <?php echo get_post_format(); ?>"> <i class="wn-fas wn-fa-pencil-alt"></i> </span>
							<h3 class="latest-b8-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
							<p><?php echo deep_excerpt(32); ?></p>
							<a class="readmore" href="<?php echo get_permalink($query->ID); ?>" <?php echo '' . $link_target_tag ?>><?php echo esc_html($deep_options['deep_blog_readmore_text']); ?></a>
							<?php if ( $hide_comment != 'true' || $hide_author != 'true' || $hide_date != 'true' ) { ?>
								<div class="latest-b8-meta">
							<?php } ?>
								<?php if ( $hide_author != 'true' ) { ?>
									<div class="autho"><i class="sl-user"></i><span><?php esc_html_e( 'by: ', 'deep' ); the_author_posts_link(); ?></span></div>
								<?php } ?>
								<?php if ( $hide_date != 'true' ) { ?>
									<div class="date"><i class="sl-calendar"></i><span><?php echo get_the_date(); ?></span></div>
								<?php } ?>
								<?php if ( $hide_comment != 'true' ) { ?>
									<div class="comments"><i class="sl-bubble"></i><span><?php echo get_comments_number(); ( get_comments_number() == 0 || get_comments_number() == 1 ) ? esc_html_e( ' Comment', 'deep' ) : esc_html_e( ' Comments', 'deep' ); ?></span></div>
								<?php } ?>
							<?php if ( $hide_comment != 'true' || $hide_author != 'true' || $hide_date != 'true' ) { ?>
								</div>
							<?php } ?>
						</div>
					</article>
				</div>
			<?php endwhile;
		} elseif ($type=='nine') {
			$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
			$thumbnail_url = get_the_post_thumbnail_url();
			$thumbnail_id  = get_post_thumbnail_id();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '720' , '388' ); // set required and get result
			}
			?>
				<div class="col-sm-4">
					<article class="latest-b9">
						<figure class="latest-b9-img">
							<?php
								if( !empty($thumbnail_url) )
									echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
								else
									echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
							?>
						</figure>
						<div class="latest-b9-content">
							<h3 class="latest-b9-title">
								<span class="post-format-icon <?php echo get_post_format(); ?>"> <i class="wn-fas wn-fa-pencil-alt"></i> </span>
								<a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a>
							</h3>
							<div class="latest-b9-meta">
								<?php if ( $hide_date != 'true' ) { ?>
									<span class="date"><?php echo get_the_date(); ?></span>
								<?php } ?>
								<?php if ( $hide_cat != 'true' ) { ?>
									<span class="categories"><?php esc_html_e( 'in ', 'deep' ); the_category(', '); ?></span>
								<?php } ?>
								<?php if ( $hide_comment != 'true' ) { ?>
									<span class="comments"><?php echo get_comments_number(); ( get_comments_number() == 0 || get_comments_number() == 1 ) ? esc_html_e( ' Comment', 'deep' ) : esc_html_e( ' Comments', 'deep' ); ?></span>
								<?php } ?>
							</div>
						</div>
					</article>
				</div>
			<?php endwhile;
		} elseif ($type=='ten') {
			$query = new WP_Query('posts_per_page=4&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
			$thumbnail_url = get_the_post_thumbnail_url();
			$thumbnail_id  = get_post_thumbnail_id();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '460' , '460' ); // set required and get result
			}
			?>
				<div class="col-md-6">
					<article class="latest-b10">
						<figure class="latest-b10-img">
							<?php
								if( !empty($thumbnail_url) )
									echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
								else
									echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
							?>
						</figure>
						<div class="latest-b10-content">
						<?php if ( $hide_date != 'true' ) { ?>
							<div class="latest-b10-meta">
								<span class="date"><?php echo get_the_date(); ?></span>
							</div>
						<?php } ?>
							<h3 class="latest-b10-title">
								<a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a>
							</h3>
							<p><?php echo deep_excerpt(19); ?></p>
							<a class="readmore" href="<?php echo get_permalink($query->ID); ?>" <?php echo '' . $link_target_tag ?>><?php echo esc_html($deep_options['deep_blog_readmore_text']); ?></a>
						</div>
					</article>
				</div>
			<?php endwhile;
		} elseif ($type=='eleven') {
			$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
			$thumbnail_url = get_the_post_thumbnail_url();
			$thumbnail_id  = get_post_thumbnail_id();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '125' , '125' ); // set required and get result
			}
			?>
				<div class="col-sm-4">
					<article class="latest-b11">
						<div class="latest-b11-content">
							<?php if ( $hide_cat != 'true' ) { ?>
								<h6 class="categories"><?php esc_html_e( 'In ', 'deep' ); the_category(', '); ?></h6>
							<?php } ?>
							<?php echo $reviews == 'show' ? deep_admin_post_review() : ''; ?>
							<h3 class="latest-b11-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
							<div class="latest-b11-meta">
								<?php if ( $hide_date != 'true' ) { ?>
								<span class="date"><?php echo get_the_date(); ?></span>
								<?php } ?>
								<?php if ( $hide_comment != 'true' ) { ?>
									<span class="comments"><?php echo get_comments_number(); ( get_comments_number() == 0 || get_comments_number() == 1 ) ? esc_html_e( ' Comment', 'deep' ) : esc_html_e( ' Comments', 'deep' ); ?></span>
								<?php } ?>
							</div>
						</div>
						<figure class="latest-b11-img">
							<?php
								if( !empty($thumbnail_url) )
									echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
								else
									echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
							?>
						</figure>
					</article>
				</div>
			<?php endwhile;
		} elseif ($type=='twelve'){
			$post_to_show = $post_to_show ? $post_to_show : '3' ;
			$query = new WP_Query('posts_per_page=' . $post_to_show . '&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
			$thumbnail_url = get_the_post_thumbnail_url();
			$thumbnail_id  = get_post_thumbnail_id();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '420' , '330' ); // set required and get result
			}
			?>
					<div class="col-md-4 col-sm-4">
						<article class="latest-b12">
							<figure class="latest-b12-img">
								<?php
									if( !empty($thumbnail_url) )
										echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
									else
										echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
								?>
							</figure>
							<div class="latest-b12-cont">
								<?php if ( $hide_cat != 'true' ) { ?>
									<h6 class="latest-b12-cat"><?php the_category(', '); ?></h6>
								<?php } ?>
								<?php echo $reviews == 'show' ? deep_admin_post_review() : ''; ?>
								<h3 class="latest-b12-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
								<p><?php echo deep_excerpt(19); ?></p>
								<div class="latest-b12-metad2">

									<?php if ( $hide_author != 'true' ) { ?>
										<span class="latest-b12-author"><span><?php esc_html_e( 'by', 'deep') ?></span><?php the_author_posts_link(); ?></span>
									<?php } ?>

									<?php if ( $hide_date != 'true' ) { ?>
										<span class="latest-b12-date"><?php echo get_the_date();?></span>
									<?php } ?>

								</div>
							</div>
						</article>
					</div>
			<?php
			endwhile;
		}elseif ($type=='thirteen'){
			$post_to_show = $post_to_show ? $post_to_show : '4' ;
			$query = new WP_Query('posts_per_page=' . $post_to_show . '&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
			$thumbnail_url = get_the_post_thumbnail_url();
			$thumbnail_id  = get_post_thumbnail_id();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '420' , '330' ); // set required and get result
			}
			?>
			<div class="col-md-3 col-sm-3">
				<article class="latest-b13">
					<figure class="latest-b13-img">
						<?php
							if( !empty($thumbnail_url) )
								echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
							else
								echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
						?>
						<?php if ( $hide_cat != 'true' ) { ?>
							<h6 class="latest-b13-cat"><?php the_category(', '); ?></h6>
						<?php } ?>
					</figure>
					<div class="latest-b13-cont">
						<h3 class="latest-b13-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
						<p><?php echo deep_excerpt(19); ?></p>
						<div class="latest-b13-metad2">
							<?php if ( $hide_author != 'true' ) { ?>
							<span class="latest-b13-author"><span><?php esc_html_e( 'BY', 'deep') ?> </span><?php the_author_posts_link(); ?></span>
							<?php } ?>
							<?php if ( $hide_date != 'true' ) { ?>
							<span class="latest-b13-date"><?php echo get_the_date();?></span>
							<?php } ?>
						</div>
					</div>
				</article>
			</div>
			<?php
			endwhile;
		} elseif ( $type == 'fourteen' ){
				$query	= new WP_Query('posts_per_page=4&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();

					$uniqid			= uniqid();
					$thumbnail_url	= get_the_post_thumbnail_url();
					$style			= '.wn-latest-b14-' . $uniqid . ' .latest-b14 { background: url( ' . $thumbnail_url . ' ); }';
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
					<div class="col-lg-3 col-md-6 wn-latest-b14 wn-latest-b14-<?php echo '' . $uniqid; ?>">
						<article class="latest-b14">
							<div class="latest-b14-cont">
								<a class="hcolorf" href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>>
									<i class="ti-arrow-right" aria-hidden="true"></i>
								</a>
								<div class="latest-b14-meta">
									<?php if ( $hide_cat != 'true' ) { ?>
										<span class="latest-b14-cat"><?php echo the_category(', '); ?></span>
									<?php } ?>
									<?php if ( $hide_date != 'true' ) { ?>
										<span class="latest-b14-date"><?php echo get_the_date(); ?></span>
									<?php } ?>
								</div>
								<h3 class="latest-b14-title"><a class="hcolorf" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</div>
						</article>
					</div>
				<?php endwhile;
			} elseif ( $type == 'fifteen' ){
				$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
					// if main class not exist get it
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '460' , '460' ); // set required and get result
				}
				?>
					<div class="col-md-4 wn-latest-b15">
						<article class="latest-b15">
							<figure class="latest-b15-img">
								<?php
									if( !empty($thumbnail_url) )
										echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
									else
										echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
								?>
								<div class="latest-b15-overlay">
									<a href="<?php echo get_permalink($query->ID); ?>" <?php echo '' . $link_target_tag ?>><i class="ti-arrow-right"></i></a>
								</div>
							</figure>
							<div class="latest-b15-content">
								<div class="latest-b15-meta-data">

									<?php if ( $hide_cat != 'true' ) { ?>
										<?php echo the_category(', '); ?> /
									<?php } ?>

									<?php if ( $hide_date != 'true' ) { ?>
										<?php echo get_the_date(); ?>
									<?php } ?>
		
								</div>
								<h2><a href="<?php echo get_permalink($query->ID); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h2>
							</div>
						</article>
					</div>
				<?php endwhile;
			} elseif ( $type == 'sixteen' ) {
				$query = new WP_Query('posts_per_page=4&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
					// if main class not exist get it
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '300' , '200' ); // set required and get result
				}
				?>
					<div class="col-md-3 wn-latest-b16">
						<article class="latest-b16">
							<figure class="latest-b16-img">
								<?php
									if( !empty($thumbnail_url) )
										echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
									else
										echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
								?>
								<div class="latest-b16-overlay">
									<h3><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
									<?php if ( $hide_cat != 'true' ) { ?>
										<div class="latest-b16-meta-data"><?php echo the_category(', '); ?></div>
									<?php } ?>
								</div>
							</figure>
							<div class="latest-b16-content">
								<p class="latest-b61-excerpt"><?php echo deep_excerpt(15); ?></p>
								<a href="<?php the_permalink(); ?>" class="latest-b16-readmore" <?php echo '' . $link_target_tag ?>><?php echo esc_html__( 'Read More', 'deep' ); ?></a>
								<?php if ( $hide_author != 'true' ||  $hide_date != 'true' ) { ?>
									<div class="latest-b16-footer">
								<?php } ?>
										<?php if ( $hide_author != 'true' ) { ?>
											<div class="latest-author">
												<span><?php esc_html_e('By','deep') ?></span><strong><?php the_author_posts_link(); ?></strong>
											</div>
										<?php } ?>
										<?php if ( $hide_date != 'true' ) { ?>
											<div class="latest-date">
												<span><i class="pe-7s-clock"></i><?php echo get_the_date(); ?></span>
											</div>
										<?php } ?>
								<?php if ( $hide_author != 'true' ||  $hide_date != 'true' ) { ?>
									</div>
								<?php } ?>
							</div>
						</article>
					</div>
				<?php endwhile;
			} elseif ( $type == 'seventeen' ) {
				$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post(); ?>
					<div class="col-md-12 wn-latest-b17">
						<article class="latest-b17">
							<div class="latest-b17-content">
								<?php if ( $hide_date != 'true' ) { ?>
									<div class="latest-date"><?php echo get_the_date(); ?></div>
								<?php } ?>
								<h3><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
								<a <?php echo '' . $link_target_tag ?> href="<?php the_permalink(); ?>" class="latest-b17-readmore"><?php echo esc_html__( 'Read More', 'deep' ); ?></a>
							</div>
						</article>
					</div>
				<?php endwhile;
			} elseif ( $type=='eighteen' ) {
				$post_to_show = $post_to_show ? $post_to_show : '3' ;
				$query = new WP_Query('posts_per_page=' . $post_to_show . '&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
					// if main class not exist get it
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '420' , '330' ); // set required and get result
				}
				?>
					<div class="col-md-4 col-sm-4">
						<article class="latest-b18">
							<figure class="latest-b18-img">
								<?php
									if( !empty($thumbnail_url) )
										echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
									else
										echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
								?>
							</figure>
							<div class="latest-b18-cont">
								<?php if ( $hide_date != 'true' ) { ?>
									<span class="latest-b18-date"><?php echo get_the_date();?></span>
								<?php } ?>
								<h3 class="latest-b18-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
								<p><?php echo deep_excerpt(19); ?></p>
								<div class="latest-b18-metad2">
									<a href="<?php the_permalink(); ?>" class="colorf latest-b18-readmore" <?php echo '' . $link_target_tag ?>>
										<?php echo esc_html__( 'Read More', 'deep' ); ?>
									</a>
								</div>
							</div>
						</article>
					</div>
			<?php endwhile;
			} elseif ($type=='ninteen') {
				$post_to_show = $post_to_show ? $post_to_show : '3' ;
				$query = new WP_Query('posts_per_page=' . $post_to_show . '&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
					// if main class not exist get it
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '397' , '265' ); // set required and get result
				}
				?>
				<div class="col-md-4 col-sm-4">
					<article class="latest-b19">
						<figure class="latest-b19-img">
							<?php
								if( !empty($thumbnail_url) )
									echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
								else
									echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
							?>
						</figure>
						<div class="latest-b19-cont">
							<h3 class="latest-b19-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
							<p><?php echo deep_excerpt(19); ?></p>
						</div>
						<?php if ( $hide_date != 'true' || $hide_author != 'true' ) { ?>
							<div class="latest-b19-metadata">
						<?php } ?>
								<?php if ( $hide_author != 'true' ) { ?>
									<span class="latest-b19-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 30 ); ?> <?php the_author_posts_link(); ?></span>
								<?php } ?>
								<?php if ( $hide_date != 'true' ) { ?>
									<span class="latest-b19-date"><?php echo get_the_date();?></span>
								<?php } ?>
						<?php if ( $hide_date != 'true' || $hide_author != 'true' ) { ?>
							</div>
						<?php } ?>
					</article>
				</div>
			<?php endwhile;
			} elseif ( $type == 'twenty' ) {
				$item_to_show = $item_to_show ? $item_to_show : '2' ;
				$query = new WP_Query('posts_per_page=' . $item_to_show . '&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();

				$thumbnail_id = get_post_thumbnail_id();
				$thumbnail_url = get_the_post_thumbnail_url();
				if( !empty( $thumbnail_url ) ) {
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate;
					$thumbnail_url = $image->m_image( $thumbnail_id , $thumbnail_url , '645' , '440' ); 
				}
				?>
					<article class="latest-b20">
						<figure class="latest-b20-img">
							<?php
								if( !empty($thumbnail_url) )
									echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
								else
									echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
							?>
						</figure>
						<div class="latest-b20-cont colorb">
							<div class="latest-b20-detail">
								<?php if ( $hide_date != 'true' ) { ?>
									<span class="latest-b20-date"><?php echo get_the_date();?></span>
								<?php } ?>
								<?php if ( $hide_cat != 'true' ) { ?>
									<span class="latest-b20-cat">- <?php the_category(', '); ?></span>
								<?php } ?>
							</div>
							<h3 class="latest-b20-title"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
							<a class="readmore" href="<?php echo get_permalink($query->ID); ?>" <?php echo '' . $link_target_tag ?>><?php echo esc_html($deep_options['deep_blog_readmore_text']); ?></a>
						</div>
					</article>
			<?php endwhile;
			} elseif ( $type == 'twenty-one' ) {
				$query = new WP_Query('posts_per_page=5&category_name='.$category.'');
				$first_post = true;
				$secound_posts = true;
				while ($query -> have_posts()) : $query -> the_post();

				$thumbnail_id = get_post_thumbnail_id();
				$thumbnail_url = get_the_post_thumbnail_url();
				if( !empty( $thumbnail_url ) ) {
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate;
					$thumbnail_url_1 = $image->m_image( $thumbnail_id , $thumbnail_url , '972' , '486' ); 
					$thumbnail_url_2 = $image->m_image( $thumbnail_id , $thumbnail_url , '299' , '226' ); 
				}
				$uniqid			= uniqid();
				$style			= '#wrap .latest-b21-' . $uniqid . ' .latest-b21-category { background: ' . deep_category_color() . '; }';
				deep_save_dyn_styles( $style );

				// live editor
				if ( ! in_array( 'admin-bar', get_body_class() ) ) {
					if ( ! empty( $style ) ) {
						echo '<style>';
						echo $style;
						echo '</style>';
					}
				}

				if ( $first_post == true ) { ?>
					<article class="latest-b21 latest-b21-<?php echo esc_attr( $uniqid ); ?> col-md-6">
						<figure class="latest-b21-img">
							<a href="<?php the_permalink(); ?>">
								<?php
								if( !empty( $thumbnail_url ) ) {
									echo '<img src="' . esc_url( $thumbnail_url ) . '" alt="' . get_the_title() . '">';
								} else {
									echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
								}
								?>
							</a>
						</figure>
						<div class="latest-b21-cont">
							<?php if ( $hide_cat != 'true' ) { ?>
								<div class="latest-b21-category">
										<span class="latest-b21-cat" data-id="<?php echo '' . $uniqid; ?>"><?php the_category(', '); ?></span>
								</div>
							<?php } ?>
							<?php if ( $hide_date != 'true' ) { ?>
								<div class="latest-b21-date">
									<i class="pe-7s-clock"></i><?php echo get_the_date();?>
								</div>
							<?php } ?>
							<?php echo $reviews == 'show' ? deep_admin_post_review() : ''; ?>
							<h3 class="latest-b21-title"><a href="<?php the_permalink(); ?>" class="hcolorf" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
							<p class="latest-excerpt"><?php echo deep_excerpt(30); ?></p>
							<?php if ( $hide_author != 'true' ) { ?>
								<div class="latest-author">
									<span><?php echo get_avatar( get_the_author_meta( 'user_email' ), 28 ); ?></span>
									<span><?php the_author_posts_link(); ?></span>	
								</div>
							<?php } ?>
						</div>
					</article>
				<?php } else { ?>
					<article class="latest-b21 latest-b21-<?php echo esc_attr( $uniqid ); ?> col-md-3">
						<figure class="latest-b21-img">
							<a href="<?php the_permalink(); ?>">							
								<?php
									if( ! empty( $thumbnail_url_2 ) )
										echo '<img src="' . esc_url( $thumbnail_url_2 ) . '" alt="' . get_the_title() . '">';
									else
										echo '<img src="'. DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
								?>
							</a>
						</figure>
						<div class="latest-b21-cont">
							<?php if ( $hide_cat != 'true' ) { ?>
								<div class="latest-b21-category">
									<span class="latest-b21-cat" data-id="<?php echo '' . $uniqid; ?>"><?php the_category(', '); ?></span>
								</div>
							<?php } ?>
							<?php if ( $hide_date != 'true' ) { ?>
								<div class="latest-b21-date">
									<i class="pe-7s-clock"></i><?php echo get_the_date();?>
								</div>
							<?php } ?>
							<?php echo $reviews == 'show' ? deep_admin_post_review() : ''; ?>
							<h3 class="latest-b21-title"><a href="<?php the_permalink(); ?>" class="hcolorf" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
						</div>
					</article>
				<?php } ?>
					
			<?php $first_post = false; ?>
			<?php $secound_posts = false; ?>
			<?php endwhile;
			} elseif ( $type == 'twenty-two' ) {
				$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
					// if main class not exist get it
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '643' , '482' ); // set required and get result
				}
				?>
					<div class="col-md-4 wn-latest-b22">
						<article class="latest-b22">
							<figure class="latest-b22-img">
								<?php
									if( !empty($thumbnail_url) )
										echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
									else
										echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
								?>
							</figure>
							<div class="latest-b22-content">
								<?php if ( $hide_date != 'true' ) { ?>
									<div class="latest-b22-meta-data"><?php echo get_the_date(); ?></div>
								<?php } ?>
								<h2>
									<a href="<?php echo get_permalink($query->ID); ?>" <?php echo '' . $link_target_tag ?>>
										<?php the_title(); ?>
									</a>
								</h2>
							</div>
						</article>
					</div>
				<?php endwhile;
			} elseif ( $type == 'twenty-three' ) {
				$query = new WP_Query('posts_per_page=5&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
					// if main class not exist get it
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '643' , '482' ); // set required and get result
				}
				?>
					<div class="col-md-6 wn-latest-b23">
						<article class="latest-b23">
							<figure class="latest-b23-img">
								<?php
									if( !empty($thumbnail_url) )
										echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
									else
										echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
								?>
							</figure>
							<div class="latest-b23-content">
								<h2>
									<span class="latest-b23-line"></span>
									<span class="latest-b23-dot colorb"></span>
									<a href="<?php echo get_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a>
								</h2>
								<p><?php echo deep_excerpt(19); ?></p>
								<a class="readmore" href="<?php echo get_permalink($query->ID); ?>" <?php echo '' . $link_target_tag ?>>
									<?php echo esc_html($deep_options['deep_blog_readmore_text']); ?>	
								</a>
							</div>
						</article>
					</div>
				<?php endwhile;
			} elseif ( $type == 'twenty-four' ) {
				
				$query 			= new WP_Query('posts_per_page=4&category_name='.$category.'') ;
				$title_color 	= $title_color ? '.latest-blg-wrap-title[data-id="' . $uniqid . '"]{color: ' . $title_color . ';}' : '';
				$title_bg_color = $title_bg_color ? '.latest-blg-wrap-title[data-id="' . $uniqid . '"]{ background-color: ' . $title_bg_color . '; }' : '';
				$title			= $title ? '<div class="latest-blg-wrap-title" data-id="' . $uniqid . '">' . $title . '</div>' : '';
				$style			= $title_color . $title_bg_color;

				deep_save_dyn_styles( $style );

				// live editor
				if ( ! in_array( 'admin-bar', get_body_class() ) ) {

					if ( ! empty( $style ) ) {

						echo '<style>';
							echo $style;
						echo '</style>';

					}

				}
				echo '' . $title ;

				?>
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
				
					$thumbnail_url = get_the_post_thumbnail_url();
					
					$thumbnail_id  = get_post_thumbnail_id();
					
					if( !empty( $thumbnail_url ) ) {
						
						// if main class not exist get it
						if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						
							require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';

						}
						
						$image 			= new Wn_Img_Maniuplate; // instance from settor class
						$thumbnail_url 	= $image->m_image( $thumbnail_id, $thumbnail_url , '74' , '74' ); // set required and get result
					}

				?>
					<article class="latest-b24 col-md-3">
						<figure class="latest-b24-img">
							<a href="<?php the_permalink(); ?>">
								<?php
									if( !empty($thumbnail_url) )
										echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
									else
										echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg"  alt="' . get_the_title() . '"/>';
								?>
							</a>
						</figure>
						<div class="latest-b24-content">
							<?php if ( $hide_date != 'true' ) { ?>
								<div class="latest-b24-date">
									<i class="pe-7s-clock"></i><?php echo get_the_date();?>
								</div>
							<?php } ?>
							<h3 class="latest-b24-title">
								<a href="<?php the_permalink(); ?>" class="hcolorf" <?php echo '' . $link_target_tag ?>>
									<?php the_title(); ?>	
								</a>
							</h3>
						</div>
					</article>
				<?php endwhile;
			}  elseif ( $type == 'twenty-five' ) {
				wp_enqueue_script( 'deep-news-ticker' );
				$query 			= new WP_Query('posts_per_page=' . $item_to_show . '&category_name='.$category.'') ;
				$title_color 	= $title_color ? '.latest-blg-wrap-title[data-id="' . $uniqid . '"]{color: ' . $title_color . ';}' : '';
				$title_bg_color = $title_bg_color ? '.latest-blg-wrap-title[data-id="' . $uniqid . '"]{ background-color: ' . $title_bg_color . '; }' : '';
				$title			= $title ? '<div class="latest-blg-wrap-title" data-id="' . $uniqid . '">' . $title . '</div>' : '';
				$style			= $title_color . $title_bg_color;

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
					
					<div class="wn-news-ticker" style="opacity: 0; position: absolute;">
						<?php echo '' . $title ; ?>
						<ul id="wn-news-ticker">
									<?php while ( $query->have_posts() ) :
						
						$query->the_post(); ?>
						
							<li class="latest-b25 col-md-12">
								<h3 class="latest-b25-title">
								<?php if ( $hide_date != 'true' ) { ?>
									<span class="time">
									<i class="pe-7s-clock"></i><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . esc_html__( ' ago', 'deep' ); ?>	
									</span>
								<?php } ?>
									<a href="<?php the_permalink(); ?>" class="hcolorf" <?php echo '' . $link_target_tag ?>>
										<?php the_title(); ?>	
									</a>
								</h3>
							</li>
						
									<?php endwhile; ?>
						</ul>
					</div>

			<?php } elseif ($type == 'twenty-six') { // Latest From Blog - Type 26
				
				$query = new WP_Query('posts_per_page=' . $item_to_show . '&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();
				$thumbnail_url = get_the_post_thumbnail_url();
				$thumbnail_id  = get_post_thumbnail_id();
				if( !empty( $thumbnail_url ) ) {
					// if main class not exist get it
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate; // instance from settor class
					$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '140' , '140' ); // set required and get result				
				}
			?>
				<div class="col-md-12">
					<a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag; ?>>
						<article class="latest-b">
							<?php 						
								if (!empty($thumbnail_url)) {
									echo '<figure class="latest-img">';
											echo  '<img src=" ' . $thumbnail_url . ' " alt=" ' . get_the_title() . ' ">';
									echo '</figure>';								
								} 
							?>				
							
							<div class="latest-content">
								<h3 class="latest-title"><?php the_title(); ?></h3>
								<p class="latest-excerpt"><?php echo deep_excerpt(36); ?></p>
							</div>
						</article>
					</a>
				</div>
			<?php endwhile;
				} elseif ($type == 'twenty-seven') { // Latest From Blog - Type 27 

						$query = new WP_Query('posts_per_page=' . $item_to_show . '&category_name='.$category.'');
						$counter = 0;

						while ($query -> have_posts()) : $query -> the_post();
							$class = $counter >= 4 ? 'wn-hide': '';

						?>

							<div class="col-md-12 <?php echo esc_attr($class); ?>">
								<article class="latest-27">
									<div class="latest-27-date">
										<?php if ( $hide_date != 'true' ) { ?>
											<p class="blog-date-27">
												<span class="latest-27-date">
													<i class="ti-calendar"></i><?php echo get_the_date();?>
												</span>
											</p>
										<?php } ?>
									</div>

									<div class="latest-27-title">
										<h3 class="latest-title">
											<a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a>
										</h3>
									</div>
									<div class="latest-27-author">
										<?php if ( $hide_author != 'true' ) { ?>
											<p class="latest-author">
												<i class="icon-software-pencil"><?php the_author_posts_link(); ?></i>
											</p>
										<?php } ?>
									</div>


								</article>
							</div> <?php

							$counter++;

						endwhile; ?>


						<div class="click-more-latest-27">
							<button class="click-more-latest-btn"><i class="ti-arrow-down"></i></button>
						</div>

					<?php

				} elseif ( $type == 'twenty-eight' ) { // Latest From Blog - Type 28 
				$item_to_show = $item_to_show ? $item_to_show : '2' ;
				$query = new WP_Query('posts_per_page=' . $item_to_show . '&category_name='.$category.'');
				while ($query -> have_posts()) : $query -> the_post();

				$thumbnail_id = get_post_thumbnail_id();
				$thumbnail_url = get_the_post_thumbnail_url();
				if( !empty( $thumbnail_url ) ) {
					if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
						require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
					}
					$image = new Wn_Img_Maniuplate;
					$thumbnail_url = $image->m_image( $thumbnail_id , $thumbnail_url , '960' , '678' ); 
				}
				?>
					<article class="latest-28">
						<div class="col-md-5">
							<div class="latest-28-inner">
								<h3 class="latest-title-28"><a href="<?php the_permalink(); ?>" <?php echo '' . $link_target_tag ?>><?php the_title(); ?></a></h3>
								<p class="latest-excerpt-28"><?php echo deep_excerpt(36); ?></p>												
								<div class="latest-28-details">
									<?php if ( $hide_cat != 'true' ) { ?>
										<span class="latest-cat-28"><?php the_category(', ') ?></span>
									<?php } ?>							
									<?php if ( $hide_date != 'true' ) { ?>
										<span class="latest-28-date"><?php echo get_the_date();?></span>
									<?php } ?>
									<span class="latest-readmore-28"><a href="<?php the_permalink(); ?>">read more</a></span>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<?php
								if( !empty($thumbnail_url) )
									echo '<img src="'.$thumbnail_url.'" alt="' . get_the_title() . '">';
								else
									echo '<img src="'.DEEP_ASSETS_URL . 'images/featured.jpg" class="latest28-none-img" alt="' . get_the_title() . '"/>';
							?>
						</div>
					</article>
			<?php endwhile;
			} 

		if ( $carousel == 'true' || $type == 'twenty' ) {
			echo '</div><div class="clearfix"></div>';
		} else { 
			echo '</div>';
		}
		?>

		<?php
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
	
		if ( self::used_shortcode_in_page( 'latestfromblog' ) ) {			
			wp_enqueue_style( 'wn-deep-latest-from-blog0', DEEP_ASSETS_URL . 'css/frontend/latest-from-blog/latest-from-blog0.css' );
		}
	}

} DeepWPBakeryLatestFromBlog::get_instance(); ?>
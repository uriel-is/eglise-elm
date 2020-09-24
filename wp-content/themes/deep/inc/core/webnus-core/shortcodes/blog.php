<?php
class DeepWPBakeryBlog extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryBlog
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
		add_shortcode( 'blog', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
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
		'sidebar'			=> 'none',
		'category'			=> '',
		'count'				=> '',
		'orderby'			=> '',
		'loadmore_btn'		=> '',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
	
		), $attributes));
		ob_start();
		// Class & ID 
		$shortcodeclass		= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	
		$deep_options 	= deep_options();
		$p_count 		= '0';
		$paged 			= ( is_front_page() ) ? 'page' : 'paged' ;
		$deep_last_time = get_the_time(get_option( 'date_format' )); $deep_i=1; $deep_flag = false; //timeline
		$blog_sidebar 	= $deep_options['deep_sidebar_blog_options'] = isset($deep_options['deep_sidebar_blog_options']) ? $deep_options['deep_sidebar_blog_options'] : '' ;
		$sidebar		= $sidebar ? $sidebar : 'none';		

		if ( $type == '11'|| $type == '12' || $type == '13' || $type == '14' || $type == '15' || $type == '18' || $type == '19' || $type == '21' || $type == '22') {
			add_action( 'wp_enqueue_scripts', 'deep_blog_style' );
		}
	
		// orderby query args
		switch ( $orderby ) :
			case 'comment_count':
				$orderby = '&orderby=comment_count&order=DESC';
			break;
	
			case 'view_count':
				$orderby = '&meta_key=deep_views&orderby=meta_value_num&order=DESC';
			break;
	
			case 'social_score':
				if ( class_exists( 'SocialMetricsTracker' ) ) {
					$orderby ='&post_type=post&meta_key=socialcount_total&orderby=meta_value_num&order=DESC';
				}
			break;
	
			default:
				$orderby = '&orderby=date&order=DESC';
			break;
		endswitch;
		
		$args = 'post_type=post&paged='.get_query_var($paged).'&category_name='.$category.'&posts_per_page='.$count.$orderby.'';
		$query = new WP_Query($args);
		if ($type == '16'){
			echo'<section id="main-content-pin"><div class="container"><div id="pin-content">';
		}elseif ($type == '17'){
			echo'<section class="wn-blog-ajax" id="main-content-timeline"><div class="container"><div id="tline-content">';
		}
		echo '<div class="wn-blogws-wrap ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
		// left sidebar
		if ( $sidebar == 'left' || $sidebar == 'both' ) {
			echo '<aside class="col-md-3 sidebar leftside ' . $blog_sidebar . ' ">';
			if( is_active_sidebar( 'Left Sidebar' ) ) dynamic_sidebar( 'Left Sidebar' );
			echo '</aside>';
		}
	
		if ( $sidebar == 'left' || $sidebar == 'right' ) {
			echo '<div class="col-md-9 cntt-w">';
		} elseif ( $sidebar == 'both' ) {
			echo '<div class="col-md-6 cntt-w">';
		}
	
		if ($query ->have_posts()) :
			if ($type == '3')
				echo '<div class="row">';
		while ($query -> have_posts()) : $query -> the_post();
			if ( $type == '2' ) {
				echo '<div class="blg-def-list wn-blog-ajax">';
				get_template_part( 'inc/templates/loops/blogloop-type2');
				echo '</div>';
			} elseif ( $type == '4' ) {
				if( $p_count == '0' ) {
					echo '<div class="blg-def-full wn-blog-ajax">';
					get_template_part( 'inc/templates/loops/blogloop');
					echo '</div>';
				} else {
					echo '<div class="blg-def-list wn-blog-ajax">';
					get_template_part( 'inc/templates/loops/blogloop-type2');
					echo '</div>';
				}
				$p_count++;
			} elseif ( $type == '3' ) {
				get_template_part( 'inc/templates/loops/blogloop-type3');
			} elseif ( $type == '5' ) {
				if ( $p_count == '0' ) {
					echo '<div class="blg-def-full wn-blog-ajax">';
					get_template_part( 'inc/templates/loops/blogloop');
					echo '</div>';
					echo '<div class="row">';
				} else {						
					get_template_part( 'inc/templates/loops/blogloop-type3');
				}
	
				$p_count++;
	
			} elseif ( $type == '16' ) {
	
				echo '<div class="wn-blog-ajax">';
				get_template_part( 'inc/template/loops/blogloop-masonry' );
				echo '</div>';
	
			} elseif (  $type == '17' ) {
							global $post;
							$post_id = $post->ID;
							$post_format = get_post_format($post_id);	
							$content = get_the_content();	
							if( !$post_format ) $post_format = 'standard';	
							if(($deep_last_time != date(' F Y',strtotime($post->post_date)) ) || $deep_i==1){
								$deep_last_time = date(' F Y',strtotime($post->post_date));
								echo '<div class="tline-topdate">'.  date(' F Y',strtotime($post->post_date)) .'</div>';
								if( $deep_i>1 ) $deep_flag = true;
							} ?>
								<article id="post-<?php the_ID(); ?>"  class="tline-box"> <span class="tline-row-<?php if(($deep_i%2)==0) echo 'r'; else echo 'l'; ?>"></span>
									<div class="tline-author-box">
										<h6 class="tline-author">
											<?php the_author_posts_link(); ?>
										</h6>
										<?php echo get_avatar( get_the_author_meta( 'user_email' ), 28 ); ?>
										<h6 class="tline-date"><?php echo get_the_date();?></h6>
									</div>
									<div class="tline-content-wrap">
										<div class="tline-ecxt col-md-7">
											<?php if(  $deep_options['deep_blog_meta_category_enable'] ):?>
												<h6 class="blog-cat-tline" style="background:<?php echo deep_category_color(); ?>;"> <?php the_category('- ') ?></h6>
											<?php endif; ?>
											<?php
											if($deep_options['deep_blog_posttitle_enable'] ) { 
												if( ('aside' != $post_format ) && ('quote' != $post_format)  ) { 	
													if( 'link' == $post_format ) { 
														preg_match('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i', $content,$matches);
														$content = preg_replace('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i','', $content,1);
														$link ='';
														if(isset($matches) && is_array($matches))
															$link = $matches[0];	
														?>
														<h4><a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h4>
														<?php
													}else{
														?>
														<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
														<p class="blog-tline-excerpt">
															<?php echo deep_excerpt( ( $deep_options['deep_blog_excerpt_list'] ) ? $deep_options['deep_blog_excerpt_list'] : 19 ); ?>
														</p>
														<?php } }
												}
												if( $post_format == ('quote') || $post_format == 'aside' ) {
													echo '<blockquote>';
														echo deep_excerpt(31);
													echo '</blockquote>';
												}
												?>
	
													</div>
									<div class="tline-rigth-side col-md-5"> <?php
										$thumbnail_url = get_the_post_thumbnail_url( $post_id );
										$thumbnail_id  = get_post_thumbnail_id( $post_id );
										
										if( !empty( $thumbnail_url ) ) {
											// if main class not exist get it
											if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
												require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
											}
											$image = new Wn_Img_Maniuplate; // instance from settor class
											$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '390' , '297' ); // set required and get result
										}
		
										if(  $deep_options['deep_blog_featuredimage_enable'] ){
										
											$meta_video = rwmb_meta( 'deep_featured_video_meta' );
										
											if($post_format  == 'video' || $post_format == 'audio') {
	
												$pattern = '\\[' . '(\\[?)' . "(video|audio)" . '(?![\\w-])' . '(' . '[^\\]\\/]*' . '(?:' . '\\/(?!\\])' . '[^\\]\\/]*' . ')*?' . ')' . '(?:' . '(\\/)' . '\\]' . '|' . '\\]' . '(?:' . '(' . '[^\\[]*+' . '(?:' . '\\[(?!\\/\\2\\])' . '[^\\[]*+' . ')*+' . ')' . '\\[\\/\\2\\]' . ')?' . ')' . '(\\]?)';
												preg_match( '/' . $pattern . '/s', $post->post_content, $matches );
	
												if( ( is_array( $matches) ) && ( isset( $matches[3] ) ) && (  ( $matches[2] == 'video' ) || ( 'audio'  == $post_format ) ) && ( isset($matches[2] ) ) ) {
													$video = $matches[0];
													echo do_shortcode($video);
													$content = preg_replace('/'.$pattern.'/s', '', $content);
	
													} elseif( (!empty( $meta_video )) ) {
	
														echo do_shortcode($meta_video);
	
													}
											} else
											if( 'gallery'  == $post_format){			
												$pattern = '\\[' . '(\\[?)' . "(gallery)" . '(?![\\w-])' . '(' . '[^\\]\\/]*' . '(?:' . '\\/(?!\\])' . '[^\\]\\/]*' . ')*?' . ')' . '(?:' . '(\\/)' . '\\]' . '|' . '\\]' . '(?:' . '(' . '[^\\[]*+' . '(?:' . '\\[(?!\\/\\2\\])' . '[^\\[]*+' . ')*+' . ')' . '\\[\\/\\2\\]' . ')?' . ')' . '(\\]?)';
												preg_match('/'.$pattern.'/s', $post->post_content, $matches);
												if( (is_array($matches)) && (isset($matches[3])) && ($matches[2] == 'gallery') && (isset($matches[2]))) {
													$ids = (shortcode_parse_atts($matches[3]));
													if(is_array($ids) && isset($ids['ids']))
														$ids = $ids['ids'];
													echo do_shortcode('[vc_gallery onclick="link_no" img_size= "full" type="flexslider_fade" interval="3" images="'.$ids.'"  custom_links_target="_self"]');
													$content = preg_replace('/'.$pattern.'/s', '', $content);
												}
											} else {
												if ( $thumbnail_url ) { ?>
													<a href="<?php the_permalink(); ?>">
														<img src="<?php echo '' . $thumbnail_url ?>" alt="<?php the_title(); ?>" > 
													</a>
												<?php }
											}
										} ?>
									</div>
								
									<div class="tline-footer"> <?php
										if( $deep_options['deep_blog_meta_comments_enable'] ) { ?>
											<div class="tline-comment">
												<i class="wn-far wn-fa-comment"></i>
												<?php comments_number( ); ?>
											</div> <?php
										}
										if( $deep_options['deep_blog_index_social_share'] == 1 ) {
											deep_social_share( $post_id );
										}
										?>
									</div>
								</div>
							</article>
							<?php $deep_i++;
			} elseif ( $type == '6' ) { // personal blog	
				echo '<div class="blg-personal-full blgtyp10 wn-blog-ajax">';
					get_template_part( 'inc/templates/loops/blogloop-type1');
				echo '</div>';	
			} elseif ( $type == '7' ) { // personal blog
				echo '<div class="blg-personal-list wn-blog-ajax">';
					get_template_part( 'inc/templates/loops/blogloop-type5');
				echo '</div>';
			} elseif ( $type == '9' ) { // personal blog	
				if( $p_count == '0' ) {
					echo '<div class="blg-personal-full blgfltl wn-blog-ajax">';
						get_template_part( 'inc/templates/loops/blogloop-type1');
					echo '</div>';					
				} else {					
					echo '<div class="blg-personal-list blgfltl wn-blog-ajax">';
						get_template_part( 'inc/templates/loops/blogloop-type5');
					echo '</div>';
				}
				$p_count++;	
			} elseif ( $type == '8' ) { // personal blog				
				echo '<div class="blg-personal-grid col-md-6 blg-typ3 blgtyp10 wn-blog-ajax">';
					get_template_part( 'inc/templates/loops/blogloop-type7');
				echo '</div>';	
			} elseif ( $type == '10' ) { // personal blog							
				if( $p_count == '0' ) {					
					echo '<div class="blg-personal-full blgtyp10 wn-blog-ajax">';
					get_template_part( 'inc/templates/loops/blogloop-type1');
					echo '</div>';	
				} else {	
					echo '<div class="blg-personal-grid wn-blog-ajax col-md-6 blg-typ3 blgtyp10">';
					get_template_part( 'inc/templates/loops/blogloop-type7');
					echo '</div>';
	
				}				
				$p_count++;					
			} elseif ( $type == '11' ) { // Magazine				
				echo '<div class="blg-magazine-full blgtyp11 wn-blog-ajax">';	
					if( $p_count == '0' ) {						

						get_template_part( 'inc/templates/loops/blogloop-type6');

					}					
				echo '</div>';	
			} elseif ( $type == '18' ) { // Magazine				
				echo '<div class="blg-minimal-full blgtyp18 wn-blog-ajax">';
					if( $p_count == '0' ) {						
						get_template_part( 'inc/templates/loops/blogloop-type9');
					}					
				echo '</div>';	
			} elseif ( $type == '12' ) { // Magazine				
				echo '<div class="blg-magazine-list wn-blog-ajax">';
					get_template_part( 'inc/templates/loops/blogloop-type4');
				echo '</div>';	
			} elseif ( $type == '19' ) { // Magazine			
				echo '<div class="blg-minimal-list wn-blog-ajax">';
					get_template_part( 'inc/templates/loops/blogloop-type4');
				echo '</div>';
			} elseif ( $type == '14' ) { // Magazine					
				if( $p_count == '0' ) {			
					echo '<div class="blg-magazine-full blgtyp11 wn-blog-ajax">';
						get_template_part( 'inc/templates/loops/blogloop-type6');
					echo '</div>';
				} else {
					echo '<div class="blg-magazine-list blgtyp11 wn-blog-ajax">';
						get_template_part( 'inc/templates/loops/blogloop-type4');
					echo '</div>';
				}				
				$p_count++;					
			} elseif ( $type == '21' ) { // Magazine				
				if( $p_count == '0' ) {
					echo '<div class="blg-minimal-full blgtyp18 wn-blog-ajax">';
						get_template_part( 'inc/templates/loops/blogloop-type9');
					echo '</div>';
				} else {
					echo '<div class="blg-minimal-list blgtyp18 wn-blog-ajax">';
						get_template_part( 'inc/templates/loops/blogloop-type4');
					echo '</div>';
				}				
				$p_count++;
				

			} elseif ( $type == '13' ) { // Magazine
				
				echo '<div class="blg-magazine-grid blgtyp11 col-md-6 wn-blog-ajax">';
						get_template_part( 'inc/templates/loops/blogloop-type8');
				echo '</div>';
	
			} elseif ( $type == '20' ) { // Magazine
				
				echo '<div class="blg-minimal-grid blgtyp11 col-md-6 wn-blog-ajax">';
						get_template_part( 'inc/templates/loops/blogloop-type8');
				echo '</div>';
	
			} elseif ( $type == '15' ) { // Magazine
				
				$classes = $p_count == '0' ? 'blg-magazine-full blgtyp11 wn-blog-ajax' : 'blg-magazine-grid wn-blog-ajax col-md-6 blg-typ3 blgtyp11';
	
				echo '<div class="' . esc_attr( $classes ) . '">';
	
						if( $p_count == '0' ) {
	
							get_template_part( 'inc/templates/loops/blogloop-type6');
	
						} else {
	
							get_template_part( 'inc/templates/loops/blogloop-type8');
	
						}
						
						$p_count++;
				
				echo '</div>';
			} elseif ( $type == '22' ) { // Magazine
				
				$classes = $p_count == '0' ? 'blg-minimal-full blgtyp18 wn-blog-ajax' : 'blg-minimal-grid wn-blog-ajax col-md-6 blg-typ3 blgtyp18';
	
				echo '<div class="' . esc_attr( $classes ) . '">';
	
						if( $p_count == '0' ) {
	
							get_template_part( 'inc/templates/loops/blogloop-type9');
	
						} else {
	
							get_template_part( 'inc/templates/loops/blogloop-type8');
	
						}
						
						$p_count++;
				
				echo '</div>';
			} else {
				echo '<div class="wn-blog-ajax blg-def-full">';
					get_template_part( 'inc/templates/loops/blogloop'); //type 1
				echo '</div>';
			}
		endwhile;
		if( $type == '3' || $type == '5' )
			echo '</div>';
	
		elseif( $type == '17' ) // for timeline
			echo'<div class="tline-topdate enddte">'. get_the_time(get_option( 'date_format' )) .'</div></div></div>';
		endif;
	
		if ( $type == '17' ) {
			echo '</section>';
		}
	
		/**
		* end masonry 
		* @author Webnus
		* @version 1.0.0 
		* 
		*/
		if ( $type == '16' ) {
			echo '</div></div></section>';
		}
	
		/**
		* page navi 
		* @author Webnus
		* @version 1.0.0 
		* 
		*/
		if( function_exists('wp_pagenavi') ) {
			if ($loadmore_btn != 'true') {
				
				if ( $type == '11' || $type == '12' || $type == '13' || $type == '14' ) {
					echo '<div class="pagination-blgtype4">';
				}
				wp_pagenavi( array( 'query' => $query ) );
	
				if ( $type == '11' || $type == '12' || $type == '13' || $type == '14' ) {
					echo '</div>';
				}
			}
		}
	
		/**
		* load more button 
		* @author Webnus
		* @version 1.0.0 
		* 
		*/
		if ( $loadmore_btn == 'true' ) {
			global $wp;
			$posts_per_page		= $query->query_vars[ 'posts_per_page' ];
			$found_posts		= $query->found_posts;
			$max_num_pages		= $query->max_num_pages;
			$current_page_num	= $query->query[ 'paged' ];
			$current_page_url	= home_url( $wp->request );
			?>
			<div
				class="wn-loadmore-ajax"
				data-site-url="<?php echo '' . $current_page_url; ?>"
				data-current-page="<?php echo '' . $current_page_num; ?>"
				data-max-page-num="<?php echo '' . $max_num_pages; ?>"
				data-total="<?php echo '' . $posts_per_page; ?>"
				data-post-pre-page="<?php echo '' . $found_posts; ?>"
				data-no-more-post="<?php _e( 'NO MORE POST', 'deep' ) ?>"
			>
				<a href="#"><?php _e( 'LOAD MORE', 'deep' ); ?></a>
			</div> <?php
		}
	
		if ( $sidebar != 'none' ) {
			echo '</div>'; // end col-md-9 or col-md-6
		}
	
		// right sidebar
		if ( $sidebar == 'right' || $sidebar == 'both' ) {
			echo '<aside class="col-md-3 sidebar rightside ' . $blog_sidebar . ' ">';
				if( is_active_sidebar( 'Right Sidebar' ) ) dynamic_sidebar( 'Right Sidebar' );
			echo '</aside>';
		}
		echo '</div>'; // end wn-blogws-wrap
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
		if ( self::used_shortcode_in_page( 'blog' ) ) {
			wp_enqueue_style( 'wn-deep-latest-from-blog21', DEEP_ASSETS_URL . 'css/frontend/latest-from-blog/latest-from-blog21.css' );		
		}
	}

} DeepWPBakeryBlog::get_instance();

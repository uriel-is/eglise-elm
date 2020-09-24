<?php
function deep_special_offers( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'post_to_show'		=> '',
		'link_target'		=> '',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
	), $atts));
	
	ob_start();
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id=' . $shortcodeid . '' : '';
	$link_target_tag = '';
	if ( $link_target == 'true' ){
	    $link_target_tag = ' target="_blank" ';
	}
	$post_to_show = get_page_by_title( $post_to_show, 'OBJECT', 'product' );
	$post_to_show = isset( $post_to_show ) ? $post_to_show->ID : '';
	$special_offers_product = array(
		'post_type'			=> 'product',
		'order'				=> 'ASC',
		'posts_per_page'	=> '1',
		'p'					=> $post_to_show,
	);

	$so_query = new WP_Query( $special_offers_product );

	if ( $so_query->have_posts() ) {

		while ( $so_query->have_posts() ) {
			$so_query->the_post();
			global $product, $woocommerce, $product_id;
			
			// Get Variables
			$product_id					= get_the_ID();
			$discount					= get_post_meta( get_the_id(), '_sale_price', true ) ? get_post_meta( get_the_id(), '_sale_price', true ) : '';
			$sale_price_dates_from		= get_post_meta( get_the_id(), '_sale_price_dates_from', true );
			$sale_price_dates_to		= get_post_meta( get_the_id(), '_sale_price_dates_to', true );
			$deep_offer_finish_text		= get_post_meta( get_the_id(), '_deep_offer_finish_text', true ) ? get_post_meta( get_the_id(), '_deep_offer_finish_text', true ) : 'Offering time is over';
			$regular_price				= $product->get_regular_price();
			$sale_price					= $product->get_sale_price() ? $product->get_sale_price() : '0';
			$woo_currency				= get_woocommerce_currency_symbol();
			$sale_price_dates_to		= ( $date = get_post_meta( get_the_ID(), '_sale_price_dates_to', true ) ) ? date_i18n( 'dF Y', $date ) : '';
			$precent_discount			= round( ( $regular_price - $sale_price ) / $regular_price * 100 ) ;
			
			// Check Product To Have Discount
			if ( $discount ) {
				// Product Gallery
				$attachment_ids = $product->get_gallery_image_ids(); ?>
				<div class="wn-special-offer-wrap special-offer-<?php echo esc_attr( $product_id ); ?> <?php echo esc_attr( $shortcodeclass ); ?>" <?php echo esc_attr( $shortcodeid ); ?>>
					<div class="col-sm-7 special-offer-left-sec">
						<h2 class="wn-so-title">
							<a href="<?php echo the_permalink(); ?> " <?php echo '' . $link_target_tag; ?>><?php echo esc_html__( 'Special ', 'deep' ) . esc_html( $precent_discount ) . '%' . esc_html__( ' discount', 'deep' ) ?></a>
						</h2>
						<p class="wn-so-excerpt"><?php echo deep_excerpt(15); ?> </p>
						<div class="sp-offer-gallery owl-carousel owl-theme" >
							<?php foreach( $attachment_ids as $attachment_id ) {
									$thumbnail_url = wp_get_attachment_url( $attachment_id );
									if( !empty( $thumbnail_url ) ) {
										// if main class not exist get it
										if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
												require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
										}
										$image = new Wn_Img_Maniuplate; // instance from settor class
										$thumbnail_url = $image->m_image( $attachment_id, $thumbnail_url , '314' , '389' ); // set required and get result
									} ?>
									<img class="thumb" src="<?php echo '' . $thumbnail_url; ?>" alt="<?php the_title(); ?>">
							<?php } ?>
						</div>
						<?php if ( is_plugin_active( 'yith-woocommerce-wishlist/init.php' ) ) {
							$is_in_wishlist = ( YITH_WCWL()->is_product_in_wishlist( $product_id ) ) ? 'wn-added-wishlist' : 'no'; 
							$added_wishlist = ( YITH_WCWL()->is_product_in_wishlist( $product_id ) )  ? esc_html__( 'Appended', 'deep' ) :  esc_html__( 'Add to Wishlist', 'deep' ) ; ?>
							<div class="wn-woo-btn wn-wishlist-btn <?php  echo '' . $is_in_wishlist ?>" data-wntooltip="<?php  echo '' . $added_wishlist ?>" data-id="<?php echo get_the_ID(); ?>">
								<i class="pe-7s-like"></i>
							</div>
						<?php } ?>
							
						<?php if ( is_plugin_active( 'yith-woocommerce-quick-view/init.php' ) ) { ?>
							<div class="wn-woo-btn wn-quick-view-btn" data-wntooltip="'. esc_html__( 'Quick View', 'deep' ) .'">
								<?php $quick_view = new YITH_WCQV_Frontend(); ?>
								<?php $quick_view->yith_add_quick_view_button(); ?>
								<i class="pe-7s-search"></i>
							</div>
						<?php } ?>
					</div>
					<div class="col-sm-5 special-offer-right-sec">
						<h3><?php esc_html_e( 'special offer', 'deep' )?></h3>
						<h6><?php echo '' . $woo_currency . $sale_price ; ?></h6>
						<p><?php echo '' . $woo_currency . $regular_price ; ?></p>
						<?php if ( ! empty( $sale_price_dates_from ) && ! empty( $sale_price_dates_to ) ) { ?>
							<div class="sp-cout-down">
								<?php echo do_shortcode( '[countdown type="simple" datetime="' . $sale_price_dates_to . '" done="' . $deep_offer_finish_text . '"]' ); ?>	
							</div>
						<?php } ?>
						<a class="readmore" href="<?php the_permalink(); ?> " <?php echo '' . $link_target_tag; ?>><?php esc_html_e( 'buy now', 'deep' ); ?> </a>
					</div>
				</div>
			<?php
			} 
		}
	}

	$out = ob_get_contents();
	ob_end_clean();
	wp_reset_postdata();
	return $out;
}

add_shortcode('special_offers', 'deep_special_offers');
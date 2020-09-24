<?php
/**
 * Wishlist page template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.12
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>
<?php wp_nonce_field( 'yith-wcwl-form', 'yith_wcwl_form_nonce' ) ?>

<?php do_action( 'yith_wcwl_before_wishlist_form', $wishlist_meta ); ?>

    <?php do_action( 'yith_wcwl_before_wishlist_title' ); ?>
<div class="wn-wishlist-single-wrap">
     <!-- start of  wishlist title -->
    <?php if( ! empty( $page_title ) ) : ?>
        <div class="wn-wishlist-title-sl <?php echo ( $wishlist_meta['is_default'] != 1 && $is_user_owner ) ? 'wishlist-title-with-form' : ''?>">
            <?php echo apply_filters( 'yith_wcwl_wishlist_title', '<h2>' . $page_title . '</h2>' ); ?>
            <?php if( $wishlist_meta['is_default'] != 1 && $is_user_owner ): ?>
                <a class="btn button show-title-form">
                    <?php echo apply_filters( 'yith_wcwl_edit_title_icon', '<i class="wn-fa wn-fa-pencil"></i>' )?>
                    <?php _e( 'Edit title', 'deep' ) ?>
                </a>
            <?php endif; ?>
        </div>
        <?php if( $wishlist_meta['is_default'] != 1 && $is_user_owner ): ?>
            <div class="hidden-title-form">
                <input type="text" value="<?php echo '' . $page_title ?>" name="wishlist_name"/>
                <button>
                    <?php echo apply_filters( 'yith_wcwl_save_wishlist_title_icon', '<i class="wn-fa wn-fa-check"></i>' )?>
                    <?php _e( 'Save', 'deep' )?>
                </button>
                <a class="hide-title-form btn button">
                    <?php echo apply_filters( 'yith_wcwl_cancel_wishlist_title_icon', '<i class="wn-fa wn-fa-remove"></i>' )?>
                    <?php _e( 'Cancel', 'deep' )?>
                </a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <!-- end of  wishlist title -->

    <?php do_action( 'yith_wcwl_before_wishlist' ); ?>

    <!-- start wishlist item -->
    <?php if( count( $wishlist_items ) > 0 ) : ?>
    	<?php echo deep_get_wish( 'yith_render' ); ?>
    <?php else: ?>
    <div class="wn-wishlist-empty-sl">
    	<i class="sl-heart"></i>
    	<p><?php _e( 'Your wishlist is currently empty.', 'deep' ) ?></p>
		<div class="max-title w3-center w3-animate-zoom max-title6  w-width_animation"><h3></h3></div>
		<span><?php _e( 'CLICK THE LIKE ICONS TO ADD PRODUCTS', 'deep' ) ?></span>
    	<a class="wn-add-to-cart-single wn-redirect-shop" href="<?php  echo get_permalink( woocommerce_get_page_id( 'shop' ) ) ?>" > <?php _e( 'RETURN TO SHOP', 'deep' ) ?></a>
    </div>
    <?php endif; ?>
</div>    
    <!-- end wishlist item -->


    <?php if( $show_cb ) : ?>
    	<div class="custom-add-to-cart-button-cotaniner">
    		<a href="<?php echo esc_url( add_query_arg( array( 'wishlist_products_to_add_to_cart' => '', 'wishlist_token' => $wishlist_meta['wishlist_token'] ) ) ) ?>" class="button alt" id="custom_add_to_cart"><?php echo apply_filters( 'yith_wcwl_custom_add_to_cart_text', __( 'Add the selected products to the cart', 'deep' ) ) ?></a>
    	</div>
    <?php endif; ?>


    <!-- start social button -->
    <?php if( count( $wishlist_items ) > 0 ) { 
		 do_action( 'yith_wcwl_before_wishlist_share' );

	    if ( is_user_logged_in() && $is_user_owner && $wishlist_meta['wishlist_privacy'] != 2 && $share_enabled ){
	        yith_wcwl_get_template( 'share.php', $share_atts );
	    }
	    do_action( 'yith_wcwl_after_wishlist_share' );
	}

    ?>
	<!-- end social button -->


    <?php wp_nonce_field( 'yith_wcwl_edit_wishlist_action', 'yith_wcwl_edit_wishlist' ); ?>

    <?php if( $wishlist_meta['is_default'] != 1 ): ?>
        <input type="hidden" value="<?php echo '' . $wishlist_meta['wishlist_token'] ?>" name="wishlist_id" id="wishlist_id">
    <?php endif; ?>

    <?php do_action( 'yith_wcwl_after_wishlist' ); ?>

	<?php do_action( 'yith_wcwl_after_wishlist_form', $wishlist_meta ); ?>


<!-- wishlist aditionla info -->
<?php if( $additional_info ): ?>
	<div id="ask_an_estimate_popup">
		<form action="<?php echo '' . $ask_estimate_url ?>" method="post" class="wishlist-ask-an-estimate-popup">
			<?php if( ! empty( $additional_info_label ) ):?>
				<label for="additional_notes"><?php echo esc_html( $additional_info_label ) ?></label>
			<?php endif; ?>
			<textarea id="additional_notes" name="additional_notes"></textarea>

			<button class="btn button ask-an-estimate-button ask-an-estimate-button-popup" >
				<?php echo apply_filters( 'yith_wcwl_ask_an_estimate_icon', '<i class="wn-fa wn-fa-shopping-cart"></i>' )?>
				<?php _e( 'Ask for an estimate', 'deep' ) ?>
			</button>
		</form>
	</div>
<?php endif; ?>
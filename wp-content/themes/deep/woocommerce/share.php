<?php
/**
 * Share template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.13
 */

if ( ! defined( 'YITH_WCWL' ) ) {
    exit;
} // Exit if accessed directly
?>

<div class="yith-wcwl-share">
    <h4 class="yith-wcwl-share-title"><?php echo wp_kses_post( $share_title ) ?></h4>
    <ul>
        <?php if( $share_facebook_enabled ): ?>
            <li style="list-style-type: none; display: inline-block;">
                <a target="_blank" class="sl-social-facebook" href="https://www.facebook.com/sharer.php?s=100&amp;p%5Btitle%5D=<?php echo esc_url( $share_link_title )?>&amp;p%5Burl%5D=<?php echo urlencode( $share_link_url ) ?>" title="<?php _e( 'Facebook', 'deep' ) ?>"></a>
            </li>
        <?php endif; ?>

        <?php if( $share_twitter_enabled ): ?>
            <li style="list-style-type: none; display: inline-block;">
                <a target="_blank" class="sl-social-twitter" href="https://twitter.com/share?url=<?php echo esc_url( $share_link_url ) ?>&amp;text=<?php echo esc_attr( $share_twitter_summary ) ?>" title="<?php _e( 'Twitter', 'deep' ) ?>"></a>
            </li>
        <?php endif; ?>

        <?php if( $share_pinterest_enabled ): ?>
            <li style="list-style-type: none; display: inline-block;">
                <a target="_blank" class="sl-social-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url( $share_link_url ) ?>&amp;description=<?php echo esc_attr( $share_summary ) ?>&amp;media=<?php echo esc_attr( $share_image_url ) ?>" title="<?php _e( 'Pinterest', 'deep' ) ?>" onclick="window.open(this.href); return false;"></a>
            </li>
        <?php endif; ?>

        <?php if( $share_googleplus_enabled ): ?>
            <li style="list-style-type: none; display: inline-block;">
                <a target="_blank" class="sl-social-google" href="https://plus.google.com/share?url=<?php echo esc_attr( $share_link_url ) ?>&amp;title=<?php echo esc_attr( $share_link_title ) ?>" title="<?php _e( 'Google+', 'deep' ) ?>" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'></a>
            </li>
        <?php endif; ?>

        <?php if( $share_email_enabled ): ?>
            <li style="list-style-type: none; display: inline-block;">
                <a class="icon-paper-plane" href="mailto:?subject=<?php echo urlencode( apply_filters( 'yith_wcwl_email_share_subject', __( 'I wanted you to see this site', 'deep' ) ) )?>&amp;body=<?php echo apply_filters( 'yith_wcwl_email_share_body', $share_link_url ) ?>&amp;title=<?php echo esc_attr( $share_link_title ) ?>" title="<?php _e( 'Email', 'deep' ) ?>"></a>
            </li>
        <?php endif; ?>
    </ul>
</div>
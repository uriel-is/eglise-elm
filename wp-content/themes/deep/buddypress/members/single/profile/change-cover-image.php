<?php
/**
 * BuddyPress - Members Profile Change Cover Image
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<div class="wn-profile-cover">

<h2><?php _e( 'Change Cover Image', 'deep' ); ?></h2>

<?php

/**
 * Fires before the display of profile cover image upload content.
 *
 * @since 2.4.0
 */
do_action( 'bp_before_profile_edit_cover_image' ); ?>

<p><?php _e( "I think it's a bit irresponsible to act like that. A three week period of waiting for a company is a lot of time. Some say, well just continue working on other projects, but if you have employees and other projects it really isn't that simple. We can't organize our workflow anymore.", 'deep'); ?></p>

<?php bp_attachments_get_template_part( 'cover-images/index' ); ?>

</div>

<?php

/**
 * Fires after the display of profile cover image upload content.
 *
 * @since 2.4.0
 */
do_action( 'bp_after_profile_edit_cover_image' );

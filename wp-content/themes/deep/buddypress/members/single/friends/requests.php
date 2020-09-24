<?php
/**
 * BuddyPress - Members Friends Requests
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

/**
 * Fires before the display of member friend requests content.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_member_friend_requests_content' ); ?>

<?php if ( bp_has_members( 'type=alphabetical&include=' . bp_get_friendship_requests() ) ) : ?>

	<div id="pag-top" class="pagination no-ajax">

		<div class="pag-count" id="member-dir-count-top">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-dir-pag-top">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

	<ul id="friend-list" class="item-list">
		<?php while ( bp_members() ) : bp_the_member(); ?>

			<li class="wn-masonry-item" id="friendship-<?php bp_friend_friendship_id(); ?>">
				<div class="wn-member-inner-list">
					<div class="item-avatar">
						<a href="<?php bp_member_link(); ?>"><?php bp_member_avatar(); ?></a>
					</div>

					<div class="item">
						<div class="item-title">
							<a href="<?php bp_member_link(); ?>"><?php bp_member_name(); ?></a>

							<p><?php bp_member_last_active(); ?></p>
						
							<?php $counts = bp_follow_total_follow_counts( array( 'user_id' => bp_get_member_user_id() ) ); ?>

							<?php printf( __( '<span>%d</span><span> Followers</span>', 'bp-follow' ), (int)$counts['followers'] ) ?>
						</div>

						<div class="item-meta"><span class="activity"><?php bp_member_last_active(); ?></span></div>

						<?php
						/**
						 * Fires inside the display of a member friend request item.
						 *
						 * @since 1.1.0
						 */
						do_action( 'bp_friend_requests_item' );
						?>
					</div>

					<div class="action">
						<a class="button accept" href="<?php bp_friend_accept_request_link(); ?>"><?php _e( 'Accept', 'deep' ); ?></a> &nbsp;
						<a class="button reject" href="<?php bp_friend_reject_request_link(); ?>"><?php _e( 'Reject', 'deep' ); ?></a>

						<?php

						/**
						 * Fires inside the member friend request actions markup.
						 *
						 * @since 1.1.0
						 */
						do_action( 'bp_friend_requests_item_action' ); ?>
					</div>
				</div>
			</li>

		<?php endwhile; ?>
	</ul>

	<?php

	/**
	 * Fires and displays the member friend requests content.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_friend_requests_content' ); ?>

	<div id="pag-bottom" class="pagination no-ajax">

		<div class="pag-count" id="member-dir-count-bottom">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-dir-pag-bottom">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'You have no pending friendship requests.', 'deep' ); ?></p>
	</div>

<?php endif;?>

<?php

/**
 * Fires after the display of member friend requests content.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_member_friend_requests_content' );

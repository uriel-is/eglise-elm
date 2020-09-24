<?php
/**
 * BuddyPress Template Functions.
 * @author Webnus
 * @version 1.0.0 
 * 
*/

// return if BuddyPress isn't activated
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( ! is_plugin_active( 'buddypress/bp-loader.php' ) ) {
    return;
}

/**
 * enqueue require scripts and style for buddypress 
 * @author Webnus
 * @version 1.0.0 
 * 
*/
function deep_bp_scripts() {
    wp_enqueue_style( 'deep-buddypress-style', DEEP_CORE_URL . 'buddypress/assets/buddypress.css' );
    wp_enqueue_script( 'deep-buddypress-script', DEEP_CORE_URL . 'buddypress/assets/buddypress.js', array( 'jquery' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'deep_bp_scripts', 9999 );


// Include Parts
$pb_directory   = get_template_directory() . '/inc/buddypress';

// load webnus vc_maps
$files = glob( $pb_directory . '/parts/*.php' );
foreach ( $files as $file ) :
    if ( __FILE__ != basename( $file ) ) {
        include_once $file;
    }
endforeach;

add_action( 'bp_member_header_actions',     'deep_bp_following_and_followers',  1 );
add_action( 'bp_member_header_actions',     'deep_bp_start_profile_btns',       2 );
add_action( 'bp_member_header_actions',     'deep_bp_end_profile_btns',         25 );
add_action( 'bp_after_member_header',       'deep_bp_member_social_extend' );
add_action( 'bp_after_member_header',       'deep_bp_upload_cover_image' );
add_action( 'xprofile_admin_group_action',  'deep_bp_member_fields_name' );

if ( bp_is_active( 'messages' ) ) {
    add_action( 'bp_directory_members_actions', 'deep_bp_dir_send_private_message_button',11 );
}

/**
 * Adding followers and following to header-cover-image 
 * @author Webnus
 * @version 1.0.0 
 * 
*/
function deep_bp_following_and_followers() {
    if ( ! is_plugin_active( 'buddypress/bp-loader.php' ) ) {
        $bp_follow_total_follow_counts	 = bp_follow_total_follow_counts( array( "user_id" => bp_displayed_user_id() ) );
        $followrs   = (int) $bp_follow_total_follow_counts[ 'following' ];
        $following  = (int) $bp_follow_total_follow_counts[ 'followers' ];
        echo '
        <div class="wn-bp-account-friends">
            <div class="wn-following">
                <span class="following-count">' . esc_html( $followrs ) . '</span>
                <p> ' . __( 'Following', 'deep' ) . ' </p>
            </div>
            <div class="wn-followers">
                <span class="followers-count">' . esc_html( $following ) . '</span>
                <p> ' . __( 'Followers', 'deep' ) . ' </p>
            </div>
        </div>';

    }    
}

/**
 * add divition wn-profile-btns 
 * @author Webnus
 * @version 1.0.0 
 * 
*/
function deep_bp_start_profile_btns() {
    echo '<div class="wn-profile-btns">';
}

/**
 * end wn-profile-btns 
 * @author Webnus
 * @version 1.0.0 
 * 
*/
function deep_bp_end_profile_btns() {
    echo '</div>';
}

/**
 * Social Media Icons based on the profile user info 
 * @author Webnus
 * @version 1.0.0 
 * 
*/
function deep_bp_member_social_extend() {
    global $bp;
    $dmember_id             = $bp->displayed_user->id;
    $socials                = array();
    $social                 = '';
    $socials['facebook']    = xprofile_get_field_data('facebook', $dmember_id );
    $socials['dribbble']    = xprofile_get_field_data('dribbble', $dmember_id );
    $socials['flickr']      = xprofile_get_field_data('flickr', $dmember_id );
    $socials['foursquare']  = xprofile_get_field_data('foursquare', $dmember_id );
    $socials['github']      = xprofile_get_field_data('github', $dmember_id );
    $socials['google-plus'] = xprofile_get_field_data('google-plus', $dmember_id );
    $socials['instagram']   = xprofile_get_field_data('instagram', $dmember_id );
    $socials['lastfm']      = xprofile_get_field_data('lastfm', $dmember_id );
    $socials['linkedin']    = xprofile_get_field_data('linkedin', $dmember_id );
    $socials['pinterest']   = xprofile_get_field_data('pinterest', $dmember_id );
    $socials['reddit']      = xprofile_get_field_data('reddit', $dmember_id );
    $socials['soundcloud']  = xprofile_get_field_data('soundcloud', $dmember_id );
    $socials['spotify']     = xprofile_get_field_data('spotify', $dmember_id );
    $socials['tumblr']      = xprofile_get_field_data('tumblr', $dmember_id );
    $socials['twitter']     = xprofile_get_field_data('twitter', $dmember_id );
    $socials['vimeo']       = xprofile_get_field_data('vimeo', $dmember_id );
    $socials['vine']        = xprofile_get_field_data('vine', $dmember_id );
    $socials['yelp']        = xprofile_get_field_data('yelp', $dmember_id );
    $socials['yahoo']       = xprofile_get_field_data('yahoo', $dmember_id );
    $socials['youtube']     = xprofile_get_field_data('youtube', $dmember_id );
    $socials['wordpress']   = xprofile_get_field_data('wordpress', $dmember_id );
    $socials['dropbox']     = xprofile_get_field_data('dropbox', $dmember_id );
    $socials['leaf']        = xprofile_get_field_data('leaf', $dmember_id );
    $socials['skype']      = xprofile_get_field_data('skyype', $dmember_id );
    $socials['feed']        = xprofile_get_field_data('feed', $dmember_id );
    
    if ( !array_filter($socials) ) {
        return;
    }

    foreach ($socials as $slug => $url) {
        $social .= ! empty( $url ) ? '<li class="wn-bp-profile-socials"><a href="' . $url . '" class="hcolorf"><i class="hcolorf wn-fab wn-fa-'. $slug .'"></i></a></li>' : '';
    }
    $out = ' <ul class="wn-bp-member-social"> ' . $social . ' </ul>';
    echo wp_kses_post( $out );
}

/**
 * User Socials Networks Fields Name  
 * @author Webnus
 * @version 1.0.0 
 * 
*/
function deep_bp_member_fields_name() {
    echo '
    <h3 style="color: red; margin-bottom: 10px;">' . __('Social Field names', 'deep') . '</h3>
    <p style="margin-top: 0;">' . __('Please use this name for socials', 'deep') . '</p>
    <ul>
        <li class="wn-bp-social-name">facebook</li>
        <li class="wn-bp-social-name">dribbble</li>
        <li class="wn-bp-social-name">flickr</li>
        <li class="wn-bp-social-name">foursquare</li>
        <li class="wn-bp-social-name">github</li>
        <li class="wn-bp-social-name">google-plus</li>
        <li class="wn-bp-social-name">instagram</li>
        <li class="wn-bp-social-name">lastfm</li>
        <li class="wn-bp-social-name">linkedin</li>
        <li class="wn-bp-social-name">pinterest</li>
        <li class="wn-bp-social-name">reddit</li>
        <li class="wn-bp-social-name">soundcloud</li>
        <li class="wn-bp-social-name">spotify</li>
        <li class="wn-bp-social-name">tumblr</li>
        <li class="wn-bp-social-name">twitter</li>
        <li class="wn-bp-social-name">vimeo</li>
        <li class="wn-bp-social-name">vine</li>
        <li class="wn-bp-social-name">yelp</li>
        <li class="wn-bp-social-name">yahoo</li>
        <li class="wn-bp-social-name">youtube</li>
        <li class="wn-bp-social-name">wordpress</li>
        <li class="wn-bp-social-name">dropbox</li>
        <li class="wn-bp-social-name">leaf</li>
        <li class="wn-bp-social-name">skype</li>
        <li class="wn-bp-social-name">feed</li>
    </ul>';
}

/**
 * Add the Cover editor button to wall 
 * @author Webnus
 * @version 
 * 
*/
function deep_bp_upload_cover_image() {

    global $bp;
    $user_id            = bp_loggedin_user_id();
    $dmember_id         = $bp->displayed_user->id;

    if ( $user_id == $dmember_id ) {
        $cover_image_url = bp_core_get_user_domain( get_current_user_id() ) . 'profile/change-cover-image/';
        echo '
            <div class="wn-bp-edit-cover-btn">
                <a href="'. esc_url( $cover_image_url ) .'"><i class="ti-camera"></i></a>
            </div>';
    }

}

/**
 * Add user notifications 
 * @author Webnus
 * @version 
 * 
*/
function deep_bp_user_notifications() {
    global $wp_admin_bar;
	if ( ! is_user_logged_in() ) {
		return false;
	}
	$notifications  = bp_notifications_get_notifications_for_user( bp_loggedin_user_id(), 'object' );
	$count          = ! empty( $notifications ) ? count( $notifications ) : 0;
	$menu_title     = '<span class="wn-bp-pending-notifications">' . number_format_i18n( $count ) . '</span>';
    $menu_link      = trailingslashit( bp_loggedin_user_domain() . bp_get_notifications_slug() );
    $out            = '';

    $out .= '
        <div class="wn-bp-notification">
            <a href="' . esc_url( $menu_link ) . '">' . wp_kses_post( $menu_title ) . '<i class="ti-bell"></i></a>
        </div>
    ';

    // if ( ! empty( $notifications ) ) {

	// 	foreach ( (array) $notifications as $notification ) {
    //         var_dump( $notification );
	// 	}

    // } else {

    //     $out .= __( 'No new notifications', 'deep' );

	// }
    return $out;

}

/**
 * Add user Messages 
 * @author Webnus
 * @version 1.0.0
 * 
*/
function deep_bp_user_messages() {
    $inbox_url = bp_loggedin_user_domain() . bp_get_messages_slug() . '/inbox';
    if ( bp_has_message_threads() ) : ?>
        <div class="wn-bp-messages">
            <a href="<?php echo esc_url( $inbox_url ); ?>"><i class="ti-email"></i></a>
                <ul id="message-threads">
                    <?php while ( bp_message_threads() ) : bp_message_thread(); ?>
                        <li data-count="<?php bp_message_thread_unread_count(); ?>" >
                            <a href="<?php bp_message_thread_view_link(); ?>" class="hcolof">
                                <?php bp_message_thread_avatar(); ?>
                                <?php bp_message_thread_from(); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>        
                </ul>
        </div>
    <?php else: ?>
        <div class="wn-bp-messages">
            <a href="<?php echo esc_url( $inbox_url ); ?>"><i class="ti-email"></i></a>
            <ul id="message-threads">
                <li data-count="<?php bp_message_thread_unread_count(); ?>" >
                    <a href="<?php echo esc_url( $inbox_url ); ?>"><?php echo __( 'There are no messages to display.', 'deep' )?></a>
                </li>
            </ul>         
        </div>
    <?php endif;
}


/**
 * Redirect After login 
 * @author Webnus
 * @version 1.0.0
 * 
*/
function deep_pb_redirect_on_first_login( $redirect_to, $redirect_url_specified, $user ) {
    //check if we have a valid user?
    if ( is_wp_error( $user ) ) {
        return $redirect_to;
    }
    //check for user's last activity
    $last_activity =  bp_get_user_last_activity( $user->ID );
 
    if ( empty( $last_activity ) ) {
        //it is the first login
        //update redirect url
        //I am redirecting to user's profile here
        //you may change it to anything
        $redirect_to = bp_core_get_user_domain($user->ID );
    }
    return $redirect_to;
}
 
add_filter( 'login_redirect', 'deep_pb_redirect_on_first_login', 110, 3 );


function deep_bp_dir_send_private_message_button() {
	if( bp_get_member_user_id() != bp_loggedin_user_id() ) {
		bp_send_message_button();
	}
}

<?php
// Change Navigation Name
function rename_activity_to_wall() {
    // Change "Activity" to "Dashboard"
    buddypress()->members->nav->edit_nav( array( 'name' => __( 'Wall', 'deep' ) ), 'activity' );
}
add_action( 'bp_actions', 'rename_activity_to_wall' );
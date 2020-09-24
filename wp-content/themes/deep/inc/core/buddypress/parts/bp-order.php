<?php 
/***************************************************
 * :: WooCommerce And Buddypress Integration
 ***************************************************/

if ( function_exists( 'bp_is_active' ) && is_user_logged_in() ) {

	// Add the Orders tab to BuddyPress profile
	add_action( 'bp_setup_nav', 'woo_profile_nav_orders', 301 );
	function woo_profile_nav_orders() {
		$bp = buddypress();
		bp_core_new_nav_item(
			array(
				'name'                    => __( 'Orders', 'deep' ),
				'slug'                    => 'orders',
				'position'                => 21,
				'show_for_displayed_user' => false,
				'screen_function'         => 'bp_woo_orders_screen',
				'default_subnav_slug'     => 'my-orders',
			) );
	}
	
	// Add submenus to Orders tab
	add_action( 'bp_setup_nav', 'woo_order_submenus', 302 );
	function woo_order_submenus() {
		$bp = buddypress();
		if ( version_compare( BP_VERSION, '2.6', '>=' ) ) {
			$url = $bp->members->nav->orders->slug;
		} else {
			$url = $bp->bp_nav['orders']['slug'];
		}
		
		bp_core_new_subnav_item(
			array(
				'name'                    => __( 'My Orders', 'deep' ),
				'slug'                    => 'my-orders',
				'parent_url'              => $bp->loggedin_user->domain . $url . '/',
				'parent_slug'             => $url,
				'position'                => 10,
				'show_for_displayed_user' => false,
				'screen_function'         => 'woo_orders_screen',
			) );
	}
	
	// Load My Orders template
	function woo_orders_screen() {
		add_action( 'bp_template_content', 'woo_orders_screen_content' );
		bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
	}
	
	// Display My Orders screen
	function woo_orders_screen_content() {
		echo '<div class="wn-woocommerce">';
		wc_get_template( 'myaccount/my-orders.php' );
		echo '</div>';
	}
	
	// Load My Downloads template
	function woo_downloads_screen() {
		add_action( 'bp_template_content', 'woo_downloads_screen_content' );
		bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
	}
	
	// Display My Downloads screen
	function woo_downloads_screen_content() {
		echo '<div class="wn-woocommerce">';
		wc_get_template( 'myaccount/my-downloads.php' );
		echo '</div>';
	}
	
	// Add account settings into profile settings
	// Add address sub menu to settings menu
	add_action( 'bp_setup_nav', 'woo_address_submenu', 302 );
	function woo_address_submenu() {
		$bp = buddypress();
		
		if ( version_compare( BP_VERSION, '2.6', '>=' ) ) {
			$url = $bp->members->nav->settings->slug;
		} else {
			$url = $bp->bp_nav['settings']['slug'];
		}
		
		bp_core_new_subnav_item(
			array(
				'name'                    => __( 'My Addresses', 'deep' ),
				'slug'                    => 'my-address',
				'parent_url'              => $bp->loggedin_user->domain . $url . '/',
				'parent_slug'             => $url,
				'position'                => 15,
				'show_for_displayed_user' => false,
				'screen_function'         => 'woo_address_screen',
			) );
	}
	
	// Load address template
	function woo_address_screen() {
		add_action( 'bp_template_content', 'woo_address_screen_content' );
		bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
	}
	
	// Load address screen
	function woo_address_screen_content() {
		echo '<div class="wn-woocommerce">';
		wc_get_template( 'myaccount/form-edit-address.php', array('load_address' => '') );
		echo '</div>';
	}
	
	//Remove Settings > General screen and replace with woo account edit screen
	//add_action( 'bp_setup_nav', 'remove_general_settings' , 301 );
	function remove_general_settings() {
		bp_core_remove_subnav_item( 'settings', 'general' );
	}
	
	//Change default subnav for settings
	//add_action('bp_setup_nav', 'change_settings_subnav', 5);
	function change_settings_subnav() {
		$args = array(
			'parent_slug'     => 'settings',
			'screen_function' => 'bp_woo_edit_account_screen',
			'subnav_slug'     => 'account'
		);
		bp_core_new_nav_default( $args );
	}
	
	//Add edit account sub menu
	//add_action( 'bp_setup_nav', 'woo_edit_account_submenu' , 302 );
	function woo_edit_account_submenu() {
		global $bp;
		bp_core_new_subnav_item(
			array(
				'name'                    => __( 'Account', 'deep' ),
				'slug'                    => 'account',
				'parent_url'              => $bp->loggedin_user->domain . $bp->bp_nav['settings']['slug'] . '/',
				'parent_slug'             => $bp->bp_nav['settings']['slug'],
				'position'                => 10,
				'show_for_displayed_user' => false,
				'screen_function'         => 'woo_edit_account_screen',
			) );
	}
	
	// Load account template
	function woo_edit_account_screen() {
		add_action( 'bp_template_content', 'woo_edit_account_screen_content' );
		bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
	}
	
	// Display edit account screen
	function woo_edit_account_screen_content() {
		echo '<div class="wn-woocommerce">';
		wc_get_template( 'myaccount/form-edit-account.php', array( 'user' => get_user_by( 'id', get_current_user_id() ) ) );
		echo '</div>';
	}

	// Make sure we stay in Buddypress profile after edits
	add_action( 'woocommerce_customer_save_address', 'save_address_bp_redirect' );
	function save_address_bp_redirect() {
		global $bp;
		wp_safe_redirect( $bp->loggedin_user->domain . $bp->settings->slug . '/my-address/' );
		exit;
	}
	
	add_action( 'woocommerce_save_account_details', 'save_account_bp_redirect' );
	function save_account_bp_redirect() {
		global $bp;
		wp_safe_redirect( $bp->loggedin_user->domain . $bp->settings->slug . '/account/' );
		exit;
	}
	
	// Add button on order detail screen to return to order list
	add_action( 'woocommerce_view_order', 'return_to_bp_order_list' );
	function return_to_bp_order_list() { ?>
		<?php global $bp; ?>
		<a href="<?php echo '' . $bp->loggedin_user->domain . 'orders/'; ?>"
		   title="<?php _e( 'View All Orders', 'deep' ); ?>"
		   class="button"><?php _e( 'View All Orders', 'deep' ); ?>   
		</a>
	<?php }
} 
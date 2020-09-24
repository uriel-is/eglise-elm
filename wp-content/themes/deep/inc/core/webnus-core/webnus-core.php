<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// define some const
define( 'WEBNUS_CORE_DIR', DEEP_CORE_DIR . 'webnus-core/');
define( 'WEBNUS_CORE_URL', DEEP_CORE_URL . 'webnus-core/');

/*********************/
/*	    LOGIN
/*********************/
if ( ! function_exists('deep_login') ) {
	function deep_login() {
		$deep_options = deep_options();
		$color_skin_class = ( isset( $deep_options['deep_webnus_custom_color_skin'] ) || isset( $deep_options['deep_webnus_color_skin'] ) && $deep_options['deep_webnus_color_skin'] != 'e3e3e3' ) ? 'colorskin-custom' : '' ;
		global $user_ID, $user_identity;
		if ( $user_ID ) : ?>
			<div class="login-dropdown-arrow-wrap"></div>
			<div id="user-logged" class="<?php echo $color_skin_class; ?>">
				<span class="author-avatar"><?php echo get_avatar( $user_ID, $size = '100'); ?></span>
				<div class="user-welcome"><?php esc_html_e('Welcome','deep'); ?> <strong><?php echo esc_html($user_identity) ?></strong></div>
				<ul class="logged-links colorb">
					<?php if ( is_plugin_active( 'buddypress/bp-loader.php' ) ) { ?>
						<li><a href="<?php echo bp_loggedin_user_domain(); ?>"><?php esc_html_e('Profile','deep'); ?> </a></li>
						<li><a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>"><?php esc_html_e('Logout','deep'); ?> </a></li>
					<?php } else { ?>
						<li><a href="<?php echo esc_url(home_url('/wp-admin/')); ?>"><?php esc_html_e('Dashboard','deep'); ?> </a></li>
						<li><a href="<?php echo esc_url(home_url('/wp-admin/profile.php')); ?>"><?php esc_html_e('My Profile','deep'); ?> </a></li>
						<li><a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>"><?php esc_html_e('Logout','deep'); ?> </a></li>
					<?php } ?>
				</ul>
				<div class="clear"></div>
			</div>
		<?php else: ?>
			<div class="login-dropdown-arrow-wrap"></div>
				<?php if ( is_plugin_active('super-socializer/super_socializer.php') ) { ?>
					<!-- social login -->
					<div class="wn-social-login">
						<?php echo do_shortcode('[TheChamp-Login]'); ?>
						<div class="wn-or-divider">
							<span><?php _e( 'or', 'deep' ); ?></span>
						</div>
					</div>
				<?php } ?>
			<h3 id="user-login-title" class="user-login-title"><?php esc_html_e( 'Account Login', 'deep' ); ?></h3>
			<div id="user-login">
			<?php wp_login_form(array('label_username' => esc_html__( 'Username','deep' ),'label_password' => esc_html__( 'Password','deep' ),'label_remember' => esc_html__( 'Remember Me','deep' ),
			'label_log_in'   => esc_html__( 'Log In','deep' ),));?>
				<ul class="login-links">
					<?php if ( get_option('users_can_register') ) : ?><?php echo wp_register() ?><?php endif; ?>
					<li><a href="<?php echo esc_url(wp_lostpassword_url(get_permalink()))?>"><?php esc_html_e('Forget Password?','deep'); ?></a></li>
				</ul>
			</div>
		<?php endif;
	}
}

/*********************/
/*	    THE GRID
/*********************/
if ( is_plugin_active( 'the-grid/the-grid.php' ) ) {
	include_once WEBNUS_CORE_DIR. '/the-grid/skins.php';
}

if ( is_plugin_active( 'js_composer/js_composer.php' ) || is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
	
	require_once WEBNUS_CORE_DIR . 'shortcodes/wpbakery-shortcodes.php';

	add_action( 'init', 'shortcodes_init' );
	function shortcodes_init() {
		foreach( glob( WEBNUS_CORE_DIR . 'shortcodes/*.php' ) as $filename ) {
			require_once $filename;
		}
		foreach( glob( WEBNUS_CORE_DIR . 'widgets/*.php' ) as $filename ) {
			require_once $filename;
		}
	}

	add_action( 'wp_enqueue_scripts', 'deep_webnus_core_script_loader', 9999999 );
	function deep_webnus_core_script_loader() {
		// Woocommerce js error hack
		if (is_plugin_active( 'woocommerce/woocommerce.php')){
			global $post, $woocommerce;
			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
			if(file_exists($woocommerce->plugin_path() . '/assets/js/jquery-cookie/jquery.cookie'.$suffix.'.js')){
				rename($woocommerce->plugin_path() . '/assets/js/jquery-cookie/jquery.cookie'.$suffix.'.js', $woocommerce->plugin_path() . '/assets/js/jquery-cookie/jquery_cookie'.$suffix.'.js');
			}
			wp_deregister_script( 'jquery-cookie' );
			wp_register_script( 'jquery-cookie', $woocommerce->plugin_url() . '/assets/js/jquery-cookie/jquery_cookie'.$suffix.'.js', array( 'jquery' ), '1.3.1', true );
		}
		wp_deregister_style('flexslider');
		wp_dequeue_style('flexslider');
		wp_deregister_script('flexslider');
		wp_dequeue_script('flexslider');
		
		// dequeue social count plus
		wp_deregister_style('social-count-plus');
		wp_dequeue_style('social-count-plus');

	}

	add_action( 'wp_print_scripts', 'deep_core_admin_scripts', 100 );
	add_action( 'admin_enqueue_scripts', 'deep_core_admin_scripts', 100 );
	function deep_core_admin_scripts() {
		
		wp_dequeue_script( 'wpb_ace' );
		wp_deregister_script( 'wpb_ace' );

		// JWp6 plugin giving us problems.  They need to update.
		if (  wp_script_is ( 'jquerySelect2' )) {
			wp_deregister_script( 'jquerySelect2' );
			wp_dequeue_script('jquerySelect2');
			wp_dequeue_style('jquerySelect2Style');
		}

		// dequeue WP domain checker
		wp_deregister_style('wdc-main-styles');
		wp_dequeue_style('wdc-main-styles');
	}

	function getFontsData( $fontsString ) {

		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

			$googleFontsParam	= new Vc_Google_Fonts();      
			$fieldSettings		= array();
			$fontsData			= strlen( $fontsString ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $fontsString ) : '';
			return $fontsData;

		}

	}

	// inline style
	function googleFontsStyles( $fontsData ) {
		
		if ( ! is_array( $fontsData ) )
			return;

		$fontFamily = explode( ':', $fontsData['values']['font_family'] );
		$styles[]	= 'font-family:' . $fontFamily[0];
		$fontStyles = explode( ':', $fontsData['values']['font_style'] );
		$styles[]	= 'font-weight:' . $fontStyles[1];
		$styles[]	= 'font-style:' . $fontStyles[2];
		$inline_style = '';

		foreach( $styles as $attribute ) {
			$inline_style .= $attribute.'; ';
		}
		
		return $inline_style;
	}

	// Enqueue google font
	function enqueueGoogleFonts( $fontsData ) {
		$settings = get_option( 'wpb_js_google_fonts_subsets' );
		if ( is_array( $settings ) && ! empty( $settings ) ) {
			$subsets = '&subset=' . implode( ',', $settings );
		} else {
			$subsets = '';
		}
		if ( isset( $fontsData['values']['font_family'] ) ) {
			wp_enqueue_style( 
				'vc_google_fonts_' . vc_build_safe_css_class( $fontsData['values']['font_family'] ), 
				'//fonts.googleapis.com/css?family=' . $fontsData['values']['font_family'] . $subsets
			);
		}

	}
}
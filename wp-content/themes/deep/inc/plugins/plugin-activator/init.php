<?php
/**
* This file represents an example of the code that themes would use to register
* the required plugins.
*
* It is expected that theme authors would copy and paste this code into their
* functions.php file, and amend to suit.
*
* @package    TGM-Plugin-Activation
* @subpackage Example
* @version    2.4.1
* @author     Thomas Griffin
* @author     Gary Jones
* @copyright  Copyright (c) 2011, Thomas Griffin
* @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
* @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
*/

require_once get_template_directory() . '/inc/plugins/plugin-activator/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'deep_register_required_plugins' );
function deep_register_required_plugins() {
	$plugin_url = is_ssl() ? 'https://deeptem.com' : 'http://deeptem.com';
	$plugins = array(
		array(
			'name'		=> esc_html__( 'WPBakery Page Builder', 'deep' ),
			'slug'		=> 'js_composer',
			'source'	=> $plugin_url . '/deep-downloads/download.php?js_composer',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix01.jpg',
			'category'	=> 'builder premium',
			'version'   => '6.3.0'			
		),

		array(
			'name'		=> esc_html__( 'Quform', 'deep' ),
			'slug'		=> 'Quform-wordpress-form-builder',
			'source'	=> $plugin_url . '/deep-downloads/download.php?Quform-wordpress-form-builder',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix49.jpg',
			'category'	=> 'premium',
			'version'   => '2.12.0'
		),

		array(
			'name'		=> esc_html__( 'Elementor', 'deep' ),
			'slug'		=> 'elementor',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix43.jpg',
			'category'	=> 'builder free',
		),

		array(
			'name'		=> esc_html__( 'Essential Addons for Elementor', 'deep' ),
			'slug'		=> 'essential-addons-for-elementor-lite',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix61.jpg',
			'category'	=> 'builder free',
		),

		array(
			'name'		=> esc_html__( 'Element Pack', 'deep' ),
			'slug'		=> 'bdthemes-element-pack',
			'source'	=> $plugin_url . '/deep-downloads/download.php?bdthemes-element-pack',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix47.jpg',
			'category'	=> 'builder premium',
			'version'   => '5.3.2'
		),
		
		array(
			'name'		=> 'ModuloBox',
			'slug'		=> 'modulobox',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?modulobox',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix07.jpg',
			'category'	=> 'premium',
			'version'   => '1.6.0 '
		),

		array(
			'name'		=> esc_html__( 'Modern events calendar lite', 'deep' ),
			'slug'		=> 'modern-events-calendar-lite',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix08.jpg',
			'category'	=> 'free',
		),

		array(
			'name'		=> 'Ultimate Addons for WPBakery Page Builder',
			'slug'		=> 'Ultimate_VC_Addons',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?Ultimate_VC_Addons',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix12.jpg',
			'category'	=> 'builder premium',
			'version'   => '3.19.6'
		),
		
		array(
			'name'		=> 'Ninja Popups',
			'slug'		=> 'arscode-ninja-popups',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?arscode-ninja-popups',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix10.jpg',
			'category'	=> 'premium',
			'version'   => '4.6.5'
		),
		
		array(
			'name'		=> 'Go Pricing',
			'slug'		=> 'go_pricing',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?go_pricing',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix27.jpg',
			'category'	=> 'premium',
			'version'   => '3.3.17'
		),

		array(
			'name'		=> 'Material White Label',
			'slug'		=> 'material-admin',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?material-admin',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix33.jpg',
			'category'	=> 'premium',
			'version'   => '7.1'
		),

		array(
			'name'		=> 'ACF Pro',
			'slug'		=> 'advanced-custom-fields-pro',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?advanced-custom-fields-pro',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix36.jpg',
			'category'	=> 'premium',
			'version'   => '5.9.0'
		),

		array(
			'name'		=> 'Webnus Portfolio',
			'slug'		=> 'webnus-portfolio',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?webnus-portfolio',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix14.jpg',
			'category'	=> 'webnus',
		),
		
		array(
			'name'		=> 'Webnus Gallery',
			'slug'		=> 'webnus-gallery',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?webnus-gallery',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix15.jpg',
			'category'	=> 'webnus',
		),
		
		array(
			'name'		=> 'Yellow Pencil Pro',
			'slug'		=> 'waspthemes-yellow-pencil',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?waspthemes-yellow-pencil',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix11.jpg',
			'category'	=> 'builder premium',
			'version'   => '7.3.1'
		),
		
		array(
			'name'		=> 'Easy Social Share Button',
			'slug'		=> 'easy-social-share-buttons3',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?easy-social-share-buttons3',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix09.jpg',
			'category'	=> 'premium',
			'version'   => '7.3'
		),
		
		array(
			'name'		=> 'LayerSlider WP',
			'slug'		=> 'LayerSlider',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?layerslider',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix04.jpg',
			'category'	=> 'slider premium',
			'version'   => '6.11.2'
		),

		array(
			'name'		=> 'WP Domain Checker',
			'slug'		=> 'wp-domain-checker',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?wp-domain-checker',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix44.jpg',
			'category'	=> 'premium',
			'version'   => '5.0.3'
		),
		
		array(
			'name'		=> esc_html__( 'The Grid', 'deep' ),
			'slug'		=> 'the-grid',
			'source'	=> $plugin_url . '/deep-downloads/download.php?the-grid',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix06.jpg',
			'category'	=> 'premium',
			'version'   => '2.7.7'
		),

		array(
			'name'		=> esc_html__( 'Timetable', 'deep' ),
			'slug'		=> 'mp-timetable',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free',
		),

		array(
			'name'		=> esc_html__( 'Cf7 UI slider', 'deep' ),
			'slug'		=> 'cf7-ui-slider',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free',
		),
		// Woocommerce
		array(
			'name'		=> esc_html__( 'Woocommerce', 'deep' ),
			'slug'		=> 'woocommerce',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix19.jpg',
			'category'	=> 'free woocommerce',
		),
		array(
			'name'		=> esc_html__( 'Woocommerce', 'deep' ),
			'slug'		=> 'woocommerce',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix19.jpg',
			'category'	=> 'free woocommerce',
		),

		array(
			'name'		=> esc_html__( 'WooCommerce Services', 'deep' ),
			'slug'		=> 'woocommerce-services',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix19.jpg',
			'category'	=> 'free woocommerce',
		),
		
		array(
			'name'		=> esc_html__( 'Variation swatches for woocommerce', 'deep' ),
			'slug'		=> 'variation-swatches-for-woocommerce',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix20.jpg',
			'category'	=> 'free woocommerce',
		),
		
		array(
			'name'		=> esc_html__( 'YITH Woocommerce Wishlist', 'deep' ),
			'slug'		=> 'yith-woocommerce-wishlist',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix20.jpg',
			'category'	=> 'free woocommerce',
		),
		
		array(
			'name'		=> esc_html__( 'YITH Woocommerce Compare', 'deep' ),
			'slug'		=> 'yith-woocommerce-compare',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix20.jpg',
			'category'	=> 'free woocommerce',
		),
		
		array(
			'name'		=> esc_html__( 'YITH Woocommerce Quick View', 'deep' ),
			'slug'		=> 'yith-woocommerce-quick-view',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix20.jpg',
			'category'	=> 'free woocommerce',
		),
		
		array(
			'name'		=> esc_html__( 'YITH WooCommerce Best Sellers', 'deep' ),
			'slug'		=> 'yith-woocommerce-best-sellers',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix20.jpg',
			'category'	=> 'free woocommerce',
		),
		
		array(
			'name'		=> esc_html__( 'Contact Form 7', 'deep' ),
			'slug'		=> 'contact-form-7',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix22.jpg',
			'category'	=> 'free',
		),
		
		array(
			'name'		=> esc_html__( 'MailChimp for WordPress', 'deep' ),
			'slug'		=> 'mailchimp-for-wp',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix24.jpg',
			'category'	=> 'free',
		),
		
		array(
			'name'		=> esc_html__( 'WP PageNavi', 'deep' ),
			'slug'		=> 'wp-pagenavi',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free',
		),

		array(
			'name'		=> esc_html__( 'Image Hotspot by DevVN', 'deep' ),
			'slug'		=> 'devvn-image-hotspot',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free',
		),
		
		array(
			'name'		=> esc_html__( 'WP Cloudy', 'deep' ),
			'slug'		=> 'wp-cloudy',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free',
		),
		
		array(
			'name'		=> esc_html__( 'Post Rating', 'deep' ),
			'slug'		=> 'post-ratings',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free',
		),
		
		array(
			'name'		=> esc_html__( 'Deeper Comments', 'deep' ),
			'slug'		=> 'deeper-comments',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix05.jpg',
			'category'	=> 'free',
		),
		
		array(
			'name'		=> esc_html__( 'Social Count Plus', 'deep' ),
			'slug'		=> 'social-count-plus',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free',
		),

		array(
			'name'		=> esc_html__( 'TablePress', 'deep' ),
			'slug'		=> 'tablepress',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix42.jpg',
			'category'	=> 'free',
		),
		
		array(
			'name'		=> esc_html__( 'Slider Revolution', 'deep' ),
			'slug'		=> 'revslider',
			'source'	=> $plugin_url . '/deep-downloads/download.php?revslider',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix03.jpg',
			'category'	=> 'slider premium',
			'version'   => '6.2.22'
		),
		
		array(
			'name'		=> esc_html__( 'Webnus Recipes', 'deep' ),
			'slug'		=> 'webnus-recipes',
			'source'	=> $plugin_url . '/deep-downloads/download.php?webnus-recipes',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix17.jpg',
			'category'	=> 'webnus',
		),

		array(
			'name'		=> esc_html__( 'Webnus Review', 'deep' ),
			'slug'		=> 'webnus-review',
			'source'	=> $plugin_url . '/deep-downloads/download.php?webnus-review',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix45.jpg',
			'category'	=> 'webnus',
		),

		// Church
		array(
			'name'		=> 'Prayer Wall',
			'slug'		=> 'prayer-wall',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?prayer-wall',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix30.jpg',
			'category'	=> 'webnus',
		),
		array(
			'name'		=> 'Webnus Causes',
			'slug'		=> 'webnus-causes',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?webnus-causes',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix29.jpg',
			'category'	=> 'webnus',
		),
		array(
			'name'		=> 'Webnus Sermons',
			'slug'		=> 'webnus-sermons',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?webnus-sermons',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix28.jpg',
			'category'	=> 'webnus',
		),		

		array(
			'name'		=> 'WP Real Media Library',
			'slug'		=> 'real-media-library',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?real-media-library',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix39.jpg',
			'category'	=> 'premium',
			'version'   => '4.9.4'
		),

		array(
			'name'		=> 'Wordpress GDPR',
			'slug'		=> 'wordpress-gdpr',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?wordpress-gdpr',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix40.jpg',
			'category'	=> 'premium',
			'version'   => '1.9.5'
		),

		// buddypress
		array(
			'name'		=> esc_html__( 'Buddypress', 'deep' ),
			'slug'		=> 'buddypress',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix31.jpg',
			'category'	=> 'buddypress free',
		),
		array(
			'name'		=> esc_html__( 'bbpress', 'deep' ),
			'slug'		=> 'bbpress',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free',
		),
		array(
			'name'		=> esc_html__( 'bp default data', 'deep' ),
			'slug'		=> 'bp-default-data',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'buddypress free',
		),
		array(
			'name'		=> esc_html__( 'rtMedia for WordPress, BuddyPress and bbPress', 'deep' ),
			'slug'		=> 'buddypress-media',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix32.jpg',
			'category'	=> 'buddypress free',
		),
		array(
			'name'		=> esc_html__( 'bp profile search', 'deep' ),
			'slug'		=> 'bp-profile-search',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'buddypress free',
		),
		array(
			'name'		=> esc_html__( 'Buddy community stats', 'deep' ),
			'slug'		=> 'buddy-community-stats',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix32.jpg',
			'category'	=> 'buddypress free',
		),
		array(
			'name'		=> esc_html__( 'Buddypress follow', 'deep' ),
			'slug'		=> 'buddypress-followers',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix32.jpg',
			'category'	=> 'buddypress free',
		),
		array(
			'name'		=> esc_html__( 'Invite anyone', 'deep' ),
			'slug'		=> 'invite-anyone',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'buddypress free',
		),
		array(
			'name'		=> esc_html__( 'Social articles', 'deep' ),
			'slug'		=> 'social-articles',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'buddypress free',
		),
		array(
			'name'		=> esc_html__( 'Super socializer', 'deep' ),
			'slug'		=> 'super-socializer',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'buddypress free',
		),
		array(
			'name'		=> esc_html__( 'WP ulike', 'deep' ),
			'slug'		=> 'wp-ulike',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'buddypress free',
		),

		array(
			'name'		=> esc_html__( 'JetElements', 'deep' ),
			'slug'		=> 'jet-elements',
			'source'	=> $plugin_url . '/deep-downloads/download.php?jet-elements',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix50.jpg',
			'category'	=> 'builder premium',
			'version'   => '2.3.3'
		),

		array(
			'name'		=> esc_html__( 'JetMenu', 'deep' ),
			'slug'		=> 'jet-menu',
			'source'	=> $plugin_url . '/deep-downloads/download.php?jet-menu',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix51.jpg',
			'category'	=> 'builder premium',
			'version'   => '2.0.5'
		),

		array(
			'name'		=> esc_html__( 'JetBlog', 'deep' ),
			'slug'		=> 'jet-blog',
			'source'	=> $plugin_url . '/deep-downloads/download.php?jet-blog',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix52.jpg',
			'category'	=> 'builder premium',
			'version'   => '2.2.9'
		),

		array(
			'name'		=> esc_html__( 'JetTabs', 'deep' ),
			'slug'		=> 'jet-tabs',
			'source'	=> $plugin_url . '/deep-downloads/download.php?jet-tabs',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix53.jpg',
			'category'	=> 'builder premium',
			'version'   => '2.1.7'
		),

		array(
			'name'		=> esc_html__( 'JetReviews', 'deep' ),
			'slug'		=> 'jet-reviews',
			'source'	=> $plugin_url . '/deep-downloads/download.php?jet-reviews',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix54.jpg',
			'category'	=> 'builder premium',
			'version'   => '2.0.1'
		),

		array(
			'name'		=> esc_html__( 'JetTricks', 'deep' ),
			'slug'		=> 'jet-tricks',
			'source'	=> $plugin_url . '/deep-downloads/download.php?jet-tricks',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix55.jpg',
			'category'	=> 'builder premium',
			'version'   => '1.2.12'
		),

		array(
			'name'		=> esc_html__( 'JetWooBuilder', 'deep' ),
			'slug'		=> 'jet-woo-builder',
			'source'	=> $plugin_url . '/deep-downloads/download.php?jet-woo-builder',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix56.jpg',
			'category'	=> 'builder premium',
			'version'   => '1.6.5'
		),

		array(
			'name'		=> esc_html__( 'JetBlocks', 'deep' ),
			'slug'		=> 'jet-blocks',
			'source'	=> $plugin_url . '/deep-downloads/download.php?jet-blocks',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix57.jpg',
			'category'	=> 'builder premium',
			'version'   => '1.2.4'
		),

		array(
			'name'		=> esc_html__( 'JetEngine', 'deep' ),
			'slug'		=> 'jet-engine',
			'source'	=> $plugin_url . '/deep-downloads/download.php?jet-engine',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix58.jpg',
			'category'	=> 'builder premium',
			'version'   => '2.4.11'
		),

		array(
			'name'		=> esc_html__( 'JetPopup', 'deep' ),
			'slug'		=> 'jet-popup',
			'source'	=> $plugin_url . '/deep-downloads/download.php?jet-popup',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix59.jpg',
			'category'	=> 'builder premium',
			'version'   => '1.4.0'
		),

		array(
			'name'		=> esc_html__( 'WP Hotel Booking', 'deep' ),
			'slug'		=> 'wp-hotel-booking',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free hotel',
		),

		array(
			'name'		=> esc_html__( 'WP Hotel Booking Authorize Payment', 'deep' ),
			'slug'		=> 'wp-hotel-booking-authorize-payment',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free hotel',
		),

		array(
			'name'		=> esc_html__( 'WP Hotel Booking Block Room', 'deep' ),
			'slug'		=> 'wp-hotel-booking-block-room',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free hotel',
		),

		array(
			'name'		=> esc_html__( 'WP Hotel Booking Coupon', 'deep' ),
			'slug'		=> 'wp-hotel-booking-coupon',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free hotel',
		),

		array(
			'name'		=> esc_html__( 'WP Hotel Booking Report', 'deep' ),
			'slug'		=> 'wp-hotel-booking-report',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free hotel',
		),

		array(
			'name'		=> esc_html__( 'WP Hotel Booking Room', 'deep' ),
			'slug'		=> 'wp-hotel-booking-booking-room',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free hotel',
		),

		array(
			'name'		=> esc_html__( 'WP Hotel Booking Stripe Payment', 'deep' ),
			'slug'		=> 'wp-hotel-booking-stripe-payment',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free hotel',
		),

		array(
			'name'		=> esc_html__( 'WP Hotel Booking WooCommerce', 'deep' ),
			'slug'		=> 'wp-hotel-booking-woocommerce',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free hotel',
		),

		array(
			'name'		=> esc_html__( 'WP Hotel Booking WPML Support', 'deep' ),
			'slug'		=> 'wp-hotel-booking-wpml-support',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free hotel',
		),

		array(
			'name'		=> esc_html__( 'Polylang', 'deep' ),
			'slug'		=> 'polylang',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free',
		),

		array(
			'name'		=> esc_html__( 'LifterLMS', 'deep' ),
			'slug'		=> 'lifterlms',
			'required'	=> false,
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix21.jpg',
			'category'	=> 'free',
		),

		array(
			'name'		=> 'MEC Fluent-view Layouts',
			'slug'		=> 'mec-fluent-layouts',
			'required'	=> false,
			'source'	=> $plugin_url . '/deep-downloads/download.php?mec-fluent-layouts',
			'image_src'	=> get_template_directory_uri() . '/inc/plugins/plugin-activator/images/dp-admin-plugins-pix62.jpg',
			'category'	=> 'webnus',
			'version'   => '1.1.0'
		),
		
		
	);
	
	
	$config = array(
		'id'			=> 'tgmpa',					// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	=> '',						// Default absolute path to bundled plugins.
		'menu'			=> 'tgmpa-install-plugins',	// Menu slug.
		'parent_slug'	=> 'themes.php',			// Parent menu slug.
		'capability'	=> 'edit_theme_options',	// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	=> false,					// Show admin notices or not.
		'dismissable'	=> true,					// If false, a user cannot dismiss the nag message.
		'dismiss_msg'	=> '',						// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	=> true,					// Automatically activate plugins after installation or not.
		'message'		=> '',						// Message to output right before the plugins table.
	);
	
	tgmpa( $plugins, $config );
	
}
if(function_exists('vc_set_as_theme')) vc_set_as_theme( $disable_updater = true );
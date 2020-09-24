<?php

if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

	
	
	$vc_directory	= DEEP_CORE_DIR . 'visualcomposer';

	vc_set_shortcodes_templates_dir( $vc_directory . '/vc_templates' );

	// load webnus shortcodes vc_maps
	$files = glob( $vc_directory . '/shortcodes/*.php' );
	foreach ( $files as $file ) :
		if ( __FILE__ != basename( $file ) ) {
			include_once $file;
		}
	endforeach;

	// load webnus shortcodes vc_maps
	$files = glob( $vc_directory . '/widgets/*.php' );
	foreach ( $files as $file ) :
		if ( __FILE__ != basename( $file ) ) {
			include_once $file;
		}
	endforeach;

	// load WPBakery Page Builder vc_maps
	$files = glob( $vc_directory . '/setup/*.php' );
	foreach ( $files as $file ) :
		if ( __FILE__ != basename( $file ) ) {
			include_once $file;
		}
	endforeach;

	// load imageselect param
	include_once $vc_directory . '/params/imageselect/imageselect-param.php';
	// load category param
	include_once $vc_directory . '/params/category/category-param.php';
	// load text param
	include_once $vc_directory . '/params/text/text-param.php';
	// load radio param
	include_once $vc_directory . '/params/radio/radio-param.php';
	// load disable param
	include_once $vc_directory . '/params/disable/disable-param.php';


	// frontend scripts
	add_action( 'wp_enqueue_scripts', 'deep_setup_assets' );
	function deep_setup_assets() {
		wp_deregister_style( 'js_composer_custom_css' );
		wp_dequeue_style( 'js_composer_custom_css' );

	}
	remove_action( 'admin_init', 'vc_page_welcome_redirect' );
	if ( function_exists('vc_set_default_editor_post_types') ) {
		vc_set_default_editor_post_types( array( 'page', 'post', 'mega_menu', 'wbf_footer' ) );
	}
}

// admin scripts
add_action( 'admin_enqueue_scripts','deep_setup_admin_assets' );

function deep_setup_admin_assets() {
	wp_enqueue_style( 'webnus_js_composer', DEEP_CORE_URL . 'visualcomposer/assets/webnus_js_composer.css', false, false, false );
	wp_deregister_style( 'font-awesome' );
	wp_enqueue_style( 'font-awesome' );	
}

// compatiblity with ultimate WPBakery Page Builder add-on
function deep_vc_ultimate_compatiblity() {
    if ( class_exists( 'VC_Ultimate_Parallax' ) ) {
        $ultimate_row = get_option('ultimate_row');
        if ( $ultimate_row == 'enable' ) {
            // remove VC_Ultimate options from vc_row
            update_option( 'ultimate_row', 'disable' );
        }
    }
}
add_action( 'admin_init', 'deep_vc_ultimate_compatiblity' );
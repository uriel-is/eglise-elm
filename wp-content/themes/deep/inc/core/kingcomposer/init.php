<?php
if ( is_plugin_active('kingcomposer/kingcomposer.php') ) {
    $king_directory = get_template_directory() . '/inc/core/kingcomposer';
    
    // load webnus kc_maps
    $files = glob( $king_directory . '/shortcodes/*.php' );
    foreach ( $files as $file ) :
        if ( __FILE__ != basename( $file ) ) {
            include_once $file;
        }
    endforeach;

    $files_shortcode = glob( $king_directory . '/setup/*.php' );
    foreach ( $files_shortcode as $file_shortcode ) :
        if ( __FILE__ != basename( $file_shortcode ) ) {
            include_once $file_shortcode;
        }
    endforeach;


    // load category param
    include_once $king_directory . '/params/category/category-param.php';
    include_once $king_directory . '/params/note/note-param.php';

    delete_option( 'kc_do_activation_redirect' );

    // Activate kc editor for footer and mega menu
    add_action('init', 'deep_kc_custom_post_type_support', 99 );
    function deep_kc_custom_post_type_support(){
        global $kc;
        $kc->add_content_type( 'mega_menu' );
        $kc->add_content_type( 'wbf_footer' );
        $kc->add_content_type( 'gallery' );
        $kc->add_content_type( 'portfolio' );
    }
}

if ( is_plugin_active( 'kc_pro/kc_pro.php' ) ) {
    remove_action( 'admin_init', 'kc_pro_admin_init' );
}
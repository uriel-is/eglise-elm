<?php
/**
 * Deep Theme.
 * 
 * The template for displaying all pages
 *
 * @since   1.0.0
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WN_Page' ) ) {
    require get_template_directory() . '/page.php';
	WN_Page::get_instance();
}

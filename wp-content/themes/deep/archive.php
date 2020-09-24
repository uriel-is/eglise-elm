<?php
/**
 * Deep Theme.
 * 
 * The template for displaying archive pages
 *
 * @since   1.0.0
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
require get_template_directory() . '/index.php';
WN_Index::$instance;
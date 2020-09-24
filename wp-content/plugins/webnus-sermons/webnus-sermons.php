<?php

/*
Plugin Name: Webnus Sermons
Description: Webnus Sermons plugin is a wordpress plugin designed to create Sermons in to your wordpress website.
Version: 1.2.1
Author: Webnus
Author URI: http://webnus.net
License: GPL2
*/

define('SERMONS_DIR', dirname(__FILE__));
define('SERMONS_THEMES_DIR', SERMONS_DIR . "/themes");
define('SERMONS_URL', WP_PLUGIN_URL . "/" . basename(SERMONS_DIR));
define('W_SERMONS_VERSION', '1.2');

//Method And Action Are Call
add_filter('manage_edit-sermon_columns', 'w_add_new_sermon_columns');
add_action('manage_sermon_posts_custom_column', 'w_manage_sermon_columns', 5, 2);
add_action('init', 'w_sermon_register');

//Register Post Type
function w_sermon_register() {
    $labels = array(
        'name' => __('Sermons', 'deep'),
        'all_items' => __('All Sermons', 'deep'),
        'singular_name' => __('Sermon', 'deep'),
        'add_new' => __('Add Sermon', 'deep'),
        'add_new_item' => __('Add New Sermon', 'deep'),
        'edit_item' => __('Edit Sermon', 'deep'),
        'new_item' => __('New Sermon', 'deep'),
        'view_item' => __('View Sermon', 'deep'),
        'search_items' => __('Search Sermon', 'deep'),
        'not_found' => __('No Sermon found', 'deep'),
        'not_found_in_trash' => __('No Item found in Trash', 'deep'),
        'parent_item_colon' => '',
        'menu_name' => __('Sermons', 'deep')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'sermon'),
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'page-attributes',
            'excerpt',
            'comments',
        ),
        'menu_position' => 23,
        'menu_icon' => 'dashicons-money',
        'taxonomies' => array('sermon_category', 'deep')
    );
    register_post_type('sermon', $args);
    w_sermon_register_taxonomies();
}

//Register Taxonomies
function w_sermon_register_taxonomies() {
    register_taxonomy('sermon_category', 'sermon',
    array(
    'hierarchical' => true,
    'label' => 'Sermon Categories',
    'query_var' => true,
    'rewrite' => array('slug' => 'sermon-category')
    ));

    $labels = array(
            'name'                  => __('Sermon Speakers', 'deep'),
            'singular_name'         => __('Sermon Speaker',  'deep'),
            'search_items'          => __('Search Sermon Speaker', 'deep'),
            'popular_items'         => __('Popular Sermons Speakers', 'deep'),
            'all_items'             => __('All Sermons Speakers', 'deep'),
            'parent_item'           => null,
            'parent_item_colon'     => null,
            'edit_item'             => __('Edit Sermons Speaker', 'deep'),
            'update_item'           => __('Update Sermons Speaker', 'deep'),
            'add_new_item'          => __('Add New Sermons Speaker', 'deep'),
            'new_item_name'         => __('New Sermons Speaker Name', 'deep'),
            'add_or_remove_items'   => __('Add or remove Sermons Speakers', 'deep'),
            'choose_from_most_used' => __('Choose from the most used Sermons Speakers', 'deep'),
            'separate_items_with_commas' => __('Separate Sermons Speakers with commas', 'deep'),
        );
    register_taxonomy('sermon_speaker', 'sermon',
    array(
    'hierarchical' => true,
    'labels' => $labels,
    'query_var' => true,    'rewrite' => array('slug' => 'sermon-speaker')
    ));

    register_taxonomy('sermon_tag', 'sermon', array(
        'hierarchical' => false,
        'label' => "Sermon Tags",
        'rewrite' => true,
        'query_var' => true
        )
    );
    $labels_series = array(
        'name'                  => __('Sermon Series', 'deep'),
        'singular_name'         => __('Sermon Series',  'deep'),
        'search_items'          => __('Search Sermon Series', 'deep'),
        'popular_items'         => __('Popular Sermons Series', 'deep'),
        'all_items'             => __('All Sermons Series', 'deep'),
        'parent_item'           => null,
        'parent_item_colon'     => null,
        'edit_item'             => __('Edit Sermons Series', 'deep'),
        'update_item'           => __('Update Sermons Series', 'deep'),
        'add_new_item'          => __('Add New Sermons Series', 'deep'),
        'new_item_name'         => __('New Sermons Series Name', 'deep'),
        'add_or_remove_items'   => __('Add or remove Sermons Series', 'deep'),
        'choose_from_most_used' => __('Choose from the most used Sermons Series', 'deep'),
        'separate_items_with_commas' => __('Separate Sermons Series with commas', 'deep'),
    );
    register_taxonomy('sermon_series', 'sermon', array(
        'hierarchical' => true,
        'labels' => $labels_series,
        'rewrite' => true,
        'query_var' => true
    )
    );


    }

//Admin Dashobord Listing Sermon Columns Title
function w_add_new_sermon_columns() {
    $columns['cb'] = '<input type="checkbox" />';
    $columns['title'] = __('Title', 'deep');
    $columns['sermon_category'] = __('Categories', 'deep' );
    $columns['sermon_speaker'] = __('Speakers', 'deep' );
    $columns['sermon_tag'] = __('Tags', 'deep' );
    $columns['sermon_series'] = __('Series', 'deep' );
    $columns['date'] = __('Date', 'deep');
    return $columns;
}

//Admin Dashobord Listing Sermon Columns Manage
function w_manage_sermon_columns($columns) {
    global $post;
    switch ($columns) {
    case 'sermon_category':
        $terms = wp_get_post_terms($post->ID, 'sermon_category');
        foreach ($terms as $term) {
            echo $term->name .'&nbsp;&nbsp; ';
        }
    break;
        case 'sermon_speaker':
        $terms = wp_get_post_terms($post->ID, 'sermon_speaker');
        foreach ($terms as $term) {
            echo $term->name .'&nbsp;&nbsp; ';
        }
break;
        case 'sermon_tag':
        $terms = wp_get_post_terms($post->ID, 'sermon_tag');
        foreach ($terms as $term) {
            echo $term->name .'&nbsp;&nbsp; ';
        }
break;
        case 'sermon_series':
        $terms = wp_get_post_terms($post->ID, 'sermon_series');
        foreach ($terms as $term) {
            echo $term->name .'&nbsp;&nbsp; ';
        }


    break;
    }
}
?>

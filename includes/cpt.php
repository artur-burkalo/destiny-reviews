<?php
if (!defined('WPINC'))
{
    die; // Abort if accessed directly
    
}

function destiny_reviews_post()
{
    $labels = array(
        'name' => _x('Destiny Reviews', 'Post Type General Name', 'twentytwenty') ,
        'singular_name' => _x('Review', 'Post Type Singular Name', 'twentytwenty') ,
        'menu_name' => __('Destiny Reviews', 'twentytwenty') ,
        'parent_item_colon' => __('Parent Review', 'twentytwenty') ,
        'all_items' => __('All Reviews', 'twentytwenty') ,
        'view_item' => __('View Review', 'twentytwenty') ,
        'add_new_item' => __('Add New Review', 'twentytwenty') ,
        'add_new' => __('Add New Review', 'twentytwenty') ,
        'edit_item' => __('Edit Review', 'twentytwenty') ,
        'update_item' => __('Update Review', 'twentytwenty') ,
        'search_items' => __('Search Review', 'twentytwenty') ,
        'not_found' => __('Not Found', 'twentytwenty') ,
        'not_found_in_trash' => __('Not found in Trash', 'twentytwenty') ,
        'featured_image' => __('Client image', 'twentytwenty') ,
        'set_featured_image' => __('Set client image', 'twentytwenty') ,
        'remove_featured_image' => __('Remove client image', 'twentytwenty') ,
        'use_featured_image' => __('Use as client image', 'twentytwenty') ,
    );
    $args = array(
        'label' => __('destiny_reviews', 'twentytwenty') ,
        'description' => __('Destiny Reviews', 'twentytwenty') ,
        'labels' => $labels,
        'supports' => array(
            'title',
            'thumbnail'
        ) ,
        'hierarchical' => false,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => true,
        'menu_position' => 6,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-format-chat',
        'show_in_rest' => true,

    );
    register_post_type('destiny_reviews', $args);

}
add_action('init', 'destiny_reviews_post', 0);

function destiny_reviews_post_submenu()
{
    //stylees
    add_submenu_page('edit.php?post_type=destiny_reviews', 'Custom Style for Manual Reviews', 'Custom Style', 'manage_options', 'destiny_review_style', 'destiny_reviews_style_render_page');
    add_submenu_page('edit.php?post_type=destiny_reviews', 'Form Settings', 'Form Settings', 'manage_options', 'destiny_review_form', 'destiny_reviews_form_render_page');
    add_action('admin_init', 'register_dr_settings');
}
add_action('admin_menu', 'destiny_reviews_post_submenu');
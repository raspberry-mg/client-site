<?php
/**
 * Register a Custom post type
 * movies
 */

add_action( 'init', 'custom_movies' );

function custom_movies() {
    $labels = array(
        'name' => __( 'Movies' ),
        'singular_name' => __( 'Movie' ),
        'add_new' => __( 'New Movies' ),
        'add_new_item' => __( 'Add New Movie' ),
        'edit_item' => __( 'Edit Movie' ),
        'new_item' => __( 'New Movie' ),
        'view_item' => __( 'View Movie' ),
        'search_items' => __( 'Search Movie' ),
        'not_found' =>  __( 'No Movie Found' ),
        'not_found_in_trash' => __( 'No Movie found in Trash' ),
    );
    $args = array(
        'labels' => $labels,
        'menu_icon'	     => 'dashicons-video-alt2',
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title','editor','thumbnail', 'excerpt'),
    );

    register_post_type( 'movies', $args );
}




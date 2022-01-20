<?php

return [
    [
        'name' => 'blog',
        'args'  =>  [     'labels' => array(
            'name' => __( 'Movies', THEME_FN_TEXT_DOMAIN ),
            'singular_name' => __( 'Movie', THEME_FN_TEXT_DOMAIN),
            'add_new' => __( 'New Movies', THEME_FN_TEXT_DOMAIN),
            'add_new_item' => __( 'Add New Movie', THEME_FN_TEXT_DOMAIN),
            'edit_item' => __( 'Edit Movie', THEME_FN_TEXT_DOMAIN),
            'new_item' => __( 'New Movie', THEME_FN_TEXT_DOMAIN),
            'view_item' => __( 'View Movie', THEME_FN_TEXT_DOMAIN),
            'search_items' => __( 'Search Movie', THEME_FN_TEXT_DOMAIN),
            'not_found' =>  __( 'No Movie Found', THEME_FN_TEXT_DOMAIN),
            'not_found_in_trash' => __( 'No Movie found in Trash', THEME_FN_TEXT_DOMAIN),
        ),
            'menu_icon'	     => 'dashicons-video-alt2',
            'has_archive' => true,
            'public' => true,
            'hierarchical' => false,
            'menu_position' => 5,
            'supports' => array('title','editor','thumbnail', 'excerpt')
        ]
    ]
];
<?php

namespace client_site\classes\modules;

class CustomFilterCPT{

    public function __construct(){
        add_action( 'pre_get_posts', [ $this, 'custom_movie_filter' ] );
    }

/**
* Filrer for movie
*/
    public function custom_movie_filter( \WP_Query $query ) {
        if ( is_admin() || ! $query->is_post_type_archive( 'movies' ) || ! $query->is_main_query() ) {
            return;
        }

        $search        = filter_input( INPUT_GET, 'filter_search', FILTER_SANITIZE_STRING );
        $meta_query = [];

        if ( $search ) {
            $query->set( 's', $search );
        }

        if ( $meta_query ) {
            $query->set( 'meta_query', $meta_query );
        }
    }
}
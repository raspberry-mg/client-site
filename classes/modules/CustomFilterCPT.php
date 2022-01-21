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
      //code...
    }
}
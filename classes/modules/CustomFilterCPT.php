<?php
/**
 * Class custom filter for custom post type
 *
 * @package WordPress
 * @subpackage Client_theme
 * @since Client theme 1.0
 */

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

        if ( $_REQUEST[ 'sorting' ] === 'AZ' ) {
            $query->set( 'order' , 'ASC');
            $query->set( 'orderby' , 'title');
        }

        if ( $_REQUEST[ 'sorting' ] === 'release_new') {
            $query->set( 'order' , 'DESC' );
            $query->set( 'orderby' , 'date' );
        }

        if ( $_REQUEST[ 'sorting' ] === 'release_old' ) {
            $query->set( 'order' , 'ASC' );
            $query->set( 'orderby' , 'date' );
        }

        if ( $meta_query ) {
            $query->set( 'meta_query', $meta_query );
        }
    }
}
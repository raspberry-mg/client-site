<?php
/**
 * Functions
 *
 * We have functions wrapped in classes and distributed as modules and standard theme settings
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/* INCLUDE */
include 'classes/theme/DefaultFunctionsTheme.php';
include 'classes/modules/CustomFilterCPT.php';
include 'classes/modules/RegisterCPT.php';
include 'classes/modules/API.php';
include 'classes/modules/CustomPagination.php';
//include 'classes/modules/AddPost.php';

/* NEW classes */
new client_site\classes\theme\DefaultFunctionsTheme();
new client_site\classes\modules\CustomFilterCPT();
new  client_site\classes\modules\RegisterCPT();
new \client_site\classes\modules\CustomPagination();
use client_site\classes\modules\API;
//new \client_site\classes\modules\AddPost;


add_action('customAddContent', 'addedPost');


function addedPost()
{
    global $wpdb;
    $array = ( new API )->request();
    foreach ( $array as $films_cluster ) {
        $films = $films_cluster->data;
        foreach ( $films as $film ) {
            $check = $wpdb->get_results( " SELECT ID FROM wp_posts where post_title = '$film->title' " );
            foreach ( $check as $ch ) {
                if ( isset ( $ch->ID ) )
                {

                    $update = array(
                        'ID' => $ch->ID,
                        'post_author' => 1,
                        'post_title' => $film->title,
                        'post_content' => $film->description,
                        'post_status' => 'publish',
                        'post_type' => 'movies',
                        'meta_input' => [
                            'url_img' => $film->poster_path,
                            'IDBM' => $film->vote_average,
                            'Time' => $film->release_date]
                    );
                    wp_insert_post( $update );
                }

                else{
                    $defaults = array(
                        'post_author' => 1,
                        'post_title' => $film->title,
                        'post_content' => $film->description,
                        'post_status' => 'publish',
                        'post_type' => 'movies',
                        'meta_input' => [
                            'url_img' => $film->poster_path,
                            'IDBM' => $film->vote_average,
                            'Time' => $film->release_date
                        ]
                    );
                    wp_insert_post( $defaults );
                }
            }
        }
    }
 }




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

/* NEW classes */
new client_site\classes\theme\DefaultFunctionsTheme();
new client_site\classes\modules\CustomFilterCPT();
new  client_site\classes\modules\RegisterCPT();
new \client_site\classes\modules\CustomPagination();
use client_site\classes\modules\API;

add_action('customAddContent', addedPost());

function addedPost(){
    $array = (new API) -> request();

    $films = $array->data;
    foreach($films as $film){
        $defaults = array(
            'post_author'   => 1,
            'post_title'    => $film->title,
            'post_content'  => $film->description,
            'post_status'   => 'publish',
            'post_type'     => 'movies',
            'meta_input'    => ['url_img'   => $film->poster_path,
                                'IDBM'      => $film->vote_average]

        );
        $id = wp_insert_post($defaults);
    }
}

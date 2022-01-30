<?php
/**
 * Class AddPost
 *
 * @package WordPress
 * @subpackage Client_theme
 * @since Client theme 1.0
 */

namespace client_site\classes\modules;
//add_action('customAddContent', addedPost());
class AddPost {

    public function addedPost()
    {
        $array = (new API)->request();
        foreach ($array as $films_cluster) {
            $films = $films_cluster->data;
            foreach ($films as $film) {
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
                $id = wp_insert_post($defaults);
            }
        }
    }
}
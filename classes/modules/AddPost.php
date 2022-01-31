<?php
/**
 * Class AddPost
 *
 * @package WordPress
 * @subpackage Client_theme
 * @since Client theme 1.0
 */

namespace client_site\classes\modules;

class AddPost
{

    public function __construct()
    {
        add_action('customAddContent', [ $this, 'addedPost' ]);
    }

    public function addedPost()
    {
        global $wpdb;
        $array = (new API)->request();
        foreach ($array as $films_cluster) {
            $films = $films_cluster->data;
            foreach ($films as $film) {
                $check = $wpdb->get_results("SELECT ID FROM wp_posts where post_title = '$film->title'");
                foreach ($check as $ch) {}
                    if (isset ($ch->ID)) {
                        $update = array(
                            'ID' => $ch->ID,
                            'post_author' => 1,
                            'post_title' => $film->title,
                            'post_content' => $film->description,
                            'post_status' => 'publish',
                            'post_type' => 'movies',
                            'meta_input' => [
                                'poster_path' => 'https://image.tmdb.org/t/p/w500'. $film->poster_path,
                                'vote_average' => $film->vote_average,
                                'release_date' => $film->release_date
                            ]
                        );
                        wp_insert_post($update);
                    } else {
                        $defaults = array(
                            'post_author' => 1,
                            'post_title' => $film->title,
                            'post_content' => $film->description,
                            'post_status' => 'publish',
                            'post_type' => 'movies',
                            'meta_input' => [
                                'poster_path' => 'https://image.tmdb.org/t/p/w500'. $film->poster_path,
                                'vote_average' => $film->vote_average,
                                'release_date' => $film->release_date
                            ]
                        );
                        wp_insert_post($defaults);
                }
            }
        }
    }
}
<?php
/**
 * Class API
 *
 * @package WordPress
 * @subpackage Client_theme
 * @since Client theme 1.0
 */

namespace client_site\classes\modules;

class API {

	public function request() {
	    $films = [];

        $response = wp_remote_get( ( 'http://api-laravel.backend-education.hulk.nixdev.co/api/v1/films?page=1' ),
            [ 'headers' =>
                [
                    'Authorization' => 'Bearer 1|6OH3e0SWcrWhRB7dr5Fcs3fSNlZLsDxmqyPIJZup'
                ]
            ]
        );

        $response = json_decode($response['body']);

        //TODO: ADD $response->last_page AFTER CRON IS DONE

	    for($i = 2; $i < 10; $i++){
            $response = wp_remote_get( ( 'http://api-laravel.backend-education.hulk.nixdev.co/api/v1/films?page='.$i ),
                [ 'headers' =>
                    [
                        'Authorization' => 'Bearer 1|6OH3e0SWcrWhRB7dr5Fcs3fSNlZLsDxmqyPIJZup'
                    ]
                ]
            );
            $films[] = json_decode( $response['body'] );
        }


		return $films;
	}
}
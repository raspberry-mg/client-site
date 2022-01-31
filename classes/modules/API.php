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
	private function getApiKey(){
		$api_key = get_field( 'api_key', 'option' );
		$api_key = strtolower( $api_key );

		return $api_key;
	}


	public function request() {
	    $films = [];

        $response = wp_remote_get( ( 'http://api-laravel.backend-education.hulk.nixdev.co/api/v1/films?page=1' ),
            [ 'headers' =>
                [
                    'Authorization' => 'Bearer ' . $this->getApiKey()
                ]
            ]
        );

        $response = json_decode($response['body']);

        //TODO: ADD $response->last_page AFTER CRON IS DONE

	    for($i = 1; $i < 100; $i++){
            $response = wp_remote_get( ( 'http://api-laravel.backend-education.hulk.nixdev.co/api/v1/films?page='.$i ),
                [ 'headers' =>
                    [
                        'Authorization' => 'Bearer ' . $this->getApiKey()
                    ]
                ]
            );

            $films[] = json_decode( $response['body'] );

        }

		return $films;

	}
}
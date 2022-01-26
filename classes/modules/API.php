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
	//DEMO

	public function request( $page ) {
		$response = wp_remote_get( ( 'http://api-laravel.backend-education.hulk.nixdev.co/api' ),
			[ 'body' =>
				  [
//					  'api_key' => $this->api_key,
//					  'page' => $page
				  ]
			]
		);
		return json_decode( $response['body'] );
	}
}
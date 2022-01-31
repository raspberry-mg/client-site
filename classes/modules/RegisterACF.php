<?php
/**
 * Register ACF
 *
 * @package WordPress
 * @subpackage Client_theme
 * @since Client theme 1.0
 */

namespace client_site\classes\modules;

class RegisterACF {

	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_option_pages' ] );
	}


	/**
	 * Pages ACF
	 */
	public function register_option_pages() {
		$config = $this->get_option_pages_config();

		foreach ( $config as $page ) {
			acf_add_options_page( $page );
		}
	}

	private function get_option_pages_config(): array {
		return include get_template_directory() . '/custom-config/CustomPagesACF.php';
	}

}
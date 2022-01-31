<?php
/**
 * Config file to add custom page ACF
 *
 * @package WordPress
 * @subpackage Client_theme
 * @since Client theme 1.0
 */

return [
	[
		'page_title' => __( 'Cron setting', THEME_FN_TEXT_DOMAIN ),
		'menu_title' => __( 'Cron setting', THEME_FN_TEXT_DOMAIN ),
		'menu_slug'  => 'cron_setting',
		'capability' => 'edit_posts',
		'redirect'   => false,
	],
];
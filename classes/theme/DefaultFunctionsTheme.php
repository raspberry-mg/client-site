<?php

namespace client_site\classes;

class DefaultFunctionsTheme
{
    public function __construct(){
        $this->my_constants();

        add_theme_support( 'post-thumbnails' );

        add_action( 'wp_enqueue_scripts', [ $this, 'load_style_script' ]);
        add_action( 'after_setup_theme', [ $this, 'theme_register_nav_menu' ]);
    }

    /**
     * Register CONST for lang-func
     */
    public function my_constants(){
        $cur_theme = wp_get_theme();

        define( 'THEME_FN_VERSION', $cur_theme->get( 'Version' ) );
        define( 'THEME_FN_TEXT_DOMAIN', $cur_theme->get( 'TextDomain' ) );
    }

    /**
     * Script_load
     */
    public function load_style_script ()
    {
        /**
         * Styles
         */
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', THEME_FN_VERSION);
        wp_enqueue_style('app' , get_template_directory_uri() . '/assets/css/app.css', THEME_FN_VERSION);
        wp_enqueue_style('carousel' , get_template_directory_uri() . '/assets/css/carousel.css', THEME_FN_VERSION);
        wp_enqueue_style('headers' , get_template_directory_uri() . '/assets/css/headers.css', THEME_FN_VERSION);
        wp_enqueue_style('footers', get_template_directory_uri() . '/assets/css/footers.css', THEME_FN_VERSION);

        /**
         * Scripts
         */
        wp_enqueue_script('bootstrap_b', get_template_directory_uri() . '/assets/js/app.js');
        wp_enqueue_script('bootstrap_b', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js');
    }

    /**
     * Menu
     */
    public function theme_register_nav_menu() {
        register_nav_menu( 'primary', 'Primary Menu' );
    }

}
<?php

namespace client_site\classes\theme;

class DefaultFunctionsTheme
{
    public function __construct()
    {
        $this->my_constants();

        add_theme_support('post-thumbnails');

        add_action('wp_enqueue_scripts', [$this, 'load_style_script']);
        add_action('after_setup_theme', [$this, 'theme_register_nav_menu']);
        add_action('numeric_pagination', 'client_site\classes\theme\DefaultFunctionsTheme::numeric_pagination');
        //add_action('init', [$this, 'read_api']);
        add_action('update_movies_hook', [$this, 'update_movies'], 10, 3);
        //wp_schedule_event(time(), 'daily', 'daily_movies_hook');

        add_filter('cron_schedules', [$this, 'update_minute']);
        // time() - текущее время в UNIX-формате, то есть в первый раз задача выполнится моментально
        if (!wp_next_scheduled('update_movies_hook')) {
            wp_schedule_event(time(), 'minute', 'update_movies_hook');
        }
        $response_body = json_decode(wp_remote_retrieve_body(wp_remote_get("http://api-laravel.backend-education.hulk.nixdev.co/api/v1/films?page=1")));
        //echo " rb: ";
        //print_r($response_body);

    }

    /**
     * Register CONST for lang-func
     */
    public function my_constants()
    {
        $cur_theme = wp_get_theme();

        define('THEME_FN_VERSION', $cur_theme->get('Version'));
        define('THEME_FN_TEXT_DOMAIN', $cur_theme->get('TextDomain'));
    }

    /**
     * Script_load
     */
    public function load_style_script()
    {
        /**
         * Styles
         */
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', THEME_FN_VERSION);
        wp_enqueue_style('app', get_template_directory_uri() . '/assets/css/app.css', THEME_FN_VERSION);
        wp_enqueue_style('carousel', get_template_directory_uri() . '/assets/css/carousel.css', THEME_FN_VERSION);
        wp_enqueue_style('headers', get_template_directory_uri() . '/assets/css/headers.css', THEME_FN_VERSION);
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
    public function theme_register_nav_menu()
    {
        register_nav_menu('primary', 'Primary Menu');
    }

    /**
     * CSS Numbered Pagination
     */

    public static function numeric_pagination()
    {

        global $wp_query;

        if ($wp_query->max_num_pages <= 1) {
            return;
        }

        $big = 999999999; // need an unlikely integer

        $pages = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'type' => 'array',
            'prev_text' => __('&larr; Previous '),
            'next_text' => __(' Next &rarr;'),
            'before_page_number' => '&nbsp',
            'after_page_number' => '&nbsp',
        ));
        if (is_array($pages)) {
            $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
            echo '<div class="pagination-wrap mb-4 mt-4"><ul class="pagination justify-content-center mb-4 mt-4">';
            foreach ($pages as $page) {
                $page = preg_replace('/<a .*?class="(.*?)" href="(.*?)">(.*?)<\/a>/', '<a class="page-link" href="$2">$3</a>', $page);
                $page = preg_replace('/<span .*?class="(.*?)">(.*?)<\/span>/', '<span class="page-link" style="color: black;">$2</span>', $page);
                if (strstr($page, "span")) {
                    echo "<li class='page-item active'>$page</li>";
                } else {
                    echo "<li class='page-item'>$page</li>";
                }

            }
            echo '</ul></div>';
        }
    }
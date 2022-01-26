<?php

namespace client_site\classes\modules;

class CustomPagination
{
    public function __construct()
    {
        add_action('numeric_pagination', 'client_site\classes\modules\CustomPagination::numeric_pagination');
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
}
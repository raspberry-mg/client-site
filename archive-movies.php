<?php
/**
 * The template for displaying archive movies pages
 *
 * @package WordPress
 * @subpackage Client_theme
 * @since Client theme 1.0
 */

get_header();

?>
<style>
img.attachment-post-thumbnail.size-post-thumbnail.wp-post-image {
    height: auto;
    width: auto;
}
</style>
<main>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-3">
                <div class="position-sticky" style="top: 2rem;">
                    <?php get_template_part('template-parts/filter/movie-sort') ?>
                    <?php get_template_part('template-parts/filter/movie-filter') ?>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <div class="col">
                        <a style="text-decoration: none; color: black;" href="<?php the_permalink(); ?>">
                            <div class="card shadow-sm">
                                <?php the_post_thumbnail(); ?>
                                <div class="card-body">
                                    <h3 class="mb-0"><?php the_title(); ?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endwhile;endif; ?>
                </div>
            </div>
            <?php
do_action('numeric_pagination');
?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
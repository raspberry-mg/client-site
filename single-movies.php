<?php
/**
 * The template for displaying all single movie posts
 *
 * @package WordPress
 * @subpackage Client_theme
 * @since Client theme 1.0
 */

get_header(); ?>
<div class="container">
  <div class="row py-5">

    <div class="col-md-8">
      <div class="row">
        <div class="col-md-4">
            <img width="230px" src="https://image.tmdb.org/t/p/w500/<?php echo get_post_meta( the_ID(), 'poster_path' ); ?>">
        </div>
        <div class="col-md-8">
          <h1 class="fw-bold"> <?php the_title(); ?></h1>
          <p class="blog-post-meta">
                        <span class="fw-bold ">
                            IMDb:
                        </span>
	          <?php echo get_post_meta( the_ID(), 'vote_average' ); ?>
          </p>
          <p class="blog-post-meta">
                        <span class="fw-bold">
                            Release:
                        </span>
	          <?php echo get_post_meta( the_ID(), 'release_date' ); ?>
          </p>
        </div>
      </div>
      <div>
        <h2 class="pt-2">Description:</h2>
        <?php the_content(); ?>
      </div>
    </div>

  </div>
</div>
<?php get_footer(); ?>

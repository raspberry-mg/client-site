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
	        <?php $image = get_post_meta( get_the_ID(), 'url_img' );  ?>
            <img width="100%" src="https://image.tmdb.org/t/p/w500/<?php echo $image[0];?>">
        </div>
        <div class="col-md-8">
          <h1 class="fw-bold"> <?php the_title(); ?></h1>
          <p class="blog-post-meta">
                        <span class="fw-bold ">
                            IMDb:
                        </span>
	          <?php $IDBM = get_post_meta( get_the_ID(), 'IDBM' ); echo $IDBM[0];?>
          </p>
          <p class="blog-post-meta">
                        <span class="fw-bold">
                            Release:
                        </span>
	          <?php $release = get_post_meta( get_the_ID(), 'Time' ); echo $release[0]; ?>
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

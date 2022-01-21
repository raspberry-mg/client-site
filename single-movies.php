<?php get_header(); ?>
<div class="container">
  <div class="row py-5">

    <div class="col-md-8">
      <div class="row">
        <div class="col-md-4">
          <?php the_post_thumbnail([230]); ?>
        </div>
        <div class="col-md-8">
          <h1 class="fw-bold"> <?php the_title(); ?></h1>
          <p class="blog-post-meta">
                        <span class="fw-bold ">
                            IMDb:
                        </span>
            $movie imdb
          </p>
          <p class="blog-post-meta">
                        <span class="fw-bold">
                            Kinopoisk:
                        </span>
            $movie kinopoisk
          </p>
          <p class="blog-post-meta">
                        <span class="fw-bold">
                            Time:
                        </span>
             $movie time
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

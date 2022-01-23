<?php get_header(); ?>
<style>
    img.attachment-post-thumbnail.size-post-thumbnail.wp-post-image{
        height: auto;
        width: auto;
    }
</style>
<main>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-3">
                <div class="position-sticky" style="top: 2rem;">
                    <script>
                        function dynamicChangeNum() {
                            var rng=document.getElementById('movie_imdb_rating');
                            var p=document.getElementById('one');
                            p.innerHTML=rng.value;
                        }
                    </script>
                    <style>
                        input#movie_imdb_rating {
                            margin-right: 5px;
                        }
                    </style>
                    <form action="<?php echo get_post_type_archive_link( 'movies' ); ?>" method="get">
                    <div class="mb-3">
                        <label for="filter_search" class="form-label">Sort by</label>
                        <select name="sorting" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Open this select menu</option>
                            <option value="AZ">Name A-Z</option>
                            <option value="release_new">Release date (from new to old)</option>
                            <option value="release_old">Release date (from old to new)</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-3">Sort</button>
                    </div>
                    </form>
                    <form action="<?php echo get_post_type_archive_link( 'movies' ); ?>" method="get">
                        <div class="mb-3">
                            <label for="filter_search" class="form-label">Search</label>
                            <input type="text" name="filter_search" class="form-control" id="filter_search" value="<?php echo $_GET['filter_search']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="filter_relevance" class="form-label">IMDb Rating </label>
                            <div class="d-flex">
                                <input type="range" oninput="dynamicChangeNum()" id="movie_imdb_rating" name="movie_imdb_rating" min="0" max="10" value="">
                                <div id="one"></div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="/movies" type="submit" class="btn btn-outline-dark">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
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
                    <?php endwhile; endif;?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>


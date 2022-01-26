<?php
/**
 * Template part for displaying movie-filter
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<script>
    function dynamicChangeNum() {
        var rng = document.getElementById( 'movie_imdb_rating' );
        var p =   document.getElementById( 'one' );
        p.innerHTML = rng.value;
    }
</script>
<style>
    input#movie_imdb_rating {
        margin-right: 5px;
    }
</style>
<form action="<?php echo get_post_type_archive_link( 'movies' ); ?>" method="get">
	<div class="mb-3">
		<label for="filter_search" class="form-label">Search</label>
		<input type="text" name="filter_search" class="form-control" id="filter_search"
		       value="<?php echo $_GET[ 'filter_search' ]; ?>">
	</div>
	<div class="mb-3">
		<label for="filter_relevance" class="form-label">IMDb Rating </label>
		<div class="d-flex">
			<input type="range" oninput="dynamicChangeNum()" id="movie_imdb_rating"
			       name="movie_imdb_rating" min="0" max="10" value="">
			<div id="one"></div>
		</div>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Search</button>
		<a href="/movies" type="submit" class="btn btn-outline-dark">Reset</a>
	</div>
</form>
<?php
/**
 * Template part for displaying movie-sort
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<form action="<?php echo get_post_type_archive_link( 'movies' ); ?>" method="get">
	<div class="mb-3">
		<label for="filter_search" class="form-label">Sort by</label>
		<select name="sorting" class="form-select form-select-sm"
		        aria-label=".form-select-sm example">
			<option selected>Open this select menu</option>
			<option value="AZ">Name A-Z</option>
			<option value="release_new">Release date (from new to old)</option>
			<option value="release_old">Release date (from old to new)</option>
		</select>
		<button type="submit" class="btn btn-primary mt-3">Sort</button>
	</div>
</form>
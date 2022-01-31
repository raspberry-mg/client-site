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
<div class="mb-3">
    <label for="filter_search" class="form-label">Sort by</label>
    <select name="sorting" class="form-select form-select-sm" aria-label=".form-select-sm example">
        <option <?php selected( $_GET[ 'sorting' ], '' ); ?> >Latest arrivals</option>
        <option <?php selected( $_GET[ 'sorting' ], 'AZ' ); ?>  value="AZ">Name A-Z</option>
        <option <?php selected( $_GET[ 'sorting' ], 'release_new' ); ?>  value="release_new">Release date (from new to old)</option>
        <option <?php selected( $_GET[ 'sorting' ], 'release_old' ); ?>  value="release_old">Release date (from old to new)</option>
    </select>
</div>
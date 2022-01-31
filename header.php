<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and  header.
 *
 * @package WordPress
 * @subpackage Client_theme
 * @since Client theme 1.0
 */

?>
<!doctype html>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title><?php bloginfo( 'name'); ?></title>
  <?php wp_head(); ?>
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="p-3 bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
        <div class="container">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-sm-between" id="navbarsExample08">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" style="width: 100%">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="/movies" class="nav-link px-2 text-white">Movies</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
</header>
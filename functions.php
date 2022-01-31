<?php
/**
 * Functions
 *
 * We have functions wrapped in classes and distributed as modules and standard theme settings
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/* INCLUDE */
include 'classes/theme/DefaultFunctionsTheme.php';
include 'classes/modules/CustomFilterCPT.php';
include 'classes/modules/RegisterCPT.php';
include 'classes/modules/API.php';
include 'classes/modules/CustomPagination.php';
include 'classes/modules/AddPost.php';
include 'classes/modules/ACFCustomFields.php';
include 'classes/modules/RegisterACF.php';

/* NEW classes */
new client_site\classes\theme\DefaultFunctionsTheme();
new client_site\classes\modules\CustomFilterCPT();
new client_site\classes\modules\RegisterCPT();
new client_site\classes\modules\CustomPagination();
use client_site\classes\modules\API;
new client_site\classes\modules\AddPost;
new \client_site\classes\modules\RegisterACF;
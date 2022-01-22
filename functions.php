<?php

/**
 * INCLUDE
 */
include 'classes/theme/DefaultFunctionsTheme.php';
include 'classes/modules/CustomFilterCPT.php';
include 'classes/modules/RegisterCPT.php';
include 'classes/modules/API.php';

/**
 * NEW classes
 */
//default
new client_site\classes\theme\DefaultFunctionsTheme();
//modules
new client_site\classes\modules\CustomFilterCPT();
new  client_site\classes\modules\RegisterCPT();
//new \theme_for_Nix\classes\modules\API();


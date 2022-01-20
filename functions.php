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
new client_site\classes\DefaultFunctionsTheme();
//modules
//new \theme_for_nix\classes\modules\CustomFilterCPT();
new  client_site\classes\RegisterCPT();
//new \theme_for_Nix\classes\modules\API();
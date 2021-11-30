<?php

define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]). 'src/');
define('BASEPATH', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require BASEPATH . 'vendor/autoload.php';

use MVC\Dispatcher;

// require(ROOT . 'Config/core.php');

// require(ROOT . 'router.php');
// require(ROOT . 'request.php');
// require(ROOT . 'dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>
<?php

    // Front Controller

    // Common settings
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //  System files connection
    define('ROOT', dirname(__FILE__));
    require_once (ROOT . '/components/Router.php');
    require_once (ROOT . '/components/Db.php');

    // Database

    // Router call
    $router = new Router();
    $router->run();
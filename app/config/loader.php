<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */


$loader->registerDirs([
    APP_PATH . $config->application->controllersDir,
    APP_PATH . $config->application->pluginsDir,
    APP_PATH . $config->application->libraryDir,
    APP_PATH . $config->application->modelsDir,
    APP_PATH . $config->application->formsDir
])->register();

$loader->registerClasses([
    'Services' => APP_PATH . 'app/Services.php',
    'Services' => APP_PATH . 'app/Services.php',

]);

//$loader->registerFiles(
//[
//    APP_PATH."app/plugins/helperfun.php"
//]
//);


$loader->registerNamespaces(
    [
        'App\Controllers' => $config->application->controllersDir,
        //'Store\Admin\Models'      => '../bundles/admin/models/',
    ]
);

//$loader->register();
// var_dump($config->application->controllersDir);


//$router = new \Phalcon\

//
use Phalcon\Mvc\Router;
//
//// Create the router
//$router = new Router();
//
//$router->setDefaultNamespace('App\Controllers');
//
//var_dump($router);exit;
//
//// Define a route
//$router->add(
//    '/',
//    [
//        'namespace'  => 'App\Controllers',
//        'controller' => 'IndexController',
//        'action'     => 'indexAction',
//    ]
//);
//
//
//var_dump($di);exit;
//$router->handle();

require_once (APP_PATH."app/plugins/helperfun.php");
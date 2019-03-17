<?php

error_reporting(E_ALL);

use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\Mvc\Url as UrlProvider;



require __DIR__.'/../vendor/autoload.php';

try {
    define('APP_PATH', realpath('..') . '/');

    /**
     * Read the configuration
     */
    $config = new ConfigIni(APP_PATH . 'app/config/config.ini');
    if (is_readable(APP_PATH . 'app/config/config.ini.dev')) {
        $override = new ConfigIni(APP_PATH . 'app/config/config.ini.dev');
        $config->merge($override);
    }

    /**
     * Auto-loader configuration
     */
    require APP_PATH . 'app/config/loader.php';



    $application = new Application(new \App\Services($config));
    $application->useImplicitView(false);
    //$application->router;

    $services = $application->getDI();

   // var_dump(\Phalcon\Di::getDefault()->getService('router'));

    // NGINX - PHP-FPM already set PATH_INFO variable to handle route
    echo $application->handle(!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null)->getContent();
} catch (Exception $e){
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}

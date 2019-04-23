<?php

error_reporting(E_ALL);

ini_set('display_errors', 1);

use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\Mvc\Application;

require __DIR__ . '/../vendor/autoload.php';

try {
    define('APP_PATH', realpath('..') . '/');

    /**
     * Read the configuration
     */
    $config = new ConfigIni(APP_PATH . '.env');

    foreach ($config as $key => $value) {
        // 读取到环境变量
        putenv($key . '=' . $value);
    }

    /**
     * 载入配置
     *
     * @var [type]
     */
    // $dotenv = Dotenv\Dotenv::create(APP_PATH);
    // $dotenv->load();

    //var_dump($config);exit;
    //echo "{\"code\":\"200\",\"message\":\"success\",\"data\":{\"google\":\"googldede\"}}";exit;

    /**
     * Auto-loader configuration
     */
    include APP_PATH . 'app/config/loader.php';

    $application = new Application(new \App\Services($config));

    //    echo "{\"code\":\"200\",\"message\":\"success\",\"data\":{\"google\":\"googldede\"}}";exit;
    //
    $application->useImplicitView(false);
    //$application->router;

    $services = $application->getDI();

    //
    //    $services["router"] = function () {
    //        // Use the annotations router. We're passing false as we don't want the router to add its default patterns
    //        $router = new RouterAnnotations(false);
    //       // $router = new  Phalcon\Mvc\Router(false);
    //
    //        // Read the annotations from ProductsController if the URI starts with /api/products
    //        //$router->addResource("Products", "/api/products");
    //        $router->addResource("Index", "/api/products");
    //
    //        return $router;
    //    };
    $services->set(
        "router",
        function () {
            include __DIR__ . "/../app/routes/router.php";

            return $router;
        }
    );
    // var_dump($services['router']);exit;

    //var_dump($services);exit;

    // var_dump(\Phalcon\Di::getDefault()->getService('router'));

    // NGINX - PHP-FPM already set PATH_INFO variable to handle route
    //echo $application->handle(!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null)->getContent();
    echo $application->handle()->getContent();
} catch (Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}

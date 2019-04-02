<?php

use Phalcon\Mvc\Router;

$router = new Router\Annotations(false);

// 适配path root
$router->add("/", ["controller" => "errors","action"  => "showHome" ]);


$router->addResource("App\Controllers\Invoices");


//$router->notFound( [ "controller" => "Invoices", "action" => "demo" ]);

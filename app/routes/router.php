<?php

use Phalcon\Mvc\Router;

$router = new Router\Annotations(false);

$router->add(
    "/login",
    [
        "controller" => "Gun",
        "action"     => "indesss",
    ]
);




// $router->add(
//     "/login2",
//     [
//         "module"     => "Gun",
//         "controller" => "indesss",
//     ]
// )->beforeMatch(
//     function ($uri, $route) {

//         var_dump($uri);
//         var_dump($route);
//         exit;
//         // Check if the request was made with Ajax
//         if ($_SERVER["HTTP_X_REQUESTED_WITH"] === "xmlhttprequest") {
//             return false;
//         }

//         return true;
//     }
// );

$router->addResource("App\Controllers\Invoices");

//$router->me

//$router->notFound( [ "controller" => "Invoices", "action" => "demo" ]);

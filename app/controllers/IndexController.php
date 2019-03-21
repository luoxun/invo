<?php

namespace App\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        return SuccessResponse(["google" => "google"]);
    }

    public function showAction()
    {
        return SuccessResponse(["google" => "google"]);
    }
}

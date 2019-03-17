<?php

namespace App\Controllers;




class IndexController extends ControllerBase
{

    public function showAction()
    {
        return SuccessResponse(["google"=>"google"]);
    }
}

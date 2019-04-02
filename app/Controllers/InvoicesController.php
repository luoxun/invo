<?php

namespace App\Controllers;

use App\Models\Wxusers;
use Phalcon\Flash;
use Phalcon\Http\Request;
use Phalcon\Session;

/**
 * Class InvoicesController
 *
 * @package                      App\Controllers
 * @RoutePrefix("/api/invoices")
 */
class InvoicesController  extends ControllerBase
{

    public function infoAction($id)
    {
        echo "InvoicesController -- infoAction ".$id;
    }

    /**
     *
     * @Post(
     *     "/edit/{id:[0-9]+}",
     *     name="edit-robot"
     * )
     * @Cache(lifetime=86400,key={id})
     * @WantJson
     *
     * @param $id
     *
     * @return String
     */
    public function demoAction($id)
    {


        return SuccessResponse(Wxusers::findFirst($id));

    }


    /**
     *
     * @Get(
     *     "/google"
     * )
     *
     * @return String
     */
    public function demo2Action()
    {
        $id = 18;
        return SuccessResponse(Wxusers::findFirst($id));


    }
}

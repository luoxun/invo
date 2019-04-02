<?php
namespace App\Controllers;

use Phalcon\Flash;
use Phalcon\Session;


class InvoicesController  extends ControllerBase
{

    public function infoAction($id)
    {
        echo "InvoicesController -- infoAction ".$id;
    }


    public function  demoAction()
    {
        echo "InvoicesController -- demoAction ";
        exit;

    }
}

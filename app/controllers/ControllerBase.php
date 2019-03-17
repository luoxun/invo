<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller as PhalconController;

class ControllerBase extends PhalconController
{

//    protected function initialize()
//    {
//        //$this->tag->prependTitle('INVO | ');
//       // $this->view->setTemplateAfter('main');
//    }
    public function indexAction()
    {
        //echo "404";
        return  getResponse()->setStatusCode(404)->setContent("404");

    }
}

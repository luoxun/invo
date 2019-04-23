<?php

namespace App\Controllers;

/**
 * ErrorsController
 *
 * Manage errors
 */
class ErrorsController extends ControllerBase
{
    //    public function initialize()
    //    {
    //        $this->tag->setTitle('Oops!');
    //        parent::initialize();
    //    }

    public function show404Action()
    {
    }

    public function show401Action()
    {
    }

    public function show500Action()
    {
    }

    /**
     * 适配home Router
     *
     * @return \Phalcon\Http\Response
     */
    public function showHomeAction()
    {
        return getResponse()->setContent('invo welcome')->setStatusCode(200);
    }
}

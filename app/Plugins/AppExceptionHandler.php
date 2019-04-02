<?php
/**
 * NotFoundPlugin
 * -------------------------------
 *
 * @author  luoxun
 * @package
 */
namespace App\Plugins;

use App\Exceptions\AppException;
use App\Exceptions\WantJsonException;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Dispatcher;
use Phalcon\Mvc\Dispatcher\Exception as DispatcherException;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;

/**
 * AppException
 *
 * Handles not-found controller/actions
 */
class AppExceptionHandler extends Plugin
{
    /**
     * This action is executed before perform any action in the application
     *
     * @param  Event         $event
     * @param  MvcDispatcher $dispatcher
     * @param  \Exception    $exception
     * @return boolean
     */
    public function beforeException(Event $event, MvcDispatcher $dispatcher, \Exception $exception)
    {

        //var_dump($exception);

        if ($exception instanceof  WantJsonException) {

             $this->response->setJsonContent(["code"=>$exception->getCode(),"message" => $exception->message]);
             return false;
        }
        var_dump($exception);

        //return false;
    }
}

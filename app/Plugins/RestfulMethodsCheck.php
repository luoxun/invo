<?php
/**
 * Created by PhpStorm.
 * User: luoxun
 * Date: 19-3-26
 * Time: 上午12:25
 */



namespace App\Plugins;


use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;


class RestfulMethodsCheck extends Plugin
{
    /**
     * Check the requested method against an annotation on the action (if any) and fail it if its not matching.
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     * @return bool
     */
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {

//       var_dump($dispatcher->getActiveController());
//       exit;
        $annotations = $this->annotations->getMethod($dispatcher->getControllerClass(), $dispatcher->getActiveMethod());
        $bool =     $annotations->has("Cache");

        // 检查是否方法中带有注释名称‘Cache’的注释单元
        if ($annotations->has("Cache")) {
            // 这个方法带有‘Cache’注释单元
            $annotation = $annotations->get("Cache");

          //  var_dump($annotation);exit;

            // 获取注释单元的‘lifetime’参数
            $lifetime = $annotation->getNamedParameter("lifetime");

          //  var_dump($lifetime);

            $options = [
                "lifetime" => $lifetime,
            ];

            // 检查注释单元中是否有用户定义的‘key’参数
            if ($annotation->hasArgument("key")) {
                $options["key"] = $annotation->hasArgument("key");
            }

            // 为当前dispatcher访问的方法开启cache
            $this->view->cache($options);
        }
    }
}
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


class AnnotationsCheck extends Plugin
{
    /**
     * @param Event      $event
     * @param Dispatcher $dispatcher
     * @return bool
     * @throws \App\Exceptions\WantJsonException
     */
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {


        $annotations = $this->annotations->getMethod($dispatcher->getControllerClass(), $dispatcher->getActiveMethod());


        // 如果这个要json 的格式
        if($annotations->has("WantJson") and empty(getRequestJson())) {

            throw  new \App\Exceptions\WantJsonException("必须json");

        }

        // 检查是否方法中带有注释名称‘Cache’的注释单元
        if ($annotations->has("Cache")) {
            // 这个方法带有‘Cache’注释单元
            $annotation = $annotations->get("Cache");

            // 获取注释单元的‘lifetime’参数
            $lifetime = $annotation->getNamedParameter("lifetime");

            $options = [
                "lifetime" => $lifetime,
            ];

            //            var_dump($dispatcher->getParams());
            //            var_dump($annotation);exit;

            // 检查注释单元中是否有用户定义的‘key’参数
            if ($annotation->hasArgument("key")) {
                $options["key"] = $annotation->getNamedParameter("key");
            }

            //var_dump($options);
            // 为当前dispatcher访问的方法开启cache
            // $this->view->cache($options);
        }


        return false;
    }
}
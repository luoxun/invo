<?php
namespace App\Plugins;

use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\User\Plugin;

/**
 * 为视图启动缓存，如果被执行的action带有@Cache 注释单元。
 */
class CacheEnablerPlugin extends Plugin
{
    /**
     * 这个事件在dispatcher中的每个路由被执行前执行
     */
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        // 解析目前访问的控制的方法的注释
        $annotations = $this->annotations->getMethod(
            $dispatcher->getControllerClass(),
            $dispatcher->getActiveMethod()
        );

        // 检查是否方法中带有注释名称‘Cache’的注释单元
        if ($annotations->has("Cache")) {
            // 这个方法带有‘Cache’注释单元
            $annotation = $annotations->get("Cache");

            // 获取注释单元的‘lifetime’参数
            $lifetime = $annotation->getNamedParameter("lifetime");

            $options = [
                "lifetime" => $lifetime,
            ];

            // 检查注释单元中是否有用户定义的‘key’参数
            if ($annotation->hasNamedParameter("key")) {
                $options["key"] = $annotation->getNamedParameter("key");
            }

            // 为当前dispatcher访问的方法开启cache
            $this->view->cache($options);
        }
    }
}
<?php

namespace Base;

use Phalcon\Config;
use Phalcon\Db\Adapter\Pdo\Mysql;

class Services extends \Phalcon\DI\FactoryDefault
{
    public function __construct($config)
    {
        parent::__construct();
        // 主要是DB
        //$this->setShared('config', $config);

        $database = include  APP_PATH.'app/config/database.php';

        $config = [
            "databases" => $database,
        ];

        /**
         * 把DB setShared
         */
        foreach ($config['databases'] as $key => $value)
        {

            $this->setShared(
                $key, function () use ($value) {
                    $params = $value;
                    return new Mysql($value);
                }
            );
        }


        //$this->setShared('config', new Config($config));


        $this->bindServices();
    }

    protected function bindServices()
    {
        $reflection = new \ReflectionObject($this);
        $methods = $reflection->getMethods();


        foreach ($methods as $method) {

            if ((strlen($method->name) > 10) && (strpos($method->name, 'initShared') === 0)) {
                $this->setShared(lcfirst(substr($method->name, 10)), $method->getClosure($this));
                continue;
            }

            if ((strlen($method->name) > 4) && (strpos($method->name, 'init') === 0)) {
                $this->set(lcfirst(substr($method->name, 4)), $method->getClosure($this));
            }

        }

    }
}

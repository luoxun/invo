<?php
/**
 * Created by PhpStorm.
 *
 * @date   2019/4/2
 * @author luoxun<luo.xun@mydreamplus.com>
 */

namespace App\Models;


use Phalcon\Mvc\Model;

class BaseModel extends Model
{
    /**
     * 设置Model主从切换
     */
    public function initialize()
    {
        $this->setWriteConnectionService('default2');
        $this->setReadConnectionService('default');
    }

}
<?php
/**
 * Created by PhpStorm.
 *
 * @date   2019/4/2
 * @author luoxun<luo.xun@mydreamplus.com>
 */

namespace App\Exceptions;


class WantJsonException extends AppException
{
    public  $code = 100001;

    public $message = "want json";
}
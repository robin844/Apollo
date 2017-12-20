<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/15
 * Time: 21:16
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    // HTTP code
    public $code = 400;

    //Error Message
    public $errMsg = 'invalid parameter(s)';

    //Error code
    public $errCode = 10000;
}
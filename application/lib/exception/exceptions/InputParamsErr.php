<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/17
 * Time: 22:15
 */

namespace app\lib\exception\exceptions;


use app\lib\exception\BaseException;

class InputParamsErr extends BaseException
{
    public $code = 400;
    public $errMsg = 'Input Parameter(s) Error!';
    public $errCode = 10000;
}
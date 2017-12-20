<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/17
 * Time: 19:36
 */

namespace app\lib\exception\exceptions;


use app\lib\exception\BaseException;

class NoBannerData extends BaseException
{
    public $code = 404;
    public $errMsg = 'The Banner does Not Exist!';
    public $errCode = 40000;
}
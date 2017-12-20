<?php
/**
 * Created by PhpStorm.
 * User: Robin Chen
 * Date: 2017/12/14
 * Time: 20:54
 */

namespace app\api\validate;

use app\api\validate\BaseValidate;


class IsINT extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isInteger',
        //'num' => 'in:1,2,3',
    ];
}
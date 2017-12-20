<?php
/**
 * Created by PhpStorm.
 * User: Robin Chen
 * Date: 2017/12/14
 * Time: 23:22
 */

namespace app\api\validate;

use app\lib\exception\exceptions\InputParamsErr;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        //get the params from HTTP request
        $request = Request::instance();

        $params = $request->param();

        //check the input params
        $result = $this->batch()->check($params);

        //adjust the checked result
        if($result){
            return true;
        }else{
            $ex = new InputParamsErr();
            $ex->errMsg = $this->getError();
            throw  $ex;
        }
    }

    // check if positive Integer
    protected function isInteger($value, $rule='', $data='', $field=''){
        /*
         * 1. value should be a number
         * 2. value should be a Integer
         * 3. value should be more than 0
         */
        if(is_numeric($value) && is_int($value + 0) && ($value + 0)>0){
            return true;
        }else{
            return 'Banner ' . $field . ' must be a positive Integer.';
        }
    }

}
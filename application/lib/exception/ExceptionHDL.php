<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/15
 * Time: 21:04
 */

namespace app\lib\exception;
// Exception Handler Class
use think\Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

//TP5de全局exception处理都是由Handle类里面的render方法渲染返回客户端的形式,
//如果需要自定义exception, 就需要重写render方法.
//重写render方法后,需要去config.php里面配置exception_handle的路径

class ExceptionHDL extends Handle
{
    private $code;
    private $errMsg;
    private $errCode;

    //public function render(Exception $e){
    public function render($e){
        //去判断传进来的exception是否是来自于BaseException(即自定义的exception类型)
        //这种类型的exception需要想客户端返回提示信息
        if( $e instanceof BaseException){
            $this->code = $e->code;
            $this->errMsg = $e->errMsg;
            $this->errCode = $e->errCode;
        }else{
            //判断是否为debug mode
            if(config('app_debug')){
                //是debug mode,则返回debug信息
                //由于这里是handle的子类,父类的render可以直接返回debug信息,则调用父类的render方法
                return parent::render($e);
            }else{
                //不是debug mode,则返回json
                //如果不是自定义的exception,则交给全局exception处理
                //如果是系统内部的错误,则不需要返回确切的错误信息,而是log在系统的日志文件里面
                $this->code = 500;
                $this->errMsg = 'Server is not available!';    //服务器内部错误
                $this->errCode = 999;

                //TP5默认是会把所有的exception记录到日志里面的
                $this->dumpLog($e);
            }

        }
        //To get the URL
        $request = Request::instance();

        //return the result
        $result = [
            'return_MSG' => $this->errMsg,
            'return_Code' => $this->errCode,
            'return_URL' => $request->url(),
        ];

        return json($result, $this->code);
        //return 'hihi';
    }

    private function dumpLog(Exception $ex1){
        //初始化Log的配置
        Log::init([
            'type'  => 'file',      //以file的形式来记录日志
            'path'  => LOG_PATH,    //记录日志的路径,在index.php里面定义了
            'level' => ['error'],   //记录'error' level以上的日志, leave等级详看Readme.txt
        ]);
        Log::record($ex1->getMessage(),'error');
    }
}
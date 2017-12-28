<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Robin Chen
// | Date:   17 Dec 2017
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');

//定义log路径
define('LOG_PATH', __DIR__ . '/../log/');

// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';

\think\Log::init([
    'type'  => 'file',      //以file的形式来记录日志
    'path'  => LOG_PATH,    //记录日志的路径,在index.php里面定义了
    'level' => ['sql'],
]);

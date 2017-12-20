<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Robin Chen
// +----------------------------------------------------------------------

use think\Route;


//Route::get('banner/:id','api/v1.Banner/getBanner');
Route::get('api/v1/banner/:id','api/v1.Banner/getBanner');